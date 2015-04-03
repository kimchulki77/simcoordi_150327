<?
ob_start();
include_once '../../../../shop/lib/library.php';
include_once '../Coordi.class.php';
ob_end_clean();
// db 값 utf8로 변경
$db->query(
    'set session character_set_results=utf8;');
if ($sess [m_no] == null) {
    echo("need login");
    exit ();
}
$content = iconv(
    "utf8",
    "euckr",
    $_POST ['content']);
// 착용중인 옷을 json형식으로 바꿔줍니다.
$wearingCloth = json_decode(stripslashes($_REQUEST ['wearingCloth']));
$coordistyle = $_REQUEST [coordistyle];

// 이미지를 저장합니다.
$filteredData = substr(
    $_POST ['img_val'],
    strpos(
        $_POST ['img_val'],
        ",") + 1);
$decodedData = base64_decode($filteredData);
// 중복방지를 위해 tempnam으로 바꿉니다.
$savedFileName = tempnam(
        '/coordi',
        '') . '.png';
// 이름에 /tmp/를 제거합니다.
$savedFileName = str_replace(
    '/tmp/',
    '',
    $savedFileName);

// 지정한 PATH에 이미지 파일을 저장합니다.
$res = file_put_contents(
    '/www/gnbro1_godo_co_kr/simcoordi/images/coordi/' . $savedFileName,
    $decodedData
);
$coordi = new Coordi ();
// 코디저장
$coordi->save(
    $content,
    $wearingCloth,
    $savedFileName,
    $coordistyle);
echo $res;
?>
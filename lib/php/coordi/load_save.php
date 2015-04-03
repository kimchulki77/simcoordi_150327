<?
ob_start ();
include_once '../../../../shop/lib/library.php';
include_once '../Coordi.class.php';
ob_end_clean ();
// db 값 utf8로 변경
$db->query ( 
		'set session character_set_results=utf8;' );
// if($sess [m_no] ==
// null) {
// echo "회원가입 후 이용가능합니다.";
// exit ();
// }
// if ($_GET ['mode']=='my') {
$coordi = new Coordi ();
// page 설정
$coordi->page = $_GET [page];
// 순서 설정
$coordi->order = $_GET [order];
// 코디 불러오기
echo json_encode ( 
		$coordi->loadSave (
				true ) );
?>
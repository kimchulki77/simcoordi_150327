<?
ob_start ();
include_once '../../../../shop/lib/library.php';
include_once '../Coordi.class.php';
ob_end_clean ();
// db 값 utf8로 변경
$db->query ( 
		'set session character_set_results=utf8;' );
// if ($sess [m_no] ==
// null) {
// msg (
// "login to act" );
// exit ();
// } // 착용중인 옷 객체로받기
$wearingCloth = json_decode ( 
		stripslashes ( 
				$_REQUEST ['wearingCloth'] ) );
$coordi = new Coordi ();
// page 설정
$coordi->page = $_GET [page];
// page 설정
$coordi->order = $_GET [order];
echo json_encode ( 
		$coordi->match ( 
				$wearingCloth ) );
?>
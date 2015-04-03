<?
ob_start ();
include_once '../../../../shop/lib/library.php';
include_once '../Coordi.class.php';
ob_end_clean ();
// db 값 utf8로 변경
$db->query ( 
		'set session character_set_results=utf8;' );
$coordi = new Coordi();

// 무차별로 삭제가능하므로 아이디 검사후 해야함
$cno = $_GET['cno'];
$coordi->remove($cno);
?>
<?
ob_start ();
include_once '../../../../shop/lib/library.php';
include_once '../Coordi.class.php';
ob_end_clean ();
// db 값 utf8로 변경
$db->query ( 
		'set session character_set_results=utf8;' );
$userno = $sess [m_no];
if($userno == null) {
	echo ("need login");
	exit ();
}

// // if($title ==
// // '') {
// // echo 'title';
// // exit ();
// // }
// if($content == '') {
// echo 'content';
// exit ();
// }

$content = iconv ( 
		"utf8", 
		"euckr", 
		$_POST ['content'] );
// 스타일 받기
$coordistyle = $_REQUEST [coordistyle];
$cno = $_REQUEST [cno];
$query = 'UPDATE my_board SET content="' .
		 $content .
		 '", coordistyle="' .
		 $coordistyle .
		 '" WHERE userno="' .
		 $userno .
		 '" AND cno="' .
		 $cno .
		 '"';
$db->query ( 
		$query );
		echo 'success';

?>
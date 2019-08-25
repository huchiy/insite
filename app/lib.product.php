<?
/**
*		상품관련 함수
*/


// 카테고리명 구하기
function ctName($idx) {
	$row=f_array("select ct_name from wk_menu where idx='$idx'");
	return $row[0];
}

?>

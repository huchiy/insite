<?
/**
*		업체관리 함수
*/
// 업무분류
$c_arr=array("","제작작업","유지보수","추가견적");
// 상태
$s_arr=array("","<font color='red'>작업요청</font>","<font color='blue'>지시수정</font>","<font color='#008000'>처리중</font>","<font color='#800000'>처리보류</font>","<font color='#FF80C0'>검수요청</font>","검수완료","<font color='#C0C0C0'>작업취소</font>");
$h_arr=array("","카페24","오늘과내일","가비아","XYnet","리셀러","자체서버","개별호스팅","직접입력");//호스팅사
$mt_arr=array("","유지보수","일시중지","관리중단","미체결");//유지보수 상태
$sup_arr=array("","1","3","6","12");//유지보수 단위
// 프로젝트 진행상태
$st_arr=array("","진행대기","진행중","완료");

// 업체 카테고리명 가져오기
function enter_ct_nm($idx) {

	$nm=f_array("select catename from wk_entercate where idx='$idx'");
	return $nm[0];

}

// 업체명 가져오기
function enter_nm($k) {

	$nm=f_array("select company from wk_enterprise where enterkey='$k'");
	return $nm[0];

}

// 업체명 가져오기
function enter_nm_idx($idx) {

	$nm=f_array("select company from wk_enterprise where idx='$idx'");
	return $nm[0];

}
?>

<?
/**
*		회원관련함수
*/

// 관리자등급
$adm_mb_level=array("1","2","5","6","9","10");
$adm_mb_name=array("관리자","서브관리자","팀관리자","일반사원","인턴사원","퇴사사원");
// 회원등급
$MBlevel=array("1","2","7","9","10");
$MBname=array("관리자","서브관리자","업체회원","일반회원","사용제한회원");
// 업무
$MBwork=array("경영지원","웹기획","웹디자인","웹프로그램");
// 핸드폰번호
$hp_arr=array("010","011","016","017","018","019");
// 이메일
$email_arr=array("naver.com","nate.com","hanmail.net","hotmail.com","yahoo.co.kr","korea.com","gmail.com","empal.com","freechal.com","dreamwiz.com","netian.com","chol.net");

/*
*	$num	: 시작번호
*	$line		: 마지막번호
*	예) line_num(1,5); -> 00001
*/
function line_num($num, $line){
	$num_length=strlen($num);
	if($num_length>$line){
		$pl_n=$num_length-$line;
		$line=$line+($pl_n+1);
	}else {$line=$line;}
	$Add="";
	for($i=$num_length; $i<$line; $i++){
		$Add .= "0";
	}
	$Re=$Add.$num;
	return $Re;
}
// 1차메뉴 생성
function ctAdd($ct_a) {
	$cd_row=f_array("select max(idx) from wk_category");
	$n=$cd_row[0]+1;
	if(strlen($num)>4){$ntr=$n;}
	else {$ntr=line_num($n,4);}	
	$r=$ct_a.$ntr;
	return $r;
}

// 회원아이디 생성
function mb_id($tb) {
	$d=date("YmdHis",time());
	$n=rand(1,999);
	$pd_no="M".$n.$d;
	return $pd_no;
}

//회원idx 출력
function memIdx($id){
	$rows=f_array("select idx from member where id='".$id."'");
	if(!$rows){$idx="";}
	else{$idx=$rows["idx"];}
	return $idx;
}

// 부서이름 구하기
function mb_group($idx) {
	$m_psi=f_array("select name from wk_group where idx='$idx'");
	return $m_psi[0];
}

// 코드번호로 그룹이름 구하기
function mb_part($cd) {
	$m_psi=f_array("select * from wk_category where code_gp='$cd'");
	return $m_psi[ct_name];
}

// 코드번호로 그룹이름 구하기
function mb_part_gb($db_pt,$se_pt) {
	$db_arr=f_array("select * from wk_category where code_gp='$db_pt'");
	$se_arr=f_array("select * from wk_category where code_gp='$se_pt'");
	if(substr($db_arr[code_gp],0,12)==substr($se_arr[code_gp],0,12)){
		return true;
	}else {return false;}	
}

// 직급번호로 직급이름구하기
function mb_position($p) {
	$m_psi=f_array("select * from wk_mb_position where level='$p'");
	return $m_psi[name];
}

// 직책번호로 직책이름구하기
function mb_rank($p) {
	$m_psi=f_array("select * from wk_mb_rank where level='$p'");
	return $m_psi[name];
}

// 회원아이디로 값구하기
function mb_userVar($uid,$var) {
	$m_psi=f_array("select $var from wk_member where user_id='$uid'");
	return $m_psi[0];
}

/*
*	$rt_nm : 찾을 결과값
*	$field_nm : 검색 필드명
*	$key	:	키값
*/
function user_info($rt_nm,$field_nm,$key) {
	$rows=f_array("select $rt_nm from wk_member where $field_nm = '$key'");
	return $rows[0];
}

/*
*	$rt_nm : 찾을 결과값
*	$tb : 테이블
*	$field_nm : 검색 필드명
*	$key	:	키값
*/
function tb_result($rt_nm,$tb,$field_nm,$key) {
	$rows=f_array("select $rt_nm from $tb where $field_nm = '$key'");
	return $rows[0];
}

// 댓글수
function tb_cm_num($tb_nm,$field_nm,$key) {

	$rep_n=n_rows("select * from $tb_nm where $field_nm = '$key'");
	return $rep_n;

}

// PC, 모바일확인
function browserCk() {
	// 사파리를 뒤로 뺀 이유는  다른 브라우저들의 agent string에서 사파리가 나타나기 때문.
	// 위험요소다. 
	 $broswer_list = array('MSIE', 'Chrome', 'Firefox', 'iPhone', 'iPad', 'Android', 'PPC', 'Safari', 'none'); 
	$browser_name = 'none';
	foreach ($broswer_list as $user_browser){ 
		if(strpos($_SERVER['HTTP_USER_AGENT'], $user_browser)){ 	 
			$result = "MOBILE";		 
		}else {$result = "PC";}
	}
	return $result;
}
function MobileCheck() { 
	global $HTTP_USER_AGENT; 
	$MobileArray  = array("iphone","lgtelecom","skt","mobile","Mobile","samsung","nokia","blackberri","android","Android","sony","phone");

	$checkCount = 0; 
		for($i=0; $i<sizeof($MobileArray); $i++){ 
			if(preg_match("/$MobileArray[$i]/", strtolower($_SERVER['HTTP_USER_AGENT']))){ $checkCount++; break; } 
		} 
   return ($checkCount >= 1) ? "MOBILE" : "PC"; 
}


/*
*	사이트 세팅정보이용약관
*
*	헤더, 메터, 푸터, 이용약관, 개인정보취급방침
*/
//$set_info_rows=f_array("select * from wk_setting where idx=1");

/*
*	로그인시 정보 가져오기
*/
//if($_SESSION[p_id] || $_SESSION[p_email]){
//
//	// 관리자는 아이디로 회원정보 가져오기
////	if($first_path=="admin"&&$_SESSION[p_id]){
////		$user_q="user_id='$_SESSION[p_id]'";
////	}else if($_SESSION[p_email]){
////		$user_q="email='$_SESSION[p_email]'";
////	}else {$user_q="";}
//	if($_SESSION[p_email]){
//		$user_q="email='$_SESSION[p_email]'";
//	}else if($_SESSION[p_id]){
//		$user_q="user_id='$_SESSION[p_id]'";	
//	}else {$user_q="";}
//	if($user_q){
//		$MB_rows=f_array("select * from wk_member where $user_q and state='Y' and user_level!=10");
//		$userId=$MB_rows[user_id];
//		$userName=$MB_rows[user_name];
//		$hps=explode("-",$MB_rows[hp]);
//	}
//
//}else {}
?>

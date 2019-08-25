<?include "../../app/inc_head.php";
?><script>alert()</script><?
$table_name="Pka_User";

$PU_userid = trim($PU_userid);
$PU_passwd = trim($PU_passwd);

$PU_passwd = md5($PU_passwd);

$id_rows = f_array("select * from $table_name where PU_email = '$PU_email'");
$pwd_rows = f_array("select * from $table_name where PU_email = '$PU_email' and PU_passwd='$PU_passwd'");

if(!$id_rows) {msg('일치하는 아이디가 없습니다.');exit;}
//if($id_rows[adm_level]=="10") {msg('해당 휴대폰번호가 사용제한 중입니다. 관리자에게 문의하세요.');exit;}
//if($id_rows[state]=="N") {msg('해당 휴대폰번호가 사용 보류 중입니다. 관리자에게 문의하세요.');exit;}
else if(!$pwd_rows){msg('비밀번호가 일치하지 않습니다.');exit;}
else{
	
	if($id_save=='Y'){// 아이디저장
		if($pwd_rows[PU_email]){
			setcookie('p_PU_email', $pwd_rows[PU_email], time() + 86400 * 730);
		}else{}		
	}

	if($login_save=='Y'){// 로그인유지
		if($pwd_rows[token_val]){
			setcookie('p_PU_email', $pwd_rows[PU_email], time() + 86400 * 730);
			setcookie('p_token_val', $pwd_rows[token_val], time() + 86400 * 730);
		}else{}
	}

	$_SESSION[p_PU_idx]=$pwd_rows[PU_idx];
	$_SESSION[p_PU_email]=$pwd_rows[PU_email];
	$_SESSION[p_token_val]=$pwd_rows[token_val];

	// 최근로그인시간 저장.
	query("update $table_name set PU_logindate=now() where token_val = '$_SESSION[p_token_val]'");

	$login = strpos( $rt_page , '/contents/member/login' );
	$id_find = strpos( $rt_page , '/contents/member/id_find' );
	$member_join = strpos( $rt_page , '/contents/member/member_join' );
	$pwd_find = strpos( $rt_page , '/contents/member/pwd_find' );
	// 이동할 페이지 정보가 있을 경우
	if($rt_page){
		if($login === false){}else{f_go("/contents/paykhan/paykhan");}
		if($id_find === false){}else{f_go("/contents/paykhan/paykhan");}
		if($member_join === false){}else{f_go("/contents/paykhan/paykhan");}
		if($pwd_find === false){}else{f_go("/contents/paykhan/paykhan");}
		f_go($rt_page);
	}else{
		f_go("/");
	}
}?>
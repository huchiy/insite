<?include "../../app/inc_head.php";

$query="select * from Pka_Admin where PAD_id = '$PAD_id'";
//$id_rows = f_array("$query and adm_level!='' and adm_level<='5'");
//$pwd_rows = f_array("$query and PAD_passwd=password('$PAD_passwd') and adm_level!='' and adm_level<='5'");
$id_rows = f_array("$query");
$pwd_rows = f_array("$query and PAD_passwd=password('$PAD_passwd')");

if(!$id_rows) {msg('일치하는 아이디가 없습니다.');exit;}
else if(!$pwd_rows){msg('비밀번호가 일치하지 않습니다.');exit;}
else{
	
//	$_SESSION[p_idx]=$pwd_rows[idx];
//	$_SESSION[p_id]=$pwd_rows[user_id];
//	$_SESSION[p_name]=$pwd_rows[user_name];
//	$_SESSION[p_nick]=$pwd_rows[nick_name];
//	$_SESSION[p_level]=$pwd_rows[user_level];
//	$_SESSION[adm_level]=$pwd_rows[adm_level];
//	$_SESSION[p_pwd]=$pwd_rows[pwd];
//	$_SESSION[p_email]=$pwd_rows[email];
//	$_SESSION[p_sg_gb]=$pwd_rows[sg_gb];	// 담당사이트

	$_SESSION[p_admin_token_val]=$pwd_rows[admin_token_val];

	// 최근로그인시간 저장.
	query("update Pka_Admin set PAD_logindate=now() where PAD_id = '$pwd_rows[PAD_id]'");

	f_go("/admin/setting/site_management.php");
}?>
<?include "../../app/inc_head.php";

	// 최근로그아웃시간 저장.
	query("update Pka_Admin set PAD_logoutdate=now() where admin_token_val = '$_SESSION[p_admin_token_val]'");

	// 세션사용을 위해 세션을 시작시킵니다.
	session_start();
	session_destroy();
	
	go("../");
?>

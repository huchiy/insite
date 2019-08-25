<?//include "../../app/inc_head.php";

	// 최근접속시간 저장.
	//query("update wk_member set logout_time=getdate() where token_val = '$_SESSION[p_token_val]'");

	// 세션사용을 위해 세션을 시작시킵니다.
	session_start();
	session_destroy();
	setcookie ("p_PU_email", "", time() - 3600);
	setcookie ("p_token_val", "", time() - 3600);

	foreach($_COOKIE as $key=>$val){ 
	 setCookie($key,"",time()-0,"/"); 
	}
	
	function go($GO){?>
		<script>		
			location.replace("<?= $GO?>");		
		</script>
<?exit;
	}
	go('/');
?>
<?include "../../app/inc_head.php";

$table_name="Pka_User";

$files='';
for($i=1;$i<=9;$i++){
	$PU_files.="/".${"fileN".$i.""};
}

if($Query=="insert"){	// 회원가입

	// 탈퇴 후 3개월간 동일 이메일 가입안되게
//	$memCk=n_rows("select * from wk_member_withdraw where user_id = '$email' and sg_gb in ('all', '$sg_gb') and date_add(reg_date, interval +90 day) < '$date' order by idx desc limit 0,1");
//	if($memCk){
//		msg("입력하신 이메일은 탈퇴한지 3개월이 지나지 않았습니다.");join_act("join_btn","join_txt");exit;
//	}
//	$memCk2=n_rows("select * from $table_name where hp = '$hp' ");
//	if($memCk2){
//		//msg("이미 등록된 휴대폰번호입니다.");exit;
//		f_alert("이미 등록된 휴대폰번호입니다.","cardEvent_main.php");
//	}
	//$pg_gb=MobileCheck();

	$memCk3=n_rows("select * from $table_name where PU_email = '$PU_email'");	
	if($memCk3){
		msg("이미 가입된 이메일입니다.");exit;
	}
	$PU_passwd = md5($PU_passwd);

	//중복확인쿼리(중복없을때까지 갱신)
	$token_val = getString3();
	while(1){		
		$token_rows=f_array("select * from $table_name where token_val = '$token_val'"); // 중복 확인
		if($token_rows){// 중복중
			$token_val = getString3();	
		}else{// 중복끝
			break;
		}
	}

	query("INSERT INTO $table_name ( token_val , PU_email , PU_name , PU_passwd , PU_joindate ) VALUES ( '$token_val' , '$PU_email' , '$PU_name' , '$PU_passwd' , now() )");

	f_alert("회원가입이 정상적으로 완료되었습니다.","/");



}else if($Query=="password_update"){	// 패스워드 변경

	if(!$_SESSION[p_token_val]){// 로그인정보 없음
		$rows_member=f_array("select * from $table_name where token_val='$token_val_ck'");
		if($rows_member){
			$pwd = md5($pwd);
			query("UPDATE $table_name SET pwd='$pwd' , modify_date = now() WHERE token_val = '$token_val_ck'");
			f_alert("비밀번호가 수정되었어요. 로그인해주세요.","{$ab_url}contents/cardEvent_main.php");
		}else{
			msg("일치하는 정보가 없어요.");exit;
		}
	}else{// 로그인 되어있음
		msg("로그인정보가 있네요.");exit;
	}



}else if($Query=="update"){	// 회원정보수정

//	$memCk=f_array("select * from $table_name where user_id='$_SESSION[p_id]'");
//	// 휴대폰 변경시 회원중에 같은 번호가 있는지 확인
//	if($memCk[hp]!=$hp){
//		$hpCk=n_rows("select * from $table_name where hp='$hp' and state='Y' and user_level!=10");	
//		if($hpCk){
//			msg("이미 가입된 휴대폰번호 입니다.");exit;
//		}
//	}
//	// 이메일주소 변경시 회원중에 같은 이메일주소가 있는지 확인
//	if($memCk[email]!=$email){
//		$emailCk=n_rows("select * from $table_name where email='$email' and state='Y' and user_level!=10");	
//		if($emailCk){
//			msg("이미 가입된 이메일주소입니다.");exit;
//		}s
//	}
//	if($pwd){
//		$pwd = md5($pwd);
//		$in_query=" , pwd = '$pwd' ";
//	}else{}

	query("UPDATE $table_name SET PU_name = '$PU_name' , PU_profile = '$PU_profile' , PU_files = '$PU_files' , PU_modifydate = now() WHERE token_val = '$_SESSION[p_token_val]'");

	f_alert("개인 프로필이 수정되었습니다.","/contents/member/manage");


}else if($Query=="id_search"){	// 아이디찾기


	$user_name=trim($user_name);
	$memCk=f_array("select * from $table_name where user_name='$user_name' and replace(hp,'-','')='$u_hp'");
	if($memCk){
		$email_exp=explode("@",$memCk[email]);
		if(strlen($email_exp[0])>2){$b_nn=2;}else {$b_nn=1;}
		$em1=rep_Str($email_exp[0],"E",$b_nn);
		$email=$em1."@".$email_exp[1];
		msg("회원님의 아이디는 $email 입니다");exit;
	}else {msg("일치하는 정보가 없습니다.");exit;}


}else if($Query=="pw_search"){	// 비밀번호찾기


	$memCk=f_array("select * from $table_name where and user_name='$user_name' and email='$email'");
	if($memCk){		
		// 비밀번호 변경
		$pwd=substr(base64_encode(time()),1,10);
		query("UPDATE $table_name SET pwd = password('$pwd') WHERE email = '$email'");
		// 메일발송
		$re=pwd_sendMail("ilbonski@naver.com","일본스키닷컴","[비밀번호찾기] 비밀번호 발송메일입니다.",$email,$memCk[user_name],$pwd);
		if($re){msg("메일발송하였습니다.");exit;}
	}else {msg("일치하는 이메일이 없습니다.");exit;}


}else if($Query=="pass_ck"){	// 비밀번호확인


	$pass_rows=f_array("select * from wk_member where email='$_SESSION[p_email]' and pwd = password('$pwd') ");
	if($pass_rows){f_go("join_step02.html");}
	else {msg("비밀번호가 일치하지 않습니다.");exit;}


}else if($Query=="delete"){	// 회원탈퇴

	$pwd = md5($pwd);
	$memCk=f_array("select * from $table_name where email='$_SESSION[p_email]' and pwd='$pwd' ");
	if(!$memCk){msg("비밀번호를 다시 확인해주세요");exit;}
	if($memCk[adm_level]<=2){msg("관리자 회원은 탈퇴할 수 없습니다. 사이트 관리자에게 별도로 문의해주세요.");exit;}
	// 탈퇴로그
	query("INSERT INTO wk_member_withdraw ( user_id , user_name , content , sg_gb , user_ip , reg_date ) VALUES ( '$_SESSION[p_id]' , '$_SESSION[p_name]' , '$content' , '$memCk[mb_gb]' , '$user_ip' , getdate() )");
	query("delete from $table_name where email = '$_SESSION[p_email]'");
	session_start();
	session_destroy();
	f_alert("회원탈퇴처리 되었습니다",$pgUp);


}else if($Query=="re_result"){	// 예약정보 확인


	$order_code=trim($order_code);
	$user_hp=trim($user_hp);
	//$cd_ck=n_rows("SELECT * FROM wk_ski_reservation WHERE order_code = '$order_code' AND replace( hp, '-', '' ) = '$user_hp'");
	$cd_ck=n_rows("SELECT * FROM wk_ski_reservation WHERE order_code = '$order_code'");
	if($cd_ck){form_act("reserve_result.html","order_code=$order_code","P");}
	else {msg("일치하는 정보가 없습니다");exit;}


}
f_alert("잘못된 경로입니다.","cardEvent_main.php");
?>
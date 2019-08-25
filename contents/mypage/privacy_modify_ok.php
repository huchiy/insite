<?include "../../app/inc_head.php";

$table_name="Pka_User";

if($Query=="insert" && !$idx) {	// 등록

	// 휴대전화 중복
	$rows_count=f_row("select * from $table_name where PU_phone = '$PU_phone'");
	if($rows_count>0){
//		msg("중복된 휴대폰 번호입니다. 다른 번호로 가입을 진행해 주세요.");
//		exit;
	}else{}

	$PU_userid = trim($PU_userid);
	$PU_passwd = trim($PU_passwd);

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
	$PU_smscf = 'Y';// 국제 sms 인증여부
	$PU_han_total = '';// HAN코인보유수량
	$PU_ethwallet = '';// 이더리움지갑주소
	$PU_pwdchange = '';// 비밀번호 변경 횟수
	$PU_memo = '';// 관리자 회원 메모
	$PU_partner_phone = $partner_userid;// 제휴사 연동 회원 번호
	$PU_partner_ck = $recom_apply_num_ok;// 제휴사 연동 유무


	if($recom_apply_num_ok=='Y'){// 제휴사 연동 유무
		$id_row=f_array("select * from Pka_User_K2K9 where PU_userid='$PU_recom'");
		if($id_row){$PU_recom = $PU_recom;}// 존재하는 아이디
		else {$PU_recom = '';}// 없음
	}else{// 자체 가입
		$id_row=f_array("select * from Pka_User where PU_userid='$PU_recom'");
		if($id_row){$PU_recom = $PU_recom;}// 존재하는 아이디
		else {$PU_recom = '';}// 없음
	}

	query("INSERT INTO $table_name ( token_val , PU_userid , PU_passwd , PU_name , PU_phone , PU_recom , PU_partner_phone  , PU_partner_ck , PU_smscf , PU_han_total , PU_country , PU_joindate , PU_logindate , PU_ethwallet , PU_pwdchange , PU_memo ) VALUES ( '$token_val' , '$PU_userid' , '$PU_passwd' , '$PU_name' , '$PU_phone' , '$PU_recom' , '$PU_partner_phone' , '$PU_partner_ck'  ,'$PU_smscf' , '$PU_han_total' , '$PU_country' , now() , now() , '$PU_ethwallet' , '$PU_pwdchange' , '$PU_memo' )");

	if($token_val){
		setcookie('p_PU_userid', $PU_userid, time() + 86400 * 730);
		setcookie('p_token_val', $token_val, time() + 86400 * 730);
	}else{}
	$_SESSION[p_PU_userid]=$PU_userid;
	$_SESSION[p_token_val]=$token_val;

	f_alert('HanChain(HAN) & PayKhan(PKN) \n가입을 환영합니다.','/contents/paykhan/paykhan');


}else if($Query=="update"){	// 수정

	// 휴대전화 중복
	if($PU_passwd_old && $PU_passwd && $PU_passwd_ck){
		$PU_passwd_old = md5($PU_passwd_old);
		$rows=f_array("select * from $table_name where token_val = '$_SESSION[p_token_val]'");
		if($rows[PU_passwd]==$PU_passwd_old){// 패드워드 일치
			$PU_passwd = md5($PU_passwd);
			$sear_char.= " , PU_passwd ='$PU_passwd' ";
		}else{// 패스워드 다름
			msg($rows[PU_passwd]."/".$PU_passwd_old."비밀번호가 다릅니다. 비밀번호를 변경하시려면 다시 확인해주세요.");
			exit;
		}
	}

	if($apply_num_ok=='Y'){// 휴대폰 변경 인증 완료
		$sear_char.= " , PU_phone ='$PU_phone' ";
	}else{}

	query("UPDATE $table_name SET  PU_name = '$PU_name' , PU_ethwallet = '$PU_ethwallet'  $sear_char WHERE token_val='$_SESSION[p_token_val]'");

	f_alert('개인정보수정 완료 되었습니다.','privacy');

}else if($Query=="delete"){	// 삭제


	for($i=0;$i<sizeof($check) ;$i++ ){
		if($check[$i]){			
			query("delete from $table_name where idx='$check[$i]'");
		}
	}
	f_go("coupon02.php?$para_url&page=$page&page=$page");


}else if($Query=="sort_update"){	// 순서변경

	$sort_num=$GLOBALS["sort_num".$idx];
	query("UPDATE $table_name SET sort_num = '$sort_num' WHERE idx='$idx'");
	f_go("coupon02.php?$para_url&page=$page&$mb_bbs_url");


}
?>
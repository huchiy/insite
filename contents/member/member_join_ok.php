<?include "../../app/inc_head.php";

$table_name="Pka_User";

if($Query=="insert" && !$idx) {	// 등록

	$PU_userid = trim($PU_userid);
	$PU_passwd = trim($PU_passwd);

	$PU_passwd = md5($PU_passwd);

	// 아이디 중복
	$rows_count=f_row("select * from $table_name where PU_userid = '$PU_userid'");
	if($rows_count>0){
		msg("중복된 아이디 입니다. 다른 아이디로 가입을 진행해 주세요.");
		exit;
	}else{}

	// 휴대전화 중복
//	$rows_count=f_row("select * from $table_name where PU_phone = '$PU_phone'");
//	if($rows_count>0){
//		msg("중복된 휴대폰 번호입니다. 다른 번호로 가입을 진행해 주세요.");
//		exit;
//	}else{}

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
	$PU_han_useful = '';// HAN코인 가용수량
	$PU_ethwallet = '';// 이더리움지갑주소
	$PU_pwdchange = '';// 비밀번호 변경 횟수
	$PU_memo = '';// 관리자 회원 메모
	$PU_partner_phone = $partner_userid;// 제휴사 연동 회원 번호
	$PU_partner_ck = $recom_apply_num_ok;// 제휴사 연동 유무


	if($recom_apply_num_ok=='Y'){// 제휴사 연동 유무
		$id_row=f_array("select * from Pka_User_K2K9 where PU_userid='$PU_recom'");
		if($id_row){$PU_recom = 'k'.$PU_recom;}// 존재하는 아이디
		else {$PU_recom = '';}// 없음
	}else{// 자체 가입
		$id_row=f_array("select * from Pka_User where PU_userid='$PU_recom'");
		if($id_row){$PU_recom = $PU_recom;}// 존재하는 아이디
		else {$PU_recom = '';}// 없음
	}

	query("INSERT INTO $table_name ( token_val , PU_userid , PU_passwd , PU_name , PU_phone , PU_recom , PU_partner_phone  , PU_partner_ck , PU_smscf , PU_han_useful , PU_country , PU_joindate , PU_logindate , PU_ethwallet , PU_pwdchange , PU_memo ) VALUES ( '$token_val' , '$PU_userid' , '$PU_passwd' , '$PU_name' , '$PU_phone' , '$PU_recom' , '$PU_partner_phone' , '$PU_partner_ck'  ,'$PU_smscf' , '$PU_han_useful' , '$PU_country' , now() , now() , '$PU_ethwallet' , '$PU_pwdchange' , '$PU_memo' )");

	if($token_val){
		setcookie('p_PU_userid', $PU_userid, time() + 86400 * 730);
		setcookie('p_token_val', $token_val, time() + 86400 * 730);
	}else{}
	$_SESSION[p_PU_userid]=$PU_userid;
	$_SESSION[p_token_val]=$token_val;

	f_alert('HanChain(HAN) & PayKhan(PKN) \n가입을 환영합니다.','/contents/paykhan/paykhan');


}else if($Query=="update"){	// 수정

	if($pwd){
	$pwd = md5($pwd);
	$sear_char.= " , pwd ='$pwd' ";
	}else{}

	//기본값 세팅
	if(!$pay_24 || $pay_24==''){$pay_24='24000';}
	if(!$pay_1 || $pay_1==''){$pay_1='2000';}
	if(!$pay_2 || $pay_2==''){$pay_2='2000';}
	if(!$pay_3 || $pay_3==''){$pay_3='2000';}
	if(!$pay_4 || $pay_4==''){$pay_4='2000';}
	if(!$pay_5 || $pay_5==''){$pay_5='2000';}

	$files='';
	for($i=1;$i<=9;$i++){
		$files.="/".${"fileN".$i.""};
	}

	$profile_title = str_replace("'", ' ', trim($profile_title));
	$profile_contents = str_replace("'", ' ', trim($profile_contents));

	if($petdol_ck=='Y'){// 펫돌일경우 평점매기기

		// 리스팅 사진 수
		$list_number=0;
		$Pfiles=explode("/",$files);
		for($i=3;$i<=count($Pfiles);$i++){
			if($Pfiles[$i] && $Pfiles[$i]!=''){
				$list_number++;
			}
		}

		// 선택박스 체크 수
		$box_number=0;
		$bomi_ck_arr=explode(",",$bomi_ck);
		for($i=1;$i<=count($bomi_ck_arr);$i++){
			if($bomi_ck_arr[$i] && $bomi_ck_arr[$i]!=''){
				$box_number++;
			}
		}

		// 프로필내용 낱말 수
		$text_number = str_replace(' ', '', trim($profile_contents));
		$text_number = mb_strlen($text_number,'utf-8');

		// 평점 5점만점
		$rate_max5 = 1+0.01*($text_number+($list_number*10)+($box_number*20));

		// 평점 100점만점
		$rate_max100 = 1+0.2*($text_number+($list_number*10)+($box_number*20));

		// 평점 추가 쿼리
		$rate_max = " , rate_max5 = '$rate_max5' , rate_max100 = '$rate_max100' ";

	}else{}

	query("UPDATE $table_name SET  view_ck = 'Y' , max_dole = '$max_dole' , year_dole = '$year_dole' , pay_24 = '$pay_24' , pay_1 = '$pay_1' , pay_2 = '$pay_2' , pay_3 = '$pay_3' , pay_4 = '$pay_4' , pay_5 = '$pay_5' , dog_kind = '$dog_kind' , dog_state_ck = '$dog_state_ck' , user_name ='$user_name' , hp ='$hp' , birth = '$birth' , zip ='$zip' , address1 ='$address1' , address2 ='$address2' , map_x ='$map_x' , map_y ='$map_y' , bomi_ck = '$bomi_ck' , petdol_ck ='$petdol_ck' , bank_name ='$bank_name' , bank_code ='$bank_code' , bank_account ='$bank_account' , bank_account_owner ='$bank_account_owner' , profile_title ='$profile_title' , profile_contents ='$profile_contents' , dog_ck ='$dog_ck' , dog_name ='$dog_name' , dog_sex ='$dog_sex' , dog_size ='$dog_size' , dog_birth ='$dog_birth' , files ='$files' $sear_char $rate_max WHERE hp='$_SESSION[p_hp]'");

	$_SESSION[p_hp]=$hp;

	f_alert('프로필 수정이 완료 되었습니다.','join_profile.php');

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
<?include "../../app/inc_head.php";

$table_name="Pka_Collection";

$files='';
for($i=1;$i<=9;$i++){
	$PU_files.="/".${"fileN".$i.""};
}

if($Query=="insert" && !$idx) {	// 등록

	$PU_email = trim($PU_email);
	$PU_subject = trim($PU_subject);
	$PU_contents = trim($PU_contents);

//	// 아이디 중복
//	$rows_count=f_row("select * from $table_name where PU_userid = '$PU_userid'");
//	if($rows_count>0){
//		msg("중복된 아이디 입니다. 다른 아이디로 가입을 진행해 주세요.");
//		exit;
//	}else{}

	// 휴대전화 중복
//	$rows_count=f_row("select * from $table_name where PU_phone = '$PU_phone'");
//	if($rows_count>0){
//		msg("중복된 휴대폰 번호입니다. 다른 번호로 가입을 진행해 주세요.");
//		exit;
//	}else{}

//	//중복확인쿼리(중복없을때까지 갱신)
//	$token_val_c = getString3();
//	while(1){		
//		$token_val_c_rows=f_array("select * from $table_name where token_val_c = '$token_val_c'"); // 중복 확인
//		if($token_val_c_rows){// 중복중
//			$token_val_c = getString3();	
//		}else{// 중복끝
//			break;
//		}
//	}

	query("INSERT INTO $table_name ( token_val , PU_email , PU_subject , PU_contents , PU_category , PU_open_ck , PU_open_email , PU_files , PU_joindate , PU_memo ) VALUES ( '$_SESSION[p_token_val]' , '$_SESSION[p_PU_email]' , '$PU_subject' , '$PU_contents' , '$PU_category' , '$PU_open_ck' , '$PU_open_email' , '$PU_files' , now() , '$PU_memo' )");

	f_alert('컬렉션이 등록되었습니다.','/contents/member/manage');


}else if($Query=="update"){	// 수정

	$PU_email = trim($PU_email);
	$PU_subject = trim($PU_subject);
	$PU_contents = trim($PU_contents);

	query("UPDATE $table_name SET PU_subject = '$PU_subject' , PU_contents = '$PU_contents' , PU_category = '$PU_category' , PU_open_ck = '$PU_open_ck' , PU_open_email = '$PU_open_email' , PU_files = '$PU_files' , PU_modifydate = now() WHERE PU_idx='$PU_idx'");

	f_alert('컬렉션이 수정되었습니다.','/contents/member/manage');

}else if($Query=="delete"){	// 삭제


	query("delete from $table_name where PU_idx='$PU_idx'");

	f_alert('컬렉션이 삭제되었습니다.','/contents/member/manage');


}else if($Query=="sort_update"){	// 순서변경
}
?>
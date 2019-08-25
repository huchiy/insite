<?
/**
*		게시글 등록, 수정
*/

include "../inc/inc_head.php";
include "../board/bbs_cf.php";

// 첨부파일 설정
// fileN 수정시 넘어온 실제 파일명 변수
// fileRN 수정시 넘어온 원본 파일명 변수
$filename="up_file";	// 넘어온 파일변수

/*	파일저장시 원본 파일명	*/
for($t=0;$t<$fileNum ;$t++ ){	
	if(${"fileRN".$t}){	 // 수정일때.
		if($_FILES["up_file".$t]["name"]){	 // 다른 이미지를 올릴때.
			$fileNames.=$_FILES["up_file".$t]["name"]."/";
		}else if($del_file[$t]){	// 삭제를 체크했을때.			
			$DelFiles=explode("///",$del_file[$t]);
			//echo$fileN_del[0]."<br>".$DelFiles[0];exit;
			// 밀리지 않게 하려면 ereg_replace 함수 가운데 '/' 추가.
			if($upfile_ck=="Y"){$sl="/";}
			else {$sl="";}
			$fileNames.=@ereg_replace($DelFiles[0]."/","$sl",$DelFiles[0]."/");			
		}else{	// 이미지는 유지.
			$fileNames.=${"fileRN".$t}."/";
		}
	}else{	// 처음 이미지등록.
		if($upfile_ck=="Y"){	// 파일 밀리지않게.
			$fileNames.=$_FILES["up_file".$t]["name"]."/";			
		}else {
			if($_FILES["up_file".$t]["name"]){$slash="/";}
			else{$slash="";}		
			$fileNames.=$_FILES["up_file".$t]["name"].$slash;
		}		
	}

	// 첨부파일 설명.	
	if(($_FILES["up_file".$t]["name"] || ${"fileRN".$t}) && !$del_file[$t]){
		$fcCk=$fileCm_ck[$t];
		if($fcCk=="Y"){
			$files_comments.=$files_comment[$t]."/%|789512364|%/";
		}else {
			$files_comments.="/%|789512364|%/";
		}
	}
}
//echo$fileNames;exit;

if($tbGubun){$tbGubun=$tbGubun;}else {$tbGubun=$tb_name;}

$subject=strip_tags($subject);

if($Query=="insert"){	//		글등록		//////////////////////////////////


	// 파일업로드
	$file_mode="insert";
	include $pgUp."inc/file.php";
	// 패밀리번호 구하기
	if(!$fno){
		$BIresult=query("select fno from wk_bbs_{$tb_name} order by fno desc limit 1");
		$max_fno=@mysql_result($BIresult,0,0);
		if(!$max_fno) $fno=1;
		else $fno=$max_fno+1;		
	}else {$Pages=$page;}
	// 답글순서 구하기
	if($thread){
		$BRresult=query("select thread,right(thread,1) from wk_bbs_{$tb_name} where fno='$fno' and length(thread)=length('$thread')+1 and locate('$thread',thread)=1 order by thread desc limit 1");
		$BRrow=num_rows($BRresult);
		if($BRrow){
			// row[0]에 thread필드값이 저장.
			// row[1]에는 thread필드값의 마지막 한글자가 저장.
			$row=mysql_fetch_row($BRresult);	//하나의 레코드를 가져온다.
			$first_thread=substr($row[0],0,-1);	//뒤에서 한글자를 삭제.(ex : AAB => AA)
			$last_thread=++$row[1];					//마지막 글자의 다음 순서로...(ex : B => C)
			$reply_thread=$first_thread.$last_thread;
		}else{
			$reply_thread=$thread."A";
		}
	}else {$reply_thread="A";}
	// 로그인시 이름,비밀번호,이메일 자동으로 등록.
	if($_SESSION[p_id]){
		$user_name=$_SESSION[p_name];
		if($tb_name!="expert"){$email=$_SESSION[p_email];}
		if($secret=="Y" && $Aidx){	// 비밀글에서 관리자 답변시 비밀번호를 원글과 같게
			$A_pwd=f_array("select pwd from wk_bbs_{$tb_name} where idx='$Aidx'");
			$pwd=$A_pwd[0];
		}else {$pwd=$_SESSION[p_pwd];}
		$pass="'$pwd'";
	}else {$pass="password('$pwd')";}
	if(!$secret){$secret="N";}
	// 게시글 노출설정
	if($view_ck){$view_ck=$view_ck;}
	else {if($list_view_ck=="Y"){$view_ck="N";}else {$view_ck="Y";}}	
	//공지사항 체크 안할시
	if(!$notice){$notice='N';}
	// 문의하기 상태수정
	if($bbs_skin=='customer'){$email=$_POST[email]; $in_query=" , answer_ck , q_gubun , hp ";}
	if($bbs_skin=='customer'){$in_query_v=" , '$answer_ck' , '$q_gubun' , '$hp' ";}
	// 수동날짜
	if(!$reg_date){ $reg_date='now()'; }	else{ $reg_date="'".$reg_date." 00:00:00'"; $time= strtotime( $reg_date );}			

	// 글등록
	query("INSERT INTO wk_bbs_{$tb_name} ( category , indexNo , user_id , user_name , user_level , nickName , email , pwd , subject , html , content , linkUrl , movie , hit , recom , recom_id , notice , secret $in_query , view_ck , fileName , files , files_comment , fno , thread , user_ip , reg_date , date_tm , pg_gb , tb_gubun , sort_num ) VALUES ( '$category' , '$_SESSION[p_site_id]' , '$_SESSION[p_id]' , '$user_name' , '$_SESSION[p_level]' , '$nickName' , '$email' , $pass , '$subject' , '$html' , '$content' , '$linkUrl' , '$movie' , '0' , '0' , '/' , '$notice' , '$secret' $in_query_v , '$view_ck' , '$fileNames' , '$up_file_name' , '$files_comments' , '$fno' , '$reply_thread' , '$user_ip' , '$time' , $reg_date , 'PC' , '$tbGubun' , '0' )");	
	if($bbs_skin=='customer'){

	function send_mail_with_file($from_email,$from_name,$to_email,$mail_subject,$body,$file){ 

		if (strlen($to_email)==0) return 0; 
		$mailheaders .= "From: =?utf-8?B?".base64_encode($from_name)."?=<".$from_email."> \r\n"; 
		$mailheaders .= "Reply-To: =?utf-8?B?".base64_encode($from_name)."?=<".$from_email."> \r\n"; 
		$mailheaders .= "Return-Path: =?utf-8?B?".base64_encode($from_name)."?=<".$from_email."> \r\n";

		if ($file[size]>0) { 
			
			$file_name =explode("/" , $file['name']);	
			$boundary = uniqid("part"); 
			if (strlen($file[type])==0) $file[type] = "application/octet-stream"; 

			$mailheaders .= "MIME-Version: 1.0\r\n"; 
			$mailheaders .= "Content-Type: Multipart/mixed; boundary = \"".$boundary."\""; 

			$bodytext = "This is a multi-part message in MIME format.\r\n\r\n"; 
			$bodytext .= "--".$boundary."\r\n"; 
			$bodytext .= "Content-Type: text/html; charset=\"utf-8\"\r\n"; 
			$bodytext .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
			$bodytext .= chunk_split(base64_encode($body))."\r\n\r\n";

			$bodytext .= "--".$boundary."\r\n"; 
			$bodytext .= "Content-Type: ".$file[type]."; name=\"".$file_name[0]."\"\r\n"; 
			$bodytext .= "Content-Transfer-Encoding: base64\r\n"; 
			$bodytext .= "Content-Disposition: attachment; filename=\"".$file_name[0]."\"\r\n\r\n"; 

			$file['data'] = file_get_contents($file['tmp_name']); // 파일 내용 읽기 4.3 이상
			$bodytext .= chunk_split(base64_encode($file[data]))."\r\n\r\n"; 

			$bodytext .= "--".$boundary."--";
		} else { 

			$boundary = uniqid("part"); 

			$mailheaders .= "MIME-Version: 1.0\r\n"; 
			$mailheaders .= "Content-Type: Multipart/mixed; boundary = \"".$boundary."\""; 

			$bodytext = "This is a multi-part message in MIME format.\r\n\r\n"; 
			$bodytext .= "--".$boundary."\r\n"; 
			$bodytext .= "Content-Type: text/html; charset=\"utf-8\"\r\n"; 
			$bodytext .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
			$bodytext .= chunk_split(base64_encode($body))."\r\n\r\n";

			$bodytext .= "--".$boundary."--";
		}
		if(!mail($to_email,"=?utf-8?B?".base64_encode($mail_subject)."?=",$bodytext,$mailheaders)) {return 0;} 
		return 1; 
	} 

	$from_email = $email; 
	$to_email1 = 'min@my815.com';
	$to_email2 = 'in@my815.com';
	$from_name = $user_name; 
	$mail_subject = '[구로노인] 제품문의';
	$body = "<font style='font-size:18px;color:blue;'>문의내용 : ".$subject."</font><br/><font style='font-size:14px;'>이름 : ".$user_name."&nbsp;&nbsp;&nbsp;전화번호 : ".$hp."</font><br/><br/>".$content."";
	$file = $_FILES['up_file0'];

	//echo $from_email."".$from_name."".$to_email1."".$mail_subject."".$body."".$file;
	//send_mail_with_file($from_email, $from_name, $to_email1, $mail_subject, $body, $file); //smtp서버 작동시 작동
	//send_mail_with_file($from_email, $from_name, $to_email2, $mail_subject, $body, $file);
		f_alert("문의완료되었습니다.","$PageURL&bbs_section=write");
	}else{
		go("$PageURL&bbs_section=list");
	}


}else if($Query=="update"){	//		글수정		/////////////////////////////


	$oriname="fileN";
	$file_mode="update";
	include $pgUp."inc/file.php";
	// 로그인시 이름,비밀번호,이메일 자동으로 등록.
	if($_SESSION[p_id]){	// 로그인시 자동으로 등록.
		$user_name=$_SESSION[p_name];
		if($tb_name!="expert"){$email=$_SESSION[p_email];}
		$pwd=$_SESSION[p_pwd];
		$pass="'$pwd'";
	}else {$pass="password('$pwd')";}
	//if($secret){$up_query.=" , secret = '$secret'";}
	if($view_ck){$up_query.=" , view_ck = '$view_ck'";}

	//공지사항 체크 안할시
	if(!$notice){$notice='N';}
	// 비밀글
	if(!$secret){$secret='N';}
	// 전문가리스트
	if($tb_name=="expert"){$up_query.=" , hp = '$hp'";}
	// 수동날짜
	if($reg_date){ $reg_date=$reg_date." 00:00:00"; $time= strtotime( $reg_date ); $up_query.= " , reg_date = '$time' , date_tm = '$reg_date' "; }

	query("UPDATE wk_bbs_{$tb_name} SET category = '$category' , user_name = '$user_name' , nickName = '$nickName' , email = '$email' , pwd = $pass , subject = '$subject' , html = '$html' , content = '$content' , linkUrl = '$linkUrl' , movie = '$movie' , notice = '$notice' , secret = '$secret' $up_query , fileName = '$fileNames' , files = '$up_file_name' , files_comment = '$files_comments' , pg_gb = 'PC' , tb_gubun = '$tbGubun' WHERE idx ='$idx'");
	if($tb_name=="ko_as" || $tb_name=="ko_faq"){
	go("$PageURL&Ctg=$category&idx=$idx&page=$page");
	}else{
	go("$PageURL&bbs_section=view&Ctg=$category&idx=$idx&page=$page");
	}

}else if($Query=="delete"){	//		글삭제		////////////////////////////

//echo "select * from wk_bbs_{$tb_name} where idx='$idx' $passCk";
	if(strstr($Wlevel,"10/") && !$_SESSION[p_id]){	// 로그아웃시 비밀번호 확인후 삭제
		$passCk=" and pwd = password('$pwd')";
	}
	$Dtrows=f_array("select * from wk_bbs_{$tb_name} where idx='$idx' $passCk");
	if($Dtrows){
		if($delete_ck=="Y" && $Dtrows[thread]=="A"){	//답변글이 있으면 답변글까지 삭제.

			$AllDelresult=query("select * from wk_bbs_{$tb_name} where fno='$Dtrows[fno]'");
			while ($AllDelrows=fetch_array($AllDelresult)) {
				$DFiles=explode("/",$AllDelrows[files]);
				for($i=0;$i<sizeof($DFiles)-1 ;$i++ ){
					if ($DFiles[$i]) {
						if(file_exists($folder.$DFiles[$i])) {@unlink($folder.$DFiles[$i]);@unlink($folder."S".$DFiles[$i]);}
					}
				}
				query("delete from wk_bbs_{$tb_name} where idx='$AllDelrows[idx]'");		// 게시글 삭제.
				query("delete from wk_bbs_{$tb_name}_comment where Bidx='$AllDelrows[idx]'");	// 댓글삭제.
			}
			f_go("$PageURL&bbs_section=list&Ctg=$Ctg&page=$page");

		}else {//해당글만 삭제.

			$DFrows=f_array("select * from wk_bbs_{$tb_name} where idx='$idx'");
			$DFiles=explode("/",$DFrows[files]);
			for($i=0;$i<sizeof($DFiles)-1 ;$i++ ){
				if ($DFiles[$i]) {
					if(file_exists($folder.$DFiles[$i])) {@unlink($folder.$DFiles[$i]);@unlink($folder."S".$DFiles[$i]);}
				}
			}
			query("delete from wk_bbs_{$tb_name} where idx='$idx'");// 게시글 삭제.
			query("delete from wk_bbs_{$tb_name}_comment where Bidx='$idx'");	// 댓글삭제.		
			f_go("$PageURL&bbs_section=list&Ctg=$Ctg&page=$page");

		}
	}else {
		msg("비밀번호가 일치하지 않습니다.");exit;
	}


}else if($Query=="selectDel"){	//		선택삭제		////////////////////////


	for($i=0;$i<sizeof($check) ;$i++ ){
		if($check[$i]){
			$DFrows=f_array("select * from wk_bbs_{$tb_name} where idx='$check[$i]'");
			$DFiles=explode("/",$DFrows[files]);
			for($j=0;$j<sizeof($DFiles)-1 ;$j++ ){
				if ($DFiles[$j]) {
					if(file_exists($folder.$DFiles[$j])) {@unlink($folder.$DFiles[$j]);@unlink($folder."S".$DFiles[$j]);}
				}
			}
			query("delete from wk_bbs_{$tb_name} where idx='$check[$i]'");		// 게시글 삭제.
			query("delete from wk_bbs_{$tb_name}_comment where Bidx='$check[$i]'");// 댓글삭제.
		}
	}
	go("$PageURL&bbs_section=list&Ctg=$Ctg&page=$page");


}else if($Query=="move_copy"){	//	게시글 이동,복사		///////////////////


	$chks=explode("/",$check);
	for($j=0;$j<sizeof($chks)-1 ;$j++ ){
		$mc_rows=f_array("select * from wk_bbs_{$tb_name} where idx='$chks[$j]'");
		$fileMV=explode("/",$mc_rows[files]);	
		// 같은 게시판이 아닐때 선택게시글 이동,복사	
		if($mc_rows[tb_name] != $mc_tb_name){			
			// 파일 이동,복사
			for($i=0;$i<sizeof($fileMV) ;$i++ ){
				if($fileMV[$i]){
					/*	파일이동	*/
					if($mvBck=="M"){
						exec("mv -f {$pgUp}files/bbs_{$mc_rows[tb_name]}/$fileMV[$i] {$pgUp}files/$mc_tb_name/$fileMV[$i]");						
					}
					/*	파일복사	*/
					else if($mvBck=="C"){
						exec("cp -b {$pgUp}files/bbs_{$mc_rows[tb_name]}/$fileMV[$i] {$pgUp}files/$mc_tb_name/$fileMV[$i]");									
					}								
				}
			}
			// fno값 다시설정
			$BIresult=query("select fno from wk_bbs_{$mc_tb_name} order by fno desc limit 1");
			$max_fno=@mysql_result($BIresult,0,0);
			if(!$max_fno) $fno=1;
			if(!$reg_date){ $reg_date='now()'; }			
			else $fno=$max_fno+1;			
			query("INSERT INTO wk_bbs_{$mc_tb_name} ( category , indexNo , user_id , user_name , user_level , nickName , email , pwd , subject , html , content , linkUrl , movie , hit , recom , recom_id , notice , secret , view_ck , fileName , files , files_comment , fno , thread , user_ip , reg_date , date_tm , tb_gubun , sort_num ) VALUES ( '' , '$mc_rows[indexNo]' , '$mc_rows[user_id]' , '$mc_rows[user_name]' , '$mc_rows[user_level]' , '$mc_rows[nickName]' , '$mc_rows[email]' , '$mc_rows[pwd]' , '$mc_rows[subject]' , '$mc_rows[html]' , '$mc_rows[content]' , '$mc_rows[linkUrl]' , '$mc_rows[movie]' , '$mc_rows[hit]' , '$mc_rows[recom]' , '$mc_rows[recom_id]' , '$mc_rows[notice]' , '$mc_rows[secret]' , '$mc_rows[view_ck]' , '$mc_rows[fileName]' , '$mc_rows[files]' , '$mc_rows[files_comment]' , '$fno' , 'A' , '$mc_rows[user_ip]' , $time , $reg_date , '$tbGubun' , '0' )");
			// 이동일때 현재 게시판에 게시글 삭제
			if($mvBck=="M"){
					$DFrows=f_array("select * from wk_bbs_{$tb_name} where idx='$chks[$j]'");
					$DFiles=explode("/",$DFrows[files]);
					for($i=0;$i<sizeof($DFiles)-1 ;$i++ ){
						if ($DFiles[$i]) {
							if(file_exists($folder.$DFiles[$i])) {@unlink($folder.$DFiles[$i]);@unlink($folder."S".$DFiles[$i]);}
						}
					}
					// 게시글 삭제.
					query("delete from wk_bbs_{$tb_name} where idx='$chks[$j]'");
					// 댓글삭제.
					query("delete from wk_bbs_{$tb_name}_comment where Bidx='$chks[$j]'");
			}
		}
	}
	p_reload();	
	if($mvBck=="M"){$mg="이동";}else if($mvBck=="C"){$mg="복사";}
	msg("게시글이 {$mg} 되었습니다.");
	self_close();


}else if($Query=="write" || $Query=="view"){	//		글수정, 비밀글보기		/////


	$Dtrows=f_array("select * from wk_bbs_{$tb_name} where idx='$idx' and pwd = password('$pwd')");
	if($Dtrows){
		//f_go("$PageURL&bbs_section=$bbs_section&Ctg=$Ctg&idx=$idx&page=$page&");		
		form_act("$rt_page","tb_name=$tb_name&bbs_section=$bbs_section&Ctg=$Ctg&idx=$idx&page=$page&ps_ck=Y","P");		
	}else {msg("비밀번호가 일치하지 않습니다.");exit;}


}else if($Query=="re_insert"){	//		댓글등록		////////////////////////


	if($_SESSION[p_id]){	// 로그인시 자동으로 등록.
		$user_name=$_SESSION[p_name];
		$pwd=$_SESSION[p_pwd];
		$pass="'$pwd'";
	}else {$pass="password('$pwd')";}
	if(!$user_name && !$pwd){msg("로그아웃 되었습니다.\n다시로그인하세요.");exit;}
	// 댓글 노출설정
	if($view_ck){$view_ck=$view_ck;}
	else {if($rp_view_ck=="Y"){$view_ck="N";}else {$view_ck="Y";}}
	query("INSERT INTO wk_bbs_{$tb_name}_comment ( Bidx , indexNo , fb_tw_do , user_id , user_name , nickName , pwd , content , view_ck , user_ip , reg_date , date_tm ) VALUES ( '$idx' , '$_SESSION[p_site_id]' , '$fb_tw' , '$_SESSION[p_id]' , '$user_name' , '$_SESSION[p_nick]' , $pass , '$content' , '$view_ck' , '$user_ip' , '$time' , now() )");	
	f_go("$PageURL&bbs_section=view&Ctg=$Ctg&idx=$idx&keyfield=$keyfield&key=$key");


}else if($Query=="re_update"){	//		댓글수정		////////////////////////


	if($_SESSION[p_id]){	// 로그인시 자동으로 등록.
		$pwd=$_SESSION[p_pwd];
		$pass="'$pwd'";
	}else {$pass="password('$pwd')";}
	if(!$user_name && !$pwd){msg("로그아웃 되었습니다.\n다시로그인하세요.");exit;}
	if($view_ck){$up_query=" , view_ck = '$view_ck'";}
	query("UPDATE wk_bbs_{$tb_name}_comment SET pwd = $pass , content = '$content' $up_query WHERE idx = '$Ridx'");
	go("$PageURL&bbs_section=view&Ctg=$Ctg&idx=$idx&keyfield=$keyfield&key=$key");


}else if($Query=="re_delete"){	//		댓글삭제		////////////////////////

	if(!$_SESSION[p_level]){msg("로그아웃 되었습니다.\n다시로그인하세요.");exit;}
	query("delete from wk_bbs_{$tb_name}_comment where idx='$Ridx'");
	go("$PageURL&bbs_section=view&Ctg=$Ctg&idx=$idx&page=$page&keyfield=$keyfield&key=$key");


}else if($Query=="re_check_modify"){	//		댓글수정 비밀번호 확인		/////////


	$recomCk=f_array("select * from wk_bbs_{$tb_name}_comment where idx='$Ridx' and pwd = password('$pass')");
	if($recomCk){
		go("$PageURL&bbs_section=view&Ctg=$Ctg&idx=$idx&page=$page&keyfield=$keyfield&key=$key&Ridx=$Ridx");
	}else {back("비밀번호가 일치하지 않습니다.");}


}else if($Query=="re_check_delete"){	//		댓글삭제 비밀버호 확인		/////////


	$recomCk=f_array("select * from wk_bbs_{$tb_name}_comment where idx='$Ridx' and pwd = password('$pass')");
	if($recomCk){
		query("delete from wk_bbs_{$tb_name}_comment where idx='$Ridx'");
		go("$PageURL&bbs_section=view&Ctg=$Ctg&idx=$idx&page=$page&keyfield=$keyfield&key=$key");
	}else {back("비밀번호가 일치하지 않습니다.");}


}else if($Query=="rcom_insert"){	//	추천등록		////////////////////////


	$re_query="select * from wk_bbs_{$tb_name} where idx='$idx'";
	$recomNum=n_rows("$re_query and recom_id like '%/$_SESSION[p_id]/%'");
	if($recomNum){
		msg("이미 추천 하셨습니다.");exit;
	}else {
		$recom_ck=f_array($re_query);
		$Pids=$recom_ck[recom_id].$_SESSION[p_id]."/";
		query("UPDATE wk_bbs_{$tb_name} SET recom = recom+1 , recom_id='$Pids' WHERE idx = '$idx'");
		f_alert("추천되었습니다.","$PageURL&bbs_section=view&Ctg=$Ctg&idx=$idx&keyfield=$keyfield&key=$key");
	}


}
?>
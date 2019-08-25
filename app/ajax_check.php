<?include "inc_head.php";

/**
*		관리자페이지
*/
if($checkName=="adm_lf_ck"){	// 관리자 자측메뉴 펼침, 숨김


	query("update wk_member set adm_lf_ck='$adm_ck_g' where user_id='$_SESSION[p_id]'");


}else if($checkName=="google_login"){	// 구글 로그인 및 회원가입



	if(preg_match("/[^0-9a-z_]+/i", $PU_userid)) {	// 영문과 숫자만
		echo "10";
	}else {
		$id_row=f_array("select * from Pka_User where PU_userid='$PU_userid'");
		if($id_row){// 이미 존재하는 아이디 로그인
			// 최근로그인시간 저장.
			query("update Pka_User set PU_email = '$PU_email' , PU_name = '$PU_name' , PU_Imageurl = '$PU_Imageurl' , PU_logindate=now() where token_val = '$_SESSION[p_token_val]'");
			
			$_SESSION[p_PU_idx]=$id_row[PU_idx];
			$_SESSION[p_PU_userid]=$id_row[PU_userid];
			$_SESSION[p_PU_email]=$id_row[PU_email];
			$_SESSION[p_token_val]=$id_row[token_val];

			echo "ok1";
		}else{// 새로가입

			//중복확인쿼리(중복없을때까지 갱신)
			$token_val = getString3();
			while(1){		
				$token_rows=f_array("select * from Pka_User where token_val = '$token_val'"); // 중복 확인
				if($token_rows){// 중복중
					$token_val = getString3();	
				}else{// 중복끝
					break;
				}
			}
			query("INSERT INTO Pka_User ( token_val , PU_userid , PU_email , PU_name , PU_Imageurl , PU_joindate ) VALUES ( '$token_val' , '$PU_userid' , '$PU_email' , '$PU_name' , '$PU_Imageurl' , now() )");

			$id_row=f_array("select * from Pka_User where PU_userid='$PU_userid'");
			
			$_SESSION[p_PU_idx]=$id_row[PU_idx];
			$_SESSION[p_PU_userid]=$PU_userid;
			$_SESSION[p_PU_email]=$PU_email;
			$_SESSION[p_token_val]=$token_val;

			echo "ok";
		}
	}


}else if($checkName=="open_graph_get"){	// open graph 가져오기

	$http_ck = strpos( $url , 'http' );
	if($http_ck === false) {
		$url = 'http://'.$url;
	} else {
		$url = $url;
	}
	libxml_use_internal_errors(true);
	$c = file_get_contents($url);
	$d = new DomDocument();
	$d->loadHTML($c);
	$xp = new domxpath($d);
	$ogtitle = '';
	$ogdescription = '';
	$ogimage = '';
	foreach ($xp->query("//meta[@property='og:title']") as $el) {
			 $ogtitle = $el->getAttribute("content");
	}
	foreach ($xp->query("//meta[@property='og:description']") as $el) {
			 $ogdescription = $el->getAttribute("content");
	}
	foreach ($xp->query("//meta[@property='og:image']") as $el) {
			 $ogimage = $el->getAttribute("content");
	}

	echo "ok///".$ogtitle."///".$ogdescription."///".$ogimage;


}else if($checkName=="reply_write"){	// 댓글 등록



	if(!$_SESSION[p_token_val]){// 세션끊김
		echo "10";
	}else {
		if($Query=='update'){// 수정
			query("update Pka_Bookmark_comment set PU_contents = '$PU_contents' , PU_modifydate=now() where PC_idx = '$PC_idx'");

			echo "ok1";
		}else{// 등록
			query("INSERT INTO Pka_Bookmark_comment ( PB_idx , PU_idx , token_val , PU_contents , PU_modifydate ) VALUES ( '$PB_idx' , '$PU_idx' , '$_SESSION[p_token_val]' , '$PU_contents' , now() )");

			echo "ok";
		}
	}



}else if($checkName=="reply_del"){	// 댓글 삭제



	if(!$_SESSION[p_token_val]){// 세션끊김
		echo "10";
	}else {
		if($PC_idx){// 글번호 있음
			query("delete from Pka_Bookmark_comment where PC_idx = '$PC_idx' and token_val = '$_SESSION[p_token_val]'");

			echo "ok";
		}else{// 글번호 없음
			echo "20";
		}
	}



}else if($checkName=="user_withdraw"){	// 회원탈퇴


		$rows = f_array("select * from wk_member where token_val = '$_SESSION[p_token_val]' order by reg_date desc");

		if($rows[token_val]){

			// 매칭 검색
			$rows_reservation=f_array("select * from petdol_reservation where (1=1) and (petdolbomi_hp = '$rows[hp]' || buyer_hp = '$rows[hp]') order by toReservation desc");

			if(date('Y-m-d H:i:s')>=$rows_reservation[toReservation]." ".$rows_reservation[totime]."00:00"){// 예약 날짜 시간 지난 후부터 탈퇴가능

				if($rows[adm_level]<=3){// 관리자 탈퇴 금지
					echo 'no3///';
				}else{

					query("INSERT INTO wk_withdraw ( token_val , rate_max5 , rate_max100 , user_id , pwd , nick_name , user_name , user_ename , jumin1 , jumin2 , birth , sex , tel , hp , direct_tel , sms_ck , email , email_ck , zip , address1 , address2 , map_x , map_y , max_dole , year_dole , career , part , part_ct , position , work , rank , work_area , motto , home_url , career_cnt , comment , introduce_ck , sort_num , in_day , out_day , withdraw , state , user_level , adm_level , adm_pre , adm_lf_ck , user_ip , pg_gb , petdol_ck , fromtime , totime , pay_24 , pay_1 , pay_2 , pay_3 , pay_4 , pay_5 , bank_name , bank_code , bank_account , bank_account_owner , profile_title , profile_contents , ck_1 , ck_2 , ck_3 , ck_4 , ck_5 , dog_ck , dog_name , dog_kind , dog_sex , dog_size , dog_age , dog_birth , dog_state_ck , bomi_ck , channel , dog_ck1 , dog_ck2 , dog_ck3 , dog_ck4 , dog_ck5 , dog_ck6 , dog_ck7 , dog_ck8 , dog_ck9 , dog_ck10 , view_ck , fileName , files , login_time , logout_time , modify_date , reg_date ) VALUES ( '$rows[token_val]' , '$rows[rate_max5]' , '$rows[rate_max100]' , '$rows[user_id]' , '$rows[pwd]' , '$rows[nick_name]' , '$rows[user_name]' , '$rows[user_ename]' , '$rows[jumin1]' , '$rows[jumin2]' , '$rows[birth]' , '$rows[sex]' , '$rows[tel]' , '$rows[hp]' , '$rows[direct_tel]' , '$rows[sms_ck]' , '$rows[email]' , '$rows[email_ck]' , '$rows[zip]' , '$rows[address1]' , '$rows[address2]' , '$rows[map_x]' , '$rows[map_y]' , '$rows[max_dole]' , '$rows[year_dole]' , '$rows[career]' , '$rows[part]' , '$rows[part_ct]' , '$rows[position]' , '$rows[work]' , '$rows[rank]' , '$rows[work_area]' , '$rows[motto]' , '$rows[home_url]' , '$rows[career_cnt]' , '$rows[comment]' , '$rows[introduce_ck]' , '$rows[sort_num]' , '$rows[in_day]' , '$rows[out_day]' , '$rows[withdraw]' , '$rows[state]' , '$rows[user_level]' , '$rows[adm_level]' , '$rows[adm_pre]' , '$rows[adm_lf_ck]' , '$rows[user_ip]' , '$rows[pg_gb]' , '$rows[petdol_ck]' , '$rows[fromtime]' , '$rows[totime]' , '$rows[pay_24]' , '$rows[pay_1]' , '$rows[pay_2]' , '$rows[pay_3]' , '$rows[pay_4]' , '$rows[pay_5]' , '$rows[bank_name]' , '$rows[bank_code]' , '$rows[bank_account]' , '$rows[bank_account_owner]' , '$rows[profile_title]' , '$rows[profile_contents]' , '$rows[ck_1]' , '$rows[ck_2]' , '$rows[ck_3]' , '$rows[ck_4]' , '$rows[ck_5]' , '$rows[dog_ck]' , '$rows[dog_name]' , '$rows[dog_kind]' , '$rows[dog_sex]' , '$rows[dog_size]' , '$rows[dog_age]' , '$rows[dog_birth]' , '$rows[dog_state_ck]' , '$rows[bomi_ck]' , '$rows[channel]' , '$rows[dog_ck1]' , '$rows[dog_ck2]' , '$rows[dog_ck3]' , '$rows[dog_ck4]' , '$rows[dog_ck5]' , '$rows[dog_ck6]' , '$rows[dog_ck7]' , '$rows[dog_ck8]' , '$rows[dog_ck9]' , '$rows[dog_ck10]' , '$rows[view_ck]' , '$rows[fileName]' , '$rows[files]' , '$rows[login_time]' , '$rows[logout_time]' , '$rows[modify_date]' , now() )");

					query("delete from wk_member where token_val = '$rows[token_val]'");	 // 큐삭제

					echo "ok///";
				}
			}else{//시간 안지남
				echo "no1///";
			}

		}else{
			echo 'no4///';
		}


}else if($checkName=="phone_apply_mypage"){	// 페이칸 국제 휴대폰 번호 인증 마이페이지

	$apply_val = getString_num(); // 인증번호생성

	/* 쿨sms 메세지 전송 */
	$to = $PU_phone;// 받는분
	$from = "01096495377";// 보내는분
	$country = $PU_country;// 국가
	$text = "PayKhan 개인정보수정 인증번호 [".$apply_val."]를 입력해주세요.";// 메세지내용
	simple_msg($to, $from, $country, $text);
	/* 쿨sms 메세지 전송 */

	echo 'ok///'.$apply_val;



}else if($checkName=="phone_apply"){	// 페이칸 국제 휴대폰 번호 인증

	$apply_val = getString_num(); // 인증번호생성

	/* 쿨sms 메세지 전송 */
	$to = $PU_phone;// 받는분
	$from = "01096495377";// 보내는분
	$country = $PU_country;// 국가
	$text = "PayKhan 회원가입 인증번호 [".$apply_val."]를 입력해주세요.";// 메세지내용
	simple_msg($to, $from, $country, $text);
	/* 쿨sms 메세지 전송 */

	echo 'ok///'.$apply_val;


}else if($checkName=="phone_apply_id_find"){	// 페이칸 국제 휴대폰 번호 인증 아이디 찾기


	if(preg_match("/[^0-9a-z_]+/i", $PU_phone)) {	// 영문과 숫자만
		echo "10";
	}else {
		$id_row=f_array("select * from Pka_User where PU_phone='$PU_phone'");
		if($id_row){// 있음
			

			$apply_val = getString_num(); // 인증번호생성

			/* 쿨sms 메세지 전송 */
			$to = $PU_phone;// 받는분
			$from = "01096495377";// 보내는분
			$country = $PU_country;// 국가
			$text = "PayKhan 아이디 찾기 인증번호 [".$apply_val."]를 입력해주세요.";// 메세지내용
			simple_msg($to, $from, $country, $text);
			/* 쿨sms 메세지 전송 */

			echo "ok///".$apply_val."///".$id_row[PU_userid];

		}else {echo "20";}// 없음
	}


}else if($checkName=="phone_apply_pwd_change"){	// 페이칸 비밀번호 변경


	if(preg_match("/[^0-9a-z_]+/i", $PU_phone)) {	// 영문과 숫자만
		echo "10";
	}else {
		$id_row=f_array("select * from Pka_User where PU_phone='$PU_phone'");
		if($id_row){// 있음
			
			$PU_passwd = trim($PU_passwd);

			$PU_passwd = md5($PU_passwd);

			query("UPDATE Pka_User SET PU_passwd ='$PU_passwd' WHERE PU_phone = '$PU_phone'");

			echo "ok///";

		}else {echo "20";}// 없음
	}



}else if($checkName=="phone_recom_apply"){	// 페이칸 국제 휴대폰 번호 인증(제휴)

	$apply_val = getString_num(); // 인증번호생성

	/* 쿨sms 메세지 전송 */
	$to = $partner_userid;// 받는분
	$from = "01096495377";// 보내는분
	$country = '82';// 국가
	$text = "PayKhan 회원가입 제휴사 인증번호 [".$apply_val."]를 입력해주세요.";// 메세지내용
	simple_msg($to, $from, $country, $text);
	/* 쿨sms 메세지 전송 */

	echo 'ok///'.$apply_val;



}else if($checkName=="id_chk"){	// 아이디 검색


	if(preg_match("/[^0-9a-z_]+/i", $user_id)) {	// 영문과 숫자만
		echo "10";
	}else {
		$id_row=n_rows("select * from Pka_User where PU_userid='$user_id'");
		if($id_row){echo "20";}// 이미 존재하는 아이디
		else {echo "Y";}// 사용가능
	}



}else if($checkName=="id_find"){	// 아이디 찾기


	if(preg_match("/[^0-9a-z_]+/i", $PU_phone)) {	// 영문과 숫자만
		echo "10";
	}else {
		$id_row=f_array("select * from Pka_User where PU_phone='$PU_phone'");
		if($id_row){echo "ok///".$id_row[PU_userid];}// 있음
		else {echo "no";}// 없음
	}




}else if($checkName=="follow"){	// 프로필 팔로우


	if(preg_match("/[^0-9a-z_]+/i", $PU_follow_token_val)) {	// 영문과 숫자만
		echo "10";
	}else if(!$_SESSION[p_token_val]){// 세션끊김
		echo "50";
	}else {
		$rows_following=f_array("select * from Pka_User where token_val='$PU_follow_token_val'");// 팔로잉할 대상
		$rows_me=f_array("select * from Pka_User where token_val='$_SESSION[p_token_val]'");// 자신

		if($rows_following[PU_followers]){// 팔로워 컬럼 있음
			$PU_followers_arr = array_decode($rows_following[PU_followers]);
			$PU_followers_ck = in_array($_SESSION[p_PU_idx], $PU_followers_arr);
		}
		if($rows_me[PU_following]){// 자신 팔로잉 컬럼 있음
			$PU_following_arr = array_decode($rows_me[PU_following]);
			$PU_following_ck = in_array($rows_following[PU_idx], $PU_following_arr);
		}

		if($rows_following){// 팔로잉할 대상 유무
			
			if($rows_following[PU_followers]){// 팔로워 컬럼 있음
				if($PU_followers_ck){// 팔로잉 중 -> 언팔로잉

					$PU_followers_ck = array_search($_SESSION[p_PU_idx], $PU_followers_arr);
					unset($PU_followers_arr[$PU_followers_ck]);
					$PU_followers_arr = array_values($PU_followers_arr);
					$PU_followers_arr = array_encode($PU_followers_arr);

					// 팔로잉 대상 팔로워 업데이트
					query("UPDATE Pka_User SET PU_followers = '$PU_followers_arr' WHERE token_val='$PU_follow_token_val'");

					if($rows_me[PU_following]){// 팔로잉 컬럼 있음
						$PU_following_ck = array_search($rows_following[PU_idx], $PU_following_arr);
						unset($PU_following_arr[$PU_following_ck]);
						$PU_following_arr = array_values($PU_following_arr);
						$PU_following_arr = array_encode($PU_following_arr);
					}else{// 팔로잉 컬럼 없음
					}
					// 자신 팔로잉 업데이트
					query("UPDATE Pka_User SET PU_following = '$PU_following_arr' WHERE token_val='$_SESSION[p_token_val]'");

					echo "ok1";

				}else{
					array_push($PU_followers_arr, $_SESSION[p_PU_idx]);
					$PU_followers_arr = array_values($PU_followers_arr);
					$PU_followers_arr = array_encode($PU_followers_arr);

					// 팔로잉 대상 팔로워 업데이트
					query("UPDATE Pka_User SET PU_followers = '$PU_followers_arr' WHERE token_val='$PU_follow_token_val'");
					
					if($rows_me[PU_following]){// 팔로잉 컬럼 있음
						array_push($PU_following_arr, $rows_following[PU_idx]);
						$PU_following_arr = array_values($PU_following_arr);
						$PU_following_arr = array_encode($PU_following_arr);
					}else{// 팔로잉 컬럼 없음
						$PU_following_arr = [];
						array_push($PU_following_arr, $rows_following[PU_idx] );
						$PU_following_arr = array_values($PU_following_arr);
						$PU_following_arr = array_encode($PU_following_arr);
					}
					// 자신 팔로잉 업데이트
					query("UPDATE Pka_User SET PU_following = '$PU_following_arr' WHERE token_val='$_SESSION[p_token_val]'");

					echo "ok";
				}
			}else{// 팔로워 컬럼 없음
				$PU_followers_arr = [];
				array_push($PU_followers_arr, $_SESSION[p_PU_idx] );
				$PU_followers_arr = array_values($PU_followers_arr);
				$PU_followers_arr = array_encode( $PU_followers_arr );

				// 팔로잉 대상 팔로워 업데이트
				query("UPDATE Pka_User SET PU_followers = '$PU_followers_arr' WHERE token_val='$PU_follow_token_val'");

				if($rows_me[PU_following]){// 팔로잉 컬럼 있음
					array_push($PU_following_arr, $rows_following[PU_idx]);
					$PU_following_arr = array_values($PU_following_arr);
					$PU_following_arr = array_encode($PU_following_arr);
				}else{// 팔로잉 컬럼 없음
					$PU_following_arr = [];
					array_push($PU_following_arr, $rows_following[PU_idx] );
					$PU_following_arr = array_values($PU_following_arr);
					$PU_following_arr = array_encode($PU_following_arr);
				}
				// 자신 팔로잉 업데이트
				query("UPDATE Pka_User SET PU_following = '$PU_following_arr' WHERE token_val='$_SESSION[p_token_val]'");
				
				echo "ok";
			}
			
		}else{echo "no";}// 아이디 없음
	}



}else if($checkName=="follow_collection"){	// 컬렉션 팔로우


	if(preg_match("/[^0-9a-z_]+/i", $PU_follow_PU_idx)) {	// 영문과 숫자만
		echo "10";
	}else if(!$_SESSION[p_token_val]){// 세션끊김
		echo "50";
	}else {
		$rows_Collection=f_array("select * from Pka_Collection where PU_idx='$PU_follow_PU_idx'");// 팔로잉할 컬렉션
		$rows_me=f_array("select * from Pka_User where token_val='$_SESSION[p_token_val]'");// 자신

		if($rows_Collection[PU_Collection]){// 팔로워 컬럼 있음
			$PU_Collection_arr = array_decode($rows_Collection[PU_Collection]);
			$PU_Collection_ck = in_array($_SESSION[p_PU_idx], $PU_Collection_arr);
		}
		if($rows_me[PU_Collection]){// 자신 팔로잉 컬럼 있음
			$Me_Collection_arr = array_decode($rows_me[PU_Collection]);
			//print_r($Me_Collection_arr);
			$Me_Collection_ck = in_array($_SESSION[PU_idx], $Me_Collection_arr);
		}

		if($rows_Collection){// 팔로잉할 컬렉션 유무
			
			if($rows_Collection[PU_Collection]){// 팔로워 컬럼 있음
				if($PU_Collection_ck){// 팔로잉 중 -> 언팔로잉

					$PU_Collection_ck = array_search($_SESSION[p_PU_idx], $PU_Collection_arr);
					unset($PU_Collection_arr[$PU_Collection_ck]);
					$PU_Collection_arr = array_values($PU_Collection_arr);
					$PU_Collection_arr = array_encode($PU_Collection_arr);

					// 팔로잉 컬렉션 팔로워 업데이트
					query("UPDATE Pka_Collection SET PU_Collection = '$PU_Collection_arr' WHERE PU_idx='$PU_follow_PU_idx'");

					if($rows_me[PU_Collection]){// 팔로잉 컬럼 있음
						$Me_Collection_ck = array_search($PU_follow_PU_idx, $Me_Collection_arr);
						unset($Me_Collection_arr[$Me_Collection_ck]);
						$Me_Collection_arr = array_values($Me_Collection_arr);
						$Me_Collection_arr = array_encode($Me_Collection_arr);
					}else{// 팔로잉 컬럼 없음
					}
					// 자신 팔로잉 업데이트
					query("UPDATE Pka_User SET PU_Collection = '$Me_Collection_arr' WHERE token_val='$_SESSION[p_token_val]'");

					echo "ok1";

				}else{
					array_push($PU_Collection_arr, $_SESSION[p_PU_idx]);
					$PU_Collection_arr = array_values($PU_Collection_arr);
					$PU_Collection_arr = array_encode($PU_Collection_arr);

					// 팔로잉 컬렉션 팔로워 업데이트
					query("UPDATE Pka_Collection SET PU_Collection = '$PU_Collection_arr' WHERE PU_idx='$PU_follow_PU_idx'");
					
					if($rows_me[PU_Collection]){// 팔로잉 컬럼 있음
						array_push($Me_Collection_arr, $PU_follow_PU_idx);
						$Me_Collection_arr = array_values($Me_Collection_arr);
						$Me_Collection_arr = array_encode($Me_Collection_arr);
					}else{// 팔로잉 컬럼 없음
						$Me_Collection_arr = [];
						array_push($Me_Collection_arr, $_SESSION[p_PU_idx]);
						$Me_Collection_arr = array_values($Me_Collection_arr);
						$Me_Collection_arr = array_encode($Me_Collection_arr);
					}
					// 자신 팔로잉 업데이트
					query("UPDATE Pka_User SET PU_Collection = '$Me_Collection_arr' WHERE token_val='$_SESSION[p_token_val]'");

					echo "ok";
				}
			}else{// 팔로워 컬럼 없음
				$PU_Collection_arr = [];
				array_push($PU_Collection_arr, $_SESSION[p_PU_idx] );
				$PU_Collection_arr = array_values($PU_Collection_arr);
				$PU_Collection_arr = array_encode($PU_Collection_arr);

				// 팔로잉 대상 팔로워 업데이트
				query("UPDATE Pka_Collection SET PU_Collection = '$PU_Collection_arr' WHERE PU_idx='$PU_follow_PU_idx'");

				if($rows_me[PU_Collection]){// 팔로잉 컬럼 있음
					array_push($Me_Collection_arr, $PU_follow_PU_idx);
					$Me_Collection_arr = array_values($Me_Collection_arr);
					$Me_Collection_arr = array_encode($Me_Collection_arr);
				}else{// 팔로잉 컬럼 없음
					$Me_Collection_arr = [];
					array_push($Me_Collection_arr, $PU_follow_PU_idx);
					$Me_Collection_arr = array_values($Me_Collection_arr);
					$Me_Collection_arr = array_encode($Me_Collection_arr);
				}
				// 자신 팔로잉 업데이트\
				query("UPDATE Pka_User SET PU_Collection = '$Me_Collection_arr' WHERE token_val='$_SESSION[p_token_val]'");
				
				echo "ok";
			}
			
		}else{echo "no";}// 아이디 없음
	}




}else if($checkName=="petdol_reservation"){	// 펫돌 예약정보 결제요청전 정보 삽입

	//중복확인쿼리(중복없을때까지 갱신)
	$random_val = getString2();
	while(1){		
		$petdol_reservation_rows=f_array("select * from petdol_reservation where random_val = '$random_val'"); // 중복 확인
		if($petdol_reservation_rows){// 중복중
			$random_val = getString2();	
		}else{// 중복끝
			break;
		}
	}
	$merchant_uid = 'merchant_'.$random_val; // 채용자 고유값
	if(!$msg_contents || $msg_contents==''){
		$msg_contents = '우리 아기 예약했어요. 잘부탁드릴게요.';
	}else{}

	query("INSERT INTO petdol_reservation ( random_val , petdolbomi_ck , buyer_ck , petdolbomi_name , buyer_name , petdolbomi_hp , buyer_hp , pay_state , msg , error_msg , imp_uid , merchant_uid , paid_amount , apply_num , reservationDay , reservationTime , reservationPrice , totalPrice , fromReservation , fromtime , toReservation , totime , pay_num_ck1 , pay_num_ck2 , pay_num_ck3 , pay_num_ck4 , pay_num_ck5 , pay_num_ck6 , pay_ck1 , pay_ck2 , pay_ck3 , pay_ck4 , pay_ck5 , pay_ck6 , msg_ask , reg_date ) VALUES ( '$random_val' , '$petdolbomi_ck' ,'$buyer_ck' , '$petdolbomi_name' , '$buyer_name' , '$petdolbomi_hp' , '$buyer_hp' , '$pay_state' , '$msg' , '$error_msg' , '$imp_uid' , '$merchant_uid' , '$paid_amount' , '$apply_num' , '$reservationDay' , '$reservationTime' , '$reservationPrice' , '$totalPrice' , '$fromReservation' , '$fromtime' , '$toReservation' , '$totime' , '$pay_num_ck1' , '$pay_num_ck2' , '$pay_num_ck3' , '$pay_num_ck4' , '$pay_num_ck5' , '$pay_num_ck6' , '$pay_ck1' , '$pay_ck2' , '$pay_ck3' , '$pay_ck4' , '$pay_ck5' , '$pay_ck6' , '$msg_contents' , now() )");

	echo "ok///".$random_val;

	
}else if($checkName=="petdol_cancel"){	// 펫돌 예약취소


	$petdol_reservation_rows=f_array("select * from petdol_reservation where random_val = '$random_val'"); // 예약 정보
	if($petdol_reservation_rows){
		if(date('Y-m-d')==$petdol_reservation_rows[fromReservation]){// 당일 취소 불가능
				echo 'no0';
		}else if(date('Y-m-d')>$petdol_reservation_rows[fromReservation]){// 예약일 지난 경우 취소 불가능
				echo 'no1';
		}else{
			if($petdol_reservation_rows[pay_state]=='0000'){// 예약완료 처리된 레코드 취소가능

				// 수수료 계산
				$returnPrice = floor($petdol_reservation_rows[totalPrice]/$petdol_com);

				#3. 주문취소
				$result = $iamport->cancel(array(
					'imp_uid'		=> $petdol_reservation_rows[imp_uid], 		//merchant_uid에 우선한다
					'merchant_uid'	=> $petdol_reservation_rows[merchant_uid], 	//imp_uid 또는 merchant_uid가 지정되어야 함
					'amount' 		=> $returnPrice,					//amount가 생략되거나 0이면 전액취소. 금액지정이면 부분취소(PG사 정책별, 결제수단별로 부분취소가 불가능한 경우도 있음)
					'reason'		=> '결제취소',				//취소사유
					'refund_holder' => '환불될 가상계좌 예금주', 		//이용 중인 PG사에서 가상계좌 환불 기능을 제공하는 경우. 일반적으로 특약 계약이 필요
					'refund_bank'	=> '환불될 가상계좌 은행코드',
					'refund_account'=> '환불될 가상계좌 번호'
				));
				if ( $result->success ) {
					/**
					*	IamportPayment 를 가리킵니다. __get을 통해 API의 Payment Model의 값들을 모두 property처럼 접근할 수 있습니다.
					*	참고 : https://api.iamport.kr/#!/payments/cancelPayment 의 Response Model
					*/
					$payment_data = $result->data;

					//echo '## 취소후 결제정보 출력 ##';
					//echo '결제상태 : ' 		. $payment_data->status;
					//echo '결제금액 : ' 		. $payment_data->amount;
					//echo '취소금액 : ' 		. $payment_data->cancel_amount;
					//echo '결제수단 : ' 		. $payment_data->pay_method;
					//echo '결제된 카드사명 : ' 	. $payment_data->card_name;
					//echo '결제(취소) 매출전표 링크 : '	. $payment_data->receipt_url;
					//등등 __get을 선언해 놓고 있어 API의 Payment Model의 값들을 모두 property처럼 접근할 수 있습니다.
					$cancel_amount = $cancel_amount->cancel_amount;
					$receipt_url = $payment_data->receipt_url;
					query("UPDATE petdol_reservation SET pay_state ='1212' , cancel_amount = '$cancel_amount' , receipt_url = '$receipt_url' , merchant_uid = '$petdol_reservation_rows[merchant_uid]' , returnPrice = '$returnPrice' , cancel_date = now()  WHERE random_val = '$random_val'");

					// 펫돌보미에게 하실 말 전송
					// 룸 유무 확인
					$rows_room = f_array("select * from petdol_msg where ask_hp = '$petdol_reservation_rows[buyer_hp]' and petdolbomi_hp = '$petdol_reservation_rows[petdolbomi_hp]' order by reg_date desc");

					if($rows_room){// 룸 정보 있을경우 기존방 사용
							$room_val = $rows_room[room_val];
					}else{
						while(1){		
							$room_val = getString2(); // 방고유값 고유값
							$rows_room_ck=f_array("select * from petdol_msg where room_val = '$room_val'");
							if($rows_room_ck){// 중복중
							}else{// 중복끝
								break;
							}
						}
					}

					$msg_state = 'ask';
					$msg_contents = '예약취소했어요.';

					query("INSERT INTO petdol_msg ( 
					ask_hp ,
					petdolbomi_hp ,
					msg_state ,
					msg_contents ,
					room_val ,
					reservationDay ,
					reservationTime ,
					reservationPrice ,
					totalPrice ,
					fromReservation ,
					fromtime ,
					toReservation ,
					totime ,
					pay_num_ck1 ,
					pay_num_ck2 ,
					pay_num_ck3 ,
					pay_num_ck4 ,
					pay_num_ck5 ,
					pay_num_ck6 ,
					pay_ck1 ,
					pay_ck2 ,
					pay_ck3 ,
					pay_ck4 ,
					pay_ck5 ,
					pay_ck6 ,
					merchant_uid ,
					reg_date 
					) VALUES ( 
					'$petdol_reservation_rows[buyer_hp]',
					'$petdol_reservation_rows[petdolbomi_hp]',
					'$msg_state',
					'$msg_contents' ,
					'$room_val' ,
					'$petdol_reservation_rows[reservationDay]' ,
					'$petdol_reservation_rows[reservationTime]' ,
					'$petdol_reservation_rows[reservationPrice]' ,
					'$petdol_reservation_rows[totalPrice]' ,
					'$petdol_reservation_rows[fromReservation]' ,
					'$petdol_reservation_rows[fromtime]' ,
					'$petdol_reservation_rows[toReservation]' ,
					'$petdol_reservation_rows[totime]' ,
					'$petdol_reservation_rows[pay_num_ck1]' ,
					'$petdol_reservation_rows[pay_num_ck2]' ,
					'$petdol_reservation_rows[pay_num_ck3]' ,
					'$petdol_reservation_rows[pay_num_ck4]' ,
					'$petdol_reservation_rows[pay_num_ck5]' ,
					'$petdol_reservation_rows[pay_num_ck6]' ,
					'$petdol_reservation_rows[pay_ck1]' ,
					'$petdol_reservation_rows[pay_ck2]' ,
					'$petdol_reservation_rows[pay_ck3]' ,
					'$petdol_reservation_rows[pay_ck4]' ,
					'$petdol_reservation_rows[pay_ck5]' ,
					'$petdol_reservation_rows[pay_ck6]' ,
					'$petdol_reservation_rows[merchant_uid]' ,
					now() 
					)");
					
					//알림톡 api
					$phn = $rows_petdolbomi[hp]; // Y 수신자 펫돌보미
					// 펫돌보미
					$id_row=f_array("select * from wk_member where hp='$petdol_reservation_rows[buyer_hp]'");
					$tmplId = "inbox_message_sitter"; // N 메시지 유형을 확인할 템플릿 코드(사전에 승인된 템플릿의 코드)
					$msg = "[펫돌] 메시지수신
				#{홍길동} 견주님이 새로운 메세지를 보냈습니다.
				메세지 내용 : #{메시지내용}
				답장하기 : #{메시지링크}"; //Y 사용자에게 전달될 메시지(공백 포함 1,000자)
					$msg = str_replace("#{홍길동}", $id_row[user_name], $msg);
					$msg = str_replace("#{메시지내용}", msg_blank(strcut_utf8($msg_contents,20)), $msg);
					$msg = str_replace("#{메시지링크}", "https://www.petdol.com/contents/msg_send.php?room_val=".$room_val, $msg);
					alimtalk($phn,$tmplId,$msg);
					//알림톡 api
					// 펫돌보미에게 하실 말 전송

					echo 'ok';
				} else {
					//error_log($result->error['code']);
					//error_log($result->error['message']);
					$code = $result->error['code'];
					$message = $result->error['message'];
					query("UPDATE petdol_reservation SET code ='$code' , message ='$message' WHERE random_val = '$random_val'");
					echo 'no5';
				}
			}else if($petdol_reservation_rows[pay_state]=='1212'){// 이미 취소된 정보
				echo 'no2';
			}else{// 그외에 상태변환 불가능
				echo 'no3';
			}
		}
	}else{
		echo 'no4';
	}


}else if($checkName=="like_ck"){	// 좋아요


	if($_SESSION[p_token_val]){// 로그인 세션 있는경우에만 좋아요 가능
		$rows_like_ck=f_array("select * from Pka_like where PB_idx = '$PB_idx' and token_val = '$_SESSION[p_token_val]'");
		$rows_bookmark=f_array("select * from Pka_Bookmark where PB_idx = '$PB_idx'");
		if($rows_bookmark[token_val]==$_SESSION[p_token_val]){// 자기글 추천 불가
			$n_rows_like_ck = n_rows("select * from Pka_like where PB_idx = '$PB_idx' and like_ck ='Y' order by PU_joindate desc");
			echo 'no///N///'.$n_rows_like_ck;
		}else{// 자기글 아님
			if($rows_like_ck){// 좋아요 로그 기록 체크
				if($rows_like_ck[like_ck]=='Y'){// 좋아요 취소
					query("UPDATE Pka_like SET like_ck ='N' WHERE PB_idx='$PB_idx' and token_val = '$_SESSION[p_token_val]'");
					$n_rows_like_ck = n_rows("select * from Pka_like where PB_idx = '$PB_idx' and like_ck ='Y' order by PU_joindate desc");
					echo 'ok///N///'.$n_rows_like_ck;
				}else{// 좋아요 수락
					query("UPDATE Pka_like SET like_ck ='Y' WHERE PB_idx='$PB_idx' and token_val = '$_SESSION[p_token_val]'");
					$n_rows_like_ck = n_rows("select * from Pka_like where PB_idx = '$PB_idx' and like_ck ='Y' order by PU_joindate desc");
					echo 'ok///Y///'.$n_rows_like_ck;
				}
			}else{// 좋아요 기록 없음
				query("INSERT INTO Pka_like ( PB_idx , like_ck , token_val , PU_joindate ) VALUES ( '$PB_idx' , 'Y' , '$_SESSION[p_token_val]' , now() )");
				$n_rows_like_ck = n_rows("select * from Pka_like where PB_idx = '$PB_idx' and like_ck ='Y' order by PU_joindate desc");
				echo 'ok///Y///'.$n_rows_like_ck;
			}
		}
	}else{
		$n_rows_like_ck = n_rows("select * from Pka_like where PB_idx = '$PB_idx' and like_ck ='Y' order by PU_joindate desc");
		echo 'ok1///N///'.$n_rows_like_ck;
	}

}else if($checkName=="msg_insert"){	// 메세지 전송

	if($room_val){
	}else{
		while(1){		
			$room_val = getString2(); // 방고유값 고유값
			$rows_room_ck=f_array("select * from petdol_msg where room_val = '$room_val'");
			if($rows_room_ck){// 중복중
			}else{// 중복끝
				break;
			}
		}
	}

	if($msg_state=='ask'){// 견주문의
	}else{// 펫돌보미 답변
		$rows_room=f_array("select * from petdol_msg where room_val = '$room_val' order by reg_date desc");
		if($rows_room){// 펫돌보미 답변은 반드시 방이 있는상태이므로 방 불러오기
			$reservationDay = $rows_room[reservationDay];
			$reservationTime = $rows_room[reservationTime];
			$reservationPrice = $rows_room[reservationPrice];
			$totalPrice = $rows_room[totalPrice];
			$fromReservation = $rows_room[fromReservation];
			$fromtime = $rows_room[fromtime];
			$toReservation = $rows_room[toReservation];
			$totime = $rows_room[totime];
			$pay_num_ck1 = $rows_room[pay_num_ck1];
			$pay_num_ck2 = $rows_room[pay_num_ck2];
			$pay_num_ck3 = $rows_room[pay_num_ck3];
			$pay_num_ck4 = $rows_room[pay_num_ck4];
			$pay_num_ck5 = $rows_room[pay_num_ck5];
			$pay_num_ck6 = $rows_room[pay_num_ck6];
			$pay_ck1 = $rows_room[pay_ck1];
			$pay_ck2 = $rows_room[pay_ck2];
			$pay_ck3 = $rows_room[pay_ck3];
			$pay_ck4 = $rows_room[pay_ck4];
			$pay_ck5 = $rows_room[pay_ck5];
			$pay_ck6 = $rows_room[pay_ck6];
		}else{// 기존방 없을경우 새로 갱신
		}
	}

	query("INSERT INTO petdol_msg ( 
	ask_hp ,
	petdolbomi_hp ,
	msg_state ,
	msg_contents ,
	room_val ,
	reservationDay ,
	reservationTime ,
	reservationPrice ,
	totalPrice ,
	fromReservation ,
	fromtime ,
	toReservation ,
	totime ,
	pay_num_ck1 ,
	pay_num_ck2 ,
	pay_num_ck3 ,
	pay_num_ck4 ,
	pay_num_ck5 ,
	pay_num_ck6 ,
	pay_ck1 ,
	pay_ck2 ,
	pay_ck3 ,
	pay_ck4 ,
	pay_ck5 ,
	pay_ck6 ,
	reg_date 
	) VALUES ( 
	'$ask_hp',
	'$petdolbomi_hp',
	'$msg_state',
	'$msg_contents' ,
	'$room_val' ,
	'$reservationDay' ,
	'$reservationTime' ,
	'$reservationPrice' ,
	'$totalPrice' ,
	'$fromReservation' ,
	'$fromtime' ,
	'$toReservation' ,
	'$totime' ,
	'$pay_num_ck1' ,
	'$pay_num_ck2' ,
	'$pay_num_ck3' ,
	'$pay_num_ck4' ,
	'$pay_num_ck5' ,
	'$pay_num_ck6' ,
	'$pay_ck1' ,
	'$pay_ck2' ,
	'$pay_ck3' ,
	'$pay_ck4' ,
	'$pay_ck5' ,
	'$pay_ck6' ,
	now() 
	)");
	
	//알림톡 api	
	if($ask_ck=='Y'){// 물어보는사람이 견주일때
		$phn = $petdolbomi_hp; // Y 수신자 펫돌보미
		// 펫돌보미
		$id_row=f_array("select * from wk_member where hp='$ask_hp'");
		$tmplId = "inbox_message_sitter"; // N 메시지 유형을 확인할 템플릿 코드(사전에 승인된 템플릿의 코드)
		$msg = "[펫돌] 메시지수신
#{홍길동} 견주님이 새로운 메세지를 보냈습니다.
메세지 내용 : #{메시지내용}
답장하기 : #{메시지링크}"; //Y 사용자에게 전달될 메시지(공백 포함 1,000자)
		$msg = str_replace("#{홍길동}", $id_row[user_name], $msg);
		$msg = str_replace("#{메시지내용}", msg_blank(strcut_utf8($msg_contents,20)), $msg);
		$msg = str_replace("#{메시지링크}", "https://www.petdol.com/contents/msg_send.php?room_val=".$room_val, $msg);
		alimtalk($phn,$tmplId,$msg);
	}else{
		$phn = $ask_hp; // Y 수신자 견주
		// 견주
		$id_row=f_array("select * from wk_member where hp='$petdolbomi_hp'");
		$tmplId = "inbox_message_owner"; // N 메시지 유형을 확인할 템플릿 코드(사전에 승인된 템플릿의 코드)
		$msg = "[펫돌] 메시지수신
#{홍길동} 펫돌보미님이 고객님 문의에 대한 답변을 보냈습니다.
답변 내용 : #{메시지내용}
다시 문의하기 : #{메시지링크}"; //Y 사용자에게 전달될 메시지(공백 포함 1,000자)
		$msg = str_replace("#{홍길동}", $id_row[user_name], $msg);
		$msg = str_replace("#{메시지내용}", msg_blank(strcut_utf8($msg_contents,20)), $msg);
		$msg = str_replace("#{메시지링크}", "https://www.petdol.com/contents/msg_send.php?room_val=".$room_val, $msg);
		alimtalk($phn,$tmplId,$msg);
	}	
	//알림톡 api

	echo "ok///".$room_val;


}else if($checkName=="adm_top_ck"){	// 관리자 상단 스키,골프 탭메뉴 세션 만들기


	$_SESSION[top_tab_ck]=$adm_top_tab;
	echo $_SESSION[top_tab_ck];


}else if($checkName=="partner_default_chk"){	// 추천인계정 검색


	if(preg_match("/[^0-9a-z_]+/i", $PU_recom)) {	// 영문과 숫자만
		echo "10";
	}else {
		if($PU_recom_ck=='K2K9'){// 제휴사 회원
			
			$query="
			SELECT MAX(PU_sortnum) as max_sortnum
			FROM Pka_User_K2K9
			;";
			$rows = f_array($query);
			$max_sortnum = $rows[max_sortnum];

			$id_row=f_array("select * from Pka_User_K2K9 where PU_userid='$PU_recom' and PU_sortnum = '$max_sortnum'");
			if($id_row){echo "Y///";}// 존재하는 아이디
			else {echo "20";}// 없음
		}else{// 자체 가입
			$id_row=f_array("select * from Pka_User where PU_userid='$PU_recom'");
			if($id_row){echo "Y///";}// 존재하는 아이디
			else {echo "20";}// 없음
		}
	}


}else if($checkName=="partner_chk"){	// 제휴사계정 검색


	if(preg_match("/[^0-9a-z_]+/i", $partner_userid)) {	// 영문과 숫자만
		echo "10";
	}else {
		
		$query="
		SELECT MAX(PU_sortnum) as max_sortnum
		FROM Pka_User_K2K9
		;";
		$rows = f_array($query);
		$max_sortnum = $rows[max_sortnum];

		$id_row=f_array("select * from Pka_User_K2K9 where PU_userid='$partner_userid' and PU_name='$partner_name' and PU_sortnum = '$max_sortnum'");
		if($id_row){echo "Y///".$id_row[PU_recom]."///".$id_row[PU_phone];}// 존재하는 아이디
		else {echo "20";}// 없음
	}


}else if($checkName=="customer_ck" ){	// 관리자 문의하기 상태 수정

	query("UPDATE wk_bbs_{$sg_gb}_customer SET answer_ck = '$answer_ck' WHERE idx = '$idx' ");

	echo "ok";


}else if($checkName=="area_sublist"){	// 예약등록 2차 메뉴 가져오기


	$result=query("select * from wk_menu where sg_gb='$sg_gb' and ct_idx='$area_idx' order by sort_num asc, ct_name asc");
	while ($rows=fetch_array($result)) {
		$name.=$rows[idx]."///".$rows[ct_name]."|||";
	}
	echo $name;


}else if($checkName=="area_prod"){	// 예약등록 지역에 상품정보 가져오기


	$result=query("select * from wk_{$sg_gb}_package where area='$area_idx' and area2='$area_idx2' order by pk_name asc");
	while ($rows=fetch_array($result)) {
		$title.=$rows[pk_name]."|||";
	}
	echo $title;


}else if($checkName=="tour_mem_insert" || $checkName=="tour_mem_update"){	// 예약자 등록,수정


	$user_name=urldecode($user_name);
	$content=urldecode($content);
	$zip=$zip1."-".$zip2;
	$address1=urldecode($address1);
	$address2=urldecode($address2);
	$jumin_exp=explode("-",$jumin);
	$birth_y=substr($jumin_exp[0],0,2);
	$birth_d=substr($jumin_exp[0],-2);
	if($jumin_exp[1]>=3){$yy="20";}else {$yy="19";}
	$birth_m=$yy.$jumin_exp[0];
	$birth_date=$birth_d.date("M",strtotime($birth_m)).$birth_y;
	if(!($jumin_exp[1]%2)){$sex="F";}else {$sex="M";}
	$p_end_dt_exp=explode("-",$pass_end_date);
	$pass_dt=$p_end_dt_exp[2].date("M",strtotime($pass_end_date)).$p_end_dt_exp[0];
	if($air_gb=="topas"){
		$air_code="4{$air_num}F DOCS/P/KR/$pass_num/KR/$birth_date/$sex/$pass_dt/$en_name";
	}else if($air_gb=="abacus"){
		$air_code="3DOCS/P/KR/$pass_num/KR/$birth_date/$sex/$pass_dt/$en_name-{$air_num}.1";
	}
	if($checkName=="tour_mem_insert"){// 등록
		query("INSERT INTO wk_{$sg_gb}_re_users ( re_idx, g_no, user_name, en_name, jumin, pass_num, pass_end_date, content, tel, hp, email, air_num, air_gb, air_code, zip, address1, address2, reg_date ) VALUES ( '$re_idx', '$g_no', '$user_name', '$en_name', '$jumin', '$pass_num', '$pass_end_date', '$content', '$tel', '$hp', '$email', '$air_num', '$air_gb', '$air_code', '$zip', '$address1', '$address2', now() );");
		echo "ok";
	}else if($checkName=="tour_mem_update"){// 수정
		query("UPDATE wk_{$sg_gb}_re_users SET g_no = '$g_no' , user_name = '$user_name' , en_name = '$en_name' , jumin = '$jumin' , pass_num = '$pass_num' , pass_end_date = '$pass_end_date' , content = '$content' , tel = '$tel' , hp = '$hp' , email = '$email' , air_num = '$air_num' , air_gb = '$air_gb' , air_code = '$air_code' , zip = '$zip' , address1 = '$address1' , address2 = '$address2' , modify_date = now() WHERE idx = '$t_idx'");
		echo "ok";
	}else {echo"no";}



}else if($checkName=="tour_mem_delete"){	// 예약자 삭제


	query("delete from wk_{$sg_gb}_re_users where idx='$idx'");
	echo "ok";


}else if($checkName=="exc_update"){	// 정산,결산에서 환율 등록하기


	query("UPDATE wk_{$sg_gb}_reservation SET {$p}_usd = '$us' , {$p}_jpy = '$jp' , {$p}_uro = '$uro' , {$p}_cad = '$cad' , {$p}_nzd = '$nzd' , {$p}_chf = '$chf' WHERE idx = '$idx'");
	echo "ok";


}else if($checkName=="pay_inout_insert" || $checkName=="pay_inout_update"){	// 입금내역 등록,수정


	$pay_gb=urldecode($pay_gb);
	$memo=urldecode($memo);
	$card_d=urldecode($card_d);
	$tong_gb=urldecode($tong_gb);
	if($checkName=="pay_inout_insert"){// 등록
		query("INSERT INTO wk_{$sg_gb}_re_pay ( re_idx, pay_date, pay_gb, memo, card_ym, card_d, in_pay, out_pay, tong_gb, reg_date ) VALUES ( '$re_idx', '$pay_date', '$pay_gb', '$memo', '$card_ym', '$card_d', '$in_pay', '$out_pay', '$tong_gb', now() )");
		echo "ok";
	}else if($checkName=="pay_inout_update"){// 수정
		query("UPDATE wk_{$sg_gb}_re_pay SET pay_date = '$pay_date' , pay_gb = '$pay_gb' , memo = '$memo' , card_ym = '$card_ym' , card_d = '$card_d' , in_pay = '$in_pay' , out_pay = '$out_pay' , tong_gb = '$tong_gb' , modify_date = now() WHERE idx = '$p_idx'");
		echo "ok";
	}else {echo"no";}


}else if($checkName=="pay_inout_delete"){	// 입금내역 삭제


	query("delete from wk_{$sg_gb}_re_pay where idx='$idx'");
	echo "ok";


}else if($checkName=="memo_insert"){// 담당자 메모 등록,수정


	query("INSERT INTO wk_{$sg_gb}_re_memo ( re_idx, user_id, content, reg_date ) VALUES ( '$re_idx', '$_SESSION[p_id]', '$content', now() )");
	echo "ok";


}else if($checkName=="memo_update"){// 담당자 메모 등록,수정


	query("UPDATE wk_{$sg_gb}_re_memo SET content = '$content' , modify_date = now() WHERE idx = '$p_idx'");
	echo "ok";


}else if($checkName=="memo_delete"){	// 담당자 메모 삭제


	query("delete from wk_{$sg_gb}_re_memo where idx='$idx'");
	echo "ok";


}else if($checkName=="bbs_re_insert" || $checkName=="bbs_re_update"){	// 게시판 댓글 DB 확인

	if($_SESSION[p_id]){
		$u_id=$_SESSION[p_id];
		$u_name=$_SESSION[p_name];
		$u_pwd="'$_SESSION[p_pwd]'";
	}else {
		$u_id="";
		$u_name=$user_name;
		$u_pwd="password('$pwd')";
	}
	$content=urldecode($content);
	if($checkName=="bbs_re_insert" && $idx){// 등록
		query("INSERT INTO wk_bbs_{$tb_name}_comment ( Bidx , user_id , user_name , nickName , pwd , content , view_ck , user_ip , reg_date , date_tm ) VALUES ( '$idx' , '$u_id' , '$u_name' , '$_SESSION[p_nick]' , $u_pwd , '$content' , 'Y' , '$user_ip' , '$time' , now() )");
		echo "ok";
	}else if($checkName=="bbs_re_update" && $r_idx){// 수정
		query("UPDATE wk_bbs_{$tb_name}_comment SET user_name = '$u_name' , pwd = $u_pwd , content = '$content' WHERE idx = '$r_idx'");
		echo "ok";
	}else {echo"10";}


}else if($checkName=="bbs_re_modify" || $checkName=="bbs_re_delete" || $checkName=="bbs_re_pass_mod" || $checkName=="bbs_re_pass_del"){	// 댓글 DB 확인

	// 댓글 수정, 삭제시 본인글이 아닌경우 비밀번호 확인
	if($checkName=="bbs_re_pass_mod"||$checkName=="bbs_re_pass_del"){
		$rows=f_array("select * from wk_bbs_{$tb_name}_comment where idx='$idx' and pwd=password('$pwd')");
		if($rows){
			if($checkName=="bbs_re_pass_mod"){
				$checkName="bbs_re_modify";
			}else if($checkName=="bbs_re_pass_del"){
				$checkName="bbs_re_delete";
			}		
		}else {echo"20";}
	}

	$rows=f_array("select * from wk_bbs_{$tb_name}_comment where idx='$idx'");
	if($rows){
		if($checkName=="bbs_re_modify"){// 수정
			echo $rows[user_name]."/@7538@/".$rows[content];
		}else if($checkName=="bbs_re_delete"){	// 삭제
			query("delete from wk_bbs_{$tb_name}_comment where idx='$idx'");
			echo "ok";
		}else {}
	}else {echo"10";}

}else if($checkName=="bbs_re_pass_ck"){	// 게시판 댓글 비밀번호 확인

	
	$rows=f_array("select * from wk_bbs_{$tb_name}_comment where idx='$idx'");


}else if($checkName=="bbs_save_ck"){	// 게시판 임시저장


	$row=f_array("select * from wk_bbs_save where tb_gubun='$tb_name' and user_id='$_SESSION[p_id]'");
	if($row){echo"yes";}else {echo"no";}


}else if($checkName=="bbs_save"){	// 게시판 임시저장


	if($sq==1){
		query("UPDATE wk_bbs_save SET subject = '$subject', content = '$content' WHERE tb_gubun='$tb_name' and  user_id='$_SESSION[p_id]'");
	}else {
		query("INSERT INTO wk_bbs_save ( tb_gubun, user_id, subject, content, user_ip, reg_date, date_tm ) VALUES ( '$tb_name', '$_SESSION[p_id]', '$subject', '$content', '$user_ip', $time, now() )");
	}
	
	echo"ok";


}else if($checkName=="bbs_save_get"){	// 게시판 임시저장 불러오기


	$row=f_array("select * from wk_bbs_save where tb_gubun='$tb_name' and user_id='$_SESSION[p_id]'");
	if($row){
		print_r(json_encode($row));
	}
	else {echo"no";}

}else if( $checkName=="customer_ck_load" ){	// 관리자 카테고리별 상품 로드

	if($choice_pk){
		$choice_pk_arr = explode( '|||' , $choice_pk ); 
		foreach ($choice_pk_arr as $key=>$value){ 
			$rows=f_array("select * from wk_{$sg_gb}_package where idx ='$value'");
			$a1_rows=f_array("select * from wk_{$sg_gb}_package_cate where idx='$rows[product_kind]'"); // 제품카테고리 찾기
			$sel_opt=$sel_opt."<option value='".$value."'>[".$a1_rows['cate_kname']."]".$rows['pk_name']."</option>";		
		}
		echo $sel_opt;
	}else{echo 'no';}

}else if($checkName=="product_copy"){	// 상품복사

	if($checkName=="product_copy"){

		query("insert into wk_{$sg_gb}_package( area , area2 , pk_division , main_visible , hot_visible ,visible , pk_name , trans , pk_start_day , day1 , day2 , pk_lift ,pk_price , pk_dam , choice_tour , stay_info , inclusion , not_inclusion , replaceText , pk_special , edfile , reg_date ) SELECT area , area2 , pk_division , main_visible , hot_visible ,visible , pk_name , trans , pk_start_day , day1 , day2 , pk_lift , pk_price , pk_dam , choice_tour , stay_info , inclusion , not_inclusion , replaceText , pk_special , edfile , now() as reg_date FROM wk_{$sg_gb}_package WHERE idx='$idx' ");
		
		query("insert into wk_{$sg_gb}_package_plan( place_type, place_day, place_location, place_trans, place_content, place_eat, place_eat1, place_eat2, place_eat3, pk_idx , reg_date ) SELECT place_type, place_day, place_location, place_trans, place_content, place_eat, place_eat1, place_eat2, place_eat3, (select last_insert_id()), now() as reg_date FROM wk_{$sg_gb}_package_plan WHERE pk_idx='$idx' order by place_day asc,  place_dayorder asc, idx asc");

		echo "ok";
	}else {echo"no";}

}else if($checkName=="product_plan_insert" || $checkName=="product_plan_update"){	// 상품일정 등록,수정

	$place_type=urldecode($place_type);
	$place_day=urldecode($place_day);
	$place_location=urldecode($place_location);
	$place_trans=urldecode($place_trans);
	$place_content=urldecode($place_content);
	$place_eat=urldecode($place_eat);
	$place_eat1=urldecode($place_eat1); if($place_eat1=='true'){$place_eat1='Y';}else{$place_eat1='N';}
	$place_eat2=urldecode($place_eat2); if($place_eat2=='true'){$place_eat2='Y';}else{$place_eat2='N';}
	$place_eat3=urldecode($place_eat3); if($place_eat3=='true'){$place_eat3='Y';}else{$place_eat3='N';}

	if($checkName=="product_plan_insert"){// 등록
		query("INSERT INTO wk_{$sg_gb}_package_plan ( place_type, place_day, place_dayorder, place_location, place_trans, place_content, place_eat, place_eat1, place_eat2, place_eat3, pk_idx , reg_date ) VALUES ( '$place_type', '$place_day', '$place_dayorder', '$place_location', '$place_trans', '$place_content', '$place_eat', '$place_eat1', '$place_eat2', '$place_eat3', '$pk_idx' , now() );");

		query("UPDATE wk_{$sg_gb}_package_plan SET place_eat = '$place_eat' , place_eat1 = '$place_eat1' , place_eat2 = '$place_eat2' , place_eat3 = '$place_eat3' WHERE pk_idx = '$pk_idx' and place_type = '$place_type' and place_day = '$place_day' ");
		
		echo "ok";
	}else if($checkName=="product_plan_update"){// 수정
		query("UPDATE wk_{$sg_gb}_package_plan SET place_type = '$place_type' , place_day = '$place_day' , place_dayorder = '$place_dayorder' , place_location = '$place_location' , place_trans = '$place_trans' , place_content = '$place_content' , place_eat = '$place_eat' , place_eat1 = '$place_eat1' , place_eat2 = '$place_eat2' , place_eat3 = '$place_eat3' , modify_date = now() WHERE idx = '$idx'");

		query("UPDATE wk_{$sg_gb}_package_plan SET place_eat = '$place_eat' , place_eat1 = '$place_eat1' , place_eat2 = '$place_eat2' , place_eat3 = '$place_eat3' WHERE pk_idx = '$pk_idx' and place_type = '$place_type' and place_day = '$place_day' ");

		echo "ok";
	}else {echo"no";}

}else if($checkName=="product_plan_new" || $checkName=="product_plan_move" || $checkName=="product_plan_copy" || $checkName=="product_plan_del"){	// 상품일정 등록, 변경, 복사, 삭제

	$place_change=urldecode($place_change);
	$place_type=urldecode($place_type);

	if($checkName=="product_plan_new"){// 새로등록
		echo "product_plan_new";
	}else if($checkName=="product_plan_move"){// 변경
		query("UPDATE wk_{$sg_gb}_package_plan SET place_type = '$place_change' , modify_date = now() WHERE pk_idx = '$pk_idx' and place_type = '$place_type' ");
		echo "product_plan_move";
	}else if($checkName=="product_plan_copy"){// 복사
		query("insert into wk_{$sg_gb}_package_plan( place_type, place_day, place_location, place_trans, place_content, place_eat, place_eat1, place_eat2, place_eat3, pk_idx , reg_date ) SELECT '$place_change' as place_type, place_day, place_location, place_trans, place_content, place_eat, place_eat1, place_eat2, place_eat3, pk_idx, now() as reg_date FROM wk_{$sg_gb}_package_plan WHERE pk_idx='$pk_idx' and place_type='$place_type' order by place_day asc,  place_dayorder asc, idx asc");
		echo "product_plan_copy";
	}else if($checkName=="product_plan_del"){// 삭제
		query("DELETE FROM wk_{$sg_gb}_package_plan WHERE pk_idx = '$pk_idx' and place_type = '$place_type' ");
		
		echo "product_plan_del";
	}else {echo"no";}

}else if($checkName=="product_plan_check"){	// 상품일정 유무체크

	$num_new=n_rows("select * from wk_{$sg_gb}_package_plan where pk_idx ='$pk_idx' and place_type = '$place_change' "); // 바뀔 항공사(셀렉트박스) 일정 유무
	$num_check=n_rows("select * from wk_{$sg_gb}_package_plan where pk_idx ='$pk_idx' and place_type = '$place_type' "); // 현재 선택된 항공사 일정 유무

	if ( $checkState=='product_plan_new' ){
		if( $num_new!="0" ){ // 바뀔 항공사(셀렉트박스) 일정이 있을때 오류
			echo "num_new";
		}else{echo "ok";}
	}else if ( $checkState=='product_plan_move' ){
		if( $num_new!="0" ){ // 바뀔 항공사(셀렉트박스) 일정이 있을때 오류
			echo "num_new";
		}else if( $num_check=="0" ){ // 현재 선택된 항공사 일정이 없을때 오류
			echo "num_check";
		}else{echo "ok";}	
	}else if ( $checkState=='product_plan_copy' ){
		if( $num_new!="0" ){ // 바뀔 항공사(셀렉트박스) 일정이 있을때 오류
			echo "num_new";
		}else if( $num_check=="0" ){ // 현재 선택된 항공사 일정이 없을때 오류
			echo "num_check";
		}else{echo "ok";}
	}else if ( $checkState=='product_plan_del' ){
		if( $num_new=="0" ){ // 바뀔(삭제될) 항공사(셀렉트박스) 일정이 없을때 오류
			echo "num_new";
		}else{echo "ok";}
	}

}else if($checkName=="product_plan_day"){	// 상품일정 날짜선택

	$rows=f_array("select * from wk_{$sg_gb}_package_plan where pk_idx ='$pk_idx' and place_type = '$place_type' and place_day = '$day' ");
	if( $rows['place_eat']!='' ){ echo $rows['place_eat'];}else{ echo ''; }

}else if($checkName=="product_plan_dayorder"){	// 상품일정 일자별 순서수정

	query("UPDATE wk_{$sg_gb}_package_plan SET place_dayorder = '$place_dayorder' , modify_date = now() WHERE idx = '$idx'");
	echo "ok";

}else if($checkName=="product_plan_modify"){	// 상품일정 수정글 불러오기

	$rows=f_array("select * from wk_{$sg_gb}_package_plan where idx ='$idx'");
	$rows = json_encode($rows);
	print_r($rows);

}else if($checkName=="product_plan_delete"){	// 상품일정 삭제

	query("delete from wk_{$sg_gb}_package_plan where idx='$idx'");
	$num_check=n_rows("select * from wk_{$sg_gb}_package_plan where pk_idx ='$pk_idx' and place_type = '$place_type' ");
	if( $num_check=="0" ){
		echo 'ok_clean';
	}else{echo "ok";}

}else if( $checkName=="stay_info" ){	// 상품리스트  숙박지선택 팝업로드시 선택된 숙박지 불러오기

	if($stay_info){
		$stay_info_arr = explode( '|||' , $stay_info ); 
		foreach ($stay_info_arr as $key=>$value){ 
			$rows=f_array("select * from wk_lodge where idx ='$value'");
			$a1_rows=f_array("select ct_name from wk_menu where idx='$rows[area]'"); //지역메뉴1 찾기
			$a2_rows=f_array("select ct_name from wk_menu where idx='$rows[area2]'"); //지역메뉴2 찾기
			$sel_opt=$sel_opt."<option value='".$value."'>[".$a1_rows['ct_name']."&nbsp;".$a2_rows['ct_name']."]".$rows['ho_name']."</option>";		
		}
		echo $sel_opt;
	}else{echo 'no';}

}else if( $checkName=="ski_tour" ){	// 상품리스트 스키시설선택 팝업로드시 선택된 스키시설 불러오기

	if($ski_tour){
		$ski_tour_arr = explode( '|||' , $ski_tour ); 
		foreach ($ski_tour_arr as $key=>$value){ 
			$rows=f_array("select * from wk_ski_tour where idx ='$value'");
			$a1_rows=f_array("select ct_name from wk_menu where idx='$rows[area]'"); //지역메뉴1 찾기
			$a2_rows=f_array("select ct_name from wk_menu where idx='$rows[area2]'"); //지역메뉴2 찾기
			$sel_opt=$sel_opt."<option value='".$value."'>[".$a1_rows['ct_name']."&nbsp;".$a2_rows['ct_name']."]".$rows['name']."</option>";		
		}
		echo $sel_opt;
	}else{echo 'no';}

}else if($checkName=="menu_session_in"){	// 메뉴관리에 카테고리 세션만들기

	echo$_SESSION["ct_m".$idx]=$idx;

}else if($checkName=="menu_session_out"){	// 메뉴관리에 카테고리 세션지우기

	echo$_SESSION["ct_m".$idx]="";





/**
*		사용장페이지
*/
}else if($checkName=="ticket_view"){	// 상품에서 가격선택


	if($idx&&$no){
		$row=f_array("select * from wk_ski_ticket where idx='$idx'");
		$st_date=explode("-",$row[start_date]);
		$wk_n=date("w",strtotime($row[start_date]))+1;
		$st_wk="{$st_date[1]}월 {$st_date[2]}일($week_arr[$wk_n])";
		$room="{$no}인1실";
		switch($row[currency]){
			case "1":$cu="\\";break;
			case "2":$cu="$";break;
			case "3":$cu="￥";break;
			case "4":$cu="€";break;
			case "5":$cu="$";break;
			case "6":$cu="$";break;
			case "7":$cu="";break;
		}
		if($row['price'.$no]<1){echo"10";
		}else {
			echo"$st_wk|$row[air_name]|$row[currency]|$room|$cu".number_format($row['price'.$no]);
		}
		
	}else {echo"no";}


}
?>
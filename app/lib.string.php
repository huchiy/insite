<?
/**
*		문자열 관련함수
*/

// mysql배열저장함수
//해당 함수의 원리 : 배열을 serialize로 변환해서 텍스트값으로 만듭니다. -> gzinflate를 이용해서 텍스트 값을 최대한 압축합니다. -> 압축 된 것을 그대로 mysql에 저장하는 것이 불가능하니 base64_encode 처리해서 DB에 안전하게 저장할 수 있는 형태로 변환합니다. -> return
function array_decode( $array_str ) { // array_encode에 의해 변한 string을 다시 array로 복원해주는 function
 if($array_str){
	return unserialize(gzinflate(base64_decode($array_str)));
 }else{
	return;
 }
}
function array_encode( $array ) { // 배열을 압축 된 텍스트로 만들어주는 function
 if($array){
	return base64_encode(gzdeflate(serialize($array),9));
 }else{
	return;
 }
}

// php5.3이하
function raw_json_encode($input) {    
	return preg_replace_callback(
		'/\\\\u([0-9a-zA-Z]{4})/',
		function ($matches) {
				return mb_convert_encoding(pack('H*',$matches[1]),'UTF-8','UTF-16');
		},
		json_encode($input)
	);    
}

// 문자열 치환
function msg_blank($contents){
	// 치환할 휴대폰 형식(010-1234-1234)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([0]{1}[1]{1}[016789]{1})-([0-9]{3,4})-([0-9]{4})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '010-****-****', $contents);
	}
	// 치환할 휴대폰 형식(010-1234-1234)

	// 치환할 휴대폰 형식(01012341234)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([0]{1}[1]{1}[016789]{1})([0-9]{3,4})([0-9]{4})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '010-****-****', $contents);
	}
	// 치환할 휴대폰 형식(01012341234)

	// 치환할 휴대폰 형식(1 2 3 4)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([0-9]{1})([0-9]{1})([0-9]{1})원/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, " ".$value, $contents);
	}
	// 치환할 휴대폰 형식(1 2 3 4)

	// 치환할 휴대폰 형식(1 2 3 4)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([0-9]{1}) ([0-9]{1}) ([0-9]{1}) ([0-9]{1})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '****', $contents);
	}
	// 치환할 휴대폰 형식(1 2 3 4)

	// 치환할 휴대폰 형식(010 1234 1234)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([0]{1}[1]{1}[016789]{1}) ([0-9]{3,4}) ([0-9]{4})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '010-****-****', $contents);
	}
	// 치환할 휴대폰 형식(010 1234 1234)

	// 치환할 휴대폰 형식(1234)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([0-9]{4})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '****', $contents);
	}
	// 치환할 휴대폰 형식(1234)

	// 치환할 휴대폰 형식(1.2.3.4)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([0-9]{1}).([0-9]{1}).([0-9]{1}).([0-9]{1})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '****', $contents);
	}
	// 치환할 휴대폰 형식(1.2.3.4)

	// 치환할 휴대폰 형식(오톡영문4자)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([a-z]{4})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '****', $contents);
	}
	// 치환할 휴대폰 형식(오톡영문4자)

	// 치환할 휴대폰 형식(오톡영문4자)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([A-Z]{3})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '****', $contents);
	}
	// 치환할 휴대폰 형식(오톡영문4자)

	// 치환할 휴대폰 형식(오톡영문4자)
	// - 있는 핸드폰번호 정규식
	$pattern = "/([a-z]{1}) ([a-z]{1}) ([a-z]{1}) ([a-z]{1})/";

	// 정규식에 일치하는 문자열을 배열로 가져옴.
	preg_match_all($pattern, $contents, $matches);

	// 가져온 배열은 foreach
	foreach ($matches[0] as $value) {
	 //기존 문자열에서 핸드폰번호를 바꾼번호로 변경
	 $contents = str_replace($value, '****', $contents);
	}
	// 치환할 휴대폰 형식(오톡영문4자)

	// 치환할 휴대폰 형식(전화번호 한글)
	$contents = str_replace('이칠', '***', $contents);
	$contents = str_replace('구팔일', '***', $contents);
	$contents = str_replace('팔 일', '***', $contents);
	$contents = str_replace('칠 구 구', '***', $contents);
	$contents = str_replace('공 일 공', '***', $contents);
	$contents = str_replace('공일공', '***', $contents);
	$contents = str_replace('칠육', '***', $contents);
	$contents = str_replace('삼일', '***', $contents);
	$contents = str_replace('칠구', '***', $contents);
	$contents = str_replace('팔삼', '***', $contents);
	$contents = str_replace('삼이', '***', $contents);
	$contents = str_replace('삼사', '***', $contents);
	$contents = str_replace('일공', '***', $contents);
	$contents = str_replace('삼삼', '***', $contents);
	$contents = str_replace('삼육', '***', $contents);
	$contents = str_replace('구공', '***', $contents);
	$contents = str_replace('공삼', '***', $contents);
	$contents = str_replace('공 삼', '***', $contents);
	$contents = str_replace('공구오', '***', $contents);
	$contents = str_replace('이삼칠', '***', $contents);
	$contents = str_replace('아이디', '***', $contents);
	// 치환할 휴대폰 형식(전화번호 한글)

	// 치환할 휴대폰 형식(카톡)
	$contents = str_replace('ㅋ ㅏ ㅋ ㅏ', '**', $contents);
	$contents = str_replace('ㅋㅏㅋㅏ', '**', $contents);
	$contents = str_replace('카톡', '**', $contents);
	$contents = str_replace('카카오톡', '****', $contents);
	$contents = str_replace('오톡', '**', $contents);
	$contents = str_replace('카/톡', '**', $contents);
	$contents = str_replace('톡', '*', $contents);
	// 치환할 휴대폰 형식(카톡)

	return $contents;
}

// 시간 오전오후 치환
function time_ampm($time_ck){
	if($time_ck<=11){
		$time_text = '오전 '.$time_ck."시";
	}else{
		$time_text = '오전 '.$time_ck."시";
	}
	return $time_text;
}

// 알림톡 api
function alimtalk($phn,$tmplId,$msg){
	$phn_ori = $phn;
	$phn = "82".substr($phn, 1, 11);

	// 상용서버
	$server = 'https://alimtalk-api.bizmsg.kr/v1/sender/send';
	$userId = "petdol"; // Y 비즈엠 홈페이지에 가입된 사용자 계정명
	$profile = "492e7b0c63560d735982df71bc0d6fc8b0d52da7"; // Y 발신프로필키(메시지 발송 주체인 플러스친구에 대한 키)

	$message_type = "at"; //Y 메시지 타입(at : 알림톡, ft : 친구톡)
	$smsKind ="S"; // N	카카오 비즈메시지 발송이 실패했을 때SMS 전환발송을 사용하는 경	우	SMS/LMS 구분(SMS: S, LMS: L)
	$msgSms = "홍길동님이 보낸 등기 1234567_89123457 를 홍길동(본인)님께 배달 완료 1588-1300"; //  N SMS 전환발송을 위한 메시지
	$smsSender = $phn_ori; // N SMS 전환발송 시 발신번호
	$smsLmsTit = ""; // N LMS 발송을 위한 제목
	$btn_name = ""; // N 메시지에 첨부할 버튼 이름(템플릿 등록시 정의된 버튼 이름)
	$btn_url = ""; // N 메시지에 첨부할 버튼의 URL(템플릿 등록시 정의된 버튼 URL)
	$reserveDt = ""; // N 메시지 예약발송을 위한 시간 값(yyyyMMddHHmmss) 	- 즉시전송 : 00000000000000 	- 예약전송 : 20170310210000
	$smsOnly = ""; // N 카카오 비즈메시지 발송과 관계 없이 무조건 SMS 발송 요청 (Y : 사	용, N : 미사용)	* SMS/LMS 대체발송 상품 가입 시 사용 가능
	$button1 = ""; // N 메시지에 첨부할 버튼 1
	$button2 = ""; // N 메시지에 첨부할 버튼 2
	$button3 = ""; // N 메시지에 첨부할 버튼 3
	$button4 = ""; // N 메시지에 첨부할 버튼 4
	$button5 = ""; // N 메시지에 첨부할 버튼 5

	/*
	$button1 = array(
		'name' => "profile_change",
		'type' => 'WL'
  );
	*/

	$postData2 = array(
		'userId' => $userId,
		'message_type' => $message_type,
		'phn' => $phn,
		'profile' => $profile,
		'tmplId' => $tmplId,
		/*
		*/
		'msg' => $msg,
		/*
		'smsKind' => $smsKind,
		'msgSms' => $msgSms,
		'smsSender' => $smsSender,
		'smsLmsTit' => $smsLmsTit,
		*/
		'btn_name' => $btn_name,
		'btn_url' => $btn_url,
		'reserveDt' => $reserveDt,
		'smsOnly' => $smsOnly
		/*
		'button1' => $button1,
		'button2' => $button2,
		'button3' => $button3,
		'button4' => $button4,
		'button5' => $button5
		*/
  );
	$postData = array(
		'0' => $postData2
  );
	//echo '<br/><br/><br/>';
	//print_r($postData);
	//$postData = json_encode($postData,JSON_UNESCAPED_UNICODE);
	$postData = raw_json_encode($postData);
	//$postData = AES_Encode($key_coupon, $iv, $postData);
	//$postData = urlencode($postData);

  $curl = curl_init($server);
  curl_setopt($curl,CURLOPT_POST,true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $server);
	// post_data
	if (!is_null($header)) {
			curl_setopt($curl, CURLOPT_HEADER, true);
	}
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
	curl_setopt($curl, CURLOPT_VERBOSE, true);

  $result = curl_exec($curl);
  curl_close($curl);

  $result = json_decode($result,true);

	//echo '<br/><br/><br/>';
	//echo urldecode($result[message]);

	//echo '<br/><br/><br/>';
  //print_r( $result );

	//echo '<br/><br/><br/>';
	//echo $result[0][message];
}

// 알림톡 api
function alimtalk_test2($phn,$tmplId,$msg){
	$phn_ori = $phn;
	$phn = "82".substr($phn, 1, 11);

	// 상용서버
	$server = 'https://alimtalk-api.bizmsg.kr/v1/sender/send';
	$userId = "petdol"; // Y 비즈엠 홈페이지에 가입된 사용자 계정명
	$profile = "492e7b0c63560d735982df71bc0d6fc8b0d52da7"; // Y 발신프로필키(메시지 발송 주체인 플러스친구에 대한 키)

	$message_type = "at"; //Y 메시지 타입(at : 알림톡, ft : 친구톡)
	$smsKind ="S"; // N	카카오 비즈메시지 발송이 실패했을 때SMS 전환발송을 사용하는 경	우	SMS/LMS 구분(SMS: S, LMS: L)
	$msgSms = "홍길동님이 보낸 등기 1234567_89123457 를 홍길동(본인)님께 배달 완료 1588-1300"; //  N SMS 전환발송을 위한 메시지
	$smsSender = $phn_ori; // N SMS 전환발송 시 발신번호
	$smsLmsTit = ""; // N LMS 발송을 위한 제목
	$btn_name = ""; // N 메시지에 첨부할 버튼 이름(템플릿 등록시 정의된 버튼 이름)
	$btn_url = ""; // N 메시지에 첨부할 버튼의 URL(템플릿 등록시 정의된 버튼 URL)
	$reserveDt = ""; // N 메시지 예약발송을 위한 시간 값(yyyyMMddHHmmss) 	- 즉시전송 : 00000000000000 	- 예약전송 : 20170310210000
	$smsOnly = ""; // N 카카오 비즈메시지 발송과 관계 없이 무조건 SMS 발송 요청 (Y : 사	용, N : 미사용)	* SMS/LMS 대체발송 상품 가입 시 사용 가능
	$button1 = ""; // N 메시지에 첨부할 버튼 1
	$button2 = ""; // N 메시지에 첨부할 버튼 2
	$button3 = ""; // N 메시지에 첨부할 버튼 3
	$button4 = ""; // N 메시지에 첨부할 버튼 4
	$button5 = ""; // N 메시지에 첨부할 버튼 5

	/*
	$button1 = array(
		'name' => "profile_change",
		'type' => 'WL'
  );
	*/

	$postData2 = array(
		'userId' => $userId,
		'message_type' => $message_type,
		'phn' => $phn,
		'profile' => $profile,
		'tmplId' => $tmplId,
		/*
		*/
		'msg' => $msg,
		/*
		'smsKind' => $smsKind,
		'msgSms' => $msgSms,
		'smsSender' => $smsSender,
		'smsLmsTit' => $smsLmsTit,
		*/
		'btn_name' => $btn_name,
		'btn_url' => $btn_url,
		'reserveDt' => $reserveDt,
		'smsOnly' => $smsOnly
		/*
		'button1' => $button1,
		'button2' => $button2,
		'button3' => $button3,
		'button4' => $button4,
		'button5' => $button5
		*/
  );
	$postData = array(
		'0' => $postData2
  );
	//echo '<br/><br/><br/>';
	//print_r($postData);
	//$postData = json_encode($postData,JSON_UNESCAPED_UNICODE);
	$postData = raw_json_encode($postData);
	//$postData = AES_Encode($key_coupon, $iv, $postData);
	//$postData = urlencode($postData);

  $curl = curl_init($server);
  curl_setopt($curl,CURLOPT_POST,true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $server);
	// post_data
	if (!is_null($header)) {
			curl_setopt($curl, CURLOPT_HEADER, true);
	}
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
	curl_setopt($curl, CURLOPT_VERBOSE, true);

  $result = curl_exec($curl);
  curl_close($curl);

  $result = json_decode($result,true);

	//echo '<br/><br/><br/>';
	//echo urldecode($result[message]);

	//echo '<br/><br/><br/>';
  //print_r( $result );

	//echo '<br/><br/><br/>';
	//echo $result[0][message];
	print_r($result);
}

// 알림톡 api
function alimtalk_test($phn,$tmplId,$msg){
	$phn_ori = $phn;
	$phn = "82".substr($phn, 1, 11);

	// 테스트서버
	$server = 'https://dev-alimtalk-api.bizmsg.kr:1443/v1/sender/send';
	$userId = "prepay_user"; // Y 비즈엠 홈페이지에 가입된 사용자 계정명
	$profile = "89823b83f2182b1e229c2e95e21cf5e6301eed98"; // Y 발신프로필키(메시지 발송 주체인 플러스친구에 대한 키)

	$message_type = "at"; //Y 메시지 타입(at : 알림톡, ft : 친구톡)
	$smsKind ="S"; // N	카카오 비즈메시지 발송이 실패했을 때SMS 전환발송을 사용하는 경	우	SMS/LMS 구분(SMS: S, LMS: L)
	$msgSms = "홍길동님이 보낸 등기 1234567_89123457 를 홍길동(본인)님께 배달 완료 1588-1300"; //  N SMS 전환발송을 위한 메시지
	$smsSender = $phn_ori; // N SMS 전환발송 시 발신번호
	$smsLmsTit = ""; // N LMS 발송을 위한 제목
	$btn_name = ""; // N 메시지에 첨부할 버튼 이름(템플릿 등록시 정의된 버튼 이름)
	$btn_url = ""; // N 메시지에 첨부할 버튼의 URL(템플릿 등록시 정의된 버튼 URL)
	$reserveDt = ""; // N 메시지 예약발송을 위한 시간 값(yyyyMMddHHmmss) 	- 즉시전송 : 00000000000000 	- 예약전송 : 20170310210000
	$smsOnly = ""; // N 카카오 비즈메시지 발송과 관계 없이 무조건 SMS 발송 요청 (Y : 사	용, N : 미사용)	* SMS/LMS 대체발송 상품 가입 시 사용 가능
	$button1 = ""; // N 메시지에 첨부할 버튼 1
	$button2 = ""; // N 메시지에 첨부할 버튼 2
	$button3 = ""; // N 메시지에 첨부할 버튼 3
	$button4 = ""; // N 메시지에 첨부할 버튼 4
	$button5 = ""; // N 메시지에 첨부할 버튼 5

	$button1 = array(
		'name' => "방송 알림 설정 보기",
		'type' => 'DS'
  );

	$postData2 = array(
		'userId' => $userId,
		'message_type' => $message_type,
		'phn' => $phn,
		'profile' => $profile,
		'tmplId' => $tmplId,
		/*
		*/
		'msg' => $msg,
		/*
		'smsKind' => $smsKind,
		'msgSms' => $msgSms,
		'smsSender' => $smsSender,
		'smsLmsTit' => $smsLmsTit,
		*/
		'btn_name' => $btn_name,
		'btn_url' => $btn_url,
		'reserveDt' => $reserveDt,
		'smsOnly' => $smsOnly
		/*
		'button1' => $button1,
		'button2' => $button2,
		'button3' => $button3,
		'button4' => $button4,
		'button5' => $button5
		*/
  );
	$postData = array(
		'0' => $postData2
  );
	//print_r($postData);
	//$postData = json_encode($postData,JSON_UNESCAPED_UNICODE);
	$postData = raw_json_encode($postData);
	//$postData = AES_Encode($key_coupon, $iv, $postData);
	//$postData = urlencode($postData);

  $curl = curl_init($server);
  curl_setopt($curl,CURLOPT_POST,true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_URL, $server);
	// post_data
	if (!is_null($header)) {
			curl_setopt($curl, CURLOPT_HEADER, true);
	}
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
	curl_setopt($curl, CURLOPT_VERBOSE, true);

  $result = curl_exec($curl);
  curl_close($curl);

  $result = json_decode($result,true);

	//echo '<br/><br/><br/>';
	//echo urldecode($result[message]);

	//echo '<br/><br/><br/>';
  //print_r( $result );

	//echo '<br/><br/><br/>';
	//echo $result[0][message];
}


// 이미지 출력
function Pfiles_link_mypage($up_img_url,$i,$table_name){
	if($up_img_url){
		$up_img_url = '/files/'.$table_name.'/'.$up_img_url;
		// 썸네일 사용시 썸네일 생성
		$img_Name = imgName($up_img_url); //파일명
		$path_file = "/files/".$table_name."_thumb/{$img_Name}.thumb";//원본파일을 너비 정비율 리사이즈
		if(!is_file($path_file)){	// 썸네일이 없으면
			// 썸네일 할 사이즈 구하기
			$size = @getimagesize($up_img_url); 
			if($size[0]==$size[1]){ // 가로 세로 같은때
				if($size[0]>600){
					$thumb_x = '600';
					$thumb_y = '600';
				}else{
					$thumb_x = $thumb_x;
					$thumb_y = $thumb_y;
				}
			}else if($size[0]>$size[1]){ // 가로가 길때
				if($size[1]>600){
					$thumb_x = '600';
					$thumb_y = '600';
				}else{
					$thumb_x = $thumb_y;
					$thumb_y = $thumb_y;
				}
			}else if($size[0]<$size[1]){ // 세로가 길때
				if($size[0]>600){
					$thumb_x = '600';
					$thumb_y = '600';
				}else{
					$thumb_x = $thumb_x;
					$thumb_y = $thumb_x;
				}
			}else{
				if($size[0]>600){
					$thumb_x = '600';
					$thumb_y = '600';
				}else{
					$thumb_x = $thumb_x;
					$thumb_y = $thumb_y;
				}		 
			}

			$options['crop_use']='1';
			$a=thumnail($up_img_url, $path_file, $thumb_x, $thumb_y,$options);
		}
		if($a==true || is_file($path_file)){$up_img_url =  $path_file;}
		else {$up_img_url=$up_img_url;}
		echo "<img src='{$up_img_url}' border='0' align='absmiddle' id='up_img_url".$i."'>";
	}else{
		echo "<img src='/assets/images/user.png' border='0' align='absmiddle' id='up_img_url".$i."'>";
	}
}

// 이미지 출력
function Pfiles_link($up_img_url,$i,$table_name){
	if($up_img_url){
		if($table_name=='bookmark_ogimage'){// 가져온 이미지

			echo "<img src='{$up_img_url}' border='0' align='absmiddle' id='up_img_url".$i."' class='ogimage'>";

		}else{// 그냥이미지

			$up_img_url = '/files/'.$table_name.'/'.$up_img_url;
			// 썸네일 사용시 썸네일 생성
			$img_Name = imgName($up_img_url); //파일명
			$path_file = "/files/".$table_name."_thumb/{$img_Name}.thumb";//원본파일을 너비 정비율 리사이즈
			if(!is_file($path_file)){	// 썸네일이 없으면
				// 썸네일 할 사이즈 구하기
				$size = @getimagesize($up_img_url); 
				if($size[0]==$size[1]){ // 가로 세로 같은때
					if($size[0]>600){
						$thumb_x = '600';
						$thumb_y = '600';
					}else{
						$thumb_x = $thumb_x;
						$thumb_y = $thumb_y;
					}
				}else if($size[0]>$size[1]){ // 가로가 길때
					if($size[1]>600){
						$thumb_x = '600';
						$thumb_y = '600';
					}else{
						$thumb_x = $thumb_y;
						$thumb_y = $thumb_y;
					}
				}else if($size[0]<$size[1]){ // 세로가 길때
					if($size[0]>600){
						$thumb_x = '600';
						$thumb_y = '600';
					}else{
						$thumb_x = $thumb_x;
						$thumb_y = $thumb_x;
					}
				}else{
					if($size[0]>600){
						$thumb_x = '600';
						$thumb_y = '600';
					}else{
						$thumb_x = $thumb_x;
						$thumb_y = $thumb_y;
					}		 
				}

				$options['crop_use']='1';
				$a=thumnail($up_img_url, $path_file, $thumb_x, $thumb_y,$options);
			}
			if($a==true || is_file($path_file)){$up_img_url =  $path_file;}
			else {$up_img_url=$up_img_url;}
			echo "<img src='{$up_img_url}' border='0' align='absmiddle' id='up_img_url".$i."' class='upimage'>";
		}
	}else{
		//echo "<img src='/assets/images/imageupload.png' border='0' align='absmiddle' id='up_img_url".$i."'>";
		echo "<div class='holdImg'><span class='noimg'></span></div>";
	}
}

// 이미지 출력
function Pfiles_link2($up_img_url,$i){
	if($up_img_url){
		$up_img_url = '../files/petdol_tmpimage/'.$up_img_url;
		// 썸네일 사용시 썸네일 생성
		$img_Name = imgName($up_img_url); //파일명
		$path_file = "../files/petdol_tmpimage_thumb/{$img_Name}.thumb";//원본파일을 너비 정비율 리사이즈
		if(!is_file($path_file)){	// 썸네일이 없으면
			// 썸네일 할 사이즈 구하기
			$size = getimagesize($up_img_url); 
			if($size[0]==$size[1]){ // 가로 세로 같은때
				if($size[0]>600){
					$thumb_x = '600';
					$thumb_y = '600';
				}else{
					$thumb_x = $thumb_x;
					$thumb_y = $thumb_y;
				}
			}else if($size[0]>$size[1]){ // 가로가 길때
				if($size[1]>600){
					$thumb_x = '600';
					$thumb_y = '600';
				}else{
					$thumb_x = $thumb_y;
					$thumb_y = $thumb_y;
				}
			}else if($size[0]<$size[1]){ // 세로가 길때
				if($size[0]>600){
					$thumb_x = '600';
					$thumb_y = '600';
				}else{
					$thumb_x = $thumb_x;
					$thumb_y = $thumb_x;
				}
			}else{
				if($size[0]>600){
					$thumb_x = '600';
					$thumb_y = '600';
				}else{
					$thumb_x = $thumb_x;
					$thumb_y = $thumb_y;
				}		 
			}

			$options['crop_use']='1';
			$a=thumnail($up_img_url, $path_file, $thumb_x, $thumb_y,$options);
		}
		if($a==true || is_file($path_file)){$up_img_url =  $path_file;}
		else {$up_img_url=$up_img_url;}
		echo "<img src='{$up_img_url}' border='0' align='absmiddle' id='up_img_url".$i."' style='height:100px;'>";
	}else{
		echo "<img src='/mimage/file_file.jpg' border='0' align='absmiddle' id='up_img_url".$i."' style='height:100px;'>";
	}
}

function enc_biz($data){
	$ECPlaza = new COM("ECPlaza.Seed");
	$data = iconv("UTF-8", "EUC-KR", $data);
	$key = "!bizinterparkto@";
	return $encdata = $ECPlaza->Encrypt($data, $key);
}

function dec_biz($data){
	$ECPlaza = new COM("ECPlaza.Seed");
	$key = "!bizinterparkto@";
	$decdata = $ECPlaza->Decrypt($data, $key);
	return $decdata = iconv("EUC-KR", "UTF-8", $decdata);
}

// aes256 cbc Encode(base64 encode내장)
function AES_Encode($key, $iv, $encrypt_text){
	return openssl_encrypt($encrypt_text, "aes-256-cbc", $key, 0, $iv);
}
// aes256 cbc Decode(base64 encode내장)
function AES_Decode($key, $iv, $base64_text){
	return openssl_decrypt($base64_text, "aes-256-cbc", $key, 0, $iv);
}

// lms 가입일 체크
function date_ddays_ck($startDate,$targetDate){
	$targetDate = bar_day(preg_replace("/[^0-9]*/s", "", $targetDate));
	$startDate = new DateTime($startDate); // 오늘 날짜입니다.
	$targetDate = new DateTime($targetDate); // 타겟 날짜를 지정합니다.
	$interval = date_diff($startDate, $targetDate);
	$day_ck = $interval->invert; // 0:같거나 많음 1:적음
	$dday_ck = $interval->days; // 차이일
	if($dday_ck=='1' && $day_ck=='0'){
		$result = "전날가입일";
	}else{
		$result = "해당안됨";
	}
	return $result;
}

//날짜 년-월-일 표기
function tag_day($date){ 
	$date_1 = substr($date,"0","4");
	$date_2 = substr($date,"4","2");
	$date_3 = substr($date,"6","2");
	$year = $date_1;
	$month = $date_2;
	$day = $date_3;
	return $year."년".$month."월".$day."일";
}

//날짜 년-월-일 표기
function bar_day($date){ 
	$date_1 = substr($date,"0","4");
	$date_2 = substr($date,"4","2");
	$date_3 = substr($date,"6","2");
	$year = $date_1;
	$month = $date_2;
	$day = $date_3;
	if($date){
		$return_val = $year."-".$month."-".$day;
	}else{
		$return_val = '';
	}
	return $return_val;
}

//핸드폰번호 자릿수 파악해서 bar 표시
function phone_bar($phone){
	if($phone){
		$phone = trim($phone);
		$phone_1 = substr($phone, 0, 3);
		if(strlen($phone)>10){
			$phone_2 = substr($phone, 3, 4);
			$phone_3 = substr($phone, 7, 4);
		}else{
			$phone_2 = substr($phone, 3, 3);
			$phone_3 = substr($phone, 6, 4);
		}
		return $phone = $phone_1."-".$phone_2."-".$phone_3;
	}else{
		return $phone;
	}
}

//날짜 년-월-일 표기 라인지우기
function remove_bar_day($date){ 
	$date_arr = explode("-",$date);
	$date_1 = $date_arr[0];
	$date_2 = $date_arr[1];
	$date_3 = $date_arr[2];
	$year = $date_1;
	$month = $date_2;
	$day = $date_3;
	return $year."".$month."".$day;
}

//날짜 년-월-일 표기(10이하 0자동추가)
function bar0_day($date){ 
	$date_1 = substr($date,"0","4");
	$date_2 = substr($date,"4","2");
	$date_3 = substr($date,"6","2");
	$year = $date_1;
	$month = $date_2;
	$day = $date_3;
	return $year."-".$month."-".$day;
}

// 해달날짜의 마지막날 계산(윤달계산함)
function endm_day($date){ 
	$date_arr = explode("-",$date);
	$year = $date_arr[0];
	$month = $date_arr[1];
	$day = $date_arr[2];
	if($month == 2){ // 윤달 계산하는 로직
		if(($year % 4) == 0 && ($year % 100) !=0 || ($year % 400) == 0) $end_day = 29; 
		else $end_day = 28;
	}
	$end_day = date("t",mktime(0,0,0,$month,1, $year)); // 달의 마지막날 가져오는 방법
	return $year."-".$month."-".$end_day;
}

// 다음달 계산(윤달계산함)
function nextm_day($date){ 
	//날짜 년-월-일 분리
	$date_arr = explode("-",$date);
	$year = $date_arr[0];
	$month = $date_arr[1];
	$day = $date_arr[2];
	//한달뒤
	$month = $month+1;
	if($month<10){
		$month="0".$month;
	}else{
		if($month=='13'){
			$year++;
			$month='01';
		}else{
			$month=$month;
		}
	}
	// 윤달 계산하는 로직
	if($month == 2){ 
		if(($year % 4) == 0 && ($year % 100) !=0 || ($year % 400) == 0) $end_day = 29; 
		else $end_day = 28;
	}
	$end_day = date("t",mktime(0,0,0,$month,1, $year)); // 달의 마지막날 가져오는 방법
	if($end_day<$day){
		$day = $end_day;
	}else{
		$day = $day;
	}
	return $year."-".$month."-".$day;
}

// 다음달의 마지막날 계산(윤달계산함)
function nextm_end_day($date){ 
	//날짜 년-월-일 분리
	$date_arr = explode("-",$date);
	$year = $date_arr[0];
	$month = $date_arr[1];
	$day = $date_arr[2];
	//한달뒤
	$month = $month+1;
	if($month<10){
		$month="0".$month;
	}else{
		if($month=='13'){
			$year++;
			$month='01';
		}else{
			$month=$month;
		}
	}
	// 윤달 계산하는 로직
	if($month == 2){ 
		if(($year % 4) == 0 && ($year % 100) !=0 || ($year % 400) == 0) $end_day = 29; 
		else $end_day = 28;
	}
	$end_day = date("t",mktime(0,0,0,$month,1, $year)); // 달의 마지막날 가져오는 방법
	return $year."-".$month."-".$end_day;
}

//날짜 비교
function date_ck($startDate,$targetDate){
	$startDate = new DateTime($startDate); // 오늘 날짜입니다.
	$targetDate = new DateTime($targetDate); // 타겟 날짜를 지정합니다.
	$interval = date_diff($startDate, $targetDate);
	return $interval->invert; // 0:같거나 많음 1:적음
	//return $interval->days; // 차이일
}

//날짜 일수 비교
function date_days_ck($startDate,$targetDate){
	$startDate = new DateTime($startDate); // 오늘 날짜입니다.
	$targetDate = new DateTime($targetDate); // 타겟 날짜를 지정합니다.
	$interval = date_diff($startDate, $targetDate);
	//return $interval->invert; // 0:같거나 많음 1:적음
	return $interval->days; // 차이일
}

//날짜 일수 비교2
function date_days_ck2($startDate,$targetDate){
	$startDate = new DateTime($startDate); // 오늘 날짜입니다.
	$targetDate = new DateTime($targetDate); // 타겟 날짜를 지정합니다.
	$interval = date_diff($startDate, $targetDate);
	$day_ck = $interval->invert; // 0:같거나 많음 1:적음
	$dday_ck = $interval->days; // 차이일
	if($dday_ck==0){
		$result = "0";
	}else if($day_ck==0){
		$result = "".$dday_ck;
	}else{
		$result = "-".$dday_ck;
	}
	return $result;
}

//숫자 3자리마다 콤마(,) 삽입
function numberFormat($number)
{
	//변수선언
	$result = "";
	$strLength = 0;
	$comma_pos = 0;

	if(!$number || $number == "" || $number == 0)
		return;
		
	$strLength = strlen($number);
	$comma_pos = $strLength % 3;	

	for($i=0 ; $i<$strLength ; $i++)
	{
		if($i!=0 && $i%3 == $comma_pos) $result .= ",";
		$result .= substr($number, $i, 1);
	}

	return $result;
}//numberFormat()-----------------

// 난수생성
function getString($length = 32) { 
$text = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
$text = str_shuffle($text); 

$res = ''; 
$len = strlen($text) - 1; 
for($i = 0; $i < $length; $i ++) { 
$res .= $text[rand(0, $len)]; 
} 
return $res; 
}

function getString2($length = 5) { 
$text = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
$text = str_shuffle($text); 

$res = ''; 
$len = strlen($text) - 1; 

$res .= date(ysdm);
for($i = 0; $i < $length; $i ++) { 
$res .= $text[rand(0, $len)]; 
} 
return $res;
}

function getString3($length = 40) { 
$text = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
$text = str_shuffle($text);

$res = ''; 
$len = strlen($text) - 1; 
for($i = 0; $i < $length; $i ++) { 
$res .= $text[rand(0, $len)]; 
} 
return $res; 
}

// 난수생성
function getString_num() { 
$text = '0123456789'; 
$text = str_shuffle($text); 

$res = ''; 
$len = strlen($text) - 1; 

for($i = 0; $i < 5; $i ++) { 
$res .= $text[rand(0, $len)]; 
} 
return $res;
}

// 난수생성2
function getString_num2() { 
$text = '0123456789'; 
$text = str_shuffle($text); 

$res = ''; 
$len = strlen($text) - 1; 

for($i = 0; $i < 3; $i ++) { 
$res .= $text[rand(0, $len)]; 
} 
$res .= "-".date(ymds);
for($i = 0; $i < 4; $i ++) { 
$res .= $text[rand(0, $len)]; 
} 
return $res;
}

// 난수생성3
function getString_num3() { 
$text = '0123456789'; 
$text = str_shuffle($text); 

$res = ''; 
$len = strlen($text) - 1; 

for($i = 0; $i < 3; $i ++) { 
$res .= $text[rand(0, $len)]; 
}
$res .= date(ymdsiH);
return $res;
}

/*
*	문자열 자르기
*	$str : 원본 문자열
*	$len : 문자열 자를 길이
*/
function str_cut($str,$len) {

	$txt=mb_substr($str,0,$len,"UTF-8");
	if(mb_strlen($str,"UTF-8")>$len){$txt.="...";}
	return $txt;
	
}
/*
*	utf-8에서 문자열자르기.
*	String $str : 원본 문자열
*	Integer $len : 문자열을 자를 길이
*	Boolean $checkmb : 이 값을 true로 하면 한글을 영문2자와 같이 취급한다. 기본값은 false
*	String $tail : 생략후 붙일 줄임 기호
*/
function strcut_utf8($str, $len, $checkmb=false, $tail='···') {
//	preg_match_all('/[\xEA-\xED][\x80-\xFF]{2}|./', $str, $match);
//	$m    = $match[0];
//	$slen = strlen($str);  // length of source string
//	$tlen = strlen($tail); // length of tail string
//	$mlen = count($m);     // length of matched characters
//
//	if ($slen <= $len) return $str;
//	if (!$checkmb && $mlen <= $len) return $str;
//
//	$ret   = array();
//	$count = 0;
//
//	for ($i=0; $i < $len; $i++) {
//		$count += ($checkmb && strlen($m[$i]) > 1)?2:1;
//
//		if ($count + $tlen > $len) break;
//		$ret[] = $m[$i];
//		}
//
//	return join('', $ret).$tail;

	$substr = substr( $str, 0, $len * 2 );
	$multi_size = preg_match_all( '/[\x80-\xff]/', $substr, $multi_chars );

	if ( $multi_size > 0 )
	$len = $len + intval( $multi_size / 3 ) - 1;

	if ( strlen( $str ) > $len ){
	$str = substr( $str, 0, $len );
	$str = preg_replace( '/(([\x80-\xff]{3})*?)([\x80-\xff]{0,2})$/', '$1', $str );
	$str .= '...';
	}

	return $str;
}

// 중간글자 마스킹 처리 첫글자로 한글 , 영문 구분
function masking($str){
	$lan_ck = ord($str[0]);
	if($lan_ck >= 127){ // 첫글자 영문
		$kChar = 0;
		for( $i = 0 ; $i < strlen($str) ;$i++){
			$lastChar = ord($str[$i]);
			if($lastChar >= 127){
				$i= $i+2;
			}
			$kChar++;
		}
		if($kChar <= 1){
			$result = '*';
		}else if($kChar <= 2){
			$result = $result."".substr($str,"0","3")."*";
		}else{
			for( $i = 0 ; $i < $kChar ;$i++){
				if($i <= 0){
					$result = $result."".substr($str,"0","3");
				}else if($i == ($kChar-1)){
					$result = $result."".substr($str,(strlen($str)-3),"3");
				}else{
					$result = $result."*";
				}
			}
		}
	}else{ // 첫글자 한글
		$kChar = 0;
		for( $i = 0 ; $i < strlen($str) ;$i++){
			$lastChar = ord($str[$i]);
			if($lastChar >= 127){
				$i= $i+2;
			}
			$kChar++;
		}
		if($kChar <= 1){
			$result = '*';
		}else if($kChar <= 2){
			$result = $str[0]."*";
		}else{
			for( $i = 0 ; $i < $kChar ;$i++){
				if($i <= 0){
					$result = $result."".substr($str,"0","1");
				}else if($i == ($kChar-1)){
					$result = $result."".substr($str,(strlen($str)-1),"1");
				}else{
					$result = $result."*";
				}
			}
		}
	}
	return $result;
}

// 통합검색 글자 자르기 
function search_strcut($txt,$key,$len) {

	$ex_txt=explode($key,$txt);
	//$h_txt=substr($ex_txt[0],-20);
	$h_txt=mb_substr($ex_txt[0],-10,10,"UTF-8");
	if(str_count($ex_txt[0])>str_count($h_txt)){
		//$h_txt="...".$h_txt;
	}
	$b_txt=strcut_utf8(strstr($txt,$key),$len);
	$re_key=$h_txt.$b_txt;
	$re_key=str_replace($key,"<span style='background:#eef7b5;'>$key</span>",$re_key);

	return $re_key;

}

// UTF-8 글자수 세기
function str_count($str){
	$kChar = 0;
	for( $i = 0 ; $i < strlen($str) ;$i++){
		$lastChar = ord($str[$i]);
		if($lastChar >= 127){
			$i= $i+2;
		}
		$kChar++;
	}
	return $kChar;
}

//암호화 함수
function EnCode($sText, $sCode) {
    $cntData = strlen($sText) - 1;
    $cntCode = strlen($sCode) - 1;

    $arrData = array();
    $arrCode = array();


    for($i = 0;$cntData >= $i; $i++)
        $arrData[$i] = $sText[$i];

    for($i = 0;$cntCode >= $i; $i++)
        $arrCode[$i] = $sCode[$i];

    $flag = 0;
    $strResult = "";

    for($i = 0;$cntData >= $i; $i++) {

        $strResult = $strResult . (ord($arrData[$i]) ^ ord($arrCode[$flag])) . chr(8);

        if($flag == $cntCode)
            $flag = 0;
        else
            $flag++;
    }

    return base64_encode($strResult);
}

//복호화 함수
function DeCode($sText, $sCode) {

    $sText = base64_decode($sText);

    $arrData = explode(chr(8), $sText);
    $arrCode = array();

    $cntData = count($arrData) - 2;
    $cntCode = strlen($sCode) - 1;

    for($i = 0; $cntCode >= $i; $i++)
        $arrCode[$i] = $sCode[$i];

    $flag = 0;
    $strResult = "";

    for($i = 0;$cntData >= $i; $i++) {
        $strResult = $strResult . chr((int)($arrData[$i]) ^ ord($arrCode[$flag]));

        if($flag == $cntCode)
            $flag = 0;
        else
            $flag++;
    }

    return $strResult;
}

// 게시판 카테고리 이름가져오기
function ct_nm_var($idx) {
	$row=f_array("select ct_name from wk_board_category where idx='$idx'");
	return $row[0];
}

// 이미지 가로사이즈
function imgWidth($imgFile) {
	$size=@GetimageSize("$imgFile");
	$width=$size[0]; 
	return $width;
}

/*
*	문자열 치환
*	$str		: 문자
*	$start	: 시작위치 앞(S),뒤(E)
*	$len		: 치환개수
*	$rep	: 치환문자
*/
function rep_Str($str,$start,$len,$rep="*"){
	for($i=0;$i<$len ;$i++ ){
		$spe.=$rep;
	}
	if($start=="S"){	// 앞에서부터 치환
		$re_str=substr_replace($str,$spe,0,$len);
	}else {	// 뒤에서부터 치환
		$re_str=substr_replace($str,$spe,-$len);
	}
	return $re_str;
}

/*
*	문자열 치환
*	$str	 : 문자
*	$len	 : 노출시킬 문자 개수
*	$rep : 치환문자
*/
function idsch_Str($str,$len,$rep="*"){
	if(strlen($str)<=$len){$len=2;}else {$len=$len;}
	for($i=$len;$i<strlen($str) ;$i++ ){
		$l_str.="*";		
	}
	$re_str=substr($str,0,$len).$l_str;
	return $re_str;
}

function number_unformat($str)
{
	return (int)ereg_replace("[^0-9|-]","",$str);
}

//유니코드 문자열 자르기
function TextCut($str,$start,$len,$suffix = "..."){
$lenth=$len - $start+1;
	if(strlen($str)>$lenth){
		$str = substr($str, $start, $len);
		$cnt = 0;
		for ($i=0; $i<strlen($str); $i++)
			if (ord($str[$i]) > 127)
			$cnt++;
			$str = substr($str, $start, $len - ($cnt % 3)).$suffix;

	}
	return $str;
}

function TextDecode($text,$break=false)

/*function get_text($str, $html=0)
{
    $source[] = "/  /";
    $target[] = " &nbsp;";
    $source[] = "/</";
    $target[] = "&lt;";
    $source[] = "/>/";
    $target[] = "&gt;";
    //$source[] = "/\"/";
    //$target[] = "&#034;";
    $source[] = "/\'/";
    $target[] = "&#039;";
    $source[] = "/}/";
    $target[] = "&#125;";
    if ($html) {
        $source[] = "/\n/";
        $target[] = "<br>";
    }

    return preg_replace($source, $target, $text);
}
*/
{
	//$text = ereg_replace("\t"," ",stripslashes(trim($text)));
	$text = stripslashes(trim($text));
	if($break === true)	$text = nl2br($text);
	return $text;
}

function TextDecodeJs($text,$break=false){
	
	//$text = stripslashes(trim($text));
	$text = html_entity_decode($text,ENT_QUOTES);

	if($break === true)	$text = nl2br($text);
	return $text;
}



function HtmlDecode($text)
{
	$text = stripslashes(trim($text));
	return $text;
}




//배열항목의 텍스트형태 인코딩(테크제거)
function TextEncodeArr($arr)
{
	foreach($arr as $key => $val)
	{
		$enArr[$key] = TextEncode($val);
	}
	return $enArr;
}



//텍스트형태 인코딩(테크제거)
function TextEncode($text)
{
	//$text = stripslashes(trim($text));
	$text = ereg_replace("<\?", "&lt;?", $text);
    $text = ereg_replace("\?>", "?&gt;", $text);
    $text = ereg_replace("<\%", "&lt;%", $text);
    $text = ereg_replace("\%>", "%&gt;", $text);
	$text = htmlspecialchars($text,ENT_QUOTES);
	$text = addslashes($text);
	return $text;
}




//허용된 HTML포함 인코딩(제목용)
function HtmlEncodeTitle($text)
{
	$text = stripslashes(trim($text));
	$text = ereg_replace("<\?", "&lt;?", $text);
    $text = ereg_replace("\?>", "?&gt;", $text);
    $text = ereg_replace("<\%", "&lt;%", $text);
    $text = ereg_replace("\%>", "%&gt;", $text);

	$filterTag  = array("b","font","i","strong");

    $text = eregi_replace("<br>|</br>|</ br>", "", $text);
    $rCount = count($filterTag);
    for($i=0 ; $i < $rCount; $i++)
    {
    	//$text = preg_replace("/(<\/?)(".$filterTag[$i].")([^>]*>)/ei", "'|\\2|'", $text);
	    $text = eregi_replace("<".$filterTag[$i], "*x-".$filterTag[$i], $text);
		$text = eregi_replace("</".$filterTag[$i], "*/x-".$filterTag[$i], $text);

	}

	$text = strip_tags($text);
	$search = array ("'<script[^>]*?>.*?</script>'si",  // 자바 스크립트 제거
	                 "'<[\/\!]*?[^<>]*?>'si",           // HTML 태그 제거
	                 "'([\r\n])[\s]+'",                 // 공백 제거
	                 "'&(quot|#34);'i",                 // HTML 엔티티 치환
	                 "'&(amp|#38);'i","'&(lt|#60);'i","'&(gt|#62);'i","'&(nbsp|#160);'i",
	                 "'&(iexcl|#161);'i","'&(cent|#162);'i","'&(pound|#163);'i","'&(copy|#169);'i","'&#(\d+);'e");


	$replace = array ("",
	                  "",
	                  "\\1",
	                  "\"",
	                  "&","<",">"," ",
	                  chr(161),chr(162),chr(163),chr(169),"chr(\\1)");

	$text = preg_replace($search, $replace, $text);
	//$text = eregi_replace("\"", "'", $text);

	for($i=0 ; $i < $rCount; $i++)
    {
	    //$text = preg_replace("/(\|\/?)(".$filterTag[$i].")([^>]*\|)/e", "'<\\2>'", $text);
	    $text = eregi_replace("\*x-".$filterTag[$i], "<".$filterTag[$i], $text);
		$text = eregi_replace("\*/x-".$filterTag[$i], "</".$filterTag[$i], $text);
	}

	$text = addslashes($text);
	return $text;
}

//허용된 HTML포함 인코딩(본문용)
function HtmlEncode($text)
{

	// $document는 HTML 문서를 포함합니다.
	// 이는 HTML 태그, 자바스크립트 섹션, 공백을
	// 제거합니다. 또한, 몇몇 일반적인 HTML 엔티티를
	// 동일한 텍스트로 변환합니다.


	$text = stripslashes(trim($text));
	$text = ereg_replace("<\?", "&lt;?", $text);
    $text = ereg_replace("\?>", "?&gt;", $text);
    $text = ereg_replace("<\%", "&lt;%", $text);
    $text = ereg_replace("\%>", "%&gt;", $text);


    //허용가능한 태그를 미리 "*x-" 형태로 변환
    $filterTag  = array("a","b","font","img","i","center","strong","br","p","table","td","tr","ol","li","hr","u","ul","dt","dl","h1","h2","h3","h4","h5","h6","embed","style","!--","--","script","map","span","th","colgroup","col");
    $rCount = count($filterTag);
    for($i=0 ; $i < $rCount; $i++)
    {
	    $text = eregi_replace("<".$filterTag[$i], "*x-".$filterTag[$i], $text);
		$text = eregi_replace("</".$filterTag[$i], "*/x-".$filterTag[$i], $text);
	}

	$text = strip_tags($text);
	$search = array ("'<script[^>]*?>.*?</script>'si",  // 자바 스크립트 제거
	                 "'<[\/\!]*?[^<>]*?>'si",           // HTML 태그 제거
	                 "'([\r\n])[\s]+'",                 // 공백 제거
	                 "'&(quot|#34);'i",                 // HTML 엔티티 치환
	                 "'&(amp|#38);'i","'&(lt|#60);'i","'&(gt|#62);'i",
					 //"'&(nbsp|#160);'i",  //2011.06.22 문현준 업체 요구로 공백 허용을 위해 주석처리 문제발생시 다시 복구하기로 함.
	                 "'&(iexcl|#161);'i","'&(cent|#162);'i","'&(pound|#163);'i","'&(copy|#169);'i","'&#(\d+);'e");


	$replace = array ("",
	                  "",
	                  "\\1",
	                  "\"",
	                  "&","<",">"," ",
	                  chr(161),chr(162),chr(163),chr(169),"chr(\\1)");

	$text = preg_replace($search, $replace, $text);
	//$text = eregi_replace("\"", "'", $text);

	//미리 "*x-" 형태로 변환된 허용가능한 태그를 복구
	for($i=0 ; $i < $rCount; $i++)
    {
	    $text = eregi_replace("\*x-".$filterTag[$i], "<".$filterTag[$i], $text);
		$text = eregi_replace("\*/x-".$filterTag[$i], "</".$filterTag[$i], $text);
	}
	$text = addslashes($text);
	return $text;
}

// URL, Mail을 자동으로 체크하여 링크만듬
function autolink($str) {
		// URL 치환
		$homepage_pattern = "/([^\"\'\=\>])(mms|http|HTTP|ftp|FTP|telnet|TELNET)\:\/\/(.[^ \n\<\"\']+)/";
		$str = preg_replace($homepage_pattern,"\\1<a href=\\2://\\3 target=_blank>\\2://\\3</a>", " ".$str);

		// 메일 치환
		$email_pattern = "/([ \n]+)([a-z0-9\_\-\.]+)@([a-z0-9\_\-\.]+)/";
		$str = preg_replace($email_pattern,"\\1<a href=mailto:\\2@\\3>\\2@\\3</a>", " ".$str);

		return $str;
}

?>

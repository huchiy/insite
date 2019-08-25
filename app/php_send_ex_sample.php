<?

	/************************************************************************************************
	*
	* PHP 연동 예제 소스
	* 
	* 전달값 중 returnURL은 사용할 수 없다.
	* sendMsg과 sendDate urlencode()를 사용하여 넘겨주시기 바랍니다.
	* file_get_contents() 함수 이용시 에러가 발생하시는 경우
    * php.ini 파일에서 allow_url_fopen 값이 On 으로 되어 있는지 확인해주세요.
	*
	* allow_url_fopen = On이 아닌경우 socket 또는 html예제를 이용하여 연동하여 주시기 바랍니다.
	*
	* 전송결과 결과코드 | 결과메세지 | 성공건수 | 실패건수 | 남은건수 | 사용자임의변수명^변수값 | 사용자임의변수명^변수값 ... 형태로 출력
	* 전송결과코드는 쉬프트 | 로 구분하여 사용하시면 됩니다.
	* 
	* 필수 입력 정보는 반드시 입력하시기 바랍니다. 
	* 테스트 전송 후 실제전송을 위해서는 선결제 후 전송하시기 바랍니다.
	* 결과코드표를 참조하여 연동하시기 바랍니다.
	*
	* charset 이 EUC-KR 일 경우 http://www.sms9.co.kr/authSendApi/authSendApi.php
	* charset 이 UTF-8 일 경우 http://www.sms9.co.kr/authSendApi/authSendApi_UTF8.php 
	*
	* 전송부탁드립니다.
	*
	* 기술문의는 02-3430-5074 조진연과장 부탁드립니다.
	*
	****************************************************************************************************/
	
	//전송처리 함수 생성
	function SendMsgApiToUrl($sendUrl){

		$sendResult = file_get_contents($sendUrl);

		$sendResult = trim($sendResult);

		return $sendResult;
	}

	//변수선언
	$sUserid = "petdol";										//9원문자 가입후 발급받은 회원님의 ID
	$authKey = "31NGWZPauefWqkkxI7PrUX7QpOcOEfTB";						//9원문자 가입>연동신청 후 발급받은 회원님 고유인증키
	$sendMsg = urlencode("test123");										//전송할 메세지 내용
	$destNum = "01054405414";													//받는분 휴대폰번호. 대량전송시 | 로 구분하여 입력 예) 01000000000|01000000001|01000000002...
	$callNum = "07052080907";													//보내는분 전화번호. 관공서,은행등 특수번호 및 전화번호형태가 아닌 번호는 사용할 수 없으므로 유의하시기 바랍니다.(지역번호입력)
	$sMode = "Test";												//테스트전송과 실제전송을 구분하는 변수. Test(테스트전송) 또는 Real(실전송). 기본값 : Test
	$sendDate = date("Y-m-d H:i:s");								//전송일자
	$sType = "SMS";													//짧은문자 또는 장문문자를 구분하는 변수. SMS(짦은문자) 또는 LMS(장문문자). 기본값 : SMS
	$customVal = "";												//사용자 지정 변수. 변수명^값|변수명^값 형태로 구분.
	$sSubject = urlencode("");										//sType이 (장문문자)LMS일 경우만 사용. 메세지제목이며. 값이 없으면 "장문메세지"로 전송

	$sendUrl = "http://www.sms9.co.kr/authSendApi/authSendApi.php";
	$sendParam = "?sUserid=".$sUserid."&authKey=".$authKey."&sendMsg=".$sendMsg."&destNum=".$destNum."&callNum=".$callNum."&sMode=".$sMode;

	$sendParamURL = $sendUrl.$sendParam;

	$sendResult = SendMsgApiToUrl($sendParamURL);


	echo $sendResult; 

?>
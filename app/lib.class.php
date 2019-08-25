<?
/**
*		사이트 전체 클래스
*/

// 올바른 날짜인지 확인
function ValidateDate($date, $format = 'Y-m-d H:i:s') {
	$version = explode('.', phpversion());
	if (((int) $version[0] >= 5 && (int) $version[1] >= 2 && (int) $version[2] > 17)) {
		$d = DateTime::createFromFormat($format, $date);
	}else {
		$d = new DateTime(date($format, strtotime($date)));
	}
	return $d && $d->format($format) == $date;
}

// 오늘이 속한 주 시작날짜과 끝날짜 구함.
function getWeek($today="") { 
	if(!$today) $today = time(); 
	if(strlen($today)==8) { 
		$ty = substr($today,0,4); 
		$tm = substr($today,4,2); 
		$td = substr($today,6,2); 
		$now_time = mktime(0,0,0,$tm,$td,$ty); 
	}elseif(strlen($today)==10) $now_time = $today; 
	else return 0; //error 
	$t_week = date("w", $now_time); 

	$set[0] = $set[start] = $now_time-($t_week*86400); 
	$set[1] = $set[end] = $now_time+((6-$t_week)*86400); 

	return $set; 
}

/*
*	사용 브라우저 정보
*/
function browserName() {
	// 사파리를 뒤로 뺀 이유는  다른 브라우저들의 agent string에서 사파리가 나타나기 때문.
	// 위험요소다. 
	 $broswer_list = array('MSIE', 'Chrome', 'Firefox', 'iPhone', 'iPad', 'Android', 'PPC', 'Safari', 'none'); 
	$browser_name = 'none';
	foreach ($broswer_list as $user_browser){ 
		if($user_browser === 'none') break;	 
		if(strpos($_SERVER['HTTP_USER_AGENT'], $user_browser)){ 	 
			$browser_name = $user_browser;		 
			break; 
		}
	}
	return $browser_name;
}

// 고유값 생성
function prd_idx($tb) {
	$d=date("YmdHis",time());
	$n=rand(1,999);
	$pd_no=$tb."_".$n."_".$d;
	return $pd_no;
}

/*
*	문자발송
*	$S_name : 보내는 사람이름
*	$S_hp : 보내는 사람 연락처
*	$R_name : 받는 사람이름
*	$R_hp : 받는 사람 연락처
*	$R_msg : 문자 내용
*
*	치환 변수
*	이름 : {_name_}
*/
function SMS_SEND($R_hp,$R_msg) {
	$sms = new coolsms();
	$sms->charset("utf8");
	$sms->setuser("hodo1", "hodo7736");
	$sms->addsms($R_hp, "02-753-0777", $R_msg);
	$sms->connect();
	$sms->send();
	$sms->disconnect();
	$sms->emptyall();
}
// LMS문자
function LMS_SEND($R_hp,$R_msg) {
	$sms = new coolsms();
	$sms->charset("utf8");
	$sms->setuser("hodo1", "hodo7736");
	$sms->addlms($R_hp, "02-753-0777", "[Webkorea]",$R_msg);
	$sms->connect();
	$sms->send();
	$sms->disconnect();
	$sms->emptyall();
}

/**
*	메일발송
*
*	$se_mail - 보내는 사람 메일.
*	$se_name - 보내는 사람이름.
*	$mail_subject - 메일제목.
*	$email - 받는 사람 메일.
*	$user_name - 받는 사람 메일.
*	$mail_content - 내용.
*
*	첨부파일전송 X
*/
function sendMail($se_mail,$se_name,$mail_subject,$email,$user_name,$mail_content) {

	$subject = "[일본스키닷컴] $mail_subject";  //메일 제목
	$fromName = "[{$se_name}]";  //보내는이 이름
	$fromMail = $se_mail;  //보내는이 메일
	$toName = $user_name; //받는이 이름
	$toMail = $email; //받는이 메일
  
  
	// 메일 헤더
	$headers = "From : =?utf-8?B?".base64_encode($fromName)."?=\n <".$fromMail.">\n";
	
	$headers .= "Return-Path : < $fromMail >\n";		
	$headers .= "X-Mailer: PHP WebMail \n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";


	$rs = mail($toMail, "=?utf-8?B?".base64_encode($subject)."?=", $mail_content, $headers);
		
	return $rs;

}

// 비밀번호찾기 메일발송
function pwd_sendMail($se_mail,$se_name,$mail_subject,$email,$user_name,$pwd) {

	$subject = "[일본스키닷컴] $mail_subject";  //메일 제목
	$fromName = "[{$se_name}]";  //보내는이 이름
	$fromMail = $se_mail;  //보내는이 메일
	$toName = $user_name; //받는이 이름
	$toMail = $email; //받는이 메일
  
  
	// 메일 헤더
	$headers = "From : =?utf-8?B?".base64_encode($fromName)."?=\n <".$fromMail.">\n";
	
	$headers .= "Return-Path : < $fromMail >\n";		
	$headers .= "X-Mailer: PHP WebMail \n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=utf-8\r\n";

	$mail_content="<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>일본스키.com - 임시 비밀번호 발송</title>
</head>
<style>
*{padding:0px; margin:0px;}
</style>
<body>
<div style='width:100%;'>
	<div style=' width:680px; margin:auto; height:80px; padding-top:30px;'><img src='http://175.126.166.169/images/email/temp_emailLogo.gif' width='168' height='51' alt='ILBONSKI.COM' /></div>
  <div style='width:100%; height:50px; background:#254b7c;'>
  	<div style='width:680px; margin:auto; padding-top:14px;'><img src='http://175.126.166.169/images/email/temp_emailTt.gif' width='177' height='22' alt='임시 비밀번호 발송' /></div>
  </div>
  <div style='width:680px; margin:auto; font-size:14px; line-height:20px; padding-top:30px;'>
  	<p>요청하신 임시 비밀번호를 발송해드립니다. <br />
    	<em style='font-style:normal; font-weight:bold; color:#f87f00;'>아래의 임시 비밀번호를 이용하여 로그인 후 반드시 다른 비밀번호로 변경</em>해주세요.
    </p>
    <p style='width:638px; height:78px; line-height:80px; background:#f9f8f8; border:solid 1px #e4e4e4; font-size:24px; padding-left:40px; margin-top:30px;'>임시 비밀번호 :
    	<em style='font-style:normal; font-weight:bold; color:#f87f00; font-family:Arial, Helvetica, sans-serif;'>".$pwd."</em>
    </p>
    <p style='width:680px; padding:30px 0 40px 0; border-bottom:solid 1px #e4e4e4;'>호도트래블을 이용해 주셔서 감사합니다.<br />
    더욱 편리한 서비스를 제공하기 위해 언제나 최선을 다하겠습니다.</p>
    <p style='line-height:18px; font-size:11px; color:#a1a1a1; font-family:Arial, Helvetica, sans-serif; padding-top:40px;'>본 메일은 발신 전용으로 회신되지 않습니다.<br />
    ⓒ 2015 ilbonski.com Company. All Rights Reserved. </p>
  </div>
</div>
</body>
</html>";

	$rs = mail($toMail, "=?utf-8?B?".base64_encode($subject)."?=", $mail_content, $headers);
		
	return $rs;

}

// 메뉴타입 출력
function ch_type($mtype) {
	switch($mtype){
		case 1:$re_type="준비중";break;
		case 2:$re_type="HTML";break;
		case 3:$re_type="게시판";break;
		case 4:$re_type="코딩페이지연결";break;
		case 5:$re_type="링크";break;
		case 6:$re_type="서브페이지사용";break;
	}
	return $re_type;
}



// 함수 : imgName()
// 기능 : 이미지 경로에서 이미지 명 가졍괴
// 매변 : 이미지경로
function imgName($imgsrc)
{
	$src = explode("/",$imgsrc);
	$src_len = count($src) -1;
	$img = $src[$src_len];
	$ext = strrchr($img,'.');
	return str_replace($ext,"",$img);
}


// 내용에서 첫번째 이미지 출력
function contentImg($content) {

	$imgcontent=HtmlDecode($content);
	$imgcon=preg_replace('@<[^<]*common/icon[^>]*>@is','',$imgcontent);
	$pos1= stristr($imgcon,'<IMG');//첫번째 여는 이미지 태그부터 pos1에 담고 
	$pos2= strpos($pos1,'>');//첫번째 닫는 태그의 위치를 잡는다. 
	$img_result = stristr(substr($pos1,0,$pos2),'src');//첫번째 이미지 태그 추출결과에서 src이후 부분만 추출. 
	if(strpos($img_result," ")){
	$img_result = substr($img_result,0,strpos($img_result," "));//src속성 뒤의 첫번째 공백까지 추출(각 속성 사이엔 공백이 분명 있으므로...) 
	}
	if(strpos($img_result," ")){
		$img_result = substr($img_result,0,strpos($img_result," "));//src속성 뒤의 첫번째 공백까지 추출(각 속성 사이엔 공백이 분명 있으므로...) 
	}

	$img_result = str_replace("src","",$img_result);
	$img_result = str_replace("'","",$img_result);
	$img_result = str_replace("\"","",$img_result);
	$img_result = str_replace("=","",$img_result);

	return $img_result;

}


//값이 있는지, 공백만있는 값인지 체크
function EmptyCheck($chkVar,$errorMsg="")
{

	if(!ereg("[^ \f\r\n\t]",$chkVar) or $chkVar == "")
	{

		if($errorMsg !="")
		{
		 	ErrorAndBack($errorMsg);
		}
		else
		{
			return false;
		}
	}
	else
	{
		return true;
	}


}

//값이 존재하는지 체크
function CheckExists($colName,$colVar,$tbName)
{
global $conn;

	$query = "SELECT $colName FROM $tbName WHERE $colName='$colVar'";
  	$result = mysql_query($query,$conn) or die(mysql_error());

  	if(mysql_num_rows($result))
  	{
  		mysql_free_result($result);
		return true;  //값이 있으면
	}
	else
	{
		mysql_free_result($result);
		return false; //값이 없으면
	}
}


//값이 존재하는지 체크(대소문자 통일 - 회원)
function CheckExists1($colName,$colVar,$tbName,$idx)
{
global $conn;
	if($idx){
	$query = "SELECT $colName FROM $tbName WHERE $colName='$colVar' and idx!=$idx";
	}else{
	$query = "SELECT $colName FROM $tbName WHERE $colName='$colVar'";
	}
  	$result = mysql_query($query,$conn) or die(mysql_error());

  	if(mysql_num_rows($result))
  	{
  		mysql_free_result($result);
		return true;  //값이 있으면
	}
	else
	{
		mysql_free_result($result);
		return false; //값이 없으면
	}
}

//////
//
// 에러 처리 함수
//
//////ErrorAndBack

//에러메세지 출력후 이전으로 돌아감
function ErrorAndBack($errorTxt)
{
	echo"<script> \n history.back();\n";
	echo "alert(\"$errorTxt\")</script>";
	exit();
}

function errmsg( $msg,$url ) {//post 제한 때문에 다시 돌려줄때는 주소로..
	echo (" <script>
		window.alert('$msg');
		location.href='$url';
		</script>
		");
	exit;
}


function Err_msg_back($msg)
{
    echo("<script>
          alert('$msg');
          history.back();
          </script>");
    exit;
}

function Err_msg($msg)
{
    echo("<script>
          alert('$msg');
          </script>");
    exit;
}

//입력값중 문제성 코드 필터링
function TagFilter($chkVar)
{
	$reVar = trim($chkVar);
	$reVar = htmlspecialchars($reVar);
	$reVar = addslashes($reVar);
	return $reVar;
}


function UnFilterText($chkVar)
{
	$reVar = stripslashes($chkVar);
	return $reVar;
}

function UnFilterHtml($chkVar)
{
	$reVar = stripslashes($chkVar);
	$reVar = nl2br($reVar);
	return $reVar;
}

//페이지 번호출력
function PageListViewUser($linkstart,$linklast,$page,$tt,$search,$searchstring,$nextlink,$previouslink,$str1)
{
	global $PHP_SELF;


	if ($linkstart!=1) {
		echo "<a HREF='$PHP_SELF??page=1&search=$search&searchstring=$searchstring".$str1."' title='처음으로'>";

		echo "<img src=\"../images/board/board_f_btn.gif\" alt=\"처음으로\" width=\"13\" height=\"14\" class=\"imgv\" /></a>&nbsp;";

		echo "<a HREF='$PHP_SELF?page=$previouslink&search=$search&searchstring=$searchstring".$str1."'>";
		echo "<img src=\"../images/board/board_p_btn.gif\" alt=\"이전10개\" width=\"13\" height=\"14\" class=\"imgv\"/></a>&nbsp;&nbsp;&nbsp;";

	}
	for ($i=$linkstart;$i<=$linklast;$i++){
		if ($i==$page) echo "<span style=\"font-weight:bold;\">$i</span>&nbsp;&nbsp;&nbsp;";
		else echo "<a HREF='$PHP_SELF?page=$i&search=$search&searchstring=$searchstring".$str1."'>$i</a>&nbsp;&nbsp;&nbsp;";
	}
	if ($linklast!=$tt) {
		echo "<A HREF='$PHP_SELF?page=$nextlink&search=$search&searchstring=$searchstring".$str1."'>";
		echo "<img src=\"../images/board/board_n_btn.gif\" alt=\"다음10개\" width=\"13\" height=\"14\" class=\"imgv\"/></a>&nbsp;";
		echo "<A HREF='$PHP_SELF?page=$tt&search=$search&searchstring=$searchstring".$str1."' title='끝으로'>";
		echo "<img src=\"../images/board/board_e_btn.gif\" alt=\"끝으로\" width=\"13\" height=\"14\"  class=\"imgv\"/></a>&nbsp;";
	}
}

//상품등록시 idx값 생성하는 함수
//ex) $idx = makeIDX("wk_lodge","ST","idx","reg_date");
function makeIDX( $Tabname , $head , $idxName , $datetime ) {
	$itYear = date('Y');
	$itMonth = date('m');
	$itDate = $itYear."-".$itMonth."-01";
	$deStr = "0000";

	$row_c1=f_array("select count(*) as c1 from ". $Tabname ." where ". $datetime ." > '". $itDate ."'");
	$cnt = $row_c1['c1'] + 1;

	$mung = 0;
	while ( $mung == 0 ){
		$mk = substr( $deStr, 0, strlen($destr) - strlen($cnt) )."".$cnt;
		$mk1 = $head."".substr( $itYear, -2, 2 )."".$itMonth."".$mk;
		$mung++;

		$row_c2=f_array("select count(*) from ". $Tabname ." where ". $idxName ." = '". $mk1 ."'");

		if( $row_c2 ){
			$mung++;
		}else{
			$cnt = $cnt + 1;
		}
	}
	return $mk1;
}
?>

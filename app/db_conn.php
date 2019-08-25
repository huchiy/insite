<?@session_start();
@header('P3P: CP="NOI CURa ADMa DEVa TAIa OUR DELa BUS IND PHY ONL UNI COM NAV INT DEM PRE"');
@header("Content-Type: text/html; charset=UTF-8");

//ini_set('display_errors','On'); 

$Sid=session_id();
$host="localhost";
$db_name="dailyinsite";
$db_pass="dailyinsiteadmin1";
$db="dailyinsite";
$conn=mysqli_connect($host,$db_name,$db_pass) or die("DB connect error.");
mysqli_select_db($conn,$db);
mysqli_set_charset($conn,"utf8");

@extract($_GET);
@extract($_POST);
@extract($_SERVER);

// 개발, 실서버 구분 // html, paykhan
$server_link = 'html';
//$server_link = 'paykhan';

// 도메인
$Domains_URL="http://".$HTTP_HOST;

// 홈페이지 전체경로 설정
$full_URL="http://".$HTTP_HOST.dirname($PHP_SELF);

// 홈페이지 전체경로와 변수
$full_Req_URL="http://$HTTP_HOST/$REQUEST_URI";

// 현재 페이지명
$pg_names=basename($PHP_SELF);

// .php 제거한 페이지
$PAGE_SELF = str_replace(".php" , '' , $PHP_SELF);

// 쿼리스트링(파라미터값)
$QUERY_STRING = $_SERVER['QUERY_STRING'];

// 쿼리스트링 포함한 자기페이지
$URL_SELF = $PAGE_SELF.'?'.$QUERY_STRING;

// 현재 페이지까지 폴더 경로
$absolute_path = dirname($PHP_SELF);

// 폴더 경로 구하기
$abs_exp=explode("/",$absolute_path);
$relative_path = end($abs_exp); // 현재 파일이 있는 폴더
$first_path = $abs_exp[1]; // 현재 파일이 있는 폴더

// 아이피
$user_ip=$REMOTE_ADDR;

// 기본경로
if(!$pgUp) $pgUp="../";

$date=date("Y-m-d");
$time=time();
$dateH=date("H");

// 폴더
$sg_gb="ko";$file_url="/";$file_up_url="";
?>

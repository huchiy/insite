<?include "db_conn.php";	// DB 접속
include 'coolsms-v4-examples-master/php/simple_msg.php';// coolsms
include "lib.act.php";		// URL 함수
include "lib.query.php";	// MySql 함수
include "lib.string.php";	// 문자열 함수
include "lib.class.php";	// class 함수
include "lib.member.php";	// 회원 함수
include "lib.bbs.php";	// 게시판 함수
include "lib.thumb.php";// 이미지 썸네일 함수
include "lib.reserve.php";// 예약관련 함수
include "lib.product.php";// 상품관련 함수
include "Mobile_Detect.php";// mobile check 함수
include "iamport.php";// iamport 아임포트 클래스
include "lib.sms.php";// 9원문자 api

// 세션 쿠키처리
if($_COOKIE['p_token_val']){
	$_SESSION['p_token_val']=$_COOKIE['p_token_val'];
	$hp_rows = f_array("select * from Pka_User where token_val = '$_SESSION[p_token_val]'");
	$_SESSION['p_PU_userid']=$hp_rows['PU_userid'];
}else{}

$page_para="sidx=".$sidx."&tidx=".$tidx."&ct_idx=".$ct_idx."&b_idx=".$b_idx."&tb_gubun=".$tb_gubun."&tb_name=".$tb_name;

// PC, 모바일 구분
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

//$pg_gb=browserCk();
$pg_gb=MobileCheck();

/*
*	관리자페이지 변수
*
*	lf_no		: 좌측메뉴 변수
*	lf_sort		: 좌측메뉴 리스트 번호 변수
*	lf_sort2	: 2차 좌측메뉴 리스트 번호 변수
*/
$para_url="lf_no=$lf_no&lf_sort=$lf_sort&lf_sort2=$lf_sort2";


// 검색변수
if($mode=="search"){
	// 예약
	$order_url="mode=$mode&s_gb=$s_gb&s_area=$s_area&s_area2=$s_area2&s_user_name=$s_user_name&s_order_code=$s_order_code&s_product=$s_product&s_air_ticket=$s_air_ticket&s_s_rg_date=$s_s_rg_date&s_e_rg_date=$s_e_rg_date&s_hp=$s_hp&s_damdang=$s_damdang&s_s_st_date=$s_s_st_date&s_e_st_date=$s_e_st_date&s_st_gb1=$s_st_gb1&s_st_gb2=$s_st_gb2&s_st_gb3=$s_st_gb3&s_st_gb4=$s_st_gb4&s_st_gb5=$s_st_gb5&s_st_gb6=$s_st_gb6&s_st_gb7=$s_st_gb7&s_adm_state1=$s_adm_state1&s_adm_state2=$s_adm_state2&s_adm_state3=$s_adm_state3";
	// 상품, 스키장, 스키시설, 숙박
	$prduct_url="mode=$mode&s_area=$s_area&s_area2=$s_area2&s_day1=$s_day1&s_day2=$s_day2&s_trans=$s_trans&s_visible=$s_visible&s_main_ck=$s_main_ck&s_sp_ck1=$s_sp_ck1&s_sp_ck2=$s_sp_ck2&s_sp_ck3=$s_sp_ck3&s_sp_ck4=$s_sp_ck4&s_pk_name=$s_pk_name&s_title=$s_title&s_name=$s_name&ho_name=$ho_name&s_phone=$s_phone&start_rooms=$start_rooms&end_rooms=$end_rooms";
	// 회원, 직원, 게시판, 배너
	$mb_bbs_url="mode=$mode&s_state=$s_state&keyfield=$keyfield&key=$key&s_part=$s_part&s_position=$s_position&s_introduce_ck=$s_introduce_ck&s_view_ck=$s_view_ck&sg_g=$sg_g";
}else {
	$order_url="";$prduct_url="";$mb_bbs_url="";
}

function getBrowser() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
 
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) { $platform = 'linux'; }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) { $platform = 'mac'; }
    elseif (preg_match('/windows|win32/i', $u_agent)) { $platform = 'windows'; }
     
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) { $bname = 'Internet Explorer'; $ub = "MSIE"; } 
    elseif(preg_match('/Firefox/i',$u_agent)) { $bname = 'Mozilla Firefox'; $ub = "Firefox"; } 
    elseif(preg_match('/Chrome/i',$u_agent)) { $bname = 'Google Chrome'; $ub = "Chrome"; } 
    elseif(preg_match('/Safari/i',$u_agent)) { $bname = 'Apple Safari'; $ub = "Safari"; } 
    elseif(preg_match('/Opera/i',$u_agent)) { $bname = 'Opera'; $ub = "Opera"; } 
    elseif(preg_match('/Netscape/i',$u_agent)) { $bname = 'Netscape'; $ub = "Netscape"; } 
     
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
     
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){ $version= $matches['version'][0]; }
        else { $version= $matches['version'][1]; }
    }
    else { $version= $matches['version'][0]; }
     
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    return array('userAgent'=>$u_agent, 'name'=>$bname, 'version'=>$version, 'platform'=>$platform, 'pattern'=>$pattern);
}
 
$ua = getBrowser();
//if($ua[name] == 'Internet Explorer' && $ua[version] < 11) { echo '11 이하의 버전을 사용하고 계십니다'; }

 preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
 if(count($matches)<2){
    preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
 }
 if (count($matches)>1){
    $version = $matches[1];
	$bname = 'Internet Explorer';
 } else {
    $version = 999;
 }
 if($version >= 9) {
 }

//Check Mobile
$mAgent = array("iPhone", "iPod", "Android", "Blackberry", "Opera Mini", "Windows ce", "Nokia", "sony" );
$chkMobile = false;
for($i=0; $i<sizeof($mAgent); $i++){
    if(stripos( $_SERVER['HTTP_USER_AGENT'], $mAgent[$i] )){
        $chkMobile = true;
        break;
    }
}


function get_url($url ) {
	$url .= "?ver=".date("Ymdhis",@filemtime($url)); 
    return $url;
}

function cut_str($str, $len, $suffix="…")
{
    $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    $str_len = count($arr_str);

    if ($str_len >= $len) {
        $slice_str = array_slice($arr_str, 0, $len);
        $str = join("", $slice_str);

        return $str . ($str_len > $len ? $suffix : '');
    } else {
        $str = join("", $arr_str);
        return $str;
    }
}
?>

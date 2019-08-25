<?
include "../inc/inc_head.php";

$popup_stat = f_array("select * from wk_popup where idx='$idx'");
//$COOKIE_NAME="POPUP_COOKIE_".$popup_stat[idx];
$COOKIE_NAME="p_cookie_".$popup_stat[idx];
if($popup_stat[cookie_ck]==1) {
	$pop_day=1;
	$pop_txt="오늘 하루 이창을 열지 않음";
}else {
	$pop_day=365;
	$pop_txt="이창은 다시는 띄우지 않음";
}
?>
<html>
<head>
<title><?=$popup_stat[subject];?></title>
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, user-scalable=yes" />
<link href="style.css" rel="stylesheet" type="text/css">
<script src="../js/jquery-1.9.1.js"></script>
</head>

<script language="JavaScript">
<!--
function setCookie( name, value, expiredays ){

	var todayDate = new Date();
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"

}

// 창닫고 쿠기생성
function closeWin(){

	if( document.popup_form.popup_end.checked ) {
		setCookie( '<?=$COOKIE_NAME;?>', 'NO', <?=$pop_day?> );//쿠기 저장 기간
	}
	window.close();

} 
// 창닫고 이동
function closeGo(url){
	opener.parent.window.location.href=url;
	window.close();
}
//-->
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
<form name="popup_form">
  <tr>
    <td width="100%" height="100%" valign="top" id="content_td"><?=$popup_stat[content];?></td>
  </tr>
  <tr>
    <td align="right" style="padding:3px;"><input type=checkbox name="popup_end"><span style="font-size:12px;"><?=$pop_txt?></span>&nbsp;&nbsp;<a href="javascript:closeWin();"><img src="./img/popup_img02.gif" width="40" height="13" align="absmiddle" border="0"></a>&nbsp;</td>
  </tr>
 </form>
</table>
</body>
</html>
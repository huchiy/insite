<?
if($main=="Y"){$site_url="./";$adm_url="./";}// 인덱스 로그인
else {$site_url="../../";$adm_url="../../";}	// 폴더에서

include $site_url."app/inc_head.php";
?>

<?if($main=='Y' || $customer=='Y' || $loginspot=='Y'){// 메인 || 커스토머 || 로그인과정?>
<?}else{// 모두아님?>
	<?if($_SESSION[p_token_val]){// 세션없음 ?>
	<?}else{?>
		<script>alert('로그인 후 이용해주세요.');location.replace('/');</script>
	<?}?>
<?}?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<title>INSITE</title>

<!--네이버웹마스터도구 최적화-->
<meta name="description" content="INSITE">
<meta property="og:type" content="website">
<meta property="og:title" content="INSITE">
<meta property="og:description" content="나만의 웹을 정의하고 새로운 영감을 얻으세요.">
<meta property="og:image" content="http://dailyinsite.com/assets/admin/images/admin_logo.png">
<meta property="og:url" content="http://dailyinsite.com/">
<link rel="canonical" href="http://dailyinsite.com/">
<!--네이버웹마스터도구 최적화-->

<?php
if ($chkMobile) { //모바일
    echo '<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi">'.PHP_EOL;
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'.PHP_EOL;
    echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
    echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;
		echo '<link rel="apple-touch-icon" href="img/favorite/favorite_mobile.png" />'.PHP_EOL;
} else {
    echo '<meta http-equiv="imagetoolbar" content="no">'.PHP_EOL;
    echo '<meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">'.PHP_EOL;
		echo '<link rel="shortcut icon" href="/assets/images/favorite/favorite.ico" />'.PHP_EOL;
		echo '<link href="http://fonts.googleapis.com/earlyaccess/nanumgothic.css" rel="stylesheet" type="text/css">'.PHP_EOL;
		echo '<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">'.PHP_EOL;
}

	echo '<link rel="stylesheet" href="'.get_url('/assets/js/magnific-popup/magnific-popup.css').'">'.PHP_EOL;
if($chkMobile) {
	echo '<link rel="stylesheet" href="'.get_url('/assets/js/mobile/slideNav/slideNav.css').'">'.PHP_EOL;
	echo '<link rel="stylesheet" href="'.get_url('/assets/css/mobileDefault.css').'">'.PHP_EOL;
	echo '<link rel="stylesheet" href="'.get_url('/assets/css/mobile.css?'.time().'').'">'.PHP_EOL;
	echo '<link rel="stylesheet" href="'.get_url('/assets/css/site_style.css?'.time().'').'">'.PHP_EOL;
} else {
	echo '<link rel="stylesheet" href="'.get_url('/assets/js/form/bootstrap-select/bootstrap-select.css').'">'.PHP_EOL;
	echo '<link rel="stylesheet" href="'.get_url('/assets/css/styleDefault.css?'.time().'').'">'.PHP_EOL;
	echo '<link rel="stylesheet" href="'.get_url('/assets/css/style.css?'.time().'').'">'.PHP_EOL;
	echo '<link rel="stylesheet" href="'.get_url('/assets/css/site_style.css?'.time().'').'">'.PHP_EOL;
}

echo '<script src="/assets/js/jquery/jquery-1.11.0.min.js"></script>'.PHP_EOL;
if($chkMobile) {
	echo '<script src="/assets/js/form/jquery.min.js"></script>'.PHP_EOL;
	//slideNav - Javascript & css
	echo '<script type="text/javascript" src="'.get_url('/assets/js/mobile/slideNav/skel.min.js').'"></script>'.PHP_EOL;
	echo '<script type="text/javascript" src="'.get_url('/assets/js/mobile/slideNav/slide-nav.js').'"></script>'.PHP_EOL;
	echo '<script type="text/javascript" src="'.get_url('/assets/js/mobile/slideNav/nav.js').'"></script>'.PHP_EOL;
	echo '<script type="text/javascript" src="'.get_url('/assets/js/mobile/slideNav/dropdown.js').'"></script>'.PHP_EOL;
	echo '<script type="text/javascript" src="'.get_url('/assets/js/mobile/myScript.mob.js').'"></script>'.PHP_EOL;
} else {
	echo '<script src="/assets/js/form/bootstrap-select/bootstrap.min.js"></script>'.PHP_EOL;
	echo '<script src="/assets/js/form/bootstrap-select/bootstrap-select.js"></script>'.PHP_EOL;
	echo '<script src="'.get_url('/assets/js/myScript.js').'"></script>'.PHP_EOL;
}

echo '<script src="'.get_url('/assets/js/magnific-popup/jquery.magnific-popup.js').'"></script>'.PHP_EOL; // http://dimsemenov.com/plugins/magnific-popup/  https://github.com/dimsemenov/Magnific-Popup
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>'.PHP_EOL;
?>
<script src="/assets/js/animation/easing.js"></script>
<script src="/assets/js/animation/jquery.nicescroll.min.js"></script>
<script src="/assets/js/animation/jquery.appear.js"></script>
<script src="/assets/js/hellojs/hello.all.min.js?<?=time()?>"></script>
<!--google api-->
<script src="https://apis.google.com/js/api:client.js"></script>

<script>
	// google logout
	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
			console.log('User signed out.');
		});
		auth2.disconnect();
	}
	// google login
	function attachSignin(element) {
		//console.log(element.id);
		auth2.attachClickHandler(element, {},
				function(googleUser) {
					var profile = googleUser.getBasicProfile();
					$.ajax({
						type: 'POST',
						url: '../../app/ajax_check',
						data:{
							'checkName' : 'google_login',
							'PU_userid': profile.getId(),
							'PU_name': profile.getName(),
							'PU_Imageurl': profile.getImageUrl(),
							'PU_email': profile.getEmail()
						},
						cache: false,
						async: false,
						error : function(request,status,error){
							alert("code : "+request.status+"\r\nmessage : " + request.responseText);
						},
						success: function(result) {
							result = result.replace(/(^\s*)|(\s*$)/g, "");
							var re=result.split("///");
							//alert(result);
							if(result=="ok"){
								location.href='<?=$PAGE_SELF?>';
							}else if(result=="ok1"){
								location.href='<?=$PAGE_SELF?>';
							}else if(result=="10"){
								alert('로그인 정보를 못받아왔습니다.');
							}else{
								alert("Error");
							}
						}
					 });

				}, function(error) {
					//alert(JSON.stringify(error, undefined, 2));
		});
	}
	// google login
	var googleUser = {};
	var startApp = function() {
		gapi.load('auth2', function(){
			// Retrieve the singleton for the GoogleAuth library and set up the client.
			auth2 = gapi.auth2.init({
				client_id: '165033922618-a6lqjg5ahjda6ac2mm2paqriirre85t1.apps.googleusercontent.com',
				cookiepolicy: 'single_host_origin',
				// Request scopes in addition to 'profile' and 'email'
				//scope: 'additional_scope'
			});
			attachSignin(document.getElementById('googlelogin'));
		});
	};
	startApp();
</script>
<!--google api-->
<script src="/assets/js/site_jquery.js?<?=time()?>"></script>


<?php if(!$chkMobile) { ?>
<style>html{height:100%; overflow: hidden;}</style>
<script>
(function(){
	jQuery(document).ready(function(){
		jQuery("html").niceScroll({
			scrollspeed: 60,
			mousescrollstep: 40,
			//autohidemode: true,
			cursorwidth: 7,
			cursorborder: "1px solid rgba(71,78,103,0)",
			cursorcolor: '#474e67',
			cursorborderradius: 10,
			horizrailenabled: true,
			zindex: "auto"
		});
	});
})();
</script>
<?php } ?>

<script>
	// 검색
	function mainSchSub() {
		var frm=document.main_search;
		//if(!frm.key.value){alert("검색어를 입력하세요.");frm.key.focus();return;}
		frm.submit();
	}
//-->
</script>

</head>
<body>

<!-- page-wrapper -->
<div id="page-wrapper">

	<header id="header" class="useScrollFixed nofixed">
		<div class="header_container">
			<a href="/" class="logo" alt="INSITE"></a>

			<!-- 헤더 검색창 추가 -->
			<?if(!$_SESSION[p_token_val] && $chkMobile){?>
			<span id="googlelogin" style="position:absolute;top:5px;"><label class="icon_google btn span large " style="width:110px;height:45px;line-height:45px;text-align:right; ">로그인</label></span>
			<?}?>
			<span class="hds_openner"></span>
			<div id="headerSearchWrap">
				<form name="main_search" id="main_search" action="/contents/gallery/gallery_list" method="get" enctype="multipart/form-data" onSubmit="return mainSchSub(this);" target="">
				<input type="hidden" name="mode" value="search"/>
					<p class="se-form">
						<input type="text" name="key" id="key" value="<?=$key?>" class="span" placeholder="검색어 입력" onkeydown="ent_q('mainSchSub()');"/>
						<label class="icon_search label-icon-btn"><input type="submit" value="검색" title=""></label>
					</p>
					<!-- <a href="/contents/customer/about" class="btn large">서비스 둘러보기<i class="icon_arrow ml5"></i></a> -->
				</form>
			</div>
			<!-- //헤더 검색창 추가 -->

			<nav id="nav">
				<ul>
					<li class="mobile-logo"></li>
					<li><a href="/" class="<?if($menu!=2){?>active<?}?>">Discover</a></li>
					<li><a href="/contents/member/manage" class="<?if($menu==2){?>active<?}?>">Manage</a></li>
					<?if($_SESSION[p_token_val]){?>
						<?php if(!$chkMobile) { ?><li><span id="alarm_top" class="alarm new"></span><!--<span class="alarm"></span> 알림이 없을때--></li><?php } ?>
						<li><a href="/contents/member/logout.php" class="member">로그아웃</a></li>
					<?php } else { ?>
						<!-- <li><a href="/contents/common/pop.login.php" class="member popup-ajax">로그인</a></li> -->
						<?php if(!$chkMobile) { ?><li id="googlelogin"><label class="icon_google btn span large " style="width:110px;text-align:right; ">로그인</label></li><?php } ?>
					<?php } ?>
				</ul>
			</nav>
			<?php if($_SESSION[p_token_val] && $chkMobile) { ?><span id="alarm_top" class="alarm new"></span><!--<span class="alarm"></span> 알림이 없을때--><?php } ?>
			<div class="alarm_list" style="width:330px;">
				<ul>
<?
	if($_SESSION[p_token_val]){
		$rows_userinfo = f_array("select * from Pka_User where token_val = '$_SESSION[p_token_val]' order by PU_joindate desc");

		$Collection_number = 0;
		if($rows_userinfo[PU_Collection]){
			$PU_Collection_arr = array_decode($rows_userinfo[PU_Collection]);
			$Collection_number = count($PU_Collection_arr);
		}
?>
<?
	if($Collection_number>0){
			$sear_alarm.='(';
			for($i=0;$i<$Collection_number;$i++ ){
				if($i!=0){
					$sear_alarm.=' || ';
				}
				$sear_alarm.=' PU_idx = '.$PU_Collection_arr[$i];
			}
			$sear_alarm.=')';
			$day_14 = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")."-14day"));
			
			$result_alarm=query("select distinct(PU_idx) from Pka_Bookmark where (1=1) and (PU_likeuser not like '%///$rows_userinfo[PU_idx]///%' or PU_likeuser is null)  and PU_joindate < '$day_14' and $sear_alarm order by PU_idx desc limit 0, 8");

			for($i=0;$i<$rows_alarm=fetch_array($result_alarm) ;$i++ ){
				$rows_Collection_top = f_array("select * from Pka_Collection where (1=1) and PU_idx = '$rows_alarm[PU_idx]' order by PU_joindate desc");
				if($rows_Collection_top && $rows_alarm[PB_idx] && $rows_alarm[PB_idx]!=''){
					$Pfiles_collection=explode("/",$rows_Collection_top[PU_files]);
					$alarm_ck = 'Y';
?>
					<li>
						<div class="thumb"><a href="/contents/insite/bookmark?PU_idx=<?=$rows_Collection_top[PU_idx]?>"><?
							if($Pfiles_collection[1]){
								$img_Name = imgName($Pfiles_collection[1]); //파일명
								echo "<img src='/files/collection_thumb/{$img_Name}.thumb' border='0' />";
							}else{
								echo "<img src='/assets/images/temp_img/temp_01.jpg' border='0' >";
							}
						?></a></div>
						<div class="contents">
							<a href="/contents/insite/bookmark?PU_idx=<?=$rows_Collection_top[PU_idx]?>" class="title"><?=$rows_Collection_top[PU_subject]?></a>
							<p class="con">컬렉션 내 새로운 북마크가 업데이트되었습니다.</p>
						</div>
					</li>
			<?}?>
		<?}?>
<?}else{?>
					<li>
						<div class="thumb"><a href=""></a></div>
						<div class="contents">
							<a href="#" class="title"></a>
							<p class="con">컬렉션을 팔로우해보세요.</p>
						</div>
					</li>
<?}?>
<?}?>
				</ul>
			</div>
		</div>
	</header>
<?if($alarm_ck=='Y'){?>
<script>
	$(document).ready(function(){
		$('#alarm_top').addClass('new');
	});
</script>
<?}else{?>
<script>
	$(document).ready(function(){
		$('#alarm_top').removeClass('new');
	});
</script>
<?}?>
	<div class="headerSpace"></div>

	<!-- wrapper -->
	<div id="wrapper">
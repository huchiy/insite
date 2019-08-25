<?
if($main=="Y"){$site_url="../";$adm_url="../";}// 인덱스 로그인
else {$site_url="../../";$adm_url="../../";}	// 폴더에서

include $site_url."app/inc_head.php";

if($_SERVER[HTTP_HOST]=="payKhan.org" || $_SERVER[HTTP_HOST]=="www.payKhan.org"){
	if($_SERVER[HTTPS]=="on"){
	}else{
		header("Location: http://PayKhan.org" . $_SERVER['REQUEST_URI']);
	}
}else{
}
?>

<?if($main=='Y'){// 메인 ?>
<?}else{// 메인아님?>
	<?if($_SESSION[p_admin_token_val]){// 세션없고 ?>
	<?}else{?>
		<script>alert('관리자 로그인 후 이용해주세요.');location.replace('/admin');</script>
	<?}?>
<?}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insite_ADMIN</title>

	<meta property='og:type' content='website' />
	<meta property='og:url' content='http://PayKhan.org/' />
	<meta property='og:description' content='PayKhan' />
	<meta property='og:title' content='PayKhan' />
	<meta property='og:image' content='/images/opimg.jpg' />

	<meta name="google" content="notranslate" />

    <!-- Bootstrap -->
    <link href="/assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../assets/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../assets/admin/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../assets/admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../assets/admin/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../assets/admin/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Common Style -->
    <link href="/assets/admin/build/css/custom.css?<?=time()?>" rel="stylesheet">
    <!-- Common Style -->
    <link href="/assets/admin/build/css/custom.min.css" rel="stylesheet">

    <!-- <script src="/assets/admin/js/jquery-1.11.1.min.js"></script> -->
    <script src="/assets/admin/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="/assets/admin/js/jquery.mobile-1.4.5.min.js"></script> -->

		<!-- jQuery -->
		<script src="/assets/admin/vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="/assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- FastClick -->
		<script src="/assets/admin/vendors/fastclick/lib/fastclick.js"></script>
		<!-- NProgress -->
		<script src="/assets/admin/vendors/nprogress/nprogress.js"></script>
		<!-- iCheck -->
		<script src="/assets/admin/vendors/iCheck/icheck.min.js"></script>
		<!-- bootstrap-progressbar -->
		<script src="/assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
		<!-- bootstrap-daterangepicker -->
		<script src="/assets/admin/vendors/moment/min/moment.min.js"></script>
		<script src="/assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- bootstrap-wysiwyg -->
		<script src="/assets/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
		<script src="/assets/admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
		<script src="/assets/admin/vendors/google-code-prettify/src/prettify.js"></script>
		<!-- jQuery Tags Input -->
		<script src="/assets/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
		<!-- Switchery -->
		<script src="/assets/admin/vendors/switchery/dist/switchery.min.js"></script>
		<!-- Select2 -->
		<script src="/assets/admin/vendors/select2/dist/js/select2.full.min.js"></script>
		<!-- Parsley -->
		<script src="/assets/admin/vendors/parsleyjs/dist/parsley.min.js"></script>
		<!-- Autosize -->
		<script src="/assets/admin/vendors/autosize/dist/autosize.min.js"></script>
		<!-- jQuery autocomplete -->
		<script src="/assets/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
		<!-- starrr -->
		<script src="/assets/admin/vendors/starrr/dist/starrr.js"></script>

    <script src="/assets/admin/js/site_jquery.js?<?=time()?>"></script>
</head>




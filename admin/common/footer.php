<?if($_SERVER["REMOTE_ADDR"]=='211.222.249.85' || $_SERVER["REMOTE_ADDR"]=='14.36.10.71' || $_SESSION[p_PU_userid]=='huchiy'){?>
<?
//echo 'COOKIE';
//echo '<br>';
//print_r($_COOKIE); 
//echo '<br><br>';
//
//echo 'SESSION';
//echo '<br>';
//print_r($_SESSION); 
//echo '<br><br>';
?>
	<iframe src="/app/reset.html" id="db_frame" name="db_frame" style="display:;border:2px solid red;width:500px;height:300px;"></iframe>	
<?}else{?>
	<iframe src="/app/reset.html" id="db_frame" name="db_frame" style="display:none;border:0px solid red;width:500px;height:300px;"></iframe>	
<?}?>

<!-- footer content -->
<footer>
		<div class="pull-right">
				©2019 Insite 
		</div>
		<div class="clearfix"></div>
</footer>
<!-- /footer content -->

<!-- Custom Theme Scripts -->
<script src="/assets/admin/build/js/custom.min.js"></script>

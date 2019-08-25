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
	<iframe src="/app/reset.html" id="db_frame" name="db_frame" style="display:none;border:2px solid red;width:500px;height:300px;"></iframe>	
<?}else{?>
	<iframe src="/app/reset.html" id="db_frame" name="db_frame" style="display:none;border:0px solid red;width:500px;height:300px;"></iframe>	
<?}?>

	</div>
	<!-- //#wrapper -->

	<footer id="footer">
		<div class="footer_container">
			<span class="copyrights">&copy;2019 Insite</span>
			<ul class="footer_menu">
				<li><a href="/contents/customer/service">이용약관</a></li>
				<li><a href="/contents/customer/privacy">개인정보처리방침</a></li>
			</ul>
		</div>
		<!-- <div class="footer_sns">
			<a onclick="alert('준비중입니다.')" style="cursor:pointer;" target="_blank" class="facebook">facebook</a>
			<a onclick="alert('준비중입니다.')" style="cursor:pointer;" target="_blank" class="twitter">twitter</a>
			<a onclick="alert('준비중입니다.')" style="cursor:pointer;" target="_blank" class="instagram">instagram</a>
			<a onclick="alert('준비중입니다.')" style="cursor:pointer;" target="_blank" class="pinterest">pinterest</a>
		</div> -->
	</footer>

</div>
<!-- //page-wrapper -->

</body>
</html>
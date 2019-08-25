<?include "../../app/inc_head.php";?>

<script src="/assets/js/site_jquery.js?<?=time()?>"></script>


<?
	if($token_val){
		$rows_userinfo = f_array("select * from Pka_User where token_val = '$token_val' order by PU_joindate desc");
		$PU_email=$rows_userinfo[PU_email];
		$PU_name=$rows_userinfo[PU_name];
		$PU_profile=$rows_userinfo[PU_profile];
		$Pfiles_userinfo=explode("/",$rows_userinfo[PU_files]);
		$fileNum=1;
		$Query="update";

		if($Pfiles_userinfo[1]){
			$img_Name = imgName($Pfiles_userinfo[1]); //파일명
			$profile_img = "/files/userinfo_thumb/{$img_Name}.thumb";
		}else{
			$profile_img = "/assets/images/user.png";
		}
		
		$followers_number = 0;
		if($rows_userinfo[PU_followers]){
			$PU_followers_arr = array_decode($rows_userinfo[PU_followers]);
			$PU_followers_ck = in_array($_SESSION[p_PU_idx], $PU_followers_arr);
			$followers_number = count($PU_followers_arr);
		}
	}
?>

<script>
function follow_pop(PU_followers_token_val){
	if('<?=$token_val?>'){
		
		if('<?=$token_val?>'){
			var url = '/contents/insite/manage?token_val=<?=$token_val?>';
		}else{
			var url = '/contents/insite/bookmark?PU_idx=<?=$PU_idx?>';
		}

		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check',
			data:{
				'checkName' : 'follow',
				'PU_follow_token_val': PU_followers_token_val
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
					location.href=url;
				}else if(result=="ok1"){
					location.href=url;
				}else if(re[0]=="10"){
					alert('아이디는 영문,숫자만 입력해주세요.');
				}else if(re[0]=="50"){
					alert('다시 로그인해주세요.');
					location.href=url;
				}else if(re[0]=="no"){
					alert('팔로잉 대상이 없습니다.');
				}else{
					alert("Error");
				}
			}
		 });
	}else{
		alert('로그인 후 진행해주세요.');
	}
}
</script>

<!-- layerPoup -->
<div class="layerPoup pop_follow">
	
    <section class="popcon_wrapper">
		
		<div class="pop-title tcenter">Followers<!-- Followers --><span class="num"><?=$followers_number?></span></div>
		
		<div class="followWrap">
			<ul>
<?
	if($followers_number>0){// 총 팔로워 수 0 이상
		for($i=0;$i<$followers_number;$i++ ){// 팔로워 수로 for문 돌림
			$rows_followers = f_array("select * from Pka_User where PU_idx = '$PU_followers_arr[$i]' order by PU_joindate desc");
			$Pfiles_followres=explode("/",$rows_followers[PU_files]);
			// 팔로워가 팔로잉 중인지 체크
			$following_ck='';
			if($rows_followers[PU_following]){
				$following_arr = array_decode($rows_followers[PU_following]);
				$following_ck = in_array($rows_userinfo[PU_idx], $following_arr);
			}		
?>
				<li>
				<?if($rows_followers[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
					<div class="thumb" style="cursor:pointer;" onclick="location.href='/contents/member/manage'">
				<?}else{?>
					<div class="thumb" style="cursor:pointer;" onclick="location.href='/contents/insite/manage?PU_idx=<?=$rows_followers[PU_idx]?>'">
				<?}?>
						<?
							if($Pfiles_followres[1]){
								$img_Name = imgName($Pfiles_followres[1]); //파일명
								echo "<img src='/files/userinfo_thumb/{$img_Name}.thumb' border='0' />";
							}else{
								echo "<img src='/assets/images/user.png' border='0' >";
							}
						?>
					</div>
					<div class="profileCon">
						<?if($rows_followers[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
							<div class="name" style="cursor:pointer;" onclick="location.href='/contents/member/manage'">
						<?}else{?>
							<div class="name" style="cursor:pointer;" onclick="location.href='/contents/insite/manage?PU_idx=<?=$rows_followers[PU_idx]?>'">
						<?}?>
						<?=$rows_followers[PU_name]?></div>
						<?if($rows_followers[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
							<p class="cover" style="cursor:pointer;" onclick="location.href='/contents/member/manage'">
						<?}else{?>
							<p class="cover" style="cursor:pointer;" onclick="location.href='/contents/insite/manage?PU_idx=<?=$rows_followers[PU_idx]?>'">
						<?}?>
						<?=$rows_followers[PU_profile]?>
						</p>
					</div>
					<?if($rows_followers[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
						<?if($following_ck){?>
							<a style="cursor:pointer;" class="btnUnFollow" onclick="follow_pop('<?=$token_val?>')">팔로우 취소</a>
						<?}else{?>
							<a style="cursor:pointer;" class="btnFollow" onclick="follow_pop('<?=$token_val?>')">팔로우</a>
						<?}?>
					<?}else{?>
					<?}?>

				</li>
	<?}?>
<?}else{?>
				<li>
					<div class="thumb">
					</div>
					<div class="profileCon">
						<div class="name"></div>
						<p class="cover">
							팔로워가 없습니다.
						</p>
					</div>

				</li>
<?}?>
			</ul>
		</div>
		
    </section>

</div>
<!-- //layerPoup -->


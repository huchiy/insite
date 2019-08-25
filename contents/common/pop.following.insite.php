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
			$profile_img = "/assets/images/temp_img/user_photo.jpg";
		}
		
		$following_number = 0;
		if($rows_userinfo[PU_following]){
			$PU_following_arr = array_decode($rows_userinfo[PU_following]);
			$PU_following_ck = in_array($_SESSION[p_PU_idx], $PU_following_arr);
			$following_number = count($PU_following_arr);
		}
	}
?>

<script>
function follow(PU_following_token_val){
	if('<?=$token_val?>'){
		
		if('<?=$PU_idx?>'){
			var url = 'bookmark?PU_idx=<?=$PU_idx?>';
		}else{
			var url = '/contents/member/manage';
		}

		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check',
			data:{
				'checkName' : 'follow',
				'PU_follow_token_val': PU_following_token_val
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
		
		<div class="pop-title tcenter">Following<!-- Followers --><span class="num"><?=$following_number?></span></div>
		
		<div class="followWrap">
			<ul>
<?
	if($following_number>0){
	for($i=0;$i<$following_number;$i++ ){
	$rows_following = f_array("select * from Pka_User where PU_idx = '$PU_following_arr[$i]' order by PU_joindate desc");
	$Pfiles_following=explode("/",$rows_following[PU_files]);
	if($rows_following[PU_following]){
		$PU_followers_arr = array_decode($rows_following[PU_followers]);
		$PU_followers_ck = in_array($_SESSION[p_PU_idx], $PU_followers_arr);
	}		
?>
				<li>
				<?if($rows_following[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
					<div class="thumb" style="cursor:pointer;" onclick="location.href='/contents/member/manage'">
				<?}else{?>
					<div class="thumb" style="cursor:pointer;" onclick="location.href='/contents/insite/manage?PU_idx=<?=$rows_following[PU_idx]?>'">
				<?}?>
						<?
							if($Pfiles_following[1]){
								$img_Name = imgName($Pfiles_following[1]); //파일명
								echo "<img src='/files/userinfo_thumb/{$img_Name}.thumb' border='0' />";
							}else{
								echo "<img src='/assets/images/temp_img/user_photo.jpg' border='0' >";
							}
						?>
					</div>
					<div class="profileCon">
						<?if($rows_following[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
							<div class="name" style="cursor:pointer;" onclick="location.href='/contents/member/manage'">
						<?}else{?>
							<div class="name" style="cursor:pointer;" onclick="location.href='/contents/insite/manage?PU_idx=<?=$rows_following[PU_idx]?>'">
						<?}?>
						<?=$rows_following[PU_name]?></div>
						<?if($rows_following[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
							<p class="cover" style="cursor:pointer;" onclick="location.href='/contents/member/manage'">
						<?}else{?>
							<p class="cover" style="cursor:pointer;" onclick="location.href='/contents/insite/manage?PU_idx=<?=$rows_following[PU_idx]?>'">
						<?}?>
						<?=$rows_following[PU_profile]?>
						</p>
					</div>
					
					<!-- <?if($rows_following[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
						<?if($PU_followers_ck){?>
							<a style="cursor:pointer;" class="btnUnFollow" onclick="follow('<?=$rows_following[token_val]?>')">팔로우 취소</a>
						<?}else{?>
							<a style="cursor:pointer;" class="btnFollow" onclick="follow('<?=$rows_following[token_val]?>')">팔로우</a>
						<?}?>
					<?}else{?>
					<?}?> -->

				</li>
<?}?>
<?}else{?>
				<li>
					<div class="thumb">
					</div>
					<div class="profileCon">
						<div class="name"><?=$rows_following[PU_name]?></div>
						<p class="cover">
							팔로잉이 없습니다.
						</p>
					</div>

				</li>
<?}?>
			</ul>
		</div>
		
    </section>

</div>
<!-- //layerPoup -->


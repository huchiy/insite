<?$menu=2;?>
<?include "../../contents/common/head.php";?>

<?
if($_SESSION[p_token_val]){
	$rows_bookmark = f_array("select * from Pka_Bookmark where token_val = '$_SESSION[p_token_val]' and PB_idx = '$PB_idx' order by PU_joindate desc");
	$PB_idx = $rows_bookmark[PB_idx];
	$PU_subject = $rows_bookmark[PU_subject];
	$PU_contents = $rows_bookmark[PU_contents];
	$PU_url = $rows_bookmark[PU_url];
	$http_ck = strpos( $PU_url , 'http' );
	if($http_ck === false) {
		$PU_url_ck = 'http://'.$PU_url;
	} else {
		$PU_url_ck = $PU_url;
	}
	$PU_ogimage = $rows_bookmark[PU_ogimage];
	$Pfiles_bookmark=explode("/",$rows_bookmark[PU_files]);
	$n_rows_like_ck = n_rows("select * from Pka_like where PB_idx = '$PB_idx' and like_ck ='Y' order by PU_joindate desc");
}else{}
?>

<script>
function reply_del(PC_idx){
	$.ajax({
		type: 'POST',
		url: '../../app/ajax_check',
		data:{
			'checkName' : 'reply_del',
			'PC_idx': PC_idx
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
				alert('삭제되었습니다.');
				location.href='<?=$URL_SELF?>';
			}else if(result=="10"){
				alert('다시 로그인해주세요.');
			}else if(result=="20"){
				alert('글번호가 없습니다.');
			}else{
				alert("Error");
			}
		}
	 });
}
</script>

<!-- container -->	
<div class="container viewPage">
	
	<div class="container_title">
		<?=$PU_subject?>
		<?if($_SESSION[p_token_val]){?>
		<a href="<?=$PU_url_ck?>" class="btnGoto" target="_blank">바로가기</a><!-- 추가 -->
		<?}else{?>
		<a onclick="alert('로그인하신 후 이용하실 수 있습니다.')" class="btnGoto" style="cursor:pointer;">바로가기</a><!-- 추가 -->
		<?}?>
	</div>

	<a href="#" class="btnView arrow-prev"></a>
	<a href="#" class="btnView arrow-next"></a>
				
	<div class="viewContents">
		<p class="mb15 tcenter">
		<?if($PU_ogimage){// 가져온이미지사용?>
			<?Pfiles_link("$PU_ogimage",$i,'bookmark_ogimage');?>
		<?}else{// 수정된이미지사용?>
			<?
				if($Pfiles_bookmark[1]){
					$img_Name = imgName($Pfiles_bookmark[1]); //파일명
					echo "<img src='/files/bookmark_thumb/{$img_Name}.thumb' border='0' />";
				}else{
					echo "<img src='/assets/images/temp_img/bookmark_temp.jpg' border='0' >";
				}
			?>
		<?}?>
		</p>

		<div class="sub-title">
			<?=$PU_subject?>
		</div>
		<div class="con">
			<?=$PU_contents?>

			<?if($_SESSION[p_token_val]){?>
			<div class="link-url">
				<a href="<?=$PU_url_ck?>" target="_blank"><?=$PU_url?></a>
			</div>
			<?}?>
		</div>
		
		<div class="likeCountWrap">
			<a onclick="like_ck('like_ck','<?=$PB_idx?>')" class="btnLike">추천</a>
			<span class="count" id="like_count"><?=$n_rows_like_ck?></span>
		</div>
		<!--<a href="#" class="btnLikeCancle">추천 취소</a>-->
	</div>


<?
	// 댓글 수
	$n_rows_comment = n_rows("select * from Pka_Bookmark_comment where PB_idx = '$PB_idx' order by PU_joindate desc");
?>
	<!-- viewReply -->
	<div class="viewReply">
		
		<span class="replyOpenner">댓글 <span class="num"><?=$n_rows_comment?></span></span>
		
		<ul class="replyGroup">
			<li>
				<div class="replyWrite">
					<span class="thumb"><img src="/assets/images/user_noimg_30x30.jpg"></span>
					<a href="/contents/common/pop.replyForm.php?PB_idx=<?=$PB_idx?>&rf_page=<?=$PAGE_SELF?>?<?=$QUERY_STRING?>" class="popup-ajax">공개 댓글 추가</a>
				</div>
			</li>
<?
	if($n_rows_comment!=0){
	$result_comment=query("select * from Pka_Bookmark_comment where (1=1) and PB_idx = '$PB_idx' order by PU_joindate desc limit 0, 30");
	for($i=0;$i<$rows_comment=fetch_array($result_comment) ;$i++ ){
		$rows_userinfo = f_array("select * from Pka_User where token_val = '$rows_comment[token_val]' order by PU_joindate desc");
		$PU_name=$rows_userinfo[PU_name];
		$Pfiles_userinfo=explode("/",$rows_userinfo[PU_files]);
		if($Pfiles_userinfo[1]){
			$img_Name = imgName($Pfiles_userinfo[1]); //파일명
			$profile_img = "/files/userinfo_thumb/{$img_Name}.thumb";
		}else if($rows_userinfo[PU_Imageurl]){
			$profile_img = $rows_userinfo[PU_Imageurl];
		}else{
			$profile_img = "/assets/images/temp_img/user_photo_30x30.jpg";
		}
?>
			<li>
				<header>
					<span class="thumb"><img src="<?=$profile_img?>"></span>
					<span class="writer"><?=$rows_userinfo[PU_name]?></span>
					<span class="date"><?=$rows_comment[PU_joindate]?></span>
				</header>
				<p class="con">
					<?=$rows_comment[PU_contents]?>
				</p>
				<?if($rows_comment[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
				<div class="re_btnSet">
					<a href="/contents/common/pop.replyForm.php?PC_idx=<?=$rows_comment[PC_idx]?>&PB_idx=<?=$PB_idx?>&rf_page=<?=$PAGE_SELF?>?<?=$QUERY_STRING?>" class="popup-ajax">수정</a>
					<a onclick="reply_del('<?=$rows_comment[PC_idx]?>')" style="cursor:pointer;">삭제</a>
				</div>
				<?}?>
			</li>
<?}?>
		</ul>
<?}else{?>
			<li>
				<p class="con">
					등록된 댓글이 없습니다.
				</p>
			</li>
		</ul>
<?}?>

	</div>
	<!-- //viewReply -->

		

	<!-- galleryWrapper -->
	<div class="galleryWrapper">
		
		<div class="container_title">글쓴이의 다른 즐겨찾기</div>

		<ul class="gall_collection">
<?
	$result_collection=query("select * from Pka_Collection where (1=1) and token_val='$_SESSION[p_token_val]' order by PU_joindate desc limit 0, 100");
	for($i=0;$i<$rows_collection=fetch_array($result_collection) ;$i++ ){
	$Pfiles_collection=explode("/",$rows_collection[PU_files]);
?>
			<li>
				<div class="thumb"><a href="/contents/member/bookmark?PU_idx=<?=$rows_collection[PU_idx]?>">
				<?
					if($Pfiles_collection[1]){
						$img_Name = imgName($Pfiles_collection[1]); //파일명
						echo "<img src='/files/collection_thumb/{$img_Name}.thumb' border='0' />";
					}else{
						echo "<img src='/assets/images/temp_img/temp_01.jpg' border='0' >";
					}
				?></a></div>
				<div class="txtWrap">
					<div class="subject"><a href="bookmark?PU_idx=<?=$rows_collection[PU_idx]?>"><?=$rows_collection[PU_subject]?></a></div>
					<div class="con">
						<?=cut_str($rows_collection[PU_contents], 72, '…');?>
					</div>
				</div>
				<a href="/contents/common/pop.collection.write.php?PU_idx=<?=$rows_collection[PU_idx]?>" class="btnEdit popup-ajax"></a>
			</li>
<?}?>
		</ul>
	</div>
	<!-- //galleryWrapper -->


</div>
<!-- //container -->	



<?include "../../contents/common/footer.php";?>
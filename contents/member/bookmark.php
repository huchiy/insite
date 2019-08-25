<?$menu=2;?>
<?include "../../contents/common/head.php";?>


<?
if($mode=="search"){
	if($key){$sear_coll.=" and (PU_subject like '%$key%' || PU_contents like '%$key%')";}
	if($key){$sear_book.=" and (PU_url like '%$key%' || PU_subject like '%$key%' || PU_contents like '%$key%')";}
	if($key){$sear_user.=" and (PU_name like '%$key%' || PU_profile like '%$key%')";}
	if($view_ck){
		if($view_ck=='all'){
		}else if($view_ck=='collection'){
			$sear_book.=" and PU_idx=0";
			$sear_user.=" and PU_idx=0";
		}else if($view_ck=='bookmark'){
			$sear_coll.=" and PU_idx=0";
			$sear_user.=" and PU_idx=0";
		}else if($view_ck=='insiter'){
			$sear_coll.=" and PU_idx=0";
			$sear_book.=" and PU_idx=0";
		}else{
		}
	}
}
?>


<?
if($_SESSION[p_token_val]){

		$rows_collection = f_array("select * from Pka_Collection where token_val = '$_SESSION[p_token_val]' and PU_idx = '$PU_idx' order by PU_joindate desc");
		$PU_idx = $rows_collection[PU_idx];
		$PU_subject = $rows_collection[PU_subject];
	
		$rows_userinfo = f_array("select * from Pka_User where token_val = '$_SESSION[p_token_val]' order by PU_joindate desc");
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
		$followers_number = 0;
		if($rows_userinfo[PU_following]){
			$PU_following_arr = array_decode($rows_userinfo[PU_following]);
			$PU_following_ck = in_array($_SESSION[p_PU_idx], $PU_following_arr);
			$following_number = count($PU_following_arr);
		}		
		if($rows_userinfo[PU_followers]){
			$PU_followers_arr = array_decode($rows_userinfo[PU_followers]);
			$PU_followers_ck = in_array($_SESSION[p_PU_idx], $PU_followers_arr);
			$followers_number = count($PU_followers_arr);
		}		
		if($rows_collection[PU_Collection]){
			$PU_Collection_arr = array_decode($rows_collection[PU_Collection]);
			$PU_Collection_ck = in_array($_SESSION[p_PU_idx], $PU_Collection_arr);
			$Collection_number = count($PU_Collection_arr);
		}

}else{}
?>

<!-- container -->	
<div class="container">

	<div class="userProfile">
		<div class="boxWrap">
			<div class="thumb" style="background-image:url('<?=$profile_img?>');"> <!-- 이미지사이즈 width:110px; height:110px; -->
				<a href="/contents/common/pop.mypage.php" class="btnProfileEdit popup-ajax" data-tip="프로필 편집"></a>
			</div>
			<div class="profileCon">
				<div class="name">
					<?=$rows_userinfo[PU_name]?>
					<!-- <a href="#" class="btnFollow">팔로우</a> --><!--<a href="#" class="btnUnFollow">팔로우 취소</a>-->
				</div>
				<p class="cover">
					<?=$rows_userinfo[PU_profile]?>
				</p>
				<div class="relationship">
					<a href="/contents/common/pop.following.php" class="popup-ajax"><?=$following_number?> Following</a>
					<a href="/contents/common/pop.followers.php" class="popup-ajax"><?=$followers_number?> Followers</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container_title">
		<?=$PU_subject?><br/>
		<?if($rows_userinfo[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
		<?}else{?>
			<?if($PU_Collection_ck){?>
				<a style="cursor:pointer;" class="btnUnFollow" onclick="follow_collection()">팔로우 취소</a>
			<?}else{?>
				<a style="cursor:pointer;" class="btnFollow" onclick="follow_collection()">팔로우</a>
			<?}?>
		<?}?>
	</div>

	<!-- galleryWrapper -->
	<div class="galleryWrapper">
		
		<div class="tright mb10"><a href="/contents/common/pop.bookmark.write.php?PU_idx=<?=$PU_idx?>" class="btnWrite popup-ajax" title="추가하기"></a></div>

		<div class="listFx">
			<div class="listStyleChange">
				<span class="btnGall active"></span>
				<span class="btnList"></span>
			</div>
			<div class="se-form span6">
				<form name="bbsFrm" id="bbsFrm" action="<?=$URL_SELF?>" method="get" enctype="multipart/form-data" onSubmit="return bbsSchSub(this);" target="">
				<input type="hidden" name="mode" value="search"/>
				<input type="hidden" name="view_ck" id="view_ck" value="all"/>
				<input type="hidden" name="PU_idx" id="PU_idx" value="<?=$PU_idx?>"/>
				<input type="text" name="key" value="<?=$key?>" required class="span" size="15" maxlength="20" placeholder="검색" onkeydown="ent_q('bbsSchSub()');"/>
				<label class="icon_search label-icon-btn"><input type="submit" value="검색" title=""></label>
				</form>
			</div>
		</div>

		<ul class="gall_bookMark gall_collection mt20">

<?
	$result_bookmark=query("select * from Pka_Bookmark where (1=1) and token_val='$_SESSION[p_token_val]' and PU_idx = '$PU_idx' $sear_book order by PU_joindate desc limit 0, 100");
	for($i=0;$i<$rows_bookmark=fetch_array($result_bookmark) ;$i++ ){
	$Pfiles_bookmark=explode("/",$rows_bookmark[PU_files]);
?>
			<li class="cardBox">
				<a href="view_bookmark?PB_idx=<?=$rows_bookmark[PB_idx]?>">
					<div class="subject"><?=$rows_bookmark[PU_subject]?></div>
					<div class="con">
						<?=cut_str($rows_bookmark[PU_contents], 72, '…');?>
					</div>
				</a>
				<a href="/contents/common/pop.bookmark.write.php?PU_idx=<?=$PU_idx?>&PB_idx=<?=$rows_bookmark[PB_idx]?>" class="btnEdit popup-ajax"></a>
			</li>
<?}?>

		</ul>	
		
		<div class="list_collection none">
			<header>
				<span>컬렉션</span>
				<span>주소</span>
			</header>

<?
	$result_collection=query("select * from Pka_Collection where (1=1) and token_val='$_SESSION[p_token_val]' and PU_idx = '$PU_idx' $sear_coll order by PU_joindate desc limit 0, 100");
	for($i=0;$i<$rows_collection=fetch_array($result_collection) ;$i++ ){
	$n_rows_collection=n_rows("select * from Pka_Bookmark where (1=1) and token_val='$_SESSION[p_token_val]' and PU_idx = '$rows_collection[PU_idx]' order by PU_joindate desc limit 0, 100");
?>
			<div class="collection-group">
				<div class="collection">
					<span class="subject opencollection"><?=$rows_collection[PU_subject]?></span>
					<span class="con"><?=$n_rows_collection?>개의 항목</span>
				</div>
				<ul class="bookMark_list">
<?
	$result_bookmark=query("select * from Pka_Bookmark where (1=1) and token_val='$_SESSION[p_token_val]' and PU_idx = '$rows_collection[PU_idx]' order by PU_joindate desc limit 0, 100");
	for($i=0;$i<$rows_bookmark=fetch_array($result_bookmark) ;$i++ ){
	$PU_url = $rows_bookmark[PU_url];
	$http_ck = strpos( $PU_url , 'http' );
	if($http_ck === false) {
		$PU_url_ck = 'http://'.$PU_url;
	} else {
		$PU_url_ck = $PU_url;
	}
?>
					<li><span class="subject"  onclick="location.href='/contents/member/view_bookmark?PB_idx=<?=$rows_bookmark[PB_idx]?>'" style="cursor:pointer;"><?=$rows_bookmark[PU_subject]?></span><span class="con"><a href="<?=$PU_url_ck?>" target="_blank"><?=$rows_bookmark[PU_url]?></a></span></li>
<?}?>
				</ul>
			</div>
<?}?>

		</div>

	</div>
	<!-- galleryWrapper -->

</div>
<!-- //container -->	



<?include "../../contents/common/footer.php";?>
<?$customer='Y';?>
<?include "../../contents/common/head.php";?>


<?
if($_SESSION[p_token_val]){
	$rows_userinfo = f_array("select * from Pka_User where token_val = '$_SESSION[p_token_val]' order by PU_joindate desc");

	if($rows_userinfo[PU_Collection]){
		$PU_Collection_arr = array_decode($rows_userinfo[PU_Collection]);
		$PU_alarm_ck = in_array($PU_idx, $PU_Collection_arr);
		if($PU_alarm_ck){
			$result_bupdate=query("select * from Pka_Bookmark where (1=1) and PU_idx = '$PU_idx' order by PU_joindate desc");
			for($i=0;$i<$rows_bupdate=fetch_array($result_bupdate) ;$i++ ){

				if(strpos($rows_bupdate[PU_likeuser], '///'.$rows_userinfo[PU_idx].'///') !== false){// 있음
				}else{// 없음
					if($rows_bupdate[PU_likeuser]){// 컬럼내용있음
						$PU_like_ck = $rows_userinfo[PU_idx].'///';
						query("UPDATE Pka_Bookmark SET PU_likeuser = concat(PU_likeuser , '$PU_like_ck') , PU_modifydate = now() WHERE PB_idx='$rows_bupdate[PB_idx]'");
					}else{
						$PU_like_ck = '///'.$rows_userinfo[PU_idx].'///';
						query("UPDATE Pka_Bookmark SET PU_likeuser = '$PU_like_ck' , PU_modifydate = now() WHERE PB_idx='$rows_bupdate[PB_idx]'");
					}
				}
			}

		}
	}
}

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
if($PU_idx){

		$rows_collection = f_array("select * from Pka_Collection where (1=1) and PU_idx = '$PU_idx' order by PU_joindate desc");
		$PU_idx = $rows_collection[PU_idx];
		$PU_subject = $rows_collection[PU_subject];
	
		$rows_userinfo = f_array("select * from Pka_User where token_val = '$rows_collection[token_val]' order by PU_joindate desc");
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

<script>
function follow_bookmark(){
	if('<?=$_SESSION[p_token_val]?>'){
		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check',
			data:{
				'checkName' : 'follow',
				'PU_follow_token_val': '<?=$rows_collection[token_val]?>'
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
					location.href='bookmark?PU_idx=<?=$PU_idx?>';
				}else if(result=="ok1"){
					location.href='bookmark?PU_idx=<?=$PU_idx?>';
				}else if(re[0]=="10"){
					alert('아이디는 영문,숫자만 입력해주세요.');
				}else if(re[0]=="50"){
					alert('다시 로그인해주세요.');
					location.href='bookmark?PU_idx=<?=$PU_idx?>';
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
function follow_collection(){
	if('<?=$_SESSION[p_token_val]?>'){
		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check',
			data:{
				'checkName' : 'follow_collection',
				'PU_follow_PU_idx': '<?=$rows_collection[PU_idx]?>'
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
					location.href='bookmark?PU_idx=<?=$PU_idx?>';
				}else if(result=="ok1"){
					location.href='bookmark?PU_idx=<?=$PU_idx?>';
				}else if(re[0]=="10"){
					alert('컬렉션 정보가 잘못되었습니다.');
				}else if(re[0]=="50"){
					alert('다시 로그인해주세요.');
					location.href='bookmark?PU_idx=<?=$PU_idx?>';
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

<!-- container -->	
<div class="container">
	<div class="userProfile">
		<div class="boxWrap">

			<?if($rows_userinfo[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
				<div class="thumb" onclick="location.href='/contents/member/manage'" style="cursor:pointer;background-image:url('<?=$profile_img?>');">
			<?}else{?>
				<div class="thumb" onclick="location.href='/contents/insite/manage?PU_idx=<?=$rows_userinfo[PU_idx]?>'" style="cursor:pointer;background-image:url('<?=$profile_img?>');">
			<?}?>
			<!-- 이미지사이즈 width:110px; height:110px; -->
				<?if($rows_userinfo[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
				<a href="/contents/common/pop.mypage.php" class="btnProfileEdit popup-ajax" data-tip="프로필 편집"></a>
				<?}?>
			</div>
			<div class="profileCon">
				<div class="name">
					<?=$rows_userinfo[PU_name]?>
					<?if($rows_userinfo[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
					<?}else{?>
						<?if($PU_followers_ck){?>
							<a style="cursor:pointer;" class="btnUnFollow" onclick="follow_bookmark()">팔로우 취소</a>
						<?}else{?>
							<a style="cursor:pointer;" class="btnFollow" onclick="follow_bookmark()">팔로우</a>
						<?}?>
					<?}?>
				</div>
				<p class="cover">
					<?=$rows_userinfo[PU_profile]?>
				</p>
				<div class="relationship">
					<a href="/contents/common/pop.following.insite.php?token_val=<?=$rows_userinfo[token_val]?>&PU_idx=<?=$PU_idx?>" class="popup-ajax"><?=$following_number?> Following</a>
					<a href="/contents/common/pop.followers.insite.php?token_val=<?=$rows_userinfo[token_val]?>&PU_idx=<?=$PU_idx?>" class="popup-ajax"><?=$followers_number?> Followers</a>
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

		<?if($rows_userinfo[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
		<div class="tright mb10"><a href="/contents/common/pop.bookmark.write.php?PU_idx=<?=$PU_idx?>" class="btnWrite popup-ajax" title="추가하기"></a></div>
		<?}?>

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
	$result_bookmark=query("select * from Pka_Bookmark where (1=1) and PU_idx = '$PU_idx' $sear_book order by PU_joindate desc limit 0, 100");
	for($i=0;$i<$rows_bookmark=fetch_array($result_bookmark) ;$i++ ){
	$Pfiles_bookmark=explode("/",$rows_bookmark[PU_files]);
?>
			<li class="cardBox">
				<a href="/contents/insite/view_bookmark?PB_idx=<?=$rows_bookmark[PB_idx]?>">
					<div class="subject"><?=$rows_bookmark[PU_subject]?></div>
					<div class="con">
						<?=cut_str($rows_bookmark[PU_contents], 72, '…');?>
					</div>
				</a>
				<?if($rows_bookmark[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
				<a href="/contents/common/pop.bookmark.write.php?PU_idx=<?=$PU_idx?>&PB_idx=<?=$rows_bookmark[PB_idx]?>" class="btnEdit popup-ajax"></a>
				<?}?>
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
					<li><span class="subject"  onclick="location.href='/contents/insite/view_bookmark?PB_idx=<?=$rows_bookmark[PB_idx]?>'" style="cursor:pointer;"><?=$rows_bookmark[PU_subject]?></span><span class="con"><a href="<?=$PU_url_ck?>" target="_blank"><?=$rows_bookmark[PU_url]?></a></span></li>
<?}?>
				</ul>
			</div>
<?}?>

	</div>
	<!-- galleryWrapper -->

</div>
<!-- //container -->	



<?include "../../contents/common/footer.php";?>
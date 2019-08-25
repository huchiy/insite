<?$menu=2;?>
<?$loginspot='Y';?>
<?include "../../contents/common/head.php";?>


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
		if($rows_userinfo[PU_Collection]){
			$PU_Collection_arr = array_decode($rows_userinfo[PU_Collection]);
			$PU_Collection_ck = in_array($_SESSION[p_PU_idx], $PU_Collection_arr);
			$Collection_number = count($PU_Collection_arr);
		}
?>

<script>
function follow_manage(){
	if('<?=$_SESSION[p_token_val]?>'){
		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check',
			data:{
				'checkName' : 'follow',
				'PU_follow_token_val': '<?=$rows_userinfo[token_val]?>'
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
					location.href='manage?token_val=<?=$token_val?>';
				}else if(result=="ok1"){
					location.href='manage?token_val=<?=$token_val?>';
				}else if(re[0]=="10"){
					alert('아이디는 영문,숫자만 입력해주세요.');
				}else if(re[0]=="50"){
					alert('다시 로그인해주세요.');
					location.href='manage?token_val=<?=$token_val?>';
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
			<div class="thumb" style="background-image:url('<?=$profile_img?>');"> <!-- 이미지사이즈 width:110px; height:110px; -->
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
							<a style="cursor:pointer;" class="btnUnFollow" onclick="follow_manage()">팔로우 취소</a>
						<?}else{?>
							<a style="cursor:pointer;" class="btnFollow" onclick="follow_manage()">팔로우</a>
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
	

	<!-- galleryWrapper -->
	<div class="galleryWrapper">

		<?if($rows_userinfo[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
		<div class="tright mb10"><a href="/contents/common/pop.collection.write.php" class="btnWrite popup-ajax" title="추가하기"></a></div>
		<?}?>

		<div class="listFx">
			<div class="listStyleChange">
				<span class="btnGall active"></span>
				<span class="btnList"></span>
			</div>
			<div class="se-form">
				<form name="" method="get">
				<input type="text" name="" value="" required class="span" size="15" maxlength="20" placeholder="검색">
				<label class="icon_search label-icon-btn"><input type="submit" value="검색" title=""></label>
				</form>
			</div>
		</div>

		<ul class="gall_collection">

<?
	$result_collection=query("select * from Pka_Collection where (1=1) and token_val = '$rows_userinfo[token_val]' and (PU_open_ck = '1' || (PU_open_ck = '2' and PU_open_email like '%$_SESSION[p_PU_email]%')) order by PU_joindate desc limit 0, 100");
	for($i=0;$i<$rows_collection=fetch_array($result_collection) ;$i++ ){
	$Pfiles_collection=explode("/",$rows_collection[PU_files]);
?>
			<li>
				<div class="thumb"><a href="/contents/insite/bookmark?PU_idx=<?=$rows_collection[PU_idx]?>">
				<?
					if($Pfiles_collection[1]){
						$img_Name = imgName($Pfiles_collection[1]); //파일명
						echo "<img src='/files/collection_thumb/{$img_Name}.thumb' border='0' />";
					}else{
						echo "<span class='noimg'></span>";
					}
				?></a></div>
				<div class="txtWrap">
					<div class="subject"><a href="bookmark?PU_idx=<?=$rows_collection[PU_idx]?>"><?=$rows_collection[PU_subject]?></a></div>
					<div class="con">
						<?=cut_str($rows_collection[PU_contents], 72, '…');?>
					</div>
				</div>
				
				<?if($rows_userinfo[token_val]==$_SESSION[p_token_val]){//자기글 조회?>
				<a href="/contents/common/pop.collection.write.php?PU_idx=<?=$rows_collection[PU_idx]?>" class="btnEdit popup-ajax"></a>
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
	$result_collection=query("select * from Pka_Collection where (1=1) and token_val = '$rows_userinfo[token_val]' order by PU_joindate desc limit 0, 100");
	for($i=0;$i<$rows_collection=fetch_array($result_collection) ;$i++ ){
	$n_rows_collection=n_rows("select * from Pka_Bookmark where (1=1) and token_val = '$rows_userinfo[token_val]' and PU_idx = '$rows_collection[PU_idx]' order by PU_joindate desc limit 0, 100");
?>
			<div class="collection-group">
				<div class="collection">
					<span class="subject"><?=$rows_collection[PU_subject]?></span>
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
					<li><span class="subject" onclick="location.href='/contents/insite/view_bookmark?PB_idx=<?=$rows_bookmark[PB_idx]?>'" style="cursor:pointer;"><?=$rows_bookmark[PU_subject]?></span><span class="con"><a href="<?=$PU_url_ck?>" target="_blank"><?=$rows_bookmark[PU_url]?></a></span></li>
<?}?>
				</ul>
			</div>
<?}?>

		</div>
		
	</div>
	<!-- galleryWrapper -->

</div>
<!-- //container -->	



<?}else{?>



<section class="divCenter">
	
	<div class="container tcenter" style="background:rgba(0,0,0,0.02); border-radius:4px;">
		
		<h4>나만의 웹을 정의하고<span class="mbr"></span>새로운 영감을 얻으세요.</h4>
		<h5 class="mt20">(서비스에 대한 설명 요약)</h5>
		<!-- <p class="txt mt20 mobile_txt">
			사용자들이 직접 웹사이트 큐레이팅을 통해</br>
			꼭 필요하고, 필요했던 양질의 정보를 발견하고 공유하는 서비스입니다.</br>
			Insite는, 단순히 웹사이트들을 정리하고 보관하는 기능을 넘어,</br>
			사용자 개인의 개성과 특성을 반영한 ‘정보의 진열’을 본질로합니다.</br>
			기존 인터넷 환경 속, 대형 포털사이트와 주요 미디어를 통한</br>
			웹 서핑의 문제와 한계를 극복하고, 사람에 의한 새로운</br>
			웹 큐레이션을 통해 새로운 영감의 기회를 제공하고자 합니다.</br>
			나만의 웹을 정의하고 새로운 영감을 얻으세요.</br>
		</p> -->
		
		<p class="mt30"><a href="/contents/common/pop.login.php" class="btn large wide popup-ajax">시작하기<i class="icon_arrow ml5"></i></a></p>

	</div>
	
</section>



<?}?>

<?include "../../contents/common/footer.php";?>
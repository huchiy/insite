<?$menu="1";?>
<?$loginspot='Y';?>
<?include "../../contents/common/head.php";?>

<?
if($mode=="search"){
	if($key){$sear_coll.=" and (PU_subject like '%$key%' || PU_contents like '%$key%')";}
	if($key){$sear_book.=" and (Pka_Bookmark.PU_url like '%$key%' || Pka_Bookmark.PU_subject like '%$key%' || Pka_Bookmark.PU_contents like '%$key%')";}
	if($key){$sear_user.=" and (PU_name like '%$key%' || PU_profile like '%$key%')";}
	if($view_ck){
		if($view_ck=='all'){
		}else if($view_ck=='collection'){
			$sear_book.=" and Pka_Bookmark.PU_idx=0";
			$sear_user.=" and PU_idx=0";
		}else if($view_ck=='bookmark'){
			$sear_coll.=" and PU_idx=0";
			$sear_user.=" and PU_idx=0";
		}else if($view_ck=='insiter'){
			$sear_coll.=" and PU_idx=0";
			$sear_book.=" and Pka_Bookmark.PU_idx=0";
		}else{
		}
	}else{
		$view_ck='all';
	}
}
?>

<script>
	// 검색
	function bbsSchSub() {
		var frm=document.bbsFrm;
		//if(!frm.key.value){alert("검색어를 입력하세요.");frm.key.focus();return;}
		frm.submit();
	}
	function view_mode(view_kind){
		$('#view_ck').val(view_kind);
		bbsSchSub();
	}
//-->
</script>

<div class="container">

	<a class="prevPage" onclick="location.href='/'"></a>
	
	<div id="searchResultWrap">
	<form name="bbsFrm" id="bbsFrm" action="/contents/gallery/gallery_list" method="get" enctype="multipart/form-data" onSubmit="return bbsSchSub(this);" target="">
	<input type="hidden" name="mode" value="search"/>
	<input type="hidden" name="view_ck" id="view_ck" value="all"/>
		<p class="se-form">
			<input type="text" name="key" value="<?=$key?>" class="span large" placeholder="검색어 입력" onkeydown="ent_q('bbsSchSub()');"/>
			<label class="icon_search label-icon-btn"><input type="submit" value="검색" title=""></label>
		</p>
	</form>
	</div>

	<div class="categoryWrap">
		<ul>
			<li><a onclick="view_mode('all')" style="cursor:pointer;" class="<?if($view_ck=='all' || !$view_ck){?>active<?}?>">모두</a></li>
			<li><a onclick="view_mode('collection')" style="cursor:pointer;" class="<?if($view_ck=='collection'){?>active<?}?>">컬렉션</a></li>
			<li><a onclick="view_mode('bookmark')" style="cursor:pointer;" class="<?if($view_ck=='bookmark'){?>active<?}?>">북마크</a></li>
			<li><a onclick="view_mode('insiter')" style="cursor:pointer;" class="<?if($view_ck=='insiter'){?>active<?}?>">인사이터</a></li>
		</ul>
	</div>

<?if($view_ck=='all' || $view_ck=='collection'){?>
	<!-- galleryWrapper -->
	<div class="galleryWrapper">
		<ul class="gall_collection">
<?
$bbs_query="select * from Pka_Collection where (1=1) and (PU_open_ck = '1' || (PU_open_ck = '2' and PU_open_email like '%$_SESSION[p_PU_email]%')) $sear_coll order by PU_joindate desc";
$total_record=n_rows($bbs_query);
if(!$listNum) $listNum=4;
$total_page=ceil($total_record/$listNum);
$total_page_collection=$total_page;
if(!$page) $page=1;
if($total_page==0){	 //총 페이지가 없을 경우.
	$first=1;
	$last=0;
}else{
	$first=($page-1)*$listNum;	 //페이지의 출력할 첫번째 레코드를 지정.
	$last=$page*$listNum;		//다음 페이지의 출력할 첫번째 레코드 지정.
}
$article_num=$total_record - ($page-1)*$listNum;
$result=query($bbs_query." limit $first, $listNum");
for($i=0;$i<$rows_collection=fetch_array($result) ;$i++ ){
$Pfiles_collection=explode("/",$rows_collection[PU_files]);
?>
			<li>
				<div class="thumb"><a href="/contents/insite/bookmark?PU_idx=<?=$rows_collection[PU_idx]?>">
				<?
					if($Pfiles_collection[1]){
						$img_Name = imgName($Pfiles_collection[1]); //파일명
						echo "<img src='/files/collection_thumb/{$img_Name}.thumb' border='0' />";
					}else{
						echo "<img src='/assets/images/temp_img/temp_01.jpg' border='0' >";
					}
				?></a></div>
				<div class="txtWrap">
					<div class="subject"><a href="/contents/insite/bookmark?PU_idx=<?=$rows_collection[PU_idx]?>"><?=$rows_collection[PU_subject]?></a></div>
					<div class="con">
						<?=cut_str($rows_collection[PU_contents], 72, '…');?>
					</div>
				</div>
				<?if($rows_collection[token_val]==$_SESSION[p_token_val]){//자기글 수정?>
				<a href="/contents/common/pop.collection.write.php?PU_idx=<?=$rows_collection[PU_idx]?>" class="btnEdit popup-ajax"></a>
				<?}else{}?>
			</li>
<?}?>
		</ul>
<?}?>

<?if($view_ck=='all' || $view_ck=='bookmark'){?>
		<ul class="gall_bookMark mt20">
<?
$bbs_query="select Pka_Bookmark.PU_files,Pka_Bookmark.PB_idx,Pka_Bookmark.PU_subject,Pka_Bookmark.PU_contents,Pka_Bookmark.token_val,Pka_Bookmark.PB_idx,Pka_Collection.PU_open_ck,Pka_Collection.PU_open_email from Pka_Bookmark JOIN Pka_Collection On Pka_Bookmark.PU_idx = Pka_Collection.PU_idx where (1=1) and (Pka_Collection.PU_open_ck = '1' || (Pka_Collection.PU_open_ck = '2' and Pka_Collection.PU_open_email like '%$_SESSION[p_PU_email]%')) $sear_book order by Pka_Bookmark.PU_joindate desc";
$total_record=n_rows($bbs_query);
if(!$listNum) $listNum=4;
$total_page=ceil($total_record/$listNum);
$total_page_bookmark=$total_page;
if(!$page) $page=1;
if($total_page==0){	 //총 페이지가 없을 경우.
	$first=1;
	$last=0;
}else{
	$first=($page-1)*$listNum;	 //페이지의 출력할 첫번째 레코드를 지정.
	$last=$page*$listNum;		//다음 페이지의 출력할 첫번째 레코드 지정.
}
$article_num=$total_record - ($page-1)*$listNum;
$result=query($bbs_query." limit $first, $listNum");
for($i=0;$i<$rows_bookmark=fetch_array($result) ;$i++ ){
$Pfiles_bookmark=explode("/",$rows_bookmark[PU_files]);
?>
			<li class="cardBox">
				<a href="/contents/insite/view_bookmark?PB_idx=<?=$rows_bookmark[PB_idx]?>">
					<div class="subject"><?=$rows_bookmark[PU_subject]?></div>
					<div class="con">
						<?=cut_str($rows_bookmark[PU_contents], 72, '…');?>
					</div>
				</a>
				<?if($rows_bookmark[token_val]==$_SESSION[p_token_val]){//자기글 수정?>
				<a href="/contents/common/pop.bookmark.write.php?PU_idx=<?=$rows_bookmark[PU_idx]?>&PB_idx=<?=$rows_bookmark[PB_idx]?>" class="btnEdit popup-ajax"></a>
				<?}else{}?>
			</li>
<?}?>
		</ul>
<?}?>

<?if($view_ck=='all' || $view_ck=='insiter'){?>
		<ul class="gall_insiter mt40">
<?
$bbs_query="select * from Pka_User where (1=1) $sear_user order by PU_joindate desc";
$total_record=n_rows($bbs_query);
if(!$listNum) $listNum=4;
$total_page=ceil($total_record/$listNum);
$total_page_user=$total_page;
if(!$page) $page=1;
if($total_page==0){	 //총 페이지가 없을 경우.
	$first=1;
	$last=0;
}else{
	$first=($page-1)*$listNum;	 //페이지의 출력할 첫번째 레코드를 지정.
	$last=$page*$listNum;		//다음 페이지의 출력할 첫번째 레코드 지정.
}
$article_num=$total_record - ($page-1)*$listNum;
$result=query($bbs_query." limit $first, $listNum");
for($i=0;$i<$rows_user=fetch_array($result) ;$i++ ){
$Pfiles_user=explode("/",$rows_user[PU_files]);
?>
			<li>
				<div class="thumb"><a href="/contents/insite/manage?token_val=<?=$rows_user[token_val]?>"><?
					if($Pfiles_user[1]){
						$img_Name = imgName($Pfiles_user[1]); //파일명
						echo "<img src='/files/userinfo_thumb/{$img_Name}.thumb' border='0' />";
					}else{
						echo "<img src='/assets/images/user.png' border='0' >";
					}
				?></a></div>
				<a href="/contents/insite/manage?PU_idx=<?=$rows_user[PU_idx]?>" class="cardBox">
					<div class="subject"><?=$rows_user[PU_name]?></div>
					<div class="con">
						<?=$rows_user[PU_profile]?>
					</div>
				</a>
			</li>
<?}?>
		</ul>
<?}?>

	</div>
	<!-- galleryWrapper -->
<?
	if($total_page_collection>$total_page_bookmark){
		$total_page = $total_page_collection;
	}else{
		$total_page = $total_page_bookmark;
	}
	if($total_page_user>$total_page){
		$total_page = $total_page_user;
	}
?>
<?include "../../contents/common/pages.php";?>

</div>


<?include "../../contents/common/footer.php";?>
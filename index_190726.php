<?$main='Y';?>
<?$menu="1";?>
<?include "./contents/common/head.php";?>

<script>
	// 검색
	function bbsSchSub() {
		var frm=document.bbsFrm;
		//if(!frm.key.value){alert("검색어를 입력하세요.");frm.key.focus();return;}
		frm.submit();
	}
//-->
</script>

<!-- <section class="scroll-section fit">
	
	<div id="mainSearchWrap" class="container">
	<form name="bbsFrm" id="bbsFrm" action="/contents/gallery/gallery_list" method="get" enctype="multipart/form-data" onSubmit="return bbsSchSub(this);" target="">
	<input type="hidden" name="mode" value="search"/>
		<p class="tit"><span class="bold">인사이트 나만의 웹을 정의하고</span> 새로운 영감을 얻으세요.</p>
		<p class="se-form">
			<input type="text" name="key" id="key" value="" class="span large" placeholder="검색어 입력" onkeydown="ent_q('bbsSchSub()');"/>
			<label class="icon_search label-icon-btn"><input type="submit" value="검색" title=""></label>
		</p>
	</form>
	</div>
	
	<span class="nextPage"></span>

</section> -->

<section class="scroll-section fit" style="position:relative;border:2px solid red;">

	<!-- <span class="prevPage"></span> -->
	
	<div class="container" style="padding:0;">

		<div class="container_title">오늘의 인사이트</div>
		
		<!-- galleryWrapper -->
		<div class="galleryWrapper">

			<!-- collection -->
			<ul class="gall_collection">
<?
	$result_recom=query("select * from Pka_Recommend where (1=1) and PU_kind = 'collection' order by PU_sortnum asc limit 0, 4");
	for($i=0;$i<$rows_recom=fetch_array($result_recom) ;$i++ ){		
	$rows_collection=f_array("select * from Pka_Collection where (1=1) and PU_idx = '$rows_recom[PU_idx]' order by PU_joindate desc");
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
			<!-- collection -->

			<!-- bookMark -->
			<ul class="gall_bookMark mt20">
<?
	$result_recom=query("select * from Pka_Recommend where (1=1) and PU_kind = 'bookmark' order by PU_joindate desc limit 0, 8");
	for($i=0;$i<$rows_recom=fetch_array($result_recom) ;$i++ ){
	$rows_bookmark=f_array("select * from Pka_Bookmark where (1=1) and PB_idx = '$rows_recom[PB_idx]' order by PU_joindate desc");
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
			<!-- bookMark -->

			<!-- insiter -->
			<ul class="gall_insiter mt40">
<?
	$result_recom=query("select * from Pka_Recommend where (1=1) and PU_kind = 'insiter' order by PU_joindate desc limit 0, 4");
	for($i=0;$i<$rows_recom=fetch_array($result_recom) ;$i++ ){
	$rows_insiter=f_array("select * from Pka_User where (1=1) and PU_idx = '$rows_recom[PU_idx]' order by PU_joindate desc");
	$Pfiles_insiter=explode("/",$rows_insiter[PU_files]);
	
	if($Pfiles_insiter[1]){
		$img_Name = imgName($Pfiles_insiter[1]); //파일명
		$profile_img = "/files/userinfo_thumb/{$img_Name}.thumb";
	}else if($rows_insiter[PU_Imageurl]){
		$profile_img = $rows_insiter[PU_Imageurl];
	}else{
		$profile_img = "/assets/images/user.png";
	}
?>
				<li>
					<div class="thumb"><a href="/contents/insite/manage?token_val=<?=$rows_insiter[token_val]?>"><img src="<?=$profile_img?>" /></a></div>
					<a href="/contents/insite/manage?token_val=<?=$rows_insiter[token_val]?>" class="cardBox">
						<div class="subject"><?=$rows_insiter[PU_name]?></div>
						<div class="con">
							<?=cut_str($rows_insiter[PU_profile], 72, '…');?>
						</div>
					</a>
				</li>
<?}?>
			</ul>
			<!-- insiter -->

		</div>
		<!-- galleryWrapper -->

	</div>
<?if($_SESSION[p_token_val]){?>
	<!-- <span class="nextPage"></span> -->
<?}?>
</section>


<?if($_SESSION[p_token_val]){?>
<section class="scroll-section none">

	<span class="prevPage"></span>
	
	<div class="container">

		<div class="container_title">팔로잉</div>
		
		<!-- galleryWrapper -->
		<div class="galleryWrapper">
			<ul class="gall_collection">
				<li>
					<div class="thumb"><a href="#"><img src="/assets/images/temp_img/temp_01.jpg" /></a></div>
					<div class="txtWrap">
						<div class="subject"><a href="#">꼭 읽고 싶은 책</a></div>
						<div class="con">
							<?php
							$contents = '컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한)';
							echo cut_str($contents, 72, '…');
							?>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb"><a href="#"><img src="/assets/images/temp_img/temp_02.jpg" /></a></div>
					<div class="txtWrap">
						<div class="subject"><a href="#">SAP 개선 프로젝트</a></div>
						<div class="con">
							<?php
							$contents = '컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한)';
							echo cut_str($contents, 72, '…');
							?>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb"><a href="#"><img src="/assets/images/temp_img/temp_03.jpg" /></a></div>
					<div class="txtWrap">
						<div class="subject"><a href="#">영감을 주는 디자인</a></div>
						<div class="con">
							<?php
							$contents = '컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한)';
							echo cut_str($contents, 72, '…');
							?>
						</div>
					</div>
				</li>
				<li>
					<div class="thumb"><a href="#"><img src="/assets/images/temp_img/temp_04.jpg" /></a></div>
					<div class="txtWrap">
						<div class="subject"><a href="#">아침을 여는 인사이트</a></div>
						<div class="con">
							<?php
							$contents = '컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한) 컬렉션에 대한 간단한 소개 및 설명문구 (글자수 제한)';
							echo cut_str($contents, 72, '…');
							?>
						</div>
					</div>
				</li>
			</ul>
			<ul class="gall_bookMark mt20">
				<li class="cardBox">
					<a href="#" >
						<div class="subject">스타트업 위클리</div>
						<div class="con">
							북마크에 대한 간단한 설명 및 메모 북마크에 대한 간단한 설명 및 메모 북마크에 대한 간단한 설명 및 메모
						</div>
					</a>
				</li>
				<li class="cardBox">
					<a href="#">
						<div class="subject">뉴닉</div>
						<div class="con">
							북마크에 대한 간단한 설명 및 메모
						</div>
					</a>
				</li>
				<li class="cardBox">
					<a href="#">
						<div class="subject">뉴욕타임즈(경영)</div>
						<div class="con">
							북마크에 대한 간단한 설명 및 메모
						</div>
					</a>
				</li>
				<li class="cardBox">
					<a href="#">
						<div class="subject">저커버그 인터뷰</div>
						<div class="con">
							북마크에 대한 간단한 설명 및 메모
						</div>
					</a>
				</li>
				<li class="cardBox">
					<a href="#">
						<div class="subject">finace.yahoo.comm/df</div>
						<div class="con">
							주시해야 하는 주식총액
						</div>
					</a>
				</li>
				<li class="cardBox">
					<a href="#">
						<div class="subject">좋은 오디오클럽</div>
						<div class="con">
							북마크에 대한 간단한 설명 및 메모
						</div>
					</a>
				</li>
				<li class="cardBox">
					<a href="#">
						<div class="subject">금일업무 참고</div>
						<div class="con">
							북마크에 대한 간단한 설명 및 메모
						</div>
					</a>
				</li>
				<li class="cardBox">
					<a href="#">
						<div class="subject">직장인 관련 링크</div>
						<div class="con">
							북마크에 대한 간단한 설명 및 메모
						</div>
					</a>
				</li>
			</ul>
			
		</div>
		<!-- galleryWrapper -->

	</div>

</section>
<?}?>


<?include "./contents/common/footer.php";?>
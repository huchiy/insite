<?include "../../app/inc_head.php";?>

<script src="/assets/js/site_jquery.js?<?=time()?>"></script>

<?
if($_SESSION[p_token_val] && $PB_idx){

	// 컬렉션 아이디 가져오기
	$rows_bookmark = f_array("select * from Pka_Bookmark where PB_idx = '$PB_idx' order by PU_joindate desc");
	$PU_idx = $rows_bookmark[PU_idx];

	if($PC_idx){
		$rows_comment=f_array("select * from Pka_Bookmark_comment where PC_idx='$PC_idx'");	
		$PU_contents=$rows_comment[PU_contents];
		$Query="update";
	}else {
		$Query="insert";
	}

	// 유저정보
	$rows_userinfo = f_array("select * from Pka_User where token_val = '$_SESSION[p_token_val]' order by PU_joindate desc");
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

}else {
	f_alert('잘못된경로입니다.','/');
}
?>

<script language="JavaScript">
<!--
	function write_sub() {

		var frm=document.bbs_frm;

		if(!frm.PU_contents.value){alert("댓글 내용을 입력하세요.");frm.PU_contents.focus();return false;}

		reply_write();

	}
	// 댓글 등록
	function reply_write() { 
    var queryString = $("form[name=bbs_frm]").serialize();
		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check',       
			data : queryString,
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
					location.href='<?=$rf_page?>';
				}else if(result=="ok1"){
					location.href='<?=$rf_page?>';
				}else if(re[0]=="10"){
					alert('다시 로그인해주세요.');
					location.href='<?=$rf_page?>';
				}else{
					alert("Error");
				}
			}
		 });
	}
//-->
</script>

<!-- layerPoup -->
<div class="layerPoup pop_replyForm">
	
    <section class="popcon_wrapper">
		
		<form name="bbs_frm" id="bbs_frm" action="" method="post" enctype="multipart/form-data" onSubmit="return" target="db_frame">
		<input type="hidden" name="checkName" value="reply_write">
		<input type="hidden" name="Query" value="<?=$Query?>">
		<input type="hidden" name="table_name" value="bookmark">
		<input type="hidden" name="PC_idx" value="<?=$PC_idx?>">
		<input type="hidden" name="PU_idx" value="<?=$PU_idx?>">
		<input type="hidden" name="PB_idx" value="<?=$PB_idx?>">
		<div class="replyForm">
			<header>
				<span class="thumb"><img src="<?=$profile_img?>"></span>
				<span class="writer"><?=$PU_name?></span>
			</header>
			<textarea name="PU_contents" id="PU_contents" class="span" style="height:80px;" placeholder="댓글 내용을 입력해주세요." maxlength="1000"><?=$PU_contents?></textarea>
		</div>
		<p class="mt10 tright"><input type="button" onclick="write_sub()" value="<?if($Query=='update'){?>댓글수정<?}else{?>댓글달기<?}?>" accesskey="s" class="btn span4 large"></p>
		</form>

    </section>

</div>
<!-- //layerPoup -->
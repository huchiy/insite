<?include "../../app/inc_head.php";?>

<script src="/assets/js/site_jquery.js?<?=time()?>"></script>

<?
if($_SESSION[p_token_val] && $PU_idx){

	$rows_collection=f_array("select * from Pka_Collection where PU_idx='$PU_idx'");	
	$PU_email=$rows_collection[PU_email];
	$PU_subject=$rows_collection[PU_subject];
	$PU_contents=$rows_collection[PU_contents];
	$PU_category=$rows_collection[PU_category];
	$PU_open_ck=$rows_collection[PU_open_ck];
	$PU_open_email=$rows_collection[PU_open_email];
	$Pfiles=explode("/",$rows_collection[PU_files]);
	$fileNum=1;
	$Query="update";

}else {

	$Query="insert";

}
?>

<script language="JavaScript">
<!--
	function del_sub() {

		var frm=document.bbs_frm;

		frm.Query.value = 'delete';

		frm.submit();

	}
	function write_sub() {

		var frm=document.bbs_frm;

		if(!frm.PU_subject.value){alert("컬렉션 이름을 입력하세요.");frm.PU_subject.focus();return false;}
		if(!frm.PU_contents.value){alert("컬렉션 설명을 입력하세요.");frm.PU_contents.focus();return false;}
		if(frm.PU_open_ck.value==2){
			if(!frm.PU_open_email.value){alert("부분공개할 이메일을 ','로 구분하여 입력하세요.");frm.PU_open_email.focus();return false;}
		}

		frm.submit();

	}
	// 파일전송
	function fileSubmit(file_num) {
		$("#fileNum").val(file_num);
		var formData = new FormData($("#bbs_frm")[0]);
		var before_img = $("#up_img_url"+file_num).attr('src');
		$("#up_img_url"+file_num).attr("src","/assets/images/gif-load.gif");
		$.ajax({
				url: '/contents/common/apply_image_ok.php',
				data: formData,
				processData: false,
				contentType: false,
				type: 'POST',
				error : function(request,status,error){
					console.log(request);
					alert("code : "+request.status+"\r\nmessage : " + request.responseText);
				},
				success : function(result) {
					//alert(result)
					result = result.replace(/(^\s*)|(\s*$)/g, "");
					var re=result.split("///");
					if(re[0]=="ok"){
						//alert("파일 업로드하였습니다.");
						if(re[1]){$('#up_img_url'+file_num).attr('src',re[1])};
						if(re[2]){$('#fileN'+file_num).val(re[2])};
					}else{
						//$("#fake_url"+file_num).show();
						$("#up_img_url"+file_num).attr("src",before_img);
						alert('업로드에 실패하였습니다.(err:00)');
					}
				}
		});
	}
//-->
</script>


<!-- layerPoup -->
<div class="layerPoup pop_collection_write">
	
    <section class="popcon_wrapper">

		<div class="pop-title tcenter">
		<?if($_SESSION[p_token_val] && $PU_idx){?>
			컬렉션 수정<!-- 편집화면일 경우 - 컬렉션 편집-->
		<?}else{?>
			컬렉션 추가<!-- 편집화면일 경우 - 컬렉션 편집-->
		<?}?>
		</div>
		
		<form name="bbs_frm" id="bbs_frm" action="/contents/member/collection_ok.php" method="post" enctype="multipart/form-data" onSubmit="return write_sub(this);" target="db_frame">
		<input type="hidden" name="Query" value="<?=$Query?>">
		<input type="hidden" name="table_name" value="collection">
		<input type="hidden" name="PU_idx" value="<?=$rows_collection["PU_idx"]?>">
		<div class="mt30">

			<label class="imgUploadSet">
			<?for($i=1;$i<=1;$i++){?>
				<div class="thumb" style="width:200px; margin:20px auto;position:relative;z-index:9999l;">
					<?Pfiles_link("$Pfiles[$i]",$i,'collection');?>
					<input type="hidden" name="fileN<?=$i?>" id="fileN<?=$i?>" value="<?=$Pfiles[$i]?>">
					<input type="hidden" name="fileRN<?=$i?>" id="fileRN<?=$i?>" value="<?=$Pfname[$i]?>">
					<input type='file' name='up_file<?=$i?>' id='up_file<?=$i?>' onchange='fileSubmit("<?=$i?>")' class='file_input_hidden' style="width:100%;height:100%;z-index:9999l;"/>
				</div>
			<?}?>
			</label>
			<div style="clear:both;"></div>

			<p><input type="text" name="PU_subject" id="PU_subject" required class="span large " placeholder="컬렉션 이름" value="<?=$PU_subject?>" maxlength="50"></p>
			<p class="mt10"><textarea name="PU_contents" id="PU_contents" class="span" style="height:80px;" placeholder="컬렉션 설명" maxlength="200"><?=$PU_contents?></textarea></p>
			<select name="PU_open_ck" id="PU_open_ck" value="<?=$PU_subject?>" class="span large mt10">
				<option value="1" <?if($PU_open_ck==1){?>selected<?}?>>전체공개</option>
				<option value="2" <?if($PU_open_ck==2){?>selected<?}?>>부분공개</option>
				<option value="3" <?if($PU_open_ck==3){?>selected<?}?>>비공개</option>
			</select>
			<p id="PU_email_ck" class="mt10 <?if($PU_open_ck!=2){?>none<?}?>"><input type="text" name="PU_open_email" id="PU_open_email" class="span large " placeholder="이메일" value="<?=$PU_open_email?>" maxlength="300"></p>
			<select name="PU_category" id="PU_category" class="span large mt10">
				<option value="1" <?if($PU_category==1){?>selected<?}?>>카테고리 A</option>
				<option value="2" <?if($PU_category==2){?>selected<?}?>>카테고리 B</option>
				<option value="3" <?if($PU_category==3){?>selected<?}?>>카테고리 C</option>
			</select>
<?if($_SESSION[p_token_val] && $PU_idx){?>
			<p class="mt20"><input type="submit" value="수정하기" accesskey="s" class="btn span large"></p><!--편집화면일 경우 - 버튼명 '확인'-->
			<p class="mt20"><a onclick="del_sub()" style="cursor:pointer;" class="btn span large red btnDelete">삭제</a></p>
<?}else{?>
			<p class="mt20"><input type="submit" value="추가하기" accesskey="s" class="btn span large"></p><!--편집화면일 경우 - 버튼명 '확인'-->
<?}?>
		</div>
		</form>

		
    </section>

</div>
<!-- //layerPoup -->


<script>
<?php if(!$chkMobile) { ?>
$(document).ready(function() {
	$('select').selectpicker('refresh');
});
<?php } ?>

<?php if($chkMobile) { ?>
$('select').each(function() {
	var selectClass = $(this).attr('class');
	$(this).removeClass();
	$(this).wrap('<div class="select-wrapper ' + selectClass + '"></div>');
});
<?php } ?>
$('#PU_open_ck').change(function (){
	if($(this).val()=='2'){
		$('#PU_email_ck').removeClass('none');
	} else {
		$('#PU_email_ck').addClass('none');
	};
});
</script>
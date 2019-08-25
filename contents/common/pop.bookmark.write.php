<?include "../../app/inc_head.php";?>

<script src="/assets/js/site_jquery.js?<?=time()?>"></script>

<?
if($_SESSION[p_token_val] && $PU_idx){

	if($PB_idx){
		$rows_bookmark=f_array("select * from Pka_Bookmark where PB_idx='$PB_idx'");
		$PU_idx=$rows_bookmark[PU_idx];	
		$PU_url=$rows_bookmark[PU_url];
		$PU_subject=$rows_bookmark[PU_subject];
		$PU_contents=$rows_bookmark[PU_contents];
		$PU_category=$rows_bookmark[PU_category];
		$PU_ogimage=trim($rows_bookmark[PU_ogimage]);
		$Pfiles=explode("/",$rows_bookmark[PU_files]);
		$fileNum=1;
		$Query="update";
	}else {
		$PU_idx=$PU_idx;
		$Query="insert";
	}

}else {
	f_alert('잘못된경로입니다.','/contents/member/manage');
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

		if(!frm.PU_url.value){alert("북마크 url을 입력하세요.");frm.PU_url.focus();return false;}
		if(!frm.PU_subject.value){alert("북마크 이름을 입력하세요.");frm.PU_subject.focus();return false;}
		if(!frm.PU_contents.value){alert("북마크 설명을 입력하세요.");frm.PU_contents.focus();return false;}

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
						$('#PU_ogimage').val('');
					}else{
						//$("#fake_url"+file_num).show();
						$("#up_img_url"+file_num).attr("src",before_img);
						alert('업로드에 실패하였습니다.(err:00)');
					}
				}
		});
	}
	function open_graph_url(){
		if(!$('#PU_url').val()){
			alert('url이 없습니다. url를 적은 후 다시 시도해주세요.');
			return false;
		}

		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check',
			data:{
				'checkName' : 'open_graph_get',
				'url': $('#PU_url').val()
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
				if(re[0]=="ok"){
					if(!re[1] || !re[2] || !re[3]){
						alert('url에서 가져온 정보가 없습니다.');
					}else{
						$('#PU_subject').val(re[1]);
						$('#PU_contents').val(re[2]);
						$('#PU_ogimage').val(re[3]);
					
						if(re[3]){
							$('.ogimage').remove();
							$('.holdImg').remove();
							$('.upimage').hide();
							$('#PU_image_upload').append("<img src='"+re[3]+"' border='0' align='absmiddle' id='up_img_url1' class='ogimage'>");
						}
					}

				}else{
					alert("Error");
				}
			}
		 });
	}
//-->
</script>

<!-- layerPoup -->
<div class="layerPoup pop_bookmark_write">
	
    <section class="popcon_wrapper">

		<div class="pop-title tcenter">
<?if($_SESSION[p_token_val] && $PB_idx){?>
			북마크 편집<!-- 편집화면일 경우 - 북마크 편집-->
<?}else{?>
			북마크 추가<!-- 편집화면일 경우 - 북마크 편집-->
<?}?>
		</div>
		
		<form name="bbs_frm" id="bbs_frm" action="/contents/member/bookmark_ok.php" method="post" enctype="multipart/form-data" onSubmit="return write_sub(this);" target="db_frame">
		<input type="hidden" name="Query" value="<?=$Query?>">
		<input type="hidden" name="table_name" value="bookmark">
		<input type="hidden" name="PB_idx" value="<?=$PB_idx?>">
		<input type="hidden" name="PU_ogimage" id="PU_ogimage" value="<?=$PU_ogimage?>">
		<div>
			<p><input type="text" name="PU_url" id="PU_url" required class="span large " value="<?=$PU_url?>" placeholder="북마크 url" maxlength="255"></p>
			<p class="mt20"><a onclick="open_graph_url()" style="cursor:pointer;" accesskey="s" class="btn span large">url에서 정보 가져오기</a></p><!--편집화면일 경우 - 버튼명 '확인'-->
			
			<label class="imgUploadSet mt10">
			<?for($i=1;$i<=1;$i++){?>
			<p class="mt10" style="width:200px; margin:20px auto;position:relative;z-index:9999l;" id='PU_image_upload'>
				<?if(!$PU_ogimage){// 가져온이미지사용?>
					<?Pfiles_link("$Pfiles[$i]",$i,'bookmark');?>
				<?}else{// 수정된이미지사용?>
					<?Pfiles_link("$PU_ogimage",$i,'bookmark_ogimage');?>
				<?}?>
				<input type="hidden" name="fileN<?=$i?>" id="fileN<?=$i?>" value="<?=$Pfiles[$i]?>">
				<input type="hidden" name="fileRN<?=$i?>" id="fileRN<?=$i?>" value="<?=$Pfname[$i]?>">
				<input type='file' name='up_file<?=$i?>' id='up_file<?=$i?>' onchange='fileSubmit("<?=$i?>")' class='file_input_hidden' style="width:100%;height:0%;z-index:9999l"/>
			</p>
			<?}?>
			</label>
			<div style="clear:both;"></div>

			<p class="mt10"><input type="text" name="PU_subject" id="PU_subject" required class="span large " placeholder="북마크 이름" value="<?=$PU_subject?>" maxlength="200"></p>
			<p class="mt10"><textarea name="PU_contents" id="PU_contents" class="span" style="height:80px;" placeholder="북마크 설명"><?=$PU_contents?></textarea></p>
			<select name="PU_idx" id="PU_idx" class="span large mt10">
<?
	$result_collection=query("select * from Pka_Collection where (1=1) and token_val = '$_SESSION[p_token_val]' order by PU_joindate desc limit 0, 100");
	for($i=0;$i<$rows_collection=fetch_array($result_collection) ;$i++ ){
?>
				<option value="<?=$rows_collection[PU_idx]?>" <?if($rows_collection[PU_idx]==$PU_idx){?>selected<?}?>><?=$rows_collection[PU_subject]?></option>
<?}?>
			</select>
<?if($_SESSION[p_token_val] && $PB_idx){?>
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
$('#privacyBounds').change(function (){
	if($(this).val()=='2'){
		$('#publicObject').removeClass('none');
	} else {
		$('#publicObject').addClass('none');
	};
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
			$('.holdImg').addClass('upImg');
			$('.holdImg *').remove();
			$('<img src="' + e.target.result + '">').appendTo('.holdImg');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('input[type="file"]').change(function(){
    readURL(this);
});
</script>
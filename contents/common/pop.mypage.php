<?include "../../app/inc_head.php";?>

<script src="/assets/js/site_jquery.js?<?=time()?>"></script>

<?
if($_SESSION[p_token_val]){

	$rows_userinfo=f_array("select * from Pka_User where token_val='$_SESSION[p_token_val]'");	
	$PU_email=$rows_userinfo[PU_email];
	$PU_name=$rows_userinfo[PU_name];
	$PU_profile=$rows_userinfo[PU_profile];
	$Pfiles_userinfo=explode("/",$rows_userinfo[PU_files]);
	$fileNum=1;
	$Query="update";
	
	if($Pfiles_userinfo[1]){
		$img_Name = imgName($Pfiles_userinfo[1]); //파일명
		$profile_img = "/files/userinfo_thumb/{$img_Name}.thumb";
	}else if($rows_userinfo[PU_Imageurl]){
		$profile_img = $rows_userinfo[PU_Imageurl];
	}else{
		$profile_img = "/assets/images/user.png";
	}

}else {
}
?>

<script>
	function join_sub() {

		var frm=document.join_frm;
		if(!frm.PU_name.value){alert('이름을 입력하세요.');$('#PU_name').focus();return false;}
		if(frm.PU_name.value.length<2) {alert('2자리 이상의 이름을 입력하세요.');$('#PU_name').focus();return false;}

		if(!frm.PU_profile.value){alert('간단한 소개 문구를 입력하세요.');$('#PU_profile').focus();return false;}

		frm.submit();
	}
	// 파일전송
	function fileSubmit(file_num) {
		$("#fileNum").val(file_num);
		var formData = new FormData($("#join_frm")[0]);
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
</script>

<!-- layerPoup -->
<div class="layerPoup pop_mypage">
	
    <section class="popcon_wrapper">
		
		<form name="join_frm" id="join_frm" action="/contents/member/join_ok.php" method="post" enctype="multipart/form-data" onSubmit="return join_sub(this);" target="db_frame">
		<input type="hidden" name="table_name" value="userinfo">
		<input type='hidden' value='<?=$Query?>' name='Query' id='Query'/>
		<div class="userProfile edit mb30" style="border:0px solid red;">
			
			<?for($i=1;$i<=1;$i++){?>
				<div class="thumb holdImg" style=" margin:0px auto;position:relative;z-index:9999l;">
<?if($Pfiles_userinfo[1]){?>
					<?Pfiles_link_mypage("$Pfiles_userinfo[$i]",$i,'userinfo');?>
<?}else if($rows_userinfo[PU_Imageurl]){?>
					<img src='<?=$rows_userinfo[PU_Imageurl]?>' border='0' align='absmiddle' id='up_img_url<?=$i?>'>
<?}else{?>
					<img src='/assets/images/user.png' border='0' align='absmiddle' id='up_img_url<?=$i?>'>
<?}?>
					<input type="hidden" name="fileN<?=$i?>" id="fileN<?=$i?>" value="<?=$Pfiles_userinfo[$i]?>">
					<input type="hidden" name="fileRN<?=$i?>" id="fileRN<?=$i?>" value="<?=$Pfname[$i]?>">
					<input type='file' name='up_file<?=$i?>' id='up_file<?=$i?>' onchange='fileSubmit("<?=$i?>")' class='file_input_hidden' style="width:100%;height:100%;z-index:9999l;"/>
				</div>
			<?}?>
			<div style="clear:both;"></div>

		</div>
		<div id="joinWrap" class="mt30">
			<p><input type="text" name="PU_name" id="PU_name" required class="span large " value="<?=$PU_name?>" placeholder="사용자 이름" value="<?=$PU_name?>"></p>
			<p class="mt10">
				<textarea name="PU_profile" id="PU_profile" class="span" style="height:80px;" placeholder="상태 메시지"><?=$PU_profile?></textarea>
			</p>
		</div>
		<p class="mt20 tcenter"><input type="submit" value="확인" accesskey="s" class="btn span large"></p>
		</form>

    </section>

</div>
<!-- //layerPoup -->

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            //$('.holdImg').attr('src', e.target.result);
			$('.holdImg').css('background-image', 'url(' + e.target.result + ')');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('input[type="file"]').change(function(){
    readURL(this);
});
</script>
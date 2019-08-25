<?
/**
*		이동 함수 파일
*		2013.07.18
*/



/*
*	$MSG : 출력메시지
*	$GO : 이동경로
*/ 
	function alert($MSG,$GO){?>
		<script>		
			alert("<?= $MSG?>");
			location.replace("<?= $GO?>");		
		</script>
<?exit;
	}
	function back($MSG){?>
		<script>		
			alert("<?= $MSG?>");
			history.back();		
		</script>
<?exit;
	}
	function go($GO){?>
		<script>		
			location.replace("<?= $GO?>");		
		</script>
<?exit;
	}	
	function msg($MSG){?>
		<script>		
			alert("<?= $MSG?>");		
		</script>
<?}
	function confirm($MSG,$GO){?>
		<script>
			if(confirm('<?=$MSG?>')){
				location.replace('<?=$GO?>');
			}else {}
		</script>
<?exit;
	}
	function self_close(){	?>
		<script>		
			window.self.close();		
		</script>
<?exit;
	}
	function sms_act($id, $indexNo){	?>
		<script>		
			parent.document.getElementById('<?=$id?>').value='<?=$indexNo?>';
		</script>
<?}
	function join_act($SHOW, $HIDE){	?>
		<script>		
			parent.document.getElementById('<?=$SHOW?>').style.display='block';
			parent.document.getElementById('<?=$HIDE?>').style.display='none';	
		</script>
<?exit;
	}
	function visible_ck($id){	?>
		<script>		
			parent.document.getElementById('<?=$id?>').style.display='block';
		</script>
<?}


		
/*
*	부모창 이동
*/
	function f_alert($MSG,$GO){?>
		<script>		
			alert("<?= $MSG?>");
			parent.location.replace("<?= $GO?>");		
		</script>
<?exit;
	}
	function f_back($MSG){?>
		<script>		
			alert("<?= $MSG?>");
			parent.history.back();		
		</script>
<?exit;
	}
	function f_go($GO){?>
		<script>		
			parent.location.replace("<?= $GO?>");		
		</script>
<?exit;
	}
	function f_confirm($MSG,$GO){?>
		<script>
			if(confirm('<?=$MSG?>')){
				parent.location.replace('<?=$GO?>');
			}else {}
		</script>
<?exit;
	}
	function f_reload(){?>
		<script>	
			parent.history.go(0);		
		</script>
<?}
	function f_close(){?>
		<script>
			window.self.close();		
		</script>
<?}
	function p_reload(){?>
		<script>	
			opener.history.go(0);		
		</script>
<?}	



/*
*	$atc : 이동 URL
*	$paVar : name=000&id=000&..&..&...
*	$tgt : 타겟
*/
	function form_act($atc,$paVar,$tgt="S"){
		switch($tgt){
			case "S":$target="_self";break;
			case "B":$target="_blank";break;
			case "P":$target="_parent";break;
			case "T":$target="_top";break;
			case "C":$target="_search";break;
		}
		$pa_vars=explode("&",$paVar);?>
		<script>
			var view="";
			view += "<form name='frm'>";
	<?for($i=0;$i<sizeof($pa_vars) ;$i++ ){
			$pv=explode("=",$pa_vars[$i]);?>
			view += "<input type='hidden' name='<?=$pv[0]?>' value='<?=$pv[1]?>'>";
	<?}?>
			view += "</form>";

			document.write(view);	
			document.frm.method="post";
			document.frm.target="<?=$target?>";
			document.frm.action="<?=$atc?>";
			document.frm.submit();
		</script>
<?exit;
	}




// 새창 권한체크
//function open_per_ck($LV) {
//	if(!$_SESSION[p_id] || ($_SESSION[p_id] && $LV>7)){
//		msg("다시 로그인 하세요.");
//		self_close();
//	}
//}
// $LV - 접근제한 레벨
function open_per_ck($LV) {
	if(!$_SESSION[p_id]){msg("다시 로그인 하세요.");self_close();}
	else if($LV<$_SESSION[adm_level]){
		msg("접근권한이 없습니다.");
		self_close();
	}	
}

// 관리자 권한체크
function adm_per_ck($LV,$GO) {
	if(!$_SESSION[p_id] || ($_SESSION[p_id] && $LV>5)){
		go($GO);
	}	
}


/*
*	관리영역 권한
*	$pg_pt		: 해당 페이지 권한 (A,B,C,D)
*	$GO			: 이동경로(상단일때만)
*	$pg_g		: C는 페이지 호출, T는 상단에서 호출
*/
function adm_part_ck($pg_pt,$pg_g="C",$GO="") {
	if($_SESSION[adm_level]>3 && !strpos($_SESSION[adm_per],$pg_pt)){
		if($pg_g=="T"){echo"javascript:alert('접근 권한이 없습니다.');";}
		else {back("접근 권한이 없습니다.");}		
	}else {echo$GO;}
}


// 세션없을때 로그인페이지로 이동
function se_ck_act($act,$rt_pg) {
	if($_SESSION[p_email]){
		$re_act=$act;
	}else {
		$re_act="javascript:alert('로그인하세요');location.href('https://www.hurom.co.kr/member/user/login.html?rt_page=$rt_pg');";
	}
	return $re_act;
}
?>

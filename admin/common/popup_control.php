<?
/*
*		팝업창
*/

$pDt=date("Y-m-d",time());
$i=1;
$popup_result = query("select * from wk_popup where view_ck='Y' and start_day <= '$pDt' and end_day >= '$pDt'");
while($popup_row=fetch_array($popup_result)) {

	if( $_COOKIE["p_cookie_".$popup_row[idx]] != 'NO' ) {

		$height=$popup_row[height]+24;
		if($popup_row[cookie_ck]=="1"){
			$pop_day=1;
			$pop_txt="오늘 하루 이창을 열지 않음";
		}else {
			$pop_day=365;
			$pop_txt="오늘 하루 이창을 열지 않음";
		}

		if($popup_row[pop_gb]=="G"){	// 일반팝업
			echo"<script> window.open('./include/popup.html?idx=$popup_row[idx]','$popup_row[idx]','scrollbars=no,width=$popup_row[width],height=$popup_row[height],top=$popup_row[topMargin],left=$popup_row[leftMargin]'); </script>";
		}else {	// 레이어 팝업
		
		if($_SESSION[p_level]==1){?>
		<script language="JavaScript"> 
		<!-- 				
			function setCookie( name, value, expiredays ) { 
				var todayDate = new Date(); 
					todayDate.setDate( todayDate.getDate() + expiredays ); 
					document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
			}
			// 체크박스로 닫기
			function closeWin<?=$i?>() { 
				<?$COOKIE_NAME="p_cookie_".$popup_row[idx];?>
				if ( document.notice_form<?=$i?>.popup_end.checked ){
				<?if($popup_row[cookie_ck]=="1"){?>
					setCookie( "<?=$COOKIE_NAME?>", "NO" , 1 );
				<?}else {?>
					setCookie( "<?=$COOKIE_NAME?>", "NO" , 365 );
				<?}?>
				}
				document.all['divpop<?=$i?>'].style.visibility = "hidden"; 
			}
			// 그냥 닫기
			function close_pop<?=$i?>() {
				document.all['divpop<?=$i?>'].style.visibility = "hidden"; 
			}
			function closeGo<?=$i?>(url){
				window.location.href=url;
			} 
		//-->  
		</script> 
		<!-- POPUP --> 
		<div id="divpop<?=$i?>" style="position:absolute;left:<?=$popup_row[leftMargin]?>px;top:<?=$popup_row[topMargin]?>;z-index:2000;">
			<form name="notice_form<?=$i?>">
			<table border="0" align="center" width="<?=$popup_row[width]?>" height="<?=$popup_row[height]?>" cellpadding="0" cellspacing="0" style="border:1px #666666 solid;background-color:#FFFFFF;">
			<tr>
				<td valign="top"><?if($popup_row[url]){?><a href="javascript:closeGo<?=$i?>('<?=$popup_row[url]?>')"><?}?><?=$popup_row[content]?></a></td>
			</tr>
			<tr>
				<td height="20" align="right"><input type="checkbox" name="popup_end" value="checkbox" onClick="closeWin<?=$i?>();" id="div_pop_close<?=$i?>" /> <span style="color:#6e6e6e;">오늘 하루 이 창을 열지 않음&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onClick="close_pop<?=$i?>();">[닫기]</a></span>&nbsp;&nbsp;</td>
			</tr>
			</table>		
			</form>
		</div>
		<script language="Javascript">
		<!--
		cookiedata = document.cookie;    
		if( cookiedata.indexOf("<?=$COOKIE_NAME?>=done") < 0 ){      
			document.all['divpop<?=$i?>'].style.visibility = "visible"; 
		}else { 
			document.all['divpop<?=$i?>'].style.visibility = "hidden"; 
		}				
		//-->
		</script>		
	<?}
	}
	
	}
	
$i++;
}?>
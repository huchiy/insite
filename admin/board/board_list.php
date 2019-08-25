<?include "../common/head.php";?>

<?
$PageURL="$PHP_SELF?$para_url&page=$page";

$table_name="wk_board_config";

if($Query=="AllDelete"){//체크삭제.
	for($i=0;$i<sizeof($check) ;$i++ ){
		if($check[$i]){
			query("delete from $table_name where idx='$check[$i]'");
		}
	}
	go("$PageURL");
}else if($Query=="delete"){//삭제.
	query("delete from $table_name where idx='$idx'");
	go("$PageURL");
}



/*
*	리스트 페이지
*/
if($mode=="search") {	// 검색
	if($key) {$sear_char="and $keyfield like '%$key%'";}		
}
$query="select * from $table_name where (1=1) $sear_char";
$result_t=query($query);
$total_record=num_rows($result_t);	 // 총 데이터
$ListNumber=100;	 // 한 페이지 리수트 수
$total_page=ceil($total_record/$ListNumber);

if (!$page){$page=1;} 
if($total_page==0){	 //총 페이지가 없을 경우.
	$first=0;
	$last=0;
}else{
	$first=($page-1)*$ListNumber;	 //페이지의 출력할 첫번째 레코드를 지정.
	$last=$page*$ListNumber;		//다음 페이지의 출력할 첫번째 레코드 지정.
}
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
function Js_ck(formGb) {
	var frm=document.ListForm;
	var Ck="";
	len=frm["check[]"].length;
	if(!len){ 
		if(frm["check[]"].checked){ Ck="Y"; }
	}else{
		for(i=0; i<len; i++){
			if(frm["check[]"][i].checked){ Ck="Y"; }
		}
	}
	if(Ck != "Y"){ alert("체크를 하나 이상 하세요."); return false; }
	else {//하나이상 체크하면...
		if(formGb=="delete"){//선택삭제.
			if(confirm("정말 삭제하시겠습니까?")){
				frm.action='<?="{$PHP_SELF}?$para_url&Query=AllDelete";?>';
				frm.submit();
			}else {return false;}				
		}
	}
}
//-->
</SCRIPT>
<!-- Top 영역 -->

<body class="nav-md">
<div class="container body">
		<div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <br/>
								<?include "../common/sidebar.php";?>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle" style="width: 200px;">
                        <a id="menu_toggle">PayKhan App ADMIN</a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                ETH 시세 0 / w 0
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="title_left col-md-6 col-sm-6 col-xs-6">
                                <h2>게시판설정</h2>
                            </div>

                            <div class="title_right col-md-6 col-sm-6 col-xs-6" style="text-align: right;">
																<input type="button" value="삭 제" class="btn btn-default" onClick="Js_ck('delete');" />
																<input type="button" value="추 가" class="btn btn-default" onClick="location.replace('<?="board_write.html?$para_url";?>');" />
                            </div>

                            <div class="x_content">
                                <br/>
                                <table class="table">
                                    <thead>
																		<tr>
																			<th width="3%" scope="col"><input type="checkbox" name="checkALL" onClick="listChk(this.form)" style="border:0;"></th>
																			<th width="5%" scope="col">No</th>
																			<th width="13%" scope="col">TABLE</th>
																			<th width="15%" scope="col">게시판명</th>
																			<th width="15%" scope="col">스킨</th>
																			<th width="8%" scope="col">데이터수</th>
																			<th width="7%" scope="col">답변</th>
																			<th width="7%" scope="col">댓글</th>
																			<th width="7%" scope="col">비밀</th>
																			<th width="8%" scope="col">카테고리</th>
																			<th width="12%" scope="col">관리</th>
																		</tr>
                                    </thead>
                                    <tbody>
																		
<?
	$article_num=$total_record - $ListNumber*($page-1);
	$result=query($query." order by sort_num asc, idx desc limit $first,$ListNumber");
	while ($rows=fetch_array($result)){
		if(strstr($rows[tb_name],"ski_")){$bbs_g="스키 - ";}
		else if(strstr($rows[tb_name],"golf_")){$bbs_g="골프 - ";}
		$ck["Y"]="<font color='#3300ff'>사용</font>";
		// 게시글 등록 개수
		$bbs_n=bbs_num_var($rows[tb_name]);
		// 카테고리관리
		$bbsCate="onClick=\"openWindow('board_category.html?tb_nm=$rows[tb_name]','boardCate','350','400','yes','no')\"";
		// 수정
		$modifyAt="board_write.html?$para_url&idx=$rows[idx]";
		// 보기
		//$bbsView="onClick=\"openWindow('board_pop.html?tb_name=$rows[tb_name]','boardView','800','700','yes','yes')\"";
		$bbsView="onClick=\"openWindow('{$dc_url}bbs/admin_bbs.php?b_idx=$rows[idx]','boardView','1000','800','yes','yes')\"";
		// 삭제
		$del="onClick=\"if(confirm('정말 삭제 하시겠습니까?')) location.href('{$PageURL}&Query=delete&idx=$rows[idx]');\"";?>
											
            <tr onmouseover="this.style.backgroundColor='#EBEEF5';" onmouseout="this.style.backgroundColor='';">
              <td><input type="checkbox" name="check[]" value="<?=$rows[idx]?>" style="border:0;"></td>
              <td><?=$article_num?></td>
              <td><?=$rows[tb_name]?></td>
              <td><a href="<?=$modifyAt?>" style="color:#0080c0"><?=$bbs_g.$rows[bbs_name]?></a></td>
              <td><?=$rows[bbs_skin]?></td>
              <td><?=number_format($bbs_n);?></td>
              <td><?=$ck[$rows[reply_ck]];?></td>
              <td><?=$ck[$rows[recom_ck]];?></td>
              <td><?=$ck[$rows[secret_ck]];?></td>
              <td><?=$ck[$rows[category_ck]];?></td>
              <td><a href="<?="board_ct_write.html?$para_url&tb_nm=$rows[tb_name]";?>" style="padding:2px 3px;" class="blue_btn">카테고리</a></td>
            </tr>

<?
	$article_num--;
	}?>



                                    </tbody>
                                </table>
																<?include "../common/pages.php";?>	
	  <p style="float:right;">Showing <?=$article_num+1?> to <?=$i?> of <?=$total_record?> (<?=$total_page?> Pages)</p>

                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- /page content -->

				<?include "../common/footer.php";?>

    </div>
</div>

</body>
</html>
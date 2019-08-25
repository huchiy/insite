<?include "../common/head.php";?>

<style>
.table tbody tr td{vertical-align:middle;}
</style>

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
				<?include "../common/top.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <h2>오늘의 인사이트</h2>

                            <div class="x_content">
                                <br />
																<form name="ListForm" action="todayinsite_ok.php" method="post" target="db_frame">
																<input type="hidden" name="Query" value="sort_update">
																<input type="hidden" name="page" value="<?=$page?>">

                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                        <tr class="headings">
                                            <th class="column-title " style="text-align: center;" colspan="7">인사이터</th>
                                        </tr>
                                        <tr class="headings">
                                            <th class="column-title " style="text-align: center;width:50px;">no</th>
                                            <th class="column-title " style="text-align: center;width:100px;">사진</th>
                                            <th class="column-title " style="text-align: center;width:500px;">제목</th>
                                            <th class="column-title " style="text-align: center;">이메일</th>
                                            <th class="column-title " style="text-align: center;">등록일</th>
                                            <th class="column-title no-link last "
                                                style="text-align: center; width: 220px;"><span class="nobr">순서</span>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>

<?
$table_name="Pka_Recommend";

if($mode=="search"){
	if($search_user_name){$sear_char.=" and user_name like '%$search_user_name%'";}
	if($search_hp){$sear_char.=" and user_name like '%$search_hp%'";}
	if($search_birth1){$sear_char.=" and user_name like '%$search_birth1%'";}
	if($search_from_reg_date) $sear_char.=" and reg_date>='$search_from_reg_date' ";
	if($search_to_reg_date) $sear_char.=" and reg_date<='$search_to_reg_date' ";
}
$sear_char = " and PU_kind='insiter'";
$sortAll="PU_sortnum asc";

$query="select * from $table_name where (1=1) $sear_char";
$result_t=query($query);
$total_record=num_rows($result_t);	 // 총 데이터
$ListNumber=15;	 // 한 페이지 리수트 수
$total_page=ceil($total_record/$ListNumber);

if (!$page){$page=1;} 
if($total_page==0){	 //총 페이지가 없을 경우.
	$first=0;
	$last=0;
}else{
	$first=($page-1)*$ListNumber;	 //페이지의 출력할 첫번째 레코드를 지정.
	$last=$page*$ListNumber;		//다음 페이지의 출력할 첫번째 레코드 지정.
}?>

<?$article_num=$total_record - $ListNumber*($page-1);
	$result=query($query." order by $sortAll limit $first,$ListNumber");
	while ($rows=fetch_array($result)){
		$rows_userinfo = f_array("select * from Pka_User where PU_idx = '$rows[PU_idx]'");
		$Pfiles=explode("/",$rows_userinfo[PU_files]);
		$img_u="../../files/tmpimage/";
		if($Pfiles[1]){
			$img_s=@getimagesize($img_u.$Pfiles[1]);
			$width=$img_s[0];
			$height=$img_s[1];
			if($width>$height){$WH_size="style='max-width:100px;'";}
			else {$WH_size="style='max-height:100px;'";}
			$profile_img="<img src='{$img_u}$Pfiles[1]' $WH_size border='0'>";
		}else {$profile_img="";}
		//할당
		$partView="onClick=\"openWindow('member_part_view.html?user_id=$rows[user_id]','partView','250','350','yes','no')\"";
		//보기
		if($_SESSION[adm_level]<3 || $_SESSION[p_id]==$rows[user_id]){
			$view="collection.php?$para_url&page=$page&PU_idx=$rows[PU_idx]&$mb_bbs_url";
		}else {$view="#a";}		
		if($rows[user_level]==10){$lt_bg="#fff4f5";}	// 탈퇴
		else if($rows[state] == "N"){$lt_bg="#e6f0ec";}	// 회원가입 미완료
		else {$lt_bg="";}?>
										 <tr class="even pointer cls_<?=$article_num?>" bgcolor="<?=$lt_bg?>" onmouseover="this.style.backgroundColor='#EBEEF5';" onmouseout="this.style.backgroundColor='<?=$lt_bg?>';">
											<!-- <td><input type="checkbox" name="check[]" value="<?=$rows[idx]?>"></td> -->
											<td  style="text-align: center;"><?=$article_num?></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?
												if($Pfiles[1]){
													$img_Name = imgName($Pfiles[1]); //파일명
													echo "<img src='/files/userinfo_thumb/{$img_Name}.thumb' border='0' style='width:50px;height:50px;'/>";
												}else{
													echo "<img src='/assets/images/temp_img/temp_01.jpg' border='0' style='width:50px;height:50px;'>";
												}
											?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows_userinfo[PU_name]?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows[PU_email]?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows[PU_joindate]?></a></td>
											<td><input type="text" name="insiter_sort_num<?=$rows[PR_idx]?>" size="5"  value="<?=$rows[PU_sortnum]?>" style="text-align:center;"><a onClick="activeBtn('todayinsite_ok','<?=$rows[PR_idx]?>','insiter_sort_update');" style="padding:3px 5px;cursor:pointer;border:1px solid #0096d8;" class="blue_btn5">변경</a><a onClick="activeBtn('todayinsite_ok','<?=$rows[PR_idx]?>','insiter_delete');" style="padding:3px 5px;cursor:pointer;border:1px solid #0096d8;" class="blue_btn5">삭제</a></td>
										 </tr>
<?$article_num--;
																			}?>
                                        </tbody>
                                    </table>
																<!-- <?include "../common/pages.php";?>	 -->
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                        <tr class="headings">
                                            <th class="column-title " style="text-align: center;" colspan="7">콜렉션</th>
                                        </tr>
                                        <tr class="headings">
                                            <th class="column-title " style="text-align: center;width:50px;">no</th>
                                            <th class="column-title " style="text-align: center;width:100px;">사진</th>
                                            <th class="column-title " style="text-align: center;width:500px;">제목</th>
                                            <th class="column-title " style="text-align: center;">이메일</th>
                                            <th class="column-title " style="text-align: center;">등록일</th>
                                            <th class="column-title no-link last "
                                                style="text-align: center; width: 220px;"><span class="nobr">순서</span>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>

<?
$table_name="Pka_Recommend";

if($mode=="search"){
	if($search_user_name){$sear_char.=" and user_name like '%$search_user_name%'";}
	if($search_hp){$sear_char.=" and user_name like '%$search_hp%'";}
	if($search_birth1){$sear_char.=" and user_name like '%$search_birth1%'";}
	if($search_from_reg_date) $sear_char.=" and reg_date>='$search_from_reg_date' ";
	if($search_to_reg_date) $sear_char.=" and reg_date<='$search_to_reg_date' ";
}
$sear_char = " and PU_kind='collection'";
$sortAll="PU_sortnum asc";

$query="select * from $table_name where (1=1) $sear_char";
$result_t=query($query);
$total_record=num_rows($result_t);	 // 총 데이터
$ListNumber=15;	 // 한 페이지 리수트 수
$total_page=ceil($total_record/$ListNumber);

if (!$page){$page=1;} 
if($total_page==0){	 //총 페이지가 없을 경우.
	$first=0;
	$last=0;
}else{
	$first=($page-1)*$ListNumber;	 //페이지의 출력할 첫번째 레코드를 지정.
	$last=$page*$ListNumber;		//다음 페이지의 출력할 첫번째 레코드 지정.
}?>

<?$article_num=$total_record - $ListNumber*($page-1);
	$result=query($query." order by $sortAll limit $first,$ListNumber");
	while ($rows=fetch_array($result)){
		$rows_collection = f_array("select * from Pka_Collection where PU_idx = '$rows[PU_idx]'");
		$Pfiles=explode("/",$rows_collection[PU_files]);
		$img_u="../../files/tmpimage/";
		if($Pfiles[1]){
			$img_s=@getimagesize($img_u.$Pfiles[1]);
			$width=$img_s[0];
			$height=$img_s[1];
			if($width>$height){$WH_size="style='max-width:100px;'";}
			else {$WH_size="style='max-height:100px;'";}
			$profile_img="<img src='{$img_u}$Pfiles[1]' $WH_size border='0'>";
		}else {$profile_img="";}
		//할당
		$partView="onClick=\"openWindow('member_part_view.html?user_id=$rows[user_id]','partView','250','350','yes','no')\"";
		//보기
		if($_SESSION[adm_level]<3 || $_SESSION[p_id]==$rows[user_id]){
			$view="collection.php?$para_url&page=$page&PU_idx=$rows[PU_idx]&$mb_bbs_url";
		}else {$view="#a";}		
		if($rows[user_level]==10){$lt_bg="#fff4f5";}	// 탈퇴
		else if($rows[state] == "N"){$lt_bg="#e6f0ec";}	// 회원가입 미완료
		else {$lt_bg="";}?>
										 <tr class="even pointer cls_<?=$article_num?>" bgcolor="<?=$lt_bg?>" onmouseover="this.style.backgroundColor='#EBEEF5';" onmouseout="this.style.backgroundColor='<?=$lt_bg?>';">
											<!-- <td><input type="checkbox" name="check[]" value="<?=$rows[idx]?>"></td> -->
											<td  style="text-align: center;"><?=$article_num?></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?
												if($Pfiles[1]){
													$img_Name = imgName($Pfiles[1]); //파일명
													echo "<img src='/files/collection_thumb/{$img_Name}.thumb' border='0' style='width:50px;height:50px;'/>";
												}else{
													echo "<img src='/assets/images/temp_img/temp_01.jpg' border='0' style='width:50px;height:50px;'>";
												}
											?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows_collection[PU_subject]?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows[PU_email]?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows[PU_joindate]?></a></td>
											<td><input type="text" name="collection_sort_num<?=$rows[PR_idx]?>" size="5"  value="<?=$rows[PU_sortnum]?>" style="text-align:center;"><a onClick="activeBtn('todayinsite_ok','<?=$rows[PR_idx]?>','collection_sort_update');" style="padding:3px 5px;cursor:pointer;border:1px solid #0096d8;" class="blue_btn5">변경</a><a onClick="activeBtn('todayinsite_ok','<?=$rows[PR_idx]?>','collection_delete');" style="padding:3px 5px;cursor:pointer;border:1px solid #0096d8;" class="blue_btn5">삭제</a></td>
										 </tr>
<?$article_num--;
																			}?>
                                        </tbody>
                                    </table>
																<!-- <?include "../common/pages.php";?>	 -->
                                </div>

                                <br />
                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                        <tr class="headings">
                                            <th class="column-title " style="text-align: center;" colspan="7">북마크</th>
                                        </tr>
                                        <tr class="headings">
                                            <th class="column-title " style="text-align: center;width:50px;">no</th>
                                            <th class="column-title " style="text-align: center;width:100px;">사진</th>
                                            <th class="column-title " style="text-align: center;width:500px;">제목</th>
                                            <th class="column-title " style="text-align: center;">이메일</th>
                                            <th class="column-title " style="text-align: center;">등록일</th>
                                            <th class="column-title no-link last "
                                                style="text-align: center; width: 220px;"><span class="nobr">순서</span>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
																				<?
$table_name="Pka_Recommend";

if($mode=="search"){
	if($search_user_name){$sear_char.=" and user_name like '%$search_user_name%'";}
	if($search_hp){$sear_char.=" and user_name like '%$search_hp%'";}
	if($search_birth1){$sear_char.=" and user_name like '%$search_birth1%'";}
	if($search_from_reg_date) $sear_char.=" and reg_date>='$search_from_reg_date' ";
	if($search_to_reg_date) $sear_char.=" and reg_date<='$search_to_reg_date' ";
}
$sear_char = " and PU_kind='bookmark'";
$sortAll="PU_sortnum asc";

$query="select * from $table_name where (1=1) $sear_char";
$result_t=query($query);
$total_record=num_rows($result_t);	 // 총 데이터
$ListNumber=15;	 // 한 페이지 리수트 수
$total_page=ceil($total_record/$ListNumber);

if (!$page){$page=1;} 
if($total_page==0){	 //총 페이지가 없을 경우.
	$first=0;
	$last=0;
}else{
	$first=($page-1)*$ListNumber;	 //페이지의 출력할 첫번째 레코드를 지정.
	$last=$page*$ListNumber;		//다음 페이지의 출력할 첫번째 레코드 지정.
}?>
<?$article_num=$total_record - $ListNumber*($page-1);
	$result=query($query." order by $sortAll limit $first,$ListNumber");
	while ($rows=fetch_array($result)){
		$rows_bookmark = f_array("select * from Pka_Bookmark where PB_idx = '$rows[PB_idx]'");
		$Pfiles=explode("/",$rows_collection[PU_files]);
		$img_u="../../files/tmpimage/";
		if($Pfiles[1]){
			$img_s=@getimagesize($img_u.$Pfiles[1]);
			$width=$img_s[0];
			$height=$img_s[1];
			if($width>$height){$WH_size="style='max-width:100px;'";}
			else {$WH_size="style='max-height:100px;'";}
			$profile_img="<img src='{$img_u}$Pfiles[1]' $WH_size border='0'>";
		}else {$profile_img="";}
		//할당
		$partView="onClick=\"openWindow('member_part_view.html?user_id=$rows[user_id]','partView','250','350','yes','no')\"";
		//보기
		if($_SESSION[adm_level]<3 || $_SESSION[p_id]==$rows[user_id]){
			$view="collection.php?$para_url&page=$page&PU_idx=$rows[PU_idx]&$mb_bbs_url";
		}else {$view="#a";}		
		if($rows[user_level]==10){$lt_bg="#fff4f5";}	// 탈퇴
		else if($rows[state] == "N"){$lt_bg="#e6f0ec";}	// 회원가입 미완료
		else {$lt_bg="";}?>
										 <tr class="even pointer cls_<?=$article_num?>" bgcolor="<?=$lt_bg?>" onmouseover="this.style.backgroundColor='#EBEEF5';" onmouseout="this.style.backgroundColor='<?=$lt_bg?>';">
											<!-- <td><input type="checkbox" name="check[]" value="<?=$rows[idx]?>"></td> -->
											<td  style="text-align: center;"><?=$article_num?></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?
												if($Pfiles[1]){
													$img_Name = imgName($Pfiles[1]); //파일명
													echo "<img src='/files/bookmark_thumb/{$img_Name}.thumb' border='0' style='width:50px;height:50px;'/>";
												}else{
													echo "<img src='/assets/images/temp_img/temp_01.jpg' border='0' style='width:50px;height:50px;'>";
												}
											?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows_bookmark[PU_subject]?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows[PU_email]?></a></td>
											<td><a href="<?=$view?>" style="color:#0080c0"><?=$rows[PU_joindate]?></a></td>
											<td><input type="text" name="bookmark_sort_num<?=$rows[PR_idx]?>" size="5"  value="<?=$rows[PU_sortnum]?>" style="text-align:center;"><a onClick="activeBtn('todayinsite_ok','<?=$rows[PR_idx]?>','bookmark_sort_update');" style="padding:3px 5px;cursor:pointer;border:1px solid #0096d8;" class="blue_btn5">변경</a><a onClick="activeBtn('todayinsite_ok','<?=$rows[PR_idx]?>','bookmark_delete');" style="padding:3px 5px;cursor:pointer;border:1px solid #0096d8;" class="blue_btn5">삭제</a></td>
										 </tr>
<?$article_num--;
																			}?>
                                        </tbody>
                                    </table>
																<!-- <?include "../common/pages.php";?>	 -->
                                </div>
																</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">

            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

				<?include "../common/footer.php";?>
</body>
</html>
<?include "../common/head.php";?>

<?
$table_name="Pka_User_K2K9_POINT";

if($mode=="search"){
	if($search_user_name){$sear_char.=" and user_name like '%$search_user_name%'";}
	if($search_hp){$sear_char.=" and user_name like '%$search_hp%'";}
	if($search_birth1){$sear_char.=" and user_name like '%$search_birth1%'";}
	if($search_from_reg_date) $sear_char.=" and reg_date>='$search_from_reg_date' ";
	if($search_to_reg_date) $sear_char.=" and reg_date<='$search_to_reg_date' ";
}

//$sear_char.=" and PU_sortnum = '$max_sortnum' ";
$sortAll="PU_joindate desc";

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
                                <h2>K2K9 회원 포인트 업로드 리스트</h2>
                            </div>

                            <div class="title_right col-md-6 col-sm-6 col-xs-6" style="text-align: right;">
                                <button class="btn btn-default" type="button" style="color: #73879C;" onclick="location.href='k2k9point_excel.php'">K2K9 회원 포인트 업로드 등록</button>
                            </div>

                            <div class="x_content">
                                <br/>
                                <table class="table">
                                    <thead>
										<tr>
											<!-- <th width="3%" scope="col"><input type="checkbox" name="checkALL" onClick="listChk(this.form)"></th> -->
											<th width="5%" scope="col">no</th>
											<th width="5%" scope="col">적용유무</th>
											<th width="10%" scope="col">아이디</th>
											<th width="5%" scope="col">이름</th>
											<th width="10%" scope="col">휴대폰</th>
											<th width="10%" scope="col">포인트내역</th>
											<th width="10%" scope="col">포인트</th>
											<th width="10%" scope="col">락업포인트내역</th>
											<th width="10%" scope="col">락업포인트</th>
											<th width="10%" scope="col">업로드날짜</th>
										</tr>
                                    </thead>
                                    <tbody>
																		
<?$article_num=$total_record - $ListNumber*($page-1);
	$result=query($query." order by $sortAll limit $first,$ListNumber");
	while ($rows=fetch_array($result)){
		$Pfiles=explode("/",$rows[files]);
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
			$view="contact_us_view.html?$para_url&page=$page&idx=$rows[idx]&$mb_bbs_url";
		}else {$view="#a";}		
		if($rows[user_level]==10){$lt_bg="#fff4f5";}	// 탈퇴
		else if($rows[state] == "N"){$lt_bg="#e6f0ec";}	// 회원가입 미완료
		else {$lt_bg="";}?>
											
										 <tr class="cls_<?=$article_num?>" bgcolor="<?=$lt_bg?>" onmouseover="this.style.backgroundColor='#EBEEF5';" onmouseout="this.style.backgroundColor='<?=$lt_bg?>';">
											<!-- <td><input type="checkbox" name="check[]" value="<?=$rows[idx]?>"></td> -->
											<td  style="text-align: center;"><?=$article_num?></td>
											<td><?=$rows[PU_liveck]?></td>
											<td><?=$rows[PU_userid]?></td>
											<td><?=$rows[PU_name]?></td>
											<td><?=$rows[PU_phone]?></td>
											<td><?=$rows[PU_Point1_Memo]?></td>
											<td><?=$rows[PU_Point1]?></td>
											<td><?=$rows[PU_Point2_Memo]?></td>
											<td><?=$rows[PU_Point2]?></td>
											<td><?=$rows[PU_joindate]?></td>
										 </tr>
<?$article_num--;
}?>



                                    </tbody>
                                </table>
																<?include "../common/pages.php";?>	

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
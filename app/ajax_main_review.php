<?include "db_conn.php";
include "lib.query.php";
include "lib.string.php";?>
<ul class="notice_tab">
   <!-- tab_on 넣으면 탭 활성화 -->
  <li class="<?if($bbs=="notice"){?>tab_on<?}?>"><a <?if($bbs=="notice"){?>href="./contents/notice.html"<?}else{?>href="#c" onclick="main_review('notice');" onmouseover="main_review('notice');"<?}?>>공지사항</a></li>
  <li class="<?if($bbs=="info"){?>tab_on<?}?>"><a <?if($bbs=="info"){?>href="./contents/info.html"<?}else{?>href="#c" onclick="main_review('info');" onmouseover="main_review('info');"<?}?>>정보마당</a></li>
</ul>
<?if($bbs=="notice"){?>
	<div class="moreBtn notice_bbs"><a href="./contents/notice.html"><img src="images/main/btn_more.gif" width="18" height="18" alt="더보기" /></a></div>
	 <ul class="notice_list notice_bbs" id='notice_bbs'>
	<? $notice_result=query("select * from wk_bbs_notice where view_ck='Y' order by reg_date desc limit 0,4");
		 for($i=0;$i<$notice_rows=fetch_array($notice_result) ;$i++ ){
		//태그제거내용
		$subject=strip_tags($notice_rows[subject]);
		$subject=strcut_utf8($subject,35);
		 $ViAction="notice.html?tb_name=notice&bbs_section=view&Ctg=&page=1&idx=$notice_rows[idx]";
		 	//오늘쓴글은 시간으로 오늘이 지나면 날짜로 출력.
			$dt_ymd=substr($notice_rows[date_tm],0,10);
			$dt_his=substr($notice_rows[date_tm],11,5);
			if($dt_ymd==$date){$Dtime=$dt_his;}
			else {$Dtime=str_replace("-",".",$dt_ymd);}
		 if($subject){?>
			<li><a href="<?=$pgUp?>contents/<?=$ViAction?>"><?=$subject?></a><span><?=$Dtime?></span></li>
		 <?}else{?>
			<li><a href="#c">자료가 없습니다.</li>
		 <?}?>
	<?}?>
    </ul>
<?}else if($bbs=="info"){?>
	<div class="moreBtn info_bbs"><a href="./contents/info.html"><img src="images/main/btn_more.gif" width="18" height="18" alt="더보기" /></a></div>
	  <ul class="notice_list info_bbs" id='info_bbs' >
	<? $notice_result=query("select * from wk_bbs_info where view_ck='Y' order by reg_date desc limit 0,4");
		 for($i=0;$i<$notice_rows=fetch_array($notice_result) ;$i++ ){
		//태그제거내용
		$subject=strip_tags($notice_rows[subject]);
		$subject=strcut_utf8($subject,35);
		 $ViAction="info.html?tb_name=info&bbs_section=view&Ctg=&page=1&idx=$notice_rows[idx]";
		 	//오늘쓴글은 시간으로 오늘이 지나면 날짜로 출력.
			$dt_ymd=substr($notice_rows[date_tm],0,10);
			$dt_his=substr($notice_rows[date_tm],11,5);
			if($dt_ymd==$date){$Dtime=$dt_his;}
			else {$Dtime=str_replace("-",".",$dt_ymd);}
		 if($subject){?>
			<li><a href="<?=$pgUp?>contents/<?=$ViAction?>"><?=$subject?></a><span><?=$Dtime?></span></li>
		 <?}else{?>
			<li><a href="#">자료가 없습니다.</</li>
		 <?}?>
	<?}?>
    </ul>
<?}?>


  
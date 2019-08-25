<ul class="pagination">
<?if(!$blockNum) $blockNum=10;
	if($total_record !=0){	//게시물 있을때

		//페이지의 나타날 블럭을 10개로 지정.
		$total_block=ceil($total_page/$blockNum);	//총 블럭.
		$block=ceil($page/$blockNum);					//현재 블럭.
		$first_page=($block-1)*$blockNum;				//현재 블럭의 첫 페이지.
		$last_page=$block*$blockNum;					//다음 블럭의 첫 페이지.

		//레코드 없는 블럭이 만들어 지지 않게 함.
		if($block>=$total_block){
			$last_page=$total_page;	
		}

		$first_block="처음페이지";												// 처음 링크명.
		$prev_block="<img src='../images/board/pageBtn_prev.gif' width='24' height='24' alt='이전' />";		
		$next_block="<img src='../images/board/pageBtn_next.gif' width='24' height='24' alt='다음' />";											// 다음 링크명.
		$last_block="마지막페이지";											// 마지막 링크명.
		$pageVal="$PHP_SELF?tb_name=$tb_name&bbs_section=$bbs_section&mode=$mode&keyfield=$keyfield&key=$key&Ctg=$Ctg&idx=$idx&order_code=$order_code&search_class_name=$search_class_name&view_ck=$view_ck&page=";		


		// 처음 페이지
//		$pageBlock = $left_td;
//		if ($page=="1") {
//			$pageBlock .= "<a href='#a' class='first'><span class='blind'>".$first_block."</span></a>";
//		}else {
//			$pageBlock .= "<a href='".$pageVal."1' class='first'><span class='blind'>".$first_block."</span></a>";
//		}
		
		// 이전10페이지
//		$pageBlock .= $left_td;
//		if($block>1){
//			$next_page=$first_page;
//			$pageBlock .= "<li><a href='".$pageVal.$next_page."'></a></li>";
//		}else{
//			$pageBlock .= "<li><a href='#a' class='prev'></a></li>";
//		}

		// 이전 페이지
		$pageBlock .= $left_td;
		if ($page=="1") {
			$pageBlock .= "<li><a href='#a' class='prev'>".$prev_pg."</a></li>";
		}else {
			$pg=$page-1;
			$pageBlock .= "<li><a href='".$pageVal.$pg."' class='prev'>".$prev_pg."</a></li>";
		}


		//블럭([1][2]...) 출력부분.
		for($direct_page=$first_page+1;$direct_page<=$last_page;$direct_page++){
			if($page==$direct_page){
				$pageBlock .= "<li><a href='#a' class='on'>".$direct_page."</a></li>";
			}else{
				$pageBlock .= "<li><a href='".$pageVal.$direct_page."'>".$direct_page."</a></li>";
			}
		}


		// 다음 페이지
		$pageBlock .= $right_td;
		if ($page==$total_page) {
			$pageBlock .= "<li><a href='#a' class='next'>".$next_pg."</a></li>";
		}else {
			$pg=$page+1;
			$pageBlock .= "<li><a href='".$pageVal.$pg."' class='next'>".$next_pg."</a></li>";
		}

		// 다음10페이지
//		$pageBlock .= $right_td;
//		if($block<$total_block){
//			$next_page=$last_page+1;
//			$pageBlock .= "<li><a href='".$pageVal.$next_page."'></a></li>";
//		}else{
//			$pageBlock .= "<li><a href='#a' class='next'></a></li>";
//		}

		// 마지막 페이지
//		$pageBlock .= $right_td;
//		if ($page==$total_page) {
//			$pageBlock .= "<a href='#a' class='last'><span class='blind'>".$last_block."</span></a>";
//		}else {
//			$pageBlock .= "<a href='".$pageVal.$total_page."' class='last'><span class='blind'>".$last_block."</span></a>";
//		}

		echo $pageBlock;

	}else{	//게시물 X?>
			&nbsp;
<?}?>
</ul>
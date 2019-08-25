<?include "../../app/inc_head.php";

$table_name="Pka_Recommend";

if($Query=="insert") {	// 등록
}else if($Query=="update"){	// 수정


	query("UPDATE $table_name SET PC_hanprice ='$PC_hanprice_post' , PC_paykhan = '$PC_paykhan_post' WHERE PC_idx='1'");
	f_go("paykhan_management");



}else if($Query=="today_insiter"){	// 오늘의 인사이트 인사이터
	

	$rows_recommend = f_array("select * from $table_name where PU_kind ='insiter' and PU_idx = '$PU_idx' order by PU_sortnum asc");
	$rows_userinfo = f_array("select * from Pka_User where PU_idx = '$PU_idx' order by PU_joindate asc");

	if($rows_recommend){// 이미 등록되어있음
		f_alert("오늘의인사이트에 이미 등록되어있습니다.","insiter_list.php");
	}else{
		$PU_kind = 'insiter';
		$PB_idx = '0';
		$PU_sortnum = '4';
		query("INSERT INTO $table_name ( PU_email , PU_idx , PB_idx , PU_kind , token_val , PU_sortnum , PU_joindate) VALUES ( '$rows_userinfo[PU_email]' , '$PU_idx' , '$PB_idx' , '$PU_kind' , '$rows_userinfo[token_val]' , '$PU_sortnum' , now())");

		f_alert("오늘의인사이트에 등록되었습니다.","insiter_list.php");
	}


}else if($Query=="today_collection"){	// 오늘의 인사이트 컬렉션
	

	$rows_recommend = f_array("select * from $table_name where PU_kind ='collection' and PU_idx = '$PU_idx' order by PU_sortnum asc");
	$rows_collection = f_array("select * from Pka_Collection where PU_idx = '$PU_idx' order by PU_joindate asc");

	if($rows_recommend){// 이미 등록되어있음
		f_alert("오늘의인사이트에 이미 등록되어있습니다.","collection_list.php");
	}else{
		$PU_kind = 'collection';
		$PB_idx = '0';
		$PU_sortnum = '4';
		query("INSERT INTO $table_name ( PU_email , PU_idx , PB_idx , PU_kind , token_val , PU_sortnum , PU_joindate) VALUES ( '$rows_collection[PU_email]' , '$PU_idx' , '$PB_idx' , '$PU_kind' , '$rows_collection[token_val]' , '$PU_sortnum' , now())");

		f_alert("오늘의인사이트에 등록되었습니다.","collection_list.php");
	}


}else if($Query=="today_bookmark"){	// 오늘의 인사이트 북마크
	
	$PB_idx = $PU_idx;
	$rows_recommend = f_array("select * from $table_name where PU_kind ='bookmark' and PB_idx = '$PB_idx' order by PU_sortnum asc");
	$rows_bookmark = f_array("select * from Pka_Bookmark where PB_idx = '$PB_idx' order by PU_joindate asc");

	if($rows_recommend){// 이미 등록되어있음
		f_alert("오늘의인사이트에 이미 등록되어있습니다.","bookmark_list.php");
	}else{
		$PU_kind = 'bookmark';
		$PU_idx = '0';
		$PU_sortnum = '8';
		query("INSERT INTO $table_name ( PU_email , PU_idx , PB_idx , PU_kind , token_val , PU_sortnum , PU_joindate) VALUES ( '$rows_bookmark[PU_email]' , '$PU_idx' , '$PB_idx' , '$PU_kind' , '$rows_bookmark[token_val]' , '$PU_sortnum' , now())");

		f_alert("오늘의인사이트에 등록되었습니다.","bookmark_list.php");
	}


}else if($Query=="insiter_sort_update"){	// 인사이터 순서변경

	$PU_sortnum = ${'insiter_sort_num'.$PU_idx};
	query("UPDATE $table_name SET PU_sortnum ='$PU_sortnum' WHERE PU_kind = 'insiter' and PR_idx='$PU_idx'");
	f_alert("오늘의인사이트에 순서가 변경되었습니다.","recommend.php");



}else if($Query=="collection_sort_update"){	// 컬렉션 순서변경

	$PU_sortnum = ${'collection_sort_num'.$PU_idx};
	query("UPDATE $table_name SET PU_sortnum ='$PU_sortnum' WHERE PU_kind = 'collection' and PR_idx='$PU_idx'");
	f_alert("오늘의인사이트에 순서가 변경되었습니다.","recommend.php");


}else if($Query=="bookmark_sort_update"){	// 북마크 순서변경

	$PU_sortnum = ${'bookmark_sort_num'.$PU_idx};
	query("UPDATE $table_name SET PU_sortnum ='$PU_sortnum' WHERE PU_kind = 'bookmark' and PR_idx='$PU_idx'");
	f_alert("오늘의인사이트에 순서가 변경되었습니다.","recommend.php");



}else if($Query=="delete"){	// 메인에서 삭제

	query("delete from $table_name where PR_idx='$PU_idx'");
	f_alert("오늘의인사이트에 삭제되었습니다.","recommend.php");

}
?>

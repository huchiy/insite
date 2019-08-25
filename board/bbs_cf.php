<?
/******************************

			게시판설정

*******************************/

if($tb_name){$bbs_gb=" tb_name='$tb_name'";}
else if($b_idx){$bbs_gb=" idx='$b_idx'";}
$config_rows=f_array("select * from wk_board_config where $bbs_gb");
$tb_name=$config_rows[tb_name];				// 게시판코드
$bbs_name=$config_rows[bbs_name];			// 게시판명
$bbs_skin=$config_rows[bbs_skin];				// 게시판스킨
$category_ck=$config_rows[category_ck];		// 카테고리 사용유무
$tb_width=$config_rows[bbs_width];				// 게시판 width값
$listNum=$config_rows[listNum];					// 게시글출력수
$sub_cut=$config_rows[sub_cut];					// 제목길이
$cnt_cut=$config_rows[cnt_cut];						// 내용길이
$picWidthNum=$config_rows[picWidthNum];	// 가로사진개수
$blockNum=$config_rows[blockNum];				// 페이지블럭수
$fileNum=$config_rows[fileNum];					// 첨부파일수
$filesSize=$config_rows[file_size];					// 첨부사이즈
$upfile_ck=$config_rows[upfile_ck];				// 'Y' 파일순서 밀리지 않게
$real_size_ck=$config_rows[real_size_ck];	// 'Y' 본문 이미지 실제사이즈 사용
$file_com_ck=$config_rows[file_com_ck];		// 'Y' 첨부파일 설명
$edit_ck=$config_rows[edit_ck];						// edit사용유무 - 'Y'사용, 'N'사용안함
$reply_ck=$config_rows[reply_ck];					// 'Y'는 답글사용
$recom_ck=$config_rows[recom_ck];				// 'Y'는 댓글사용
$secret_ck=$config_rows[secret_ck];				// 'Y'는 비밀글사용
$ip_ck=$config_rows[ip_ck];							// 'Y'는 아이피 노출 사용
$rec_ck=$config_rows[rec_ck];						// 'Y'는 추천사용
$delete_ck=$config_rows[delete_ck];				// 답변글 있을경우 - 'Y'답변까지 삭제, 'N'삭제안됨, 'S'해당글만
$list_view_ck=$config_rows[list_view_ck];	// 'Y' 게시글 노출시 관리자 승인 필요함
$rp_view_ck=$config_rows[rp_view_ck];		// 'Y' 댓글 노출시 관리자 승인 필요함
$thumb_ck=$config_rows[thumb_ck];			// 'Y' 썸네일 사용
$thumb_x=$config_rows[thumb_x];				// 썸네일 가로크기
$thumb_y=$config_rows[thumb_y];				// 썸네일 세로크기
$newDay=$config_rows[newDay];					// new아이콘 출력일
$Llevel=$config_rows[Llevel];							// 리스트보기권한
$Vlevel=$config_rows[Vlevel];							// 내용보기권한
$Wlevel=$config_rows[Wlevel];						// 쓰기권한
$Alevel=$config_rows[Alevel];							// 답글권한
$Rlevel=$config_rows[Rlevel];							// 댓글권한
$Dlevel=$config_rows[Dlevel];							// 다운로드권한
$Wpoint=$config_rows[Wpoint];						// 쓰기포인트
$Apoint=$config_rows[Apoint];						// 답글포인트
$Rpoint=$config_rows[Rpoint];						// 댓글포인트
$boardAdmin=$config_rows[boardAdmin];		// 게시판관리자

// 페이지 상대경로
$pgUp="../";

// 공통 URL 변수
$PageURL="$rt_page?tb_name=$tb_name";

// 파일저장 폴더
$folder="{$pgUp}files/bbs_{$tb_name}/";

// 게시판 width값
if($tb_width>100){$table_width=$tb_width;}else {$table_width=$tb_width."%";}

// 카테고리
$ct_result=query("select * from wk_board_category where tb_name='$tb_name' order by sort_num asc, idx asc");

// 관리자일 경우
if($_SESSION[p_id]&&$_SESSION[p_level]<=3 || $_SESSION[p_id]&&$_SESSION[p_id]==$boardAdmin){$Admin="Y";}

$skinDir="skin/$bbs_skin/";	 // 스킨
?>
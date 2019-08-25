<?
/**
*		게시판 관련함수
*/


// 게시판 테이블, 코멘트 테이블 생성
function bbsCreate($tb_nm,$bbs_nm) {

	// 게시판 테이블 생성
	query("CREATE TABLE wk_bbs_{$tb_nm} (
				  idx int(11) NOT NULL auto_increment,
				  category varchar(10) default NULL comment '카테고리',
				  indexNo varchar(50) default NULL comment '고유아이디',
				  user_id varchar(20) default NULL comment '아이디',
				  user_name varchar(20) default NULL comment '이름',
				  user_level int(11) default NULL comment '레벨',
				  nickName varchar(30) default NULL comment '닉네임',
				  email varchar(100) default NULL comment '이메일',
				  pwd varchar(255) default NULL comment '비밀번호',
				  subject varchar(255) default NULL comment '제목',
				  html enum('Y','N') default NULL comment 'Html 사용여부',
				  content text comment '내용',
				  linkUrl text comment '링크경로',
				  movie text comment '동영상경로',
				  hit int(11) default '0' comment '조회수',
				  recom int(11) default '0' comment '추천수',
				  recom_id text comment '추천아이디',
				  notice enum('Y','N') default 'N' comment '공지글여부',
				  secret enum('Y','N') default 'N' comment '비빌글여부',
				  view_ck enum('Y','N') default 'Y' comment '노출여부',
				  fileName text comment '첨부파일 실제이름',
				  files text comment '첨부파일 변환이름',
				  files_comment text comment '파일설명',
				  fno int(11) default NULL comment '글번호',
				  thread varchar(255) default NULL comment '답변글번호',
				  user_ip varchar(30) default NULL comment '아이피',
				  reg_date int(11) default NULL comment '등록일',
				  date_tm datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
				  pg_gb varchar(10) default NULL comment '기기구분',
				  tb_gubun varchar(40) default NULL comment '게시판구분',
				  sort_num int(11) default '0' comment '순서',
				  PRIMARY KEY  (idx)
				);");
	// 코멘트 테이블 생성
	query("CREATE TABLE wk_bbs_{$tb_nm}_comment (
				  idx int(11) NOT NULL auto_increment,
				  Bidx int(11) default NULL comment '게시판인덱스값',
				  indexNo varchar(50) default NULL comment '고유아이디',
				  fb_tw_do varchar(10) default NULL comment 'sns선택',
				  user_id varchar(20) default NULL comment '아이디',
				  user_name varchar(20) default NULL comment '이름',
				  nickName varchar(30) default NULL comment '닉네임',
				  pwd varchar(255) default NULL comment '비밀번호',
				  content text comment '내용',
				  view_ck enum('Y','N') default 'Y' comment '노출여부',
				  user_ip varchar(30) default NULL comment '아이피',
				  reg_date int(11) default NULL comment '등록일',
				  date_tm datetime DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
				  PRIMARY KEY  (idx)
				);");

}


// 폴더생성
function MakeDir($upDir){
	if(!is_dir($upDir)) 
	{ 
		if(!mkdir($upDir,0777))
		{
			$this->RaiseError("디렉토리 생성작업이 실패하였습니다.");
			return false;
		}
		@chmod($upDir,0707);
	}	
}


// 게시글 등록수
function bbs_num_var($tb_nm) {

	$num=n_rows("select * from wk_bbs_{$tb_nm}");
	return $num;

}

// 게시판 idx값 출력
function bbs_idx_var($tb_nm) {

	$idx=f_array("select idx from wk_board_config where tb_name='$tb_nm'");
	return $idx[0];

}

// 게시판 이름 출력
function bbs_nm_var($tb_nm) {

	$nm=f_array("select bbs_name from wk_board_config where tb_name='$tb_nm'");
	return $nm[0];

}

// 카테고리 이름 출력
function bbs_ctg_nm($idx) {

	//$nm=f_array("select ct_name from wk_board_category where tb_name='$tb_nm' and idx='$idx'");
	$nm=f_array("select ct_name from wk_board_category where idx='$idx'");
	return $nm[0];

}

/*
*	댓글 등록수
*	tb_nm	: 테이블명
*	idx		: 고유값
*	ad		: 관리자 유무
*	rvc		: 댓글 노출 승인 유무
*/
function bbs_cm_num_var($tb_nm,$idx,$ad,$rvc) {

	if($rvc=="Y" && $ad!="Y"){$vi_ck=" and view_ck='Y'";}
	$rep_n=n_rows("select * from wk_bbs_{$tb_nm}_comment where Bidx='$idx' $vi_ck");
	if($rep_n>0){$rp_num=$rep_n;}
	else {$rp_num="";}
	return $rp_num;

}

?>

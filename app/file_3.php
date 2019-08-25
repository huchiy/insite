<?
/*
$file_mode="insert";
$filename="up_file";
$folder="files/$sort";
include $pgUp."inc/file.php";

$file_mode="update";
$filename="up_file";
$folder="files/$sort";
include $pgUp."inc/file.php";

파일 폼필드명은 file0, file1.. 이런식으로 가고 밑에서 받는 DB필드명은 file_name으로 간다
하나의 파일만 받을때는 DB에 넣을때 하단에 추가해줘서 불러올때 explode작업을 할 필요가 없도록한다.
$img_name=str_replace("/","",$img_name);
*/
//$upfile_ck="Y";	//	Y로 설정되면 다중업로드시 공백파일이 있어도 밀리지 않고 저장.
$Pro = "Y";	//	Y로 설정되면 원본파일명이 아닌 새로 생성된 이름으로 저장.
if(!$pgUp) $pgUp="../";
if(!$filename) {$filename="up_file_3";}	 // 파일명 변수
if(!$fileNum_3) {$File_num=1;}else {$File_num=$fileNum_3;}
if(!$filesSize) $filesSize=20;	// 4MB
if(!$del_name) $del_name="annex_del";	// 삭제 파일명
if(!$oriname) $oriname="fileB";			// 원본파일명
if(!$tb_gubun){$tb_gubun="IMG";}	// 파일명 앞에 붙일 이름
$MaxSize=1024000*$filesSize;

for($i=0; $i<$File_num; $i++){
	$file=$filename.$i;
	$Ori_file=$_POST[$oriname.$i];

	if($file_mode == "insert"){
		if($_FILES[$file] && $_FILES[$file]["size"]){
			$rand=rand(100,900);
			$spt=explode(".",$_FILES[$file]["name"]);
			$extention=$spt[sizeof($spt)-1];
			$extention=strtolower($extention);
			if($extention == "php" || $extention == "htm" || $extention == "html" || $extention == "php3" || $extention == "asp" || $extention == "jsp" || $extention == "phtml"){
				back("첨부할 수 없는 파일 형식입니다.");
				exit;
			}else{
				if($_FILES[$file]["size"] > $MaxSize){
					back("파일 사이즈를 초과하였습니다.");
					exit;
				}else{
					if($Pro == "Y"){			
						if($extention == "jpeg" || $extention == "jpg" || $extention == "gif" || $extention == "png" || $extention == "bmp"){
							$tb_gubun="IMG";
						}else{
							$tb_gubun=$extention;
						}
						$_FILES[$file]["name"]=$tb_gubun."_".time().$rand.".".$extention;
					}else{
						$_FILES[$file]["name"]=str_replace("/","",$_FILES[$file]["name"]);
					}
					$name_ck=file_exists($folder."/".$_FILES[$file]["name"]);
					if($name_ck) $_FILES[$file]["name"]=$rand.$_FILES[$file]["name"];
					$src=$folder."/".$_FILES[$file]["name"];
					copy($_FILES[$file][tmp_name],$src);
				}
			}
		    $_FILES[$file]["name"] .= "/";
		}else{
			// 다중 업로드시 중간에 파일이 없을시  '/' 를 넣어 파일순서가 밀리지 않게.
			if($upfile_ck=="Y"){
				$_FILES[$file]["name"] .= "/";
			}			
		}
		$GLOBALS[$filename."_name"] .= $_FILES[$file]["name"];
	}else if($file_mode == "update"){
		if($_FILES[$file] && $_FILES[$file]["size"]){
			@unlink($folder."/".$Ori_file);
			$rand=rand(100,900);
			$spt=explode(".",$_FILES[$file]["name"]);
			$extention=$spt[sizeof($spt)-1];
			$extention=strtolower($extention);
			if($extention == "php" || $extention == "htm" || $extention == "html" || $extention == "php3" || $extention == "asp" || $extention == "jsp" || $extention == "phtml"){
				back("첨부할 수 없는 파일 형식입니다.");
				exit;
			}else{
				if($_FILES[$file]["size"] > $MaxSize){
					back("파일 사이즈를 초과하였습니다.");
					exit;
				}else{
					if($Pro == "Y"){			
						if($extention == "jpeg" || $extention == "jpg" || $extention == "gif" || $extention == "png" || $extention == "bmp"){
							$tb_gubun="IMG";
						}else{
							$tb_gubun=$extention;
						}
						$_FILES[$file]["name"]=$tb_gubun."_".time().$rand.".".$extention;
					}else{
						$_FILES[$file]["name"]=str_replace("/","",$_FILES[$file]["name"]);
					}
					$name_ck=file_exists($folder."/".$_FILES[$file]["name"]);
					if($name_ck) $_FILES[$file]["name"]=$rand.$_FILES[$file]["name"];
					$src=$folder."/".$_FILES[$file]["name"];
					copy($_FILES[$file][tmp_name],$src);
				}
			}
		    $_FILES[$file]["name"] .= "/";
		}else{
			// 다중 업로드시 중간에 파일이 없을시  '/' 를 넣어 파일순서가 밀리지 않게.
			if($upfile_ck=="Y"){
				$_FILES[$file]["name"] .= $Ori_file."/";
			}else {
				if($Ori_file){$slh="/";}
				else {$slh="";}
				$_FILES[$file]["name"] .= $Ori_file.$slh;
			}			
		}
		$GLOBALS[$filename."_name"] .= $_FILES[$file]["name"];

		/***********************************
		*
		*	게시판 외에 파일삭제시
		*	게시판에서는 아래 $del_file을 사용.
		*
		************************************/
		if($_POST[$del_name.$i] == "yes"){
			if($upfile_ck=="Y"){$slhs="/";}
			else {$slhs="";}
			@unlink($folder."/".$Ori_file);
			$Del_name .= $Ori_file."/";
			$Del=explode("/",$Del_name);
			for($q=0; $q<sizeof($Del); $q++){
				if($Del[$q]) {
					$GLOBALS[$filename."_name"]=str_replace($Del[$q]."/","$slhs",$GLOBALS[$filename."_name"]);
				}
			}			
		}
	}
}

/****************************************
*
*	파일체크삭제시 앞으로 밀리면서 정렬.
*	게시판에서 사용.
*	밀리지 않게 하려면 str_replace 함수 가운데 '/' 추가.
*
*****************************************/
if($del_file_3){	//선택파일 삭제.
	if($upfile_ck=="Y"){$sh="/";}
	else {$sh="";}
	for($i=0;$i<$fileNum_3 ;$i++ ){
		if($del_file_3[$i]){
			$DelFiles=explode("///",$del_file_3[$i]);
			if(file_exists($folder."/".$DelFiles[1])) {
				@unlink($folder."/".$DelFiles[1]);
				@unlink($folder."/S".$DelFiles[1]);
			}
			$GLOBALS[$filename."_name"]=@str_replace($DelFiles[1]."/","$sh",$GLOBALS[$filename."_name"]);
		}
	}
}
?>

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
if(!$filename) {$filename="up_file";}	 // 파일명 변수
if(!$fileNum) {$File_num=1;}else {$File_num=$fileNum;}
if(!$filesSize) $filesSize=200;	// 4MB
if(!$del_name) $del_name="annex_del";	// 삭제 파일명
if(!$oriname) $oriname="fileN";			// 원본파일명
if(!$tb_gubun){$tb_gubun="IMG";}	// 파일명 앞에 붙일 이름
$MaxSize=1024000*$filesSize;
for($i=$File_num; $i<=$File_num; $i++){
	if($i==0 && $upfile_main=="Y"){ $upfile_m0=="Y"; }
	$file=$filename.$i;
	$Ori_file=$_POST[$oriname.$i];
	if($file_mode == "insert"){
		if($_FILES[$file] && $_FILES[$file]["size"]){
		}else{
			// 다중 업로드시 중간에 파일이 없을시  '/' 를 넣어 파일순서가 밀리지 않게.
			if($upfile_ck=="Y" || $upfile_0=="Y"){
				$_FILES[$file]["name"] .= "/";
			}			
		}
			$rand=rand(100,900);
			$spt=explode(".",$_FILES[$file]["name"]);
			$extention=$spt[sizeof($spt)-1];
			$extention=strtolower($extention);
			if($extention == "php" || $extention == "htm" || $extention == "html" || $extention == "php3" || $extention == "asp" || $extention == "jsp" || $extention == "phtml" || $extention == "pptx"){
				echo "첨부할 수 없는 파일 형식입니다.(err:00)";
				exit;
			}else{
				if($_FILES[$file]["size"] > $MaxSize){
					echo "파일 사이즈를 초과하였습니다.(err:01)";
					exit;
				}else{
					if($Pro == "Y"){			
						if($extention == "jpeg" || $extention == "jpg" || $extention == "gif" || $extention == "png" || $extention == "bmp"){
							$tb_gubun="IMG";
						}else{
							$tb_gubun=$extention;
							echo "첨부할 수 없는 파일 형식입니다.(err:02)";
							exit;
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
		$GLOBALS[$filename."_name"] .= $_FILES[$file]["name"];
	}
}
?>

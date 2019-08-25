<?include "../../app/inc_head.php";

$bn_gbs="/";
for($i=0;$i<sizeof($bn_gb) ;$i++ ){
	$bn_gbs.=$bn_gb[$i]."/";
}

$table_name=$table_name;

$folder="../../files/".$table_name;
$filename="up_file";	// 넘어온 파일변수
$upfile_ck ='Y';

$file_mode="insert";
include "../../app/file_2.php";

$Pfiles=explode("/",$up_file_name);

// 썸네일 사용시 썸네일 생성
if($Pfiles[0]){
	$up_img_url = "../../files/".$table_name."/$Pfiles[0]";
	$img_Name = imgName($up_img_url); //파일명
	$path_file = "../../files/".$table_name."_thumb/{$img_Name}.thumb";//원본파일을 너비 정비율 리사이즈			
	if(!is_file($path_file)){	// 썸네일이 없으면

		// 썸네일 할 사이즈 구하기
		$size = getimagesize($up_img_url); 
		if($size[0]>1600){
			$thumb_x = '1200';
		}else{
			$thumb_x = $size[0];
		}
		if($size[1]>1600){
			$thumb_y = '1200';
		}else{
			$thumb_y = $size[1];
		}
//		if($size[0]==$size[1]){ // 가로 세로 같은때
//			if($size[0]>1600){
//				$thumb_x = '1600';
//				$thumb_y = '1600';
//			}else{
//				$thumb_x = $size[0];
//				$thumb_y = $size[1];
//			}
//		}else if($size[0]>$size[1]){ // 가로가 길때
//			if($size[0]>1600){
//				$thumb_x = '1600';
//			}else{
//				$thumb_x = $size[0];
//			}
//			if($size[1]>1600){
//				$thumb_y = '1600';
//			}else{
//				$thumb_y = $size[1];
//			}
//		}else if($size[0]<$size[1]){ // 세로가 길때
//			if($size[1]>1600){
//				$thumb_x = $size[0];
//				$thumb_y = '1600';
//			}else{
//				$thumb_x = $size[0];
//				$thumb_y = $size[1];
//			}
//		}else{
//		}

		$options['crop_use']='1';
		$a=thumnail($up_img_url, $path_file, $thumb_x, $thumb_y, $options);
	}
	if($a==true || is_file($path_file)){$up_img_url =  $path_file;}
	else {$up_img_url=$up_img_url;}
}else{
	$up_img_url = '/assets/images/imageupload.png';
}

echo 'ok///'.$up_img_url.'///'.$Pfiles[0];


if($Query=="image_update") {	// 등록


	//query("INSERT INTO $table_name ( fileName, files , reg_date ) VALUES ( '$fileNames' , '$up_file_name' , now() )");

/*
	query("INSERT INTO $table_name ( fileName, files , reg_date ) VALUES ( '$fileNames' , '$up_file_name' , now() )");

	$last_uid = mysql_insert_id();

	echo 'ok///'.$up_img_url1.'///'.$up_img_url2.'///'.$up_img_url3.'///'.$Pfiles[1].'///'.$Pfiles[2].'///'.$Pfiles[3].'///'.$last_uid.'///'.$up_file_name;
*/


}else if($Query=="image_update2") {	// 등록


	echo 'ok///'.$up_img_url4.'///'.$up_img_url5.'///'.$up_img_url6.'///'.$Pfiles[4].'///'.$Pfiles[5].'///'.$Pfiles[6].'///'.$last_uid;


}else if($Query=="image_update3") {	// 등록


	echo 'ok///'.$up_img_url7.'///'.$up_img_url8.'///'.$up_img_url9.'///'.$Pfiles[7].'///'.$Pfiles[8].'///'.$Pfiles[9].'///'.$last_uid;


}else if($Query=="delete"){	// 삭제
}else{}
?>
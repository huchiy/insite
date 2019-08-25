<?
// 메모리 부족오류 해결
ini_set('memory_limit','192M');
/*
이름 : get_image_resource_from_file

용도 : 이미지파일(gif, jpg, png 만 지원)로부터 이미지 리소스를 생성한다

성공시 리턴값 : 이미지 리소스 id 와 getimagesize 로 받아온 이미지 정보를 배열로 반환
==> Array(0=>image resource, 1=>image width, 2=>image height, 3=>image type, 4=>image attribute);

실패시 리턴값 : 빈 배열 반환
==> Array()

인자 :
==> $path_file : 이미지의 절대경로 또는 상대경로
*/

function get_image_resource_from_file ($path_file){

  if (!is_file($path_file)) {//파일이 아니라면

    $GLOBALS['errormsg'] = $path_file . '은 파일이 아닙니다.';

    return Array();
  }

  $size = @getimagesize($path_file);
  if (empty($size[2])) {//이미지 타입이 없다면

    $GLOBALS['errormsg'] = $path_file . '은 이미지 파일이 아닙니다.';

    return Array();
  }

  if ($size[2] != 1 && $size[2] != 2 && $size[2] != 3) {//지원하는 이미지 타입이 아니라면

    $GLOBALS['errormsg'] = $path_file . '은 gif 나 jpg, png 파일이 아닙니다.';

    return Array();
  }

  switch($size[2]){//image type에 따라 이미지 리소스를 생성한다.

    case 1 : //gif

      $im = @imagecreatefromgif($path_file);
      break;

    case 2 : //jpg

      $im = @imagecreatefromjpeg($path_file);
      break;

    case 3 : //png

      $im = @imagecreatefrompng($path_file);
      break;
  }

  if ($im === false) {//이미지 리소스를 가져오기에 실패하였다면
    $GLOBALS['errormsg'] = $path_file . ' 에서 이미지 리소스를 가져오는 것에 실패하였습니다.';
    return Array();
  }
  else {//이미지 리소스를 가져오기에 성공하였다면

    $return = $size;
    $return[0] = $im;
    $return[1] = $size[0];//너비
    $return[2] = $size[1];//높이
    $return[3] = $size[2];//이미지타입
    $return[4] = $size[3];//이미지 attribute

    return $return;
  }
}



/*
이름 : save_image_from_resource

용도 : image resouce 를 가지고 파일로 저장

성공시 리턴값 : true

실패시 리턴값 : false

인자 :
==> $im : 이미지 리소스 id
==> $path_save_file : 저장될 파일의 절대 경로 또는 상대경로
==> $save_force : 동일 경로에 이미 파일이 존재할때
                     ==> 0 이면 저장하지 않고 false 반환
                     ==> 1 이면 저장하지 않고 true 반환
                     ==> 2 이면 기존 것은 지우고 새로 저장
                     ==> 생략하면 자동으로 기본값은 0

*/

function save_image_from_resource ($im, $path_save_file, $save_force=0){

  $path_save_dir = dirname($path_save_file);//저장 파일 경로에서 상위 디렉토리 경로를 가져옴
  if (!is_dir($path_save_dir)) {//상위디렉토리가 디렉토리가 아니라면

    $GLOBALS['errormsg'] = $path_save_dir . '은 디렉토리가 아닙니다.';

    return false;
  }

  if (!is_writable($path_save_dir)){//해당 디렉토리에 파일을 저장할 권한이 없다면

    $GLOBALS['errormsg'] = $path_save_dir . '에 이미지를 저장할 권한이 없습니다.';

    return false;
  }

  if (is_dir($path_save_file)) {//같은 이름의 디렉토리가 존재하면

    $GLOBALS['errormsg'] = $path_save_file . '은 이미 같은 이름의 디렉토리가 존재합니다.';

    return false;
  }

  if (is_file($path_save_file)){//같은 이름의 파일이 존재하면

    if ($save_force == 1) {//새로 저장하지 않고 true 반환

      return true;
    }
    else if ($save_force == 2){//기존 파일은 삭제

      $result_unlink = @unlink($path_save_file);
      if ($result_unlink === false) {//기존 이미지 삭제에 실패

        $GLOBALS['errormsg'] = '기존에 존재하던 ' . $path_save_file . '의 삭제에 실패하였습니다.';

        return false;
      }
    }
    else {//0 이거나 정해지지 않은 값일때 false를 반환

      $GLOBALS['errormsg'] = $path_save_file . '은 이미 같은 이름의 파일이 존재합니다.';

      return false;
    }
  }

  //파일명에서 마지막 . 을 기준으로 확장자를 가져와서 소문자로 변환
  $extension = strtolower(substr($path_save_file, strrpos($path_save_file, '.') + 1));


  switch($extension){//확장자에 따라 이미지 저장 처리

    case 'gif' :

      $result_save = @imagegif($im, $path_save_file);
      break;

    case 'jpg' :

    case 'jpeg' :

      $result_save = @imagejpeg($im, $path_save_file);
      break;

    default : //확장자 png 또는 확장자가 없는 경우, 정의되지 않는 확장자인 경우는 모두 png로 저장
			if($path_save_file=='../../files/bbs_travel/IMG_1481508928562.thumb'){
				$path_save_file='../../files/bbs_travel/IMG_1481508928562.png';
			}else{}
      $result_save = @imagepng($im, $path_save_file,9);
  }

  if ($result_save === false) {//이미지 저장에 실패

    $GLOBALS['errormsg'] = $path_save_file . '의 저장에 실패하였습니다.';

    return false;
  }
  else {//이미지 저장에 성공

    return true;
  }
}



/*
이름 : get_size_by_rule

용도 : 큰이미지의 너비와 높이를 가지고 정비율의 작은 이미지 너비 나 높이를 구함

성공시 리턴값 : 0보다 큰 정수값

실패시 리턴값 : false

인자 :
==> $src_w : 큰이미지의 너비, 0보다 큰 정수만 가능
==> $src_h : 큰이미지의 높이, 0보다 큰 정수만 가능
==> $dst_size : 작은 이미지의 정해진 너비 나 높이, 너비 일 경우 높이 반환, 높이 일 경우 너비 반환
==> $rule : $dst_size 의 값이 너비 인지 높이인지 지정
          ==> 값으로는 width, height 가 올수 있다.
          ==> 생략하거나 height 가 아니면 모두 width로 인식
*/

function get_size_by_rule($src_w, $src_h, $dst_size, $rule='width'){

  //정수형이 아니라면 정수형으로 강제 형변환
  if (!is_int($src_w)) settype($src_w, 'int');
  if (!is_int($src_h)) settype($src_h, 'int');
  if (!is_int($dst_size)) settype($dst_size, 'int');

  if ($src_w < 1 || $src_h < 1){//원본의 너비와 높이가 둘중에 하나라도 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "원본의 너비와 높이가 0보다 큰 정수가 아닙니다. ($src_w, $src_h)";

    return false;
  }

  if ($dst_size < 1){//리사이즈 될 사이즈가 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "리사이즈될 사이즈가 0보다 큰 정수가 아닙니다. ($dst_size)";

    return false;
  }

  if ($rule != 'height') {//기준값이 너비일 경우, 값이 height 가 아니면 전부 width 로 판단

    return ceil($dst_size / $src_w * $src_h);
  }
  else {//기준값이 높이일 경우

    return ceil($dst_size / $src_h * $src_w);
  }
}



/*
이름 : get_bigsize_by_rule

용도 : 작은 이미지의 너비와 높이를 가지고 정비율의 큰 이미지 너비 나 높이를 구함

성공시 리턴값 : 0보다 큰 정수값

실패시 리턴값 : false

인자 :
==> $dst_w : 작은이미지의 너비, 0보다 큰 정수만 가능
==> $dst_h : 작은이미지의 높이, 0보다 큰 정수만 가능
==> $src_size : 큰 이미지의 정해진 너비 나 높이, 너비 일 경우 높이 반환, 높이 일 경우 너비 반환
==> $rule : $src_size 의 값이 너비 인지 높이인지 지정
          ==> 값으로는 width, height 가 올수 있다.
          ==> 생략하거나 height 가 아니면 모두 width로 인식
*/

function get_bigsize_by_rule($dst_w, $dst_h, $src_size, $rule='width'){

  //정수형이 아니라면 정수형으로 강제 형변환
  if (!is_int($dst_w)) settype($dst_w, 'int');
  if (!is_int($dst_h)) settype($dst_h, 'int');
  if (!is_int($src_size)) settype($src_size, 'int');

  if ($dst_w < 1 || $dst_h < 1){//썸네일의 너비와 높이가 둘중에 하나라도 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "썸네일의 너비와 높이가 0보다 큰 정수가 아닙니다. ($dst_w, $dst_h)";

    return false;
  }

  if ($src_size < 1){//원본의 사이즈가 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "원본의 사이즈가 0보다 큰 정수가 아닙니다. ($src_size)";

    return false;
  }

  if ($rule != 'height') {//기준값이 너비일 경우, 값이 height 가 아니면 전부 width 로 판단

    return ceil($src_size / $dst_w * $dst_h);
  }
  else {//기준값이 높이일 경우

    return ceil($src_size / $dst_h * $dst_w);
  }
}



/*
이름 : get_image_resize

용도 : 원본의 리소스를 가지고 주어진 조건으로 리사이즈 처리한 이미지 리소스를 생성

성공시 리턴값 : 썸네일 리소스 id

실패시 리턴값 : false

인자 :
==> $src : 원본의 리소스 id
==> $src_w : 원본의 너비
==> $src_h : 원본의 높이
==> $dst_w : 생성할 썸네일의 너비, 0 이상의 정수
==> $dst_h : 생성할 썸네일의 높이, 0 이상의 정수
             ==> 생략 가능하며 생략시에는 자동으로 0으로 값이 들어감

참고 :
==> $dst_w 와 $dst_h 모두 값이 0이 될수 없음
==> 둘다 0보다 클 경우, 강제 리사이즈하여 썸네일 리소스 생성
==> 둘중 하나가 0 이면, 0이 아닌 쪽을 기준으로 정비율로 리사이즈 하여 썸네일 생성
*/

function get_image_resize($src, $src_w, $src_h, $dst_w, $dst_h=0){

  if (empty($src))  {//원본의 리소스 id 가 빈값일 경우

    $GLOBALS['errormsg'] = '원본 리소스가 없습니다.';

    return false;
  }

  //정수형이 아니라면 정수형으로 강제 형변환
  if (!is_int($src_w)) settype($src_w, 'int');
  if (!is_int($src_h)) settype($src_h, 'int');
  if (!is_int($dst_w)) settype($dst_w, 'int');
  if (!is_int($dst_h)) settype($dst_h, 'int');

  if ($src_w < 1 || $src_h < 1){//원본의 너비와 높이가 둘중에 하나라도 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "원본의 너비와 높이가 0보다 큰 정수가 아닙니다. ($src_w, $src_h)";

    return false;
  }

  if (empty($dst_w) && empty($dst_h)) {//썸네일의 너비와 높이 둘다 없을 경우

    $GLOBALS['errormsg'] = '썸네일의 너비와 높이는 둘중에 하나는 반듯이 있어야 합니다.';

    return false;
  }

  if (!empty($dst_w) && $dst_w < 1){//썸네일의 너비가 존재하는데 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "썸네일의 너비가 0보다 큰 정수가 아닙니다. ($dst_w)";

    return false;
  }

  if (!empty($dst_h) && $dst_h < 1){//썸네일의 높이가 존재하는데 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "썸네일의 높이가 0보다 큰 정수가 아닙니다. ($dst_h)";

    return false;
  }


  //썸네일의 너비와 높이가 둘중에 하나가 없는 경우에는 정비율을 의미하며, 비율데로 너비와 높이를 결정한다.
  if (empty($dst_w) || empty($dst_h)) {

    if (empty($dst_h)) $dst_h = get_size_by_rule($src_w, $src_h, $dst_w, 'width');
    else $dst_w = get_size_by_rule($src_w, $src_h, $dst_h, 'height');
  }


  //$dst_w , $dst_h 크기의 썸네일 리소스를 생성한다.
  $dst = @imagecreatetruecolor ($dst_w , $dst_h);
  if ($dst === false) {

    $GLOBALS['errormsg'] = "$dst_w , $dst_h 크기의 썸네일 리소스를 생성하지 못했습니다.";

    return false;
  }
  else
  {
	//투명배경 흰색 처리
	$bgcolor = imagecolorallocate($dst,255,255,255);
	imagefill($dst, 0, 0, $bgcolor);
  }

  //리사이즈 처리
  $result_resize = imagecopyresampled ($dst , $src , 0 , 0 , 0 , 0 , $dst_w , $dst_h , $src_w , $src_h );
  if ($result_resize === false) {

    $GLOBALS['errormsg'] = "$dst_w , $dst_h 크기로 리사이즈에 실패하였습니다.";

    return false;
  }

  return $dst;
}



/*
이름 : get_image_cropresize

용도 : 원본의 리소스를 가지고 주어진 조건으로 크롭 후 리사이즈 처리한 이미지 리소스를 생성

성공시 리턴값 : 썸네일 리소스 id

실패시 리턴값 : false

인자 :
==> $src : 원본의 리소스 id
==> $src_w : 원본의 너비
==> $src_h : 원본의 높이
==> $dst_w : 생성할 썸네일의 너비, 0 이상의 정수
==> $dst_h : 생성할 썸네일의 높이, 0 이상의 정수
             ==> 생략 가능하며 생략시에는 자동으로 0으로 값이 들어감
==> $pos_width : 너비를 기준으로 크롭할때 어느부분을 크롭할지 지정
                   ==> 1 일경우에는 왼쪽을 기준으로 크롭
                   ==> 2 일경우에는 중앙을 기준으로 크롭
                   ==> 3 일경우에는 오른쪽을 기준으로 크롭
                   ==> 생략가능하며 생략시에는 자동으로 2 로 값이 들어감
==> $pos_height : 높이를 기준으로 크롭할때 어느부분을 크롭할지 지정
                   ==> 1 일경우에는 상단을 기준으로 크롭
                   ==> 2 일경우에는 가운데를 기준으로 크롭
                   ==> 3 일경우에는 하단을 기준으로 크롭
                   ==> 생략가능하며 생략시에는 자동으로 2 로 값이 들어감

참고 :
==> $dst_w 와 $dst_h 모두 값이 0이 될수 없음
==> 둘다 0보다 클 경우, 강제 리사이즈하여 썸네일 리소스 생성
==> 둘중 하나가 0 이면, 0이 아닌 쪽을 기준으로 정비율로 리사이즈 하여 썸네일 생성
*/

function get_image_cropresize($src, $src_w, $src_h, $dst_w, $dst_h=0, $pos_width=2, $pos_height=2){

  if (empty($src))  {//원본의 리소스 id 가 빈값일 경우

    $GLOBALS['errormsg'] = '원본 리소스가 없습니다.';

    return false;
  }

  //정수형이 아니라면 정수형으로 강제 형변환
  if (!is_int($src_w)) settype($src_w, 'int');
  if (!is_int($src_h)) settype($src_h, 'int');
  if (!is_int($dst_w)) settype($dst_w, 'int');
  if (!is_int($dst_h)) settype($dst_h, 'int');

  if ($src_w < 1 || $src_h < 1){//원본의 너비와 높이가 둘중에 하나라도 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "원본의 너비와 높이가 0보다 큰 정수가 아닙니다. ($src_w, $src_h)";

    return false;
  }

  if (empty($dst_w) && empty($dst_h)) {//썸네일의 너비와 높이 둘다 없을 경우

    $GLOBALS['errormsg'] = '썸네일의 너비와 높이는 둘중에 하나는 반듯이 있어야 합니다.';

    return false;
  }

  if (!empty($dst_w) && $dst_w < 1){//썸네일의 너비가 존재하는데 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "썸네일의 너비가 0보다 큰 정수가 아닙니다. ($dst_w)";

    return false;
  }

  if (!empty($dst_h) && $dst_h < 1){//썸네일의 높이가 존재하는데 0보다 큰 정수가 아닐경우

    $GLOBALS['errormsg'] = "썸네일의 높이가 0보다 큰 정수가 아닙니다. ($dst_h)";

    return false;
  }


  //썸네일의 너비와 높이가 둘중에 하나가 없는 경우에는 정비율을 의미하며, 비율데로 너비와 높이를 결정한다.
  if (empty($dst_w) || empty($dst_h)) {

    if (empty($dst_h)) $dst_h = get_size_by_rule($src_w, $src_h, $dst_w, 'width');
    else $dst_w = get_size_by_rule($src_w, $src_h, $dst_h, 'height');
  }

	

  //$dst_w , $dst_h 크기의 썸네일 리소스를 생성한다.
  $dst = @imagecreatetruecolor ($dst_w , $dst_h);
  if ($dst === false) {

    $GLOBALS['errormsg'] = "$dst_w , $dst_h 크기의 썸네일 리소스를 생성하지 못했습니다.";

    return false;
  }
  else
  {
	//투명배경 흰색 처리
	$bgcolor = imagecolorallocate($dst,255,255,255);
	imagefill($dst, 0, 0, $bgcolor);
  }


  //썸네일의 너비를 기준으로 정비율의 썸네일의 높이를 구한다.
  $s_w = $dst_w;
  $s_h = get_size_by_rule($src_w, $src_h, $s_w, 'width');


  //기본값
  $src_x = 0;
  $src_y = 0;
  $src_nw = $src_w;
  $src_nh = $src_h;


  if ($dst_h != $s_h) {//높이가 다름, 즉, 크롭을 해야 한다는 뜻

    if ($dst_h < $s_h) {//지정된 높이가 정비율 높이 보다 작을경우, 높이를 기준으로 $pos_height 로 크롭

      //썸네일의 너비와 높이를 가지고 정비율의 큰이미지의 높이를 구한다.
      $src_nh = get_bigsize_by_rule($dst_w, $dst_h, $src_w, 'width');

      $src_x = 0;

      if ($pos_height == 1) $src_y = 0;//상단 기준점 y좌표 구함
      else if ($pos_height == 2) $src_y = ceil(($src_h - $src_nh) / 2);//가운데 기준점 y좌표 구함
      else $src_y = $src_h - $src_nh;//하단 기준점 y좌표 구함
    }
    else {//지정된 높이가 정비율 높이 보다 큰경우, 너비를 기준으로 $pos_width 크롭

      ////썸네일의 너비와 높이를 가지고 정비율의 원본 너비를 구한다.
      $src_nw = get_bigsize_by_rule($dst_w, $dst_h, $src_h, 'height');

      if ($pos_width == 1) $src_x = 0;//왼쪽 기준점 y좌표 구함
      else if ($pos_width == 2) $src_x = ceil(($src_w - $src_nw) / 2);//중앙 기준점 y좌표 구함
      else $src_x = $src_w - $src_nw;//오른쪽 기준점 y좌표 구함

      $src_y = 0;
    }
  }

  $result_resize = imagecopyresampled ($dst , $src , 0 , 0 , $src_x , $src_y , $dst_w , $dst_h , $src_nw , $src_nh );
  if ($result_resize === false) {

    $GLOBALS['errormsg'] = "$dst_w , $dst_h 크기로 크롭 및 리사이즈에 실패하였습니다.";

    return false;
  }

  return $dst;
}






/*
이름 : thumnail

용도 : 원본을 조건에 따라 리사이즈, 크롭를 처리하여 파일로 저장함

성공시 리턴값 : true

실패시 리턴값 : false

인자 :
==> $path_src_file : 원본파일의 절대경로 또는 상대경로
==> $path_save_file : 썸네일을 저장할 절대경로 또는 상대경로
==> $save_w : 만들 썸네일의 너비
==> $save_h : 만들 썸네일의 높이, 생략 가능하며 생략시 기본값은 0
==> $options : 함수 내부에 정의된 변수들의 값을 변경할때 사용, 배열형태, 생략가능하며 생략시 기본값은 빈배열(Array())
                ==> $options['save_force'] : 이미 동일한 경로에 동일이름의 파일이 존재할때의 처리 결정
                                                            0 이면 false 반환, 1 이면 더이상 실행안하고 true 반환, 2 이면 기존거는 지우고 새로 저장
                ==> $options['crop_use'] : 크롭 사용 여부, 0 은 사용안함, 1은 사용함
                ==> $options['crop_pos_width'] : 너비 기준으로 크롭할때 기준부위 결정, 1은 왼쪽, 2는 가운데, 3은 오른쪽
                ==> $options['crop_pos_height'] : 높이 기준으로 크롭할때 기준부위 결정, 1은 상단, 2는 중단, 3은 하단
                
*/

function thumnail($path_src_file, $path_save_file, $save_w, $save_h=0, $options=Array()){

  //기본값 설정
  $save_force = 2;//저장형태 : 파일 덮어씌움

  if($options['crop_use']){ //크롭 사용여부
		$crop_use = $crop_use;
	}else{
		$crop_use = 0;
	}
  $crop_pos_width = 2;//너비 기준 크롭시 중앙을 기준
  $crop_pos_height = 2;//높이 기준 크롭시 상단을 기준

  //기본값 재설정
  if (!empty($options)) @extract($options);

  //원본 리소스 생성
  list($src, $src_w, $src_h) = get_image_resource_from_file ($path_src_file);
  if (empty($src)) return false;

  //리사이즈 또는 크롭 리사이즈
  if ($crop_use == 1) {//크롭 리사이즈

    $dst = get_image_cropresize($src, $src_w, $src_h, $save_w, $save_h, $crop_pos_width, $crop_pos_height);
  }
  else {//리사이즈

    $dst = get_image_resize($src, $src_w, $src_h, $save_w, $save_h);
  }

  @imagedestroy($src);
  if (empty($dst)) return false;


  $result_save = save_image_from_resource ($dst, $path_save_file, $save_force);

  @imagedestroy($dst);

  return $result_save;
}

function thums_replace($Pfiles,$size){
	$str = explode("/",$Pfiles);
	$num = count($str)-1;
	$re_str = $size."_".$str[$num];
	$str[$num] = $re_str;
	$edit_img = implode("/",$str);			
	$imgLink=str_replace("/source/", "/thumbsB/" , $edit_img);
	return $imgLink;
}
?>

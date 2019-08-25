<?
/**
*		MySql 관련함수
*/

function query($query){
	$host="localhost";
	$db_name="dailyinsite";
	$db_pass="dailyinsiteadmin1";
	$db="dailyinsite";
	$conn=mysqli_connect($host,$db_name,$db_pass) or die("DB connect error.");
	mysqli_select_db($conn,$db);
	mysqli_set_charset($conn,"utf8");
	$result=mysqli_query($conn,$query);
	if(!$result){
		$errno=mysqli_errno($conn);
		$error=mysqli_error($conn);
		echo "query : {$query}<br>";
		echo "errno : {$errno}<br>error : {$error}";
		echo (" 데이터베이스 오류-!!!");
		exit;
	}
	return $result;
}

function fetch_array($result){
	$rows=@mysqli_fetch_array($result);
	return $rows;
}

function fetch_row($result){
	$rows=@mysqli_fetch_row($result);
	return $rows;
}

function fetch_object($result){
	$rows=@mysqli_fetch_object($result);
	return $rows;
}

function num_rows($result){
	$rows=@mysqli_num_rows($result);
	return $rows;
}

function f_array($query){	
	$host="localhost";
	$db_name="dailyinsite";
	$db_pass="dailyinsiteadmin1";
	$db="dailyinsite";
	$conn=mysqli_connect($host,$db_name,$db_pass) or die("DB connect error.");
	mysqli_select_db($conn,$db);
	mysqli_set_charset($conn,"utf8");
	$result=mysqli_query($conn,$query);
	if(!$result){
		$errno=mysqli_errno($conn);
		$error=mysqli_error($conn);
		echo "query : {$query}<br>";
		echo "errno : {$errno}<br>error : {$error}";
		echo (" 데이터베이스 오류-!!!");
		exit;
	}
	$rows=@mysqli_fetch_array($result);
	return $rows;
}

function f_row($query){
	$host="localhost";
	$db_name="dailyinsite";
	$db_pass="dailyinsiteadmin1";
	$db="dailyinsite";
	$conn=mysqli_connect($host,$db_name,$db_pass) or die("DB connect error.");
	mysqli_select_db($conn,$db);
	mysqli_set_charset($conn,"utf8");
	$result=mysqli_query($conn,$query);
	if(!$result){
		$errno=mysqli_errno($conn);
		$error=mysqli_error($conn);
		echo "query : {$query}<br>";
		echo "errno : {$errno}<br>error : {$error}";
		echo (" 데이터베이스 오류-!!!");
		exit;
	}
	$rows=@mysqli_fetch_row($result);
	return $rows;
}

function n_rows($query){
	$host="localhost";
	$db_name="dailyinsite";
	$db_pass="dailyinsiteadmin1";
	$db="dailyinsite";
	$conn=mysqli_connect($host,$db_name,$db_pass) or die("DB connect error.");
	mysqli_select_db($conn,$db);
	mysqli_set_charset($conn,"utf8");
	$result=mysqli_query($conn,$query);
	if(!$result){
		$errno=mysqli_errno($conn);
		$error=mysqli_error($conn);
		echo "query : {$query}<br>";
		echo "errno : {$errno}<br>error : {$error}";
		echo (" 데이터베이스 오류-!!!");
		exit;
	}
	$rows=@mysqli_num_rows($result);
	return $rows;
}

// 관리자페이지 접근자 확인
function adm_pg_per($tmn,$lmn="0",$GO="") {
	global $sg_gb;
	$per_ck=n_rows("select * from wk_permission where tmn='$tmn' and lmn='$lmn' and ( (users like '%,$_SESSION[p_id],%' or u_level like '%,$_SESSION[adm_level],%') and sg_gb='$sg_gb')");
	if($_SESSION[adm_level]<3 || ($per_ck && strstr($_SESSION[p_sg_gb],$sg_gb))){
		$res=$GO;
	}else {$res="javascript:alert('접근 권한이 없습니다');";}
	return $res;
}

// 관리자페이지 세부권한 접근자 확인
function adm_detail_per($idx) {
	$per_ck=n_rows("select * from wk_per_detail where idx='$idx' and ( users like '%,$_SESSION[p_id],%' or u_level like '%,$_SESSION[adm_level],%' )");
	if($_SESSION[adm_level]<3 || $per_ck){$d_re=true;}
	else {$d_re=false;}
	return $d_re;
}
?>

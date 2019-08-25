<?
/**
*		연차관련 함수
*/
// 요일
$week_arr=array("","일","월","화","수","목","금","토");
// 예약상태
$res_arr=array("","예약접수","예약검토","예약진행","결제완료","정산완료","결산완료","예약취소");
$res_color_arr=array("","#6699ff","#CC00FF","#0000cc","#008800","#ffaa00","#e8ce17","#ff0000");
// 숙박타입
$lodge_arr=array("1인1실","2인1실","3인1실","4인1실","5인1실");
// 결제방법
$res_pay_op=array("무통장입금","카드결제","통화후결제");
// 환율
$cur_arr=array("","원화","달러","앤화","유로","CAD","NZD","CHF");
// 입력구분
$pay_title_arr=array("수탁경비","지상지출","항공지출","기타지출","지불수수료","항공수익");
// 입금내용
$pay_op_arr=array("상품요금","카드승인취소","현금환불");
// 통장구분
$tong_op_arr=array("우리605","카드수동","대체입금","대체출금","현금");
// 숙박부대시설
$lodge_array=array("양식 레스토랑","일식 레스토랑","중식 레스토랑","바","대중목욕탕","사우나","온천","노천온천","욕의","헤어 드라이어","세면 도구","매점","자판기","노래방","휘트니스","실내 수영장","코인 세탁기","컴퓨터","탁아소","주차장","편의점","렌탈샵");
// 항공편
//$airport_arr=array("아시아나","대한항공","일본항공","이스타항공","에어캐나다","제주항공","전일공","진에어","항공제외","대한항공 항공제외","진에어 항공제외","이스타항공 항공제외","카타르항공","에미레이트항공","핀에어항공","칸타스항공","루프트한자항공","에어프랑스항공","유나이티드항공","티웨이항공","중국남방항공");

// 예약코드 생성
function orderCode_var() {

	$d=date("ymdHis");
	$r=rand(10,99);
	$no=$d.$r;
	return $no;

}

// 정산,결산 금액 산출
function tour_pay_result($sg_gb,$re_gb,$idx) {

	global $pay_title_arr;
	$query="select * from wk_{$sg_gb}_report where re_gb='$re_gb' and re_idx='$idx'";
	for($i=0;$i<sizeof($pay_title_arr) ;$i++ ){

		$query_r="$query and pay_title='$pay_title_arr[$i]'";
		$q=$query_r;
		$result=query($query_r);
		for($j=0;$j<$rows=fetch_array($result) ;$j++ ){
			$tot_price=$tot_price+$rows[tot_price];
			${"tot_price".$i}=$tot_price;
		}

	$tot_price="";
	}
	
	// 수탁금
	$r[]=$tot_price0;
	// 지상지출 + 항공지출 + 기타지출 + 지불수수료
	$tot_price1234=$tot_price1+$tot_price2+$tot_price3+$tot_price4;
	// 지상수익
	$r[]=$tot_land_price=$tot_price0-$tot_price1234;
	// 지상지출
	$r[]=$tot_price1;
	// 항공수익
	$r[]=$tot_price5;
	// 항공지출
	$r[]=$tot_price2;
	// 기타지출
	$r[]=$tot_oth_price=$tot_price3+$tot_price4;
	// 총수익(본사)
	$r[]=$tot_head_price=$tot_land_price+$tot_price5;
	// 총지출
	$r[]=$tot_out_price=$tot_price1+$tot_price2+$tot_oth_price;

	return $r;

}
?>

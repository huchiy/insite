<?include "../../app/inc_head.php";

require_once "../../app/PHPExcel-1.8/Classes/PHPExcel.php"; // PHPExcel.php을 불러와야 하며, 경로는 사용자의 설정에 맞게 수정해야 한다.
$objPHPExcel = new PHPExcel();
require_once "../../app/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php"; // IOFactory.php을 불러와야 하며, 경로는 사용자의 설정에 맞게 수정해야 한다.

$table_name = "Pka_User_K2K9_POINT";

$upfile = $_FILES[filename][tmp_name];
$upfile_name = $_FILES[filename][name];

$upfile_name = iconv("UTF-8", "EUC-KR", $upfile_name);

$upload_dir = "../../files/excel"; //업로드된 파일 저장 경로
move_uploaded_file($upfile, $upload_dir. "/$upfile_name");
$filename = $upload_dir."/".$upfile_name; // 읽어들일 엑셀 파일의 경로와 파일명을 지정한다.

if(!chmod($upload_dir."/".$upfile_name,0744)) { 
    error("PERMISSION_DENIED"); 
    exit; 
}

try {

  // 업로드 된 엑셀 형식에 맞는 Reader객체를 만든다.

    $objReader = PHPExcel_IOFactory::createReaderForFile($filename);

    // 읽기전용으로 설정

    $objReader->setReadDataOnly(true);

    // 엑셀파일을 읽는다

    $objExcel = $objReader->load($filename);

    // 첫번째 시트를 선택

    $objExcel->setActiveSheetIndex(0);

    $objWorksheet = $objExcel->getActiveSheet();

    $rowIterator = $objWorksheet->getRowIterator();

    foreach ($rowIterator as $row) { // 모든 행에 대해서

               $cellIterator = $row->getCellIterator();

               $cellIterator->setIterateOnlyExistingCells(false); 

    }

    $maxRow = $objWorksheet->getHighestRow();

    for ($i = 2 ; $i <= $maxRow ; $i++) {

			$PU_liveck = 'N';// 적용유무

			$PU_name = $objWorksheet->getCell('A' . $i)->getValue(); // A열

			$PU_userid = 'k'.$objWorksheet->getCell('B' . $i)->getValue(); // B열

			$PU_phone = $objWorksheet->getCell('I' . $i)->getValue(); // I열

			$PU_phone = str_replace("-","",$PU_phone);

			$PU_Point1_Memo = $objWorksheet->getCell('S' . $i)->getValue(); // S열

			$PU_Point1 = $objWorksheet->getCell('T' . $i)->getValue(); // T열

			$PU_Point2_Memo = $objWorksheet->getCell('U' . $i)->getValue(); // U열

			$PU_Point2 = $objWorksheet->getCell('V' . $i)->getValue(); // V열

			$reg_date = PHPExcel_Style_NumberFormat::toFormattedString($reg_date, 'YYYY-MM-DD'); // 날짜 형태의 셀을 읽을때는 toFormattedString를 사용한다.
			
			$query="
			INSERT INTO {$table_name}(
			PU_liveck,
			PU_userid,
			PU_name,
			PU_phone,
			PU_Point1_Memo,
			PU_Point1,
			PU_Point2_Memo,
			PU_Point2,
			PU_joindate
			)VALUES(
			'{$PU_liveck}',
			'{$PU_userid}',
			'{$PU_name}',
			'{$PU_phone}',
			'{$PU_Point1_Memo}',
			'{$PU_Point1}',
			'{$PU_Point2_Memo}',
			'{$PU_Point2}',
			now()
			);
			";
			//echo $query;
			//exit;
			query($query);
     }

			// 비활성화 포인트 확인
			$result_point=query("select * from Pka_User_K2K9_POINT where PU_liveck = 'N' order by PU_joindate desc");
			for($i=0;$i<$rows_point=fetch_array($result_point) ;$i++ ){
				
				// 가입된 회원인지 확인
				$rows_point1 = f_array("select * from Pka_User where PU_userid = '$rows_point[PU_userid]' order by PU_joindate desc");
				if($rows_point1[PU_userid]){// 가입된 회원
					$PU_han_useful = $rows_point1[PU_han_useful] + $rows_point[PU_Point1];// 보유han
					$PU_han_lockup = $rows_point1[PU_han_lockup] + $rows_point[PU_Point2];// 락업han

					query("UPDATE Pka_User SET PU_han_useful = '$PU_han_useful' , PU_han_lockup = '$PU_han_lockup' WHERE PU_userid = '$rows_point[PU_userid]'");// 유저 han업데이트
					
					//query("UPDATE Pka_Wallet_HAN SET PC_han = PC_han - $PU_han_useful WHERE PC_idx = '1'");// HAN서버 업데이트

					//query("UPDATE Pka_Wallet_HAN SET PC_han = PC_han - $PU_han_lockup WHERE PC_idx = '1'");// HAN서버 업데이트

					query("UPDATE Pka_User_K2K9_POINT SET PU_liveck = 'Y' WHERE PU_userid = '$rows_point[PU_userid]' and PU_idx = '$rows_point[PU_idx]'");// 포인트활성화 업데이트
					
					// 전송로그
					$PTL_status = '1';// 거래상태
					// 거래종류 (1:제휴사 가용HAN입금 2:제휴사 락업HAN입금 3:담보 HAN입금, PKN발행 )
					if($rows_point[PU_Point1]){// 가입된 회원
						$PTL_type = '1';
					}else if($rows_point[PU_Point2]){// 가입된 회원
						$PTL_type = '2';
					}else{
						$PTL_type = '1';
					}
					query("INSERT INTO Pka_Tradelog ( PU_token_val , PTL_status , PTL_type , PTL_han_useful , PTL_han_lockup , PTL_han_lent , PTL_tr_date , PTL_memo ) VALUES ( '$rows_point1[token_val]' , '$PTL_status' , '$PTL_type' , '$rows_point[PU_Point1]' , '$rows_point[PU_Point2]' , '' , now() , '$PU_memo' )");
					// 전송로그
					
				}else{}
			}

			echo "<script>alert('K2K9 회원 포인트 업로드 완료');</script>";
			f_go("k2k9point_excel_list.php"); 

} 

 catch (exception $e) {

    echo '엑셀파일을 읽는도중 오류가 발생하였습니다.';

}

​?>
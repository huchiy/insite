<?include "../../app/inc_head.php";

require_once "../../app/PHPExcel-1.8/Classes/PHPExcel.php"; // PHPExcel.php을 불러와야 하며, 경로는 사용자의 설정에 맞게 수정해야 한다.
$objPHPExcel = new PHPExcel();
require_once "../../app/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php"; // IOFactory.php을 불러와야 하며, 경로는 사용자의 설정에 맞게 수정해야 한다.

$table_name = "Pka_User_K2K9";

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

	$query="
	SELECT MAX(PU_sortnum) as max_sortnum
	FROM {$table_name}
	;";
	$rows = f_array($query);
	$max_sortnum = $rows[max_sortnum];
	$now_sortnum = $max_sortnum+1;

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
			$PU_name = $objWorksheet->getCell('A' . $i)->getValue(); // A열

			$PU_userid = $objWorksheet->getCell('B' . $i)->getValue(); // B열

			$PU_recom = $objWorksheet->getCell('G' . $i)->getValue(); // F열

			$PU_phone = $objWorksheet->getCell('I' . $i)->getValue(); // I열

			$PU_phone = str_replace("-","",$PU_phone);

			$reg_date = PHPExcel_Style_NumberFormat::toFormattedString($reg_date, 'YYYY-MM-DD'); // 날짜 형태의 셀을 읽을때는 toFormattedString를 사용한다.
			
			$query="
			INSERT INTO {$table_name}(
			PU_sortnum,
			PU_userid,
			PU_name,
			PU_phone,
			PU_recom,
			PU_joindate
			)VALUES(
			'{$now_sortnum}',
			'{$PU_userid}',
			'{$PU_name}',
			'{$PU_phone}',
			'{$PU_recom}',
			now()
			);
			";
			//echo $query;
			//exit;
			query($query);
     }

			$query="
			INSERT INTO {$table_name}(
			PU_sortnum,
			PU_userid,
			PU_name,
			PU_phone,
			PU_recom,
			PU_joindate
			)VALUES(
			'{$now_sortnum}',
			'01054405414',
			'정성민',
			'01054405414',
			'01054405414',
			now()
			);
			";
			query($query);

			$query="
			INSERT INTO {$table_name}(
			PU_sortnum,
			PU_userid,
			PU_name,
			PU_phone,
			PU_recom,
			PU_joindate
			)VALUES(
			'{$now_sortnum}',
			'01091697926',
			'조태희',
			'01091697926',
			'01091697926',
			now()
			);
			";
			query($query);

			echo "<script>alert('K2K9 회원 업로드 완료');</script>";
			f_go("k2k9_excel_list.php"); 

} 

 catch (exception $e) {

    echo '엑셀파일을 읽는도중 오류가 발생하였습니다.';

}

​?>
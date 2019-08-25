<?include "../app/inc_head.php";

//$products = [];
//$products = array('Tires', 'Oil', 'Spark Plugs');
//
//array_push($products, '정성민' );
//array_push($products, '아이유' );
//array_push($products, '쯔위' );
//$key = array_search('정성민', $products);
//unset($products[$key]);
//$products = array_values($products);
//$array_encode = array_encode( $products );

$_SESSION[p_PU_idx]='10';
$_SESSION[p_PU_email]='youngkwon315@gmail.com';
$_SESSION[p_token_val]='fviUKLSgNeclZRzwtBCUStQMeXNfBi3jUSkQvg6P';

//query("INSERT INTO Pka_Test ( PU_userid , PU_joindate ) VALUES ( '$array_encode' , now() )");


//$rows_pkn_toss=f_array("select * from Pka_Test order by PU_joindate desc");

//$useImplode_1 = array_decode($rows_pkn_toss[PU_userid]);
//echo $useImplode_1[0];
//print_r($useImplode_1);
//print_r(array_decode($rows_pkn_toss[PU_userid]));
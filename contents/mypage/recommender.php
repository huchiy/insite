<?$menu="3";?>
<?include "../../contents/common/head.php";?>

<style>

	body {
		font-size: 12pt;
		background: #f5f5f5;
		font-family: '나눔고딕', sans-serif;
	}

	.mt15 {
		margin-top: 15px;
	}

	.history p {
		margin: 0 auto;
		font-weight: bold;
	}

	i {
		color: #fff;
	}

	.d-flex {
		display: flex;
	}

	.text-center {
		margin: 15px auto;
	}

	.header {
		background-color: #07c1f2;
		height:50px;
	}

	.cw {
		color: #fff;
	}

</style>

<?if($_SESSION[p_token_val]){
	$rows = f_array("select * from Pka_User where token_val = '$_SESSION[p_token_val]' order by PU_joindate desc");
}else{?>
<?}?>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">
        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left mt15" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal;">커뮤니티</p>
        </div>
    </div>
    <div role="main" class="ui-content">

        <div class="container-fluid" style="padding-left: 0;">
            <!-- <div class="col-xs-12" style="font-size: 10pt; font-weight: bold;">
                나를 추천한 ID
            </div>
 -->
            <!-- <div class="col-xs-6" style="margin-top: 15px;">
                <ul class="blue_ul">
                    <li class="mt5">
                        adsda
                    </li>
                </ul>
            </div>

            <div class="col-xs-6" style="margin-top: 15px;">
                <ul class="blue_ul">
                    <li class="mt5">
                        adasdsa
                    </li>
                </ul>
            </div>



            <div class="col-xs-6">
                <ul class="blue_ul">
                    <li class="mt5">
                        sagrrg
                    </li>
                </ul>
            </div>

            <div class="col-xs-6">
                <ul class="blue_ul">
                    <li class="mt5">
                        kkikuik
                    </li>
                </ul>
            </div>


            <div class="col-xs-6">
                <ul class="blue_ul">
                    <li class="mt5">
                        uujuyj
                    </li>
                </ul>
            </div>


            <div class="col-xs-6">
                <ul class="blue_ul">
                    <li class="mt5">
                        grgrh
                    </li>
                </ul>
            </div> -->
<?
$result_commu=query("select * from Pka_User where PU_recom = '$rows[PU_userid]' order by  PU_idx asc");
for($i=0;$i<$rows_commu=fetch_array($result_commu) ;$i++ ){
?>
			<div class="col-xs-6" style="margin-top: 15px;">
                <ul class="blue_ul">
                    <li class="mt5">
                        <?=$rows_commu['PU_userid']?>
                    </li>
                </ul>
            </div>
<?}?>


        </div>



    </div>

	<?include "../../contents/common/footer.php";?>

</div>
</body>


</html>


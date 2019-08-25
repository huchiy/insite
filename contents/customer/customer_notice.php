<?$customer='Y';?>
<?$menu="4";?>
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

	.d-flex {
		display: flex;
	}

	.text-center {
		margin: 15px auto;
	}

	.header {
		background-color: #07c1f2;
		height:40px;
	}

	.cw {
		color: #fff;
	}


</style>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">


        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="color: #FFFFFF; margin-top: 9px; font-weight: bolder !important;cursor:pointer;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: bold !important; margin-top: 7px; font-size: 12pt;">공지사항</p>
        </div>



    </div>
    <div role="main" class="ui-content">
        <div class="container-fluid "
             style="padding: 0 0 5px 0;  height: 40px;" data-toggle="collapse" data-target="#notice1">
            <div class="col-xs-10" style="font-weight: bold; font-size: 10pt;">
                공지사항 제목 <br/>
                <p style="color: #8E9CB2; font-weight: normal;">2018.00.00</p>
            </div>
            <div class="col-xs-2">
                <i class="fas fa-angle-right" style="color: #dedede; margin-left: 8vw;"></i>
            </div>
        </div>

        <div class="container-fluid " style="padding: 5px 0 5px 0; font-size: 10pt; height: 70px;" id="notice1">
            <div class="col-xs-12">
                공지사항 내용 열림 <br/>
                공지사항 내용 열림 <br/>
                공지사항 내용 열림
            </div>
        </div>


        <div class="container-fluid mt5" style="border-top: solid #dedede;border-width: 1px; padding: 10px 0 10px 0; height: 35px;">
            <div class="col-xs-10" style="font-size: 10pt; font-weight: bold;">
                공지사항 제목 <br/>
                <p style="color: #8E9CB2;  font-weight: normal;">2018.00.00</p>
            </div>
            <div class="col-xs-2">
                <i class="fas fa-angle-right" style="color: #dedede; font-size: 10pt; margin-left: 8vw;"></i>
            </div>
        </div>

        <div class="container-fluid" style="border-top: solid #dedede;border-width: 1px; padding: 10px 0 10px 0; margin-top: 20px;">
            <div class="col-xs-10" style="font-size: 10pt; font-weight: bold;">
                공지사항 제목 <br/>
                <p style="color: #8E9CB2; font-weight: normal;">2018.00.00</p>
            </div>
            <div class="col-xs-2">
                <i class="fas fa-angle-right " style="color: #dedede; font-size: 10pt; margin-left: 8vw;"></i>
            </div>
        </div>
    </div>

	<?include "../../contents/common/footer.php";?>

</div>
</body>


</html>


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
		height: 40px;
	}

	.cw {
		color: #fff;
	}


</style>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">

        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="color: #FFFFFF; margin-top: 9px;cursor:pointer;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">고객센터</p>
        </div>

    </div>
    <div role="main" class="ui-content">

        <div class="container-fluid" style="padding-right: 0; padding-left: 0;">


            <!-- div class="well-sm"
                 style="font-size: 10pt; height: 40px;margin-top: -5px;" onclick="location.href='customer_notice.html'"> -->
			<div class="well-sm"
                 style="font-size: 10pt; height: 40px;margin-top: -5px;" onclick="alert('coming soon')">

                <div class="col-xs-11" style="padding: unset; font-weight: bold; ">
                <p class="my">공지사항</p>
                </div>

                <div class="col-xs-1" style="padding: unset; text-align: right;">
                    <i class="fas fa-chevron-right" style="color: #dedede; "></i>
                </div>

            </div>

            <div class="well-sm" style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;padding-top : 15px;" onclick="location.href='term_of_service'">
			<!-- <div class="well-sm" style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;padding-top : 15px;" onclick="alert('coming soon')"> -->

                <div class="col-xs-11" style=" padding-left: 0; font-weight: bold;">
                <p class="my">이용약관</p>
                </div>

                <div class="col-xs-1" style="padding: unset; text-align: right;">
                    <i class="fas fa-chevron-right" style="color: #dedede; "></i>
                </div>

            </div>

            <div class="well-sm" style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;  padding-top: 15px;" onclick="location.href='term_of_privacy'">
			<!-- <div class="well-sm" style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;padding-top : 15px;" onclick="alert('coming soon')"> -->

                <div class="col-xs-11" style="font-weight: bold; padding-left: 0;">
                <p class="my">개인정보취급방침</p>
                </div>

                <div class="col-xs-1" style="padding: unset; text-align: right;">
                    <i class="fas fa-chevron-right" style="color: #dedede; "></i>
                </div>


            </div>

        </div>


    </div>

	<?include "../../contents/common/footer.php";?>

</div>
</body>


</html>
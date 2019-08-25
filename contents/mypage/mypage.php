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
            <i class="fas fa-chevron-left" style="margin-top: 9px;cursor:pointer;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">마이페이지</p>
        </div>

    </div>
    <div role="main" class="ui-content" style="padding-left: 0; padding-right: 0; padding-top: 5px;">

        <div class="container-fluid">
            <div class="well-sm"
                 style="font-size: 10pt; height: 50px;  padding-top: 15px; font-weight: bold;"
                 onclick="location.href='privacy'">

                <div class="col-xs-11" style="padding: unset;">
                    <p class="my">개인정보관리</p>
                </div>

                <div class="col-xs-1" style="padding: unset; text-align: right;">
                    <i class="fas fa-chevron-right" style="color: #dedede; "></i>
                </div>
            </div>


            <!-- <div class="well-sm"
                 style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;  padding-top: 13px; font-weight: bold;"
                 onclick="location.href='board_consultation'"> -->
			<div class="well-sm"
                 style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;  padding-top: 13px; font-weight: bold;"
                 onclick="alert('coming soon')">

                <div class="col-xs-11" style="padding: unset;">
                    <p class="my">1:1게시판 상담</p>
                </div>

                <div class="col-xs-1" style="padding: unset; text-align: right;">
                    <i class="fas fa-chevron-right" style="color: #dedede; "></i>
                </div>
            </div>


			<!-- <div class="well-sm"
                 style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;  padding-top: 15px; font-weight: bold;"
                 onclick="alert('coming soon')"> -->
			<div class="well-sm"
                 style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;  padding-top: 15px; font-weight: bold;"
                 onclick="location.href='recommender'">


                <div class="col-xs-11" style="padding: unset;">
                    <p class="my">커뮤니티</p>
                </div>

                <div class="col-xs-1" style="padding: unset; text-align: right;">
                    <i class="fas fa-chevron-right" style="color: #dedede; "></i>
                </div>
            </div>

            <!-- <div class="well-sm"
                 style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;  padding-top: 12px; font-weight: bold;"
                 onclick="location.href='point_management'"> -->
			<div class="well-sm"
                 style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;  padding-top: 12px; font-weight: bold;"
                 onclick="alert('coming soon')">


                <div class="col-xs-11" style="padding: unset;">
                    <p class="my">제휴포인트 관리</p>
                </div>

                <div class="col-xs-1" style="padding: unset; text-align: right;">
                    <i class="fas fa-chevron-right" style="color: #dedede; "></i>
                </div>
            </div>

            <div class="well-sm"
                 style="border-top: solid #dedede; border-width: 1px; font-size: 10pt; height: 50px;  padding-top: 12px; font-weight: bold;"
                 onclick="location.href='/contents/member/logout'">


                <div class="col-xs-11" style="padding: unset;">
                    <p class="my">로그아웃</p>
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


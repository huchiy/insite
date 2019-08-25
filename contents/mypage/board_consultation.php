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
            <i class="fas fa-chevron-left" style="margin-top: 9px;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">1:1게시판상담</p>
        </div>


    </div>
    <div role="main" class="ui-content"
         style="padding-bottom: 80px; padding-left: 0; padding-right: 0; padding-top: 10px;">

        <div class="container-fluid"
             style="padding-left: 0; padding-right: 0; height: 125px;"
             data-toggle="collapse" data-target="#consult1">
            <div class="col-xs-2">
                <button type="button" class="btn btn-primary btn-md"
                        style="color: #dedede;background: white;border:solid #dedede;border-width: 1px;font-size: 8pt;height: 20px; padding-top: 1px; padding-left: 0; padding-right: 0; margin-top: 10px; width:60px; margin-left: 0;">
                    답변완료
                </button>

            </div>

            <div class="col-xs-9" style="padding-top: 10px; padding-left: 20px; color: #8E9CB2; font-size: 10pt;">
                2018.00.00 00:00:00
            </div>
            <div class="col-xs-12 mt5" style="font-size: 10pt;">
                <a style="color: red;">Q</a> 고객 상담 제목
            </div>
            <div class="col-xs-12 mt5" style="font-size: 10pt;">
                1:1상담내용<br/>
                1:1상담내용<br/>
                1:1상담내용
            </div>
        </div>

        <div class="container-fluid"
             style=" padding: 10px 0 10px 0;"
             id="consult1">

            <div class="col-xs-1">
                <button type="button" class="btn btn-primary btn-md"
                        style="color: #FFFFFF;background: #07c1f2;border:solid #07c1f2;border-width: 1px;font-size: 8pt;height: 20px; padding-top: 1px; padding-left: 0; padding-right: 0; margin-top: -5px; width:20px; margin-left: 0;">
                A
                </button>
            </div>


            <div class="col-xs-10" style="font-size: 10pt; padding-left: 10px; color: #8E9CB2;">
                2018.00.00 00:00:00
            </div>

            <div class="col-xs-12 mt5" style="font-size: 10pt;">
                내용<br/>
                내용<br/>
                내용
            </div>
        </div>

        <div class="container-fluid"
             style="border-top: solid #dedede;border-width: 1px; padding: 0 0 10px 0;">
            <div class="col-xs-2">
                <button type="button" class="btn btn-primary btn-md"
                        style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 8pt;height: 20px; padding-top: 1px; padding-left: 0; padding-right: 0; margin-top: 9px; width:60px; margin-left: 0;">
                대기중
                </button>
            </div>

            <div class="col-xs-8" style="height: 30px;padding: 10px 0 0 20px; font-size: 10pt; color: #8E9CB2;">
                2018.00.00 00:00:00
            </div>

            <div class="col-xs-2" style="font-size: 10pt; border-color: #dedede;">
                <button type="button" class="btn btn-primary btn-md"
                        style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 8pt;height: 20px; padding-top: 1px; padding-left: 0; padding-right: 0; margin-top: 11px; width:60px; margin-left: -25px; " onclick="del();">
                삭제
                </button>
            </div>

            <div class="col-xs-12 mt10" style="font-size: 10pt;">
                <a style="color: red;">Q</a> 고객 상담 제목
            </div>

            <div class="col-xs-12 mt15" style="font-size: 10pt;">
                1:1상담내용<br/>
                1:1상담내용<br/>
                1:1상담내용
            </div>
        </div>

        <div class="container-fluid"
             style="padding: 0 0 10px 0; border-top: solid #dedede;border-width: 1px;"
             data-toggle="collapse" data-target="#consult2">
            <div class="col-xs-2">
                <button type="button" class="btn btn-primary btn-md"
                        style="color: #dedede;background: white;border:solid #dedede;border-width: 1px;font-size: 8pt;height: 20px; padding-top: 1px; padding-left: 0; padding-right: 0; margin-top: 8px; width:60px; margin-left: 0;">
                답변완료
                </button>
            </div>


            <div class="col-xs-9" style="padding-top: 10px; padding-left: 20px; color: #8E9CB2; font-size: 10pt;">
                2018.00.00 00:00:00
            </div>

            <div class="col-xs-12 mt10" style="font-size: 10pt;">
                <a style="color: red;">Q</a> 고객 상담 제목
            </div>
        </div>

        <div class="container-fluid"
             style=" padding: 0 0 10px 0;"
             id="consult2">
            <div class="col-xs-1">
                <button type="button" class="btn btn-primary btn-md"
                        style="color: #FFFFFF;background: #07c1f2;border:solid #07c1f2;border-width: 1px;font-size: 8pt;height: 20px; padding-top: 1px; padding-left: 0; padding-right: 0; margin-top: -5px; width:20px; margin-left: 0;">
                A
                </button>
            </div>


            <div class="col-xs-10" style="font-size: 10pt; padding-left: 10px; color: #8E9CB2;">
                2018.00.00 00:00:00
            </div>

            <div class="col-xs-12 mt5" style="font-size: 10pt;">
                내용<br/>
                내용<br/>
                내용
            </div>
        </div>


        <div class="col-xs-12" style="border-top: solid #dedede;border-width: 1px;">
            <button type="button" class="img_btn" onclick="location.href='board_write.html'"
                    style="padding: 5px 0 5px 0;background: #07c1f2;color: white;">
                1:1게시판상담 작성
            </button>
        </div>


    </div>

	<?include "../../contents/common/footer.php";?>

</div>
</body>


</html>

<script>
    function del() {
        confirm("삭제하시겠습니까?");
    }
</script>
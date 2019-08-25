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


	.poss_div1 {
		border: solid #07c1f2;
		border-radius: 2vw;
		margin-top: 10px;
		margin-left: 2vw;
		margin-right: 2vw;
		height: 400px;
		background: #fff;
		-webkit-box-shadow: 2px -1px 11px -2px rgba(7, 193, 242, 0.42);
		-moz-box-shadow: 2px -1px 11px -2px rgba(7, 193, 242, 0.42);
		box-shadow: 2px -1px 11px -2px rgba(7, 193, 242, 0.42);
	}

	.con_text {
		width: 100% !important;
		height: 300px !important;
		padding: 12px 20px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		background-color: #f8f8f8;
		font-size: 12px;
		resize: none;
	}

</style>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">


        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="margin-top: 9px;cursor:pointer;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">1:1게시판상담 작성</p>
        </div>


    </div>
    <div role="main" class="ui-content" style="padding-left: 0; padding-right: 0;">


            <div class="col-xs-12">
                <input id="id" type="text" class="form-control" name="email" placeholder="상담제목입력"
                       style="font-size: 10pt;">
            </div>

            <div class="col-xs-12" style="">
                <textarea id="" class="con_text" placeholder="상담내용입력" style="font-size: 10pt;"></textarea>
            </div>
        </div>

        <div class="col-xs-6 " style="padding-right: 7px;">
            <button type="button" class="btn btn-primary btn-block btn-info"
                    style="color: white;background: #07c1f2;border:solid #07c1f2;border-width: 1px; height: 30px; padding-top: 3px;">
                등록
            </button>
        </div>
        <div class="col-xs-6 " style="padding-left: 7px;">
            <button type="button" class="btn btn-primary btn-block btn-info"
                    style="color: black;background: white;border:solid #dedede;border-width: 1px; height: 30px; padding-top: 3px;">
                취소
            </button>
        </div>

	<?include "../../contents/common/footer.php";?>

</div>
</body>


</html>


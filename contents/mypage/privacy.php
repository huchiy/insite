<?$menu="3";?>
<?include "../../contents/common/head.php";?>

<style>
	body {
		font-size: 12pt;
		background: #f5f5f5;
		font-family: '나눔고딕', sans-serif;
	}

	.mt20 {
		margin-top: 20px;
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


	.well {
		background-color: #fff;
		-webkit-box-shadow: 2px -1px 11px -2px rgba(7, 193, 242, 0.42);
		-moz-box-shadow: 2px -1px 11px -2px rgba(7, 193, 242, 0.42);
		box-shadow: 2px -1px 11px -2px rgba(7, 193, 242, 0.42);
		padding-top: 20px;
	}
</style>

<?
if($_SESSION[p_token_val]){
	$rows = f_array("select * from Pka_User where token_val = '$_SESSION[p_token_val]' order by PU_joindate desc");
}else{
}?>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">


        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="margin-top: 9px;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">개인정보관리</p>
        </div>


    </div>
    <div role="main" class="ui-content" style="padding-top: 0;">

        <div class="container-fluid" style="padding-left: 0; padding-right: 0;">

            <div style="height: 43px; margin-top: 10px;">
                <div class="col-xs-12" style="font-size: 10pt; font-weight: bold;">
                    아이디
                </div>
                <div class="col-xs-12" style="font-size: 10pt; font-weight: bold;">
									<?=$rows[PU_userid]?>
                </div>
            </div>


            <!-- <div class="col-xs-12 mt5" style="font-size: 10pt; height: 25px; padding-top: 7px; border-top: solid #dedede; border-width: 1px; font-weight: bold;">
                비밀번호
            </div>
            <div class="col-xs-12" style="font-size: 10pt; height: 30px;">
                <input id="password" type="password" class="form-control" name="password" style="height: 20px;">
            </div> -->

            <div class="col-xs-12 mt20" style="font-size: 10pt; height: 25px; padding-top: 5px; border-top: solid #dedede; border-width: 1px; font-weight: bold;">
                핸드폰번호
            </div>

            <div class="col-xs-12" style="height: 45px; ">
                <?if($rows[PU_phone]){echo phone_bar($rows[PU_phone]);}?>
            </div>

            <div class="col-xs-12" style="padding-top: 5px; font-size: 10pt;height: 25px; border-top: solid #dedede; border-width: 1px; font-weight: bold;">
                회원명
            </div>
            <div class="col-xs-12" style="height: 30px;">
                <?=$rows[PU_name]?>
            </div>

            <div class="col-xs-12 mt20" style="font-size: 10pt; height: 25px; border-top: solid #dedede; border-width: 1px; font-weight: bold; padding-top: 5px;">
                추천링크
            </div>

            <input type="hidden" id="coupon_num" value="http://paykhan.org/contents/member/member_join?ref=<?=$rows[PU_userid]?>">
            <div class="col-xs-12" style="height: 30px;cursor:pointer;" onclick="CopyToClipboard();">
                http://paykhan.org/contents/member/member_join?ref=<?=$rows[PU_userid]?>
				<a type="button" class="btn btn-primary btn-md"
						style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 8pt;height: 20px; padding-top: 1px; padding-left: 0; padding-right: 0; margin-top: 0; margin-left: 5px; width: 60px;z-index:999;">
					링크복사
				</a>
            </div>

            <div class="col-xs-12 mt20" style="font-size: 10pt; height: 25px; border-top: solid #dedede; border-width: 1px; font-weight: bold; padding-top: 5px;">
                ETH지갑주소
            </div>
            <div class="col-xs-12" style="height: 30px;">
                <?=$rows[PU_ethwallet]?>
            </div>


            <div class="col-xs-6 mt20" style="padding-right: 7px; border-top: solid #dedede; border-width: 1px;">
                <button type="button" class="btn btn-primary btn-block btn-info"
                        style="color: white;background: #07c1f2;border:solid #07c1f2;border-width: 1px; height: 30px; padding-top: 3px;"
                        onclick="location.href='privacy_modify'">
                    수정
                </button>
            </div>
            <div class="col-xs-6 mt20" style="padding-left: 7px; border-top: solid #dedede; border-width: 1px;">
                <button type="button" class="btn btn-primary btn-block btn-info"
                        style="color: black;background: white;border:solid #dedede;border-width: 1px; height: 30px; padding-top: 3px;" onclick="location.href='/contents/paykhan/paykhan'">
                    취소
                </button>
            </div>


        </div>

    </div>
	
	<?include "../../contents/common/footer.php";?>

</div>
</body>


</html>


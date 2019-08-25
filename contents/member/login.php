<?$loginspot='Y';?>
<?$menu="1";?>
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


</style>

<?if($_SESSION[p_token_val]){?>
	<script>location.replace('/contents/paykhan/paykhan');</script>
<?}else{?>
	<!-- <script>alert('로그인 후 이용해주세요.');location.replace('/contents/member/login.php');</script> -->
<?}?>

<script>
	function login_sub() {
		var frm=document.login_frm;

		if(!$('#PU_userid').val()){alert('아이디를 입력해주세요.');$('#PU_userid').focus();return;}
		if(!$('#PU_passwd').val()){alert('비밀번호를 입력해주세요.');$('#PU_passwd').focus();return;}

		frm.submit();
	}
</script>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">
        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="margin-top: 10px;cursor:pointer;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 8px; font-size: 12pt;">로그인<?=$_SESSION[p_token_val]?></p>
        </div>
    </div>

	<!-- form-horizontal -->
	<form name="login_frm" action="login_ok" method="post" enctype="multipart/form-data" onSubmit="return login_sub(this);" target="db_frame">
	<input type="hidden" name="rt_page" value="<?=$_SERVER['HTTP_REFERER']?>">

    <div role="main" class="ui-content" style="margin-bottom: 50px;">

        <div class="container-fluid" style="padding-left: 0;padding-right: 0;">
            <div style="text-align: center;padding-top: 15px">
                <img src="../../assets/images/logo.png" class="img" style="width: 80px;">
            </div>

            <div class="col-xs-12 mt20 h30" style="padding-left: 0;padding-right: 0;">
                <input id="PU_userid" name="PU_userid" type="text" class="form-control" placeholder="아이디" maxlength="20" value="<?=$_COOKIE['p_PU_userid']?>">
            </div>
            <div class="col-xs-12 mt15 h30" style="padding-left: 0;padding-right: 0;">
                <input id="PU_passwd" name="PU_passwd" type="password" class="form-control" placeholder="비밀번호" maxlength="20" onkeypress="JavaScript:ent_q('login_sub()')">
            </div>
        </div>
        <div class="container" style="height: 30px;padding-left: 0;padding-right: 0;">
            <div class="col-xs-6 mt15" style="padding-left: 0;padding-right: 0;">
                <label style="background: white;border: none; font-size: 8pt; ">
                    <input type="checkbox" id="id_save" name="id_save" value="Y" checked>
                    &nbsp;아이디저장
                </label>
            </div>

            <div class="col-xs-6 mt15" style="padding-left: 0;padding-right: 0;">
                <label style="background: white;border: none; font-size: 8pt;">
                    <input type="checkbox" id="login_save" name="login_save" value="Y" checked>
                    &nbsp;로그인유지
                </label>
            </div>

            <div class="col-xs-12 h30 mt30" style="padding-left: 0;padding-right: 0;">
                <button type="button" class="btn btn-primary btn-md"
                        style="color: white;background: #07c1f2;padding-right: 0;" onclick="login_sub();">로그인
                </button>
            </div>
            <div class="col-xs-12 mt15 h30" style="padding-left: 0;padding-right: 0;">
                <button type="button" class="btn btn-primary btn-md"
                        onclick="location.href='/contents/member/member_join'"
                        style="background: white;color: #07c1f2;padding-right: 0;">회원가입
                </button>
            </div>

            <div class="col-xs-6"
                 style="border-right: solid #dedede;border-width:1px;text-align:  center;vertical-align: middle;margin-top: 20px;height: 20px;padding-left: 0;padding-right: 0;display:">
                <label class="" style="vertical-align: middle;color: #8E9CB2;font-size: 8pt;cursor:pointer;"
                       onclick="location.href='/contents/member/id_find'">
                    아이디찾기
                </label>
            </div>
            <div class="col-xs-6 h30"
                 style="text-align:  center;vertical-align: middle;margin-top: 20px;color: #8E9CB2; padding-left: 0;padding-right: 0;display:;">
                <label class="" style="color: #8E9CB2;font-size: 8pt;cursor:pointer;"
                       onclick="location.href='/contents/member/pwd_find'">
                    비밀번호찾기
                </label>
            </div>
        </div>
    </div>

	</form>

    <?include "../../contents/common/footer.php";?>

</div>
</body>


</html>


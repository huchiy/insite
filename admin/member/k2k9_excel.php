<?include "../common/head.php";?>

<script>
	function upload_sub() {
		var frm=document.excel_frm;

		if(!$('#filename').val()){alert('파일을 선택해주세요.');$('#filename').focus();return;}

		frm.submit();
	}
</script>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <br/>
								<?include "../common/sidebar.php";?>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                ETH 시세 0 / w 0
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <h2>K2K9 회원 업로드</h2>

                            <div class="x_content">
                                <br/>

                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" name="excel_frm" method="post" enctype="multipart/form-data" action="k2k9_excel_ok.php" target="db_frame">

                                    <div class="form-group">
																			<label class="control-label col-md-12 col-sm-12 col-xs-12" for="last-name" style="text-align: left;">
																			<input type="file" id="filename" name="filename"><br/>
																			ex)<a href="/files/excel/190430.xlsx">회원목록-190430.xlsx</a>
																			</label>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div  style="text-align: center;">
                                            <button class="btn btn-primary" type="button" onclick="upload_sub()">업로드</button>
                                            <button class="btn btn-primary" type="reset" onclick="location.href='k2k9_excel_list.php'">취소</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

				<?include "../common/footer.php";?>

    </div>
</div>

</body>
</html>
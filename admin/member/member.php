<?include "../common/head.php";?>

<?
if($PU_idx){
	$rows_userinfo = f_array("select * from Pka_User where PU_idx = '$PU_idx' order by PU_joindate desc");
	$Pfiles_userinfo=explode("/",$rows_userinfo[PU_files]);
	if($Pfiles_userinfo[1]){
		$img_Name = imgName($Pfiles_userinfo[1]); //파일명
		$profile_img = "/files/userinfo_thumb/{$img_Name}.thumb";
	}else if($rows_userinfo[PU_Imageurl]){
		$profile_img = $rows_userinfo[PU_Imageurl];
	}else{
		$profile_img = "/assets/images/user.png";
	}
}else{
}?>

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
				<?include "../common/top.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <h2> 상세정보</h2>

                  <div class="x_content">
                    <br />
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <th scope="row" colspan="4">회원정보</th>
                        </tr>
                        <tr>
                          <th scope="row" style="text-align: center;line-height:150px;">이미지링크</th>
                          <td style="text-align: left;" colspan="3">
														<img src="<?=$profile_img?>" style="width:150px;height:150px;"/>
													</td>
                        </tr>
                        <tr>
                          <th style="text-align: center;">프로필</th>
                          <td style="text-align: left;" colspan="3"><?=$rows_userinfo[PU_profile]?></td>
                        </tr>
                        <tr>
                          <th scope="row" style="text-align: center;">회원명</th>
                          <td style="text-align: center;"><?=$rows_userinfo[PU_name]?></td>
                          <th style="text-align: center;">가입일시</th>
                          <td style="text-align: center;"><?=$rows_userinfo[PU_joindate]?></td>
                        </tr>
                        <tr>
                          <th scope="row" style="text-align: center;">아이디</th>
                          <td style="text-align: center;"><?=$rows_userinfo[PU_userid]?></td>
                          <th style="text-align: center;">이메일</th>
                          <td style="text-align: center;"><?=$rows_userinfo[PU_email]?></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>






            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../assets/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../assets/admin/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../../assets/admin/vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../assets/admin/build/js/custom.min.js"></script>
  </body>
</html>
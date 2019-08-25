<?include "../common/head.php";?>

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

                            <h2>사이트 설정</h2>


                            <div class="x_content">
                                <br />
                                <div class="table-responsive" style="overflow-x: unset;">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                        </thead>

                                        <tbody>
                                        </tbody>

                                    </table>
                                </div>

                            </div>

                            <!-- <div style="text-align: center;">
                                <a class="btn btn-default" style="color: #73879C;" onclick="save();">저장</a>
                            </div> -->

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

<script>
    function save() {
        confirm ("저장하시겠습니까?");
    }
</script>
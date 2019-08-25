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


	* {
		margin: 0;
		padding: 0;
	}

	body {
		margin: 100px;
	}

	.pop-layer .pop-container {
		padding: 20px 25px;
	}

	.pop-layer p.ctxt {
		color: #666;
		line-height: 25px;
	}

	.pop-layer .btn-r {
		width: 100%;
		margin: 10px 0 20px;
		padding-top: 10px;
		border-top: 1px solid #DDD;
		text-align: right;
	}

	.pop-layer {
		display: none;
		position: absolute;
		top: 50%;
		left: 50%;
		width: 410px;
		height: auto;
		background-color: #fff;
		z-index: 10;
	}

	.charge-layer {
		display: none;
		position: fixed;
		_position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 100;
	}

	.charge-layer .dimBg {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: #000;
		opacity: .5;
		filter: alpha(opacity=50);
	}

	.charge-layer .pop-layer {
		display: block;
		width: 80%;
		height: 200px;
	}

	a.btn-layerClose {
		display: inline-block;
		height: 25px;
		padding: 0 14px 0;
		font-size: 13px;
		color: #fff;
		line-height: 25px;
	}

	a.btn-layerClose:hover {
		color: #fff;
	}

</style>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">

        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="margin-top: 9px;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">제휴포인트 관리</p>
        </div>


    </div>
    <div role="main" class="ui-content">

        <div class="col-xs-8 mt5" style="font-size: 10pt; font-weight: bold;">
            T-money 카드관리
        </div>

        <div class="col-xs-4">
            <button type="button" class="img_btn" name="charge" href="#layer2"
                    style="padding: 0 0 0 0;background: #fff;color: #07c1f2;border: solid #07c1f2;border-width: 1px; font-weight: normal; width: 60px; margin-left: 35px;">
                충전하기
            </button>

            <div class="charge-layer">
                <div class="dimBg"></div>
                <div id="layer2" class="pop-layer">
                    <div class="pop-container" style="padding-top: 0;">
                        <div class="pop-conts">
                            <!--content //-->
                            <div class="col-xs-12" style="padding:0 0 0 0; text-align: center; margin-top: 10px; font-size: 10pt; font-weight: bolder;">
                                 T-money카드 충전하기
                            </div>

                            <div class="col-xs-8" style="padding:0 0 0 0; text-align: left; margin-top: 10px; font-size: 10pt;">
                                가용 PayKhan
                            </div>

                            <div class="col-xs-4" style="padding:0 0 0 0; text-align: right; margin-top: 10px; font-size: 10pt;">
                                17.487
                            </div>

                            <div class="col-xs-8" style="padding:0 0 0 0; text-align: center; margin-top: 0; font-size: 10pt; height: 25px;">
                            </div>

                            <div class="col-xs-4" style="padding:0 0 0 0; text-align: right; margin-top: 0; color: red; font-size: 10pt;">
                            w 1,700.7
                            </div>

                            <div class="col-xs-12" style="padding:0 0 0 0; text-align: left; margin-top: 10px; font-size: 10pt;">
                                충전금액
                            </div>

                            <div class="col-xs-8" style="padding:0 0 0 0; text-align: center; margin-top: 0; font-size: 10pt; height: 25px;">
                            </div>

                            <div class="col-xs-4" style="padding:0 0 0 0; text-align: right; margin-top: 0; font-size: 10pt;">
                            w 1,700
                            </div>

                            <div class="col-xs-6" style="padding-right: 0;">
                                <button type="button" class="btn btn-primary btn-block btn-info"
                                        style="color: white;background: #07c1f2;border:solid #07c1f2;border-width: 1px; height: 30px; padding-top: 3px;"
                                        onclick="join();">확인
                                </button>
                            </div>

                            <div class="col-xs-6 btn-layerClose" style="padding-left: 15px; padding-right: 0; padding-top: 0px;">
                                <button type="button" class="btn btn-primary btn-block btn-info"
                                        style="color: #8E9CB2;background: #ffffff;border:solid #8E9CB2;border-width: 1px; height: 30px; padding-top: 3px;" onclick="$('.charge-layer').fadeOut();">
                                    취소
                                </button>
                            </div>
                            <!--// content-->
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-xs-12" style="padding:0 0 0 0;">
            <input id="id" type="text" class="form-control" name="email" style="height: 20px;">
        </div>


        <div class="col-xs-12">
            <button type="button" class="img_btn" onclick=""
                    style="padding: 5px 0 5px 0;background: #07c1f2;color: white;">
                카드번호 저장
            </button>
        </div>


    </div>

	<?include "../../contents/common/footer.php";?>

</div>
</body>


</html>

<script>
    $('.img_btn').click(function(){
        var $href = $(this).attr('href');
        layer_popup($href);
    });
    function layer_popup(el){

        var $el = $(el);        //레이어의 id를 $el 변수에 저장
        var isDim = $el.prev().hasClass('dimBg');   //dimmed 레이어를 감지하기 위한 boolean 변수

        isDim ? $('.charge-layer').fadeIn() : $el.fadeIn();

        var $elWidth = ~~($el.outerWidth()),
            $elHeight = ~~($el.outerHeight()),
            docWidth = $(document).width(),
            docHeight = $(document).height();

        // 화면의 중앙에 레이어를 띄운다.
        if ($elHeight < docHeight || $elWidth < docWidth) {
            $el.css({
                marginTop: -$elHeight /2,
                marginLeft: -$elWidth/2
            })
        } else {
            $el.css({top: 0, left: 0});
        }

        $el.find('a.btn-layerClose').click(function(){
            isDim ? $('.charge-layer').fadeOut() : $el.fadeOut(); // 닫기 버튼을 클릭하면 레이어가 닫힌다.
            return false;
        });

        $('.layer .dimBg').click(function(){
            $('.charge-layer').fadeOut();
            return false;
        });

    }
</script>
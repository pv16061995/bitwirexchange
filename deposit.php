<?php include 'include/allheader.php';?>
<?php
   page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
    header("location:logout.php");
 }
 $user_session = $_SESSION['user_session'];
   $url_api = URL_API;

$postData = array(
  "userMailId"=>$user_session
  );

// Create the context for the request
$context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));




if(isset($_GET['curr']))
{
  $currencyname=base64_decode($_GET['curr']);


  switch ($currencyname) {
        case 'INRW':
                if($_SESSION['INRWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/INRW/getNewINRWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/INRW/getINRWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

                
            
        break;
        case 'USDW':
          if($_SESSION['USDWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/USDW/getNewUSDWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/USDW/getUSDWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'GBPW':
          if($_SESSION['GBPWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/GBPW/getNewGBPWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/GBPW/getGBPWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'BRLW':
        if($_SESSION['BRLWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/BRLW/getNewBRLWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/BRLW/getBRLWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'PLNW':
          if($_SESSION['PLNWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/PLNW/getNewPLNWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/PLNW/getPLNWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'CADW':
           if($_SESSION['CADWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/CADW/getNewCADWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/CADW/getCADWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'TRYW':
          if($_SESSION['TRYWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/TRYW/getNewTRYWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/TRYW/getTRYWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'RUBW':
         if($_SESSION['RUBWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/RUBW/getNewRUBWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/RUBW/getRUBWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'MXNW':
          if($_SESSION['MXNWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/MXNW/getNewMXNWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/MXNW/getMXNWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'CZKW':
          if($_SESSION['CZKWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/CZKW/getNewCZKWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/CZKW/getCZKWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'ILSW':
          if($_SESSION['ILSWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/ILSW/getNewILSWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/ILSW/getILSWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'NZDW':
          if($_SESSION['NZDWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/NZDW/getNewNZDWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/NZDW/getNZDWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'JPYW':
           if($_SESSION['JPYWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/JPYW/getNewJPYWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/JPYW/getJPYWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'SEKW':
           if($_SESSION['SEKWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/SEKW/getNewSEKWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/SEKW/getSEKWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        
        case 'AUDW':
           if($_SESSION['AUDWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/AUDW/getNewAUDWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/AUDW/getAUDWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
         case 'EURW':
          if($_SESSION['EURWAddress']=== false)
                {
                  $response = file_get_contents($url_api.'/EURW/getNewEURWAddress', false, $context);

                          $responseData = json_decode($response, true);
                        if (isset($responseData)) {
                            $bcc_address = $responseData['newaddress'];
                        }
                }
                
                else
                {
                    $response = file_get_contents($url_api.'/EURW/getEURWAddressByAccount', false, $context);
                        $responseData = json_decode($response, true);
                    
                    if (isset($responseData)) {
                        $bcc_address = $responseData['listaddress'][0];
                    }
                }

        break;
        

        
    }



}
?>



<div class="content">

	<link href="css/usercenter.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<?php include 'include/left_side_menu.php';?>


<script type="text/javascript">
	$(document).ready(function() {

		var accordion_head = $('.accordion > li > a'),
			accordion_body = $('.accordion li > .sub-menu');

		var found = false;
		for (i = 0; i < accordion_body.length; i++) {
			item = accordion_body.eq(i).find("[data-id='withdraw_coin']");
			if (item.length > 0) {
				accordion_head.eq(i).addClass('active').next().slideDown('normal');
				item.css({'background':' #d4f5f6','border-left-color':'#c1e3e4','border-right-color':'#c1e3e4'});
				found = true;
				break;
			}
		}
		if (found == false)
			accordion_head.eq(2).addClass('active').next().slideDown('normal');

		accordion_head.on('click', function(event) {

			event.preventDefault();

			if ($(this).attr('class') != 'active'){
				accordion_body.slideUp('normal');
				$(this).next().stop(true,true).slideToggle('normal');
				accordion_head.removeClass('active');
				$(this).addClass('active');
			}
		});
		var icoType='';
		if(icoType==''){
			$("#buyIco").parent("li").remove()
		}

		$("input").focus(function(){
			$(".failed").html("")
		});

		$(".files,.cloud,.mail").find("li").click(function () {
			$.cookie('nav_index', 2,{ path: '/' });
		});
		$(".sign").find("li").click(function () {
			$.cookie('nav_index', 3,{ path: '/' });
		});

		var url=window.location.href,
			pagename=url.split('nt/')[1];
		$('a[data-id="'+pagename+'"]').addClass("mactive");
		if(url.indexOf('?coin_withdraw') > -1 || url.indexOf('aw/') > -1){
			$('a[data-id=withdraw_coin]').addClass("mactive");
		} else if(url.indexOf('?coin_deposit') > -1 || url.indexOf('it/') > -1){
			$('a[data-id=deposit_coin]').addClass("mactive");
		}
		if(url.indexOf('totp/') > -1){
			$('a[data-id=totp]').addClass("mactive");
		}

		$(window).scroll(function () {
			var scrH=$(window).scrollTop();var accHeight=$(".myacc-con").height();
			if(accHeight>834) {
				if (scrH > 100) {
					if(scrH > accHeight-721) {
						$("#marketlist_wrapper").css({"position": "absolute", "top": "", "bottom": "10px", "width": "100%"});
					} else {
						$("#marketlist_wrapper").css({"position": "fixed", "top": "10px", "bottom": "", "width": "22%"});
					}
				} else {
					$("#marketlist_wrapper").attr("style", "");
				}
			}
		});
	});
</script>

	<div class="main_content  acc-m-con">


			<div class='right_mcontent  myacc-con'>
          <div class="m_title"><a href='#'><h4>Tether <?php echo $currencyname;?> Deposit </h4></a></div>
			<div class="sectioncont">

				Please send <?php echo $currencyname;?> to this address: <br><br>
				<input class='coin_add' style='font-size:26px;' readonly value="<?php echo $bcc_address; ?>">
				<br>Or Scan QR code:<br>
				<img src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php echo $bcc_address;?>"
                                                alt="QR Code" style="width:200px;border:0;"/>
												<br>
				<br><br>

			</div>

			<br>
			<div class="m_title"><h4>Trading Markets</h4></div>
			<div class="sectioncont">
				<table class='sf-grid'>
					<tr>
					</tr>
				</table>
			</div>

			<br>


			<div class="m_title"><h4>Recent deposit records</h4></div>
			<div class="sectioncont">

				<table class='sf-grid'>
				  <tr> <td align='right'><b>Date</b></td>
					   <td align='right'><b>Amount</b></td>
					   <td align='right' ><b>Status</b></td>
                  </tr>

                </table>

			</div>

			<br>
		<br>


	</div> <!-- right_mcontent -->
  </div> <!-- main content -->


</div>


<?php include 'include/footer.php'; ?>
<script>
    $(function(){

		var pb=$("#ProgressBar"),pbWidth=pb.width(),loginbar=$("#topLoginBar"),tmenu=$("#tierMenu"),barcon=$("#pbCon"),barmark=barcon.find("i"),pbar=$("#proBar"),fbar=$("#fproBar"),pro_val='0.0';
		loginbar.hover(function(){
            tmenu.stop().slideDown(200);
            $(this).stop().css("color","#f80");
			barmark.css("opacity","0");
			pbar.animate({width:pro_val+'%'},800);
        },function(){
            tmenu.stop().slideUp(100);
             $(this).stop().css("color","#fff");
			 barmark.css("opacity","1");
			 pbar.css('width','0');
        });
		tmenu.css("width",pbWidth);
		fbar.animate({width:pro_val+'%'},800);
        if(pro_val > 0){
            fbar.addClass("has-pro-val");
        }

		 $.fn.animateProgress = function(progress, callback) {
			return this.each(function() {
			  $(this).animate({
				width: progress+'%'
			  }, {
				duration: 800,
				easing: 'swing',
				step: function( progress ){
				    $('.value').text(Math.ceil(progress) + '%');
				},
				complete: function(scope, i, elem) {
				  if (callback) {
					callback.call(this, i, elem );
				  };
				}
			  });
			});
		  };
		  if(pro_val=='') barcon.animateProgress(0); else barcon.animateProgress(pro_val);

          var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
        if (lh < mh){lb.css("height",mh)}
        $(".side-sev ul li").hover(function(){
            var _this=$(this);
            _this.find(".sidebox").stop().animate({"width":"165px"},2).css({"background":"#009173"});
        },function(){
            $(this).find(".sidebox").stop().animate({"width":"45px"},2).css({"background":"none"});
        });

        $("#bottomWXli").hover(function(){
            $(".wx-bottom").show()
        },function(){
            $(".wx-bottom").hide()
        });
		$("#runTime").hover(function(){
			$(this).css("height","auto")
        },function(){
			$(this).css("height","26px")
        });
        var notyContent='SMT(SmartMesh) is listed on gate.io(10 million bonus)';

        function notyCookie() {
            var noticeMsg = $("#siteNotyCon").text();
            $.cookie('notice', noticeMsg, { expires: 365, path: '/' });
        }

        var annCookie = $.cookie('notice');
        if(annCookie != notyContent &&  notyContent != ''){
            var sNoty=$("#siteNoty").noty({
                text: "【Notice】: <a id='siteNotyCon' href='/article/16307' target='_blank'>"+notyContent+"</a>",
                type: 'error',
                layout: 'top',
                theme: 'gateioNotyTheme',
                closeWith: ['button'],
                animation: { speed: 0 },
                callback: {
                    afterShow: function() {
                        $("#siteNotyCon").click(function () {
                            notyCookie();
                            sNoty.close();
                        })
                    },
                    onClose: function() {
                        $("#siteNoty").animate({ height:0 },100).css("border","none");
                        notyCookie()
                    }
                }
            });
        }

    });

    //backtotop
    (function() {
        var $backToTopTxt = "^", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
                .text($backToTopTxt).click(function() {
                    $("html, body").animate({ scrollTop: 0 }, 500);
                }), $backToTopFun = function() {
            var st = $(document).scrollTop(), winh = $(window).height();
            (st > 0)? $backToTopEle.show(): $backToTopEle.hide();

            if (!window.XMLHttpRequest) {
                $backToTopEle.css("top", st + winh - 166);
            }
        };
        $(window).bind("scroll", $backToTopFun);
        $(function() { $backToTopFun(); });
    })();

    //主题
    $("#theme").find("li").click(function(){
        var theme = $(this).attr("id");
        if(theme == 'light') {
            $("#darkStyle").attr("disabled","disabled");
            $('#lightChart').click();
            $("#tradelist").removeClass("dark-tradelist");
            $("body").removeClass("dark-body");
        } else {
            $("#darkStyle").removeAttr("disabled");
            $('#darkChart').click();
            $("#tradelist").addClass("dark-tradelist");
            $("body").addClass("dark-body");
        }

        $.cookie("mystyle",theme,{expires:30, path: '/' });
        $(this).addClass("cur-theme").siblings().removeClass("cur-theme");
    });
    var cookie_style = $.cookie("mystyle");
    if(cookie_style == 'light' || typeof(cookie_style) == 'undefined'){
        $("#light").addClass("cur-theme");
    } else {
        $("#dark").addClass("cur-theme");
        $("#tradelist").addClass("dark-tradelist");
    }


</script>
</body>
</html>

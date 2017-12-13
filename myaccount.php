<?php include 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?= PROJECT_TITLE?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/io.style.css" rel="stylesheet" type="text/css">
    <link href="favicon.ico" rel="shortcut icon">
    <link href="css/theme_dark.css" rel="stylesheet" type="text/css" id="darkStyle" disabled="disabled">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/apple-touch-icon-120x120.png"/>
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/jquery.common.tools.js?v=123"></script>

</head>
<body class="en-body ">
<?php include 'include/allheader.php'; ?>


<div class="content">

	<link href="css/usercenter.css" rel="stylesheet" type="text/css">

<table class="leftbar" style="padding-top: 15px">
    <tbody><tr>
    <td style="border-bottom:0;" valign="top">
		<div id="marketlist_wrapper" class="dataTables_wrapper" role="grid">
		<table class="marketlist dataTable" id="tradelist" cellspacing="0" cellpadding="0">
			<tbody role="alert" aria-live="polite" aria-relevant="all">
			<tr>
				<td class="no-wrap alignRight" style=" width:100%;border:none">
				<div id="wrapper-250">
					<ul class="accordion">
						<li id="adn1" class="files"> <a href="#adn1">My funds<span class="umicon"></span></a>
						 <ul class="sub-menu">
							<li><a data-id='myfunds' href="/myaccount/myfunds"><em>01</em>My balances</a></li>
							<!--
							<li><a data-id='interest' href="/myaccount/interest"><em>02</em>Daily interest</a></li>
							<li><a data-id='dividend' href="/myaccount/dividend"><em>03</em>My dividend</a></li>
							-->
							<li><a data-id='myreferrals' href="/myaccount/myreferrals"><em>04</em>My Referrals</a></li>
							<li><a data-id='mypurselog' href="/myaccount/mypurselog"><em>05</em>My Billing Details</a></li>
						  </ul>
						</li>

						<li id="adn2" class="cloud"> <a href="#adn2">Orders<span class="umicon"></span></a>
						 <ul class="sub-menu">
							<li><a data-id='myorders' href="/myaccount/myorders"><em>06</em>Open orders</a></li>
							<li><a data-id='myhistory' href="/myaccount/myhistory"><em>07</em>Trade history</a></li>
						  </ul>
						</li>

						<li id="adn3" class="mail"> <a href="#adn3">Deposit/Withdrawal<span class="umicon"></span></a>
						  <ul class="sub-menu">
							<li><a data-id='deposit_coin' href="/myaccount/myfunds?coin_deposit#wallet"><em>16</em>Coin deposit</a></li>
							<li><a data-id='withdraw_coin' href="/myaccount/myfunds?coin_withdraw#wallet"><em>17</em>Coin withdrawal</a></li>
							<li><a data-id='deposit_gatecode' href="/myaccount/deposit_gatecode"><em>18</em>Redeem GateCode</a></li>
							<li><a data-id='mydeposits' href="/myaccount/mydeposits"><em>15</em>Recent Deposits</a></li>
							<li><a data-id='mywithdrawals' href="/myaccount/mywithdrawals"><em>15</em>Recent Withdrawals</a></li>
						  </ul>
						</li>
						<li id="adn4" class="sign"> <a href="#adn4">Security Settings<span class="umicon"></span></a>
						  <ul class="sub-menu">
							<li><a data-id='totp' href="/myaccount/totp"><em>20</em>Two-factor Authentication</a></li>
							<li><a data-id='sms_setup' href="/myaccount/sms_setup"><em>19</em>SMS Setup</a></li>
							<li><a data-id='apikeys' href="/myaccount/apikeys"><em>21</em>API Keys</a></li>
							<li><a data-id='resetpw' href="/resetpw"><em>22</em>Change login password</a></li>
							<li><a data-id='resetfpw' href="/resetfpw"><em>23</em>Change fund password</a></li>
							<li><a data-id='mylogs' href="/myaccount/mylogs"><em>24</em>Security logs</a></li>
						  </ul>
						</li>
					</ul>
				</div>
				</td>
			</tr>
			</tbody>
		</table>
		</div>
	</td>
	</tr>
	</tbody>
</table>


<script type="text/javascript">
	$(document).ready(function() {
		// Store variables
		/*var accordion_head = $('.accordion > li > a'),
			accordion_body = $('.accordion li > .sub-menu');
		// Open the first tab on load
		//accordion_head.first().addClass('active').next().slideDown('normal');
		//accordion_body.eq(2).find('a').eq(2).css('background', ' #efefef');
		var found = false;
		for (i = 0; i < accordion_body.length; i++) {
			item = accordion_body.eq(i).find("[data-id='']");
			if (item.length > 0) {
				accordion_head.eq(i).addClass('active').next().slideDown('normal');
				item.css({'background':' #d4f5f6','border-left-color':'#c1e3e4','border-right-color':'#c1e3e4'});
				found = true;
				break;
			}
		}
		if (found == false)
			accordion_head.eq(2).addClass('active').next().slideDown('normal');
		// Click function
		accordion_head.on('click', function(event) {
			// Disable header links
			event.preventDefault();
			// Show and hide the tabs on click
			if ($(this).attr('class') != 'active'){
				accordion_body.slideUp('normal');
				$(this).next().stop(true,true).slideToggle('normal');
				accordion_head.removeClass('active');
				$(this).addClass('active');
			}
		});*/

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

		//左菜单active标识
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





















			<style>
    .funds-p-tier b{width: 50%;text-align: right;padding-right: 8px;}
    .en-body .fund-deposit,.en-body .fund-withdraw,.en-body .fund-to-trade{ width: 68px}
    .sectioncont .all-funds-table.dataTable thead tr td:last-child, .sectioncont .all-funds-table.dataTable tr td:last-child {width: 25%;}
    .f-d-info {min-height: 187px;}
</style>
<ul class="my-top-info clearfix">
	<li>
		<h3>My ID</h3>
		<b>653933</b>
	</li>
	<li>
		<h3>Current Tier</h3>
		<strong class="tier-level tier-icon0"></strong>
			</li>
	<li>
		<h3>Trading Fee Discount</h3>
		<strong>0% Off</strong>
	</li>
	<li>
		<h3>30-day Trading Volume</h3>
		<strong>0</strong><i class="vol30-unit"> BTC</i> <!--<div class="fund-top-small">or <strong>0</strong> CNY</div>-->
	</li>
</ul>
<div class="lv-prog">
	<span class="pro-dtl">You need <strong class="red">3.0</strong> BTC or <strong class="red">336271</strong> CNY to reach next tier.</span>
	<div id="fprogrLi">
		<div id="fproBar"><span>Progress Toward Next Tier: <b>0.0%</b></span></div>
	</div>
</div>
<div id="crFund">Total funds estimation:
	<i class="red">0.00 USD</i> or <i class="red">0.00000 BTC</i>
	<!--<p class="fund-tips">注：资金总估是由历史行情估算值，仅为用户提供一个参考，请以单项资金为准</p>-->
</div>
<div class="sectioncont funds-dtl myfunds-dtl">
    <div class="m_title" id="wallet"> Currencies: </div>
    <div class="HideZeroDiv pull-left" id="hideZbtn">
        <label for="hidezero">
        <input type="checkbox" id="hidezero"  name='hidezero' style="width: 20px;" />
        <label for="hidezero" class="vr-btn"></label>
        <span class="hidezero-span">Hide zero balances</span>
        </label>
        <input type="hidden" id="min"><input type="hidden" id="max">
    </div>
    <table id="funds" class='dataTable sf-grid all-funds-table' cellspacing="0" cellpadding="0">
        <thead>
            <tr role="row" style="height:40px">
                <th align='right'><b>Type</b></th>
                <th align='right'><b>Balance</b></th>
                <th align='right'><b>In Orders</b></th>
                <th align='right'><b>Total</b></th>
                <th align='right'><b>USD Estimation</b></th>
                <th align='right'><b>Operation</b></th>
            </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-usdt'></span><span style='color:#08a287'><b>USDT</b> Tether</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/USDT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/USDT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/usdt_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-btc'></span><span style='color:#f79118'><b>BTC</b> Bitcoin</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BTC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/BTC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/ltc_btc' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-ltc'></span><span style='color:#888'><b>LTC</b> Litecoin</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/LTC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/LTC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/ltc_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-eth'></span><span style='color:#3d6e91'><b>ETH</b> Ethereum</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/ETH' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/ETH' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/eth_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-bch'></span><span style='color:#7aad5c'><b>BCH</b> BCH</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BCH' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/BCH' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/bch_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-etc'></span><span style='color:#639370'><b>ETC</b> Ethereum Classic</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/ETC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/ETC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/etc_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-zec'></span><span style='color:#c7871f'><b>ZEC</b> ZCash</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/ZEC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/ZEC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/zec_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-qtum'></span><span style='color:#007dc7'><b>QTUM</b> Qtum</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/QTUM' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/QTUM' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/qtum_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-qtum_eth'></span><span style='color:#3d6e91'><b>QTUM_ETH</b> Qtum ETH Token</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/QTUM_ETH' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/QTUM_ETH' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/qtum_eth_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-xrp'></span><span style='color:#3174ad'><b>XRP</b> Ripple</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/XRP' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/XRP' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/xrp_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-doge'></span><span style='color:#ba9738'><b>DOGE</b> DogeCoin</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/DOGE' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/DOGE' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/doge_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-btg'></span><span style='color:#c59318'><b>BTG</b> BTG</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BTG' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/BTG' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/btg_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-hsr'></span><span style='color:#544589'><b>HSR</b> HShare</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/HSR' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/HSR' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/hsr_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-bcd'></span><span style='color:#fcc339'><b>BCD</b> BCD</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BCD' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/BCD' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/bcd_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-qsp'></span><span style='color:#000'><b>QSP</b> Quantstamp</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/QSP' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/QSP' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/qsp_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-neo'></span><span style='color:#58be23'><b>NEO</b> Neo</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/NEO' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/NEO' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/neo_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-gas'></span><span style='color:#58be23'><b>GAS</b> Gas</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/GAS' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/GAS' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/gas_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-dgd'></span><span style='color:#516677'><b>DGD</b> DigixDAO</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/DGD' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/DGD' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/dgd_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-gnt'></span><span style='color:#000'><b>GNT</b> Golem</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/GNT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/GNT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/gnt_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-fil'></span><span style='color:#184974'><b>FIL</b> IPFS 6-month</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/FIL' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/FIL' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/fil_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-bot'></span><span style='color:#5560f9'><b>BOT</b> Bodhi</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BOT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/BOT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/bot_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-ink'></span><span style='color:#000'><b>INK</b> Ink</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/INK' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/INK' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/ink_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-qbt'></span><span style='color:#14c7c6'><b>QBT</b> Qbao</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/QBT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/QBT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/qbt_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-knc'></span><span style='color:#167267'><b>KNC</b> Kyber</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/KNC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/KNC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/knc_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-rdn'></span><span style='color:#000'><b>RDN</b> Raiden</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/RDN' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/RDN' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/rdn_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-link'></span><span style='color:#4a83b3'><b>LINK</b> ChainLink</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/LINK' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/LINK' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/link_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-cdt'></span><span style='color:#000'><b>CDT</b> CoinDash</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/CDT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/CDT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/cdt_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-ae'></span><span style='color:#de3f6b'><b>AE</b> Aeternity</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/AE' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/AE' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/ae_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-powr'></span><span style='color:#05bca9'><b>POWR</b> PowerLedger</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/POWR' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/POWR' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/powr_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-med'></span><span style='color:#05bca9'><b>MED</b> MediBloc</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/MED' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/MED' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/med_eth' class='err-depo fund-to-trade' title='Suspended.'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-qash'></span><span style='color:#173aaa'><b>QASH</b> LIQUID</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/QASH' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/QASH' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/qash_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-mds'></span><span style='color:#000'><b>MDS</b> MediShares</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/MDS' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/MDS' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/mds_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-sbtc'></span><span style='color:#000'><b>SBTC</b> SuperBitcoin</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/SBTC' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/SBTC' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/sbtc_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-god'></span><span style='color:#221568'><b>GOD</b> BitcoinGod</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/GOD' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/GOD' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/god_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-bcx'></span><span style='color:#221568'><b>BCX</b> BCX</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BCX' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/BCX' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/bcx_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-mana'></span><span style='color:#f47e33'><b>MANA</b> Decentraland</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/MANA' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/MANA' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/mana_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-smt'></span><span style='color:#007dc7'><b>SMT</b> SmartMesh</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/SMT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/SMT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/smt_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-rcn'></span><span style='color:#3146fd'><b>RCN</b> Ripio</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/RCN' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/RCN' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/rcn_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-trx'></span><span style='color:#000'><b>TRX</b> TRON</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/TRX' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/TRX' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/trx_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-ppt'></span><span style='color:#112b44'><b>PPT</b> Populous</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/PPT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/PPT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/ppt_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-arn'></span><span style='color:#3677b7'><b>ARN</b> Aeron</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/ARN' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/ARN' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/arn_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-wtc'></span><span style='color:#1754da'><b>WTC</b> Walton</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/WTC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/WTC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/wtc_eth' class='err-depo fund-to-trade' title='Suspended.'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-veri'></span><span style='color:#ff962e'><b>VERI</b> Veritaseum</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/VERI' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/VERI' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/veri_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-bnt'></span><span style='color:#0c112e'><b>BNT</b> Bancor</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BNT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/BNT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/bnt_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-ven'></span><span style='color:#b175d7'><b>VEN</b> Vechain</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/VEN' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/VEN' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/ven_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-mco'></span><span style='color:#052449'><b>MCO</b> Monaco</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/MCO' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/MCO' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/mco_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-fun'></span><span style='color:#032646'><b>FUN</b> FunFair</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/FUN' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/FUN' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/fun_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-data'></span><span style='color:#000'><b>DATA</b> Streamr</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/DATA' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/DATA' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/data_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-rlc'></span><span style='color:#f9dd01'><b>RLC</b> iExec</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/RLC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/RLC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/rlc_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-zsc'></span><span style='color:#267cc3ssss'><b>ZSC</b> Zeusshield</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/ZSC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/ZSC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/zsc_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-wings'></span><span style='color:#19ee82'><b>WINGS</b> Wings</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/WINGS' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/WINGS' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/wings_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-gvt'></span><span style='color:#355666'><b>GVT</b> GenesisVision</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/GVT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/GVT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/gvt_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-kick'></span><span style='color:#5c51a3'><b>KICK</b> KickCoin</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/KICK' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/KICK' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/kick_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-mda'></span><span style='color:#22a650'><b>MDA</b> Moeda</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/MDA' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/MDA' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/mda_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-ctr'></span><span style='color:#936f02'><b>CTR</b> Centra</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/CTR' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/CTR' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/ctr_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-req'></span><span style='color:#0e5787'><b>REQ</b> Request</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/REQ' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/REQ' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/req_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-dpy'></span><span style='color:#3b53b2'><b>DPY</b> Delphy </span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/DPY' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/DPY' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/dpy_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-tnt'></span><span style='color:#fc4e8a'><b>TNT</b> Tierion </span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/TNT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/TNT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/tnt_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-llt'></span><span style='color:#049bf0'><b>LLT</b> LLToken </span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/LLT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/LLT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/llt_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-lrc'></span><span style='color:#043859'><b>LRC</b> Loopring</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/LRC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/LRC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/lrc_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-dnt'></span><span style='color:#29368e'><b>DNT</b> district0x</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/DNT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/DNT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/dnt_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-zrx'></span><span style='color:#0e1010'><b>ZRX</b> 0xProject</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/ZRX' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/ZRX' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/zrx_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-stx'></span><span style='color:#6f2532'><b>STX</b> Stox</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/STX' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/STX' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/stx_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-bcdn'></span><span style='color:#0e9ef0'><b>BCDN</b> BlockCDN</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BCDN' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/BCDN' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/bcdn_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-pst'></span><span style='color:#e65850'><b>PST</b> Primas</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/PST' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/PST' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/pst_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-oax'></span><span style='color:#254375'><b>OAX</b> OpenANX</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/OAX' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/OAX' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/oax_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-storj'></span><span style='color:#338dfc'><b>STORJ</b> Storj</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/STORJ' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/STORJ' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/storj_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-cvc'></span><span style='color:#3db12a'><b>CVC</b> Civic</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/CVC' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/CVC' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/cvc_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-omg'></span><span style='color:#1654f5'><b>OMG</b> OmiseGo</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/OMG' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/OMG' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/omg_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-pay'></span><span style='color:#303031'><b>PAY</b> TenX</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/PAY' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/PAY' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/pay_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-eos'></span><span style='color:#36383e'><b>EOS</b> EOS</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/EOS' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/EOS' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/eos_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-snt'></span><span style='color:#4b54ba'><b>SNT</b> Status</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/SNT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/SNT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/snt_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-bat'></span><span style='color:#9b394e'><b>BAT</b> BasicAttentionToken</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BAT' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/BAT' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/bat_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-btm'></span><span style='color:#232427'><b>BTM</b> Bytom</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/BTM' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/BTM' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/btm_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-rep'></span><span style='color:#7e506c'><b>REP</b> Augur</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/REP' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/REP' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/rep_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-cnc'></span><span style='color:#a9802f'><b>CNC</b> CHNcoin</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/CNC' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/CNC' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/cnc_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-dash'></span><span style='color:#1673bc'><b>DASH</b> Dash</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/DASH' class='normal-depo fund-deposit' title='Working'>Deposit</a>
					<a href='/myaccount/withdraw/DASH' class='normal-depo fund-withdraw' title='Working'>Withdraw</a>
					<a href='/trade/dash_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-xtc'></span><span style='color:#d48c2f'><b>XTC</b> TileCoin</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/XTC' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/XTC' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/xtc_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-tips'></span><span style='color:#485e7e'><b>TIPS</b> FedoraCoin</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/TIPS' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/TIPS' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/TIPS_ltc' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='even hangb'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-tix'></span><span style='color:#7b5d1a'><b>TIX</b> LotteryTickets</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/TIX' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/TIX' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/tix_eth' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                            <tr class='odd hanga'  data-id=zero >
                    <td align='right'><span class='icon-16 icon-16-xmr'></span><span style='color:#f96206'><b>XMR</b> Monero</span></td>
                    <td align='right'>0.000000</td>
                    <td align='right' class=no-od>0.000000</td>
                    <td align='right'>0.000000</td>
                    <td align='right'>0.00</td>
                    <td align='right'>
					<a href='/myaccount/deposit/XMR' class='err-depo fund-deposit' title='Suspended for maintenance.'>Deposit</a>
					<a href='/myaccount/withdraw/XMR' class='err-depo fund-withdraw' title='Suspended for maintenance.'>Withdraw</a>
					<a href='/trade/xmr_usdt' class='normal-depo fund-to-trade' title='Working'>Trade</a></td>
                </tr>
                    </tbody>
    </table>


   <div class="m_title"> Recent Deposits (<a href='/myaccount/mydeposits'>More...</a>): </div>
    <table class='sf-grid table-inacc table-inacc-head'>
			<thead>
			<tr>
				<th><b>No.</b></th>
				<th align='left'><b>Time</b></th>
				<th align='right'><b>Amount</b></th>
				<th align='right'><b>TxID</b></th>
				<th align='right'><b>Confirmations</b></th>
				<th align='right'><b>Status</b></th>
			</tr>
		</thead>
	</table>
	<div class="table-scroll">
		<table class='sf-grid table-inacc table-inacc-body' id="latestDepo">
			<tbody>
							<tr class="table-empty">
					<td style="text-align: center"><p><i>i</i>No record.</p></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="m_title"> Recent Withdrawals (<a href='/myaccount/mywithdrawals'>More...</a>): </div>
    <table class='sf-grid table-inacc table-inacc-head'>
			<thead>
			<tr>
				<th><b>No.</b></th>
				<th align='left'><b>Time</b></th>
				<th align='right'><b>Amount</b></th>
				<th align='right'><b>Address/TXID</b></th>
				<th align='right'><b>Status</b></th>
				<th align='right'><b>Operations</b></th>
			</tr>
		</thead>
	</table>
	<div class="table-scroll">
		<table class='sf-grid table-inacc table-inacc-body' id="latestWith">
			<tbody>
							<tr class="table-empty">
					<td style="text-align: center"><p><i>i</i>No record.</p></td>
				</tr>
			</tbody>
		</table>
	</div>
    <p>Current server time: <b>2017-12-13 18:49:27 UTC+8</b></p>
</div>
<br>
<script src="js/jquery.dataTables.min.js"></script>
<script>
    $.fn.dataTable.ext.search.push( //推送有资金的区间给datatable
            function( settings, data, dataIndex ) {
                var min = parseFloat( $('#min').val());
                var max = parseFloat( $('#max').val());
                var acc = parseFloat( data[1] ) || 0; // 总金额列数据
                if ( ( isNaN( min ) && isNaN( max ) ) ||
                        ( isNaN( min ) && acc <= max ) ||
                        ( min <= acc   && isNaN( max ) ) ||
                        ( min <= acc   && acc <= max ) )
                {
                    return true;
                }
                return false;
            }
    );

	function cancel_withdraw(uid, wid){
		var json_req = {
			type : "cancel_withdraw",
			uid : uid,
			wid : wid
		};
		$.ajax({type:"get",url:"/json_svr/exchange/?u=21", data:json_req, xhrFields: { withCredentials: true},
			success : function(data, textStatus){
				var json_res = data;
				if ( json_res && json_res.result ) {
					view_code = "<div class='cancel_content'>Cancelled!</div>";
					noty({text: view_code, type: "success",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 5000, callback: {onShow: function() {}}});
				}else{
					view_code = "<div class='cancel_content'>Failed! "+json_res.msg+"</div>";
					noty({text: view_code, type: "warning",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 10000, callback: {onShow: function() {}}});
				}
			},
			error : function(){
				noty({text: "Network error", type: "error",layout: "bottomLeft", closeWith : ['button', 'click'],theme : 'gateioNotyTheme', timeout: 10000, callback: {onShow: function() {}}});
			},
			complete : function(){
			}
		});
	}

    $( function () {

        var tableIndex=$('#funds').DataTable({
            "dom": '<"top"f>rt<"bottom"ip><"clear">',
            "pageLength": 12,
            "autoWidth": false,
            "language": {
                "sInfoEmpty":"0 matching records",
                "sSearch": ""
            },
            "order": [
                [4, null]
            ],//改第5列排序为默认
            "columnDefs": [
                { "orderable": false, "targets": [ 5 ] }
            ]
        });

		tableIndex.on('draw.dt',function() {
			var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
			lb.css("height",mh)
		});
		/*tableIndex.on('page.dt',function() {
			$("html, body").animate({ scrollTop: $('#wallet').offset().top }, 10);
		});*/
        //检测cookie,只显示有资金币种
        if ($.cookie('show_zero_funds') === undefined || $.cookie('show_zero_funds') === '0') {//显示全部
            $('#hidezero').prop('checked', false).removeClass('zero-active');
            $('#min,#max').val('');
            tableIndex.draw();
        } else { //只显示有资金
            $('#hidezero').prop('checked', true).addClass('zero-active');
            $('#min').val('0.00000001');
            $('#max').val('9999999999');
            tableIndex.draw();
        }

        $('#hideZbtn').on('click', function() { //点击显示/隐藏有资金币种按钮

            if ($('#hidezero').hasClass("zero-active")) { //有资金币种显示
                $('#min,#max').val('');
                tableIndex.draw();
                setTimeout(function(){$('#hidezero').removeClass('zero-active')},200);
                $.cookie('show_zero_funds', '0',{ expires:30,path: '/' });

            } else { //全部币种显示
                $('#min').val('0.00000001');
                $('#max').val('9999999999');
                tableIndex.draw();
                setTimeout(function(){$('#hidezero').addClass('zero-active')},200);
                $.cookie('show_zero_funds', '1',{ expires:30,path: '/' });

            }
        });

		var $dep=$("#latestDepo"), $wit=$("#latestWith");
		if($dep.find("tr").size() > 5){
			$dep.parent().css("padding-right","10px").prev("table").css("padding-right","26px");
		} else if($dep.find("tr").size() == 1){
			$dep.find(".table-empty").show()
		}
		if($wit.find("tr").size() > 5){
			$wit.parent().css("padding-right","10px").prev("table").css("padding-right","26px");
		} else if($wit.find("tr").size() == 1){
			$wit.find(".table-empty").show()
		}
		$("td:contains('Done')").css("color","#008069");
		$("td:contains('Cancelled')").css("color","#888");
		$("td:contains('Rejected')").css("color","#a00");
		$("td:contains('Pending')").css("color","#dc9a00");
		$("td:contains('Verifying')").css("color","#f60");
		$("td:contains('Processing')").css("color","#0086b3");

});

</script>


		<br>
















































	</div> <!-- right_mcontent -->
  </div> <!-- main content -->


</div>
<?php include 'include/footer.php'; ?>

<!-- force user to use https -->


<script>
    $(function(){
    //     //nav标记
    //     var currUrl=window.location.toString();
    //     if(currUrl.indexOf('/trade/') > 0){
    //         $.cookie('nav_index', 1,{ path: '/' });
    //     } else if(currUrl.indexOf('/login') > 0 || currUrl.indexOf('/article/') > 0 || currUrl.indexOf('/page/') > 0 || currUrl.indexOf('/fee') > 0){
    //         $.cookie('nav_index', 9,{ path: '/' });
    //     } else if(currUrl.indexOf('/coins') > 0){
    //         $.cookie('nav_index', 4,{ path: '/' });
    //     }
    //     $(".gateio-nav").children("li").click(function () {
    //         $.cookie('nav_index', $(this).index(),{ path: '/' });
    //     }).eq($.cookie('nav_index')).addClass("nav-active");
    //     $(".user-log-out a,.more-lan a").click(function () {
    //         $.cookie('nav_index', 0,{ path: '/' });
    //     });
		// //用户等级
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

        //页面高度
        var lb=$(".leftbar"), mc=$(".main_content"),lh=lb.height(),mh=mc.height();
        if (lh < mh){lb.css("height",mh)}

        //右侧客户服务
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

        //全站重要通知
        var notyContent='SMT(SmartMesh) is listed on gate.io(10 million bonus)';

        function notyCookie() { //设置通知cookie
            var noticeMsg = $("#siteNotyCon").text();
            $.cookie('notice', noticeMsg, { expires: 365, path: '/' });
        }
        //
        // var annCookie = $.cookie('notice');
        // if(annCookie != notyContent &&  notyContent != ''){ //通知有更新时
        //     var sNoty=$("#siteNoty").noty({
        //         text: "【Notice】: <a id='siteNotyCon' href='/article/16307' target='_blank'>"+notyContent+"</a>",
        //         type: 'error',
        //         layout: 'top',
        //         theme: 'gateioNotyTheme',
        //         closeWith: ['button'],
        //         animation: { speed: 0 },
        //         callback: {
        //             afterShow: function() {
        //                 $("#siteNotyCon").click(function () {
        //                     notyCookie();
        //                     sNoty.close();
        //                 })
        //             },
        //             onClose: function() {
        //                 $("#siteNoty").animate({ height:0 },100).css("border","none");
        //                 notyCookie()
        //             }
        //         }
        //     });
        // }

    });

    //backtotop
    (function() {
        var $backToTopTxt = "^", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
                .text($backToTopTxt).click(function() {
                    $("html, body").animate({ scrollTop: 0 }, 500);
                }), $backToTopFun = function() {
            var st = $(document).scrollTop(), winh = $(window).height();
            (st > 0)? $backToTopEle.show(): $backToTopEle.hide();
            //IE6下的定位
            if (!window.XMLHttpRequest) {
                $backToTopEle.css("top", st + winh - 166);
            }
        };
        $(window).bind("scroll", $backToTopFun);
        $(function() { $backToTopFun(); });
    })();

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
        //$("link[title!='"+theme+"']").attr("disabled","disabled");
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

    function toThousands(num) {
        var num = (num || 0).toString(), result = '';
        while (num.length > 3) {
            result = ',' + num.slice(-3) + result;
            num = num.slice(0, num.length - 3);
        }
        if (num) { result = num + result; }
        return result;
    }
    $("#usdtAll").text(toThousands(37489002));
    $("#btcAll").text(toThousands(1006));
    $("#ltcAll").text(toThousands(16239));
    $("#ethAll").text(toThousands(25649));

</script>
</body>
</html>

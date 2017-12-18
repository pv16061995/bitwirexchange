<div id='sectioncont' class="buy-sell-order clearfix">
  <div id='tableAskList' data-id="sectioncont">

  

  <div class="maichu">
  <div class="b-s-title clearfix">
     <div class="b-s-t-left">Last BID <?= $currency1;?><span class="unit-symbol" id="orderUnitSymbol"></span><span class="unit-symbol hide" id="cnySymbol"></span><span class="red" id='orderbook_last_BID'></span></div>
      <br>

      <div class="b-s-t-left">Last BID <?= $currency2;?><span class="unit-symbol" id="orderUnitSymbol"></span><span class="unit-symbol hide" id="cnySymbol"></span><span style="margin:10px;" class="red" id='orderbook_lastbid'></span></div>
</div>
    <div class="m_con maidan">
      <box padding-bottom=0 class= "right-list list" >
      <li class= "title-line sorting" style="height:30px; margin-top:15px;border-bottom: 1px solid #e4ebf0">
          <span class= "right-align price" ><b>Price</b></span>
          <span class= "volume right-align" ><b>Amount</b></span>
          <span class= "total right-align" ><b>Total(BTC)</b></span>
        </li>

        <table id="bid-list">
       
        </table>
      </box>
    </div>
  </div>

  <div class="mairu">
    <div class="b-s-title clearfix">
      <div class="b-s-t-left">Last ASK <?= $currency1;?><span class="unit-symbol" id="orderUnitSymbol"></span><span class="unit-symbol hide" id="cnySymbol"></span><span class="red" id='orderbook_last_ASK'></span></div>
      <br>

      <div class="b-s-t-left">Last ASK <?= $currency2;?><span class="unit-symbol" id="orderUnitSymbol"></span><span class="unit-symbol hide" id="cnySymbol"></span><span style="margin:10px;" class="red" id='orderbook_lastask'></span></div>
      
    </div>
    <div class="m_con maidan">
      <box padding-bottom=0 class= "right-list list" >
          <li class= "title-line sorting" style="height:30px; margin-top:15px;border-bottom: 1px solid #e4ebf0">
          <span class= "right-align price" ><b>Price</b></span>
          <span class= "volume right-align" ><b>Amount</b></span>
          <span class= "total right-align" ><b>Total(BTC)</b></span>
        </li>
        <table id="ask-list" >
        
        </table>
      </box>
    </div>
  </div>



  
  <?php include 'include/functions.php';?>

</div>


<script type="text/javascript" src="js/sails.io.js"></script>
<script type="text/javascript">
  io.sails.url = 'http://209.188.21.216:1338';
  window.ioo = io;
  socket = io.connect( 'http://209.188.21.216:1338', {
    reconnection: true,
    reconnectionDelay: 1000,
    reconnectionDelayMax : 5000,
    reconnectionAttempts: 99999
  });

  socket.on( 'connect', function () {} );
  socket.on( 'disconnect', function () { socket.connect();  } );
</script>
<script>
url_api = '<?php echo URL_API;?>';

 function bidAmount() {
          var a = document.getElementById('bid_rate').value;
          var b = document.getElementById('bid_vol').value;
          var result = parseFloat(a) * parseFloat(b);
          if (!isNaN(result)) {
              total=document.getElementById('bid_amount').value = result;
          }
    }
     function bidAmountTotal()
      {
          var res=document.getElementById('bid_amount').value;
          var a = document.getElementById('bid_vol').value;
          var b = document.getElementById('bid_rate').value;
          if(res)
          {
            var equal=res/b;
            document.getElementById('bid_vol').value=equal;
          }

      }
      function askAmount() {
          var a = document.getElementById('ask_rate').value;
          var b = document.getElementById('ask_vol').value;
          var result = parseFloat(a) * parseFloat(b);
          if (!isNaN(result)) {
              tatal=document.getElementById('ask_amount').value = result;

          }
      }
      function askTotalAmount()
      {
        var a = document.getElementById('ask_amount').value;
        var b = document.getElementById('ask_vol').value;
        var res =document.getElementById('bid_rate').value;
          if(res)
          {
            var equal=res/b;
            document.getElementById('bid_vol').value=equal;
          }

      }

function sell_data(){



var ask_rate = document.getElementById('ask_rate').value;
var ask_vol = document.getElementById('ask_vol').value;
var ask_amount = document.getElementById('ask_amount').value;

var sub_curr='<?php echo substr($currency1,0,3);?>';
var main_curr='<?php echo   strtolower($currency2);?>';

if(ask_rate !='' && ask_vol !='0' && ask_amount !='0')
{

<?php if(isset($_SESSION['user_id'])){
?>
user_id = '<?php echo $_SESSION['user_id']; ?>';
var askownerId=user_id;

var url=url_api+"/trademarket"+main_curr+sub_curr.toLowerCase()+"/addAsk"+sub_curr+"Market";

var json_ask = {
"askAmount<?php echo  $currency2;?>":ask_amount,
"askAmount<?php echo substr($currency1,0,3);?>":ask_vol,
"askRate":ask_rate,
"askownerId":askownerId
}


$.ajax({
type: "POST",
contentType: "application/json",
url: url,
data: JSON.stringify(json_ask),
success: function(result){


$('#alertmsg1').empty();

if (result.statusCode!=200)
{
     $('#alertmsg1').append('<div class="alert alert-danger"><strong> &nbsp;'+result.message+'</strong>  </div>');

}
}
});
<?php }else{?>

$('#alertmsg1').html('<div class="alert alert-danger"><strong>Please Login First !!!</strong>  </div>');
<?php }?>
}else{
$('#alertmsg1').html('<div class="alert alert-danger"><strong>Please filled price and amount first !!!</strong>  </div>');
}
}



function buy_data(){



var bid_rate = document.getElementById('bid_rate').value;
var bid_vol = document.getElementById('bid_vol').value;
var bid_amount = document.getElementById('bid_amount').value;

var sub_curr='<?php echo substr($currency1,0,3);?>';
var main_curr='<?php echo   strtolower($currency2);?>';

if(bid_rate !='' && bid_vol !='0' && bid_amount !='0')
{

<?php if(isset($_SESSION['user_id'])){
?>
var user_id = '<?php echo $_SESSION['user_id']; ?>';

var bidownerId=user_id;

var url=url_api+"/trademarket"+main_curr+sub_curr.toLowerCase()+"/addBid"+sub_curr+"Market";


var json_ask = {
      "bidAmount<?php echo  $currency2;?>":bid_amount,
      "bidAmount<?php echo substr($currency1,0,3);?>":bid_vol,
      "bidRate":bid_rate,
      "bidownerId":bidownerId,

}


$.ajax({
type: "POST",
contentType: "application/json",
url: url,
data: JSON.stringify(json_ask),
success: function(result){


$('#alertmsg').empty();

if (result.statusCode!=200)
  {
     $('#alertmsg').append('<div class="alert alert-danger"><strong> &nbsp;'+result.message+'</strong>  </div>');

}
}
});
<?php }else{?>

$('#alertmsg').html('<div class="alert alert-danger"><strong>Please Login First !!!</strong>  </div>');
<?php }?>
}else{
$('#alertmsg').html('<div class="alert alert-danger"><strong>Please filled price and amount first !!!</strong>  </div>');
}
}

getAllDetailsOfUser();
getAllAskTotal();
getAllBidTotal();
orderBookBid();
orderBookAsk();
getUsermaincurrencyBalance();
getUsersubcurrencyBalance();


function getAllDetailsOfUser(){
    $.ajax({
      type: "POST", url: url_api+ "/user/getAllDetailsOfUser",
      data: {
        userMailId: '<?php echo $_SESSION['user_id']; ?>'
        
      },
      success: function(res)
      {
        console.log("working",res);
         getUsermaincurrencyBalance(res);
          getUsersubcurrencyBalance(res);

      },
      error: function(err){
      }
    });
  }
  function getUsermaincurrencyBalance(res){
    $('#balance_bid_able').empty();
    $('#balance_bid_freeze').empty();
    $('#balance_bid_able').append(res.user.BTCbalance.toFixed(5)+" ");
    $('#balance_bid_freeze').append(res.user.FreezedBTCbalance+" ");
  }
  function getUsersubcurrencyBalance(res){
    
    $('#balance_ask_able').empty();
    $('#balance_ask_freeze').empty();
    $('#balance_ask_able').append(res.user.INRbalance+" ");
    $('#balance_ask_freeze').append(res.user.FreezedINRbalance+" ");
  }
function getAllAsk(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/trademarketbtcinr/getAllAskINR",
      data: {},
      success: function(data){
        
        console.log(data.asksINR);

      }
    });
  }

  function getAllBid(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/trademarketbtcinr/getAllBidINR",
      data: {},
      success: function(data){
       
  console.log("wprking",data.bidsINR);

        }
      });
    }
  
  function getAllAskTotal(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/trademarketbtcinr/getAllAskINR",
      data: {},
      success: function(data){
        
        $('#orderbook_last_ASK').empty();
        $('#orderbook_lastask').empty();
        if(data.askAmountBTCSum && data.askAmountINRSum){
        $('#orderbook_lastask').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
        $('#orderbook_last_ASK').append(" &nbsp;"+data.askAmountINRSum.toFixed(5) +"");

        }

      }
    });
  }

  function getAllBidTotal(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/trademarketbtcinr/getAllBidINR",
      data: {},
      success: function(data){
        
        var bid_orders = data;
        $('#orderbook_last_BID').empty();
        $('#orderbook_lastbid').empty();
        if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountINRSum){
           $('#orderbook_lastbid').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
           $('#orderbook_last_BID').append(" &nbsp;"+bid_orders.bidAmountINRSum.toFixed(5)+"");
        }
      }
    });
  }
  function orderBookBid(){
          $.ajax({
          type: "POST",
          contentType: "application/json",
          url: url_api+"/trademarketbtcinr/getAllBidINR",
          data: {},
          success: function(data){

          var bid_orders = data;
          $('#bid-list').empty();

          if(data.bidsINR){
          for (var i = 0; i < 10; i++) {
          if(i==bid_orders.bidsINR.length) break;
          if(data.bidsINR[i].status != 1){

          $('#bid-list').append('<tr><td> BID </td><td>'+ bid_orders.bidsINR[i].bidRate + '</td><td>' + bid_orders.bidsINR[i].bidAmountINR + '</td><td>' + bid_orders.bidsINR[i].bidAmountBTC + '</td></tr>')
        }
      }
    }
  }
});
}
  function orderBookAsk() {
                $.ajax({
                type: "POST",
                contentType: "application/json",
                url: url_api+"/trademarketbtcinr/getAllAskINR",
                data: {},
                success: function(data){

                $('#ask-list').empty();
                if(data.asksINR){
                for (var j = 0; j < 10; j++){
                if(j==data.asksINR.length) break;
                if(data.asksINR[j].status != 1){

                $('#ask-list').append('<tr><td> ASK  </td><td>' + data.asksINR[j].askRate + '</td><td>' + data.asksINR[j].askAmountINR + '</td><td>' + data.asksINR[j].askAmountBTC + '</td></tr>');
                }
          }
        }
      }
  });
}
  io.socket.on('INR_ASK_ADDED', function askCreated(data){
    
    getAllAskTotal();
    orderBookAsk(data);
    });
  io.socket.on('INR_BID_ADDED', function bidCreated(data){
   
    getAllBidTotal();
    orderBookBid(data);
     
    });
   io.socket.on('INR_BID_DESTROYED', function bidCreated(data){

      orderBookBid(data);
    });
   io.socket.on('INR_ASK_DESTROYED', function askCreated(data){

      orderBookAsk(data);
    });
   io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $_SESSION['user_id']; ?>' },function(err,details){
      getUsermaincurrencyBalance();
      getUsersubcurrencyBalance();

    });
  
</script>

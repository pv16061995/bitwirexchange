<?php
class allapi
{

  public function getallcategory()
  {
    $data = array(
      array(
        "id" => "1",
        "name" => "BTC",

         "subcat"=>array(
          "INRW/BTC","USDW/BTC","EURW/BTC","GBPW/BTC","BRLW/BTC","PLNW/BTC","CADW/BTC","TRYW/BTC","RUBW/BTC","MXNW/BTC","CZKW/BTC","ILSW/BTC","NZDW/BTC","JPYW/BTC","SEKW/BTC","AUDW/BTC"
          ),

        "sort" => 1
      ),
      array(
        "id" => 2,
        "name" => "BCH",

       "subcat"=>array(
          "INRW/BCH","USDW/BCH","EURW/BCH","GBPW/BCH","BRLW/BCH","PLNW/BCH","CADW/BCH","TRYW/BCH","RUBW/BCH","MXNW/BCH","CZKW/BCH","ILSW/BCH","NZDW/BCH","JPYW/BCH","SEKW/BCH","AUDW/BCH"
          ),

        "sort" => 2
      ),
      array(
        "id" => 3,
        "name" => "LTC",

         "subcat"=>array(
          "INRW/LTC","USDW/LTC","EURW/LTC","GBPW/LTC","BRLW/LTC","PLNW/LTC","CADW/LTC","TRYW/LTC","RUBW/LTC","MXNW/LTC","CZKW/LTC","ILSW/LTC","NZDW/LTC","JPYW/LTC","SEKW/LTC","AUDW/LTC"
          ),

        "sort" => 3
      )
    );
    $data=json_encode($data);
      return $data;
  }

 
}
?>

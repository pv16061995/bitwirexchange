<?php
class allapi
{

  public function getallcategory()
  {
    $data = array(
      array(
        "id" => "1",
        "name" => "BTC",
        "sort" => 1
      ),
      array(
        "id" => 2,
        "name" => "BCH",
        "sort" => 2
      ),
      array(
        "id" => 3,
        "name" => "LTC",
        "sort" => 3
      )
    );
    $data=json_encode($data);
      return $data;
  }
}
?>

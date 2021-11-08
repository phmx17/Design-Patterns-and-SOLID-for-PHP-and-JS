<?php 
/**
 * Obersvable
 */
  require_once 'StockInterface.php';
  class Google Implements StockInterface{
    public $stockTitle = 'Google';
    public $stockPrice;
    public function __construct($price)
    {
      $this->stockPrice = $price;
    }
    public function update($price){
      $upDown = rand(0, 1);
      if ($upDown == 0){
        $this->stockPrice += $price;
      } else {
        $this->stockPrice -= $price;
      }
      echo "<p>$this->stockTitle current price: $$this->stockPrice</p>";
    }
  }

?>
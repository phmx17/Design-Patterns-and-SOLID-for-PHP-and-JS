<?php 
/**
 * Obersvable
 */
  require_once 'StockInterface.php';
  class StockMaker Implements StockInterface{
    public $stockTitle;
    public $stockPrice;
    public function __construct($title, $price)
    {
      $this->stockTitle = $title;
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
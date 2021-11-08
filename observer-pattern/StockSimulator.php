<?php 
/**
 * Observer
 */
  require 'StockSimInterface.php';
  class StockSimulator implements StockSimInterface{
    public $companyStocks = [];
    public $priceIndex;     

    public function addCompanyStock(StockInterface $company){
      $this->companyStocks[] = $company;
      echo "<h3>added: $company->stockTitle at price: $company->stockPrice </h3>";
    }

    public function updateCompanyStock($priceIndex){
      foreach($this->companyStocks as $stock){
        $stock->update($priceIndex);
      }
    }

    public function generateCurrentPrice(){
      $this->priceIndex = rand(0, 10) / 10;
      $this->updateCompanyStock($this->priceIndex);
    }
  }
?>
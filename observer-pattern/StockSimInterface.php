<?php 
  interface StockSimInterface{
    public function addCompanyStock(StockInterface $company);
    public function updateCompanyStock($price);
    public function generateCurrentPrice();
  }
?>
<?php 
  class Account{
    private $accountNumber;
    public $accountHolder;
    public function __construct($accountNumber, $accountHolder)
    {
      $this->accountNumber = $accountNumber;
      $this->accountHolder = $accountHolder;
    }
    public function getAccountInfo(){
      return [
        'account number' => $this->accountNumber,
        'account holder' => $this->accountHolder
      ];
    }
  }

?>
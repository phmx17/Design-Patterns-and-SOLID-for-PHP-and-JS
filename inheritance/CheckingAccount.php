<?php 
  require 'Account.php';
  // require 'InterfaceTransfer.php';  // 
  /* no need to require the interface; */

  class CheckingAccount extends Account{
    public $checkingBalance;
    public $accountTransfer; // Dependency Inversion Principle: an Interface is used because AccountTransfer class will undergo many updates anc changes
    public function __construct($accountNumber, $accountHolder, $checkingBalance, TransferInterface $accountTransfer)
    {
      parent::__construct($accountNumber, $accountHolder);
      $this->checkingBalance = $checkingBalance;
      $this->accountTransfer = $accountTransfer;
    }

    public function getCheckingBalance(){
      return ['checking balance' => $this->checkingBalance];
    }

    public function balanceTransfer() {
      $this->accountTransfer->transferBalance();
    }
  }
?>
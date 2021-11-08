<?php 
  /** 
   * This class handles complex account transfers and is 
   * subject to a lot of updating and changes
   * This is an example of Dependency Inversion Principle
   */
  require 'InterfaceTransfer.php';
  class AccountTransfer implements TransferInterface{
    public $transferTool;
    public function __construct()
    {
      // $this->transferTool = $transferTool;
    }
    public function transferBalance()
    {
     return $this->transferTool = true;
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bank of Switzerland</title>
</head>
<body>
  <?php
    // require 'Account.php';
    require 'CheckingAccount.php';
    require 'AccountTransfer.php'; // complex tool that requires an interface
    // $account = new Account(129083755, 'Leonardo Di Caprio');

    // Al Pacino has a CheckingAccount that is a child class of Account and therefore inherits all the goodies from the parent class
    $checking = new CheckingAccount(9019029033444, 'Al Pacino', 999666, new AccountTransfer());
    $balance = $checking->getCheckingBalance();
    foreach($balance as $key => $value){
      echo "<h5>The balance on this checking account is: ".$value."</h5>";
    }
    // accessing functionality from parent class
    $actInfo = $checking->getAccountInfo();
    echo "This is the information on the account: <br>";
    foreach ($actInfo as $key => $value) {
      echo "<h5>$key : $value</h5>";
    }

    // make a balance transfer
    // employing the Dependency Inversion Principle of SOLID
    // AccountTransfer class was made using an interface
    $transfer = $checking->accountTransfer->transferBalance();
    var_dump($transfer);
    var_dump($checking->accountTransfer->transferTool);




  ?>
</body>
</html>
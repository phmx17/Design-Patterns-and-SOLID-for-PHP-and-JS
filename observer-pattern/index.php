<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock Price Buddy</title>
</head>
<body>
  <?php 
  require 'IBM.php';
  require 'Google.php';
  require 'Microsoft.php';
  require 'StockMaker.php';
  require 'StockSimulator.php';

    $IBM = new IBM(23.99);  // create observable
    $Google = new Google(59.99);  // create observable
    $Microsoft = new Microsoft(89.99);  // create observable
    $Migros = new StockMaker('Migros', 44.99); // create observable
    // var_dump($IBM);
    $stockSim = new StockSimulator(); // observer
    // the stocks to the sim
    $stockSim->addCompanyStock($IBM);
    $stockSim->addCompanyStock($Google);
    $stockSim->addCompanyStock($Microsoft);
    $stockSim->addCompanyStock($Migros);
    // run random stockprice index
    $stockSim->generateCurrentPrice();
    $stockSim->generateCurrentPrice();
    $stockSim->generateCurrentPrice();
    $stockSim->generateCurrentPrice();
    $stockSim->generateCurrentPrice();
// $array = [];
//       for ($i=1; $i <=10; $i++) {
//         $array [] = $i;
//       }
//       var_dump($array);
      // var_dump($stockSim->companyStocks);



  ?>
</body>
</html>
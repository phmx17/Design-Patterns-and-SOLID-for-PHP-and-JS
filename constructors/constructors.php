<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Constructors</title>
</head>
<body>
  <?php 
    require 'DrumKit.php';
    $kit = new Drumkit('1972 Pearl Maple Silver-Tone 99');
    echo "<p>My first drum kit was a ".$kit->getTitle()."</p>"
  ?>
</body>
</html>
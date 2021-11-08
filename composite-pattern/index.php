<?php 
  require_once __DIR__ . '/vendor/autoload.php';

  $main_menu = new App\Menu('Main Menu');
  $laptop_menu = new App\Menu('Laptop');
  $laptop_menu->add(new App\Link('Laptop 1', '/laptop/l1'));
  $laptop_menu->add(new App\Link('Laptop 2', '/laptop/l2'));

  $cellphone_menu = new App\Menu('Cellphone');
  $cellphone_menu->add(new App\Link('Burner Phone', '/cellphone/BurnerPhone'));

  $smartphone_menu = new App\Menu('SmartPhone');
  $smartphone_menu->add(new App\Link('Smartphone 1', '/smartphone/s1'));
  $smartphone_menu->add(new App\Link('Smartphone 2', '/smartphone/s2'));

  $cellphone_menu->add($smartphone_menu);

  $main_menu->add($cellphone_menu);
  $main_menu->add($laptop_menu);

  $result = $main_menu->render();

  var_dump($result);

?>  
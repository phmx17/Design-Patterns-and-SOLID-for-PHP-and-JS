<?php

namespace App;
require_once 'MenuComponent.php';

class Menu extends MenuComponent {
  private array $menu_components;

  function __construct(private string $title) {
    $this->menu_components = [];
  }

  public function add(MenuComponent $menuComponent) {
    $this->menu_components[] = $menuComponent;
  }

  public function render(): string {
    $result = PHP_EOL . $this->title . PHP_EOL;
    foreach($this->menu_components as $menuComponent) {
      $result .= $menuComponent->render();
    }
    return $result . PHP_EOL;
  }
}

// testing only
// $menu = new Menu('menu-title');
// print $menu->render();

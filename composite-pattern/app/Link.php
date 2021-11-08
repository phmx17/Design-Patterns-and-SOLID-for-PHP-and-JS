<?php
// this would be a 'leaf' node
namespace App;
/**
 * returns a link as a string
 */
require_once('MenuComponent.php');
class Link extends MenuComponent
{
  function __construct(private string $title, private string $link) {}

  public function render(): string {
    return "<a href='{$this->link}'>{$this->title}</a>";
  }
}

// testing only
// $link = new Link('link-title', '<a>link</a>');
// print $link->render();
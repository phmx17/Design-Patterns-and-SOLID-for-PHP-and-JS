<?php 
  class DrumKit{
    public $title;
    public function __construct($title)
    {
      $this->title = $title;
    }
    public function getTitle(){
      return $this->title;
    }
  }

?>
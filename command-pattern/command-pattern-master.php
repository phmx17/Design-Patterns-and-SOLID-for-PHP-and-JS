<?php 
  // create the command interface
  interface Command {
    public function execute();
  }

  abstract class Receiver {}

  //  create receiver class
  class LightReceiver extends Receiver {
    public function lightOn() {
      print "turn light on";
    }
  }

  // implement the Command class
  class LightOnCommand implements Command{
    public $light;
    function __construct(LightReceiver $light) {
      $this->light = $light;
    }
    // implement the interface function
      public function execute() {
        $this->light->lightOn();
      }
  }

  // create a trigger class
  class Trigger {
    private $command;
    function __construct(Command $command) {
      $this->command = $command;
    }
    public function executeTrigger(){
      $this->command->execute();
    }
  }

  // the app
  $lightReceiver = new LightReceiver;
  $lightOnCommand = new LightOnCommand($lightReceiver);
  $trigger = new Trigger($lightOnCommand);
  $trigger->executeTrigger();

?>



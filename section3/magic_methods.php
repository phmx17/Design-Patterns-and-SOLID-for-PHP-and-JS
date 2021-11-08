<?php
class Connection{  
  private static int $count = 0;
  // connection identifier
  private string $connectionId;
  private $conferenceId = '12345';

  public function __construct()
  {
    self::$count++;
  }
  // magic method desctructor
  public function __destruct()
  {
    self::$count--;
  }
  public function getCount() {
    return self::$count;
  }
  // magic method for accessing private and protected parts
  public function __get($name){
    return $this->$name;
  }
  // magic method for letting object decide on what to do when treated like a string is requested.
  // @return string
  public function __toString(){
    return "Conference Id: $this->conferenceId connection Id: $this->connectionId";
  }

  public function setConnectionId($ipAddress){
    // $ipAddress_$count
    if(filter_var($ipAddress, FILTER_VALIDATE_IP)){ // magic method that determines if valid IP or not.
      $this->connectionId = $ipAddress .'_'.self::$count;
      return;
    }
    die('Not a valide IP address!');
  }
}

$conn = new Connection();
$conn2 = new Connection();
// echo "number of connections is: " . $conn->getCount() .PHP_EOL;
// unset($conn2); // gets rid of a connection with help of the destructor
// echo "number of connections is: " . $conn->getCount() .PHP_EOL;
$conn->setConnectionId('127.0.0.1');
print "the connection  id is: " . $conn->connectionId . PHP_EOL;
print "the conference id is:" . $conn->conferenceId . PHP_EOL;
print $conn;


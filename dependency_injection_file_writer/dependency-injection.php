<?php 


abstract class FileWriter {
/**
 * this can't directly instantiate objects
 * it gets extended with child file writers, and they get instantiated
 * However this abstract class is required in order to provide the object type 
 * getting passed into the Processor object
 * it also enforces child classes to implement writeToFile()
 * SOLID also applies because this class nor the Processor Class require any maintenance if adding more fileWriter versions.
 * scaleability rules!
 **/
 
  abstract public function writeToFile($data): bool;
}
class JsonFileWriter extends FileWriter {
  public function writeToFile($data): bool {
    print PHP_EOL.'File is being written to JSON...'.PHP_EOL;
    sleep(2);
    return true;
  }
}
class CsvFileWriter extends FileWriter {
  public function writeToFile($data): bool {
    print PHP_EOL.'File is being written to CSV...'.PHP_EOL;
    sleep(2);
    return true;
  }
}
class BinFileWriter extends FileWriter {
  public function writeToFile($data): bool {
    print PHP_EOL.'File is being written to Binary...'.PHP_EOL;
    sleep(2);
    return true;
  }
}

class Processor {
  private $fileWriter;  // contains injected object
  public function __construct(FileWriter $fileWriter) // the type FileWriter is the abstract class!
  {
    $this->fileWriter = $fileWriter;  // Injection is passed here
  }
  // processor now will use the instance of injected file writer
  public function process(array $data) {
    $result = $this->fileWriter->writeToFile($data); // right here
    if (!$result) {
      throw new \Exception('Error writing to file!');
    }
    print 'Continue with processing...'.PHP_EOL;
  }

}

// main app
$fileWriter = new CsvFileWriter();
$processor = new Processor($fileWriter);  // the magic happens here
$processor->process(['Beth Harmon' => 'Anya Taylor-Joy']);

?>
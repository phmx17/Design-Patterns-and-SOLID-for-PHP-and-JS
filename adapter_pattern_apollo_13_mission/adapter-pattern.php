<?php 


abstract class FileWriter {
/**
 * this can't directly instantiate objects
 * it gets extended with child file writers, and they get instantiated
 * However this abstract class is required in order to provide the object type 
 * getting passed into the Processor object
 * SOLID also applies because this class nor the Processor Class require any maintenance if adding more fileWriter versions.
 * === scaleability rules!
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

/**
 * Wish to create a new Filewriter, BUT it does not extend from our abstract class like our other fileWriter friends do.
 * This new file writer implements a different interface. However I want to use it like the other file writers.
 * So I must create an adapter pattern. It is a shell that extends from the original file writer but then with a 
 * constructor implements the type of the new File Writer.
 * Let's see what happens - Houston to Apollo: God Speed
 */

 // Houston, we have a problem:
 // Apollo Astronauts have an improvised emergency file writer. We must be able to use it in out current space protocol.
 interface ApolloFileWriter {
   public function apolloWriteFile($data): bool;  // it isn't writeToFile anymore :-()
 }
 class SaturnFileWriter implements ApolloFileWriter{
   public function apolloWriteFile($data): bool {
    print PHP_EOL.'Apollo Mission Control writing to file...'.PHP_EOL;
    sleep(2);
    return true;
   }
 }
 // now for the adapter to the rescue of our Apollo Astronauts
 class ApolloAdapter extends FileWriter { // this is the outer shell extending FileWriter
   private ApolloFileWriter $fileWriter;
   public function __construct(ApolloFileWriter $fileWriter)  // injecting the Apollo type
   {
     $this->fileWriter = $fileWriter;
   }
   public function writeToFile($data): bool // this is required by the shell
   {
     $this->fileWriter->apolloWriteFile($data); // but we are sneaking in the Apollo writing execution...hold on to your butts!
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
    print 'Apollo 13 Mission rescued. Thank You Houston. Continue Processing...'.PHP_EOL;
  }

}

// main app
// $fileWriter = new CsvFileWriter();
// $processor = new Processor($fileWriter);  // the magic happens here
// $processor->process(['Beth Harmon' => 'Anya Taylor-Joy']);

// using the adapter pattern to use implement the Apollo file writer.
$saturnFileWriter = new SaturnFileWriter(); // this is incompatible with current fileWriter !
$adaptedSaturnFileWriter = new ApolloAdapter($saturnFileWriter); // applying the adapter pattern
$processor = new Processor($adaptedSaturnFileWriter); // create new processor
$processor->process(['Emergency' => 'Critical: Supply Module lost power. Must create CO2 scrubber.']);
// Houston to Apollo; We Read you. We have come up with an emergency CO2 scrubber you can make from parts in the service module. 
// God Speed - over

?>
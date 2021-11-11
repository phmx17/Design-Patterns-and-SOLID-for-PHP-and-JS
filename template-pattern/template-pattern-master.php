<?php 
  /**
   * Caffeinated Beverage abstract class
   * abstract because 2 child classes will inherit, each with shared and separate functionality: Tea and Coffee
   */

   abstract class CaffeinBeverage {
     // this will be the template that each instance will follow; It is the key to this entire pattern.
      public function prepareRecipe() {  
      $this->boilWater();
      $this->brew();
      // create a hook
      if ($this->customerWantsCondiments()) {
        $this->addCondiments();
      }      
      // end of hook
      $this->pourBeverage();
     }  

     // This will receive an override in child / sub class
    public function customerWantsCondiments(): bool {
      return true;  // set default
    } 

     public function boilWater() {
       echo "step 1: boiling water..." . PHP_EOL;
       sleep(2);
     }
     abstract public function brew();
     abstract public function addCondiments();
     public function pourBeverage() {
       echo "step 4: pouring beverage... Enjoy!" . PHP_EOL;
       sleep(2);
     }
   }

   class Tea extends CaffeinBeverage {  
     public function brew() {
       echo "step 2: brewing tea leaves..." . PHP_EOL;
       sleep(2);
     }
     public function addCondiments() {
       echo "step 3: adding a squeeze of lemon..." . PHP_EOL;
       sleep(2);
     }
     // override of function defined in parent class
     // since definition is not abstract in the parent, this can remain undefined
     public function customerWantsCondiments(): bool {
       // I would get the input here to determine if this gets hooked in or not
       // If defining this function a return is required, because of :bool   
       echo "Some lemon please!" . PHP_EOL;
       return true;
     }  
   }
   
   class Coffee extends CaffeinBeverage {
    public function brew() {
      echo "step 2: brewing coffee grinds..." . PHP_EOL;
      sleep(2);
    }
    public function addCondiments() {
      echo "step 3: adding cream and sugar..." . PHP_EOL;
      sleep(2);
    }
    public function customerWantsCondiments(): bool {
      // I would get the input here to determine if this gets hooked in or not
      echo "no condiments please!" . PHP_EOL;      
      return false;
    }
  }

   // prepare beverages
   $tea = new Tea();
   $tea->prepareRecipe();

   $coffee = new Coffee();
   $coffee->prepareRecipe();
?>

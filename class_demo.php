<?php
/*
class Krishna{
    public $var1;
    public $var2 = 'Data goes here';
    public function method_one(){
        echo "Hello GM";
    }
}
$obj_a = new Krishna();
$obj_b = new Krishna();

echo $obj_a->var2;
echo "<br/>";
echo $obj_b->method_one();
  */
//The parent class
class Car {
  // Private property inside the class
  private $model;
 
  //Public setter method
  public function setModel($model)
  {
    $this -> model = $model;
  }
 
  public function hello()
  {
    return "beep! I am a <i>" . $this -> model . "</i><br />";
  }
}
 
 
//The child class inherits the code from the parent class
class SportsCar extends Car {
  //No code in the child class
}
 
 
//Create an instance from the child class
$sportsCar1 = new SportsCar();
  
// Set the value of the class’ property.
// For this aim, we use a method that we created in the parent
$sportsCar1 -> setModel('Mercedes Benz');
  
//Use another method that the child class inherited from the parent class
echo $sportsCar1 -> hello();

 

 
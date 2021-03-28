<?php

class Avenger {
  public $name;
  public $alias;
  public $gender;
  public $age;
  public $power;

  public function __construct($name = "", $alias = "", $gender = "", $age = 0, $power = []) {
    $this->name = $name;
    $this->alias = $alias;
    $this->gender = $gender;
    $this->age = $age;
    $this->power = $power;
  }

  public function __toString() {
    return "name: " . $this->name . "\n" . 
      "gender: " . $this->gender . "\n" . 
      "age: " . $this->age . "\n";
  }

  public function __invoke() {
    echo strtoupper($this->alias) . "\n";
    foreach ($this->power as $power) echo $power . "\n";
    echo "\n";
  }

}




?>
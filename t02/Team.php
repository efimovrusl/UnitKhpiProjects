<?php

class Team {
  public $id;
  public $avengers = [];

  public function __construct($id, $avengers) {
    $this->id = $id;
    $this->avengers = $avengers;
  }

  public function battle($damage) : void {
    foreach ($this->avengers as $avenger) {
      $avenger->hp -= $damage;
      if ($avenger->hp <= 0)
        unset($this->avengers[array_search($avenger, $this->avengers)]);
    }
  }

  public function calculate_losses($cloned) {
    $lost = count($cloned->avengers) - count($this->avengers);
    if ($lost == 0) echo "We haven't lost anyone in this battle!\n";
    else echo "In this battle we ${lost} Avenger(s).\n";
  }

}

?>
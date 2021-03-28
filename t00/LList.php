<?php

class LList implements IteratorAggregate
{
  public function __construct()
  {
      $this->head = null;
  }
  public function toString()
  {
      $str = "";
      $ptr = $this->head;
      while ($ptr != null) {
          $str = $str . $ptr->data;
          if ($ptr->next != null) {
              $str = $str . ", ";
          }
          $ptr = $ptr->next;
      }
      return $str;
  }
  public function getFirst()
  {
      if ($this->head == null) {
          return null;
      }
      return $this->head->data;
  }
  public function getLast()
  {
      if ($this->head == null)
          return null;
      $pointer = ($this->head);
      while ($pointer->next != null)
          $pointer = $pointer->next;
      return $pointer->data;
  }
  public function removeAll($value)
  {
    $removed = true;
    while ($removed) $removed = $this->remove($value);
  }
  public function add($value)
  {
      if ($this->head == null) {
          $this->head = new LLItem();
          $this->head->data = $value;
          return;
      }
      $pointer = $this->head;
      while ($pointer->next != null)
          $pointer = $pointer->next;
      $pointer->next = new LLItem();
      $pointer->next->data = $value;
  }
  public function addArr($array)
  {
      if ($array == null) return;
      foreach ($array as $data)
          $this->add($data);
  }
  public function remove($value)
  {
    if ($this->head == null) return false;
    $pointer = $this->head;
    if ($pointer->data == $value) {
      $this->head = $pointer->next;
      $pointer->next = null;
      return true;
    }
    while ($pointer->next != null) {
      if ($pointer->next->data == $value) {
        $pointer->next = $pointer->next->next;
        return true;
      }
      $pointer = $pointer->next;
    }
    return false;
  }
  public function contains($value)
  {
    $pointer = $this->head;
    while ($pointer != null) {
      if ($pointer->data == $value) return true;
      $pointer = $pointer->next;
    }
    return false;
  }
  public function clear()
  {
      $this->head = null;
  }
  public function count()
  {
    $counter = 0;
    $ptr = $this->head;
    while ($ptr != null) {
      $counter++;
      $ptr = $ptr->next;
    }
    return $counter;
  }
  public function toArray()
  {
    if ($this->head == null) return null;
    $iteratorArray = [];
    $ptr = $this->head;
    while ($ptr != null) {
      array_push($iteratorArray, $ptr->data);
      $ptr = $ptr->next;
    }
    return $iteratorArray;
  }
  public function getIterator()
  {
    return new ArrayIterator($this->toArray());
  }
}
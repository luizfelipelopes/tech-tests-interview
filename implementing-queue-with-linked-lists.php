<?php

// Queue
// FIFO
// push => pointer to begin
// pop => pointer to before of last


class Node {
  public function __construct($value)
  {
      $this->value = $value;
      $this->next = null;
  }
}

class Queue {
  
  public function __construct()
  {
    $this->begin = null;
    $this->end = null;
    $this->length = 0;
  }
  
  public function peek()
  {
    return $this->begin;  
  }
  
  public function enqueue($value)
  {
    $newNode = new Node($value);
    
    if($this->length == 0) {
      $this->begin = $newNode;
      $this->end = $newNode;
      $this->length++;
      
      return $this;
    }
    
    $keeperPointer = $this->end;
    $this->end->next = $newNode;
    $this->end = $newNode;
    $this->length++;
    
    return $this;
    
  }
  
  public function dequeue()
  {
    
    $length = $this->length;
    
    if($length == 0) {
      return $this;
    }
   
   if($length == 1) {
     $this->begin = null;
     $this->end = null;
     $this->length--;  
     return $this;
   }
   
    $keeperPointer = $this->begin;
    $this->begin = $this->begin->next;
    $this->length--;  
    
    return $this;
  }
  
  public function isEmpty()
  {
    return (bool) $this->length == 0;
  }
  
}

//Joy
//Matt
//Pavel
//Samir

$queue = new Queue();
print_r($queue->peek());
echo "\n";
print_r($queue->enqueue('Joy'));
echo "\n";
print_r($queue->enqueue('Matt'));
echo "\n";
print_r($queue->enqueue('Pavel')); 
echo "\n";
print_r($queue->enqueue('Samir')); 
echo "POP \n";
print_r($queue->dequeue()); 
echo "\n";
print_r($queue->dequeue()); 
echo "PEEK\n";
print_r($queue->peek());
echo "POP \n";
print_r($queue->dequeue()); 
echo "\n";
print_r($queue->dequeue());
echo "IS EMPTY \n";
print_r($queue->isEmpty());
echo "\n";

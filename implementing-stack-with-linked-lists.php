<?php

class Node { 
  
  private $value;
  public $next;
  
  public function __construct($value) 
  {
    $this->value = $value;
    $this->next = null;
  }
}

class Stack {
  public function __construct()
  {
    $this->top = null;   
    $this->bottom = null;   
    $this->length = 0;   
  }
  
  public function peek()
  {
   return $this->top; 
  }
  
  public function push($value)
  {
    $newNode = new Node($value);
    
    if($this->length == 0) {
      $this->top = $newNode;
      $this->bottom = $newNode;
      $this->length++;
      
      return $this;
    }
    
    $holdingPointer = $this->top;
    $this->top = $newNode;
    $this->top->next = $holdingPointer;
    $this->length++;
    
    return $this;
    
  }
  
  public function pop()
  {
   
   if(!$this->top) {
     return null;
   }
   
   if($this->length == 1) {
     $this->bottom = null;
   }
   
   
   $holdingPointer = $this->top;
   $this->top = $this->top->next;
   $this->length--;
   
   return $this;
    
  }
  
  public function isEmpty()
  {
    return (bool) $this->length == 0;
  }
}

// discord
// udemy
// google

$myStack = new Stack();
print_r($myStack->peek());
echo "\n";
print_r($myStack->push('google'));
echo "\n";
print_r($myStack->push('udemy'));
echo "\n";
print_r($myStack->push('discord'));
echo "POP\n";
print_r($myStack->pop());
echo "\n";
print_r($myStack->pop());
echo "\n";
print_r($myStack->pop());
echo "IS EMPTY\n";
print_r($myStack->isEmpty());
echo "\n";






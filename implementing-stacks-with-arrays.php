<?php

class Stack {
  public function __construct()
  {
    $this->stack = [];   
    $this->length = 0;   
  } 
  
  public function peek()
  {
    
    $length = $this->length;
  
    if($length == 0) {
      return null;
    }
    
    
    return $this->stack[$this->length-1]; 
  }
  
  public function push($value)
  {
   $this->stack[] = $value;
   $this->length++;
    
    return $this;
    
  }
  
  public function pop()
  {
    
   $length = $this->length;
   
   if($length == 0) {
     return null;
   }
   
   unset($this->stack[$length-1]);  
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
print_r($myStack->peek());
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






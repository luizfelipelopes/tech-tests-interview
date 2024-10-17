<?php

  // My Array
  // get O(1)
  // push O(1)
  // pop (1)
  // unshift O(n)
  // delete O(n)
  
  class MyArray {
    
    private $data;
    private $length;
    
    public function __construct() {
      $this->data = [];
      $this->length = 0;
    }
    
    public function get($index) //O(1)
    {
      return $this->data[$index];
    }
    
    public function push($value) //O(1)
    {
      $this->length++;
      $this->data[$this->length] = $value;
    }
    
    public function pop() //O(1)
    {
      unset($this->data[$this->length]);
      $this->length--;
    }
    
    public function unshift($index, $value) //O(n)
    {

      try {
        
        if(!isset($this->data[$index])) {
          throw new \Exception('Index does not exists!');
        }
        
        $this->length++;
      
        for($i = $this->length; $i >= $index; $i--) {
            
            if($i != $index) {
              $this->data[$i] = $this->data[$i-1];
              continue;
            }
            
            $this->data[$index] = $value;
            
        }
        
      } catch(\Exception $e) {
      
          print_r($e->getMessage());
        
      }

    }
    
    public function shift($index) //O(n)
    {
      
      try {
      
        if(!isset($this->data[$index])) {
          throw new \Exception('Index does not exists!');
        }
      
        for($i = $index; $i < $this->length; $i++) {
          $this->data[$i] = $this->data[$i+1];  
        }
        
        unset($this->data[$this->length]);
        $this->length--;
        
      } catch(\Exception $e) {
      
        print_r($e->getMessage());
        
      } 
      
    }
    
    
  }
  
  $array = new MyArray();
  $array->push('hi');
  $array->push('you');
  $array->push('again');
  $array->push('!');
  
  $array->pop();
  
  $array->shift(2);
  $array->unshift(2, 'unshift this');
  
  var_dump($array);
  
  



?>

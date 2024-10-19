<?php

// 10 -> 5 -> 16

class LinkedList {
  
  private $head;
  private $tail;
  private $length;
  
  public function __construct($value)
  {
      $this->head = (object) [
        'value' => $value,
        'next' => null
      ];
      
      $this->tail = $this->head;
      $this->length = 1;
  }
  
  // My alternative function using recursion
  public function alternativeAppend($value)
  {
    $newNode = (object) ['value' => $value, 'next' => null];
    
    $tailValue = $this->tail->value;
    $this->searchValueNode($this->head, $tailValue, $newNode);
    $this->tail = $newNode;
    $this->length++;
    
    return $this->head;
  }
  
  public function append($value)
  {
    $newNode = (object) ['value' => $value, 'next' => null];
    
    $this->tail->next = $newNode;
    $this->tail = $newNode;
    $this->length++;
    
    return $this;
  }
  
  public function prepend($value)
  {
    $newNode = (object) ['value' => $value, 'next' => $this->head];
    $this->head = $newNode;
    $this->length++;
    
    return $this;
    
  }
  
  // Alternative Insert function
  public function alternativeInsert($index, $value)
  {
    
    // create a loop
    // find index
    // previous index => next point to my value to be insert in index
    // my value pointer the 'next' to my current value of index
    // 90 -> 100 -> 1 -> 10 -> 5 -> 16
    
    $length = $this->length;
    $node = $this->head;
    $i = 0;
    
    if($index > $length-1) {
      $this->append($value);
    }
     
    if($index == 0) {
      $this->prepend($value);
      return $this;
    }
    
    
    while($node != null) {

      // pointer early
      if($i == $index-1) {
        $node->next = (object)[
          'value' => $value, 
          'next' => $node->next];
      }
      
      // pointer next
      if($i == $index) {
          $node->next = (object)[
            'value' => $node->next->value, 
            'next' => $node->next->next];
          $node->value = $value;
      
      }
      
      $node = $node->next;  
      $i++;
    }
    
    $this->length++;

    
    return $this;
    
  }
  
  public function insert($index, $value)
  {
    
    if($index >= $this->length) {
     $this->append($value);
     return $this;
    }
   
    if($index == 0) {
     $this->prepend($value);
     return $this;
    }
   
    $newNode = (object) [
     'value' => $value,
     'next' => null
    ];
   
     $leader = $this->traverseToIndex($index-1);
     $holdingPointer = $leader->next;
     $leader->next = $newNode;
     $newNode->next = $holdingPointer;
     $this->length++;
    
    return $this;
    
  }

  public function remove($index)
  {
    
    if($index == 0) {
       $this->head = $this->head->next;
       $this->length--;
       return $this;
    }
    
    $leader = $this->traverseToIndex($index-1);
    $endNode = $leader->next->next;
    $leader->next = $endNode;
    $this->length--;
    
    if($index == $this->length-1) {
      $this->tail = $leader; 
    }
    
    return $this;
    
  }
  
  private function traverseToIndex($index)
  {
    $counter = 0;
    $currentNode = $this->head;
    
    while($counter != $index) {
      $currentNode = $currentNode->next;
      
      $counter++;
    }
    
    return $currentNode;
  }
  
  
  private function searchValueNode(&$node, $tailValue, $newNode)
  {
    if ($node->value == $tailValue) {
      $node->next = $newNode;
      return $node;
    }
    
    $this->searchValueNode($node->next, $tailValue, $newNode);
  }
  
  public function printNodes(): void
  {
    $nodes = '';
    $currentNode = $this->head;
    
    while($currentNode != null) {
      $arrow = strlen($nodes) > 0 ? ' -> ' : '';
      
      $nodes .= $arrow . $currentNode->value;
      $currentNode = $currentNode->next;
    }
    
    echo $nodes . "\n";
    
  }
  
}


$myLinkedList = new LinkedList(10);
$myLinkedList->append(5);
$myLinkedList->append(16);
$myLinkedList->prepend(1);
$myLinkedList->prepend(100);
$myLinkedList->prepend(90);

$myLinkedList->printNodes() ;
$myLinkedList->insert(2, 99);
$myLinkedList->printNodes();
$myLinkedList->insert(3, 171);
$myLinkedList->printNodes();
$myLinkedList->insert(0, 171);
$myLinkedList->printNodes();
$myLinkedList->insert(200, 99);
$myLinkedList->printNodes();
$myLinkedList->insert(9, 23);
$myLinkedList->printNodes();
$myLinkedList->append(160);
$myLinkedList->printNodes();

$myLinkedList->remove(2);
$myLinkedList->printNodes();
$myLinkedList->remove(9);
$myLinkedList->printNodes();
$myLinkedList->remove(9);
$myLinkedList->printNodes();
$myLinkedList->remove(0);
$myLinkedList->printNodes();



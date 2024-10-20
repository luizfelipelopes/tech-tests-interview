<?php

class DoublyLinkedList {
  
  private $head;
  private $tail;
  private $length;
  
  public function __construct($value)
  {
      $this->head = (object) [
        'value' => $value,
        'next' => null,
        'prev' => null,
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
    $newNode = (object) [
    'value' => $value, 
    'next' => null, 
    'prev' => $this->tail];
    
    $this->tail->next = $newNode;
    $this->tail = $newNode;
    $this->length++;
    
    return $this;
  }
  
  public function prepend($value)
  {
    $newNode = (object) ['value' => $value, 'next' => $this->head, 'prev' => null];
    $this->head->prev = $newNode;
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
     'next' => null,
     'prev' => null,
    ];
   
     $leader = $this->traverseToIndex($index-1);
     $holdingPointer = $leader->next;
     $leader->next = $newNode;
     $newNode->next = $holdingPointer;
     $newNode->prev = $leader;
     $holdingPointer->prev = $newNode;
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
    $endNode->prev = $leader;
    $this->length--;
    
    if($index == $this->length-1) {
      $this->tail = $leader; 
    }
    
    return $this;
    
  }
  
  public function reverse()
  {
    if(!$this->head->next) {
      return $this->head;
    }
    
    // 1 -> 10 -> 16 -> 88
    // need chaange next properties of nodes arrow to the right for left:
    // 88 -> 16 -> 10 -> 1
    
    // pointers to iteration
    $pointer1 = $this->head;
    $pointer2 = $pointer1->next;
    // the last will be the first one
    $this->tail = $this->head;

    // while running the pointer2 until the last node   
    while($pointer2) {
      
      $temp = $pointer2->next; // keep next node
      $pointer2->next = $pointer1; // next node will be the value of pointer1
      
      //moving the pointers to 2 next nodes
      $pointer1 = $pointer2; // first pointer arrow to second pointer
      $pointer2 = $temp; // second pointer arrow to next node 
      
    }
    
    $this->head->next = null;
    $this->head = $pointer1;
    
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


$myDoublyLinkedList = new DoublyLinkedList(10);
// $myDoublyLinkedList->append(5);
$myDoublyLinkedList->append(16);
$myDoublyLinkedList->prepend(1);
// $myDoublyLinkedList->prepend(10);
$myDoublyLinkedList->append(88);
// $myDoublyLinkedList->prepend(100);
// $myDoublyLinkedList->prepend(90);

$myDoublyLinkedList->printNodes() ;
// $myDoublyLinkedList->insert(2, 99);
// $myDoublyLinkedList->printNodes();
// $myDoublyLinkedList->insert(3, 171);
// $myDoublyLinkedList->printNodes();
// $myDoublyLinkedList->insert(0, 171);
// $myDoublyLinkedList->printNodes();
// $myDoublyLinkedList->insert(200, 99);
// $myDoublyLinkedList->printNodes();
// $myDoublyLinkedList->insert(9, 23);
// $myDoublyLinkedList->printNodes();
// $myDoublyLinkedList->append(160);
// $myDoublyLinkedList->printNodes();



// $myDoublyLinkedList->remove(2);
// $myDoublyLinkedList->printNodes();
// $myDoublyLinkedList->remove(9);
// $myDoublyLinkedList->printNodes();
// $myDoublyLinkedList->remove(9);
// $myDoublyLinkedList->printNodes();
// $myDoublyLinkedList->remove(0);
// $myDoublyLinkedList->printNodes();

$myDoublyLinkedList->reverse();
$myDoublyLinkedList->printNodes();
// print_r($myDoublyLinkedList);



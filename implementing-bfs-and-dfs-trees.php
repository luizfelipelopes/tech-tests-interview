<?php

// Node Tree
// curent value
// right node
// left node


//     9
//  4     20
//1  6  15  170

class Node {
 
   public function __construct($value) 
   {
     
     $this->value = $value;
     $this->right = null;
     $this->left = null;
     
   } 
}

// root Node
class BinarySearchTree {

  public function __construct()
  {
    $this->root = null; 
  }
  
  // insert a new node
  public function insert($value)
  {
    $newNode = new Node($value);
    
    // if i don't have root, will be the first node
     
    if($this->root == null) {
      $this->root = $newNode;
      return $this->root;
    }
    
    // create a function for transverse my tree
    // if my node is less than current node of interation => got to left node
    // if my node is more than current node of interation => got to right node
    // if my node left or right is null that is my node to return for add my new node
    
    $this->root = $this->transverseNodes($this->root, $newNode);
    
    return $this->root;
    
    
  }
  
  private function transverseNodes($tree, $node)
  {
    $valueNode = $node->value;
    $currentNode = $tree;
    
    while($currentNode != null) {
    
      // move to left of tree 
      if($valueNode < $currentNode->value) {
        
        if($currentNode->left == null) {
          $currentNode->left = $node;
          return $tree;      
        }
        
        $currentNode = $currentNode->left;
        continue;
      }
      
      // move to right of tree
      if($valueNode > $currentNode->value) {
        
        if($currentNode->right == null) {
          $currentNode->right = $node;
          return $tree;   
        }
        $currentNode = $currentNode->right;
        continue;
      }
  
      // actual node of tree    
      if($valueNode == $currentNode->value) {
        return $tree;
      }
      
    }

    return $tree;
    
  }
  
  // find a node
  public function lookup($value)
  {
    $currentNode = $this->root;
    
    while($currentNode != null) {
      
      if($value == $currentNode->value) {
        return $currentNode;
      }
      
      if($value < $currentNode->value) {
        $currentNode = $currentNode->left;
      } else {
        $currentNode = $currentNode->right;
      }
      
    }
    
    return false;
    
  }
  
  public function breadthFirstSearch()
  {
    $currentNode = $this->root;
    $list = [];
    $queue = [];
    
    $queue[] = $currentNode;
    
    
    while(count($queue) > 0) {
      $currentNode = array_shift($queue);
      $list[] = $currentNode->value;
      
      if($currentNode->left != null) {
        $queue[] = $currentNode->left;
      }
      
      if($currentNode->right != null) {
        $queue[] = $currentNode->right;
      }
    }
    
    return $list;
    
  }
  
  
  public function breadthFirstSearchRecursive($queue, $list)
  {
    if(count($queue) == 0) {
      return $list;
    }
    
    $currentNode = array_shift($queue);
    $list[] = $currentNode->value;
    
    if($currentNode->left != null) {
      $queue[] = $currentNode->left;
    }
    if($currentNode->right != null) {
      $queue[] = $currentNode->right;
    }
    
    return $this->breadthFirstSearchRecursive($queue, $list);
    
  }
  
  
  public function DFSInOrder()
  {
    $list = [];
    return $this->traverseInOrder($this->root, $list);
  }
  
  public function DFSPostOrder()
  {
    $list = [];
    return $this->traversePostOrder($this->root, $list);
  }
  
  public function DFSPreOrder()
  {
    $list = [];
    return $this->traversePreOrder($this->root, $list);
  }
  

  
  public function traverseInOrder($node, &$list)
  {
   
    if($node->left) {
      $this->traverseInOrder($node->left, $list);
    }
    
    $list[] = $node->value;
    
    if($node->right) {
      $this->traverseInOrder($node->right, $list);
    }
    
    return $list;
  }
  
  public function traversePreOrder($node, &$list)
  {
   
    $list[] = $node->value;
   
    if($node->left) {
      $this->traversePreOrder($node->left, $list);
    }
    
    if($node->right) {
      $this->traversePreOrder($node->right, $list);
    }
    
    return $list;
  }
  
  public function traversePostOrder($node, &$list)
  {
   
    if($node->left) {
      $this->traversePostOrder($node->left, $list);
    }
    
    if($node->right) {
      $this->traversePostOrder($node->right, $list);
    }
    
    $list[] = $node->value;
    
    return $list;
  }
  
}


$tree = new BinarySearchTree();

$tree->insert(9);
$tree->insert(4);
$tree->insert(6);
$tree->insert(20);
$tree->insert(170);
$tree->insert(15);
$tree->insert(9);
$tree->insert(1);

print_r($tree->DFSPostOrder()) . "\n";
print_r($tree->DFSPreOrder()) . "\n";
print_r($tree->DFSInOrder()) . "\n";

function transverse($node)
{
  $tree = (object) ['value' => $node->value];
  $tree->left = $node->left == null ? null : transverse($node->left);
  $tree->right = $node->right == null ? null : transverse($node->right);
  
  return $tree;
}

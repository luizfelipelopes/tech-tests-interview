<?php 

// Node Tree
// curent value
// right node
// left node

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
    
    var_dump($this->root);
    
    
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

// print_r(transverse($tree->root));
print_r($tree->lookup(4));

function transverse($node)
{
  $tree = (object) ['value' => $node->value];
  $tree->left = $node->left == null ? null : transverse($node->left);
  $tree->right = $node->right == null ? null : transverse($node->right);
  
  return $tree;
}



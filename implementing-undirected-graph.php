<?php
	class Graph {
	  
	  public function __construct()
	  {
	    $this->numberOfNodes = 0;
	    $this->adjacentList = (object) [];
	  }
	  
	  public function addVertex($node)
	  {
	    $this->adjacentList->{$node} = [];
	    $this->numberOfNodes++;
	  }
	  
	  public function addEdge($node1, $node2)
	  {
	    // undirected Graph
	    
	    $this->adjacentList->{$node1}[] = $node2; 
	    $this->adjacentList->{$node2}[] = $node1; 
	    
	  }
	  
	  
	  public function showConnections() {
	    
	    $allNodes = array_keys((array) $this->adjacentList);
	    
	    forEach($allNodes as $node) {
	      $nodeConnections = $this->adjacentList->{$node};
	      $connections = '';
	      
	      forEach($nodeConnections as $vertex) {
	        $connections .= $vertex . ' ';
	      }
	      
	      print_r($node . ' --> ' . $connections. "\n");
	    }
	    
	    echo "Number of Nodes: " . $this->numberOfNodes . "\n";
	    
	  }
	  
	  
	  
	}
	
	$myGraph = new Graph();
	$myGraph->addVertex('0');
	$myGraph->addVertex('1');
	$myGraph->addVertex('2');
	$myGraph->addVertex('3');
	$myGraph->addVertex('4');
	$myGraph->addVertex('5');
	$myGraph->addVertex('6');
	
	//Answer:
  // 0-->1 2 
  // 1-->3 2 0 
  // 2-->4 1 0 
  // 3-->1 4 
  // 4-->3 2 5 
  // 5-->4 6 
  // 6-->5
	
	$myGraph->addEdge('3', '1');
	$myGraph->addEdge('3', '4');
	$myGraph->addEdge('4', '2');
	$myGraph->addEdge('4', '5');
	$myGraph->addEdge('1', '2');
	$myGraph->addEdge('1', '0');
	$myGraph->addEdge('0', '2');
	$myGraph->addEdge('6', '5');
	
	$myGraph->showConnections();
	
	

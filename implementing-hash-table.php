<?php
	
	class HashTable {
	  
	  private $data;
	  private $indexCurrent;
	  
	  public function __construct($size) 
	  {
	    $this->data = array_fill(0, $size, null); 
	    $this->indexCurrent = 0;
	  }
	  
	  public function _hash($key) {
      $hash = '';
      for ($i =0; $i < strlen($key); $i++){
          $hash .= (string) (md5($key) . strval($i));
      }
      
      return $hash;
    }
    
    public function set($key, $value)
    {
      $size = count($this->data)-1;
      
      if($this->indexCurrent > $size) {
        throw new Exception('There is not space to hash');
      }
      
      $address = $this->_hash($key);
      $this->data[$this->indexCurrent] = [$address => $value];
      $this->indexCurrent++;
      
      
    }
    
    public function get($value)
    {
      $address = $this->_hash($value);
      
      for($i = 0; $i < count($this->data); $i++) {
        if(isset($this->data[$i][$address])) {
          return $this->data[$i][$address];
        }
      }
      
      return null;
    }

	  
}

$newHash = new HashTable(50);

$newHash->set('grapes', 10000);
$newHash->set('orange', 1234);
$newHash->set('banana', 999);

echo $newHash->get('grapes') . "\n";
echo $newHash->get('orange') . "\n";
echo $newHash->get('banana') . "\n";


	
	
	
?>

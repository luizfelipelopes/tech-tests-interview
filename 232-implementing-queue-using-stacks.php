// Link leetcode: https://leetcode.com/problems/implement-queue-using-stacks/

class MyQueue {
    /**
     */
    function __construct() {
        $this->stack = new SplStack();
        $this->length;
    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->stack->push($x);
    }
  
    /**
     * @return Integer
     */
    function pop() {
        return $this->stack->shift();
    }
  
    /**
     * @return Integer
     */
    function peek() {
        return $this->stack[count($this->stack)-1];
    }
  
    /**
     * @return Boolean
     */
    function empty() {
        return $this->stack->isEmpty();
    }
}

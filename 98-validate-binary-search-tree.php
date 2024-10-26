<?php
// Link leetcode: https://leetcode.com/problems/validate-binary-search-tree/description/
/**
* Given the root of a binary tree, determine if it is a valid binary search tree (BST).
* A valid BST is defined as follows:
* The left subtree of a node contains only nodes with keys less than the node's key.
* The right subtree of a node contains only nodes with keys greater than the node's key.
* Both the left and right subtrees must also be binary search trees.
*
*/

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */

class Solution {

    private $queue = [];

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {

        if (!$root) return true;

        $currentNode = $root;
        $list = [];
        $queue = [];        
        
        $queue[] = [
            'node' => $currentNode,
            'min' => -INF,
            'max' => INF,
        ];
        
        while(count($queue) > 0) {
            $current = array_shift($queue);
            $node = $current['node'];
            $min = $current['min'];    
            $max = $current['max'];    

            // Check if the node violates the BST property
            if($node->val <= $min || $node->val >= $max) {
                return false;
            }

            // Add left child to the queue with updated max constraint
            if($node->left) {
                $queue[] = [
                    'node' => $node->left,
                    'min' => $min,
                    'max' => $node->val,
                ];
            }

            // Add right child to the queue with updated min constraint
            if($node->right) {
                $queue[] = [
                    'node' => $node->right,
                    'min' => $node->val,
                    'max' => $max,
                ];
            }

        }

        return true;
           
    }
}

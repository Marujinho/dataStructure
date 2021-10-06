<?php 

class Node {
    public $data;
    public $key;
    public $left;
    public $right;

    public function __construct($data, $key)
    {
        $this->key = $key;
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    
    public $root = null;

    public function find($key)
    {   
        $node = $this->_find($this->root, $key);
    }

    private function _find($node, $key)
    {
        if($node === null || $node->key == $key){
            return $node;
        } elseif ($key < $node->key) {
            return $this->_find($node->left, $key);
        } elseif ($key > $node->key) {
            return $this->_find($node->right, $key);
        }

        return null;
    } 


    public function insert($key, $value)
    {
        $this->root = $this->_insert($this->root, $key, $value);
    }

    private function _insert($node, $key, $value)
    {
        $newNode = new Node($value, $key);

        if($node == null){
            $node = $newNode;
            return $node;
        }

        if($key < $node->key) {
            $node->left = $this->_insert($node->left, $key, $value);
        } else {
            $node->right = $this->_insert($node->right, $key, $value);
        }

        return $node;
    }
}    


$tree = new BinaryTree();
$tree->insert(1, 'AA');
$tree->insert(2, 'BB');
$tree->insert(3, 'CC');
$tree->insert(10, 'JJ');
$tree->insert(5, 'EE');
print_r($tree);
<?php

class Node {

    public $key;
    public $value;
    public $next;  

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = null;
    }

}

class HashTable {

    public $size = 42;
    public $mainArray = [];

    public function hash($key)
    {
        return crc32($key) % $this->size;
    }

    public function insert($key, $value)
    {
        $index = $this->hash($key);
        $newNode = new Node($key, $value);
        
        if(!isset($this->mainArray[$index])){
            
            $this->mainArray[$index] = $newNode;

        }else{
            
            $node = $this->mainArray[$index];

            while($this->mainArray[$index]->next != null){
                $this->mainArray[$index] = $this->mainArray[$index]->next;
            }

            $this->mainArray[$index]->next = $newNode;
        }
    }

    public function get($key)
    {
        $index = $this->hash($key);
        $data = $this->mainArray[$index];

        if($data != null){
            while(!$data->key == $key && $data->next != null){
                $data = $data->next;
            }

            return $data->value;
        }

        return null;
    }

    public function delete($key)
    {
        $index = $this->hash($key);

        if(!isset($this->mainArray[$index])){
            
            return null;
        }

        unset($this->mainArray[$index]);

        return true;
    }
}


$hashTable = new HashTable();
$hashTable->insert('Jonas', 'GAY');
$hashTable->insert('Jonas', 'GAY');
$hashTable->insert('Renato', 'MEDIO');
$hashTable->insert('Lucas Pimenta', 'HETERO');
$hashTable->get('Jonas');
$hashTable->delete('Renato');

print_r($hashTable->mainArray);
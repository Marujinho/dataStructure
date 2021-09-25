<?php

class Node {

    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function getData()
    {
        return $this->data;   
    }

    public function setData($node)
    {
        $this->data = $data;   
    }

    public function getNext()
    {
        return $this->next;   
    }

    public function setNext($next)
    {
        $this->next = $next;   
    }

}

class LinkedList { 
    private $head; 
    private $next; 
    private $size;   

    public function __construct()
    {
        $this->head = null;
        $this->size = 0;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($number)
    {
        $this->size = $number;
    }

    public function getHead()
    {
        return $this->head;
    }

    public function addFront($data):void
    {
        $newNode = new Node($data);
        // |data|  |next|

        //checks if is first data of linked list
        if($this->head == null){
            $this->head = $newNode;
            $this->size++;
            return;
        }

        //sets next as new incoming Node class
        $newNode->setNext($this->head); 
        
        //sets new incoming Node as linked list head
        $this->head = $newNode;
        $this->size++;

        return;
    }

    public function getFirst()
    {
        return $this->getHead();
    }

    public function getLast()
    {
        $current = $this->head;

        //start at very beginning
        while($current->getNext() != null) 
        {
            $current = $current->getNext();
        }

        return $current;
    }

    public function addLast($data)
    {
        $current = $this->head;
        $newNode = new Node($data);

        if($current == null){
            $this->head = $newNode;
            $this->size++;
            return;
        }

        //start at very beginning
        while($current->getNext() != null) 
        {
            $current = $current->getNext();
        }

        $current->setNext($newNode);
        $this->size++;

        return $current;
    }

    public function clear():void
    {
        $this->head = null;  
        $this->size = 0;    
        return;
    }

    public function deleteValue($data):void
    {
       $current = $this->head;

       if($this->head == null)
       {
           return;
       }
       
       if($this->head->getData() == $data)
       {
           $this->head = $this->head->getNext();
           $this->size--;
           return;
       }

       while($current->getNext() != null)
       {
            if($current->getNext()->getData() == $data){
                $current->setNext($current->getNext()->getNext());
                $this->size--;
                return;
            }

            $current = $current->getNext(); 
       }

       return;
    }

    public function reverse() {
        $prev = null;
        $current = $this->head;
            
        while($current != null){
           $next = $current->next;
           $current->next = $prev;
           $prev = $current;
           $current = $next;
           $this->head = $prev;
        }
       
       return $this->head;
   }

}

$linkedList = new LinkedList();
$linkedList->addLast('AA');
$linkedList->addLast('BB');
$linkedList->addLast('CC');
print_r($linkedList->getHead());
$linkedList->reverse();
// $linkedList->deleteValue('AA');
print_r($linkedList->getHead());





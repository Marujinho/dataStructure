<?php

class Arr {

    protected $arr;

    public function __construct($arr)
    {
        $this->arr = $arr;
        $this->arraySize = count($this->arr);
    }
   
    /**
     * @param
     * @var int
     */
    public function get(int $index):string
    {
        print_r($this->arr[$index]);    
        return $this->arr[$index];
    }

     /**
     * @param
     * @var int
     * @var string
     */
    public function set(int $index, string $value):void
    {
        $this->arr[$index] = $value;
    }

     /**
     * @param
     * @var int
     * @var int|string
     */
    public function insert(int $index, $value):void
    {
        $temp = [];
        
        /*copy each element after the $index 1 index to the right 
        to 'open space' for the incoming value */
        for ($i = $this->arraySize; $i > $index; $i--) { 
            $this->arr[$i] = $this->arr[$i - 1];
        }
        
        //Do the insert of the incoming value
        $this->arr[$index] = $value;
        $this->arraySize++;

        $this->printArr();
    }

     /**
     * @param
     * @var int
     */
    public function delete(int $index):void
    {
        //copy all elements after $index, one index to the left
        for ($i = $index; $i < $this->arraySize -1; $i++) {
            $this->arr[$i] = $this->arr[$i + 1];
        } 

        $this->arraySize--;
        
        $this->printArr();
    }

    /**
     * @param
     * @var string
     */
    public function contains(string $index):boolean
    {
        for ($i=0; $i < $this->arraySize - 1; $i++) { 
            if($this->arr[$index] == $value) {
                return true;
            }
        }

        return false;
    }

  
    private function printArr():void
    {
        for ($i=0; $i < $this->arraySize; $i++) { 
           print($i);
           print(' = ');
           print($this->arr[$i]);
           print("\n");
        }

        print("************** \n");
    }
}


$arr = new Arr(['a', 'b', 'c', 'd', 'e']);
$arr->insert(2, "GG");
$arr->delete(2);
// $arr->insert(3, "JJ");
// $arr->delete(0);


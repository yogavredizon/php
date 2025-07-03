<?php

class ProductModel{
    private $name;
    private $quantity;


    public function setName($name){
        $this->name = $name;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

  
    public function getName(){
        return $this->name;
    }

    public function getQuantity(){
        return $this->quantity;
    }
   
    public function __construct($name, $quantity){
        $this->setName($name);
        $this->setQuantity($quantity);
    }
}
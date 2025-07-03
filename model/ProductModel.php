<?php

class ProductModel{
    private $id;
    private $name;
    private $quantity;
    private $price;

    public function setID($id){
        $this->id = $id;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getID(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getQuantity(){
        return $this->quantity;
    }
    public function getPrice(){
        return $this->price;
    }

    public function __construct($id, $name, $quantity, $price){
        $this->setID($id);
        $this->setName($name);
        $this->setQuantity($quantity);
        $this->setPrice($price);
    }
}
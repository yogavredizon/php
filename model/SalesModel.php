<?php

class SalesModel{
    private $product;
    private $quantity;
    private $price;
    private $time;
    
    public function setProduct($product){
        $this->product = $product;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setTime($time){
        $this->time = $time;
    }

    public function getProduct(){
        return $this->product;
    }

    public function getQuantity(){
        return $this->quantity;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getTime(){
        return $this->time;
    }

    public function __construct($product, $quantity, $time, $price){
        $this->setProduct($product);
        $this->setQuantity($quantity);
        $this->setPrice($price);
        $this->setTime($time);
    }
}
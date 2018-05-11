<?php

namespace App\Model\Product;

class Product {
    private $id, $name, $price;

    //Setters
    public function setId($id){
        if (!is_int($id)){
            throw new \InvalidArgumentException("Precisa ser inteiro: ID");
        }
        $this->id = $id;
    }

    public function setName($name){
        if(empty($name)){
            throw new \InvalidArgumentException("Nome precisa ser preenchiodo");
        }
        $this->name = $name;
    }

    public function setPrice($price){
        if (is_float($price)){
            throw new \InvalidArgumentException("Preço precisa ser um float");
        }
        $this->price = $price;
    }

    //Getters
    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }
}
<?php

    namespace Src\Models\ProductModels;


    class Book extends MainAbstract
    {
        private $sku;
        private $name;
        private $price;
        private $weight;

        public function __construct($array)
        {
            $this -> sku = $array["sku"];
            $this -> name = $array["name"];
            $this -> price = $array["price"];
            $this -> weight = $array["weight"];
        }

        public function getSku()
        {
            return $this->sku;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function getInfo(){
            return "Weight : {$this->weight}KG";
        }
    }

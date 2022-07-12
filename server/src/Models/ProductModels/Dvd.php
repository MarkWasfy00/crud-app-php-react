<?php

    namespace Src\Models\ProductModels;


    class Dvd extends MainAbstract
    {
        private $sku;
        private $name;
        private $price;
        private $size;

        public function __construct($array)
        {
            $this -> sku = $array["sku"];
            $this -> name = $array["name"];
            $this -> price = $array["price"];
            $this -> size = $array["size"];
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
            return "Size : {$this->size}MB";
        }
    }
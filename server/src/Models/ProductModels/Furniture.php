<?php

    namespace Src\Models\ProductModels;


    class Furniture extends MainAbstract
    {
        private $sku;
        private $name;
        private $price;
        private $height;
        private $width;
        private $length;

        public function __construct($array)
        {
            $this -> sku = $array["sku"];
            $this -> name = $array["name"];
            $this -> price = $array["price"];
            $this -> height = $array["height"];
            $this -> width = $array["width"];
            $this -> length = $array["length"];
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
            return "Dimensions : {$this->height}x{$this->width}x{$this->length}";
        }
    }
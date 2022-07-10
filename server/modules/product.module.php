<?php


    namespace Product;


    abstract class Product
    {
        abstract public function __construct($array);
        abstract public function getSku();
        abstract public function getName();
        abstract public function getPrice();
        abstract public function getInfo();
    }


    class Dvd extends Product
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


    class Book extends Product
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



    class Furniture extends Product
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
            $this -> width = $array["height"];
            $this -> length = $array["height"];
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
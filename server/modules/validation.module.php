<?php

    namespace Validate;
    require '../modules/db.module.php';
    use Database\DBConnection;


    class Validation
    {

        private $sku;
        private $name;
        private $price;
        public $errors = [];

        public function __construct($array)
        {
            if (isset($array['sku']) && isset($array['sku']) && isset($array['sku'])){
                $this-> sku = $array['sku'];
                $this-> name = $array['name'];
                $this-> price = $array['price'];
            }
        }

        private function isValidSku()
        {
            if(empty($this->sku)){
                $this->errors = ["sku" => "sku are empty","status" => 400];
            } elseif (strlen($this->sku) < 5){
                $this->errors = ["sku" => "sku are less than 5","status" => 400];
            } else {
                $db = new DBConnection('**',"**","**","**");
                $db -> connect();
                if($db -> isSkuExisting($this->sku,'products')){
                    $this->errors = ["sku" => "sku are exiting","status" => 400];
                } else {
                    return true;
                }
                $db -> disconnect();
            }
            
        }

        private function isValidName()
        {
            if(empty($this->name)){
                $this->errors = ["name" => "name are empty" , "status" => 400];
                
            } elseif (strlen($this->name) < 3){
                $this->errors = ["name" => "name are less than 3","status" => 400];
            } else {
                return true;
            }
        }

        private function isValidPrice()
        {
            if(empty($this->price)){
                $this->errors = ["price" => "price are empty","status" => 400];
            } elseif ($this->price < 1){
                $this->errors = ["price" => "price are less than 1", "status" => 400];
            } else {
                return true;
            }
        }

        protected function isValidBasic()
        {
            if($this->isValidSku() && $this->isValidName() && $this->isValidPrice()){
                return true;
            } else {
                return false;
            }
        }

        protected function showErrors()
        {
            return json_encode($this->errors);
        }
    }



    class DvdValidator extends Validation
    {
        private $size;

        public function __construct($array)
        {
            parent::__construct($array);
            if (isset($array['size'])){
                $this->size = $array["size"];
            }
        }

        public function isValidSize()
        {
            if(empty($this->size)){
                $this->errors = ["size" => "size are empty","status" => 400];
            } elseif ($this->size < 1){
                $this->errors = ["size" => "size are less than 1", "status" => 400];
            } else {
                return filter_var($this->size, FILTER_VALIDATE_INT);
            }

            
        }

        public function validate()
        {
            if($this->isValidBasic() && $this->isValidSize()){
                return true;
            } else {
                echo $this->showErrors();
            }
        }

       
    }


    class BookValidator extends Validation
    {
        private $weight;

        public function __construct($array)
        {
            parent::__construct($array);
            if (isset($array['weight'])){
                $this->weight = $array["weight"];
            }
        }

        public function isValidWeight()
        {
            if(empty($this->weight)){
                $this->errors = ["weight" => "weight are empty","status" => 400];
            } elseif ($this->weight < 1){
                $this->errors = ["weight" => "weight are less than 1","status" => 400];
            } else {
                return filter_var($this->weight, FILTER_VALIDATE_INT);
            }

            
        }

        public function validate()
        {
            if($this->isValidBasic() && $this->isValidWeight()){
                return true;
            } else {
                echo $this->showErrors();
            }
        }

       
    }


    class FurnitureValidator extends Validation
    {
        private $height;
        private $width;
        private $length;

        public function __construct($array)
        {
            parent::__construct($array);
            if (isset($array['height']) && isset($array['width']) && isset($array["length"])){
                $this->height = $array["height"];
                $this->width = $array["width"];
                $this->length = $array["length"];
            }
        }

        public function isValidHeight()
        {
            if(empty($this->height)){
                $this->errors = ["height" => "height are empty","status" => 400];
            } elseif ($this->height < 1){
                $this->errors = ["height" => "height are less than 1","status" => 400];
            } else {
                return filter_var($this->height, FILTER_VALIDATE_INT);
            }
        }

        public function isValidWidth()
        {
            if(empty($this->width)){
                $this->errors = ["width" => "width are empty", "status" => 400];
            } elseif ($this->width < 1){
                $this->errors = ["width" => "width are less than 1", "status" => 400];
            } else {
                return filter_var($this->width, FILTER_VALIDATE_INT);
            }
        }

        public function isValidLength()
        {
            if(empty($this->length)){
                $this->errors = ["length" => "length are empty", "status" => 400];
            } elseif ($this->length < 1){
                $this->errors = ["length" => "length are less than 1", "status" => 400];
            } else {
                return filter_var($this->length, FILTER_VALIDATE_INT);
            }
        }

        public function validate()
        {
            if($this->isValidBasic() && $this->isValidHeight() && $this->isValidWidth() && $this->isValidLength() ){
                return true;
            } else {
                echo $this->showErrors();
            }
        }

       
    }


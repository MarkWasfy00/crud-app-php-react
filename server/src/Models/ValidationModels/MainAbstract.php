<?php

    namespace Src\Models\ValidationModels;
    use Src\Models\DBConnection;
    


    class MainAbstract extends DBConnection
    {

        private $sku;
        private $name;
        private $price;
        public $errors = [];

        public function __construct($array)
        {
            if (isset($array['sku']) && isset($array['name']) && isset($array['price'])){
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
                $this -> connect();
                $filtered_sku = mysqli_real_escape_string($this -> connection,$this->sku);
                $query = "SELECT * FROM products WHERE sku = '$filtered_sku'";
                $data = mysqli_query($this -> connection,$query);
                $items = mysqli_fetch_all($data,MYSQLI_ASSOC);
                $this -> disconnect();
                if (count($items) > 0) {
                    $this->errors =  ["sku" => "sku are exiting","status" => 400];
                } else {
                    return true;
                }
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

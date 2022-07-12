<?php 


    namespace Src\Models\ValidationModels;


    class FurnitureValidator extends MainAbstract
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

<?php


    namespace Src\Models\ValidationModels;

    
    class DvdValidator extends MainAbstract
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

<?php


    namespace Src\Models\ValidationModels;



    class BookValidator extends MainAbstract
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

<?php

    namespace Database;
    use Exception;
    use mysqli;


    class DBConnection {
        private $host;
        private $username;
        private  $password;
        private $dbname;
        private $connection;


        public function __construct($host = "localhost", $username = '' , $password = "",$dbname = "")
        {
            $this->host = $host;    
            $this->username = $username;    
            $this->password = $password;
            $this->dbname = $dbname;
        }

        public function connect()
        {
            $this->connection = new mysqli($this -> host, $this -> username, $this -> password , $this -> dbname);
            if (!$this -> connection) {
                echo "conection failed: " . mysqli_connect_error();
            }
        }

        public function disconnect()
        {
            if ($this->connection) {
                mysqli_close($this -> connection);
            }
        }

        public function fetchById($columns , $tablename) 
        {
            $query = "SELECT $columns FROM $tablename ORDER BY id";
            $data = mysqli_query($this->connection,$query);
            $items = mysqli_fetch_all($data,MYSQLI_ASSOC);
            echo json_encode($items);
        }

        public function deleteSelected($array,$columnname,$tablename)
        {
            try {
                foreach ($array as $product){
                    $filtered_product = mysqli_real_escape_string($this -> connection,$product);
                    $query = "DELETE FROM $tablename WHERE $columnname = '$filtered_product' ";
                    mysqli_query($this->connection,$query);
                }
                echo json_encode(["message" => "success","status" => 200]);
            } catch (Exception $e) {
                echo json_encode(["message" => $e->getMessage(),"status" => 400]);
            };
        }

        public function isSkuExisting($sku,$tablename)
        {
            $filtered_sku = mysqli_real_escape_string($this -> connection,$sku);
            $query = "SELECT * FROM $tablename WHERE sku = '$filtered_sku'";
            $data = mysqli_query($this -> connection,$query);
            $items = mysqli_fetch_all($data,MYSQLI_ASSOC);
            if (count($items) > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function addProduct($product,$tablename)
        {
            $filtered_sku = mysqli_real_escape_string($this -> connection,$product->getSku());
            $filtered_name = mysqli_real_escape_string($this -> connection,$product->getName());
            $filtered_price = mysqli_real_escape_string($this -> connection,$product->getPrice());
            $filtered_info = mysqli_real_escape_string($this -> connection,$product->getInfo());
            $query = "INSERT INTO `products` (`id`, `sku`, `name`, `price`, `attribute`) VALUES (NULL, '$filtered_sku', '$filtered_name', '$filtered_price', '$filtered_info');";
            if(mysqli_query($this->connection,$query)){
                echo json_encode(["msg" => 'success add new product','status' => 200 ]);
            }
            
        }
    }


   
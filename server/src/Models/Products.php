<?php

    namespace Src\Models;
    use Src\Models\DBConnection;
    use Exception;



    class Products extends DBConnection
    {
        public function fetchAllProducts(){
            $this-> connect();
            $query = "SELECT * FROM products ORDER BY id";
            $data = mysqli_query($this->connection,$query);
            $items = mysqli_fetch_all($data,MYSQLI_ASSOC);
            echo json_encode($items);
            $this->disconnect();
        }


        public function deleteSelectedBySku($array)
        {   
            $this->connect();
            try {
                foreach ($array as $product){
                    $filtered_product = mysqli_real_escape_string($this -> connection,$product);
                    $query = "DELETE FROM products WHERE sku = '$filtered_product' ";
                    mysqli_query($this->connection,$query);
                }
                echo json_encode(["message" => "success","status" => 200]);
                $this->disconnect();
            } catch (Exception $e) {
                echo json_encode(["message" => $e->getMessage(),"status" => 400]);
                $this->disconnect();
            };
        }

        public function addProduct($product)
        {
            $this->connect();
            $filtered_sku = mysqli_real_escape_string($this -> connection,$product->getSku());
            $filtered_name = mysqli_real_escape_string($this -> connection,$product->getName());
            $filtered_price = mysqli_real_escape_string($this -> connection,$product->getPrice());
            $filtered_info = mysqli_real_escape_string($this -> connection,$product->getInfo());
            $query = "INSERT INTO `products` (`id`, `sku`, `name`, `price`, `attribute`) VALUES (NULL, '$filtered_sku', '$filtered_name', '$filtered_price', '$filtered_info');";
            if(mysqli_query($this->connection,$query)){
                echo json_encode(["msg" => 'success add new product','status' => 200 ]);
            }
            $this->disconnect();
        }

    }
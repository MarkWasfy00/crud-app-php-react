<?php

    header('Access-Control-Allow-Origin: *');
    include('../../vendor/autoload.php');
    use Src\Models\Products;
 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents('php://input'), true);
        if(isset($data['selectedProducts'])){
            $products = new Products;
            $products -> deleteSelectedBySku($data["selectedProducts"]);
        }
    } else {
       $products = new Products;
       $products-> fetchAllProducts();
    }

 
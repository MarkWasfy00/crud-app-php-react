<?php


    header('Access-Control-Allow-Origin: http://mark-wasfy-junior-web-dev.infinityfreeapp.com');
    use Database\DBConnection;
    include '../modules/validation.module.php';
    include '../modules/product.module.php';
    

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents('php://input'), true);
    
        
        $validators = [
            'dvd' => 'Validate\DvdValidator',
            'book' => 'Validate\BookValidator',
            'furniture' => 'Validate\FurnitureValidator',
        ];

        $products = [
            'dvd' => 'Product\Dvd',
            'book' => 'Product\Book',
            'furniture' => 'Product\Furniture'
        ];

        
        $validatorClass = $validators[$data['type']];
        $validator = new $validatorClass($data);
        if($validator->validate()){
            $productClass = $products[$data['type']];
            $product = new $productClass($data);
            $mydb = new DBConnection('**',"**","**","**");
            $mydb -> connect();
            $mydb -> addProduct($product,'products');
            $mydb -> disconnect();
        }
        
    }
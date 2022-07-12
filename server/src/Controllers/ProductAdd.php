<?php


    header('Access-Control-Allow-Origin: *');
    include('../../vendor/autoload.php');
    use Src\Models\Products;
    

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents('php://input'), true);

        $products = [
            'dvd' => 'Src\Models\ProductModels\Dvd',
            'book' => 'Src\Models\ProductModels\Book',
            'furniture' => 'Src\Models\ProductModels\Furniture'
        ];
        $validators = [
            'dvd' => 'Src\Models\ValidationModels\DvdValidator',
            'book' => 'Src\Models\ValidationModels\BookValidator',
            'furniture' => 'Src\Models\ValidationModels\FurnitureValidator',
        ];

        $validatorClass = $validators[$data['type']];
        $validator = new $validatorClass($data);
        
        if($validator->validate()){
            $productClass = $products[$data['type']];
            $product = new $productClass($data);
            $myProduct = new Products;
            $myProduct -> addProduct($product);
        }
    }
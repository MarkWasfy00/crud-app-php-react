<?php



    header('Access-Control-Allow-Origin: http://mark-wasfy-junior-web-dev.infinityfreeapp.com/');
    include '../modules/db.module.php';
    
 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents('php://input'), true);
        if(isset($data['selectedProducts'])){
            $mydb = new Database\DBConnection('**',"**","**","**");
            $mydb -> connect();
            $mydb -> deleteSelected($data["selectedProducts"],'sku',"products");
            $mydb -> disconnect();
        }
        
    } else {
        $mydb = new Database\DBConnection('**',"**","**","**");

        $mydb -> connect();

        $mydb -> fetchById('*','products');
        
        $mydb -> disconnect();
    }

 
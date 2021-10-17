<?php

function initialise_session_products($productId, $productQuanitity){
    $products = array($productId=>$productQuanitity);
    $_SESSION["products"] = $products;
}

function update(){
    if (isset($_POST["cartProductId"]) && isset($_POST["cartProductQuantity"])){
        if (isset($_SESSION["products"])) {
            if (isset($_SESSION["products"][$_POST["cartProductId"]])) {
                $_SESSION["products"][$_POST["cartProductId"]] += $_POST["cartProductQuantity"];
                if ($_SESSION["products"][$_POST["cartProductId"]] <= 0){
                    remove();
                }
            } 
            else{
                $_SESSION["products"][$_POST["cartProductId"]] = $_POST["cartProductQuantity"];
            }
        }
        else{
            initialise_session_products($_POST["cartProductId"], $_POST["cartProductQuantity"]);
        }
    }
}

function insert(){
    if (isset($_POST["cartProductId"])){
        if (isset($_SESSION["products"][$_POST["cartProductId"]])) {
            unset($_SESSION["products"][$_POST["cartProductId"]]);
        } 
    }
}

function clear(){
    unset($_SESSION["products"]);
}

if (isset($_POST["orderAction"])){
    switch ($_POST["orderAction"]) {
        case "insert":
            insert();
            break;
    }
}

?>
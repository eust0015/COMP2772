<?php

function insert(){
    $creditCardId = insert_into_creditCard($conn, $_POST["nameOnCard"], $_POST["cardNumber"], $_POST["expirationMonth"], $_POST["expirationYear"], $_POST["cvc"]);
    
    $billingAddressId = insert_into_address($conn, $_POST["billing-fname"], $_POST["billing-lname"], $_POST["billing-mobilenumber"], $_POST["billing-email"], $_POST["billing-streetAddress"], $_POST["billing-suburb"], $_POST["billing-state"], $_POST["billing-postcode"]);
    
    $deliveryAddressId = insert_into_account($conn, $_POST["shipping-fname"], $_POST["shipping-lname"], $_POST["shipping-mobilenumber"], $_POST["shipping-email"], $_POST["shipping-streetAddress"], $_POST["shipping-suburb"], $_POST["shipping-state"], $_POST["shipping-postcode"]);
    
    $ordersId = "";
    if (isset($_POST["logged-in"])){
        $ordersId = insert_into_orders($conn, $creditCardId, $deliveryId, $quotedDeliveryCost, $billingAddressId, $deliveryAddressId, $accountId = NULL);
    }
    else{
        
    }

    insert_into_orderProduct($conn, $orderId, $productId, $quantity, $quotedProductCost);
}

if (isset($_POST["orderAction"])){
    switch ($_POST["orderAction"]) {
        case "insert":
            insert();
            break;
    }
}

?>
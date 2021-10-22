<?php

include_once 'db_functions.php';

function insert(){
    $conn = get_conn();
    $orderId = "";
    if($conn){
    
        $creditCardId = insert_into_creditCard($conn, $_POST["nameOnCard"], $_POST["cardNumber"], substr($_POST["expirationDate"], -2), substr($_POST["expirationDate"], 0, 4), $_POST["cvc"]);
        
        $billingAddressId = insert_into_address($conn, $_SESSION["account"]["billing-fname"], $_SESSION["account"]["billing-lname"], $_SESSION["account"]["billing-mobilenumber"], $_SESSION["account"]["billing-email"], $_SESSION["account"]["billing-streetAddress"], $_SESSION["account"]["billing-suburb"], $_SESSION["account"]["billing-state"], $_SESSION["account"]["billing-postcode"]);
        
        if(isset($_SESSION["account"]["shipToBillingAddress"])){
            $shippingAddressId = $billingAddressId;
        }
        else{
            $shippingAddressId = insert_into_address($conn, $_SESSION["account"]["shipping-fname"], $_SESSION["account"]["shipping-lname"], $_SESSION["account"]["shipping-mobilenumber"], $_SESSION["account"]["shipping-email"], $_SESSION["account"]["shipping-streetAddress"], $_SESSION["account"]["shipping-suburb"], $_SESSION["account"]["shipping-state"], $_SESSION["account"]["shipping-postcode"]);
        }
        
        $result = get_postage_by_id($conn, htmlspecialchars($_SESSION["account"]["postage"]));
        if ($result) { 
            $quotedPostageCost = $result["cost"];
        }
        
        if (isset($_SESSION["account"]["logged-in"])){
            update_account_addresses($conn, $_SESSION["account"]["account-id"], $billingAddressId, $shippingAddressId);
            $orderId = insert_into_orders($conn, $creditCardId, $_SESSION["account"]["postage"], $quotedPostageCost, $billingAddressId, $shippingAddressId, $_SESSION["account"]["account-id"]);        
        }
        else{
            $orderId = insert_into_orders($conn, $creditCardId, $_SESSION["account"]["postage"], $quotedPostageCost, $billingAddressId, $shippingAddressId);        
        }

        foreach($_SESSION["products"] as $productId => $productQuantity) {
            $result = get_product_by_id($conn, htmlspecialchars($productId));
            if ($result) {
                $subTotal = $productQuantity * $result["price"];
                insert_into_orderProduct($conn, $orderId, $productId, $productQuantity, $result["price"]);
            }
        }

        mysqli_close($conn); 
    }

    return $orderId;
}

?>
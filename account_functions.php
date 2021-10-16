<?php

function initialise_session_account($loggedIn){
    $account = array("logged-in"=>$loggedIn);
}

function update(){
    if (isset($_POST["account"]) == false){
        if (isset($_POST["logged-in"])){
            initialise_session_account($_POST["logged-in"]);
        }
        else{
            initialise_session_account(false);
        } 
    }
    if (isset($_POST["logged-in"])){ $_SESSION["account"]["logged-in"] = $_POST["logged-in"]; }
    if (isset($_POST["account-id"])){ $_SESSION["account"]["account-id"] = $_POST["account-id"]; }
    if (isset($_POST["firstName"])){ $_SESSION["account"]["firstName"] = $_POST["firstName"]; }
    if (isset($_POST["lastName"])){ $_SESSION["account"]["lastName"] = $_POST["lastName"]; }
    if (isset($_POST["billing-fname"])){ $_SESSION["account"]["billing-fname"] = $_POST["billing-fname"];}
    if (isset($_POST["billing-lname"])){ $_SESSION["account"]["billing-lname"] = $_POST["billing-lname"];}
    if (isset($_POST["billing-mobilenumber"])){ $_SESSION["account"]["billing-mobilenumber"] = $_POST["billing-mobilenumber"];}
    if (isset($_POST["billing-email"])){ $_SESSION["account"]["billing-email"] = $_POST["billing-email"];}
    if (isset($_POST["billing-streetAddress"])){ $_SESSION["account"]["billing-streetAddress"] = $_POST["billing-streetAddress"];}
    if (isset($_POST["billing-suburb"])){ $_SESSION["account"]["billing-suburb"] = $_POST["billing-suburb"];}
    if (isset($_POST["billing-state"])){ $_SESSION["account"]["billing-state"] = $_POST["billing-state"];}
    if (isset($_POST["billing-postcode"])){ $_SESSION["account"]["billing-postcode"] = $_POST["billing-postcode"];}
    if (isset($_POST["shipToBillingAddress"])){ $_SESSION["account"]["shipToBillingAddress"] = $_POST["shipToBillingAddress"];}
    if (isset($_POST["shipping-fname"])){ $_SESSION["account"]["shipping-fname"] = $_POST["shipping-fname"];}
    if (isset($_POST["shipping-lname"])){ $_SESSION["account"]["shipping-lname"] = $_POST["shipping-lname"];}
    if (isset($_POST["shipping-mobilenumber"])){ $_SESSION["account"]["shipping-mobilenumber"] = $_POST["shipping-mobilenumber"];}
    if (isset($_POST["shipping-email"])){ $_SESSION["account"]["shipping-email"] = $_POST["shipping-email"];}
    if (isset($_POST["shipping-streetAddress"])){ $_SESSION["account"]["shipping-streetAddress"] = $_POST["shipping-streetAddress"];}
    if (isset($_POST["shipping-suburb"])){ $_SESSION["account"]["shipping-suburb"] = $_POST["shipping-suburb"];}
    if (isset($_POST["shipping-state"])){ $_SESSION["account"]["shipping-state"] = $_POST["shipping-state"];}
    if (isset($_POST["shipping-postcode"])){ $_SESSION["account"]["shipping-postcode"] = $_POST["shipping-postcode"];}
    if (isset($_POST["postage"])){ $_SESSION["account"]["postage"] = $_POST["postage"];}
}

function clear(){
    unset($_SESSION["account"]);
}

if (isset($_POST["accountAction"])){
    switch ($_POST["accountAction"]) {
        case "update":
            update();
            break;
        case "clear":
            clear();
            break;
    }
}

?>
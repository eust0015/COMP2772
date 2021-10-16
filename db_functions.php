<?php

    function get_conn() {
        // comment out the following line when using in production
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $dbhost = "localhost";
        $dbuser = "dbadmin";
        $dbpassword = "";
        $db = "comp2772";  

        $conn = @mysqli_connect($dbhost, $dbuser, $dbpassword, $db);
        
        if (!$conn) {
            echo "Database connection failed!";
            error_log(mysqli_connect_error());
        }
        else {
            mysqli_set_charset($conn, "utf8mb4");
        }
        return $conn;  
    }

    function get_product_by_id($conn, $product_id) {
        $stmt = mysqli_prepare($conn, "SELECT * from product where id = ?");
        
        mysqli_stmt_bind_param($stmt, "s", $product_id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $name, $description, $image, $price, $recommendedRetailPrice, $category, $keyWord);
            if (mysqli_stmt_fetch($stmt)) {
                $result = array();
                $result["id"] = $id;
                $result["name"] = $name;
                $result["description"] = $description;
                $result["image"] = $image;
                $result["price"] = $price;
                $result["recommendedRetailPrice"] = $recommendedRetailPrice;
                $result["category"] = $category;
                $result["keyWord"] = $keyWord;
            }
        }
        mysqli_stmt_close($stmt);
        return $result;
    }

    function get_product_by_name($conn, $product_name) {
        $stmt = mysqli_prepare($conn, "SELECT * from product where name = ?");
        
        mysqli_stmt_bind_param($stmt, "s", $product_name);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $name, $description, $image, $price, $recommendedRetailPrice, $category, $keyWord);
            if (mysqli_stmt_fetch($stmt)) {
                $result = array();
                $result["id"] = $id;
                $result["name"] = $name;
                $result["description"] = $description;
                $result["image"] = $image;
                $result["price"] = $price;
                $result["recommendedRetailPrice"] = $recommendedRetailPrice;
                $result["category"] = $category;
                $result["keyWord"] = $keyWord;
            }
        }
        mysqli_stmt_close($stmt);
        return $result;
    }

    function get_products($conn) {
      
        $stmt = mysqli_prepare($conn, "SELECT * from product");
        
        $results = array();
        $rowCount = 0;
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $name, $description, $image, $price, $recommendedRetailPrice, $category, $keyWord);
            while (mysqli_stmt_fetch($stmt)) {
                $row = array();
                $row["id"] = $id;
                $row["name"] = $name;
                $row["description"] = $description;
                $row["image"] = $image;
                $row["price"] = $price;
                $row["recommendedRetailPrice"] = $recommendedRetailPrice;
                $row["category"] = $category;
                $row["keyWord"] = $keyWord;
                
                $results[$rowCount] = $row;
                $rowCount++;
            }
        }
        mysqli_stmt_close($stmt);
        return $results;
    }

    function get_products_with_category($conn, $product_category) {
      
        $product_category = strtolower($product_category);
        $stmt = mysqli_prepare($conn, "SELECT * from product WHERE category = ?");
        
        mysqli_stmt_bind_param($stmt, "s", $product_category);

        $results = array();
        $rowCount = 0;
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $name, $description, $image, $price, $recommendedRetailPrice, $category, $keyWord);
            while (mysqli_stmt_fetch($stmt)) {
                $row = array();
                $row["id"] = $id;
                $row["name"] = $name;
                $row["description"] = $description;
                $row["image"] = $image;
                $row["price"] = $price;
                $row["recommendedRetailPrice"] = $recommendedRetailPrice;
                $row["category"] = $category;
                $row["keyWord"] = $keyWord;
                
                $results[$rowCount] = $row;
                $rowCount++;
            }
        }
        mysqli_stmt_close($stmt);
        return $results;
    }

    function get_products_with_keyWord($conn, $product_keyWord) {

        $keyWordList = explode(" ", $product_keyWord);
        
        for ($x = 0; $x < count($keyWordList); $x++) {
            $keyWordList[$x] = "%".strtolower($keyWordList[$x])."%";
        }

        $sql = "SELECT * from product WHERE keyWord LIKE ?";
        $type = "s";
        for ($x = 1; $x < count($keyWordList); $x++) {
            $sql .= " OR keyWord LIKE ?";
            $type .= "s";
        }
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, $type, ...$keyWordList);
    
        $results = array();
        $rowCount = 0;
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $name, $description, $image, $price, $recommendedRetailPrice, $category, $keyWord);
            while (mysqli_stmt_fetch($stmt)) {
                $row = array();
                $row["id"] = $id;
                $row["name"] = $name;
                $row["description"] = $description;
                $row["image"] = $image;
                $row["price"] = $price;
                $row["recommendedRetailPrice"] = $recommendedRetailPrice;
                $row["category"] = $category;
                $row["keyWord"] = $keyWord;
                
                $results[$rowCount] = $row;
                $rowCount++;
            }
        }
        mysqli_stmt_close($stmt);
        return $results;
    }

    function get_products_with_category_and_keyWord($conn, $product_category, $product_keyWord) {

        $product_category = strtolower($product_category);
        $keyWordList = explode(" ", $product_keyWord);
        
        for ($x = 0; $x < count($keyWordList); $x++) {
            $keyWordList[$x] = "%".strtolower($keyWordList[$x])."%";
        }

        $sql = "SELECT * from product WHERE category = ? AND (keyWord LIKE ?";
        $type = "ss";
        for ($x = 1; $x < count($keyWordList); $x++) {
            $sql .= " OR keyWord LIKE ?";
            $type .= "s";
        }
        $sql .= ")";

        // Put the category at the front of keyWordList and most all the existing elements up one place
        array_unshift($keyWordList, $product_category);

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, $type, ...$keyWordList);
    
        $results = array();
        $rowCount = 0;
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $name, $description, $image, $price, $recommendedRetailPrice, $category, $keyWord);
            while (mysqli_stmt_fetch($stmt)) {
                $row = array();
                $row["id"] = $id;
                $row["name"] = $name;
                $row["description"] = $description;
                $row["image"] = $image;
                $row["price"] = $price;
                $row["recommendedRetailPrice"] = $recommendedRetailPrice;
                $row["category"] = $category;
                $row["keyWord"] = $keyWord;
                
                $results[$rowCount] = $row;
                $rowCount++;
            }
        }
        mysqli_stmt_close($stmt);
        return $results;
    }

    function get_postages($conn) {
      
        $stmt = mysqli_prepare($conn, "SELECT * from postage");
        
        $results = array();
        $rowCount = 0;
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $name, $cost);
            while (mysqli_stmt_fetch($stmt)) {
                $row = array();
                $row["id"] = $id;
                $row["name"] = $name;
                $row["cost"] = $cost;
                $results[$rowCount] = $row;
                $rowCount++;
            }
        }
        mysqli_stmt_close($stmt);
        return $results;
    }

    function get_postage_by_id($conn, $postage_id) {
        $stmt = mysqli_prepare($conn, "SELECT * from postage where id = ?");
        
        mysqli_stmt_bind_param($stmt, "s", $postage_id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $id, $name, $cost);
            if (mysqli_stmt_fetch($stmt)) {
                $result = array();
                $result["id"] = $id;
                $result["name"] = $name;
                $result["cost"] = $cost;
            }
        }
        mysqli_stmt_close($stmt);
        return $result;
    }

    function get_last_id($conn, $table, $noOfNumericChar) {
        $stmt = mysqli_prepare($conn, "SELECT MAX(CAST(RIGHT(id,{$noOfNumericChar}) AS int)) AS lastID FROM {$table}");
        
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_bind_result($stmt, $lastID);
            if (mysqli_stmt_fetch($stmt)) {
                $result = $lastID;
            }
        }
        mysqli_stmt_close($stmt);
        return $result;
    }

    function insert_into_creditCard($conn, $nameOnCard, $cardNumber, $expirationMonth, $expirationYear, $cvc) {
        $id = get_last_id($conn, "creditCard", 7);

        $stmt = mysqli_prepare($conn, "INSERT INTO creditCard VALUES (?, ?, ?, ?, ?, ?)");
        
        mysqli_stmt_bind_param($stmt, "ssssss", $id, $nameOnCard, $cardNumber, $expirationMonth, $expirationYear, $cvc);
        
        mysqli_stmt_execute($stmt)

        mysqli_stmt_close($stmt);
        return $id;
    }

    function insert_into_address($conn, $firstName, $lastName, $mobileNumber, $email, $streetAddress, $suburb, $province, $postcode) {
        $id = get_last_id($conn, "address", 7);
        $id = "add" . str_pad($id, 7, "0", STR_PAD_LEFT);

        $stmt = mysqli_prepare($conn, "INSERT INTO address VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        mysqli_stmt_bind_param($stmt, "sssssssss", $id, $firstName, $lastName, $mobileNumber, $email, $streetAddress, $suburb, $province, $postcode);
        
        mysqli_stmt_execute($stmt)

        mysqli_stmt_close($stmt);
        return $id;
    }

    function insert_into_account($conn, $firstName, $lastName, $email, $password, $billingAddressId, $deliveryAddressId) {
        $id = get_last_id($conn, "account", 7);
        $id = "acc" . str_pad($id, 7, "0", STR_PAD_LEFT);

        $stmt = mysqli_prepare($conn, "INSERT INTO account VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        mysqli_stmt_bind_param($stmt, "sssssss", $id, $firstName, $lastName, $email, $password, $billingAddressId, $deliveryAddressId);
        
        mysqli_stmt_execute($stmt)

        mysqli_stmt_close($stmt);
        return $id;
    }

    function insert_into_orders($conn, $creditCardId, $deliveryId, $quotedDeliveryCost, $billingAddressId, $deliveryAddressId, $accountId = NULL) {
        $id = get_last_id($conn, "orders", 7);
        $id = "ord" . str_pad($id, 7, "0", STR_PAD_LEFT);

        if($accountId){
            $stmt = mysqli_prepare($conn, "INSERT INTO orders VALUES (?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sssdsss", $id, $creditCardId, $deliveryId, $quotedDeliveryCost, $billingAddressId, $deliveryAddressId, $accountId);
        }
        else{
            $stmt = mysqli_prepare($conn, "INSERT INTO orders VALUES (?, ?, ?, ?, ?, ?, NULL)");
            mysqli_stmt_bind_param($stmt, "sssdss", $id, $creditCardId, $deliveryId, $quotedDeliveryCost, $billingAddressId, $deliveryAddressId);
        }
       
        mysqli_stmt_execute($stmt)

        mysqli_stmt_close($stmt);
        return $id;
    }

    function insert_into_orderProduct($conn, $orderId, $productId, $quantity, $quotedProductCost) {
        $stmt = mysqli_prepare($conn, "INSERT INTO orderProduct VALUES (?, ?, ?, ?)");
        
        mysqli_stmt_bind_param($stmt, "ssid", $orderId, $productId, $quantity, $quotedProductCost);
        
        mysqli_stmt_execute($stmt)

        mysqli_stmt_close($stmt);
        return $orderId;
    }

?>

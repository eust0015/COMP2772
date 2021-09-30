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

    function get_product($conn, $product_name) {
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

?>

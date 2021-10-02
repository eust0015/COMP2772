<?php
session_start();
include_once 'cart_functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <script src="scripts/script.js" defer></script>
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="products" content="Assignment02" />
        <title>Products</title>
    </head>
    <body>       
        <ul id="menu">
            <li id="list">
                <form action="products.php" id="formSearch" name="formSearch" method="POST">
                    <input type="text" id="textSearch" name="search" placeholder="Search">
                    <select id="selectCategory" name="category">
                        <option value="all categories">All Categories</option>
                        <option value="cable">Cable</option>
                        <option value="case">Case</option>
                        <option value="charger">Charger</option>
                        <option value="earphone">Earphone</option>
                        <option value="headphone">Headphone</option>
                        <option value="holder">Holder</option>
                        <option value="power bank">Power Bank</option>
                        <option value="screen protector">Screen Protector</option>
                    </select>
                    <input type="submit" value="Search"/>
                </form>
            </li>
            <li id="list">
                <a href="index.html">Home</a>
            </li>
            <li id="list">
                <a href="products.php">Products</a>
            </li>
            <li id="list">
                <a href="about.html">About</a>
            </li>
            <li id="list">
                <a id="menuCartLink" href="cart.php">Shopping Cart<?php echo ((isset($_SESSION["products"])) ? " (" . count($_SESSION["products"]) . ")" : "") ?></a>
            </li>
            <li id="list">
                <a href="login.html">Account Login</a>
            </li>
        </ul>
        <br>
        <br>
        <h1>Products</h1>
        <?php
            include_once 'db_functions.php';
            $conn = get_conn();

            if($conn){

                $hasCategory = false;
                $hasSearch = false;
                if (isset($_POST["category"])){
                    if ($_POST["category"] !== "all categories"){
                        $hasCategory = true;
                    }
                }
                if (isset($_POST["search"])){
                    $hasSearch = true;
                }

                if($hasCategory && $hasSearch){ // Category and Key Word
                    $results = get_products_with_category_and_keyWord($conn, $_POST["category"], $_POST["search"]);
                }
                elseif($hasCategory){ // Category only
                    $results = get_products_with_category($conn, $_POST["category"]);
                }
                elseif($hasSearch){ // Search only
                    $results = get_products_with_keyWord($conn, $_POST["search"]);
                }
                else{ // All products
                    $results = get_products($conn);
                }

                // if ($results) { 
                //     foreach ($results as $row) {
                //         echo "<br/>---------------------------------------<br/>";
                //         echo $row["id"]."<br/>";
                //         echo $row["name"]."<br/>";
                //         echo $row["description"]."<br/>";
                //         echo $row["image"]."<br/>";
                //         echo $row["price"]."<br/>";
                //         echo $row["recommendedRetailPrice"]."<br/>";
                //         echo $row["category"]."<br/>";
                //         echo $row["keyWord"]."<br/>";
                //       }
                // }

                if ($results) { 
                    foreach ($results as $row) {
                        echo "<div class='products'>";
                        echo "<ul class='items'>";
                        echo "<li class='product-item'><div id='item'><a href='product.php?name=".$row["name"]."'>".$row["name"]."</a></div>";
                        echo "<div id='item1' class='item-height'><a href='product.php?name=".$row["name"]."'><img src='images/".$row["image"]."' alt='".$row["name"]."'></a></div>";
                        echo "<div id='product-details'>";
                        echo "<span class='price-label'>Price:</span> <br>";
                        echo "<span class='price'>".$row["price"]."</span>";
                        echo "</div>";
                        echo "<div class='add'>";
                        echo "<form action='products.php' id='formAddToCart' name='formAddToCart' method='POST'>";
                        echo "<input type='hidden' id='cartProductId' name='cartProductId' value='".$row["id"]."'>";
                        echo "<input type='hidden' id='cartProductQuantity' name='cartProductQuantity' value='1'>";
                        if (isset($_SESSION["products"][$row["id"]])) {
                            echo "<input type='hidden' id='cartAction' name='cartAction' value='remove'>";
                            echo "<input id='add-to-cart' name='add-to-cart' class='add-to-cart' type='submit' value='Remove From Cart'/>";
                        }
                        else{
                            echo "<input type='hidden' id='cartAction' name='cartAction' value='update'>";
                            echo "<input id='add-to-cart' name='add-to-cart' class='add-to-cart' type='submit' value='Add To Cart'/>";                           
                        }
                        echo "</form>";
                        echo "<a href='' id='button1'><input id='add-to-wishlist' class='add-to-wishlist' type='button' value='Add To Wishlist'/></a>";
                        echo "</div></li>";
                        echo "</ul>";
                        echo "</div>";
                      }
                }

                mysqli_close($conn);
            }
            
        ?>
    </body>
</html>

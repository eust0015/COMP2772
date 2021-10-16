<?php
    session_start();
    include_once 'cart_functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/menu.css">
        <link rel="stylesheet" href="styles/productspageall.css" />
        <script src="scripts/script.js" defer></script>
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="products" content="Assignment02" />
        <title>Products</title>

    </head>
    <body>
        <?php 
            include_once 'menu.php'; 
        ?>
        
        <div id='heading'><h1>Products</h1></div>
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

                if ($results) { 
                    foreach ($results as $row) {
                        ?> 
                        <div class="all-products">
                            <div class="all-products__cards">
                                <div class="all-products__card">
                                    <div class="all-products__images">
                                    <a href='product.php?name=<?php echo (isset($row["name"]) ? $row["name"] : ""); ?>'>
                                        <img class='all-products__images-image' src='images/<?php echo (isset($row["image"]) ? $row["image"] : ""); ?>' alt='<?php echo (isset($row["name"]) ? $result["row"] : ""); ?>' />
                                        </a>
                                    </div>
                    
                                    <div class="all-products__detail">
                                        <a href='product.php?name=<?php echo (isset($row["name"]) ? $row["name"] : ""); ?>'>    
                                            <span class="all-products__heading"><?php echo (isset($row["name"]) ? $row["name"] : ""); ?></span>
                                        </a>
                                        <span class="all-products__description"><?php echo (isset($row["description"]) ? $row["description"] : ""); ?></span>
                                        <div class="all-products__price">
                                            <span class="all-products__old-price"><?php echo (isset($row["recommendedRetailPrice"]) ? $row["recommendedRetailPrice"] : ""); ?></span>
                                            <span class="all-products__new-price"><?php echo (isset($row["price"]) ? $row["price"] : ""); ?></span>
                                            <form action='products.php' id='formAddToCart' name='formAddToCart' method='POST'>
                                                <input type='hidden' id='cartProductId' name='cartProductId' value='<?php echo (isset($row["id"]) ? $row["id"] : ""); ?>'>
                                                <input type='hidden' id='cartProductQuantity' name='cartProductQuantity' value='1'>
                                                <input type='hidden' id='cartAction' name='cartAction' value='<?php echo (isset($_SESSION["products"][$row["id"]]) ? "remove" : "update"); ?>'>
                                                <input id='add-to-cart' name='add-to-cart' class='add-to-cart' class="all-products__add-to-cart-button" type='submit' value='<?php echo (isset($_SESSION["products"][$row["id"]]) ? "Remove From Cart" : "Add To Cart"); ?>'/>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  
                    }
                }
                else{
                    echo "<br><br>";
                    echo "No products in '" . ucwords($_POST["category"]) . "' matching search for '" . $_POST["search"] . "'";
                }
                mysqli_close($conn);
            }           
        ?>
    </body>
</html>
<script>
    // Prevent issues if the page is refreshed
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
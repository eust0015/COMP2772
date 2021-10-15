<?php
    session_start();
    include_once 'cart_functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="styles/productspageall.css" />
        <meta name="author" content="Group-07" />
        <meta name="description" content="Assignment02" />
        <title>Product</title>
    </head>
    <body>
        <?php 
            include_once 'menu.php'; 
        ?>       
        <br>
        <br>
        <h1>Product</h1>
        <?php
            include_once 'db_functions.php';
            $conn = get_conn();
            if($conn){
                
                $result = get_product_by_name($conn, htmlspecialchars($_GET["name"]));
                if ($result) { 
        ?>            
                    <div class="all-products">
                        <div class="all-products__cards">
                            <div class="all-products__card">
                                <div class="all-products__images">
                                <a href="">
                                    <img class='all-products__images-image' src='images/<?php echo (isset($result["image"]) ? $result["image"] : ""); ?>' alt='<?php echo (isset($result["name"]) ? $result["name"] : ""); ?>' />
                                    </a>
                                </div>
                
                                <div class="all-products__detail">
                                    <span class="all-products__heading"><?php echo (isset($result["name"]) ? $result["name"] : ""); ?></span>
                                    <span class="all-products__description"><?php echo (isset($result["description"]) ? $result["description"] : ""); ?></span>
                                    <div class="all-products__price">
                                        <span class="all-products__old-price"><?php echo (isset($result["recommendedRetailPrice"]) ? $result["recommendedRetailPrice"] : ""); ?></span>
                                        <span class="all-products__new-price"><?php echo (isset($result["price"]) ? $result["price"] : ""); ?></span>
                                        <form action='product.php?name=<?php echo (isset($result["name"]) ? $result["name"] : ""); ?>' id='formAddToCart' name='formAddToCart' method='POST'>
                                            <input type='hidden' id='cartProductId' name='cartProductId' value='<?php echo (isset($result["id"]) ? $result["id"] : ""); ?>'>
                                            <input type='hidden' id='cartProductQuantity' name='cartProductQuantity' value='1'>
                                            <input type='hidden' id='cartAction' name='cartAction' value='<?php echo (isset($_SESSION["products"][$result["id"]]) ? "remove" : "update"); ?>'>
                                            <input id='add-to-cart' name='add-to-cart' class='add-to-cart' class="all-products__add-to-cart-button" type='submit' value='<?php echo (isset($_SESSION["products"][$result["id"]]) ? "Remove From Cart" : "Add To Cart"); ?>'/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
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
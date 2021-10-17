<?php
    session_start();
    include_once 'cart_functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/menu.css">
        <!-- <link rel="stylesheet" href="styles/style.css"> -->
        <link rel="stylesheet" href="styles/productpage.css" />
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="description" content="Assignment02" />
        <title>Product</title>
    </head>
    <body>
        <?php 
            include_once 'menu.php'; 
        ?>       
        <?php
            include_once 'db_functions.php';
            $conn = get_conn();
            if($conn){
                
                $result = get_product_by_name($conn, htmlspecialchars($_GET["name"]));
                if ($result) { 
                    // echo "<center>","<br/>","<br/>";

          
                    
                    // echo "<img src='images/".$result["image"]."' alt='".$result["name"]."'></a></div>", "</br>";
                    // echo  "Product id:  " , $result["id"]."<br/>";
                    // echo  $result["name"]."<br/>";
                    // echo $result["description"]."<br/>";
                    // echo "Price : " , $result["price"]."<br/>";
                    // echo "Recommended Retail Price : " , $result["recommendedRetailPrice"]."<br/>";
                    // echo "Category: ", $result["category"]."<br/>";
                    // echo "Description:", $result["keyWord"]."<br/>";
                    // echo "</center>";
                    // // echo "<form action='product.php' id='formAddToCart' name='formAddToCart' method='POST'>";
                    // echo "<form action='product.php?name=".$result["name"]."' id='formAddToCart' name='formAddToCart' method='POST'>";
                    //     echo "<input type='hidden' id='cartProductId' name='cartProductId' value='".$result["id"]."'>";
                    //     echo "<input type='hidden' id='cartProductQuantity' name='cartProductQuantity' value='1'>";
                    //     if (isset($_SESSION["products"][$result["id"]])) {
                    //         echo "<input type='hidden' id='cartAction' name='cartAction' value='remove'>";
                    //         echo "<input id='add-to-cart' name='add-to-cart' class='add-to-cart' type='submit' value='Remove From Cart'/>";
                    //     }
                    //     else{
                    //         echo "<input type='hidden' id='cartAction' name='cartAction' value='update'>";
                    //         echo "<input id='add-to-cart' name='add-to-cart' class='add-to-cart' type='submit' value='Add To Cart'/>";                           
                    //     }
                    //     echo "</form>";

                    echo '<div class="first-section-product-container">';
                    echo '<div class="first-section-product-image">';
                    echo "<img class='all-products__images-image' src='images/".$result["image"]."' alt='".$result["name"]."'></a></div>", "</br>";
                    echo '<div class="first-section-product-decription">';

                    echo '<span class="first-section-product-heading">';
                    echo $result["name"]."<br/>";
                    echo '</span>';

                    echo '<span class="first-section-sample-description">';
                    echo "Description:", $result["keyWord"]."<br/>";
                    echo '</span>';
                    
                    echo '<ul class="a">';
                    echo '<li class="first-section-sample-description-features">World-class noise cancelling and high fidelity audio</li>';
                    echo '<li class="first-section-sample-description-features">Up to 24-hour battery life</li>';
                    echo '<li class="first-section-sample-description-features">Strong, reliable wireless connection with Bluetooth® 5.1</li>';
                    echo '</ul>';

                    echo '<div class="first-section-add-to-cart-container">';
                    
                    echo '<span class="first-section-add-to-cart-price">';
                    // echo $result["name"]."<br/>";
                    echo "Price : " , $result["recommendedRetailPrice"]."<br/>";
                    echo '</span>';

                    echo '<a href="#"><button class="first-section-decrease-quantity">-</button></a>';
                    echo '<a href="#"><button class="first-section-increase-quantity">+</button></a>';
                    echo "<form action='product.php?name=".$result["name"]."' id='formAddToCart' name='formAddToCart' method='POST'>";
                        echo "<input type='hidden' id='cartProductId' name='cartProductId' value='".$result["id"]."'>";
                        echo "<input type='hidden' id='cartProductQuantity' name='cartProductQuantity' value='1'>";
                        if (isset($_SESSION["products"][$result["id"]])) {
                            echo "<input type='hidden' id='cartAction' name='cartAction' value='remove'>";
                            echo "<input id='add-to-cart' name='add-to-cart' class='add-to-cart' type='submit' value='Remove From Cart'/>";
                        }
                        else{
                            echo "<input type='hidden' id='cartAction' name='cartAction' value='update'>";
                            echo "<input id='add-to-cart' name='add-to-cart' class='add-to-cart' type='submit' value='Add To Cart'/>";                           
                        }
                        echo "</form>";


                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } 

            // "<form action='product.php?name=".$result["name"]."' id='formAddToCart' name='formAddToCart' method='POST'>";
        ?>
    </body>
</html>

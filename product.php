<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/menu.css">
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="utf-8">
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
                    echo "<center>","<br/>","<br/>";

          
                    
                    
                    echo "<img src='images/".$result["image"]."' alt='".$result["name"]."'></a></div>", "</br>";
                    echo  "Product id:  " , $result["id"]."<br/>";
                    echo  $result["name"]."<br/>";
                    echo $result["description"]."<br/>";
                    echo "Price : " , $result["price"]."<br/>";
                    echo "Recommended Retail Price : " , $result["recommendedRetailPrice"]."<br/>";
                    echo "Category: ", $result["category"]."<br/>";
                    echo "Description:", $result["keyWord"]."<br/>";
                    echo "</center>";
                    echo "<form action='product.php' id='formAddToCart' name='formAddToCart' method='POST'>";
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
                }
            } 
        ?>
    </body>
</html>

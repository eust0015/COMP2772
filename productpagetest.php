<?php
    session_start();
    include_once 'cart_functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/productpage.css" />
    <title>Document</title>
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


                  //   echo<div class="first-section-product-container">
                  //   <div class="first-section-product-image"></div>
                  //   <div class="first-section-product-decription">
                  //     <span class="first-section-product-heading">Bose QuietComfort 45 Wireless Noise Cancelling Headphones (White Smoke)</span>
                  //     <span class="first-section-sample-description">Iconic quiet. Comfort. And sound.</span>
                  //     <li class="first-section-sample-description-features">World-class noise cancelling and high fidelity audio</li>
                  //     <li class="first-section-sample-description-features">Up to 24-hour battery life</li>
                  //     <li class="first-section-sample-description-features">Strong, reliable wireless connection with Bluetooth® 5.1</li>
                  //     <div class="first-section-add-to-cart-container">
                  //       <span class="first-section-add-to-cart-price">$449</span>
                  //       <a href="#"><button class="first-section-decrease-quantity">-</button></a>
                  //       <a href="#"><button class="first-section-increase-quantity">+</button></a>
                  //       <a href="#"><button class="first-section-add-to-cart-button">Add to Cart</button></a>
                  //     </div>
                  //   </div>
                  // </div>;



                    echo '<div class="first-section-product-container">';
                    echo '<div class="first-section-product-image">';
                    echo "<img src='images/".$result["image"]."' alt='".$result["name"]."'></a></div>", "</br>";
                    echo '<div class="first-section-product-decription">';

                    echo '<span class="first-section-product-heading">';
                    echo $result["name"]."<br/>";
                    echo '</span>';

                    echo '<span class="first-section-sample-description">';
                    echo "Description:", $result["keyWord"]."<br/>";
                    echo '</span>';
                    
                    echo '<li class="first-section-sample-description-features">World-class noise cancelling and high fidelity audio</li>';
                    echo '<li class="first-section-sample-description-features">Up to 24-hour battery life</li>';
                    echo '<li class="first-section-sample-description-features">Strong, reliable wireless connection with Bluetooth® 5.1</li>';

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


                    // "<form action='product.php?name=".$result["name"]."' id='formAddToCart' name='formAddToCart' method='POST'>";



                    // <div class="first-section-product-container">
                //     <div class="first-section-product-image"></div>
                //     <div class="first-section-product-decription">
                //       <span class="first-section-product-heading">Bose QuietComfort 45 Wireless Noise Cancelling Headphones (White Smoke)</span>
                //       <span class="first-section-sample-description">Iconic quiet. Comfort. And sound.</span>
                //       <li class="first-section-sample-description-features">World-class noise cancelling and high fidelity audio</li>
                //       <li class="first-section-sample-description-features">Up to 24-hour battery life</li>
                //       <li class="first-section-sample-description-features">Strong, reliable wireless connection with Bluetooth® 5.1</li>
                //       <div class="first-section-add-to-cart-container">
                //         <span class="first-section-add-to-cart-price">$449</span>
                //         <a href="#"><button class="first-section-decrease-quantity">-</button></a>
                //         <a href="#"><button class="first-section-increase-quantity">+</button></a>
                //         <a href="#"><button class="first-section-add-to-cart-button">Add to Cart</button></a>
                //       </div>
                //     </div>
                //   </div>

          
                    
                    // echo "<img src='images/".$result["image"]."' alt='".$result["name"]."'></a></div>", "</br>";
                    // echo  "Product id:  " , $result["id"]."<br/>";
                    // echo  $result["name"]."<br/>";
                    // echo $result["description"]."<br/>";
                    // echo "Price : " , $result["price"]."<br/>";
                    // echo "Recommended Retail Price : " , $result["recommendedRetailPrice"]."<br/>";
                    // echo "Category: ", $result["category"]."<br/>";
                    // echo "Description:", $result["keyWord"]."<br/>";
                    // echo "</center>";
                    // echo "<form action='product.php' id='formAddToCart' name='formAddToCart' method='POST'>";
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
                }
            } 
        ?>
        
        
    <!-- <div class="first-section-product-container">
      <div class="first-section-product-image"></div>
      <div class="first-section-product-decription">
        <span class="first-section-product-heading">echo  "Product id:  " , $result["id"]."<br/>";</span>
        <span class="first-section-sample-description">Iconic quiet. Comfort. And sound.</span>
        <li class="first-section-sample-description-features">World-class noise cancelling and high fidelity audio</li>
        <li class="first-section-sample-description-features">Up to 24-hour battery life</li>
        <li class="first-section-sample-description-features">Strong, reliable wireless connection with Bluetooth® 5.1</li>
        <div class="first-section-add-to-cart-container">
          <span class="first-section-add-to-cart-price">$449</span>
          <a href="#"><button class="first-section-decrease-quantity">-</button></a>
          <a href="#"><button class="first-section-increase-quantity">+</button></a>
          <a href="#"><button class="first-section-add-to-cart-button">Add to Cart</button></a>
        </div>
      </div>
    </div>

    <div class="second-section-product-container">
      <div class="second-section-product-decription">
        <span class="second-section-product-overview">Overview</span>
        <p class="second-section-product-overview-paragraph">
          You feel it the minute you put them on. The soft, plush cushions seal you in. Then you flip the switch and whoosh—the world fades away. And the music starts. The original noise cancelling headphones are back, with
          better world-class quiet (plus the new Aware Mode), shockingly light materials for premium comfort and proprietary acoustic technology for deep, clear audio. Bose QuietComfort® 45 headphones—wireless headphones with
          the perfect balance of quiet, comfort and sound.
        </p>
        <span class="second-section-key-features">Key Features</span>
        <span class="second-section-feature">The perfect balance of quiet, comfort, and sound. </span>
        <p class="second-section-feature-paragraph">
          The original noise cancelling headphones are back, now with better quiet (plus the new Aware Mode), shockingly light materials for premium comfort, and proprietary acoustic technology for deep, clear sound. It’s an
          icon reborn. Bose QuietComfort® 45 headphones. The perfect balance of quiet, comfort, and sound.
        </p>
        <span class="second-section-feature">The noise cancelling headphones that started it all. </span>
        <p class="second-section-feature-paragraph">
          Acoustic Noise Cancelling™ — it started right here with the original QuietComfort® headphones. And now it’s better than ever. With an additional external microphone (for a total of six) and enhanced signal
          processing, QC45 headphones dramatically cancel out noise so it doesn’t reach your ears.
        </p>
        <span class="second-section-feature">More music. And awareness. </span>
        <p class="second-section-feature-paragraph">
          Aware Mode brings the outside world in with microphones that pick up the sounds around you and play them naturally through the headphones. It’s your music and your environment at the same time.
        </p>
      </div>
    </div> -->


</body>
</html>
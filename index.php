<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" href="styles/indexupdated.css" />
  </head>
  <body>
  <?php 
              include_once 'menu.php'; 
  ?> 

    <div class="first-section-carousels-container">
      <div class="first-section-carousel">
        <!-- <img class="first-section-carousel-image" src="images/bigsale.jpg" alt=""> -->
      </div>
    </div>

    <div class="second-section-categories-container">
      <div class="second-section-categorie" id="second-section-headphones">
        <a class="second-section-categorie-redirect" href="products.php">
        <img class="second-section-categorie-image" src="images/headphones-8-32.png" alt="#" />
        <span class="second-section-categorie-description">headphones</span>
        </a>
      </div>
      <div class="second-section-categorie" id="second-section-phones">
        <a class="second-section-categorie-redirect" href="products.php">
        <img class="second-section-categorie-image" src="images/iphone-32.png" alt="#" />
        <span class="second-section-categorie-description">phones</span>
        </a>
      </div>
      <div class="second-section-categorie" id="second-section-cameras">
        <a class="second-section-categorie-redirect" href="products.php">
        <img class="second-section-categorie-image" src="images/camera-4-32.png" alt="#" />
        <span class="second-section-categorie-description">cameras</span>
        </a>
      </div>
      <div class="second-section-categorie" id="second-section-computers">
        <a class="second-section-categorie-redirect" href="products.php">
        <img class="second-section-categorie-image" src="images/laptop-3-32.png" alt="#" />
        <span class="second-section-categorie-description">computers</span>
        </a>
      </div>
    </div>

    <div class="third-section-whats-hot-container">
      <div class="third-section-product">
        <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section-image" src="images/tv.png"#" /></div>
        <span class="third-section-product-description">LG C1 65" OLED 4K ULTRA HD SMART TV</span>
        <button class="third-section-buy-now-product">Buy Now</button>
      </div>
      <div class="third-section-product">
        <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section-image" src="images/phone.png"#" /></div>
        <span class="third-section-product-description">SAMSUNG GALAXY S21 ULTRA 5G 128GB</span>
        <button class="third-section-buy-now-product">Buy Now</button>
      </div>
      <div class="third-section-product">
        <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section-image" src="images/watch.png"#" /></div>
        <span class="third-section-product-description">SAMSUNG GALAXY WATCH4 44MM</span>
        <button class="third-section-buy-now-product">Buy Now</button>
      </div>
      <div class="third-section-product">
        <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section-image" src="images/headphonebose.png"#" /></div>
        <span class="third-section-product-description">BOSE QUIETCOMFORT 45 WIRELESS HEADPHONES</span>
        <button class="third-section-buy-now-product">Buy Now</button>
      </div>
    </div>

    <div class="fourth-section-product-overview-container">
      <div class="fourth-section-product" id="fourth-section-product-overview-left">
        <span class="fourth-section-product-heading">iPhone 13 5G 128GB</span>
        <span class="fourth-section-product-subheading">Take a great photo without lifting a finger.</span>
        <button class="fourth-section-buy-now-button">Buy Now</button>
      </div>

      <div class="fourth-section-product-overview-container-right">
        <div class="fourth-section-product" id="fourth-section-right-top">
          <span class="fourth-section-right-top-product-heading">iPhone 13 5G 128GB</span>
          <span class="fourth-section-right-top-product-subheading">Take a great photo without lifting a finger.</span>
          <button class="fourth-section-right-top-buy-now-button">Buy Now</button>
        </div>
        <div class="fourth-section-product" id="fourth-section-right-bottom">
          <span class="fourth-section-right-bottom-product-heading">iPhone 13 5G 128GB</span>
          <span class="fourth-section-right-bottom-product-subheading">Take a great photo without lifting a finger.</span>
          <button class="fourth-section-right-bottom-buy-now-button">Buy Now</button>
        </div>
      </div>
    </div>

    <div class="fifth-section-whats-hot-container">
      <div class="fifth-section-product">
        <div class="featured-product-section-image" id="featured-product-section-image"><img class="featured-product-image" src="images/gopro.jpeg"#" /></div>
        <span class="fifth-section-product-description">GOPRO HERO10 BLACK ACTION CAMERA</span>
        <button class="fifth-section-buy-now-product">Buy Now</button>
      </div>

      <div class="fifth-section-product">
        <div class="featured-product-section-image" id="featured-product-section-image"><img class="featured-product-image" src="images/robotvacum.jpeg"#" /></div>
        <span class="fifth-section-product-description">ECOVACS DEEBOT N8 PRO CLEANING VACUUM</span>
        <button class="fifth-section-buy-now-product">Buy Now</button>
      </div>

      <div class="fifth-section-product">
        <div class="featured-product-section-image" id="featured-product-section-image"><img class="featured-product-image" src="images/nintendoswitch.jpeg"#" /></div>
        <span class="fifth-section-product-description">NINTENDO - SWITCH 32GB CONSOLE</span>
        <button class="fifth-section-buy-now-product">Buy Now</button>
      </div>

      <div class="fifth-section-product">
        <div class="featured-product-section-image" id="featured-product-section-image"><img class="featured-product-image" src="images/airpodspro.jpeg"#" /></div>
        <span class="fifth-section-product-description">APPLE AIRPODS PRO [2019]</span>
        <button class="fifth-section-buy-now-product">Buy Now</button>
      </div>
    </div>

    <div class="sixth-section-sharing-values-container">
      <div class="sharing-value-cards">
        <div class="sharing-value-image-left"></div>

        <div class="sharing-value-information-left">
          <span class="sharing-value-heading-left">SUPPORT THE ENVIRONMENT</span>
          <span class="sharing-value-subheading-left">Shop products made for the planet. </span>
          <button class="sharing-value-learn-more-button-left">learn more</button>
        </div>
      </div>
      <div class="sharing-value-cards">
        <div class="sharing-value-image-right"></div>

        <div class="sharing-value-information-right">
          <span class="sharing-value-heading-right">BLACK COMMUNITY SUPPORT</span>
          <span class="sharing-value-subheading-right">Standing with organizations & families across the country.</span>
          <button class="sharing-value-learn-more-button-right">learn more</button>
        </div>
      </div>
    </div>

    <div class="seventh-section-company-information-container">
      <div class="company-delivery-card">
        <img class="company-delivery-card-left-image" src="images/car-compact.png" alt="#" />
        <span class="company-deliver-card-left-info">Ready in one hour with Curbside Pickup.</span>
      </div>
      <div class="company-delivery-card">
        <img class="company-delivery-card-middle-image" src="images/fast-delivery.png" alt="#" />
        <div class="company-deliver-card-middle-headings">
          <span class="company-deliver-card-middle-info">Free next-day delivery</span>
          <span class="company-deliver-card-middle-info-subheading">on thousands of items</span>
        </div>
      </div>
      <div class="company-delivery-card">
        <img class="company-delivery-card-right-image" src="images/tracking.png" alt="#" />
        <div class="company-deliver-card-right-headings">
          <span class="company-deliver-card-right-info">Same-day delivery.</span>
          <span class="company-deliver-card-right-info-subheading">Order by 3 p.m., get it by 9 p.m.</span>
        </div>
      </div>
    </div>

    <!-- <footer class="sticky-footer"></footer> -->
  </body>
</html>

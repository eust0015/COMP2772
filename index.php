<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Oswald:wght@500&family=Roboto:wght@700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles/indexstyle.css" />
  </head>
  <body>
    <?php 
              include_once 'menu.php'; 
    ?>  
    <!-- Header - Top and Bottom -->
    <!--
    <div class="first-header" id="first-header"></div>
    <div class="second-header" id="second-header">
      <header class="header-second">
        <a href="shop.html"> <img class="header2-logo" src="images/header-logo.png" alt="logo" /> </a>
        <nav>
          <ul class="nav-links">
            <li><a href="products.php">Shop</a></li>
            <li><a href="#">Explore</a></li>
            <li><a href="#">Gift-Cards</a></li>
            <li><a href="#">Support</a></li>
          </ul>
        </nav>
        <input type="text" placeholder="Search" />
        <a class="my-cart" href="#"><button class="header-second-my-cart-button">My Cart</button></a>
      </header>
    </div>
    -->

    <!-- Categories - Headphones, Phones, Cameras and Computers -- First Section  -->
    <div class="product-categories" id="product categories">
      <div class="categories" id="categories">
        <div class="categorie" id="categorie-headphones">
          <div class="categorie-headphones-inline-block">
            <img class="headphone-image" src="images/headphones-8-32.png" alt="#" />
            <span class="headphone-text">Headphones</span>
          </div>
        </div>
        <div class="categorie" id="categorie-mobiles">
          <div class="categorie-mobiles-inline-block">
            <img class="mobile-image" src="images/iphone-32.png" alt="#" />
            <span class="mobile-text">Phones</span>
          </div>
        </div>
        <div class="categorie" id="categorie-cameras">
          <div class="categorie-cameras-inline-block">
            <img class="camera-image" src="images/camera-4-32.png" alt="#" />
            <span class="camera-text">Cameras</span>
          </div>
        </div>
        <div class="categorie" id="categorie-computers">
          <div class="categorie-computers-inline-block">
            <img class="computer-image" src="images/laptop-3-32.png" alt="#" />
            <span class="computer-text">Computers</span>
          </div>
        </div>
      </div>
    </div>

    <!-- What's Hot - Second Section -->
    <div class="whats-hot" id="whats-hot">
      <div class="whats-hot-inline-block" id="whats-hot-inline-block">
        <img class="whats-hot-image" id="whats-hot-image" src="images/fire3.png" alt="#" />
        <span class="whats-hot-text" id="whats-hot-text">What's Hot</span>
      </div>

      <div class="whats-hot-sections" id="whats-hot-sections">
        <div class="whats-hot-section" id="whats-hot-section">
          <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section1-image" src="images/tv.png"#" /></div>
          <span class="whats-hot-section-image-text" id="whats-hot-section-image-text">LG C1 65" OLED 4K Ultra HD Smart TV</span>
          <a class="whats-hot-section-buy-now-button" href="#"><button class="whats-hot-section-buy-now-button">Buy Now</button></a>
        </div>
        <div class="whats-hot-section" id="whats-hot-section">
          <div class="whats-hot-section-image" id="whats-hot-section-image">
            <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section1-image" src="images/phone.png"#" /></div>
            <span class="whats-hot-section-image-text" id="whats-hot-section-image-text">Samsung Galaxy S21 Ultra 5G 128GB</span>
            <a class="whats-hot-section-buy-now-button" href="#"><button class="whats-hot-section-buy-now-button">Buy Now</button></a>
          </div>
        </div>
        <div class="whats-hot-section" id="whats-hot-section">
          <div class="whats-hot-section-image" id="whats-hot-section-image">
            <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section1-image" src="images/watch.png"#" /></div>
            <span class="whats-hot-section-image-text" id="whats-hot-section-image-text">Samsung Galaxy Watch4 44mm</span>
            <a class="whats-hot-section-buy-now-button" href="#"><button class="whats-hot-section-buy-now-button">Buy Now</button></a>
          </div>
        </div>
        <div class="whats-hot-section" id="whats-hot-section">
          <div class="whats-hot-section-image" id="whats-hot-section-image">
            <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section1-image" src="images/headphonebose.png"#" /></div>
            <span class="whats-hot-section-image-text" id="whats-hot-section-image-text">Bose QuietComfort 45 Wireless Headphones</span>
            <a class="whats-hot-section-buy-now-button" href="#"><button class="whats-hot-section-buy-now-button">Buy Now</button></a>
          </div>
        </div>
        <div class="whats-hot-section" id="whats-hot-section">
          <div class="whats-hot-section-image" id="whats-hot-section-image">
            <div class="whats-hot-section-image" id="whats-hot-section-image"><img class="whats-hot-section1-image" src="images/m1macbook.png"#" /></div>
            <span class="whats-hot-section-image-text" id="whats-hot-section-image-text">Apple MacBook Air 13-inch with M1 chip</span>
            <a class="whats-hot-section-buy-now-button" href="#"><button class="whats-hot-section-buy-now-button">Buy Now</button></a>
          </div>
        </div>
      </div>
    </div>

    <!-- New Products Info - Third Section -->
    <div class="new-products" id="new-products">
      <div class="big-section1-left" id="big-section1-left">
        <div class="big-section1-left-headings-buttons" id="big-section1-left-headings-buttons">
          <span class="big-section1-left-first-heading" id="big-section1-left-first-heading">iPhone 13 5G 128GB</span>
          <span class="big-section1-left-second-heading" id="big-section1-left-second-heading">Take a great photo without lifting a finger.</span>
          <a class="big-section1-left-second-heading-buy-now-button" href="#"><button class="big-section1-left-second-heading-buy-now-button">Buy Now</button></a>
        </div>
      </div>
      <div class="section-right" id="section-right">
        <div class="section-right-top" id="section-right-top">
          <div class="section-right-top-image" id="section-right-top-image"></div>
          <div class="section-right-top-headings-button" id="section-right-top-headings-button">
            <span class="section-right-top-first-heading" id="section-right-top-first-heading">Beats Studio Buds</span>
            <span class="section-right-top-second-heading" id="section-right-top-second-heading">Driven by premium sound. </span>
            <a class="section-right-top-buy-now-button" id="section-right-top-buy-now-button"><button class="section-right-top-buy-now-button">Buy Now</button></a>
          </div>
        </div>
        <div class="section-right-bottom" id="section-right-bottom">
          <div class="section-right-bottom-image" id="section-right-bottom-image">
            <div class="section-right-bottom-headings-button" id="section-right-bottom-headings-button">
              <span class="section-right-bottom-first-heading" id="section-right-bottom-first-heading">Galaxy Watch 4</span>
              <span class="section-right-bottom-second-heading" id="section-right-bottom-second-heading">Life opens up with Galaxy.</span>
              <a class="section-right-bottom-buy-now-button" id="section-right-bottom-buy-now-button"><button class="section-right-bottom-buy-now-button">Buy Now</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Featured Products - Fourth Section -->
    <div class="featured-products" id="featured-products">
      <div class="featured-products-inline-block" id="featured-products-inline-block">
        <img class="featured-products-image" id="featured-products-image" src="images/purpleflame.png" alt="#" />
        <span class="featured-products-text" id="featured-products-text">Featured Products</span>
      </div>

      <div class="featured-products-sections" id="featured-products-sections">
        <div class="featured-products-section" id="featured-products-section">
          <div class="featured-products-section-image" id="featured-products-section-image"><img class="featured-products-section4-image" src="images/gopro.jpeg"#" /></div>
          <span class="featured-products-section-image-text" id="featured-products-section-image-text">GoPro Hero10 Black Action Camera</span>
          <a class="featured-products-section-buy-now-button" href="#"><button class="featured-products-section-buy-now-button">Buy Now</button></a>
        </div>
        <div class="featured-products-section" id="featured-products-section">
          <div class="featured-products-section-image" id="featured-products-section-image"><img class="featured-products-section4-image" src="images/robotvacum.jpeg"#" /></div>
          <span class="featured-products-section-image-text" id="featured-products-section-image-text">ECOVACS DEEBOT N8 Pro Cleaning Vacuum</span>
          <a class="featured-products-section-buy-now-button" href="#"><button class="featured-products-section-buy-now-button">Buy Now</button></a>
        </div>
        <div class="featured-products-section" id="featured-products-section">
          <div class="featured-products-section-image" id="featured-products-section-image"><img class="featured-products-section4-image" src="images/nintendoswitch.jpeg"#" /></div>
          <span class="featured-products-section-image-text" id="featured-products-section-image-text">Nintendo - Switch 32GB Console</span>
          <a class="featured-products-section-buy-now-button" href="#"><button class="featured-products-section-buy-now-button">Buy Now</button></a>
        </div>
        <div class="featured-products-section" id="featured-products-section">
          <div class="featured-products-section-image" id="featured-products-section-image"><img class="featured-products-section4-image" src="images/airpodspro.jpeg"#" /></div>
          <span class="featured-products-section-image-text" id="featured-products-section-image-text">Apple AirPods Pro [2019] </span>
          <a class="featured-products-section-buy-now-button" href="#"><button class="featured-products-section-buy-now-button">Buy Now</button></a>
        </div>
        <div class="featured-products-section" id="featured-products-section">
          <div class="featured-products-section-image" id="featured-products-section-image"><img class="featured-products-section4-image" src="images/razerblackwidow.jpeg"#" /></div>
          <span class="featured-products-section-image-text" id="featured-products-section-image-text">Razer - BlackWidow V3 Mini Phantom Edition</span>
          <a class="featured-products-section-buy-now-button" href="#"><button class="featured-products-section-buy-now-button">Buy Now</button></a>
        </div>
      </div>
    </div>

    <!-- Sharing Our Values - Fifth Section  -->
    <div class="sharing-our-values-section" id="sharing-our-values-section">
      <span class="sharing-our-values-text" id="sharing-our-values-text">Sharing Our Values</span>
      <div class="sharing-values-left" id="sharing-values-left">
        <div class="sharing-values-left-image" id="sharing-values-left-image"></div>
        <div class="sharing-values-left-headings-button" id="sharing-values-left-headings-button">
          <span class="sharing-values-left-first-heading" id="sharing-values-left-first-heading">Support The Environment</span>
          <span class="sharing-values-left-second-heading" id="sharing-values-left-second-heading">Shop products made for the planet.</span>
          <a class="sharing-values-left-learn-more-button-anchor" id="sharing-values-left-learn-more-button-anchor" href="#"><button class="sharing-values-left-learn-more-button">Learn More</button></a>
        </div>
      </div>
      <div class="sharing-values-right" id="sharing-values-right">
        <div class="sharing-values-right-image" id="sharing-values-right-image"></div>
        <div class="sharing-values-right-headings-button" id="sharing-values-right-headings-button">
          <span class="sharing-values-right-first-heading" id="sharing-values-right-first-heading">Black Community Support</span>
          <span class="sharing-values-right-second-heading" id="sharing-values-right-second-heading">Standing with organizations & families across the country.</span>
          <a class="sharing-values-right-learn-more-button-anchor" id="sharing-values-right-learn-more-button-anchor" href="#"><button class="sharing-values-right-learn-more-button">Learn More</button></a>
        </div>
      </div>
    </div>

    <!-- What's New Products - Fourth Section -->
    <div class="whats-new-products" id="whats-new-products">
      <div class="whats-new-products-inline-block" id="whats-new-products-inline-block">
        <img class="whats-new-products-image" id="whats-new-products-image" src="images/new.png" alt="#" />
        <span class="whats-new-products-text" id="whats-new-products-text">What's New Products</span>
      </div>

      <div class="whats-new-products-sections" id="whats-new-products-sections">
        <div class="whats-new-products-section" id="whats-new-products-section">
          <div class="whats-new-products-section-image" id="whats-new-products-section-image"><img class="whats-new-products-section5-image" src="images/gopro.jpeg"#" /></div>
          <span class="whats-new-products-section-image-text" id="whats-new-products-section-image-text">GoPro Hero10 Black Action Camera</span>
          <a class="whats-new-products-section-buy-now-button" href="#"><button class="whats-new-products-section-buy-now-button">Buy Now</button></a>
        </div>

        <div class="whats-new-products-section" id="whats-new-products-section">
          <div class="whats-new-products-section-image" id="whats-new-products-section-image"><img class="whats-new-products-section5-image" src="images/gopro.jpeg"#" /></div>
          <span class="whats-new-products-section-image-text" id="whats-new-products-section-image-text">GoPro Hero10 Black Action Camera</span>
          <a class="whats-new-products-section-buy-now-button" href="#"><button class="whats-new-products-section-buy-now-button">Buy Now</button></a>
        </div>

        <div class="whats-new-products-section" id="whats-new-products-section">
          <div class="whats-new-products-section-image" id="whats-new-products-section-image"><img class="whats-new-products-section5-image" src="images/gopro.jpeg"#" /></div>
          <span class="whats-new-products-section-image-text" id="whats-new-products-section-image-text">GoPro Hero10 Black Action Camera</span>
          <a class="whats-new-products-section-buy-now-button" href="#"><button class="whats-new-products-section-buy-now-button">Buy Now</button></a>
        </div>

        <div class="whats-new-products-section" id="whats-new-products-section">
          <div class="whats-new-products-section-image" id="whats-new-products-section-image"><img class="whats-new-products-section5-image" src="images/gopro.jpeg"#" /></div>
          <span class="whats-new-products-section-image-text" id="whats-new-products-section-image-text">GoPro Hero10 Black Action Camera</span>
          <a class="whats-new-products-section-buy-now-button" href="#"><button class="whats-new-products-section-buy-now-button">Buy Now</button></a>
        </div>

        <div class="whats-new-products-section" id="whats-new-products-section">
          <div class="whats-new-products-section-image" id="whats-new-products-section-image"><img class="whats-new-products-section5-image" src="images/gopro.jpeg"#" /></div>
          <span class="whats-new-products-section-image-text" id="whats-new-products-section-image-text">GoPro Hero10 Black Action Camera</span>
          <a class="whats-new-products-section-buy-now-button" href="#"><button class="whats-new-products-section-buy-now-button">Buy Now</button></a>
        </div>
      </div>
    </div>

    <div class="sixth-section-information" id="sixth-section-information">
      <div class="section1-left" id="section1-left">
        <img class="section1-left-image" src="images/car-compact.png" alt="" />
        <a href="#"><span class="section1-left-image-text" id="section1-left-image-text">Ready in one hour with Curbside Pickup.</span></a>
      </div>
      <div class="section2-middle" id="section2-middle">
        <img class="section2-middle-image" src="images/fast-delivery.png" alt="" />
        <div class="section2-middle-image-text" id="section2-middle-image-text">
          <a href="#"><span class="section2-middle-image-text" id="section2-middle-image-text"> Free next-day delivery</span></a>
          <a href="#"><span class="section2-middle-image-text-bottom" id="section2-middle-image-text-bottom">on thousands of items</span></a>
        </div>
      </div>
      <div class="section3-right" id="section3-right">
        <img class="section3-right-image" src="images/tracking.png" alt="" />
        <div class="section3-right-image-text" id="section3-right-image-text">
          <a href="#"><span class="section3-right-image-text" id="section3-right-image-text">Same-day delivery.</span></a>
          <a href="#"><span class="section3-right-image-text-bottom" id="section3-right-image-text-bottom">Order by 3 p.m., get it by 9 p.m.</span></a>
        </div>
      </div>
    </div>

    <!-- <h6>This is a sample text!</h6> -->
  </body>
</html>
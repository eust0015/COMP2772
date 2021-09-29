<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="utf-8">
        <meta name="author" content="Group-07" />
        <meta name="description" content="Assignment02" />
        <title>Product</title>
    </head>
    <body>       
        <ul id="menu">
            <li id="list">
                <form action="products.html" id="formSearch" name="formSearch" method="GET">
                    <input type="text" id="textSearch" name="textSearch" placeholder="Search" >
                    <input type="submit" value="Search"/>
                </form>
            </li>
            <li id="list">
                <a href="index.html">Home</a>
            </li>
            <li id="list">
                <a href="products.html">Products</a>
            </li>
            <li id="list">
                <a href="about.html">About</a>
            </li>
            <li id="list">
                <a href="cart.html">Shopping Cart</a>
            </li>
            <li id="list">
                <a href="login.html">Account Login</a>
            </li>
        </ul>
        <br>
        <br>
        <h1>Product</h1>
        <?php
            include_once 'db_functions.php';
            $conn = get_conn();
            if($conn){
                $result = get_product($conn, "P000000001");
                if ($result) { 
                    echo $result["id"]."<br/>";
                    echo $result["name"]."<br/>";
                    echo $result["description"]."<br/>";
                    echo $result["image"]."<br/>";
                    echo $result["price"]."<br/>";
                    echo $result["recommendedRetailPrice"]."<br/>";
                    echo $result["category"]."<br/>";
                    echo $result["keyWord"]."<br/>";
                }
            } 
        ?>
    </body>
</html>

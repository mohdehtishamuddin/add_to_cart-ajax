<!DOCTYPE html>
<html>
  <head>
    <title>Shopping Page Demo</title>
    <link rel="stylesheet" href="shop.css"/>
    <script src="cart.js"></script>
  </head>
  <body>
    <!-- AVAILABLE PRODUCTS -->
    <div id="products"><?php
      require "products.php";
      foreach ($products as $pid=>$p) { ?>
      <div class="pCell">
        <div class="pTxt">
          <div class="pName"><?=$p["name"]?></div>
          <div class="pPrice">$<?=$p["price"]?></div>
        </div>
        <img class="pImg" src="./images/<?=$p["image"]?>"/>
        <button class="pAdd" onclick="cart.add(<?=$pid?>)">
          Add To Cart
        </button>
      </div>
    <?php } ?></div>

    <!--  CART -->
    <div id="cart"></div>
  </body>
</html>

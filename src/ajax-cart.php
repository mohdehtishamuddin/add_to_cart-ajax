<?php
//  INIT SHOPPING CART SESSION
session_start();
if (!isset($_SESSION["cart"])) 
{ 
  $_SESSION["cart"] = []; 
}

//  STANDARD RESPONSE
function respond ($status=1, $msg="") {
  exit(json_encode(["status"=>$status, "msg"=>$msg]));
}

if (isset($_POST["req"])) 
{ switch ($_POST["req"]) 
  {
  //  INVALID
  default: respond(0, "Invalid Request");

  //  ADD TO CART
  case "add":
    $qty = &$_SESSION["cart"][$_POST["pid"]];
    if (isset($qty)) 
    { $qty++; 
    } 
    else 
    { 
      $qty = 1;
     }
    if ($qty > 99) 
    { 
      $qty = 99; 
    }
    respond();

  //  CHANGE QUANTITY
  case "set":
    $qty = &$_SESSION["cart"][$_POST["pid"]];
    $qty = $_POST["qty"];
    if ($qty > 99) 
    { 
      $qty = 99; 
    }
    if ($qty <= 0) 
    { 
      unset($_SESSION["cart"][$_POST["pid"]]); 
    }
    respond();

  //  REMOVE ITEM
  case "del":
    unset($_SESSION["cart"][$_POST["pid"]]);
    respond();

  //  Empty
  case "empty":
    $_SESSION["cart"] = [];
    respond();

  //  GET ALL ITEMS IN CART
  case "get":
    //  EMPTY CART
    if (count($_SESSION["cart"])==0) 
    { 
      respond(1, null); 
    }

    //  FILTER ILLEGAL PRODUCTS
    require "products.php";
    $items = [];
    foreach ($_SESSION["cart"] as $pid=>$qty) {
      if (isset($products[$pid])) {
        $items[$pid] = $products[$pid];
        $items[$pid]["qty"] = $qty;
      } else 
      { 
        unset($_SESSION["cart"][$pid]); 
      }
    }
    if (count($_SESSION["cart"])==0) 
    { 
      respond(1, null); 
    }

    // RESPOND
    respond(1, $items);
}}

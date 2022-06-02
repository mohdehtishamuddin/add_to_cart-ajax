<?php
// (A) CHECKS
// session_start();
// if (!isset($_SESSION["cart"]) || count($_SESSION["cart"])==0) {
//   exit("Cart is empty");
// }
// if (!isset($_POST["name"]) || !isset($_POST["email"])) {
//   exit("Invalid request");
// }

// (B) SEND EMAIL - CHANGE TO YOUR OWN!
// $to = "ehtisham@site.com";
// $subject = "Order Received";
// $body = "";
// require "config.php";
// foreach ($_SESSION["cart"] as $pid=>$qty) {
//   $body .= sprintf("%s X %s\r\n", $qty, $products[$pid]["name"]);
// }
// if (mail($to, $subject, $body)) {
//   echo "OK";
//   $_SESSION["cart"] = [];
// } else 
// { 
//   echo "ERROR"; 
// }

<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require ('database/Product.php');

// require Cart Class
require ('database/Cart.php');

//require Wish Class
require ('database/wish.php');

//require Accessory Class
require ('database/Accessory.php');



// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Cart = new Cart($db );

// Wish Object
$Wish = new Wish($db );

//Accessory Object
$accessories = new Accessory($db);
$accessories_shuffle = $accessories->getData();
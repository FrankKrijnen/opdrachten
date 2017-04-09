<?php
require("DbHandler.class.php");
$product_id = $_GET["id"];
$DbObject = new DbHandler("localhost", "stardunk","root","");
$sql = "DELETE FROM products WHERE product_id = $product_id;";
$DbObject->deleteData($sql);
header('Location: stardunk_level1.php');
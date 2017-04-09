<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel='stylesheet' type='text/css' href='grid_style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  </head>
  <body>
    <h1>Products</h1><br>
    <div class="row">
      <form action="stardunk_level1.php" method="post">
        <!--<i id="search" class="fa fa-search"></i>-->
      <input class='col-6' id="search" name="input_search" type="text">
      
      <input type="submit" value="Search"/>
      
      <a href='stardunks_create.php' id="create" class='col-3' style='color: white;background-color: blue; border-radius: 15px; padding: 10px;'>Create New Product</a>
      <a href='stardunk_level1.php' id="goback" class='col-3' style='color: white;background-color: blue; border-radius: 15px; padding: 10px;'>Reset Search</a><br><br>
      <table class='col-12' style='border: 1px solid black;  border-collapse: collapse;'>
      </form>
    </div>
<?php
echo "<pre>";
require("DbHandler.class.php");
$DbObject = new DbHandler("localhost", "stardunk","root","");


$sql = "SELECT * FROM `products` LIMIT 0, 1";
$res = $DbObject->readData($sql);
foreach ($res as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
      echo "<th style='border: 1px solid black;  border-collapse: collapse;'> $key </th>";
    }
    echo "<th style=border-collapse: collapse;'>Actions</th>";
    echo "</tr>";
}

$read_button_id = 0;
$update_button_id = 0;
$delete_button_id = 0;
$product_id_array;
$product_id_array_number = 0;
$page_id = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_REQUEST['input_search'];

    $sql = "SELECT * FROM `products` WHERE product_name LIKE '%$search%' OR other_product_details LIKE '%$search%'";

    $DbObject->readData($sql);
    unset($_REQUEST);
}
elseif($page_id != null){
  $startAtRecordNumber = $page_id * 5 - 5 ;
  $sql = "SELECT * FROM `products` LIMIT $startAtRecordNumber, 5";
}
else
$sql = "SELECT * FROM `products` LIMIT 0, 5";

$res = $DbObject->readData($sql);
foreach ($res as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
      if ($key == "product_price") {
        $value2 = str_replace('.',',',$value);
        echo "<td style='border: 1px solid black;  border-collapse: collapse;'>€$value2 </td>";
      }
      elseif ($key == "product_id") {
        $product_id_array[] += $value;
        echo "<td style='border: 1px solid black;  border-collapse: collapse;'>$value</td>";
      }
      else
      echo "<td style='border: 1px solid black;  border-collapse: collapse;'>$value</td>";

    }
    
    $read_button_id = $product_id_array[$product_id_array_number];
    $update_button_id = $product_id_array[$product_id_array_number];
    $delete_button_id = $product_id_array[$product_id_array_number];
    
    echo "<td style='border: 1px solid black;  border-collapse: collapse;'><a href='stardunks_read.php?id=".$read_button_id."'><i class='fa fa-leanpub'></i>Read</a></td>";
    echo "<td style='border: 1px solid black;  border-collapse: collapse;'><a href='stardunks_update.php?id=".$update_button_id."'><i class='fa fa-pencil-square-o'></i>
Update</a></td>";
    echo "<td style='border: 1px solid black;  border-collapse: collapse;'><a href='stardunks_delete.php?id=".$delete_button_id."'><i class='fa fa-close'></i>Delete</a></td>";
    echo "</tr>";
    
    $product_id_array_number += 1;
}

var_dump($product_id_array);

$sql = "SELECT COUNT(*) FROM `products`";
$res = $DbObject->countPages($sql);
var_dump($res);
?>
</table>
</pre>
<?php
for ($i = 1; $i <= $res; $i++) {
   echo "<a href='stardunk_level1.php?id=$i'>". $i ."</a>" ."  " ;
}
include('html_footer.html');

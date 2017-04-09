<style>#search, #create{display: none}</style>
<?php
require("DbHandler.class.php");
$DbObject = new DbHandler("localhost", "stardunk","root","");
include('html_header.html');
$product_id= $_GET["id"];

$sql = "SELECT * FROM `products` LIMIT 0, 1";
$res = $DbObject->readData($sql);

foreach ($res as $row) {
    echo "<tr>";
    foreach ($row as $key => $value){
            echo "<th style='border: 1px solid black;  border-collapse: collapse;'> $key </th>";
    }
    echo "</tr>";
}
$sql = "SELECT * FROM `products` WHERE `product_id` = $product_id";
$res = $DbObject->readData($sql);
echo "<tr><form action='stardunks_update.php' method='post'>";
foreach ($res as $row) {
    foreach ($row as $key => $value) {
        if ($key == "product_id") {
            echo "<td><input type='text' value='$value' name='input_$key' readonly='readonly'/></td>";
        }
        else
        echo "<td><input type='text' value='$value' name='input_$key'/></td>";
        
    }
    
}
echo "</tr><tr><td><input type='submit' value='Update Product'/></td></tr></form></table>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_product_id = $_REQUEST['input_product_id'];
    $input_product_type_code = $_REQUEST['input_product_type_code'];
    $input_supplier_id = $_REQUEST['input_supplier_id'];
    $input_product_name = $_REQUEST['input_product_name'];
    $input_product_price = $_REQUEST['input_product_price'];
    $input_other_product_details = $_REQUEST['input_other_product_details'];

    
    $sql = "UPDATE `products` SET 
    `product_type_code` = $input_product_type_code, 
    `supplier_id` = $input_supplier_id, 
    `product_name` = '$input_product_name',  
    `product_price` = $input_product_price,  
    `other_product_details` = '$input_other_product_details' 
    WHERE 
    `product_id` = $input_product_id;";
    var_dump($sql);
    $DbObject->updateData($sql);
    unset($_REQUEST);
    header('Location: stardunk_level1.php');
}

?>
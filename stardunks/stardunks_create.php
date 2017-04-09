<style>#search, #create{display: none}</style>
<?php
require("DbHandler.class.php");
$DbObject = new DbHandler("localhost", "stardunk","root","");
include('html_header.html');

$sql = "SELECT * FROM `products` LIMIT 0, 1";
$res = $DbObject->readData($sql);

foreach ($res as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        if ($key != "product_id") {
            echo "<th style='border: 1px solid black;  border-collapse: collapse;'> $key </th>";
        }
    }
    echo "</tr>";
}
echo "<tr><form action='stardunks_create.php' method='post'>";
foreach ($res as $row) {
    foreach ($row as $key => $value) {
        if ($key != "product_id") {
            echo "<td><input type='text' name='input_$key'/></td>";
        }
        
    }
    
}
echo "</tr><tr><td><input type='submit' value='Add Product'/></td></tr></form></table>";
?>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_product_type_code = $_REQUEST['input_product_type_code'];
    $input_supplier_id = $_REQUEST['input_supplier_id'];
    $input_product_name = $_REQUEST['input_product_name'];
    $input_product_price = $_REQUEST['input_product_price'];
    $input_other_product_details = $_REQUEST['input_other_product_details'];


    $sql = "INSERT INTO `stardunk`.`products` (`product_id`, `product_type_code`, `supplier_id`, `product_name`,`product_price`,`other_product_details`) VALUES (NULL, $input_product_type_code, $input_supplier_id, '$input_product_name', $input_product_price, '$input_other_product_details');";
    var_dump($sql);
    $DbObject->createData($sql);
    unset($_REQUEST);
}

?>
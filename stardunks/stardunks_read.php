<style>#search, #create{display: none}</style>
<?php
include('html_header.html');
$product_id = $_GET["id"];
require("DbHandler.class.php");
$DbObject = new DbHandler("localhost", "stardunk","root","");
$sql = "SELECT * FROM `products` LIMIT 0, 1";
$res = $DbObject->readData($sql);
foreach ($res as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
      echo "<th style='border: 1px solid black;  border-collapse: collapse;'> $key </th>";
    }
    echo "</tr>";
}

$sql = "SELECT * FROM `products` WHERE `product_id` = $product_id";
$res = $DbObject->readData($sql);
foreach ($res as $row) {
    echo "<tr>";
    foreach ($row as $key => $value) {
      if ($key == "product_price") {
        $value2 = str_replace('.',',',$value);
        echo "<td style='border: 1px solid black;  border-collapse: collapse;'>€$value2 </td>";
      }
      else
      echo "<td style='border: 1px solid black;  border-collapse: collapse;'>$value</td>";

    }
}
?>

<?php
include('html_footer.html');

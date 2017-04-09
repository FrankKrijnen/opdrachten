<?php
class dbHandler {
public $servername;
public $dbname;
public $username;
public $password;
public $conn;

  function __construct($servername, $dbname, $username, $password){
    //globale variablen die meegegeven zijn. $crud = new DbHandler("localhost","mydbpdo","root","");
    $this->servername = $servername;
    $this->dbname = $dbname;
    $this->username = $username;
    $this->password = $password;
    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }
    catch (Exception $e) {
      echo "connect failed" . $e->getMessage();
    }
  }

  function createData($sql){
    try {
      $this->conn->exec($sql);
      echo "Data created";
      return $this->conn->lastInsertId();
    }
    catch (Exception $e) {
    }
    echo $e->getMessage();
    }

  function readData($sql){
    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      $result = $stmt->fetchall(PDO::FETCH_ASSOC);
      return $result;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  function updateData($sql){
    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  function deleteData($sql){
    try {
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->rowCount();
    }
    catch (Exception $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

  }
  function countPages($sql){
    $result = $this->conn->query($sql);
    $get_total_rows = $result->fetch();
    $pages = ceil($get_total_rows[0]/5);
    return $pages;
  }
  function getPages(){
    
  }
  function destruct(){
    $this->conn = null;
  }
}



 ?>

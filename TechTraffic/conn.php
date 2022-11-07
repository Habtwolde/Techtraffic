<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "add_pdo";

$conn = mysqli_connect($host,$user,$password,$dbname);
if(!$conn){
  echo "<script>alert('Connection to the DataBase lost');</script>";
  }
?>

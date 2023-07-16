<?php
 $user = $_POST["user"];
 $password = $_POST["password"];

 $conn=new mysqli("localhost","root","","sistema1");
 $result=$conn->query("SELECT * FROM usuarios WHERE usuario='$user' AND password='$password'");

 if ($result->fetch_assoc()) {
     header("location: ../view/inicio.php ");
 } else {
     header("location: ../view/error.php");
 }
 
?>
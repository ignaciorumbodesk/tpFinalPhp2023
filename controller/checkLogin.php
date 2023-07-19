<?php
 $user = $_POST["user"];
 $password = $_POST["password"];

 $conn=new mysqli("localhost","root","","sistema1");
 $result=$conn->query("SELECT * FROM usuarios WHERE usuario='$user' AND passw='$password'");

 try {
    if ($result->fetch_assoc()) {
        header("location: ../view/inicio.php ");
    } else {
        header("location: ../view/login.php?mensaje=Usuario%20o%20contraseña%20incorrectos");
    }   
 } catch (\Throwable $th) {
    header("location: ../view/login.php?mensaje=Usuario%20o%20contraseña%20incorrectos");
 }
 
?>
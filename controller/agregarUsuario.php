<?php

  $user = $_POST["user"];
  $pass = $_POST["pass"];

  //validar si user y pass son correctos

  $conexion = new mysqli("localhost","root","","sistema1");
  if ($conexion->query("INSERT INTO usuarios (usuario, password) VALUES ('$user', '$pass')")) {
    header("Location: ../view/confirmacion.php?mensaje=El%20usuario%20fue%20agregado%20exitosamente");
  } else {
    echo "error";
  }
  
?>
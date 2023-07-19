<?php

  $user = $_POST["user"];
  $pass = $_POST["pass"];

  //validar si user y pass son correctos
try {
  $conexion = new mysqli("localhost","root","","sistema1");
  if ($conexion->query("INSERT INTO usuarios (usuario, passw) VALUES ('$user', '$pass')")) {
    header("Location: ../view/listadoUsuarios.php");
  } else {
    header("Location: ../view/agregarUsuario.php?mensaje=El%20usuario%20NO%20fue%20agregado, ya se encuentra registrado.");
  }
    
  } catch (\Throwable $th) {
    header("Location: ../view/agregarUsuario.php?mensaje=Error%20al%20agregar%20usuario"); 
  }

?>
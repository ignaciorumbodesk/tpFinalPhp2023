<?php

  $id = $_POST["id"];
  $user = $_POST["user"];
  $pass = $_POST["passw"];

try {
  $conexion = new mysqli("localhost","root","","sistema1");
  $okUpdate=$conexion->query("UPDATE usuarios SET usuario='$user',passw='$pass' WHERE id=$id");
  if ($okUpdate) {
    header("Location: ../view/listadoUsuarios.php");
  } else {
    header("Location: ../view/editar.php?id=&mensaje=El%20usuario%20NO%20fue%20modificado.- controller");
  }
  
} catch (\Throwable $th) {
  header("Location: ../view/editUsuario.php?id=$id&mensaje=Error%20al%20modificar%20usuario.- controller");  
}

?>
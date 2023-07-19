<?php 
$idUser=$_POST["idUser"];
echo $id;

try {
    
    $conexion=new mysqli("localhost","root","","sistema1");
    if ($conexion->query("DELETE FROM usuarios WHERE id=$idUser")) {
        header("Location: ../view/listadoUsuarios.php?mensaje="); 
    } else {
        header("Location: ../view/listadoUsuarios.php?mensaje=Error%20al%20eliminar%20usuario-C"); 
    }
} catch (\Throwable $th) {
    header("Location: ../view/listadoUsuarios.php?mensaje=Error%20al%20eliminar%20usuario-C"); 
}



?>
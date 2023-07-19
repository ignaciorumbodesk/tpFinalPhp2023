<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <?php
  require_once("menu.php");
  ?>
  <h3 class="text-center fs-3">Editar usuario.</h3>

  <?php
    $id = $_GET["id"];

    try {
        $conn=new mysqli("localhost","root","","sistema1");
        $result=$conn->query("SELECT * FROM usuarios WHERE id=$id");
        
        if ($usuario=$result->fetch_assoc()) {

          $user=$usuario["usuario"];
          $pass=$usuario["passw"]; 
      }  else {
        header("Location: ../view/listadoUsuarios.php?mensaje=Error%20al%20modificar%20usuario-View"); 
    }
    } catch (\Throwable $th) {
      header("Location: ../view/listadoUsuarios.php?mensaje=Error%20al%20modificar%20usuario-View");  
  }
  ?>

  <div class="d-flex justify-content-center">
    <form action="../controller/editUsuario.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $id;?>">
      <div class="input-group mb-3 flex-nowrap">
        <input type="text" name="user" class="form-control" id="nombreDeUsuario" placeholder="Nombre de usuario" aria-label="Recipient's username"
          aria-describedby="basic-addon2" onkeyup="validarUsuario()" value="<?php echo $user;?>" required>
        <span class="input-group-text" id="basic-addon2">@ejemplo.com</span>
      </div>
      <div class="input-group mb-3 flex-nowrap">
        <input type="password" name="passw" class="form-control" id="passwordDeUsuario" placeholder="Password, puede usar numeros, mayusculas, etc" 
        aria-label="Recipient's username" onkeyup="defFortaleza()" aria-describedby="basic-addon2" value="<?php echo $pass;?>" requiered>
        <span class="input-group-text" id="basic-addon2">P@ssw0rd</span>
      </div>
      <div class="input-group mb-3 flex-nowrap">
        <input type="password" name="rpPassw" class="form-control" id="comparaPassword" placeholder="Repita su Password" aria-label="Recipient's username"
          onkeyup="compararPass()" aria-describedby="basic-addon2" value="<?php echo $pass;?>"requiered>
        <span class="input-group-text" id="basic-addon2">P@ssw0rd</span>
      </div>

      <!--<input type="submit" value="guardar">-->
      <button type="submit" value="guardar">Guardar<i class="bi bi-pencil-square"></i> </button>
      <div id="mensaje"></div>
    </form>
    <?php 
            $mensaje=$_GET["mensaje"];
            if ($mensaje!="") {
                echo "<div class='text-danger text-center m-2'>";
                echo $mensaje;
                echo "</div";
            }
        ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>
    
</body>

</html>
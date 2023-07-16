<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <?php
      require_once("menu.html");
    ?>
    <h3 class="text-center fs-3">Listado de usuarios traidos desde la DB.</h3> 
    <div class="container">
      <a href="agregarUsuario.php" class="btn btn-primary">Agregar usuario</a>
    </div>
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col"># Id</th>
          <th scope="col">usuario</th>
          <th scope="col">contraseña</th>
          <th scope="col">utilidades</th>
        </tr>
      </thead>
      <tbody>
        
        <?php
          // conexion a BD para traer los usuarios
          $conn=new mysqli("localhost","root","","sistema1");
          // consultamos a la DB y almacenamos los resultados en la variable query
          $query=$conn->query("SELECT * FROM usuarios");
          
          //obtenemos los datos almacenados en $query array de array asociativo.
          while ($usuario=$query->fetch_assoc()) {
            $listUsuarios[]=$usuario;
          }

          //obtengo la cantidad de ususarios
          $cantidadUsuarios = count($listUsuarios);

          //recorro el array $listUsuarios para generar html
          for ($i=0; $i < $cantidadUsuarios; $i++) { 
            echo "<tr>";
              echo "<td>";
              echo $listUsuarios[$i]["id"];
              echo "</td>";

              echo "<td>";
              echo $listUsuarios[$i]["usuario"];
              echo "</td>";

              echo "<td>";
              echo $listUsuarios[$i]["password"];
              echo "</td>";

              echo "<td>";
              echo "<a href='editar.php'><i class='bi bi-pencil-fill'></i></a>";
              echo "<i class='bi bi-trash3-fill' onclick='eliminar()'></i>";
              echo "</td>";
            echo "</tr>";     
          }
          $conn->close();
        ?>
      </tbody>
    </table>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
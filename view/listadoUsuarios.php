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
      require_once("menu.php");
    ?>
    <h3 class="text-center fs-3">Listado de usuarios traidos desde la DB.</h3> 
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

               $idUser = $listUsuarios[$i]["id"];
              echo $idUser;
              echo "</td>";

              echo "<td>";
               $user = $listUsuarios[$i]["usuario"];
              echo $user;
              echo "</td>";

              echo "<td>";
               $pass=$listUsuarios[$i]["passw"];
              
              echo "</td>";

              echo "<td>";
              echo "<a href='editar.php?id=$idUser&mensaje='><i class='bi bi-pencil-fill m-1'></i></a>";
            //al hacer click en el enlace, se envian al modal los datos de idUser y user 
              echo "<a href='#' data-bs-toggle='modal' data-bs-target='#delModal' idUsuario='$idUser' usuario='$user'><i class='bi bi-trash3-fill' onclick='eliminar()'></i></a>";
              echo "</td>";
            echo "</tr>";     
          }
          $conn->close();
        ?>
      </tbody>
    </table>
  </div>
  <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminación de Usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <!-- mediante POST enviamos los datos en un input hidden -->
            <form action="../controller/delUsuario.php" method="post">
                <input type="hidden" name="idUser" id="idUser">
                <div class="modal-body text-center">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label  fs-6">¿Desea eliminar el usuario?</label>
                            <div id="datosUser" class="text-danger"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Eliminar" class="btn btn-primary">
                    
                </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src=" js/listUsu.js"></script>
  </body>
</html>
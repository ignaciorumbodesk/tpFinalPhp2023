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
    <h3 class="text-center fs-4">Listado de Provincias traidos desde la DB.</h3>
    <div class="container">
      <div class="text-center fs-5 my-2">
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col">#id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Operaciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- traemos los datos de tabla provincias -->
          <?php
            try {
              //conectamos a la db
              $conMysql=new mysqli("localhost","root","","territorio");

              //consulto a la DB y almaceno el resultado en un $result
              $result=$conMysql->query("SELECT * FROM provincias ORDER BY id");
              
              //transformo el resultado en un array 
              while ($prov=$result->fetch_assoc()) {
                $listProv[]=$prov;
              }
              
              $cantProv = count($listProv);
              
              //utilizamos un for o un foreach para recorrer el array y devolver los valores a imprimir
             /*   
              for ($i=0; $i < $cantProv; $i++) { 
            
                echo "<tr>";
                echo "<td>";
                echo $listProv[$i]["id"];
                echo "</td>";
                echo "<td>";
                echo $listProv[$i]["nombre"];
                echo "</td>";
                echo "<td>";
                echo "<a href='editar.php'><i class='bi bi-pencil-fill'></i></a>";
                echo "<i class='bi bi-trash3-fill' onclick='eliminar()'></i>";
                echo "</td>";
                echo "</tr>";

              }
              */

              foreach ($listProv as $prov) {
                echo "<tr>";
                echo "<td>";
                echo $prov["id"];
                echo "</td>";
                echo "<td>";
                echo $prov["nombre"];
                echo "</td>";
                echo "<td>";
                echo "<a href='editar.php'><i class='bi bi-pencil-fill'></i></a>";
                echo "<i class='bi bi-trash3-fill' onclick='eliminar()'></i>";
                echo "</td>";
                echo "</tr>";
              }


            } catch (Exception $e) {
              echo 'Excepcion capturada: ', $e->getMessage(),"\n";
              header("Location: error.php"); 
            }
              

          ?>
        </tbody>
      </table>
      </div>
    </div>
  </body>
</html>
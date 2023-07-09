!<DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name ="viewport" content="width=device-width, initial-scale = 1">
	<title>Php - 1 - 04/07/2023</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="./styles.css">
</head>
	<body>
		<?php
			//conexion a BD
			
			$mysqli = new mysqli("localhost", "root", "", "php23084");
			$query = $mysqli->query("SELECT * FROM usuarios ORDER BY usuario");
		
			while ($resultado = $query->fetch_assoc() ) {
				$usuarios[] = $resultado; 
			}
			
			echo "<ul>";	
				for($i=0; $i < $long; $i++){
				echo "<li>";	
					echo $usuarios[$i]['idusuario'];
					echo " - ";
					echo $usuarios[$i]['usuario'];			
				echo "</li>";
				}
			echo "</ul>";
		?>
	</body>
</html>
    
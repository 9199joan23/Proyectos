<?php session_start();

		//realizamos la conexión
	$conexion = mysqli_connect('localhost', 'root', '', 'bd_cromo');

		//le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
		$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}

		extract($_REQUEST);

		if ($tipo=="Otro"){
			$tipo=$tipo_otro;}	
		else{
			$tipo;
		}
		
		$sql = "INSERT INTO tbl_recursos (rec_name, rec_tipo, rec_disp, rec_foto, rec_estado)";
      
		 			     
        $sql .= " VALUES (
        '".$nombre."', 
        '".$tipo."', 
        b'".$disponible."', 
        '".$fotos."',
        '".$estado."')";

    
		mysqli_query($conexion, $sql);
		 mysqli_close($conexion);

		header('Location:administracion.php');
	

		
	
	
?>

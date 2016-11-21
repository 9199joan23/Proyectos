<?php session_start();

if (isset($_SESSION['usu_name'])) {
	header('Location: index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usu_name = filter_var(strtolower($_POST['usu_name']), FILTER_SANITIZE_STRING);
	$usu_pass = $_POST['usu_pass'];
	$contra = $usu_pass;
	$usu_pass = hash('sha512', $usu_pass);

	try {
		$conexion = new PDO('mysql:host=localhost;dbname=bd_cromo', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();;
	}

	$statement = $conexion->prepare('
		SELECT * FROM tbl_usuarios WHERE usu_name = :usu_name AND usu_pass = :usu_pass'
	);
	$statement->execute(array(
		':usu_name' => $usu_name,
		':usu_pass' => $usu_pass
	));

	$resultado = $statement->fetchAll();
	foreach ($resultado as $usu) {
		$usu_id = $usu['usu_id'];
		echo $usu_id;
	}
	if ($resultado !== false) {
		$_SESSION['usu_name'] = $usu_name;
		header('Location: index.php');
	} else {
		$errores .= '<li>Datos Incorrectos</li>' . " ----- " . $resultado . " ----- " . $usu_name . " ----- " . $contra;
	}
}

require 'views/login.view.php';

?>
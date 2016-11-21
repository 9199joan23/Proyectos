<?php session_start();

if ($_SESSION['usu_name'] == 'admin') {
	require 'views/administracion.view.php';
} else {
	header('Location: login.php');
}


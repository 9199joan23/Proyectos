<?php session_start();

if ($_SESSION['usu_name'] == 'admin') {
	require 'views/admin_rec.view.php';
} else {
	header('Location: login.php');
}


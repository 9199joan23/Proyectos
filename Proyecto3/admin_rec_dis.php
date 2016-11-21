<?php session_start();

if (isset($_SESSION['usu_name'])) {
	require 'views/admin_rec_dis.view.php';
} else {
	header('Location: login.php');
}


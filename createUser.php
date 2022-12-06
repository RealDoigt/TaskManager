<?php
	
	require 'userHelper.php';
	session_start();
	
	if (isset($_SESSION['admin']) && $_SESSION['admin'] === 1 && isset($_POST['user']) && isset($_POST['pwd']) && isset($_POST['role']))
	{
		if (findUser($_POST['user'], $_POST['pwd']) === 0)
			addUser($_POST['user'], $_POST['pwd'], $_POST['role']);
		
		else
			$_SESSION['error'] = 'This user already exists.';
		
		header('location: userController.php');
		exit;
	}
	
	else
	{
		$_SESSION['error'] = 'Request failed.';
		header('location: userController.php');
		exit;
	}
?>
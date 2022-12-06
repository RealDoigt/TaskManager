<?php
	require 'userHelper.php';
	session_start();
	
	if (isset($_POST['user']))
	{
		
		switch(findUser($_POST['user'], $_POST['pwd']))
		{
			case -2:
				$_SESSION['error'] = 'You are banned. Do NOT come back!';
				header('location: login.php');
				exit;
				
			case -1:
				$_SESSION['error'] = 'Password mismatch.';
				header('location: login.php');
				exit;
				
			case 0:
				$_SESSION['error'] = 'User not found.';
				header('location: login.php');
				exit;
			
			case 2:
				$_SESSION['admin'] = 1;
				break;
				
			default:
				$_SESSION['admin'] = 0;
				break;
		}
		
		$_SESSION['user'] = $_POST['user'];
		header('location: index.php');
	}
	
?>
<?php 
	
	include_once 'head.php';
	require 'userHelper.php';
	require 'lineEdit.php';
	require 'taskHelper.php';
	session_start();
	
	if (isset($_POST['claim']) || (isset($_SESSION['user']) && isset($_GET['task'])))
	{
		if(isset($_POST['claim']))
			switch(findUser($_POST['user'], $_POST['pwd']))
			{
				case -2:
					$_SESSION['error'] = 'You are banned. Do NOT come back!';
					header('location: claim.php?task='.$_POST['claim']);
					exit;
					
				case -1:
					$_SESSION['error'] = 'Password mismatch.';
					header('location: claim.php?task='.$_POST['claim']);
					exit;
					
				case 0:
					$_SESSION['error'] = 'User not found.';
					header('location: claim.php?task='.$_POST['claim']);
					exit;
				
				case 2:
					$_SESSION['admin'] = 1;
					break;
					
				default:
					$_SESSION['admin'] = 0;
					break;
			}
			
		$taskName = isset($_POST['claim']) ? $_POST['claim'] : $_GET['task'];
		
		if (!taskIsAvailable($taskName))
		{
			unset($_SESSION['user']); // since there's no other way to show error messages than by being logged off for now.
			$_SESSION['error'] = 'That task has already been claimed.';		
			header("location: claim.php?task=$taskName");
		}
			
		if (isset($_POST['user']))
			$_SESSION['user'] = $_POST['user'];
		
		$task = explode(',', getTask($taskName));
		$task[3] = $_SESSION['user']; // assigned to... field
		$task = implode(',', $task);
		
		editLine($taskName, 'tasks.csv', $task);
		
		header('location: index.php');
		exit;
	}
	
	else if (isset($_GET['task']))
	{
		if (isset($_SESSION['error']))
		{
			echo '<span class="error">'.$_SESSION['error'].'</span>';
			unset($_SESSION['error']);
		}
		
		echo '
		
		<form action="claim.php" method="post">
		
			<input type="text" placeholder="Username" name="user" required/>
			<input type="password" placeholder="Password" name="pwd" required/>
			<input type="hidden" value="'.$_GET['task'].'" name="claim"/>
			<input type="submit" value="Claim &quot;'.$_GET['task'].'&quot;"/>
			
		</form>
		';
	}
	
	else
	{
		header('location: index.php');
		exit;
	}
?>
<?php
	
	include_once 'head.php';
	session_start();
	
	if (isset($_SESSION['admin']))
	{
		if ($_SESSION['admin'] === 0)
			echo '<span class="error">You do not have the required privilege to access the content requested.</span>';
		
		else
		{
			if (isset($_SESSION['error']))
			{
				echo '<span class="error">'.$_SESSION['error'].'</span>';
				unset($_SESSION['error']);
			}
			
			echo '		
			<form action="createUser.php" method="post">
			
				<input type="text" placeholder="Username" name="user" required/>
				<input type="password" placeholder="Password" name="pwd" required/>
				
				<select name="role" required>
					<option value="regular">Regular</option>
					<option value="admin">Admin</option>
				</select> 
				
				<input type="submit" value="Add user"/>
				
			</form>
			';
		}
	}
	
	else
	{
		header('location: login.php');
	}
?>
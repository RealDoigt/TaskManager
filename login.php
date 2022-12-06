<html>
	
	<?php include_once 'head.php'; ?>	
	
	<body>
		
		<?php
		
			if (isset($_SESSION['user'])) 
			{
				header('location: index.php');
				exit;
			}
		
			if (isset($_SESSION['error']))
			{
				echo '<span class="error">'.$_SESSION['error'].'</span>';
				unset($_SESSION['error']);
			}
		
		?>

		<form action="loginUser.php" method="post">
		
			<input type="text" placeholder="Username" name="user" required/>
			<input type="password" placeholder="Password" name="pwd" required/>
			<input type="submit" value="Login"/>
			
		</form>
		
	</body>

</html>
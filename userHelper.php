<?php
	// -2 user is banned, -1 password is incorrect, 0 user not found, 1 ok, 2 ok and user is admin
	function findUser($username, $password)
	{
		$file = file('users.csv');
		
		foreach($file as $line)
		{
			$fields = explode(',', $line);
			
			if ($fields[0] === $username)
			{
				if ($fields[1] === crypt($password, 'he110w0r1d'))
				{
					// user perms field
					switch($fields[2])
					{
						case 'banned':
							return -2;
							
						case 'admin':
							return 2;
							
						default:
							return 1;
					}
				}
				
				else
					return -1;
			}
		}
		
		return 0;
	}
	
	function addUser($username, $password, $permission)
	{
		if (findUser($username, $password) === 0)
		{
			$file = fopen('users.csv', 'a');
			fwrite($file, "\n".$username.','.crypt($password, 'he110w0r1d').','.$permission);
			fclose($file);
		}
	}
?>
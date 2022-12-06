<?php
	function taskIsAvailable($taskName)
	{
		$file = file('tasks.csv');
		
		foreach($file as $line)
		{
			$fields = explode(',', $line);
			
			if ($fields[0] === $taskName && $fields[3] === 'no one')
				return 0;
		}
			
		return 1;
	}
	
	function getTask($taskName)
	{
		$file = file('tasks.csv');
		
		foreach ($file as $line)
			if (explode(',', $line)[0] === $taskName)
				return $line;
			
		return -1;
	}
	
	function addTask($taskName, $description, $importance, $assignedTo)
	{
		$description = str_replace(',', '&#44;', $description);
		$file = fopen('tasks.csv', 'a');
		
		fwrite($file, "\n".$taskName.','.$description.','.$importance.','.$assignedTo);
		fclose($file);
	}
?>
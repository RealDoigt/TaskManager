<?php
	function editLine($nameFirstElement, $fileName, $newContent)
	{
		$file = explode("\n", rtrim(file_get_contents($fileName)));
		
		$count = 0;
		foreach($file as $line)
		{
			if (explode(',', $line)[0] === $nameFirstElement)
				break;
			
			++$count;
		}
		
		$file[$count] = $newContent;
		$file = implode("\n", $file);
		file_put_contents($fileName, $file);
	}
?>
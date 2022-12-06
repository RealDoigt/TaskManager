<html>

	<?php include_once 'head.php'; ?>
	
	<body>
	
		<table>

			<?php 
				
				$file = file('tasks.csv');
				
				foreach ($file as $line)
				{
					$fields = explode(',', $line);
					
					echo '
					<tr'.($fields[2] === 'Must' ? ' class="must"': '').'>
					
						<td>
						'.$fields[0].'
						</td>
						
						<td>
						'.$fields[1].'
						</td>
						
						<td>
						'.$fields[2].'
						</td>
						
						<td>
						'.$fields[3].'
						</td>
						
						<td>
							<a href="claim.php?task='.$fields[0].'">Claim</a>
						</td>
						
					</tr>
					';
				}
			?>

		</table>
	
	</body>
	
</html>
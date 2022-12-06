<head>

	<title>Task List</title>
	<meta charset="utf-8"/>
	
	<style>
		
		body 
		{ 
			background-color: rgb(40, 40, 40); 
			color: rgb(220, 220, 240);
			text-shadow: rgb(0, 0, 0) 1px 1px;
		}
		
		td { padding: 5px; }
		
		tr:first-child td 
		{  
			font-weight: bold;
			font-size: 14pt;
			text-align: center;
		}
		
		tr:first-child td:last-child { display: none; }
		
		tr:hover { background-color: rgb(20, 20, 20); }
		
		.must 
		{ 
			color: rgb(200, 150, 0);
			font-style: oblique;
		}
		
		.error
		{
			text-decoration: underline wavy;
			color: rgb(255, 0, 0);
			font-size: 15pt;
			margin: auto;
		}
		
		form 
		{ 
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			width: 25vw;
			margin: auto;
			margin-top: 25vh;
		}
		
		form > * 
		{ 
			margin-top: 1vh;
			font-size: 2vw;
			background-color: rgb(20, 20, 20);
			color: rgb(220, 220, 240);
			width: 25vw;
			border: 1px solid rgb(220, 220, 240);
			display: block;
			padding: 1%;
		}
		
		[type='submit']:hover 
		{
			background-color: rgb(220, 220, 240);
			color: rgb(20, 20, 20);
		}
		
		[type='submit']:active
		{
			background-color: rgb(120, 120, 140);
			color: rgb(10, 10, 10);
		}
	</style>
	
</head>
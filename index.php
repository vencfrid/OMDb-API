<?php
	session_start();
	if (isset($_SESSION["OMDbData"])) 
	{
		$OMDbData = $_SESSION["OMDbData"];
		$OMDbData = json_decode(json_encode($OMDbData), true);
	}
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search</title>
	<link rel="stylesheet" href="testpage.css">
	<meta http-equiv="refresh" content="99999">
</head>
<body>
	<div id="div1">
		<table id="tablehref">
			<tr>
				<td>
					<form action="wordCloud.php">
    					<button type="submit" >Statistika vyhledávání</button>
					</form>
				</td>
			</tr>	
		</table>
	</div>
	<div id="div1">
		<table id="table1">
			<tr>
				<td id="TdTable1">			
					Vyhledej v OMDb
					<form name="sign" id="sign" action="OMDb_inc.php" method="POST">
						<ul style="list-style-type:none;">
						  	<li><input type="text" name="s" id="s" placeholder="Search"></li>
						  	<li><select name="type" id="type">';
									<option value="">Typ</option>';
									<option value="movie">Movie</option>';
									<option value="series">Series</option>';
									<option value="episode">Episode</option>';
						  	<li><input type="text" name="y" id="y" placeholder="Rok vydání"></li>
						  	<li><button type="submit" name="search" id="search">Search</button></li>
						</ul>				
					</form>
				</td>			
			</tr>			
		</table>
	</div>
	<div>
		<table id="table2">
			<?php 
				if(isset($OMDbData['Search']))					// zobrazení výsledků (max 10)
				{
					echo '<th>';
						echo 'Výsledky:';
					echo '</th>';
					foreach ($OMDbData['Search'] as $key => $value) 
					{
						echo '<tr>';
							echo '<td>';
								echo $value['Title'];
							echo '</td>';
						echo '</tr>';					
					}
				}
				elseif (isset($OMDbData['Error'])) 
				{
					echo '<th>';
						echo $OMDbData['Error'];
					echo '</th>';
				}			
		 	?>
		</table>
	</div>
</body>
</html>



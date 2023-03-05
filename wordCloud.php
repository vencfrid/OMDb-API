<?php
	include "dbh_class.php";
	include "sHistory_class.php";
	include "searchInfo_class.php";
	$wordCloud = new sHistory();
	$wordCloudData = $wordCloud->getWordCloud();
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
					<form action="index.php">
    					<button type="submit">OMDb Vyhledávání</button>
					</form>					
				</td>			
			</tr>			
		</table>
	</div>
	<div>	
		<?php 
			foreach ($wordCloudData as $key => $value) 
			{
				$minSize = 10;
				$value['pocet_dotaz']= $value['pocet_dotaz']+$minSize;;
				echo '<p style="font-size: '.$value['pocet_dotaz'].'px;">'.$value['dotaz'].'</p>';
			}				
	 	?>
	</div>
</body>
</html>
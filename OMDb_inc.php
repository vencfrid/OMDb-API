<?php
if(isset($_POST["search"]))
{
	$data=array();
	foreach ($_POST as $key => $value) 
	{
    	$index = $key;
    	if (!empty($value)) 
    	{
    		$data[''.$index.''] = ''.$value.'';	// vytvoří array všech postů pro classy
    	}   			
	}

	include "dbh_class.php";
	include "sHistory_class.php";
	include "searchInfo_class.php";
	$movieInfo = new SearchInfo($data);
	session_start();
	$_SESSION['OMDbData'] = $movieInfo->getInfo();
	header("location: index.php");
}


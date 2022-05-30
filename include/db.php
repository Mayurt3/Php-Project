<?php

	$url='localhost';
	$username='root';
	$password='';
	$db = 'aim';
	
	$conn = mysqli_connect($server,$user,$password,$db);

	if(!$conn)
	{
		die("Connection Failed :".mysqli_connect_error());
		
	}
	else
	{
		//echo "it Succes ";
	}

?>
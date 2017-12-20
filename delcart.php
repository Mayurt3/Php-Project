<?php 
require_once('include/db.php');

	if(isset($_GET['delet']) & !empty($_GET['delet']))
		{
		$del_id= $_GET['delet']	;
		$pid_sql = "DELETE FROM `customer_cart` WHERE cartid='$del_id'";
		$run_pid = mysqli_query($conn,$pid_sql);
		header('location:show_cart.php');
		}
//header('location:show_cart.php');
?>
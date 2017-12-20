<?php
	session_start();
 
require_once('include/db.php');
	if(isset($_GET['id']) & !empty($_GET['id']))
	{
		
			$pid_sql = "SELECT * FROM `customer_cart`";
			$run_pid = mysqli_query($conn,$pid_sql);
			while($item = mysqli_fetch_assoc($run_pid))
			{
				$prd_id = $item['productid'];
			}
				if($_GET['id'] == $prd_id)
				{
				
				$pid_sql = "SELECT * FROM `customer_cart` WHERE productid='$_GET[id]'";
				$run_pid = mysqli_query($conn,$pid_sql);
				while($item = mysqli_fetch_assoc($run_pid))
				{
					$qty = $item['quantity'];
					$cart = $item['cartid'];
				}
				$qty++;
				$qty_sql ="UPDATE `customer_cart` SET quantity='$qty' WHERE cartid='$cart'";
				$run_pid = mysqli_query($conn,$qty_sql);
				//echo $qty;
					header('location: index.php?status=success');
				}
				else
				{
				$items .= "," . $_GET['id'];
				$_SESSION['cart'] = $items;
				$id = $_GET['id'];
				
				
				$cid = $_SESSION['user'];
				$pid_sql = "SELECT * FROM `products` WHERE id=$id";
				$run_pid = mysqli_query($conn,$pid_sql);
				while($item = mysqli_fetch_assoc($run_pid))
				{
				$product_name = $item['product_name'];
				$product_price = $item['price'];
				
				}
				$i=1;
				$cus_cart = "INSERT INTO `customer_cart`(productid,product_name,price,quantity,customr_id) VALUES ('$id','$product_name','$product_price','$i','$cid')";
				$run_cus = mysqli_query($conn,$cus_cart);
				
				header('location: index.php?status=success');
					
				}
 
	}
		
	else{
		header('location: index.php?status=failed');
	}
?>
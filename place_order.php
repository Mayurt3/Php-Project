<?php session_start();
require_once('include/db.php');
include('navigation_bar.php');
include('header.php');

	if(isset($_GET['user']) & !empty($_GET['user']))
	{
		
		$cst_id = $_GET['user'];
		$query = "SELECT * FROM customer_cart WHERE customr_id ='$cst_id'";
        $run_sql = mysqli_query($conn,$query);
	
		while($row = mysqli_fetch_array($run_sql))
		{
			foreach($row as $cst_id=>$id)
			{
				echo $id;
			}
			//echo $row['product_name'].",";
		}
			
	
      /*
		while($row = mysqli_fetch_assoc($run_sql))
		{
			$item_name = $row['product_name'];
			$item_id = $row['customr_id'];
			/* $itemData = array(
            "customr_id" => $row['customr_id'],
            "product_name" => $row['product_name'],
            "price" => $row['price'],
            "quantity" => $row['quantity']
        );
		
		}
       
		$query = "INSERT INTO `order_items`(`customrid`, `productname`) VALUES ('$item_id','$item_name')";
		$run_car = mysqli_query($conn,$query);
		
		*/
		
		
		/*if(is_array($itemData))
		{
		foreach ($itemData as $row)
		{
			$fieldVal1 = mysqli_real_escape_string($conn,$itemData[$row][0]);
	
			$query ="INSERT INTO test_data (filed1) VALUES ( '". $fieldVal1."')";
			mysqli_query($conn, $query);
			//$query = "INSERT INTO `order_items`(`customrid`, `productname`, `productprice`, `qty`) VALUES ('$custom_id','$producat_name','$producat_price','$quantity')";
			//$run_car = mysqli_query($conn,$query);
		}

		}*/
	}
?>

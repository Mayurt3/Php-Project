<?php session_start();
require_once('include/db.php');
include('navigation_bar.php');
include('header.php');
?>
<html>
<head>
<body>    
<div class="container">
	<div class="row">
	<form METHOD="POST" ACTION="TextFieldValue.php">
	  <table class="table">
	  	<tr>
			
	  		<th>Product Name</th>
			<th class="quantity">Quantity</th>
	  		<th>Price</th>
			<th>Total</th>
			<th>Action</th>
	  	</tr>
		<?php
			$grdt = 0;
		$total = '';
		$cid = $_SESSION['user'];
		$pid_sql = "SELECT * FROM `customer_cart` WHERE customr_id='$cid'";
		$run_pid = mysqli_query($conn,$pid_sql);
		
		while($item = mysqli_fetch_assoc($run_pid))
			{
			
			$item_price = $item['price'];
			$yq_itm = $item['quantity'];
			
		?>	  
		<tr>
		<td><?php echo $item['product_name']?></td>
		<td class="cart_quantity">
		<?php echo dropdown_select('quantity', $item['quantity'], $item['cartid'] );?>
        <td>Rs.<?php echo $item['price']?></td>
		<td>Rs.<?php $total = $item['price'] * $item['quantity'];
				echo $total;
				$grdt+=$total;
				?></td>
		<td><a href="delcart.php?delet='.$item['cartid'].'" class="btn btn-danger"> Delete </a></td>
				
		</tr>
			
		<?php }
		?>			
		
		
		<tr>
			<td><strong>Grand Total</strong></td>
			<td><strong>&nbsp;</strong></td>
			<td><strong>&nbsp;</strong></td>
			<td><strong>Rs.<?php echo $grdt;?></strong></td>
			<td><a href="#" class="btn btn-info">Checkout</a></td>
		</tr>
	  </table>
	  </form>
	</div>
</div>
</body>
</head>
</html>
<?php
function dropdown_select( $name, $default=null,$id= '') {

    $output = "<select rel='$id' class='$name' name='" . $name.$id . "' id='" .$name.$id . "'>\n";
    for ($i=1 ; $i<=10; $i++) {
        if ($i != (int)$default) {
            $output .= "\t<option value=\"" . $i . '">' . $i . "</option>\n";
        } else {
            $output .= "\t<option selected='selected' value=\"" . $i . '">' . $i . "</option>\n";
        }
    }
    $output .= "</select>\n";

    return $output;
}
?>
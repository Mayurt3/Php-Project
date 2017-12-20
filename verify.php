<?php include 'include/db.php';
	session_start();
	
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['confirmation_code']) && !empty($_GET['confirmation_code']))
	{
		$email = $_GET['email']; 
		$hash = $_GET['confirmation_code']; 
		$username = $_GET['username']; 
		$verify_sql = "SELECT * FROM customer WHERE email='$email' AND confirmation_code='$hash' AND active='0'";
		$run_sql = mysqli_query($conn,$verify_sql);
				
			if (mysqli_num_rows($run_sql) == 0) 
				{
					$_SESSION['message'] = "Account has already been activated or the URL is invalid!";
						
						echo '
						<div class="col-md-6 ab_pic_w3ls_text_info">
						<h5>'.$_SESSION['message'].'</h5>		
						</div>
						
						<br/><a href=index.php>Click here to Login</a>
							
						';
						
						}
					else
						{
						$_SESSION['message'] = "Your account has been activated!";
			 
						$active_Sql = "UPDATE customer SET active='1' WHERE email='$email'";
						$run_sql = mysqli_query($conn,$active_Sql);
			 
						$_SESSION['active'] = 1;
						
						
						echo '
						
						<div class="col-md-6 ab_pic_w3ls_text_info">
						<h5>'.$_SESSION['message'].'</h5>		
						</div>
						
						<br/><a href=index.php?success>Click here to Login</a>
							
						';				

					}
				}
				else
				{
					$_SESSION['message'] = "Invalid parameters provided for account verification!";
				
					echo '
						<div class="col-md-6 ab_pic_w3ls_text_info">
						<h5>'.$_SESSION['message'].'</h5>		
						</div>
						
						<br/><a href=index.php>Click here to Login</a>';
					
				}
		
				?>
				
	
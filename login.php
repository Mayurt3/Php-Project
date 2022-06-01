<?php session_start();
require_once('include/db.php');

include('navigation_bar.php');
include('header.php');
$reg_suc ='';
if (isset($_SESSION["user"])) {
    header("location: index.php"); 
    exit();
}
	if (isset($_POST["username"]) && isset($_POST["password"])) {
	
	$active_id = "SELECT id FROM sign_up WHERE status='0'";
	$userMatch = mysqli_query($conn, $active_id);
	//$userMatch = mysqli_num_rows($check_mobile); 
	if (mysqli_num_rows($userMatch) > 0) {
		//$reg_suc ='<div class="alert alert-danger">Sorry your mobile number is already registered into the system</div>';
		echo 'That information is incorrect, try again <a href="index.php">Click Here</a>';
		exit();
	}
	
	$user = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);

    $sql = "SELECT id FROM sign_up WHERE username='$user' AND password='$password' LIMIT 1 "; 
	$exist = mysqli_query($conn, $sql);
   
		if (mysqli_num_rows($exist) == 1) 
		{
			
		

	    
		 $_SESSION["cid"] = $id;
		 $_SESSION["user"] = $user;
		 $_SESSION["password"] = $password;
		 
		 header("location: index.php?userloginsuccess");
         exit();
		} else {
		echo 'That information is incorrect, try again <a href="index.php">Click Here</a>';
		exit();
		}
	}
/*
if(isset($_POST['submit']))
	{
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$log_sql = "SELECT * FROM users WHERE email='$email'";
	$run_sql = mysqli_query($conn,$log_sql);
	$row = mysqli_fetch_assoc($run_sql);
	
	if ($row == 1)
	{
		$_SESSION['email'] = $email;
	}else
	{
		$fmsg = "Invalid Login Credentials.";
	}
	
		if($email == $row['email'] && $password == $row['password'])
		{
			
			if($row['active'] == 1)
			{
			$_SESSION['email'] = $row['email'];
			
						
			$_SESSION['logged_in'] = true;
			
			
			header("location:checkout.php?active_id=$row[active]&username=$row[first_name] $row[last_name]&user_id=$row[id]");
				
			}
			else
			{
				
				
			//	$_SESSION['active_id'] = 'true';
				$reg_suc ='<div class="alert alert-danger">Please Active Your account From email address</div>';
				
			}
		}
		else
		{
				
			//	$_SESSION['active_id'] = 'true';
				$reg_suc ='<div class="alert alert-danger">Something Wrong</div>';
		}
		
	}	*/
?>
<html>
<head>
<div class="container">
<div class="page-header">
					<h2>Login Form</h2>
					<?php 
						echo $reg_suc;
						
					?>
				</div>
						
			<form class="form-horizontal" action="login.php" role="form" method="post">
		
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label ">Username</label>
				<div class="col-sm-3">
					<input type="text" id="username" class="form-control" name="username" placeholder="Type Your Address" required>
				</div>
			</div>
			
			<div class="form-group">
				<label for="password" class="col-sm-2 control-label ">Password *</label>
				<div class="col-sm-3">
					<input type="password" id="password" class="form-control" name="password" placeholder="Type Your Password" required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label "></label>
				<div class="col-sm-3">
					<input type="submit" value="Login" name="submit" id="submit" class="btn btn-block btn-danger">
				</div>				
			</div>
			
			</form>
		</div>
		</div>
<?php include('footer.php');?>
</body>
</html>
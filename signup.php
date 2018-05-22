<?php 
	require 'database-config.php';
	$_SESSION['message'] = '';

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if ($_POST['password'] == $_POST['confirmpassword']) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$_SESSION['username'] = $username;

			$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
			$result = mysqli_query($conn, $sql);
	        if($result){
	            $data["result"] = true;
	            $_SESSION["message"] =  "Registration succesful! Added $username to the database!";
	            header("location: login.php");
	            // die();
	        }else{
	            $data["result"] = false;
	            $_SESSION["message"] =  "User could not be added to the database!".mysqli_error($conn);
	        }
	    }else{
	        $data["result"] = false;
	        $_SESSION["message"] = "Password and Confirm Password not match!";
	    }
	}
?>
<?php 
include 'header.php';
?>
	<!-- breadcrumb -->  
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Sign Up</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- sign up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="images/img3.jpg" alt="">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Sign Up to your account</h3>  
			<div class="login-agileinfo"> 
				<form action="" method="post" autocomplete="off"> 
					<div class="alert alert-error"><?php $_SESSION['message'] ?></div>
					<input class="agile-ltext" type="text" name="username" placeholder="username" required>
					<input class="agile-ltext" type="password" name="password" placeholder="Password" autocomplete="new-password" required>
					<input class="agile-ltext" type="password" name="confirmpassword" placeholder="Confirm Password" autocomplete="new-password" required="">
					<div class="wthreelogin-text"> 
						<ul> 
							<li>
								<label class="checkbox"><input type="checkbox" name="checkbox" required><i></i> 
									<span> I agree to the terms of service</span> 
								</label> 
							</li> 
						</ul>
						<div class="clearfix"> </div>
					</div>   
					<input type="submit" value="Register">
				</form>
				<p>Already have an account?  <a href="login.php"> Login Now!</a></p> 
			</div>	 
		</div>
	</div>
	<!-- //sign up-page -->  
<?php 
include 'footer.php';
?>
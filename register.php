<?php 
  require 'database-config.php';

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
              header("location: loginadm.php");
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
<!DOCTYPE html>
<html lang="en">

<?php   session_start();  ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter username" name="username">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Confirm Password" name="confirmpassword">
          </div>
          <input class="btn btn-primary btn-block" type="submit" value="Register">
        </form>
        <p>Already have an account?  <a href="loginadm.php"> Login Now!</a></p> 
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>
<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from users where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['jsmsuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
  
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Jewellery Shop Management System || Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	
</head>
<body>

	<?php include_once('includes/header.php');?>

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Login</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					<div class="cart-table">
                                   <h3>Login To User Panel</h3>
                                   <form action="#" method="post">
                                   	<label> Registered Email or Contact Number</label>
                                          
                                          <input type="text" name="emailcont" required="true" placeholder="Registered Email or Contact Number" required="true" class="form-control">
                                        <br>
                                          	<label> Password</label>
                                          <input type="password" name="password" placeholder="Enter password" required="true" class="form-control">
                                         <div class="d-flex justify-content-between flex-wrap m-tb-20">
                                                           
                                                            <a class="link--gray" style="color: blue;" href="forgot-password.php">Forgot Password?</a>
                                                        </div>
                                   <br>
                                          <button class="btn btn-primary" type="submit" name="login">LOGIN</button>
                                          <br>
                                          <br><a href="signup.php" class="btn btn-primary">Sign Up(Register Yourself)</a>
                                   </form>
                            </div>
				</div>
			</div>
			<!-- / content -->
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

<?php include_once('includes/footer.php');?>


	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

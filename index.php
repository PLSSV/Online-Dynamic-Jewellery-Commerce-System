<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
	$pid = $_POST['pid'];
	$userid = $_SESSION['jsmsuid'];
	$query = mysqli_query($con, "insert into orders(UserId,PId) values('$userid','$pid') ");
	if ($query) {
		echo "<script>alert('Jewellery has been added in to the cart');</script>";
		echo "<script type='text/javascript'> document.location ='cart.php'; </script>";
	} else {
		echo "<script>alert('Something went wrong.');</script>";
	}
}

if (isset($_POST['wsubmit'])) {
	$wpid = $_POST['wpid'];
	$userid = $_SESSION['jsmsuid'];
	$query = mysqli_query($con, "insert into wishlist(UserId,ProductId) values('$userid','$wpid') ");
	if ($query) {
		echo "<script>alert('Jewellery has been added to the wishlist');</script>";
		echo "<script type='text/javascript'> document.location ='wishlist.php'; </script>";
	} else {
		echo "<script>alert('Something went wrong.');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title> Online Dynamic Jewellery Commerce System || Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>

	<?php include_once('includes/header.php'); ?>

	<div id="slider">
		<ul>
			<li style="background-image: url(images/01.jpg)">
				<h3>Make your life better</h3>
				<h2>Necklace</h2>
			</li>
			<li class="purple" style="background-image: url(images/02.jpg)">
				<h3>She will say “yes”</h3>
				<h2>engagement ring</h2>
			</li>
			<li class="yellow" style="background-image: url(images/03.png)">
				<h3>You deserve to be beauty</h3>
				<h2>silver bracelets</h2>
			</li>
		</ul>
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div class="last-products">
				<h2>Last added products</h2>
				<section class="products">

					<?php


					$ret = mysqli_query($con, "select * from products  order by  id desc limit 10");
					$cnt = 1;
					while ($row = mysqli_fetch_array($ret)) {

					?>
						<article>
							<a href="#"><img src="admin/productimages/<?php echo $row['productImage1']; ?>" width="250" height="60%" alt=""></a>
							<h3><?php echo $row['productName']; ?></h3>
							<h4><?php echo $row['productPrice']; ?></h4>
							<?php if ($_SESSION['jsmsuid'] == "") { ?>
								<a href="#" class="btn-add">Add to cart</a>
							<?php } else { ?>
								<form method="post">
									<input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
									<button type="submit" name="submit" class="btn-grey">Add to Cart</button>
								</form>
							<?php } ?>
						</article>

						<!-- <article> 
							<a href="single-product.php?pid=<?php echo $row['id']; ?>"><img src="admin/productimages/<?php echo $row['productImage1']; ?>" width="250" height="60%" alt=""></a>
							<h3><?php echo $row['productName']; ?></h3>
							<h4><?php echo $row['productPrice']; ?></h4>
							<?php if ($_SESSION['jsmsuid'] == "") { ?>
								<a href="login.php" class="btn-add">Add to cart</a>
							<?php } else { ?>
								<form method="post">
									<input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
									<button type="submit" name="submit" class="btn-grey">Add to Cart</button>
								</form>
							<?php } ?>
						</article>-->
					<?php } ?>

				</section>
			</div>

			<!--Categories -->
			<!-- <section class="quick-links">
			<div class="last-products">
				<h2>Jewellery Categories</h2>

<?php
$ret = mysqli_query($con, "select * from category");
$cnt = 1;
while ($row = mysqli_fetch_array($ret)) {

?>
				<article style="background-image: url(images/2.jpg); width: 360px !important; margin-top:1%;">
					<a href="subcategory.php?scid=<?php echo $row['id']; ?>&&catname=<?php echo $row['categoryName']; ?>" class="table">
						<div class="cell">
							<div class="text">
								<h4><?php echo $row['categoryName']; ?></h4>
								<hr>
								<h3><?php echo $row['categoryDescription']; ?></h3>
							</div>
						</div>
					</a>
				</article><?php } ?>
			</section>
		</div>
		</div>
		<!-- / container -->
		</div> -->
		<!-- / body -->

		<?php include_once('includes/footer.php'); ?>


		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script>
			window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")
		</script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>
</body>

</html>
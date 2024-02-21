<header id="header">
    <div class="container">
        <div class="right-links">
            <ul>
                <?php if (strlen($_SESSION['jsmsuid'] > 0)) {

                    $userid = $_SESSION['jsmsuid'];
                    $ret2 = mysqli_query($con, "select sum(products.shippingCharge+products.productPrice) as total,COUNT(orders.PId) as totalp from orders join products on products.id=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
                    $resultss = mysqli_fetch_array($ret2);

                ?>
                    <li><a href="cart.php"><span class="ico-products"></span><?php echo $resultss['totalp']; ?> Cart</a></li>
                    <li><a href="wishlist.php"><span class="ico-heart"></span>Wishlist</a></li>
                    <li><a href="profile.php"><span class="ico-account"></span>My Profile</a></li>
                    <li><a href="my-orders.php"><span class="ico-cart"></span>My Orders</a></li>
                    <li><a href="change-password.php"><span class="ico-signout"></span>Setting</a></li>
                    <li><a href="logout.php"><span class="ico-signout"></span>Sign out</a></li><?php } ?>
            </ul>
        </div>
        <center>
            <h1>
                Online Dynamic Jewellery Commerce System
            </h1>
        </center>
    </div>
    <!-- / container -->
</header>
<!-- / header -->

<nav id="menu">
    <div class="container">
        <div class="trigger"></div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Contact Us</a></li>
            <?php if (strlen($_SESSION['jsmsuid'] == 0)) { ?>
                <li><a href="#">Register</a></li>
                <li><a href="login.php">Login</a></li><?php } ?>
            <!-- <li><a href="products.php">Products</a></li> 
            <li><a href="category.php">Category</a></li> 


            <li><a href="contact.php">Contact Us</a></li>-->
            <!-- <?php if (strlen($_SESSION['jsmsuid'] == 0)) { ?>  -->
            <!-- <li><a href="signup.php">Register</a></li> -->
            <!-- <li><a href="login.php">Login</a></li><?php } ?> -->
        </ul>
    </div>
    <!-- / container -->
</nav>
<!-- / navigation -->
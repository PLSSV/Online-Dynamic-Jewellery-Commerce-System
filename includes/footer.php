<?php
if(isset($_POST['sub']))
  {
   
    $email=$_POST['email'];
 
     
    $query=mysqli_query($con, "insert into tblsubscriber(Email) value('$email')");
    if ($query) {
   echo "<script>alert('Your subscribe successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<footer id="footer">
              <div class="container">
                     <div class="cols">
                            <div class="col">
                                   <h3>Shorts Links</h3>
                                   <ul>
                                          <li><a href="index.php">Home </a></li>
                                          <li><a href="#">Category</a></li>
                                          <li><a href="#">Contact Us</a></li>
                                          <li><a href="about.php">About Us</a></li>
                                          <li><a href="admin/index.php">Admin </a></li>

                                          <!-- <li><a href="category.php">Category</a></li> 
                                          <li><a href="contact.php">Contact Us</a></li>
                                          <li><a href="about.php">About Us</a></li>-->
                                   </ul>
                            </div>
                            <!-- <div class="col media">
                                   <h3>Social media</h3>
                                   <ul class="social">
                                          <li><a href="#"><span class="ico ico-fb"></span>Facebook</a></li>
                                          <li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
                                          <li><a href="#"><span class="ico ico-gp"></span>Google+</a></li>
                                          <li><a href="#"><span class="ico ico-pi"></span>Pinterest</a></li>
                                   </ul>
                            </div>-->
                            <div class="col contact">
                                   <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                   <h3><?php  echo $row['PageTitle'];?></h3>
                                   <p style="color: white"><?php  echo $row['PageDescription'];?></p>
                                   <p><span class="ico ico-em"></span><?php  echo $row['Email'];?></p>
                                   <p><span class="ico ico-ph"></span><?php  echo $row['MobileNumber'];?></p><?php } ?>
                            </div>
                            <div class="col newsletter">

                                   <h3>Join our newsletter</h3>
                                   <p>Subscribe now and get jewellery offer every week in your inbox.</p>
                                   <form action="#" method="post">
                                         <input type="email" name="email" placeholder="Your email address">
                                          <button type="submit" name="sub"></button>
                                   </form>
                            </div>
                     </div>
                     <p class="copy">Online Dynamic Jewellery Commerce System</p>
              </div>
              <!-- / container -->
       </footer>
       <!-- / footer -->
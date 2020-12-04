<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("nav.php");
check_login();
if(isset($_POST['Update_Profile']))
{
	$id=$_GET['uid'];
	$stdNum=$_POST['stdNum'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cellno=$_POST['contact'];
$date= $_POST['date'];
	if(preg_match( "/^(\+27|0)[6-8][0-9]{8}$/", $cellno ))
	{
	    	mysqli_query($con,"UPDATE patient SET id='$id', email='$email', cellno='$cellno', posting_date ='$date' where id='".$_GET['uid']."'");
$_SESSION['msg']="Profile Updated successfully";
	header("location:update-profile.php");
	echo "<script>alert('SUCCESSFULLY UPDATED');</script>";
	}else{
	    echo "<script>alert('INCORRECT NUMBER FORMAT');</script>";
	}

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Update Profile</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>

  
      <?php $ret=mysqli_query($con,"select * from patient WHERE id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
            <div class="container">
              <div class="col-md-8"> 
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?>'s Information</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" readonly>
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Ename</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="SName" value="<?php echo $row['surname'];?>"readonly >
                              </div>
                          </div>
                          
						  
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                              <div class="col-sm-10">
                                  <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>"  >
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">CellPhone No. </label>
                              <div class="col-sm-10">
                                  <input type="tell" class="form-control" name="contact" pattern = "(\+27|0)[6-8][0-9]{8}" title="Must be a south African Number starting with a zero(0)" value="<?php echo $row['cellno'];?>" minlenght="10" maxlength="10" >
                              </div>
                          </div>
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Registration Date </label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" name="date" value="<?php echo $row['posting_date'];?>" readonly >
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">ID Number</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="stdNum" value="<?php echo $row['id'];?>"  readonly>
                              </div>
                          </div>
						  
						 <!-- <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Password</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>" readonly >
                              </div>
                          </div>-->
						  
						  
						  
						  
						  
                          <div style="margin-left:100px;">
                          <input type="submit" name="Update_Profile" value="Update Profile" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
              </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

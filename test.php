<?php
session_start();

include("checklogin.php");
check_login();
require_once('dbconnection.php');
include("nav.php")
?>
    </div>
    <div id="structure-div">
        <div class="container">
            <h1>COVID-19 TESTING RESERVATION</h1>
            <p>It is adviced that before making any testing booking to do the screening first.&nbsp;<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam rhoncus nunc neque, quis euismod est condimentum at. Suspendisse mollis nulla non metus suscipit, sit amet ornare odio ultrices. Suspendisse
                quis libero tortor. In cursus eget eros eget vestibulum. Morbi tempus nisi nec mollis aliquam. Integer id tortor quis magna maximus tincidunt. Fusce nec mi nec diam viverra varius non ut velit. Donec eros lectus, egestas vel magna in,
                porttitor vestibulum neque.<br></p>
            <hr>
            <div id="book-div">
                <h1>TESTING RESERVATION</h1>
                <form id="book-form" METHOD="POST">
					
					
					   <div class="form-group" method="POST">
                        <label>Date & Time</label>
							</br>
							<input style="color: aliceblue; background: green;" type="date" value="data"  name="date" required>
							
							<input style="color: aliceblue; background: green;" type="time"  name="time" min="08:00" max="16:00" required>
                    
					</div>
                    <input type="submit" class="btn btn-primary submit-btn" value="Book A Session" name="book">
                </form>
				
				<?php
					
					if(isset($_POST['book']))
					{
						
						
							$email=$_SESSION['login'];
							$name=$_SESSION['name'];
							$surname= $_SESSION['surname'];
							$id=$_SESSION['id'];
							$gender =$_SESSION['gender'];
							$address= $_SESSION['address'];
							$cellno=$_SESSION['cell'];
							$a=$_POST['date'];
							$time=$_POST['time'];
							
							$time = substr($time,0,2);
							
							$checkDate = "SELECT * FROM booking WHERE time = '$time' AND bookingDate='$a'";
							$query  = mysqli_query($con,$checkDate);
							$rowNum = mysqli_num_rows($query);
							$today=date('Y-m-d');
							
							if($a<$today)
							{
								echo "<script>alert('booking can not be made for dates that have passed');</script>";
							}else{
								
								if($rowNum<2)
								{
									$msg=mysqli_query($con,"insert into booking(id, name, surname, email,address, cellno,gender, bookingDate, time) values('$id', '$name', '$surname', '$email','$address', '$cellno', '$gender','$a','$time')");
														
														if($msg)
														{
															echo "<script>alert('booking made Successfully');</script>";
															echo'<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Session Successfully Booked for -</strong></span><span>'.$time.':00</span></div>';
															echo'<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">';
														}
														else
														{
															echo "<script>alert('Booking was not successful');</script>";
														}
								}else{
									echo "<script>alert('Please try boooking another time slot: ".$time." Oclock  for this date".$a." is full');</script>";
								}
							
							}
								
						
					}
					
					
				?>
				
				
				
				
				
                
                
        </div>
    </div>
    <footer>
        <div id="footer-content"><span>©</span><span class="current-year">Year</span><span>TUT</span></div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
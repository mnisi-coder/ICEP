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
            <h1>COVID-19 SCREENING</h1>
            <p>Daily screening process&nbsp;<br>Once the screening process has began it is advice able to finish it in order to get your results.<br></p>
            <hr>
            <div id="book-div">
                <h1 style="text-align:center">Begin Your Screening test</h1>
                <form id="book-form" method="post">
					
					<!--<div class="form-input">
						<label>Fever
							<select class="form-control">
								<option value="no">NO</option>
								<option value="yes">YES</option>
								</select></label>
					</div>-->
					
					
                    <div class="form-input">
						<label><b>Fever</b></label><BR>
					  <input type="radio" id="yes" name="q1" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q1" value="no">
					  <label for="no">NO</label><br>
					  </div>
					
					Fever
					Cough Shortness of Breath
                    
                    
					<div class="form-input">
						<label><b>Cough</b></label><BR>
					  <input type="radio" id="yes" name="q5" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q5" value="no">
					  <label for="no">NO</label><br>
					  </div>
						
					<div class="form-input">
						<label><b>Shortness of Breath</b></label><BR>
					  <input type="radio" id="yes" name="q2" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q2" value="no">
					  <label for="no">NO</label><br>
					  </div>	
					
					<div class="form-input">
						<label><b>Sore Throat</b></label><BR>
					  <input type="radio" id="yes" name="q3" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q3" value="no">
					  <label for="no">NO</label><br>
					  </div>
					  
					  <div class="form-input">
						<label><b>Loss of sense of smell</b></label><BR>
					  <input type="radio" id="yes" name="q4" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q4" value="no">
					  <label for="no">NO</label><br>
					  </div>
					  
					  
					  
					  <div class="form-input">
						<label><b>Changes in sense of taste</b></label><BR>
					  <input type="radio" id="yes" name="q6" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q6" value="no">
					  <label for="no">NO</label><br>
					  </div>
					  
					  <div class="form-input">
						<label><b>In the past 2 weeks, have you been told that you have COVID-19?</b></label><BR>
					  <input type="radio" id="yes" name="q7" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q7" value="no">
					  <label for="no">NO</label><br>
					  </div>
					  
					  <div class="form-input">
						<label><b>Are you waiting for a COVID-19 test result?</b></label><BR>
					  <input type="radio" id="yes" name="q8" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q8" value="no">
					  <label for="no">NO</label><br>
					  </div>
					  
					  <div class="form-input"><label><b>COMMENT </b><br><input class="form-control"  name="comment" type="text" required></label></div>
					  
					  <!--<div class="form-input">
						<label>Shortness of Breath</label><BR>
					  <input type="radio" id="yes" name="q1" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q1" value="no">
					  <label for="no">NO</label><br>
					  </div>
					  
					  <div class="form-input">
						<label>Shortness of Breath</label><BR>
					  <input type="radio" id="yes" name="q1" value="yes">
					  <label for="yes">YES</label><br>
					  <input type="radio" id="no" name="q1" value="no">
					  <label for="no">NO</label><br>
					  </div>-->






					
                    

					<input type="submit" class="btn btn-primary submit-btn" value="Submit Test" name="test">
                </form>
				
				
				<?php
				if(isset($_POST['q1']) && isset($_POST['q2']) && isset($_POST['q3']) & isset($_POST['q4']) && isset($_POST['q5']) && isset($_POST['q6']) && isset($_POST['q7']) && isset($_POST['q8']) )
				{
					if($_POST['q1']=='yes' || $_POST['q2']=='yes' ||$_POST['q3']=='yes' ||$_POST['q4']=='yes' ||$_POST['q5']=='yes' ||$_POST['q6']=='yes' ||$_POST['q7']=='yes' ||$_POST['q8']=='yes')
					{
						 echo '<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>You need to quarantine, and also book a testing session&nbsp;</strong></span><span><a class="alert-link" href="test.php">Book here</a></span></div>';
								
							$email=$_SESSION['login'];
							$name=$_SESSION['name'];
							$surname= $_SESSION['surname'];
							$id=$_SESSION['id'];
							$gender =$_SESSION['gender'];
							$address= $_SESSION['address'];
							$cellno=$_SESSION['cell'];
							
							$q1=$_POST['q1'];
							$q5=$_POST['q5'];
							$q2=$_POST['q2'];
							$q3=$_POST['q3'];
							$q4=$_POST['q4'];
							$q6=$_POST['q6'];
							$q7=$_POST['q7'];
							$q8=$_POST['q8'];
							$comment =$_POST['comment'];
							
							$a=date('Y-m-d');
							$msg=mysqli_query($con,"insert into screening(screenID, id, bookingDate, q1, q2, q3, q4, q5, q6, q7, q8, comment) values('','$id','$a','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$comment')");
														
														if($msg)
														{
															echo "<script>alert('Done screeing, check end of the page for more info');</script>";
															
														}
							
							$email_address = 'j.mnisi.c.jm@gmail.com';
								$to = '$email '; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Screening Results for:  $surname";
                            	$email_body = "These are your covid-19 screening Results with questions and answers.\n\n"."Fever : $q1\n\nCough:$q5\n\nShortness of Breath:$q2\n\n Sore Throat:$q3\n\n Loss of sense of smell:$q4\n\n Changes in sense of taste:$q5\n\n In the past 2 weeks, have you been told that you have COVID-19?:$q6\n\n Are you waiting for a COVID-19 test result?:$q7\n\n COMMENT:$comment";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
					}else
					{
						echo '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><span><strong>Your are in the safe zone for todat do not forget to come againn tomorrow and do another test -</strong></span><span> Thank you</span></div>';
					
							$email=$_SESSION['login'];
							$name=$_SESSION['name'];
							$surname= $_SESSION['surname'];
							$id=$_SESSION['id'];
							$gender =$_SESSION['gender'];
							$address= $_SESSION['address'];
							$cellno=$_SESSION['cell'];
							
							$q1=$_POST['q1'];
							$q5=$_POST['q5'];
							$q2=$_POST['q2'];
							$q3=$_POST['q3'];
							$q4=$_POST['q4'];
							$q6=$_POST['q6'];
							$q7=$_POST['q7'];
							$q8=$_POST['q8'];
							$comment =$_POST['comment'];
							$a=date('Y-m-d');
							$msg=mysqli_query($con,"insert into screening(screenID, id, bookingDate, q1, q2, q3, q4, q5, q6, q7, q8, comment) values('','$id','$a','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$comment')");
														
														if($msg)
														{
															echo "<script>alert('Done screeing, check end of the page for more info');</script>";
														}
							
							$email_address = 'j.mnisi.c.jm@gmail.com';
								$to = '$email'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                            	$email_subject = "Screening Results for:  $surname";
                            	$email_body = "These are your covid-19 screening Results with questions and answers.\n\n"."Fever : $q1\n\nCough:$q5\n\nShortness of Breath:$q2\n\n Sore Throat:$q3\n\n Loss of sense of smell:$q4\n\n Changes in sense of taste:$q5\n\n In the past 2 weeks, have you been told that you have COVID-19?:$q6\n\n Are you waiting for a COVID-19 test result?:$q7\n\n COMMENT:$comment";
                            	$headers = "From: j.mnisi.c.jm@gmail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                            	$headers .= "Reply-To: $email_address";   
                            	mail($to,$email_subject,$email_body,$headers);
					}
					
				}
				
				
				?>
                
               
            </div>
        </div>
    </div>
    <footer>
        <div id="footer-content"><span>©</span><span class="current-year">Year</span><span>TUT</span></div>
    </footer>
    
    <script
        src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/script.js"></script>
</body>

</html>
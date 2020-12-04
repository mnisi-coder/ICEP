<?php
session_start();

require_once('dbconnection.php');
include("nav.php")
?>
    </div>
    <div id="login-div">
        <div id="forms">
            <form id="sign-in"  method="POST">
                <h1>Sign In</h1>
				<input class="form-control" type="text" id="username" name="username" placeholder="ID Number">
				<input class="form-control" type="password" id="pwd" name="pwd" placeholder="Password">
				
				<input class="btn btn-primary" type="submit" name="signin" value="Sign In">
					
					
                <p id="forgot"><a href="#">Forgot Password?</a></p>
                <p class="message">Not registered<a href="#">Sign Up</a></p>
            </form>
			<?php
			
			if(isset($_POST["signin"]))
			{
				$username = $_POST["username"];
				$pwd = $_POST["pwd"];	
				$dec_password=md5($pwd);
							
				$ret= mysqli_query($con,"SELECT * FROM patient WHERE id='$username' and password='$dec_password'");
				$num=mysqli_fetch_array($ret);
			

				if($num>0)
				{
					$ret1= mysqli_query($con,"SELECT * FROM patient WHERE email='$username' OR id=$username and password='$dec_password'");
					$line=mysqli_fetch_array($ret1);
					
					echo "<script>alert('Logged inn successfully');</script>";
					
					$_SESSION['login']=$line['email'];
					$_SESSION['name']=$line['name'];
					$_SESSION['surname']=$line['surname'];
					$_SESSION['id']=$line['id'];
					$_SESSION['gender']=$line['gender'];
					$_SESSION['cell']=$line['cellno'];
					$_SESSION['address']=$line['address'];

								echo '<script language="javascript">
                                                    document.location="index.php";
                                                </script>';
								exit();
				}
				else
				{
					echo "<script>alert('Invalid username or password');</script>";
					
					echo '<span id="err">Incorrect details</span>';
					$extra="index.php";
					$host  = $_SERVER['HTTP_HOST'];
					$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
							//header("location:http://$host$uri/$extra");
							//header("location:$extra");
							//echo "<a href='index.php'></a>";
					exit();
				}

				
				
			}
			
			
			?>
			
			
            <form id="sign-up"  method="POST">
                <h1>Sign Up</h1>
				<input class="form-control" type="text" name="name" placeholder="Name" required>
				<input class="form-control" type="text" name="surname" placeholder="Surname" required>
				<input class="form-control" type="text" name="id" placeholder="ID Number" required>
				
							<select class="form-control" name="gender"  placeholder="Gender">
								<option value="male">MALE</option>
								<option value="female">FEMALE</option>
								<option value="other">OTHER</option>
							</select>
                <input class="form-control" type="email" name="email" placeholder="Email" required>
				<input class="form-control" type="tel" name="cell-no" placeholder="Cellphone Number"  minlenght="10" maxlength="10" required>
				<input class="form-control" type="text" name="address" placeholder="Address" required>
				<input class="form-control" type="password" name="pwd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" required>
				<input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" required>
                    
				<input class="btn btn-primary" type="submit" Value="Sign Up" name="signup" >
                        <p class="message">Already registered?<a href="#">Sign In</a></p>
            </form>
			<?php
							if(isset($_POST['signup']))
							{
							$email = $_POST['email'];
								$password =$_POST['pwd'];
								$pwdRepeat =$_POST['pwd-repeat'];
								if($pwdRepeat  == $password )
								{
								if(!filter_var($email,FILTER_VALIDATE_EMAIL))
								{
									echo "<script>alert('INCORRECT EMAIL FORMAT');</script>";
								}
								else
								{
									$name = $_POST['name'];
								$surname = $_POST['surname'];
								$id =$_POST['id'];
								
								
								$cellno =$_POST['cell-no'];
								$address =$_POST['address'];
								
								$enc_password =md5($password);
								$a=date('Y-m-d');
								$gender = $_POST['gender'];
								echo "<script>alert('first run".$id."');</script>";
								

											$msg=mysqli_query($con,"insert into patient(id, name, surname, gender, email,address, password,cellno,posting_date) values('$id', '$name', '$surname', '$gender', '$email','$address', '$enc_password','$cellno','$a')");
											
											if($msg)
											{
												echo "<script>alert('Register successfully');</script>";
												echo'<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">';
											}
											else
											{
												echo "<script>alert('Unable to register new user');</script>";
											}
		
								}
								}else{
									echo "<script>alert('Passwords are not matching');</script>";
								}
								
								


							}
					?>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
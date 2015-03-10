<!DOCTYPE html>
<html>
<head>
	
	<title> Admin Registration</title>
	<link rel="stylesheet" type="text/css" href="style/new.css" />
	
</head>
<body id="body">

<div id ="top">
	<div id="logo">
		<img src="images/logo2.png" width="200px" height="150px" />
	</div>
	<div id="header_text">
		<div id="header_text_main">
			</br>
			</br>
			<h2> Student Performance Prediction </h2>
		</div>
		<div id="header_text_about">
			<font color="orange">
				<h5>  About  <h5>
				<h6> Student Performance Prediction </h6>
			</font>
			<h6>Predicts student performance based on their demographic data and their learning behaviors.</h6> 

		</div>
	</div>
</div>

<div id = "middle">
	
	<div class="menu">

		<div class="menu_item">
			<a href="administrator_register.php" style="text-decoration: none"> <b> Administrator Account </b> </a>
		</div>

		<div class="menu_item">
			<a href="instructor_register.php" style="text-decoration: none"> <b> Instructor Account </b> </a>
		</div>

		<div class="menu_item">
			<a href="student_register.php" style="text-decoration: none"> <b> Student Account </b> </a>
		</div>

	</div>
	<div class="content">
		<div id = "left_section">
		</div>
		<div id = "middle_section">
			<h3> Create an Account </h3>
			<form action = 'administrator_register.php?action=administrator_register' method= 'POST' name="s">
			<table>
				<tr>
					<td>
						Surname:
					</td>
					<td>
						<input type='text' name='surname'>
					</td>
				</tr>
				<tr>
					<td>
						First Name:
					</td>
					<td>
						<input type='text' name='firstname'>
					</td>
				</tr>
				<tr>
					<td>
						Staff Id:
					</td>
					<td>
						<input type='text' name='staff_id'>
					</td>
				</tr>
				<tr>
					<td>
						Email:
					</td>
					<td>
						<input type='text' name='email'>
					</td>
				</tr>
				<tr>
					<td>
						Password:
					</td>
					<td>
						<input type='password' name='password'>
					</td>
				</tr>
				<tr>
					<td>
						Confirm Password:
					</td>
					<td>
						<input type='password' name='confirmpassword'>
					</td>
				</tr>
			</table>
			<p>
			<input class="submit" type='submit' name='submit' value="Register">
			<p>
			Already have an account? Click <a href="administrator_login.php"> here </a> to sign in.
			</form>

		<?php

		//login to your db        if(isset($_POST['name'])){ $name = $_POST['name']; } 
		include_once("connector2.php");
		if (isset($_POST['surname'])){$surname = strip_tags($_POST['surname']);} 
		if (isset($_POST['firstname'])){$firstname = strip_tags($_POST['firstname']);} 
		if (isset($_POST['staff_id'])){$staff_id = strip_tags($_POST['staff_id']);} 
		if (isset($_POST['email'])){$email = strip_tags($_POST['email']);} 
		if (isset($_POST['password'])){$password = strip_tags($_POST['password']);} 
		if (isset($_POST['confirmpassword'])){$confirmpassword = strip_tags($_POST['confirmpassword']);} 
		if (isset($_POST['submit'])){$submit = $_POST['submit'];} 

		error_reporting(E_ALL ^ E_NOTICE);
		if ($submit)
		 	{

		        if ($surname && $firstname && $staff_id && $email && $password && $confirmpassword)
		        {
			 		

			 		//check if someone is already registered using that email
			 		@$dupe1 = mysql_num_rows(mysql_query("select * from users where email='$email'"));

			        if ($dupe1 > 0)
			        {
				        echo "Someone is already registered using that email.";
				        
				 		
			 		}
			 		else
			 		{
			 			//check if passwords are the same  
				        if ($password == $confirmpassword)
				        {
				        	//check password length
				        
				        	if (strlen($password)<26 && strlen($password)>5)
								{
									//encrypt password
									$password = md5($password);
									$confirmpassword = md5($confirmpassword);
									mysql_query("insert into administrators (surname, firstname, staff_id, email, password) values('$surname','$firstname','$staffid','$email','$password')");
									header("Location: administrator_login.php");
									//echo "You are now registered. <a href=\"administrator_login.php\"> Login. </a>";
									
								}
							else
								{
									echo "Password must be between 6 and 25 characters";

								}
						}
				        else
				        {
							echo "The passwords do not match.";
				        }
							
						  

				    	
				        
					
		    		}
		    	}

		    	else {

		    		echo "You must fill out all fields.";
		    	}
		    }
		 		
		


		?>
		</div>
		<div id = "right_section">
		</div>
	</div>

</div>
<div id = "bottom">

	<div id="bottom_links">

		<div id="bottom_links1">
			<h5> 
				<a href="about.html" style="text-decoration: none"> About </a> <br />
				Click here to learn <br /> more about student <br /> performance prediction.
			</h5>
		</div>
		<div id="bottom_links1">
			<h5>
				<a href="help.html" style="text-decoration: none"> Help </a> <br />
				Click here to get <br /> help if you are <br /> experiencing any problems
			</h5>
		</div>
		<div id="bottom_links1">
			
		</div>
	</div>

	<div id="copyright">
		<h5> Copyright &copy 2014 by Esther Kihiu. All rights reserved. </h5>
	</div>
	
</div>


</body>
</html>



<!DOCTYPE html>
<html>
<head>
	<title>Student Homepage</title>
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
                <h5><a href="logout.php?p=student_login.php">Logout</a><h5>
				<h5>  About  <h5>
				<h6> Student Performance Prediction </h6>
			</font>
			<h6>Predicts student performance based on their demographic data and their learning behaviors.</h6> 

		</div>
	</div>
</div>

<div id = "middle">

	<div class="homepage_links">

		<div class="homepage_link_1">
		<a href="student_homepage.php" style="text-decoration: none"> HOMEPAGE </a>
		</div>

		<div class="homepage_link_1">

		<a href="student_dashboard.php" style="text-decoration: none"> DASHBOARD </a>

		</div>

	</div>

	<div class="main_content">
		<div id = "left_section">
		</div>
		<div id = "middle_section">
		<br/> <br/> <h3> Welcome. Below are your performance prediction results </h3> <br/>
			<table border="1" width="300" height="170" align="center" class="results_table">
				<tr>
					<th>
						Grade
					</th>
					<th>
						Probability
					</th>
				</tr>
			<?php 
				include("connector.php");
				@session_start();
				$reg_no = $_SESSION['regno'];
				$query = mysql_query("SELECT * FROM student_data WHERE userid_DI='".$reg_no."' ");
				while($data = mysql_fetch_array($query))
				{
					$prob_pass = $data['prob_pass'];
					$prob_fail = $data['prob_fail'];
					$risk_level = $data['risk_level'];
					echo "<tr><td>Pass</td><td>$prob_pass</td></tr>";
					echo "<tr><td>Fail</td><td>$prob_fail</td></tr>";
					//echo "<tr> <td>Risk Level</td><td>$risk_level</td></tr>";
				}

			?>
			</table>
			<br/>
			<table border="1" width="300" height="40" class="results_table" align="center">
				<tr>
				
			<?php 
				include("connector.php");
				@session_start();
				$reg_no = $_SESSION['regno'];
				$query = mysql_query("SELECT * FROM student_data WHERE userid_DI='".$reg_no."' ");
				while($data = mysql_fetch_array($query))
				{
					
					$risk_level = $data['risk_level'];
					
					echo "<tr> <td>Risk Level</td><td>$risk_level</td></tr>";
				}

			?>
			</table>

			
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
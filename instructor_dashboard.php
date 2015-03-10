<!DOCTYPE html>
<html>
<head>
	<title>Instructor Dashboard</title>
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
                <h5><a href="logout.php?p=instructor_login.php">Logout</a><h5>
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
		<a href="instructor_homepage.php" style="text-decoration: none"> HOMEPAGE </a>
		</div>

		<div class="homepage_link_1">

		<a href="instructor_dashboard.php" style="text-decoration: none"> DASHBOARD </a>

		</div>

	</div>

	<div class="main_content">
		<div id = "left_section">
		</div>
		<div id = "middle_section">
		<?php
			include("connector.php");
			$query1 = mysql_query("SELECT * FROM student_data");
			$count1 = mysql_num_rows($query1);

			$records =10;
			$prev = 0;

			$pages = ceil($count1/$records);
			$paging = 1;
			if(@$_GET['paging'] <= 0)
			{
				$paging = $rec= 1;
			}
			else
			{		
				$paging = $rec= $_GET['paging'];
				$prev = ceil($paging/$records);
			}
		?>
			<form action="" method="get" >
				<select name="paging">
				<?php 
				$page_id = 1;
				for($i=1; $i<=$pages; $i++)
				{
					if($i == $paging)
					{
						if($prev == 0)
						{
							$prev = 1;
						}
						echo "<option value=$prev selected=selected >Page $prev</option>";
					}
					else
					{
						echo "<option value=$page_id >Page $i</option>";
					}
					$page_id+=$records;
				}
			?>
			</select>
			<input type="submit" value="View Page" />
			</form>

			<table border="1" class="results_table">
				<tr>
					<th></th>
					<th>Reg Number</th>
					<th>Probability Pass</th>
					<th>Probability Fail</th>
					<th>Risk Level</th>
				</tr>
			<?php 
				@session_start();
				$level = $_SESSION['level'];
				if($level != 2)
				{
					exit();
				}

				$query = mysql_query("SELECT * FROM student_data WHERE id>='".$paging."' LIMIT $records ");
				$count = 1;
				while($data = mysql_fetch_array($query))
				{
					$prob_pass = $data['prob_pass'];
					$prob_fail = $data['prob_fail'];
					$user_ID = $data['userid_DI'];
					$risk_level = $data['risk_level'];
					echo "<tr><td>$rec</td><td>$user_ID</td><td>$prob_pass</td><td>$prob_fail</td><td>$risk_level</td></tr>";
					$rec++;
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
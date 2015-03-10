<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/new.css" />
        <title></title>
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
            <h1> Student Performance Prediction </h1>
            
        </div>
       <div id="header_text_about">
           
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
	<div id = "middle_data">
		<div id = "left_section">
		</div>
		<div id = "middle_section">

			<?php

				mysql_connect("localhost", "root", "") or die("Couldn't connect!");
				mysql_select_db("dataset") or die("Couldn't find db");

				$query1 = mysql_query("SELECT * FROM data");
				$count1 = mysql_num_rows($query1);

				$records =20;

				$pages = ceil($count1/$records);
			?>
			<form action="" method="get" >
			<select name="paging">
			<?php 
				$page_id = 1;
				for($i=1; $i<=$pages; $i++)
				{
					echo "<option value=$page_id >Page $i</option>";
					$page_id+=$records;
				}
			?>
			</select>
			<input type="submit" value="View Page" />
			</form>

			<?php
				if(@$_GET['paging'] <= 0)
				{
					$paging = $rec= 1;
				}
				else
				{		
					$paging = $rec= $_GET['paging'];
				}

				$query = mysql_query("SELECT * FROM data WHERE id>='".$paging."' LIMIT $records");
				echo "<table border='1px' >
						<tr>
							<th></th>
							<th>Course id</th>
							<th>User Id</th>
							<th>Viewed</th>
							<th>Explored</th>
							<th>Education</th>
							<th>No of Chapters</th>
							<th>Days</th>
							<th>Events</th>


						</tr>";

				while($data = mysql_fetch_array($query))
				{
					$course_id = $data['course_id'];
					$userid_DI = $data['userid_DI'];
					$viewed = $data['viewed'];
					$explored = $data['explored'];
					$LoE_DI = $data['LoE_DI'];
					$nchapters = $data['nchapters'];
					$ndays_act = $data['ndays_act'];
					$nevents = $data['nevents'];

					echo "<tr>
							<td>$rec</td>
							<td>$course_id</td>
							<td>$userid_DI</td>
							<td>$viewed</td>
							<td>$explored</td>
							<td>$LoE_DI</td>
							<td>$nchapters</td>
							<td>$ndays_act</td>
							<td>$nevents</td>

						";
					$rec++;
				} 
			?>
		</table>

	</div>
	<div id = "right_section">
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
<?php
	@session_start();
    @$level = $_SESSION['level'];
?>
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
                <h5><a href="logout.php?p=administrator_login.php">Logout</a><h5>
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
		<a href="administrator_homepage.php" style="text-decoration: none"> HOMEPAGE </a>
		</div>

		<div class="homepage_link_1">

		<a href="administrator_view_results.php" style="text-decoration: none"> VIEW RESULTS </a>

		</div>

		<div class="homepage_link_1">

		<a href="administrator_upload_data.php" style="text-decoration: none"> UPLOAD NEW DATA </a>

		</div>

	</div>
	<div id = "left_section">
	</div>
	<div id = "middle_section">
		

		<br/>
		<br/>

		<div id="">


	<form action="new_student_data_upload.php" method="post" enctype="multipart/form-data" target="_blank" >
		<fieldset id="sacco-uploading-002" >
			<legend><b>Upload Student Data</b></legend>
				<table>
					<tr>
						<td><label>Filename:</label></td>
					</tr>
					<tr>
						<td><input type="file" name="upload_001" id="upload_001" /></td>
					</tr>
					<tr>
						<td>
							<input type="reset" value="cancel" /><input type="submit" value="Upload  Students Data" />
						</td>
					</tr>
				</table>
		</fieldset>
	</form>
</div
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
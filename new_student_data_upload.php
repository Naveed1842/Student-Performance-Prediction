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
	<div id = "middle">
		<div id = "left_section">
		</div>
		<div id = "middle_section">
	<?php
		require("connector.php");
		$file_001		=		$_FILES['upload_001']['tmp_name'];
		$file_002		=		$_FILES['upload_001']['type'];
		$file_003		=		$_FILES['upload_001']['size'];
		//echo $file_002;
		if($file_002 != "application/vnd.ms-excel")
		{
			echo "<h4 align=\"center\" >UPLOADING ERROR :: 001-01 :: unsupported file format</h4>";
		}
		else
		{
			if($file_003 <= 2)
			{
				echo "<h4 align=\"center\" >UPLOADING ERROR :: 001-02 :: There Was No File To Upload</h4>";
			}
			else
			{
				$upload_001 ="uploads/studentsdata.csv";
				if(!copy($file_001,$upload_001))
				{
					echo "<h4 align=\"center\" >UPLOADING ERROR :: 001-02 :: Unable to Upload The File</h4>";
				}
				else
				{
					if (@($handle = fopen("uploads/studentsdata.csv", "r")) !== FALSE)
					{
						error_reporting(E_ALL ^ E_NOTICE);
						
						$insert_001	=	1;
						while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
						{
							if($insert_001 == 10)
							{
								//break;
							}
							$a=0; $b=1; $c=2;$d=3; $e=4; $f=5; $g=6; $h=7; $i=8; $j=9; $k=10; $l=11; $m=12; $n=13; $o=14; $p=15; $q=16; $r=17; $s=18; $t=19;
							
							$userid_DI  = addslashes($data[$a]);
							$registered	= addslashes($data[$b]);
							$viewed	    = addslashes($data[$c]);
							$explored	= addslashes($data[$d]);
							$certified	= addslashes($data[$e]);
							$final_cc_cname_DI	= addslashes($data[$f]);
							$LoE_DI	    = addslashes($data[$g]);
							$YoB	= addslashes($data[$h]);
							$gender	= addslashes($data[$i]);
							//$grade	= addslashes($data[$j]);
							$start_time_DI	= addslashes(date("Y-m-d", strtotime($data[$k])));
							$last_event_DI	= addslashes(date("Y-m-d", strtotime($data[$l])));
							$nevents	= addslashes($data[$m]);
							$ndays_act	= addslashes($data[$n]);
							$nplay_video	    = addslashes($data[$o]);
							$nchapters	= addslashes($data[$p]);
							$nforum_posts	= addslashes($data[$q]);
							$roles	= addslashes($data[$r]);
							$incomplete_flag	    = addslashes($data[$s]);
							$course_id  = addslashes($data[$t]);
							//echo $course_id." ".$userid_DI;
							mysql_query("INSERT INTO student_data(course_id,userid_DI,registered,viewed,explored,certified,final_cc_cname_DI,LoE_DI,YoB,gender,start_time_DI,last_event_DI,nevents,ndays_act,nplay_video,nchapters,nforum_posts,roles,incomplete_flag) VALUES('".$course_id."','".$userid_DI."','".$registered."','".$viewed."','".$explored."','".$certified."','".$final_cc_cname_DI."','".$LoE_DI."','".$YoB."','".$gender."','".$start_time_DI."','".$last_event_DI."','".$nevents."','".$ndays_act."','".$nplay_video."','".$nchapters."','".$nforum_posts."','".$roles."','".$incomplete_flag."')") or die(mysql_error());
							$insert_001++;
							//echo "<tr><td>$course_id</td><td>$userid_DI</td></tr>";
						}
						echo "Upload completed Successfully!";
						echo $insert_001 ." Records Uploaded";
						//echo "</table>";
					}
				}
			}
		}
	?>

	<table>
		
		<tr>
			<td>
				<a href="student_data.php">
					<input type="button" value=" View Data">
				</a>
			</td>
		</tr>

		<tr>
			<td>
				<a href="classify.php">
					<input type="button" value=" Classify">
				</a>
			</td>
		</tr>


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
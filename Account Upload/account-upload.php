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
			$upload_001 ="uploads/registry.csv";
			if(!copy($file_001,$upload_001))
			{
				echo "<h4 align=\"center\" >UPLOADING ERROR :: 001-02 :: Unable to Upload The File</h4>";
			}
			else
			{
				if (@($handle = fopen("uploads/registry.csv", "r")) !== FALSE)
				{
					error_reporting(E_ALL ^ E_NOTICE);
					echo "<table border='1px' >";
					$insert_001	=	1;
					while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
					{
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
						$grade	= addslashes($data[$j]);
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
						mysql_query("INSERT INTO data(course_id,userid_DI,registered,viewed,explored,certified,final_cc_cname_DI,LoE_DI,YoB,gender,grade,start_time_DI,last_event_DI,nevents,ndays_act,nplay_video,nchapters,nforum_posts,roles,incomplete_flag) VALUES('".$course_id."','".$userid_DI."','".$registered."','".$viewed."','".$explored."','".$certified."','".$final_cc_cname_DI."','".$LoE_DI."','".$YoB."','".$gender."','".$grade."','".$start_time_DI."','".$last_event_DI."','".$nevents."','".$ndays_act."','".$nplay_video."','".$nchapters."','".$nforum_posts."','".$roles."','".$incomplete_flag."')") or die(mysql_error());
						$insert_001++;
					}
					echo $insert_001 ." Records Uploaded";
					echo "</table>";
				}
			}
		}
	}
?>
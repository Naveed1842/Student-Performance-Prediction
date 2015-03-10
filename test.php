<?php

	mysql_connect("localhost", "root", "") or die("Couldn't connect!");
	mysql_select_db("dataset") or die("Couldn't find db");

	$query1 = mysql_query("SELECT * FROM student_data");
	$count1 = mysql_num_rows($query1);
	//echo "$count1";

	error_reporting(E_ALL ^ E_NOTICE);
	$query2 = mysql_query("SELECT * FROM student_data where risk_level = 'Low' && certified = '1'");
	$count2 = mysql_num_rows($query2);
	//echo "$count2";

	$query3 = mysql_query("SELECT * FROM student_data where risk_level = 'Low' && certified = '0'");
	$count3 = mysql_num_rows($query3);
	//echo "$count3";

	$query4 = mysql_query("SELECT * FROM student_data where risk_level = 'High' && certified = '0'");
	$count4 = mysql_num_rows($query4);
	//echo "$count4";

	$query5 = mysql_query("SELECT * FROM student_data where risk_level = 'High' && certified = '1'");
	$count5 = mysql_num_rows($query5);
	//echo "$count5";

	$query6 = mysql_query("SELECT * FROM student_data where risk_level = 'Low'");
	$count6 = mysql_num_rows($query6);
	//echo "$count6";

	$query7 = mysql_query("SELECT * FROM student_data where risk_level = 'High'");
	$count7 = mysql_num_rows($query7);
	//echo "$count7";

	$true_positive_rate = (($query2/$query6));
	//echo "$true_positive_rate";

	$false_positive_rate = (($query3/$query6));
	//echo "$false_positive_rate";

	$true_negative_rate = (($query4/$query7));
	//echo "$true_negative_rate";

	$false_negative_rate = (($query5/$query7));
	//echo "$false_negative_rate";

	$correct = $count2+$count4;
	//echo "$correct";

	$classification_rate = ($count2+$count4)/($count6+$count7);
	echo "$classification_rate";




?>
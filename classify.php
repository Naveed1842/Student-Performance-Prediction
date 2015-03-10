<?php

mysql_connect("localhost", "root", "") or die("Couldn't connect!");
mysql_select_db("dataset") or die("Couldn't find db");

$query1 = mysql_query("SELECT * FROM data");
$count1 = mysql_num_rows($query1);
//echo "$count1";

$query2 = mysql_query("SELECT * FROM data WHERE certified = '0'");
$count2 = mysql_num_rows($query2);
//echo "$count2";

$query2_2 = mysql_query("SELECT * FROM data WHERE certified = '0'");
$count2_2 = mysql_num_rows($query2_2);
//echo "$count2_2";

$query3 = mysql_query("SELECT * FROM data WHERE viewed = '1'");
$count3 = mysql_num_rows($query3);                   
//echo $count3;

$query3_2 = mysql_query("SELECT * FROM data WHERE viewed = '0'");
$count3_2 = mysql_num_rows($query3_2);                   
//echo $count3_2;

$query4 = mysql_query("SELECT * FROM data WHERE explored = '1'");
$count4 = mysql_num_rows($query4);                   
//echo $count4; 

$query4_2 = mysql_query("SELECT * FROM data WHERE explored = '0'");
$count4_2 = mysql_num_rows($query4_2);                   
//echo $count4_2; 

$query5 = mysql_query("SELECT * FROM data WHERE LoE_DI = 'Secondary'");
$count5 = mysql_num_rows($query5);                   
//echo $count5; 

$query5_2 = mysql_query("SELECT * FROM data WHERE LoE_DI != 'Secondary'");
$count5_2 = mysql_num_rows($query5_2);                   
//echo $count5_2; 

$query6 = mysql_query("SELECT * FROM data WHERE nevents > '99'");
$count6 = mysql_num_rows($query6);                   
//echo $count6; 

$query6_2 = mysql_query("SELECT * FROM data WHERE nevents < '100'");
$count6_2 = mysql_num_rows($query6_2);                   
//echo $count6_2; 

$query7 = mysql_query("SELECT * FROM data WHERE ndays_act > '19'");
$count7 = mysql_num_rows($query7);                   
//echo $count7; 

$query7_2 = mysql_query("SELECT * FROM data WHERE ndays_act < '20'");
$count7_2 = mysql_num_rows($query7_2);                   
//echo $count7_2; 

$query8 = mysql_query("SELECT * FROM data WHERE nchapters > '9'");
$count8 = mysql_num_rows($query8);                   
//echo $count8;

$query8_2 = mysql_query("SELECT * FROM data WHERE nchapters < '10'");
$count8_2 = mysql_num_rows($query8_2);                   
//echo $count8_2;

/*$query2 = mysql_query("SELECT * FROM data WHERE viewed = '1'");
$count2 = mysql_num_rows($query2);                   
//echo $count2;

$query2 = mysql_query("SELECT * FROM data WHERE viewed = '1'");
$count2 = mysql_num_rows($query2);                   
//echo $count2; */

$probability_certified_1 = $count2/$count1;
//echo($probability_certified_1); 

$probability_viewed_1 = $count3/$count1;
//echo($probability_viewed_1); 

$probability_viewed_2 = 1- $probability_viewed_1;
//echo($probability_viewed_2); 

$probability_explored_1 = $count4/$count1;
//echo($probability_explored_1); 

$probability_explored_2 = 1- $probability_explored_1;
//echo($probability_explored_2); 

$probability_LoE_DI_1 = $count5/$count1;
//echo($probability_LoE_DI_1); 

$probability_LoE_DI_1 = $count5_2/$count1;
//echo($probability_LoE_DI_1); 

$probability_nevents_1 = $count6/$count1;
//echo($probability_nevents_1); 

$probability_nevents_2 = 1- $probability_nevents_1;
//echo($probability_nevents_2); 

$probability_ndays_act_1 = $count7/$count1;
//echo($probability_ndays_act_1); 

$probability_ndays_act_2 = 1- $probability_ndays_act_1;
//echo($probability_ndays_act_2);

$probability_nchapters_1 = $count8/$count1;
//echo($probability_nchapters_1); 

$probability_nchapters_2 = 1- $probability_nchapters_1;
//echo($probability_nchapters_2); 




$query = mysql_query("SELECT *  FROM student_data");
$passed = 28;
$failed = 2070;
$count = 0;
while($data = mysql_fetch_array($query))
{
	if($count == 10)
	{
		//break;
	}
	$count++;
					$viewed = $data['viewed'];
					$certified = $data['certified'];
					$id = $data['id'];
					if ($viewed='1'){
						$query_viewed_1 = mysql_query("SELECT * FROM data WHERE viewed = '1' && certified = '1'");
						$count_viewed_1 = mysql_num_rows($query_viewed_1);
						//echo "$count_viewed_1";
						$prob_viewed_certified_1 = $count_viewed_1/$passed;
						//echo ($prob_viewed_certified_1);
						$query_viewed_2 = mysql_query("SELECT * FROM data WHERE viewed = '1' && certified = '0'");
						$count_viewed_2 = mysql_num_rows($query_viewed_2);
						//echo "$count_viewed_2";
						$prob_viewed_certified_2 = $count_viewed_2/$failed;
						//echo ($prob_viewed_certified_2);
					}
					else
					{
						$query_viewed_1 = mysql_query("SELECT * FROM data WHERE viewed = '0' && certified = '1'");
						$count_viewed_1 = mysql_num_rows($query_viewed_1);
						echo ($count_viewed_1);
						$prob_viewed_certified_1 = $count_viewed_1/$passed;
						//echo ($prob_viewed_certified_1);
						$query_viewed_2 = mysql_query("SELECT * FROM data WHERE viewed = '0' && certified = '0'");
						$count_viewed_2 = mysql_num_rows($query_viewed_2);
						//echo "$count_viewed_2";
						$prob_viewed_certified_2 = $count_viewed_2/$failed;
						//echo ($prob_viewed_certified_2);
					}
					$explored = $data['explored'];
					if ($explored='1')
					{
						$query_explored_1 = mysql_query("SELECT * FROM data WHERE explored = '1' && certified = '1'");
						$count_explored_1 = mysql_num_rows($query_explored_1);
						//echo "$count_explored_1";
						$prob_explored_certified_1 = $count_explored_1/$passed;
						//echo ($prob_explored_certified_1);
						$query_explored_2 = mysql_query("SELECT * FROM data WHERE explored = '1' && certified = '0'");
						$count_explored_2 = mysql_num_rows($query_explored_2);
						$prob_explored_certified_2 = $count_explored_2/$failed;
						//echo ($prob_explored_certified_2);
					}
					else 
					{
						$query_explored_1 = mysql_query("SELECT * FROM data WHERE explored = '0' && certified = '1'");
						$count_explored_1 = mysql_num_rows($query_explored_1);
						//echo "count_explored_1";
						$prob_explored_certified_1 = $count_explored_1/$passed;
						//echo ($prob_explored_certified_1);
						$query_explored_2 = mysql_query("SELECT * FROM data WHERE explored = '0' && certified = '0'");
						$count_explored_2 = mysql_num_rows($query_explored_2);
						$prob_explored_certified_2 = $count_explored_2/$failed;
						//echo ($prob_explored_certified_2);
					}

					$nevents = $data['nevents'];
					if ($nevents < '100')
						{
						$query_nevents_1 = mysql_query("SELECT * FROM data WHERE nevents < '100' && certified = '1'");
						$count_nevents_1 = mysql_num_rows($query_nevents_1);
						//echo "$count_nevents_1";
						$prob_nevents_certified_1 = $count_nevents_1/$passed;
						//echo ($prob_explored_certified_1);
						$query_nevents_2 = mysql_query("SELECT * FROM data WHERE nevents < '100' && certified = '0'");
						$count_nevents_2 = mysql_num_rows($query_nevents_2);
						//echo "$count_nevents_2";
						$prob_nevents_certified_2 = $count_nevents_2/$failed;
						//echo ($prob_nevents_certified_2);
					}
					else
						{
						$query_nevents_1 = mysql_query("SELECT * FROM data WHERE nevents > '99' && certified = '1'");
						$count_nevents_1 = mysql_num_rows($query_nevents_1);
						//echo "$count_nevents_1";
						$prob_nevents_certified_1 = $count_nevents_1/$passed;
						//echo ($prob_nevents_certified_1);
						$query_nevents_2 = mysql_query("SELECT * FROM data WHERE nevents > '99' && certified = '0'");
						$count_nevents_2 = mysql_num_rows($query_nevents_2);
						//echo "$count_nevents_2";
						$prob_nevents_certified_2 = $count_nevents_2/$failed;
						//echo ($prob_nevents_certified_2);
					}

					$ndays_act = $data['ndays_act'];
					if ($ndays_act > '19')
						{
						$query_ndays_act_1 = mysql_query("SELECT * FROM data WHERE ndays_act > '19' && certified = '1'");
						$count_ndays_act_1 = mysql_num_rows($query_ndays_act_1);
						//echo "$count_ndays_act_1";
						$prob_ndays_act_certified_1 = $count_ndays_act_1/$passed;
						//echo ($prob_ndays_act_certified_1);
						$query_ndays_act_2 = mysql_query("SELECT * FROM data WHERE ndays_act > '19' && certified = '0'");
						$count_ndays_act_2 = mysql_num_rows($query_ndays_act_2);
						//echo "$count_ndays_act_2";
						$prob_ndays_act_certified_2 = $count_ndays_act_2/$failed;
						//echo ($prob_ndays_act_certified_2);
					}
					else
						{
						$query_ndays_act_1 = mysql_query("SELECT * FROM data WHERE ndays_act < '20' && certified = '1'");
						$count_ndays_act_1 = mysql_num_rows($query_ndays_act_1);
						//echo "$count_ndays_act_1";
						$prob_ndays_act_certified_1 = $count_ndays_act_1/$passed;
						//echo ($prob_ndays_act_certified_1);
						$query_ndays_act_2 = mysql_query("SELECT * FROM data WHERE ndays_act < '20' && certified = '0'");
						$count_ndays_act_2 = mysql_num_rows($query_ndays_act_2);
						//echo "$count_ndays_act_2";
						$prob_ndays_act_certified_2 = $count_ndays_act_2/$failed;
						//echo ($prob_ndays_act_certified_2);
					}

					$nchapters = $data['nchapters'];
					if ($nchapters > '9')
						{
						$query_nchapters_1 = mysql_query("SELECT * FROM data WHERE nchapters > '9' && certified = '1'");
						$count_nchapters_1 = mysql_num_rows($query_nchapters_1);
						//echo "$count_nchapters_1";
						$prob_nchapters_certified_1 = $count_nchapters_1/$passed;
						//echo ($prob_nchapters_certified_1);
						$query_nchapters_2 = mysql_query("SELECT * FROM data WHERE nchapters > '9' && certified = '0'");
						$count_nchapters_2 = mysql_num_rows($query_nchapters_2);
						//echo "$count_nchapters_2";
						$prob_nchapters_certified_2 = $count_nchapters_2/$failed;
						//echo ($prob_nchapters_certified_2);
					}
					else
						{
						$query_nchapters_1 = mysql_query("SELECT * FROM data WHERE nchapters < '10' && certified = '1'");
						$count_nchapters_1 = mysql_num_rows($query_nchapters_1);
						//echo "$count_nchapters_1";
						$prob_nchapters_certified_1 = $count_nchapters_1/$passed;
						//echo ($prob_nchapters_certified_1);
						$query_nchapters_2 = mysql_query("SELECT * FROM data WHERE nchapters < '10' && certified = '0'");
						$count_nchapters_2 = mysql_num_rows($query_nchapters_2);
						//echo "$count_nchapters_2";
						$prob_nchapters_certified_2 = $count_nchapters_2/$failed;
						//echo ($prob_nchapters_certified_2);
					}

					/*$LoE_DI = $data['LoE_DI'];
					if ($LoE_DI = 'Secondary')
						{
						$query_LoE_DI = mysql_query("SELECT * FROM data WHERE LoE_DI = 'Secondary' && certified = '1'");
						$count_LoE_DI = mysql_num_rows($query_LoE_DI_1);
						echo "$count_LoE_DI_1";
						$prob_LoE_DI_certified_1 = $count_LoE_DI_1/$passed;
						//echo ($prob_LoE_DI_certified_1);
						$query_LoE_DI_2 = mysql_query("SELECT * FROM data WHERE LoE_DI = 'Secondary' && certified = '0'");
						$count_LoE_DI_2 = mysql_num_rows($query_LoE_DI_2);
						//echo "$count_LoE_DI_2";
						$prob_LoE_DI_certified_2 = $count_LoE_DI_2/$failed;
						//echo ($prob_LoE_DI_certified_2);
					}
					else if ( $LoE_DI != 'Secondary')
						{
						$query_LoE_DI = mysql_query("SELECT * FROM data WHERE LoE_DI != 'Secondary' && certified = '1'");
						$count_LoE_DI = mysql_num_rows($query_LoE_DI_1);
						//echo "$count_LoE_DI_1";
						$prob_LoE_DI_certified_1 = $count_LoE_DI_1/$passed;
						//echo ($prob_LoE_DI_certified_1);
						$query_LoE_DI_2 = mysql_query("SELECT * FROM data WHERE LoE_DI != 'Secondary' && certified = '0'");
						$count_LoE_DI_2 = mysql_num_rows($query_LoE_DI_2);
						//echo "$count_LoE_DI_2";
						$prob_LoE_DI_certified_2 = $count_LoE_DI_2/$failed;
						//echo ($prob_LoE_DI_certified_2);
					} */




					$prob_passing = $prob_viewed_certified_1*$prob_explored_certified_1*$prob_nevents_certified_1*$prob_ndays_act_certified_1*$prob_nchapters_certified_1*100 ;
					//echo ($prob_passing);
					$prob_failing = $prob_viewed_certified_2*$prob_explored_certified_2*$prob_nevents_certified_2*$prob_ndays_act_certified_2*$prob_nchapters_certified_2 *100;
					//echo ($prob_failing); 

					$prob_passing1=round(($prob_passing/($prob_passing+$prob_failing))*100);
					$prob_failing1=round(($prob_failing/($prob_passing+$prob_failing))*100);

					//echo "$prob_passing";
					//echo "$probability_failing";

					$risk_level = "";

					if ($prob_passing1 >$prob_failing1){
						$risk_level= 'Low';
					}

					else
					{
						$risk_level= 'High';

					}
					//echo $id." # ".$prob_passing1." # ".$prob_failing1." # ".$risk_level."<br/>";
					mysql_query("UPDATE student_data SET prob_fail='".$prob_failing1."',  prob_pass='".$prob_passing1."', risk_level='".$risk_level."'  WHERE id='".$id."' ");


				}

?>
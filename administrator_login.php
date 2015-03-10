<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style/new.css" />
        <title> Admin Login</title>
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
             <div class="menu">

            <div class="menu_item">
                <a href="administrator_login.php" style="text-decoration: none"> <b> Administrator Account </b> </a>
            </div>

            <div class="menu_item">
                <a href="instructor_login.php" style="text-decoration: none"> <b> Instructor Account </b> </a>
            </div>

            <div class="menu_item">
                <a href="student_login.php" style="text-decoration: none"> <b> Student Account </b> </a>
            </div>


            </div>

            <div class="content">

                    <div id = "left_section">
                    </div>
                    <div id = "middle_section">
                    <h4> Please provide your login information </h4>
                    <form action="administrator_login.php" method="post">
                        <p>
                        <table>
                            <tr style="height:15px;">
                                
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    Email: 
                                </td>
                                <td>
                                <input type="text" name="email" />
                                </td>
                            <tr style="height:15px;">
                                
                            </tr>
                            <tr>
                                <td style="text-align:left;">
                                    Password: 
                                </td>
                                <td>
                                <input type="password" name="password" />
                                </td>
                            </tr>
                            <tr style="height:15px;">
                                
                            </tr>
                            
                            
                        <tr><td colspan="2" style="text-align:center;" >
                        <input class="submit" style="width:100px;" type="submit" value="Log in">
                        </td>
                        </tr>

                        <tr style="height:15px;">
                            
                        </tr>

                        <tr style="height:15px;">
                            
                        </tr>
                        </table>
                        
                        


                        </form>

                        <?php

                             if (isset($_POST['submit'])){$submit = $_POST['submit'];} 
                             if (isset($_POST['email'])){$email = $_POST['email'];}
                             if (isset($_POST['password'])){$password = $_POST['password'];} 

                             //error_reporting(E_ALL ^ E_NOTICE);

                            

                            error_reporting(E_ALL ^ E_NOTICE);

                             if ($email&&$password)
                             {

                               include_once("connector2.php");

                                $query = mysql_query("SELECT * FROM administrators WHERE email = '$email'");

                                $numrows = mysql_num_rows($query);
                                
                                

                                if ($numrows!=0)
                                {

                                    $row = mysql_fetch_assoc($query);
                                    $dbemail = $row ['email'];
                                    $dbpassword = $row ['password'];
                                    $firstname = $row['firstname'];
                                    $level = $row['level'];
                                    
                                    @session_start();
                                    $_SESSION['level'] = $level;
                                    setcookie("firstname", "$firstname",time()+86400);

                                    //check to see if they match!
                                    if ($email==$dbemail&&md5($password)==$dbpassword)
                                    {   
                                        
                                        echo "Login Successful. Welcome back " . //$_COOKIE ['firstname'] .
                                        $_SESSION['firstname'] = $firstname;
                                        header("Location: administrator_homepage.php");
                                    }
                                    else
                                        echo "Incorrect password!";



                                }
                                else
                                    echo ("That user doesn't exist!");



                             }
                             else
                                echo ("Please enter email and a password!");


                            ?>

                    <p>
                        First time user? <a href="administrator_register.php"> Register here </a>

                        
                </div>
                <div id = "right_section">
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



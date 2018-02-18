<?php
error_reporting(0);	
 session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$emp_id=$_SESSION["id"];
$Sdate=$_SESSION["date"];
$date= date('Y-m-d H:i:s');

	$query = "update att_sheet set sheet_end_dt='$date' where emp_id='$emp_id' and sheet_start_dt='$Sdate'	"; 

	$result = mysql_query($query); 
	
 
		
	
    ?>
<html>
<head>
<head>
        <title>Innovative Designs - Contact US</title>
        <link rel="stylesheet" type="text/css" href="css/home.css">
    </head>
</head>

<body>
<body background="images/1.jpg" style='position: relative; background-repeat:no-repeat; background-size:100% 100vh;' >
           
		<center>
		<img src="images/logo.jpg" id="logo">
        
		</div>
        
      
        
<H1><fontsize="7">Thanks for visiting us </font></font></h1>
</body>

<?php
session_start();
session_destroy();
?>
    <a href="home.html">Main Page</a>
            </tbody>

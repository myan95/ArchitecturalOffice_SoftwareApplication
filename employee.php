<?php
error_reporting(0);	
 session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$_SESSION["date"]= date('Y-m-d H:i:s');
$emp_id=$emp_id=$_SESSION["id"];
	$date= date('Y-m-d H:i:s');
	$query = "Insert into att_sheet (sheet_start_dt,emp_id) values('$date','$emp_id')	"; 
	$result = mysql_query($query); 
	
 
		
	
    ?>
<HTML>
    <Head>
	<head>
        <title>Innovative Designs - Manager Home</title>
        <link rel="stylesheet" type="text/css" href="css/about.css">
            <link rel="stylesheet" type="text/css" href="css/registration.css">

    </Head>


    <body>

         <div class="topnav" id="myTopnav">
			
            <a href="Vefeedback.php">View Feedback</a>
			 <a href="VTasks.php">View Tasks</a>
            <a href="Logout.php" style="float:right">Logout</a>
          </div>
    <img src="images/logo.jpg" id="logo">
        <h4>"We shape our buildings; thereafter they shape us"   - Winston Churchill</h4>
   

   

<h1>Welcome to your home page</h1>
 

    
</body></html>
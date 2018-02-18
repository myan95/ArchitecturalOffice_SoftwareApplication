<?php
error_reporting(0);	
 session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$emp_id=$emp_id=$_SESSION["id"];
$_SESSION["date"]= date('Y-m-d H:i:s');
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
		
            <a href="Vfeedback.php">View Feedback</a>
			<a href="nproject.php">Add Projects</a>
			<a href="ntask.php">Add Task</a>
			<a href="atask.php">Assign Task</a>
			<a href="nemp.php">Add Employee</a>
            <a href="Logout.php" style="float:right">Logout</a>
          </div>
    <img src="images/logo.jpg" id="logo">
        <h4>"We shape our buildings; thereafter they shape us"   - Winston Churchill</h4>
   

   

<h1>Welcome to your home page</h1>
 

    
</body></html>
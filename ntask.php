<?php
error_reporting(0);	
 session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$flag=0; 
 if (isset($_POST['register'])) {
   foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	    $message = " Field is Empty  ";
        echo "<script type='text/javascript'>alert('$key'+'$message');</script>";
        unset($_POST);
        $flag=1;
		break;
	}
	}
	if($flag==0)
	{
		$task=$_POST['task'];
		
	$query = "Insert into tasks (task_desc) values('$task')	"; 
	$result = mysql_query($query); 
	 echo "<script type='text/javascript'>alert('Task is Added to our database');</script>";
 }
 }
		
	
    ?>

   <HTML>
    <Head>
	<head>
        <title>Innovative Designs - Register</title>
        <link rel="stylesheet" type="text/css" href="css/about.css">
            <link rel="stylesheet" type="text/css" href="css/registration.css">

    </Head>

    <body>

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
        
        <section>
            <div class="content">
                    <!-- BEGIN LOGIN FORM -->
                    <form action="" method="post">
                            <h3 >New Task</h3>
                            <p><h4>Enter Task Description</h4></p>
							<div>
							</div>
											<div>
                                                    <input  style="width:500px; height:500px;" name="task"/>
                                            
                                    </div>
								
                             <div>
                                    <button type="submit" name="register" value="Register" > Submit </button>            
                            </div>
                    </form>
            
    </body>
    <!-- END BODY -->
    </html>
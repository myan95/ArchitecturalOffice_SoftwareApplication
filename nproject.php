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
		$prj_name=$_POST['prj_name'];
		$prj_addr=$_POST['prj_addr'];
		$prj_desc=$_POST['prj_desc'];
		$query = "SELECT * FROM projects where prj_name='$prj_name' "; 
	$result = mysql_query($query); 
	$r=mysql_fetch_row($result);
		$prj_id=$r[0];
		
 if(mysql_num_rows($result) > 0)
 {
	
	 $query=" update projects set PRJ_PLACE='$prj_addr' ,PROJ_DESC = '$prj_desc' where prj_id='$prj_id'";
	 $result = mysql_query($query); 
 }	 
 else
 {
echo $prj_name;	 
	 $query=" INSERT INTO projects (PRJ_NAME, PRJ_PLACE, PROJ_DESC) VALUES ('$prj_name','$prj_addr','$prj_desc')";
	 $result = mysql_query($query); 
 }
 echo "<script type='text/javascript'>alert('Project is added to our database');</script>";
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
                            <h3 >New Project</h3>
                            <p><h4>Enter Project Description</h4></p>
							<div>
							 Enter Project Name :
                    <br/>
                    <input type="text" name="prj_name" placeholder="Project Name" >
					 Enter Project Place :
                    <br/>
                    <input type="text" name="prj_addr" placeholder="Project Place" >
					 Enter Project Description :
                    <br/>
                   	</div>
											<div>
                                                    <input  style="width:500px; height:500px;" name="prj_desc"/>
                                            
                                    </div>
								
                             <div>
                                    <button type="submit" name="register" value="Register" > Submit </button>            
                            </div>
                    </form>
            
    </body>
    <!-- END BODY -->
    </html>
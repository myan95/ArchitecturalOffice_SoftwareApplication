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
		$ddate=$_POST['due_date'];
		$Task_id=$_POST['task_id'];
		$prj_id=$_POST['prj_id'];
		$emp_id=$_POST['emp_id'];
		$mgr_id=$_POST['mgr_id'];
		$ndate= date('Y-m-d H:i:s');
		 $query=" INSERT INTO mte(TASK_ID, MGR_ID, EMP_ID, PRJ_ID, TASK_ASSIGN_DT, TASK_DUE_DT) VALUES ('$Task_id','$mgr_id','$emp_id','$prj_id','$ndate','$ddate')";
		$result = mysql_query($query);
		echo "<script type='text/javascript'>alert('Task Assigned');</script>";
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
                            <h3 >Assign Task</h3>
                            <p><h4>Enter Details Below</h4></p>
							<div>
							
                  
					Enter Manager Name :
                    <br/>
					<?php            
					echo '<select name="mgr_id">'; // Open your drop down box
					$query = "SELECT * FROM employee where  emp_mgr_id ='0' "; 
					$result = mysql_query($query); 
					while ($row=mysql_fetch_row($result)) {
					echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
					
					}
					echo '</select>';
 
 ?>
 <br/>
					 Enter Employee Name :
                    <br/>
					<?php            
					echo '<select name="emp_id">'; // Open your drop down box
					$query = "SELECT * FROM employee where not emp_mgr_id ='0' "; 
					$result = mysql_query($query); 
					while ($row=mysql_fetch_row($result)) {
					echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
					
					}
					echo '</select>';
 
 ?>
 <br/>
                   	Enter Project Name :
                    <br/>
					<?php            
					echo '<select name="prj_id">'; // Open your drop down box
					$query = "SELECT * FROM projects "; 
					$result = mysql_query($query); 
					while ($row=mysql_fetch_row($result)) {
					echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
					
					}
					echo '</select>';
 
 ?>
 <br/>
                   	Enter Task Details :
                    <br/>
					<?php            
					echo '<select name="task_id">'; // Open your drop down box
					$query = "SELECT * FROM tasks "; 
					$result = mysql_query($query); 
					while ($row=mysql_fetch_row($result)) {
					echo '<option value="'.$row['0'].'">'.$row['1'].'</option>';
					
					}
					echo '</select>';
 
 ?>
 <br/>
					Enter Due-Date:
					<br/>
					 <input type="date" name="due_date" placeholder="Due Date" >
                    <br/>
                   	 <div>
                                    <button type="submit" name="register" value="Register" > Submit </button>            
                            </div>
                    </form>
            
    </body>
    <!-- END BODY -->
    </html>
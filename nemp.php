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
		$name=$_POST['Name'];
		$dob=$_POST['DOB'];
		$email=$_POST['Email'];
		$salary=$_POST['Salary'];
		$phone=$_POST['Phone'];
		$mgr_id=$_POST['mgr_id'];
		$pos=$_POST['Position'];
		$username=$_POST['Username'];
		$pass=$_POST['Password'];
		$query="  Select * from employee where emp_username='$username'";
	 $result = mysql_query($query); 
		 if(mysql_num_rows($result) > 0)
 {
	  echo "<script type='text/javascript'>alert('Username Exists');</script>";
 }
 else{
	 $query="  INSERT INTO employee( EMP_NAME, EMP_DOB, EMP_MAIL, EMP_SALARY, EMP_PHONE, EMP_POS, EMP_USERNAME, EMP_PASS,EMP_MGR_ID) VALUES ('$name','$dob','$email','$salary','$phone','$pos','$username',md5('$pass'),'$mgr_id')";
	 $result = mysql_query($query); 
	 
	  echo "<script type='text/javascript'>alert('Employee is added to our database');</script>";

	}
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
                            <h3 >New Employee</h3>
                            <p><h4>Enter Employee Data </h4></p>
						
							Employee Name :
                    <br/>
                    <input type="text" name="Name" placeholder="Employee Name" >
					<br/>
					  Date of Birth :
                   </br>
                    <input type="date" name="DOB" placeholder="Date of Birth" >
					
					</br>
					 Email :
                    <br/>
                    <input type="email" name="Email" placeholder="Email" >
					<br/>
					 Phone :
                    <br/>
                    <input type="text" name="Phone" placeholder="Phone" >
					 Position :
                    <br/>
                    <input type="text" name="Position" placeholder="Position" >
					Salary :
                    <br/>
                    <input type="text" name="Salary" placeholder="Salary" >
					
					 Username :
                    <br/>
                    <input type="text" name="Username" placeholder="Username" >
					 Password :
                    <br/>
                    <input type="password" name="Password" placeholder="Password" >
					
					Manager:
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
					 <div>
                                    <button type="submit" name="register" value="Register" > Submit </button>            
                            </div>
						
                    </form>
					
            
    </body>
    <!-- END BODY -->
    </html>
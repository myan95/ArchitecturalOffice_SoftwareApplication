<?php
error_reporting(0);	
 session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$flag=0; 
$cust_id=$_SESSION["id"];
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
		$enrolled=$_POST['enrolled'];
		$feedback=$_POST['Feedback'];
		$query="select prj_id from projects where prj_name='$prj_name'";
		$result = mysql_query($query); 
		$r=mysql_fetch_row($result);
		$prj_id=$r[0];
	$query = "SELECT * FROM cust_proj where cust_id='$cust_id' and prj_id='$prj_id' "; 
	$result = mysql_query($query); 
	
 if(mysql_num_rows($result) > 0)
 {
	 
	 $query=" update cust_proj set feedback='$feedback' ,joined = '$enrolled' where prj_id='$prj_id' and cust_id='$cust_id'";
	 $result = mysql_query($query); 
 }	 
 else
 {
	 
	 $query=" INSERT INTO cust_proj (CUST_ID, PRJ_ID, JOINED, FEEDBACK) VALUES ('$cust_id','$prj_id','$enrolled','$feedback')";
	 $result = mysql_query($query); 
 }
  echo "<script type='text/javascript'>alert('Thanks for your FEEDBACK');</script>";
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
            <a href="feedback.php">Feedback</a>
			<a href="customer.php">Projects</a>
            <a href="Logout.php" style="float:right">Logout</a>
          </div>
        
        <img src="images/logo.jpg" id="logo">
        <h4>"We shape our buildings; thereafter they shape us"   - Winston Churchill</h4>
        
        <section>
            <div class="content">
                    <!-- BEGIN LOGIN FORM -->
                    <form action="" method="post">
                            <h3 >New Feedback</h3>
                            <p><h4>Enter your feedback below:</h4></p>
							<div>
							
							 <div>
						<label>Select project:</label>
   			  <?php            
					echo '<select name="prj_name">'; // Open your drop down box
					$query = "SELECT * FROM projects "; 
					$result = mysql_query($query); 
					while ($row=mysql_fetch_row($result)) {
					echo '<option value="'.$row['1'].'">'.$row['1'].'</option>';
					
					}
					echo '</select>';
 
 ?>
      
				 </div>
				  <div>
				 <label>Are you enrolled in this project ?</label>
                    <select id="position" placeholder ="Enrolled or not" name="enrolled">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
				 </div>
							</div>
							<div >
                                            <label>Feedback</label>
											</div>
											<div>
                                                    <input  style="width:500px; height:500px;" name="Feedback"/>
                                            
                                    </div>
								
                             <div>
                                    <button type="submit" name="register" value="Register" > Submit </button>            
                            </div>
                    </form>
            
    </body>
    <!-- END BODY -->
    </html>
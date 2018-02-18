<?php
error_reporting(0);	
require_once("dbcontroller.php");
$db_handle = new DBController();
$flag=0; 
$name=$_POST['Name'];
$dob=$_POST['DOB'];
$add=$_POST['Address'];
$email=$_POST['Email'];
$phone=$_POST['Phone'];
$username=$_POST['Username'];
$pass=$_POST['Password'];
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
		$query = "SELECT * FROM customer WHERE cust_username  = '". $_POST['Username'] ."' "; 
			$result = mysql_query($query); 

             if(mysql_num_rows($result) > 0)
			 {
				  
					echo "<script type='text/javascript'>alert('Username Exists');</script>";
			 }
			 else
			 {
			$query = "INSERT INTO customer (CUST_NAME , CUST_PHONE, CUST_ADDR, CUST_DOB, CUST_MAIL, CUST_USERNAME, CUST_PASS) VALUES ('$name','$phone','$add','$dob','$email','$username',MD5('$pass'))"; 
			$result = mysql_query($query); 
			echo "<script type='text/javascript'>alert('Thanks For Joining us please LOGIN to http://localhost/office1/login.php');</script>";
			
   
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
                 <a href="home.html">Home</a>
           
            <a href="contact.html">Contact</a>
            <a href="about.html">About</a>
            <a href="registration.php" style="float:right">Register</a>
            <a href="login.php" style="float:right">Log In</a>
        </div>
        
        <img src="images/logo.jpg" id="logo">
        <h4>"We shape our buildings; thereafter they shape us"   - Winston Churchill</h4>
        <br/>
        <section>
            <div class="content">
                    <!-- BEGIN LOGIN FORM -->
                    <form action="" method="post">
                            <h3 >New User</h3>
                            <p><h4>Enter your details below:</h4></p>
							<div >
                                            <label>Name</label>
                                                    <input  type="text" placeholder="Name" name="Name"/>
                                            
                                    </div>
									<div >
                                            <label>Phone</label>
                                                    <input  type="text" placeholder="Phone" name="Phone"/>
                                            
                                    </div>
									<div >
                                            <label>Email</label>
                                                    <input  type="email" placeholder="Email" name="Email"/>
                                            
                                    </div>
									<div >
                                            <label>Address</label>
                                                    <input  type="text" placeholder="Address" name="Address"/>
                                            
                                    </div>
									<label>Date of Birth</label>
                                                <input placeholder="DOB" type="date" name="DOB" >
                                            </div>
                                    <div >
                                            <label>Username</label>
                                                    <input  type="text" placeholder="Username" name="Username"/>
                                            
                                    </div>
                           <div >
                                            <label>Password</label>
                                                    <input  type="password" placeholder="Password" name="Password"/>
                                            
                                    </div>
									
                                  
                                     <div>
									  
                
                             <div>
                                    <button type="submit" name="register" value="Register" > Sign up </button>            
                            </div>
                    </form>
            
    </body>
    <!-- END BODY -->
    </html>
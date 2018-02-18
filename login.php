<?php
    error_reporting(0);	
        session_start();
 require_once("dbcontroller.php");
     $db_handle = new DBController();
 
   $pass=$_POST['password'];
   $flag=0;   
 if (isset($_POST['register'])) {
   foreach($_POST as $key=>$value) {
	if(empty($_POST[$key])) {
	
            
               $message = " Is Missing  ";
        echo "<script type='text/javascript'>alert('$key'+'$message');</script>";
               unset($_POST);
               $flag=1;
	break;
	}
	}
	if($flag==0)
	{
		if($_POST['Position']=='customer'){
		
		 $query = "SELECT * FROM customer WHERE cust_username  = '". $_POST['Username'] ."' and cust_pass=md5('$pass')"; 
			$result = mysql_query($query); 

             if(mysql_num_rows($result) > 0)
			 {
				 $r=mysql_fetch_row($result);
				 $emp_name=$r[1];
				 echo "<script type='text/javascript'>alert('Welcome '+'$emp_name');</script>";
				 $_SESSION["id"]=$r[0];
				 header("Location:http://localhost/office1/customer.php");
			 }
			 else
			 {
				 echo "<script type='text/javascript'>alert('Wrong username or password');</script>";  
			 }
		}
		if($_POST['Position']=='manager'){
			$query = "SELECT * FROM employee WHERE emp_username  = '". $_POST['Username'] ."' and emp_pass=md5('$pass') and emp_mgr_id='0'"; 
			$result = mysql_query($query); 

             if(mysql_num_rows($result) > 0)
			 {
				 $r=mysql_fetch_row($result);
				 $emp_name=$r[1];
				 echo "<script type='text/javascript'>alert('Welcome '+'$emp_name');</script>";
				 $_SESSION["id"]=$r[0];
				 header("Location:http://localhost/office1/manager.php");
			 }
			 else
			 {
				 echo "<script type='text/javascript'>alert('Wrong username or password');</script>";  
			 }
		}
		if($_POST['Position']=='employee'){
			$query = "SELECT * FROM employee WHERE emp_username  = '". $_POST['Username'] ."' and emp_pass=md5('$pass') "; 
			$result = mysql_query($query); 

             if(mysql_num_rows($result) > 0)
			 {
				 $r=mysql_fetch_row($result);
				 $emp_name=$r[1];
				 echo "<script type='text/javascript'>alert('Welcome '+'$emp_name');</script>";
				 $_SESSION["id"]=$r[0];
				 header("Location:http://localhost/office1/employee.php");
			 }
			 else
			 {
				 echo "<script type='text/javascript'>alert('Wrong username or password');</script>";  
			 }
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

            <div>
                <form action="" method="post" >
                    Enter your Username:
                    <br/>
                    <input type="text" placeholder ="UserName" name="Username" id="username">
                    <br/>
                    Enter your Password:
                    <br/>
                    <input type="password" name="password" placeholder="Passwords" id="password">
                    <br/>
                    <label for="position">Select position:</label>
                    <select id="position" placeholder ="Position" name="Position">
                        <option value="manager">Manager</option>
                        <option value="employee">Employee</option>
                        <option value="customer">Customer</option>
                    </select>
            
					<div>
					<button type="submit" name="register" value="Register" class="btn blue pull-right">
				Login <i class="m-icon-swapright m-icon-white"></i>
				</button>
				</div>
                </form>
            </div>
        </section>
    </body>
</HTML>



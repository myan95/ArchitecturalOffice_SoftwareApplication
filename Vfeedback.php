<HTML>
    <Head>
	<head>
        <title>Innovative Designs - View Feedback</title>
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
    <h1 align="center"><b>Feedbacks</b></h1>

   
<table border="0" width="500" align="center" >
<?php
error_reporting(0);

        session_start();
 $n=$_POST['np'];
 require_once("dbcontroller.php");
     $db_handle = new DBController();
   $cust_id=$_SESSION["id"];
        $sql = mysql_query("select c.prj_name , b.cust_name , a.joined , a.feedback from cust_proj a , customer b , projects c where b.cust_id=a.cust_id and c.prj_id=a.prj_id ");
         
        ?>
		<div>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td><h3><b>Project name</b></h3></td>
                    <td><h3><b>Customer name</b></h3></td>
                    <td><h3><b>Enrolled</b></h3></td>
					<td><h3><b>Feedback</b></h3></td>
                   
                </tr>
            </thead>
            <tbody>
                <?php
           while($rows=mysql_fetch_row($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $rows[0]; ?></td>
                        <td><?php echo $rows[1]; ?></td>
                        <td><?php echo $rows[2]; ?></td>
						<td><?php echo $rows[3]; ?></td>
                    </tr>
                    <?php
                }
				
                ?>
            </tbody>
</table>
 </div>

    
</body></html>
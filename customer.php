<HTML>
    <Head>
	<head>
        <title>Innovative Designs - Register</title>
        <link rel="stylesheet" type="text/css" href="css/about.css">
            <link rel="stylesheet" type="text/css" href="css/registration.css">

    </Head>


    <body>

         <div class="topnav" id="myTopnav">
            <a href="feedback.php">Feedback</a>
			<a href="customer.php">Projects</a>
            <a href="Logout.php" style="float:right">Logout</a>
          </div>
    <img src="images/logo.jpg" id="logo">
        <h4>"We shape our buildings; thereafter they shape us"   - Winston Churchill</h4>
    <h1 align="center"><b>Projects</b></h1>

   
<table border="0" width="500" align="center" >
<?php
error_reporting(0);

        session_start();
 $n=$_POST['np'];
 require_once("dbcontroller.php");
     $db_handle = new DBController();
   $cust_id=$_SESSION["id"];
        $sql = mysql_query("SELECT * FROM projects");
         
        ?>
		<div>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td><h3><b>Project Name</b></h3></td>
                    <td><h3><b>Project Place</b></h3></td>
                    <td><h3><b>Project Description</b></h3></td>
                   
                </tr>
            </thead>
            <tbody>
                <?php
           while($rows=mysql_fetch_row($sql)) {
                    ?>
                    <tr>
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
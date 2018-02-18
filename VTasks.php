<HTML>
    <Head>
	<head>
        <title>Innovative Designs - View Tasks</title>
        <link rel="stylesheet" type="text/css" href="css/about.css">
            <link rel="stylesheet" type="text/css" href="css/registration.css">

    </Head>


    <body>

           <div class="topnav" id="myTopnav">
		  <a href="Vefeedback.php">View Feedback</a>
			 <a href="VTasks.php">View Tasks</a>
            <a href="Logout.php" style="float:right">Logout</a>
          </div>
    <img src="images/logo.jpg" id="logo">
        <h4>"We shape our buildings; thereafter they shape us"   - Winston Churchill</h4>
    <h1 align="center"><b>Your Tasks</b></h1>

   
<table border="0" width="500" align="center" >
<?php
error_reporting(0);

        session_start();
 $n=$_POST['np'];
 require_once("dbcontroller.php");
     $db_handle = new DBController();
   $emp_id=$_SESSION["id"];
  
        $sql = mysql_query("select a.prj_name,c.task_desc,b.emp_name,d.task_assign_dt,d.task_due_dt from projects a , employee b , tasks c , mte d where a.prj_id=d.prj_id  and b.emp_id=d.mgr_id and c.task_id=d.task_id and d.emp_id='$emp_id' ");
         
        ?>
		<div>
        <table width="100%" border="1">
            <thead>
                <tr>
                    <td><h3><b>Project name</b></h3></td>
                    <td><h3><b>Manager name</b></h3></td>
                    <td><h3><b>Task Description</b></h3></td>
					<td><h3><b>Assign Date</b></h3></td>
					<td><h3><b>Due Date</b></h3></td>
                   
                </tr>
            </thead>
            <tbody>
                <?php
           while($rows=mysql_fetch_row($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $rows[0]; ?></td>
                        <td><?php echo $rows[2]; ?></td>
                        <td><?php echo $rows[1]; ?></td>
						<td><?php echo $rows[3]; ?></td>
						<td><?php echo $rows[4]; ?></td>
						
                    </tr>
                    <?php
                }
				
                ?>
            </tbody>
</table>
 </div>

    
</body></html>
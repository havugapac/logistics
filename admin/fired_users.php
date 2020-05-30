<?php
session_start();  
if(strlen($_SESSION['code'])=="")
    {   
    header("Location:index.php"); 
    }
    else
    {//include auth.php file on all secure pages
 include_once 'sessions.php';

?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title></title>

    <script>
      <!--
        var ScrollMsg= "LOGISTIC MANAGMENT SYSTEM "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="employee/assets/must.png" rel="shortcut icon">
    <link href="employee/assets/css/justified-nav.css" rel="stylesheet">


    <link href="employee/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="employee/assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="employee/assets/css/dataTables.min.css">

  </head>
  <body style="background-color:#B4B1B0;">

    <div class="container"style="background-color:#ffff;">
     <?php
                include 'assets/includes/top.php';?>
      <div class="masthead">
        <h3>
          <b><a href="index.php">LOGISTIC MANAGMENT SYSTEM</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b><?=$fname?>&nbsp;<?=$lname?></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="employees.php">Employee</a>
            </li>
            <li >
              <a  href="fired_users.php">Blockes Employees</a>
            </li>
            <li class="active">
              <a href="fired_users.php">Fired Employees</a>
            </li>
          </ul>
        </nav>
      </div><br><br>
<div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">
<div class="table-responsive">
            <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr  style="background-color:#7fb3d5;"><th>No</th>
                                            <th>User code</th>
                                             <th>Password</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Function</th>
                                            <th>National ID</th>
                                            <th>Telephone</th>
                                          
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php

 $sql = "SELECT worker.worker_id,worker.code,worker.password,worker.f_name,worker.l_name,worker.nid,worker.phone,functions.functions,worker.status FROM worker,functions,provinces,districts,sector  WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.status='fired'   ORDER BY functions.f_id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                        <tr>
                                             <td style="background-color:#f7dc6f;"><?php echo htmlentities($cnt);?></td>
 <td><?php echo htmlentities($result->code);?></td>
 <td><?php echo htmlentities($result->password);?></td> 
 <td><?php echo htmlentities($result->f_name);?></td>
 <td><?php echo htmlentities($result->l_name);?></td>
 <td><?php echo htmlentities($result->functions);?></td>  
 <td><?php echo htmlentities($result->nid);?></td>
  <td><?php echo htmlentities($result->phone);?></td>
                                             
                                          
  
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                                </div>
                                </div>

    

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="employee/assets/js/jquery.min.js"></script>
    <script src="employee/assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="employee/assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="employee/assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>
<?php } ?>
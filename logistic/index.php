<?php
session_start();
//error_reporting(0); 
include 'sessions.php'; 
if(strlen($_SESSION['code'])=="" )
    {   
    header("Location:../index.php"); 
    }
    else{
    $moon=date('M'); ?>
            
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | LOGISTIC ACTIVITIES </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="../circle/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>        
    <link rel="stylesheet" href="../bootstrap/windowfiles/dhtmlwindow.css" type="text/css" />

  <link href="../bootstrap/facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 



    </head>
    <body>
  <?php include('includes/header.php');?>
       <?php
     include'sessions.php';
     ?>
     
        
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col md-12">
                        <div class="page-title"><a href="regworker1.php" rel="facebox"></a></div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content" style="background-color:#AEA8B2  ;">
                                 <main class="mn-inner">
                <h2 style="box-shadow:0 0px 0px 0 rgba(0,0,0,0.2),0 0px 0px 0 rgba(0,0,0,0.19);size:5px; text-align:center; font-family:Castellar; color:white;background:#1A5276;border-bottom:8px solid #fdfefe;border-top:8px solid #fdfefe;border-left:8px solid #fdfefe;border-right:8px solid #fdfefe;">LOGISTIC ACTIVITIES MANAGEMENT SYSTEM</h2>
                    <div class="row no-m-t no-m-b"style="background-color:#A6B3B4  ;">

                    <div class="col s12 m12 l4" id="bodydv">
                       <div class="card stats-card"style="background-color:#1C2833">
                            <div class="card-content"style="background-color:#D5DBDB;">
                            
                                <span class="card-title">Total Employees</span>
                                <span class="stats-counter">
<?php
$sql = "SELECT * FROM worker,functions,provinces,districts,sector  WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.status='normal'   ORDER BY functions.f_id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
$empcount=$query->rowCount();
?>

                                    <a href="employees.php"><span class="big-icon "><i style="color:green;" class="fa fa-users" > <?php echo htmlentities($empcount);?></i></span></span></a>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                     <div class="col s12 m12 l4">
                        <div class="card stats-card"style="background-color:#1C2833">
                            <div class="card-content"style="background-color:#D5DBDB;">
                            
                                <span class="card-title">Suspanded Employees </span>
    <?php
$sql = "SELECT worker.worker_id,worker.code,worker.password,worker.f_name,worker.l_name,worker.nid,worker.phone,functions.functions,worker.status FROM worker,functions,provinces,districts,sector  WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.status='blocked'   ORDER BY functions.f_id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$blcount=$query->rowCount();
?>                            <a href="blocked_users.php">
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($blcount);?></span></span></a>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                     <div class="col s12 m12 l4" id="bodydv">
                       <div class="card stats-card"style="background-color:#1C2833">
                            <div class="card-content"style="background-color:#D5DBDB;">
                            
                                <span class="card-title">Total Males</span>
                                <span class="stats-counter">
<?php
$sql = "SELECT * FROM worker,functions,provinces,districts,sector  WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.gender='male' AND worker.status='normal' ORDER BY functions.f_id DESC ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$empcountm=$query->rowCount();
?>

                                    <span class="big-icon "><i style="color:green;" class="fa fa-users" > <?php echo htmlentities($empcountm);?></i></span></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div> 
                    <div class="col s12 m12 l4" id="bodydv">
                       <div class="card stats-card"style="background-color:#1C2833">
                            <div class="card-content"style="background-color:#D5DBDB;">
                            
                                <span class="card-title">Total Females</span>
                                <span class="stats-counter">
<?php
$sql = "SELECT * FROM worker,functions,provinces,districts,sector  WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.gender='female' AND worker.status='normal' ORDER BY functions.f_id DESC ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$empcountf=$query->rowCount();
?>

                                    <span class="big-icon "><i style="color:green;" class="fa fa-users" > <?php echo htmlentities($empcountf);?></i></span></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                      
                    
                     
                   <div class="col s12 m12 l4">
                        <div class="card stats-card"style="background-color:#1C2833">
                            <div class="card-content"style="background-color:#D5DBDB;">
                            
                                <span class="card-title">Listed Item Type </span>
    <?php
$sql = "SELECT item_id from items";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$countleav=$query->rowCount();
?>                            
                               <a href="manageleavetype.php"> <span class="stats-counter"><span class="counter"><?php echo htmlentities($countleav);?></span></span></a>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                <div class="col s12 m12 l4">
                        <div class="card stats-card"style="background-color:#1C2833">
                            <div class="card-content"style="background-color:#D5DBDB;">
                            
                                <span class="card-title">Item applicants</span>
    <?php
$sql = "SELECT ap_id from ap_item";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$dptcount=$query->rowCount();
?>                            
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($dptcount);?></span></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>

                </div>
                 
                
                </div>
                 <?php include('includes/footer.php');?>
              
            </main>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox() 
    })
</script>
    <script>
$("#socil").click(function(){
    $("#bodydv").html('It is loadind!!!, Please Wait......');
    $("#bodydv").css({"z-index":"1000000","margin-top":"1%"});
    $(".dashboard-stat bg-danger").css({"border-bottom":"0px solid blue"});
$("#socil").css({"border-bottom":"5px solid black"});
$("#bodydv").show();$("#bodydv").load('employees.php');
   });
</script>
             <script type="text/javascript">
function openmypage1(){ //Define arbitrary function to run desired DHTML Window widget codes
ajaxwin=dhtmlwindow.open("ajaxbox", "ajax", "regworker1.php", "Ajax Window Title", "width=950px,height=500px,left=400px,top=200px,resize=1,scrolling=1")
ajaxwin.onclose=function(){ //Run custom code when window is about to be closed
return window.confirm("Close this window?")
}
}
</script>
        <script type="text/javascript">
var googlewin=dhtmlwindow.open("googlebox", "iframe", "regworker1.php", "Google Web site", "width=700px,height=450px,resize=1,scrolling=1,center=1", "recal")
</script>
         <script type="text/javascript">
function openmypage1(){ //Define arbitrary function to run desired DHTML Window widget codes
ajaxwin=dhtmlwindow.open("ajaxbox", "ajax", "regworker1.php?user=<?=$user?>", "Ajax Window Title", "width=950px,height=500px,left=400px,top=200px,resize=1,scrolling=1")
ajaxwin.onclose=function(){ //Run custom code when window is about to be closed
return window.confirm("Close this window?")
}
}
</script>
        <!-- Javascripts -->

<script src="../bootstrap/facefiles/facebox.js" type="text/javascript"></script>
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>        
        <script type="text/javascript" src="../bootstrap/windowfiles/dhtmlwindow.js"></script>
        
    </body>
</html>
<?php } ?> 
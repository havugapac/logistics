<?php
session_start();
//error_reporting(0); 
include 'sessions.php'; 
if(strlen($_SESSION['code'])=="" )
    {   
    header("Location:../index.php"); 
    }
    else{ ?>
            
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Add Employee</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>        
    <link rel="stylesheet" href="../bootstrap/windowfiles/dhtmlwindow.css" type="text/css" />

  <link href="../bootstrap/facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 



    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Add employee<a href="regworker1.php" rel="facebox">Add Staff2</a></div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                            <?php include('regworker1.php'); ?>
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
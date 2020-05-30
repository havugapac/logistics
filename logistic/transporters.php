<?php
session_start();
error_reporting(0);
   //include_once '../config.php';
if(strlen($_SESSION['code'])=="" && strlen($_SESSION['worker_id'])=="")
    {   
    header("Location:../index.php"); 
    }
    else{
        include('sessions.php');


 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Transporters </title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

                <link href="../assets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"/>  
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
         
        </div>
       
        <div class="sidebar-brand-text mx-3">
</div>
      </a>
          </div>

        <!-- Content Row -->

          <div class="row">
          <div class="container">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6><font color="black" size="5">Employee's information</font></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" width="100%" cellspacing="0" style="color:black;">
                  <?php
                  if(isset($_POST['jview']))
                  {
                    $wid=$_POST['wid'];
                    $cid=$_POST['cid'];
                    $_SESSION['wd']=$wid;
                    $_SESSION['cd']=$cid;

                  }
                  $cid2=$_SESSION['cd'];
                  $wid2=$_SESSION['wd'];
                 
                  $con = mysqli_connect('localhost','root','','hr');
                  

                  $disp=mysqli_query($con,"select * from ap_car,worker,cars,functions where ap_car.car_id=cars.car_id and ap_car.worker_id=worker.worker_id and worker.worker_id=functions.worker_id and ap_car.worker_id='$wid2' and ap_car.car_id='$cid2'");

                  $fet=mysqli_fetch_assoc($disp);
                  $apid=$fet['apc_id'];
                  
                  $disp2=mysqli_query($con,"select * from worker where worker_id='$drv'");
                  $fet2=mysqli_fetch_assoc($disp2);
                 
                  ?>

                  <tbody>
                    <tr><td>FirstName:&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $fet['f_name']; ?></td></tr>            
                    <tr><td>LastName:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $fet['l_name']; ?></td></tr> 
                    <tr><td>Function:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $fet['functions']; ?></td></tr> 
                    <tr><td>CarModel:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $fet['car_model']; ?></td></tr>
                    <tr><td>CarPlateNumber:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><?php echo $fet['plate_nber']; ?></td></tr>
                    
                    
                  </tbody>
                  
                  
                </table>
              </div>
            </div>
          </div>

          <div class="card-body">
            
         <form action="#" method="post" enctype="multipart/form-data">
          <table>
            <tr><td>Appoint driver:&nbsp;</td>
              <td>
                <select name="driver">
                  <option>--select driver--</option>
                  <?php
              
                 $mechs=mysqli_query($con,"select * from worker,functions where worker.worker_id=functions.worker_id and functions.type='driver' and worker.driving='no'");

                  while($fet=mysqli_fetch_assoc($mechs))
                  {
                    ?>
                  <option value="<?php echo $fet['worker_id'];?>"><?php echo $fet['f_name']." ".$fet['l_name'];?></option>
                  <?php
                   }
                  ?>
                </select>
              </td><td><input type="submit" name="appo" value="Appoint" class="btn-primary"></td></tr>
            
          </table>
          <?php
           if(isset($_POST['appo']))
           {
            
            $driver=$_POST['driver'];

            if($driver!="0")
            {
            
            $con = mysqli_connect('localhost','root','','hr');

            $feed="traveling";
            $appointment=mysqli_query($con,"update cars set akazi='$feed' where car_id='$cid2'");
            
            if($appointment==true)
            {
              $status="yes";
              $appointment2=mysqli_query($con,"update worker set driving='$status' where worker_id='$driver'");

              if($appointment2==true)
              {
                $dat=date('D-d-M-Y');
               $appointment3=mysqli_query($con,"insert into traveling(driver_id,car_id,worker_id,datee) values('$driver','$cid2','$wid2','$dat')");
                if($appointment3==true)
                {

                $appointment4=mysqli_query($con,"delete from ap_car where apc_id='$apid'");

                if($appointment4==true)
                {
                echo"<script> alert('well appointed')</script>";
                header('transporters.php');
                echo"<script> location.href='index.php'</script>"; 
                }
                 
                }
                
              }
            }
          }
            else
            {
            echo"<script> alert('pls select driver')</script>";
            echo"<script> location.href='subadmin.php'</script>";
            }
            }
          ?>
         </form>
          </div>

       </div>
      </div> <!--end of form div-->
    </div>
            </div>
          </div>

          </div>
        <!-- /.container-fluid -->
            </main>
         
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
         <script src="assets/js/pages/ui-modals.js"></script>
        <script src="assets/plugins/google-code-prettify/prettify.js"></script>
        
    </body>
</html>
<?php } ?>
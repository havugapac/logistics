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
        <title>Confirmation</title>
        
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
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Unconfirmed received items</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Unconfirmed items</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
 <thead style="background-color:skyblue;">
                    <tr>
                      <th>Date</th>
                      <th>Employee</th>
                      <th>PhoneNumber</th>
                      <th>Item_name</th>
                      <th>quantity</th>
                    </tr>
                  </thead>

                  <?php
                
                  $con = mysqli_connect('localhost','root','','hr');
                  

                  $disp=mysqli_query($con,"select * from worker,items,given_items where given_items.worker_id=worker.worker_id and given_items.item_id=items.item_id and given_items.confirmation='no'");

                  while($fet=mysqli_fetch_assoc($disp))
                  {
                  ?>

                  <tbody>
                    <tr>
                      <td><?php echo $fet['date']; ?></td>
                      <td><a href="workerdetails.php?user=<?php echo $fet["worker_id"]; ?>" title="Update">  <?php echo $fet['f_name']." ".$fet['l_name']; ?></a></td>
                      <td><?php echo $fet['phone']; ?></td>
                      <td><?php echo $fet['item_name']; ?></td>
                      <td><?php echo $fet['quantity']; ?></td>                      
                    </tr>
                  </tbody>
                  
                  <?php
                     }
                    ?>
                    <?php
                  if(isset($_POST['jdel']))
                  {
                  $tid=$_POST['tid'];

                  $conf="yes";
                  

                  $con = mysqli_connect('localhost','root','','hr');

                  $conf1=mysqli_query($con,"update given_items set confirmation='$conf' where given_id='$tid'");
                                    
                  if($conf1)
                  {
                    echo"<script> alert('Great!! confirmed')</script>";
                    header('not_received.php');
                    echo"<script> location.href='not_received.php'</script>";
                  }
                  
                }
                  ?>
                </table>

                            </div>
                        </div>
                    </div>
                </div>
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
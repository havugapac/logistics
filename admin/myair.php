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
        <title>my airtimes </title>
        
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
                        <div class="page-title">My airtimes</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Given airtimes </span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                      <th>Month</th>
                      <th>Year</th>
                      
                                        </tr>
                                    </thead>
                                 

                  <?php
               
                  $con=mysqli_connect('localhost','root','','hr');
                
                  $disp=mysqli_query($con,"select * from worker,airtimes where worker.worker_id=airtimes.worker_id  and worker.worker_id=$user_id order by air_id desc");

                  while($fet=mysqli_fetch_assoc($disp))
                  {
                  ?>

            <tbody>
                    <tr>
                      
                      <td><?php echo $fet['month']; ?></td>
                      <td><?php echo $fet['year']; ?></td>
                     
                      <td>
                        <form action="#" method="post">
                        <input type="text" name="apid" value="<?php echo $fet['ap_id'];?>" style="display:none;">
                        <input type="text" name="wid" value="<?php echo $fet['worker_id'];?>" style="display:none;">
                        <input type="text" name="iid" value="<?php echo $fet['itemname'];?>" style="display:none;">
                        <input type="text" name="qty" value="<?php echo $fet['qnty'];?>" style="display:none;">
                        

                      </form>
                      </td>
                    </tr>
                  </tbody>

                  <?php
                     }
                    ?>
                <?php
    if(isset($_POST['jdel']))
    {
    $apid=$_POST['apid'];
    $wid=$_POST['wid'];
    $iid=$_POST['iid'];
    $qty=$_POST['qty'];

    $con=new pdo('mysql:dbname=hr;host=localhost','root','');


    $sele2="select * from items where item_id='$iid'";
    $qry2=$con->query($sele2);
    $qry2->setFetchMode(PDO::FETCH_ASSOC);
    $row2=$qry2->fetch();
    $itm_nber=$row2['item_number'];

    if($itm_nber>0)
    {
    $conn=mysqli_connect('localhost','root','','hr');
    $existing=mysqli_query($conn,"select * from given_items where worker_id='$wid' and item_id='$iid'");
    
    
    $numRows=mysqli_num_rows($existing);

    if($numRows==1)
    {

    $dele="delete from ap_item where ap_id='$apid'";
    $resu4=$con->query($dele);
    if($dele)
    {
    echo"<script> alert('an employee was given the same item')</script>";
    echo"<script> location.href='lateitem.php'</script>";
    } 
    }
    elseif($numRows!=1)
    {

    $new_nber=$itm_nber-$qty;

    $reduce="update items set item_number='$new_nber' where item_id='$iid'";
    $resu=$con->query($reduce);
     
     if($resu)
     {
    $dat=date('D-d-M-Y');
     $give="insert into given_items(worker_id,item_id,quantity,date) values('$wid','$iid','$qty','$dat')";
     $resu2=$con->query($give);
    
     if($resu2)
     {
     $del="delete from ap_item where ap_id='$apid'";
     $resu3=$con->query($del);
     

     if($resu3)
     {
      echo"<script> alert('well given')</script>";
      echo"<script> location.href='lateitem.php'</script>";
     }
     }
     }
    }
    }
    else
    {
      echo"<script> alert('items were exhausted pls')</script>";
      echo"<script> location.href='lateitem.php'</script>";
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
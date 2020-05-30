<?php
session_start();
error_reporting(0 );
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
        <title>Admin | Report </title>
        
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
                
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Taken Item Info</span>
                                 <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr><th>No</th>
                                            <th>Item_name</th>
                                            <th>Quantity</th>
                                            <th>Extend</th>
                                            
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php
$con=mysqli_connect('localhost','root','','hr');
$year1=$_POST['year'];
$month1=$_POST['month'];
 $sql =mysqli_query($con,"SELECT * from items");

 while($fec=mysqli_fetch_assoc($sql))
 {
           ?>  
                                        <tr>
                                            <td> <?=$cnt;?></td>
                                            <td><?php echo $fec['item_name'];?></td>
                                            <td><?php echo $fec['item_number'];?></td>
    <td>
      <form action="" method="post">
  <input type="text" name="itd" value="<?php echo $fec['item_id'];?>" style="display:none;">
  <input type="text" name="itn" value="<?php echo $fec['item_number'];?>" style="display:none;">
  <input type="text" name="qty" placeholder="Extend Quantity" style="border-radius:0.5em;">
  <input type="submit" name="upd" value="Extend" class="btn btn-success">
    </form>
    </td>
                                                                                        
                                        </tr>
                                         <?php $cnt++;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

  <?php
  if(isset($_POST['upd']))
  {
    $itd=$_POST['itd'];
    $itn=$_POST['itn'];
    $qty=$_POST['qty'];

    $extension=$itn+$qty;
$xtend=mysqli_query($con,"update items set item_number='$extension' where item_id='$itd'");
if($xtend)
{
  echo"<script> alert('Great!! Extended')</script>";
  header('stored.php');
  echo"<script> location.href='stored.php'</script>";
}

}
  ?>
                <div class="form-group">
                  <label class="col-sm-5 control-label"><button type="button" data-toggle="modal" data-target="#deductions" class="btn btn-danger">Update</button></label>
                </div>
              </form>

      <!-- this modal is for update an DEDUCTIONS -->
      <div class="modal fade" id="deductions" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Deduction</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="add_deductions.php" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">PhilHealth</label>
                  <div class="col-sm-8">
                    <input type="text" name="philhealth" class="form-control" required="required" value="<?php echo $philhealth; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">BIR</label>
                  <div class="col-sm-8">
                    <input type="text" name="bir" class="form-control" value="<?php echo $bir; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">GSIS</label>
                  <div class="col-sm-8">
                    <input type="text" name="gsis" class="form-control" value="<?php echo $gsis; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">PAG-IBIG</label>
                  <div class="col-sm-8">
                    <input type="text" name="pag_ibig" class="form-control" value="<?php echo $love; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Loans</label>
                  <div class="col-sm-8">
                    <input type="text" name="loans" class="form-control" value="<?php echo $loans; ?>" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                  </div>
                </div>
              </form>

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
        
    </body>
</html>
<?php } ?>
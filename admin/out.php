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
                                <span class="card-title">Out of order Items</span>
                                 <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr><th>No</th>
                                            <th>Item_name</th>
                                            <th>Quantity</th>
                                            <th>DeleteButton</th>
                                            
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php
$year1=$_POST['year'];
$month1=$_POST['month'];
 $sql = "SELECT * from items,outoforder where items.item_id=outoforder.item_id";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                        <tr>
                                            <td> <?=$cnt;?></td>
                                            <td><?php echo htmlentities($result->item_name);?></td>
                                            <td><?php echo htmlentities($result->item_numb);?></td>
                                            <td>
                            <form action="" method="post">
                          <input type="text" name="iid" value="<?php echo htmlentities($result->item_id);?>" style="display:none;">
                          <input type="submit" name="del" value="Delete" class="btn btn-success">
                           </form>

                                            </td>
                                                                                        
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>

                           </div>
                        </div>
                    </div>
                </div>
           <?php
          $iid=$_POST['iid'];
          $conn=mysqli_connect('localhost','root','','hr');
          $remove=mysqli_query($conn,"delete from outoforder where item_id='$iid'");

          ?>
             

      
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
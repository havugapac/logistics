<?php
session_start();
error_reporting(0);
   include_once '../config.php';
if(strlen($_SESSION['code'])=="" && strlen($_SESSION['worker_id'])=="")
    {   
    header("Location:../index.php"); 
    }
    else{
        include('sessions.php');
// code for Inactive  employee    
if(isset($_GET['inid']))
{
$id=$_GET['inid'];
$status=0;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageemployee.php');
}



//code for active employee
if(isset($_GET['id']))
{
$id=$_GET['id'];
$status=1;
$sql = "update tblemployees set Status=:status  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:manageemployee.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Manage Employees</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->

  <link href="../assets/facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
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
                        <div style="text-align:center;"><h2>LIST OF EMPLOYEES</h2></div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Employees Info</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr  style="background-color:#7fb3d5;"><th>No</th>
                                            <th>User code</th>
                                             <th>Password</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Function</th>
                                            <th>National ID</th>
                                            <th>Telephone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT worker.worker_id,worker.code,worker.password,worker.f_name,worker.l_name,worker.nid,worker.phone,functions.functions,worker.status FROM worker,functions,provinces,districts,sector  WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.status='normal'   ORDER BY functions.f_id DESC";
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
                                             
                                            <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>"><i class="material-icons">mode_edit</i></a>
         
<a href="workerdetails.php?user=<?php echo htmlentities($result->worker_id);?>" > <i class="fa fa-book" title="Inactive">done</i>


                                             </td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
         
        </div>
        <script type="text/javascript">
function openmypage1(){ //Define arbitrary function to run desired DHTML Window widget codes
ajaxwin=dhtmlwindow.open("ajaxbox", "ajax", "manageemployee.php?user=<?=$user?>", "Ajax Window Title", "width=950px,height=500px,left=400px,top=200px,resize=1,scrolling=1")
ajaxwin.onclose=function(){ //Run custom code when window is about to be closed
return window.confirm("Close this window?")
}
}
</script>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        <script src="../assets/facefiles/facebox.js" type="text/javascript"></script>
        <script type="text/javascript" src="bootstrap/windowfiles/dhtmlwindow.js"></script>


        
    </body>
</html>
<?php } ?>
<?php
// error_reporting(0);
            session_start();
if(strlen($_SESSION['code'])=="" )
    {   
    header("Location:../index.php"); 
    }
    else{ 
            include 'sessions.php';
          $user=$user_id;
          ?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>worker details</title>
    <meta name="description" content="Chuch Information Management System">
    <meta name="author" content="Winnatech Ltd">
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">
  <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.5/fullcalendar.min.css">
    <!-- bootstrap -->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
  <!-- bootstrap theme-->
  <link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  
    <link rel="stylesheet" href="assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">

      <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    <link href="assets/facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />

    

    <!-- DataTables -->
  <link rel="stylesheet" href="../assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="../assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
    <script src="../assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="../assests/jquery-ui/jquery-ui.min.css">
  <script src="../assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
    <script src="../assests/bootstrap/js/bootstrap.min.js"></script>

    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">
    
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">
    
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">
        <link rel="stylesheet" href="/assets/lib/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css">
        <link rel="stylesheet" href="/assets/lib/jquery.gritter/css/jquery.gritter.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/themes/default/css/uniform.default.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>
    <link rel="stylesheet" href="assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>
  </head>
        <body class="">
            <?php
           
                        $sql=("SELECT * from worker where worker_id='$user'");
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result) 
{ 
  $worker=$result->worker_id;
$fname1=$result->f_name;
$lname1=$result->l_name;
$photo=$result->photo;
$code=$result->code;
}}
  ?>

            <div class="bg-dark dk" id="wrap">
                <?php
                include 'assets/includes/top.php'; 
//include 'includes/header.php'; ?>
<div style="text-align:center;" class="main-bar">
            <h3>
    <i class="fa fa-user"></i>  <?=$fname1?>&nbsp;<?=$lname1?>&nbsp;&nbsp;&nbsp;Code:<?=$code?>
          </h3>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <!-- /.head -->
                </div>
                <!-- /#top -->
                <!-- left -->
                <?php
                //include 'includes/sidebar.php';
?>

<!-- end of left -->                
<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                          
                         <div class="row">
<div class="col-lg-12">
    <div class="box dark" >
    
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
              <header style="width:100%;height:1%;">
            <!-- .toolbar -->
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->

<!-- menus start -->
                         

<div class="container" style="width:100%;"> 
<section id="fancyTabWidget" class="tabs t-tabs">
        <ul class="nav nav-tabs fancyTabs" role="tablist">
        
                    <li class="tab fancyTab active">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a id="tab3" href="#tabBody3" role="tab" aria-controls="tabBody3" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-user"></span><span class="hidden-xs"><?=$fname1; ?></span></a>
                        <div class="whiteBlock"></div>
                    </li>
                    
                    <li class="tab fancyTab ">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>  
                        
                        <div class="whiteBlock"></div>
                    </li>                    
                    

                    <li style="display:none;" class="tab fancyTab">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a id="tab3" href="#tabBody5" role="tab" aria-controls="tabBody3" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-briefcase"></span><span class="hidden-xs">New responsability</span></a>
                        <div class="whiteBlock"></div>
                    </li> 
                    
                     <li style="display:none;" class="tab fancyTab">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a id="tab8" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-edit"></span><span class="hidden-xs">Edit worker</span></a>
                        <div class="whiteBlock"></div>
                    </li>
                     <li style="display:none;" class="tab fancyTab">
                    <div class="arrow-down"><div class="arrow-down-inner"></div></div>
                        <a id="tab8" href="#tabBody9" role="tab" aria-controls="tabBody9" aria-selected="true" data-toggle="tab" tabindex="0"><span class="fa fa-building"></span><span class="hidden-xs">Contract</span></a>
                        <div class="whiteBlock"></div>
                    </li>
         </ul>
        <div id="myTabContent" class="tab-content fancyTabContent" aria-live="polite">
                    <div class="tab-pane  fade " id="tabBody0" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">
                        <div>
                            <div class="row">
                                
                                <div class="col-md-12">

                               <div class="panel">                                            
                                            <div class="panel-body p-20">
                                            <table id="example" class="table table-striped">
                                                  <thead>
                                                <tr style="background-color:#d6dbdf">
                                                  <th>No</th>
                                                  <th>Payments</th>
                                                  <th>Bonuses</th> 
                                                  <th>Charges</th>
                                                  <th>Totol amaunts</th>
                                                  <th>Month</th>
                                                  <th>Done By</th>
                                                  <th>Done on</th>
                                                  <th>Document</th>
                                                  
                                                </tr>
                                              </thead>
                                            <tbody> 
                                            <?php
 $sql ="SELECT *  FROM worker,functions,payment  WHERE  worker.worker_id=functions.worker_id AND payment.worker_id=worker.user_id AND payment.worker_id='$user' ORDER BY payment.p_id DESC ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
  $name=$result->user_id;
{   
  ?>   <tr>
<td style="background-color:yellow;"><?php echo htmlentities($cnt);?></td>
 <td><?php echo htmlentities($result->net_salary);?></td>
 <td><?php echo htmlentities($result->bonus);?></td>
  <td><?php echo htmlentities($result->charges);?></td>
  <td><?php echo htmlentities($result->tot_amount);?></td>
  <td><?php echo htmlentities($result->month);?></td>
  <td><?php echo htmlentities($result->f_name);?>&nbsp;
  <?php echo htmlentities($result->l_name);?></td>
  <td><?php echo htmlentities($result->timess);?></td>
  <td><a class="btn btn-success" href="slips.php?doc=<?php echo htmlentities($result->p_id);?>">documrnts</td>
  
     

  
  </tr>
<?php $cnt++; }} ?>
</tbody>
                                              </table>

                    
                                            </div>
                                        </div>


                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- add warnings -->
                    <div class="tab-pane  fade " id="tabBody8" role="tabpanel" aria-labelledby="tab8" aria-hidden="false" tabindex="0">
                        <div>
                            <div class="row">
                                
                                <div class="col-md-3"></div>
                        <div class="col-md-6">

                               <div class="panel">                                            
                                            <div class="panel-body p-20">
                                           <?php
                                           

if(isset($_POST['submit']))
{
 
$warning=$_POST['warning']; 
$comment=$_POST['comment'];
$status='normal';
$user1=$_POST['user'];

$sql="INSERT INTO warnings(w_id,worker_id,warning,comment,user_id,status,timess) VALUES 
(null,:worker,:warning,:comment,:user1,:status,null)";
$query = $dbh->prepare($sql);
$query->bindParam(':worker',$worker,PDO::PARAM_STR);
$query->bindParam(':warning',$warning,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);
$query->bindParam(':user1',$user1,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
  echo "<meta http-equiv='refresh' content='0;url=workerdetails.php?user=".$user."'>";

?>
<script> alert('Thanks Action done succesfull');</script>
 <?php       
}
else
  {?>
<script> alert('Sorry!!! action failed try again!!!');</script>
<?php
}
}
?>
                                             <form id=""  action="" method="POST" enctype="multipart/form-data">

    <div class="frmDronpDown">
 
        <div class="form-group">
                  <label class="col-sm-4 control-label">Warning</label>
                  <div class="col-sm-8">
                   <textarea name="warning"  class="form-control"    placeholder="warnings" required></textarea>
                  </div>
                </div>
                 
                <div class="form-group">
                  <label class="col-sm-4 control-label">Comment:</label>
                  <div class="col-sm-8">
                  <textarea name="comment" class="form-control"  placeholder="comment" required></textarea>
                  </div>
                </div>
                 
                <input style="display:none;" type="text" name="user" value="<?=$user_id?>">
                <div class="row">
            <div class="col-sm-5"></div></br></br><input type="submit" class="btn btn-success" name="submit" value="CONFIRM">
        </div>
    </div>
    </form>
             
                                            </div>
                                        </div>


                                </div>
                                
                            </div>
                        </div>
                    </div>
                   









                    <!--achievments -->
                    <div class="tab-pane  fade" id="tabBody6" role="tabpanel" aria-labelledby="tab6" aria-hidden="true" tabindex="0">
                        <div class="row">
                               <div class="col-md-12">
                               <div class="col-md-3"></div>
                        <div class="col-md-6">

                               <div class="panel">                                            
                                            <div class="panel-body p-20">
     <?php
                                           

if(isset($_POST['submit1']))
{
 
$achievment=$_POST['achievment']; 
$comment=$_POST['comment1'];
$status='normal';
$user1=$_POST['user1'];

$sql="INSERT INTO achievement(a_id,worker_id,achievement,comment,user_id,status,timess) VALUES 
(null,:worker,:achievment,:comment,:user1,:status,null)";
$query = $dbh->prepare($sql);
$query->bindParam(':worker',$worker,PDO::PARAM_STR);
$query->bindParam(':achievment',$achievment,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);
$query->bindParam(':user1',$user1,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId1 = $dbh->lastInsertId();
if($lastInsertId1)
{
  echo "<meta http-equiv='refresh' content='0;url=workerdetails.php?user=".$user."'>";

?>
<script> alert('Thanks Action done succesfull');</script>
 <?php       
}
  else
    {?>
<script> alert('Sorry!!! action failed try again!!!');</script>
<?php
}
}
?>
                                             <form id=""  action="" method="POST" enctype="multipart/form-data">

    <div class="frmDronpDown">
 
        <div class="form-group">
                  <label class="col-sm-4 control-label">Achievment:</label>
                  <div class="col-sm-8">
                   <textarea name="achievment"  class="form-control"    placeholder="write achievment" required ></textarea>
                  </div>
                </div>
                 
                <div class="form-group">
                  <label class="col-sm-4 control-label">Comment:</label>
                  <div class="col-sm-8">
                  <textarea name="comment1" class="form-control"  placeholder="comment" required></textarea>
                  </div>
                </div>
                 
                <input style="display:none;" type="text" name="user1" value="<?=$user_id?>">
                <div class="row">
            <div class="col-sm-5"></div></br></br><input type="submit" class="btn btn-success" name="submit1" value="CONFIRM">
        </div>
    </div>
    </form>
                                </div>
                            </div>
                    </div>   </div>
                            </div>
                    </div>
                    <!--- GUTUMA ABAKOZI-->













                    <div class="tab-pane  fade active in" id="tabBody3" role="tabpanel" aria-labelledby="tab3" aria-hidden="true" tabindex="0">
                    <div class="row">
                    <div class="col-md-12" style="background-color:white;">


          <?php

 $sql ="SELECT * FROM worker,functions,provinces,districts,sector WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.status='normal' AND worker.worker_id='$user'   ORDER BY functions.f_id DESC";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   
  ?>  
    <form method="post" action="edit.php" enctype="multipart/form-data">
              
               <div class="col-md-6 pull-left" style="background-color:#ccc;"> 
                <div class="box dark"> 
        <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar --><h5 style="color:black;">WORKERS'S ADRESS</h5>
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
        
            <img class="img-circle center-block" src="../img/<?php echo htmlentities($result->photo); ?>"alt="No picture" height="140" width="140"><br />
                   
                    <div class="form-group">
                  <label class="col-sm-4 "> <span>Province: </span></label>
                  <div class="col-sm-8">
                    <label class="form-control"> <span><?php echo htmlentities($result->Provincename); ?> </span></label>
                  </div>
            </div>
                        <div class="form-group">
                  <label class="col-sm-4"> <span>District: </span></label>
                  <div class="col-sm-8">
                    <label class="form-control"> <span><?php echo htmlentities($result->District_Name); ?> </span></label>
                  </div></div>
                  <div class="form-group">
                  <label class="col-sm-4 ">Sector:</label>
                  <div class="col-sm-8">
                    <label class="form-control"><?php echo htmlentities($result->sector_name); ?> </label>
                  </div></div>
                  <div class="form-group">
                  <label class="col-sm-4 ">Cell: </label>
                  <div class="col-sm-8">
                    <label class="form-control"> <?php echo htmlentities($result->cell); ?></label>
                  </div>
            </div> 
            
       </form>

    </div>
                                     <!-- /div-action -->       
      
                   
                </div>
                <div class="col-md-6 pull-right" style="background-color:#fff;">
                 <div class="box dark">
                <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar --><h5 style="color:black;">WORKER'S DETAILS</h5>
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
                <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Code:</span></label>
                  <div class="col-sm-8">
                   <label class="form-control"> <span><?php echo htmlentities($result->code); ?> </span></label>
                  </div>
            </div>

            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Password:</span></label>
                  <div class="col-sm-8">
                   <label class="form-control"> <span><?php echo htmlentities($result->password); ?> </span></label>
                  </div>
            </div>

                        <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>N.ID:</span></label>
                  <div class="col-sm-8">
                   <label class="form-control"> <span><?php echo htmlentities($result->nid); ?> </span></label>
                  </div>
            </div>

                   <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Telephone:</span></label>
                  <div class="col-sm-8">
                    <label class="form-control"> <span><?php echo htmlentities($result->phone); ?> </span></label>
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Email:</span></label>
                  <div class="col-sm-8">
                    <label class="form-control"> <span><?php echo htmlentities($result->email); ?> </span></label>
                  </div>
            </div>

                        <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Recretment:</span></label>
                  <div class="col-sm-8">
                    <label class="form-control"> <span><?php echo htmlentities($result->recret_date); ?> </span></label>
                  </div>
            </div>

                        <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Education:</span></label>
                  <div class="col-sm-8">
                    <label class="form-control"> <span><?php echo htmlentities($result->edu_level); ?> </span></label>
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Modification:</span></label>
                  <div class="col-sm-8">
                    <label class="form-control"> <span><?php echo htmlentities($result->timess); ?> </span></label>
                  </div>
            </div>            
                        

                        <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Post:</span></label>
                  <div class="col-sm-8">
                    <label class="form-control"> <span><?php echo htmlentities($result->functions); ?> </span></label>
                  </div>
                                   
            </div>
                </div>
                </div><?php }} ?> 
 <div class="col-md-6 pull-right" style="background-color:#ccc;display:none;">
                 <div class="box dark">
                <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar --><h5 style="color:black;">Hitorical Posts</h5>
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
                <table id="example4" class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>First Name</th>
                                                  <th>Last Name</th>
                                                  <th>Function</th>
                                                  <th>Net salary</th>
                                                  <th>From</th>
                                                  
                                                </tr>
                                              </thead>
                                            <tbody> 
                                            <?php
 $sql ="SELECT *  FROM worker,functions  WHERE  worker.worker_id=functions.worker_id AND worker.worker_id='$user' ORDER BY functions.f_id DESC ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   
  ?>   <tr>
<td><?php echo htmlentities($cnt);?></td>
 <td><?php echo htmlentities($result->f_name);?></td>
 <td><?php echo htmlentities($result->l_name);?></td>
  <td><?php echo htmlentities($result->functions);?></td>
  <td><?php echo htmlentities($result->net_salary);?></td>
  <td><?php echo htmlentities($result->dates);?></td>
  
     

  
  </tr>
<?php $cnt++; }} ?>
</tbody> </table>
                </div>
                </div>
                 <div class="col-md-6 pull-right" >
                 <div class="box dark">
                <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar -->
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
                
                </div>
                </div>
                <br />
                
                    </form>
                    
                               </div>
                        
                            </div>
                    </div>











                    <div class="tab-pane  fade" id="tabBody4" role="tabpanel" aria-labelledby="tab4" aria-hidden="true" tabindex="0">
                    <div class="row">
                    <div class="col-md-12">



          <?php

 $sql ="SELECT * FROM worker,functions,provinces,districts,sector WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.status='normal' AND worker.worker_id='$user'   ORDER BY functions.f_id DESC";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   
  ?>  
    <form method="post" action="edit.php" enctype="multipart/form-data">
              
               <div class="col-md-6 pull-left" style="background-color:#ccc;"> 
                <div class="box dark"> 
        <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar --><h5 style="color:black;">APPLIED LIEVES</h5>
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
        
             <table id="example5" class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Leave type</th> 
                                                  <th>Reason for leave</th>
                                                  <th>Start time</th>
                                                  <th>End time</th>
                                                  <th>Comment</th>
                                                   <th>Done on</th>
                                               </tr>
                                              </thead>
                                            <tbody> 
                                            <?php
 $sql ="SELECT *  FROM leave_aplication,leave_type  WHERE leave_type.l_id=leave_aplication.lev_id AND leave_aplication.user_id='$user' ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
  $name=$result->user_id;
{   
  ?>   <tr>
<td><?php echo htmlentities($cnt);?></td>
 <td><?php echo htmlentities($result->lev_name);?></td>
 <td><?php echo htmlentities($result->proove);?></td>
 <td><?php echo htmlentities($result->start_time);?></td>
 <td><?php echo htmlentities($result->end_time);?></td>
 <td><?php echo htmlentities($result->comment);?></td>
  <td><?php echo htmlentities($result->timess);?></td>
  
     

  
  </tr>
<?php $cnt++; }} ?>
</tbody> </table> 
            
       </form>

    </div>
                                     <!-- /div-action -->       
      
                   
                </div>
                <div class="col-md-6 pull-right" style="background-color:#fff;">
                 <div class="box dark">
                <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar --><h5 style="color:black;">APROOVED LEAVES</h5>
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
         <table id="example6" class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Leave type</th>            
                                                  <th>Reason for leave</th>
                                                  <th>Start time</th>
                                                  <th>End time</th>
                                                  <th>Comment</th>
                                                  <th>Done by</th>
                                                  <th>Done on</th>
                                               </tr>
                                              </thead>
                                            <tbody> 
                                            <?php
 $sql ="SELECT *  FROM leave_approve,leave_type,leave_aplication,worker WHERE leave_type.l_id=leave_aplication.lev_id AND leave_approve.appl_id=leave_aplication.appl_id AND worker.worker_id=leave_approve.user_id AND leave_aplication.user_id='$user' ORDER BY leave_approve.appl_id DESC ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
 
{   
  ?>   <tr>
<td><?php echo htmlentities($cnt);?></td>
 <td><?php echo htmlentities($result->lev_name);?></td>
 <td><?php echo htmlentities($result->proove);?></td>
 <td><?php echo htmlentities($result->start_time);?></td>
 <td><?php echo htmlentities($result->end_time);?></td>
 <td><?php echo htmlentities($result->comment);?></td>
 <td><?php echo htmlentities($result->f_name);?><?php echo htmlentities($result->l_name);?></td>
  <td><?php echo htmlentities($result->timess);?></td>
  
     

  
  </tr>
<?php $cnt++; }} ?>
</tbody>
 </table>
                
                </div>
                </div><?php }} ?> 
 <div class="col-md-6 pull-right" style="background-color:#ccc;">
                 <div class="box dark">
                <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar --><h5 style="color:black;">WARNINGS</h5>
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
                <table id="example7" class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Worning</th>            
                                                  <th>Comment</th>              
                                                  <th>Done by</th>
                                                  <th>Done on</th>
                                               </tr>
                                              </thead>
                                            <tbody> 
                                            <?php
 $sql ="SELECT *  FROM warnings,worker WHERE worker.worker_id=warnings.worker_id AND warnings.worker_id='$user' ORDER BY warnings.w_id DESC ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ); 
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   
  ?>   <tr>
<td><?php echo htmlentities($cnt);?></td>
 <td><?php echo htmlentities($result->warning);?></td>
 <td><?php echo htmlentities($result->comment);?></td>
 <td><?php echo htmlentities($result->f_name);?><?php echo htmlentities($result->l_name);?></td>
  <td><?php echo htmlentities($result->timess);?></td>
  
     

  
  </tr>
<?php $cnt++; }} ?>
</tbody> </table>
                </div>
                </div>
                 <div class="col-md-6 pull-right" >
                 <div class="box dark">
                <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar --><h5 style="color:black;">UNAPROOVED LEAVES </h5>
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
                <table id="example8" class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>No</th>
                                                  <th>Leave type</th>            
                                                  <th>Reason for leave</th>
                                                  <th>Start time</th>
                                                  <th>End time</th>
                                                  <th>Comment</th>
                                                  <th>Done by</th>
                                                  <th>Done on</th>
                                               </tr>
                                              </thead>
                                            <tbody> 
                                            <?php
 $sql ="SELECT *  FROM leave_approve,leave_type,leave_aplication1,worker WHERE leave_type.l_id=leave_aplication1.le_id AND leave_approve.appl_id=leave_aplication1.appl_id AND worker.worker_id=leave_approve.user_id AND leave_aplication1.worker_id='$user' ORDER BY leave_approve.appl_id DESC ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{   
  ?>   <tr>
<td><?php echo htmlentities($cnt);?></td>
 <td><?php echo htmlentities($result->lev_name);?></td>
 <td><?php echo htmlentities($result->proove);?></td>
 <td><?php echo htmlentities($result->start_time);?></td>
 <td><?php echo htmlentities($result->end_time);?></td>
 <td><?php echo htmlentities($result->comment);?></td>
 <td><?php echo htmlentities($result->f_name);?><?php echo htmlentities($result->l_name);?></td>
  <td><?php echo htmlentities($result->timess);?></td>
  
     

  
  </tr>
<?php $cnt++; }} ?>
</tbody> </table>
                </div>
                </div>
                <br />
                
                    </form>
                    

                        
                            </div>
                    </div>







<div class="tab-pane  fade" id="tabBody9" role="tabpanel" aria-labelledby="tab9" aria-hidden="true" tabindex="0">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6" style="background-color:#C8EEFD;">  
                                    <div class="panel">                                            
                                            <div class="panel-body p-20" style="background-color:#99A3A4;">
                                              <?php

     if(isset($_POST['save1']))     
     {   

$name=$_FILES["file1"]["name"];
$useid=$_POST['editor'];
$status='normal'; 
 move_uploaded_file($_FILES["file1"]["tmp_name"],"../img/".$_FILES["file1"]["name"]);        
      include("../connection.php");
      if($name){
        $_Sql="INSERT INTO contracts(contract_id,worker_id,contract,user_id,status,timess) values (null,'$worker','$name','$useid','$status',null)";
            }
             
            
      $result=(mysqli_query($dbh,$_Sql));//(mysqli_query($conn,$_Sql));
      if($result)
      {    echo "<meta http-equiv='refresh' content='0;url=workerdetails.php?user=".$user."'>";     
    ?>
    <script> alert('succesfull')</script>
       <?php
    
        }
      else
      {
        ?>
        <script> alert('unsuccesfull')</script>
     <?php
    
        }
     }
     ?>           
  
                </div><br />
                 <div class="panel-body p-20" style="background-color:#BA4A00; text-align:center; font-family:times;">
                 <h4> Contract of <?=$fname1?>&nbsp;<?=$lname1?></h4>
                 </div>
                <div  class="panel">
        <!-- /table -->                                            <?php
 $sql ="SELECT *  FROM contracts WHERE contracts.worker_id='$user' ORDER BY contracts.contract_id DESC ";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)

{
$photo=$result->contract; ?>  
      <div class="single-product-gallery-item" id="slide1" >
                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['worker_id']);?>" href="../img/<?php echo htmlentities($result->contract);?>"target="_blank">
   <img class="img-responsive" alt="" src="../img/<?=$photo;?>" data-echo="admin/productimages/<?php echo htmlentities($result->contract);?>" width="100%" height="350" target="_blank" />
                </a>
            </div><!-- /.single-product-gallery-item -->
<?php }} ?>
  </div>
                                </div>
                                        </div>

                                </div>
                            </div>
                    









                    <div class="tab-pane  fade" id="tabBody5" role="tabpanel" aria-labelledby="tab5" aria-hidden="true" tabindex="0">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                                    <div class="panel">                                            
                                            <div class="panel-body p-20">
                                            <?php
                                            $sql = "SELECT  * FROM worker where status='normal'  ORDER BY worker_id DESC limit 1";
 
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$worker=$result->worker_id;
$fname1=$result->f_name;
$lname1=$result->l_name;
}} 

if(isset($_POST['submit']))
{
 
$function=$_POST['function']; 
$salary=$_POST['salary'];
$type=$_POST['type'];
$status='normal';
$dates=date("d/m/Y");
$user1=$_POST['user'];

$sql="INSERT INTO functions(f_id,worker_id,functions,net_salary,type,user_id,status,timess,dates) VALUES 
(null,:worker,:function,:salary,:type,:user1,:status,null,:dates)";
$query = $dbh->prepare($sql);
$query->bindParam(':worker',$worker,PDO::PARAM_STR);
$query->bindParam(':function',$function,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':user1',$user1,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':salary',$salary,PDO::PARAM_STR);
$query->bindParam(':dates',$dates,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{echo "<meta http-equiv='refresh' content='0;url=workerdetails.php?user=".$user."'>";

?>
<script> alert(
  "Thanks!! Action done succesfull");</script>
 <?php       
}
else 
{?>
<script> alert(
  "Sorry!, fail to register try again!!!");</script>
     
     <?php
}
}
?>
                                             <form id=""  action="" method="POST" enctype="multipart/form-data">

    <div class="frmDronpDown">
 
        <div class="form-group">
                  <label class="col-sm-4 control-label">Function</label>
                  <div class="col-sm-8">
                   <input type="text" name="function"  class="form-control"   placeholder="Function" required />
                  </div>
                </div>
                 
                <div class="form-group">
                  <label class="col-sm-4 control-label">Net Salary:</label>
                  <div class="col-sm-8">
                  <input type="text" name="salary" class="form-control"  placeholder="net salary" required/>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Type:</label>
                  <div class="col-sm-8">
                  <select name="type" class="form-control" required>
                    <option>---- Select user type------</option>
                    <option value="worker">Worker</option>
                    <option value="recieptionist">Recieptionist</option>
                    <option value="admin">Admin</option>
                    <option value="secretary">Secretary</option>
                    <option value="human resource">Human Resource</option>
                  </select>
                  </div>
                </div></br>
                <input style="display:none;" type="text" name="user" value="<?=$user_id?>">
                <div class="row">
            <div class="col-sm-5"></div></br></br><input type="submit" class="btn btn-success" name="submit" value="CONFIRM">
        </div>
    </div>
    </form>
                </div><br />
                
        <!-- /table -->
  
                                </div>
                                        </div>
                                </div>
                            </div>
                    








 <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true" tabindex="0">
                        <div class="row">
                                
                                <div class="col-md-12">
                                   
                    <?php
                function saveimage($name,$file_location){
                                    include('../connection.php');
                                    foreach ($_POST["id"] AS $id){
                                                        /*echo 'ID is ' .$id.'<br />';
                                                        echo 'Field1 is ' .$_POST["field1"][$id].'<br />';
                                                        echo 'Field2 is ' .$_POST["field2"][$id].'<br />';*/
                                                       $fname= $_POST["fname"];
                                                       $lname = $_POST["lname"];   
                                                       $dob= $_POST["dob"];
                                                       $status = $_POST["m_status"];
                                                       $recretment= $_POST["recretment"];
                                                       $education = $_POST["education"];
                                                       $nid= $_POST["nid"];
                                                       $account = $_POST["account"];
                                                       $bank = $_POST["bank"];  
                                                       $phone= $_POST["phone"];
                                                       $email = $_POST["email"];                                     

                                                        if($file_location){
       $update='UPDATE worker SET f_name="'.$fname.'",l_name="'.$lname.'",dob="'.$dob.'",m_status="'.$status.'",recret_date="'.$recretment.'",edu_level="'.$education.'",nid="'.$nid.'",account="'.$account.'",bank="'.$bank.'",email ="'. $email.' ", phone = "'.$phone.' ", photo = "'.$file_location.' " WHERE worker_id = "'.$id.'"';}
                                                        else{
         $update='UPDATE worker SET f_name="'.$fname.'",l_name="'.$lname.'",dob="'.$dob.'",m_status="'.$status.'",recret_date="'.$recretment.'",edu_level="'.$education.'",
nid="'.$nid.'",account="'.$account.'",bank="'.$bank.'",email ="'. $email.' ", phone = "'.$phone.' " WHERE worker_id = "'.$id.'"';
                                                        }
                                                        $res=mysqli_query($dbh,$update) or die ('Wapi');
                                                        if($res){
                                                          echo "<script>alert('Thank you Modification done successfully!!!');
window.location='workerdetails.php?user=".$id."'</script>";
                                                            }
                                                        else
                                                        {
                                                          ?>
                                                         <script>alert("Sorry Modification failed! Try again!!!!!");</script>
        <?php
        echo "<meta http-equiv='refresh' content='0;url=workerdetails.php?user=".$id."'>";


                                                        }
                                                    }
                                }
                                 include('../connection.php');
                    $sql="SELECT * from worker where worker_id='$user' LIMIT 0,1";
                                $res=mysqli_query($dbh,$sql);
                                if(!$res)
                                {
                                    die("Query Failed!");
                                }
                                if( mysqli_num_rows($res) > 0){
                                     while($row=mysqli_fetch_assoc($res)){
                                       $kbs = $row['photo'];
                     echo'<form method="post" action="" enctype="multipart/form-data">
                <div class="col-md-6 pull-left">
                    <img class="img-circle center-block" src="../img/'.$kbs.'" alt="No picture" height="140" width="140"><br />
                    <div class="form-group">
                  <label style="font-size:10px" class="col-sm-4 control-label"> <span>Change Picture </span></label>
                  <div class="col-sm-8">
                    <input style="background-color:none;" class="form-control" type="file" name="file" value="'.$row["photo"].'" />
                  </div>
          </div>
                    <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>First Name: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="fname" value="'.$row["f_name"].'" placeholder="'.$row["f_name"].'" required />
                  </div>
            </div>  
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Other Name: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="lname" value="'.$row["l_name"].'" placeholder="'.$row["l_name"].'" required />
                  </div>
            </div> 
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Date of Birth: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="dob" value="'.$row["dob"].'" placeholder="'.$row["dob"].'" required />
                  </div>
            </div>  
                </div>
                <div class="col-md-6 pull-right">';
                    echo'
                        <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Telephone </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="phone" value="'.$row["phone"].'" placeholder="'.$row["phone"].'" required />
                  </div>
            </div>
                        <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>E-mail </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="email" value="'.$row["email"].'" placeholder="'.$row["email"].'" required />
                  </div>
                  </div>
                 
             <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Recruitment Date: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="recretment" value="'.$row["recret_date"].'" placeholder="'.$row["recret_date"].'" required />
                  </div>
            </div> 
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Martial Status: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="m_status" value="'.$row["m_status"].'" placeholder="'.$row["m_status"].'" required />
                  </div>
            </div> 
             <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Education Level: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="education" value="'.$row["edu_level"].'" placeholder="'.$row["edu_level"].'" required />
                  </div>
            </div> 
          
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Identity number: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="nid" value="'.$row["nid"].'" placeholder="'.$row["nid"].'" required />
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Account Number: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="account" value="'.$row["account"].'" placeholder="'.$row["account"].'" required />
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Bank: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="bank" value="'.$row["bank"].'" placeholder="'.$row["bank"].'" required />
                  </div>
            </div>
              <input type="hidden" name="id[]" value="'.$row["worker_id"].'">

            </div>
                </div><br />
                <p class="lead">
                            <input type="submit" class="btn btn-success" name="save" value="Save Changes" /></p>
                       <a class="btn btn-info" href="blockuser.php?user='.$row["worker_id"].'">Block</a>
                             
                    </form>';
                                }
                        }
                        if(isset($_POST["save"])){
                          if(isset($_FILES['file'])){
                              $targetFolder = "../img/";
                              $file_location = "";
                              $name = $_FILES['file']['name'];
                              $targetFolder = $targetFolder.basename($_FILES['file']['name']);
                              $file_location = $file_location.basename($_FILES['file']['name']);
                              $image_file_type = pathinfo($targetFolder,PATHINFO_EXTENSION);
                              $sitiuation = move_uploaded_file($_FILES['file']['tmp_name'],$targetFolder);
                              /*if(!$sitiuation)
                              {
                                echo "<h1 style='color:#000;'>Wapi bya Failinz  </h1>".$_FILES['file']['error'];
                              }else{*/
                                saveimage($name,$file_location);
                              /*}*/
                          }
                    }
                ?>

                                </div>
                            </div>
                    </div>











                   
        </div>
 <div class="tab-pane  fade" id="tabBody9" role="tabpanel" aria-labelledby="tab5" aria-hidden="true" tabindex="0">
                    <div class="row">
                        <div class="col-md-12">
                                    <!-- body ibindi --> 6
                                  
                                </div>
                            </div>
                    </div>
    </section>
</div>
<!-- end of menus -->

        </header>





    </div> <!-- /panel -->    
  </div> <!-- /col-md-12 -->
</div> <!-- /row -->
                                </div>
                            </div>
                    </div>
                    
                    </div>
   
</div></div></div>
            <!-- /#wrap -->
            <footer class="Footer bg-dark dker">
                <p> &copy;IRIBAGIZA Aline 2019</p>
            </footer>
            <!-- /#footer -->
            <?php
//include 'modals.php';
?>
<script src="../bootstrap/DataTables/datatables.min.js"></script>
           
           <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
                $('#example4').DataTable();
                $('#example5').DataTable();
                $('#example6').DataTable();
                $('#example7').DataTable();
                 $('#example8').DataTable();
            });
        </script>
<!-- jquery -->
  <script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
  <script src="assests/bootstrap/js/bootstrap.min.js"></script>
     <script src="assets/lib/jquery/jquery.js"></script>

            <!--Bootstrap -->
            <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
            <!-- MetisMenu -->
            <script src="assets/lib/metismenu/metisMenu.js"></script>
            <!-- onoffcanvas -->
            <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
            <!-- Screenfull -->
            <script src="assets/lib/screenfull/screenfull.js"></script>


    <!-- file input -->
    <script src="../assests/plugins/fileinput/js/plugins/canvas-to-blob.min.js'); ?>" type="text/javascript"></script> 
    <script src="../assests/plugins/fileinput/js/plugins/sortable.min.js" type="text/javascript"></script> 
    <script src="../assests/plugins/fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="../assests/plugins/fileinput/js/fileinput.min.js"></script>   


    <!-- DataTables -->
   
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>



                    <script src="/assets/lib/plupload/js/plupload.full.min.js"></script>
                    <script src="/assets/lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
                    <script src="/assets/lib/jquery.gritter/js/jquery.gritter.min.js"></script>
                    <script src="/assets/lib/formwizard/js/jquery.form.wizard.js"></script>

            <!-- Metis core scripts -->
            <script src="assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="assets/js/app.js"></script>

                <script>
                    $(function() {
                      Metis.formWizard();
                    });
                </script>

            <script src="assets/js/style-switcher.js"></script>
            <script src="assets/facefiles/facebox.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox() 
    })
</script>

    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>

                <script>
                    $(function() {
                      Metis.dashboard();
                    });
                </script>

  
 <script>
$("#kristo").click(function(){
    $("#abakr").html('It is loadind!!!, Please Wait......');
    $("#abakr").css({"z-index":"1000000","margin-top":"1%"});
    $(".dashboard-stat bg-danger").css({"border-bottom":"0px solid blue"});
$("#kristo").css({"border-bottom":"5px solid black"});
$("#abakr").show();$("#abakr").load('abakristo.php');
   });
</script>
        </body>

  
<?php } ?>
</html>

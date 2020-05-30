<?php
session_start();
error_reporting(0);
   //include_once '../config.php';
if(strlen($_SESSION['code'])=="" && strlen($_SESSION['worker_id'])=="")
    {   
    header("Location:../index.php"); 
    }
    else{
        include('sessions.php'); ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Print Receipt</title>
        
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
         <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>
    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Print Receipt</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                <?php
                                if(isset($_POST['update']))
{
$did=intval($_GET['worid']);    
$sta= " Paid";
$name=$_FILES["file1"]["name"];
$useid=$_POST['editor'];
$status='normal'; 
$dir="productimages/$productid";
    mkdir($dir);
 move_uploaded_file($_FILES["file1"]["tmp_name"],"productimages/$productid".$_FILES["file1"]["name"]);        
      include("../connect.php");
     
        $_Sql="INSERT INTO slips(slip_id,payment_id,slip,user_id,status,timess) values (null,'$did','$name','$useid','$status',null)";
         $result=(mysqli_query($conn,$_Sql));
            
 
$sql="update payment set status=:sta where p_id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':sta',$sta,PDO::PARAM_STR);

$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="payment done successfull!!!";
}

    ?>
                                    <form class="col s12" name="" method="post">
                                          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
<?php 
$did=intval($_GET['worid']);
$sql = "SELECT * from payment,worker WHERE payment.p_id=:did and worker.worker_id=payment.worker_id";
$query = $dbh -> prepare($sql);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

                                        <div class="row" id="printablediv">
                                            <div class="input-field col s12" >
                                            <table>
<tr><td>Employee Name
                                                </td><td><?php echo htmlentities($result->f_name );?> <?php echo htmlentities($result->l_name );?></td></tr>
                                            </div>

                                            <div class="input-field col s12">
<tr><td font=> Employee Net Salary
                                                </td><td><?php echo htmlentities($result->net_sal);?></td></tr>
                                            </div>

                                            <div class="input-field col s12">
<tr><td>Month Paid
                                                </td><td><?php echo htmlentities($result->month);?> in year <?php echo htmlentities($result->year);?></td></tr><?php }} ?>
                                            </div>
                                             <div class="input-field col s12">
<tr style="display:none;"><td>Supporting document:
                                </td><td ><input type="file" name="file1" class="form-control">
                                                <input type="text" name="editor" value="<?=$user_id?>">
</td></tr>
                                            </div>
                                            </table>
                                            </div></div>
                                            

                                            <div class="input-field col s12">





<div class="input-field col s12">
<button type="submit" name="update" class="waves-effect waves-light btn indigo m-b-xs">CONFIRM</button>
<button class="btn btn-default" onclick="javascript:printDiv('printablediv')" />PRINT</button>


</div>




                                        </div>
                                    
                                       
                                    </form>
                                </div>
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
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        
    </body>
</html>
<?php } ?> 
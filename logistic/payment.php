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
if(isset($_POST['calculate']))
{ 
$year3=$_POST['year2'];
$month3=$_POST['month2'];
$user=$_POST['user'];
$di=intval($_GET['useri']); 
$basic=$_POST['basic'];
$year1=$_POST['year'];
$month1=$_POST['month'];
$earning=$_POST['earning'];
$deduction=$_POST['deduction'];
$other_month=date('M');
$net2=$basic+$earning;
$net1=$net2-$deduction;
if (($year3 != $year1 AND $month3 != $month1) OR ($year3 == $year1 AND $month3 != $month1) OR ($year3 != $year1 AND $month3 == $month1)){
    # code...

$sql="INSERT INTO payment(worker_id,tot_amount,net_sal,bonus,charges,year,month,user_id,months) VALUES(:di,:basic,:net1,:earning,:deduction,:year1,:month1,:user,:other_month)";
$query = $dbh->prepare($sql);
$query->bindParam(':basic',$basic,PDO::PARAM_STR);
$query->bindParam(':other_month',$other_month,PDO::PARAM_STR);
$query->bindParam(':earning',$earning,PDO::PARAM_STR);
$query->bindParam(':deduction',$deduction,PDO::PARAM_STR);
$query->bindParam(':net1',$net1,PDO::PARAM_STR);
$query->bindParam(':di',$di,PDO::PARAM_STR);
$query->bindParam(':month1',$month1,PDO::PARAM_STR);
$query->bindParam(':year1',$year1,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

$msg="salary  Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
else
{
    $error=" That Month Already Paid";
}
}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Payroll Summary</title>
        
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
    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Payroll Summary</div>
                    </div>
                    <div class="col s12 m12 l6">
                        <div class="card">
                            <div class="card-content">
                              
                                <div class="row">
                                    <form class="col s12" name="chngpwd" method="post">
                                          <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?><table><tr><td>Basic Salary</td><td>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <?php 

                                                  $di=intval($_GET['useri']);  
                                                $sql = "SELECT * from worker,payment,functions where payment.worker_id=:di AND functions.worker_id and worker.worker_id=payment.worker_id";
                                                 
$query = $dbh -> prepare($sql);
$query->bindParam(':di',$di,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{
    $net=$result->net_salary;
    $e=$result->month;
    $d=$result->year;

}}?>

                                                <?php
                                                 $di=intval($_GET['useri']);  
                                                 $sql = "SELECT * from functions where worker_id='$di' ORDER BY f_id DESC LIMIT 0,1 ";
                                                
$query = $dbh -> prepare($sql);
$query->bindParam(':di',$di,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
$net=$result->net_salary;
  ?>      


<input id="basic" type="text"  class="validate" autocomplete="off" name="basic" value="<?=$net?>" readonly>
                                                <label for="deptname"> Rwandan Francs
                                                    <?php }} ?>

</label>
                                            </div></td></tr>
                                            <tr><td>Month</td><td>
    <select  name="month" autocomplete="off">
<option value="">Select Month.. </option>                                          
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
</select></td></tr>
<tr><td>Year</td><td>
     <select class="form-control" name="year">
              <?php
              $tim=date('Y')+1;

               foreach(range(date('Y',time()),$tim) as $r) echo '<option>'.$r.'</option>'; ?>
              </select>
</div>
</div>

</div>
</td></tr>


<tr><td>Earning</td><td>
          <div class="input-field col s12">
<input id="earning" type="text"  class="validate" autocomplete="off" name="earning"  required>
                                                <label for="deptshortname">Rwandan Francs</label>
                                            </div></td></tr>
                                            <tr><td>Deduction</td><td>
          <div class="input-field col s12">
<input id="deduction" type="text"  class="validate" autocomplete="off" name="deduction"  value=0 required>
                                                <label for="deptshortname">Rwandan Francs</label>
                                            </div></td></tr>
        
<input type="hidden" name="user" value="<?=$user_id?>">
<input type="hidden" name="month2" value="<?=$e?>">
<input type="hidden" name="year2" value="<?=$d?>">


<tr><td><div class="input-field col s12">
<button type="submit" name="calculate" class="waves-effect waves-light btn indigo m-b-xs">Submit</button>
</div>
</td>
</tr>
</table>




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
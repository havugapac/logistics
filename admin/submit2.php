<?php
session_start();
error_reporting(0);
  // include_once '../config.php';
if(strlen($_SESSION['code'])=="" && strlen($_SESSION['worker_id'])=="")
    {   
    header("Location:../index.php"); 
    }
    else{
        include('sessions.php');
       
if(isset($_POST['apply']))
{
$user1=$_POST['user'];   
 $item=$_POST['item'];
 
$qnty=$_POST['qnty'];  
$isread=0;

$sql="INSERT INTO ap_item (itemname,qnty,user_id,is_read) VALUES(:item,:qnty,:user1,:isread)";
$query = $dbh->prepare($sql);
$query->bindParam(':item',$item,PDO::PARAM_STR);
$query->bindParam(':qnty',$qnty,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':user1',$user1,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Item applied successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Submit Item</title>
        
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
                        <div class="page-title">Submit Item</div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
<form action="#" method="post">
    <table align="center">
        <tr><th colspan="2"><font color="black" size="6">Items submission by employees</font></th></tr>
        <tr><td>Enter the employee code:</td><td><input type="text" name="code" placeholder="Employee code" required style="border-radius:0.4em;" value="<?php
        if(isset($_POST['searc']))
        {
    $code=$_POST['code']; echo $code;}?>"><input type="submit" name="searc" value="View items"></td></tr>

        <tr><td>Select item:</td><td>
      <select name="item">
        <?php
        if(isset($_POST['searc']))
        {
       $code=$_POST['code'];
       

       $con=new pdo('mysql:dbname=hr;host=localhost','root','');
       $sele1="select * from worker,given_items,items where worker.worker_id=given_items.worker_id and given_items.item_id=items.item_id and worker.code='$code'";     
        
        $re=$con->query($sele1);
        $re->setFetchMode(PDO::FETCH_ASSOC);
        while($data=$re->fetch())
        {
          echo "<option>".$data['item_name']."</option>";
        }
      }

        ?>
      </select>
    </td></tr>
    <tr><td>Enter items quantity to be submitted:</td><td><input type="text" name="nber" placeholder="item nber" style="border-radius:0.4em;"></td></tr>
    <tr><td>Reason to submit:</td><td>
      <select name="reason">
        <option>--select reason--</option>
        <option>done to use</option>
        <option>out of order</option>
      </select>
    </td></tr>
        <tr><td></td><td><input type="submit" name="reg" value="Confirm" style="border-radius:0.4em;background-color:lightblue;"></td></tr>
    </table>
    </form>
    <?php
    if(isset($_POST['reg']))
    {
    $item=$_POST['item'];
    $code=$_POST['code'];
    $reason=$_POST['reason'];
    $nber=$_POST['nber'];
    
    if($reason!="--select reason--")
    {
    $con=new pdo('mysql:dbname=hr;hos=localhost','root','');

    $sele10="select * from worker where code='$code'";
    $qry10=$con->query($sele10);
    $qry10->setFetchMode(PDO::FETCH_ASSOC);
    $row10=$qry10->fetch();
    $emp_id=$row10['worker_id'];

    $sele20="select * from items where item_name='$item'";
    $qry20=$con->query($sele20);
    $qry20->setFetchMode(PDO::FETCH_ASSOC);
    $row20=$qry20->fetch();
    $itm_id=$row20['item_id'];
    $itm_nber=$row20['item_number'];

    $sele25="select * from given_items where worker_id=' $emp_id' and item_id='$itm_id'";
    $qry25=$con->query($sele25);
    $qry25->setFetchMode(PDO::FETCH_ASSOC);
    $row25=$qry25->fetch();
    $qty=$row25['quantity'];
    
    $remain=$qty-$nber;

    if($reason=="done to use")
    {
    if($remain==0)
    {
    $delt="delete from given_items where worker_id='$emp_id' and item_id='$itm_id'";
    $delet=$con->query($delt);
   
    $new_nber=$itm_nber+$qty;

    if($delet)
     {
    $extend="update items set item_number='$new_nber' where item_id='$itm_id'";
    $resu=$con->query($extend);

    if($resu)
     {
      echo"<script> alert('well submited')</script>";
      echo"<script> location.href='submit2.php'</script>";
     }
     }
    }

    if($remain>0)
    {
    $delt2="update given_items set quantity='$remain' where worker_id='$emp_id' and item_id='$itm_id'";
    $delet2=$con->query($delt2);
   
    $new_nber2=$itm_nber+$nber; 

    if($delet2)
     {
    $extend2="update items set item_number='$new_nber2' where item_id='$itm_id'";
    $resu2=$con->query($extend2);

    if($resu2)
     {
      echo"<script> alert('well submited')</script>";
      echo"<script> location.href='submit2.php'</script>";
     }
     } 
    }

    if($remain<0)
    {
    echo"<script> alert('you entered more items than given pls')</script>";
    echo"<script> location.href='submit2.php'</script>";  
    }
    }

    if($reason=="out of order")
    {
   if($remain==0)
    {
    $delt3="delete from given_items where worker_id='$emp_id' and item_id='$itm_id'";
    $resu3=$con->query($delt3); 

    if($resu3)
    {

   $insert="insert into outoforder(item_id,item_numb) values('$itm_id','$nber')";
   $resu4=$con->query($insert);

   if($resu4)
   {
    echo"<script> alert('well submited')</script>";
    echo"<script> location.href='submit2.php'</script>";
   }
    }
    }
   if($remain>0)
    {
    $delt5="update given_items set quantity='$remain' where worker_id='$emp_id' and item_id='$itm_id'";
    $resu5=$con->query($delt5); 

    if($resu5)
    {

   $insert2="insert into outoforder(item_id,item_numb) values('$itm_id','$nber')";
   $resu6=$con->query($insert2);

   if($resu6)
   {
    echo"<script> alert('well submited')</script>";
    echo"<script> location.href='submit2.php'</script>";
   }
    }  
    }
    
    if($remain<0)
    {
    echo"<script> alert('you entered more items than given pls')</script>";
    echo"<script> location.href='submit2.php'</script>";  
    }
    }

    }
    else
    {
      echo"<script> alert('pls select correct reason')</script>";
      echo"<script> location.href='submit2.php'</script>";
    }
    }
    ?>
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
          <script src="../assets/js/pages/form-input-mask.js"></script>
                <script src="../assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    </body>
</html>
<?php } ?> 
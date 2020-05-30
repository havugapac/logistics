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

    $con=new pdo('mysql:dbname=hr;host=localhost','root','');
    $sele2="select * from items where item_id='$item'";
    $qry2=$con->query($sele2);
    $qry2->setFetchMode(PDO::FETCH_ASSOC);
    $row2=$qry2->fetch();
    $itm_nber=$row2['item_number'];
    $itm_nm=$row2['item_name'];
 
    if($itm_nber>0)
    {
    $conn=mysqli_connect('localhost','root','','hr');
    $existing=mysqli_query($conn,"select * from given_items where worker_id='$user1' and item_id='$item' ");
    
    
    $numRows=mysqli_num_rows($existing);

    if($numRows==1 and $itm_nm!='water')
    {

    echo"<script> alert('an employee was given the same item')</script>";
    echo"<script> location.href='apply-item.php'</script>";
 
    }
    else
    {


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

}
else
    {
      echo"<script> alert('items were exhausted pls')</script>";
      echo"<script> location.href='apply-item.php'</script>";
    }
}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Employe | Apply Item</title>
        
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
                        <div class="page-title">Apply for Item</div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3>Apply for Item</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="input-field col  s12">
<select  name="item" autocomplete="off" >
<option value="">Select Item...</option>
<?php $sql = "SELECT  * from items ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  

 ?>                                            
<option value="<?php echo htmlentities($result->item_id);?>"><?php echo htmlentities($result->item_name);?></option>
<?php }} ?>
</select>

</div>





<div class="input-field col m12 s12">
<label for="birthdate">Item in number</label>    

<input type="text" name="qnty">
</div>
<input type="hidden" name="user" value="<?=$user_id?>">
</div>
      <button type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">Apply</button>                                             

                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
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
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
          <script src="../assets/js/pages/form-input-mask.js"></script>
                <script src="../assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    </body>
</html>
<?php } ?> 
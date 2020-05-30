<?php
session_start();
error_reporting(0);
  
if(strlen($_SESSION['code'])=="" && strlen($_SESSION['worker_id'])=="")
    {   
    header("Location:../index.php"); 
    }
    else{
        include('sessions.php');
$isread=1;
$did=intval($_GET['apid']);  
$sql="update ap_item set is_read=:isread where ap_id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();


    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
         <title>Admin | Message Board</title>

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
              <div id="bd">

        <?php
       
        $con=new pdo('mysql:dbname=hr;host=localhost','root','');
        $sel="select * from ap_item,items where ap_item.itemname=items.item_id and ap_item.ap_id='$did'";
        $re=$con->query($sel);
        $re->setFetchMode(PDO::FETCH_ASSOC);
        $data=$re->fetch();
        $id=$data['user_id'];
        
        ?> 
  <form action="#" method="post">
  <table align="center">
    <tr><th colspan="2"><h1>Items giving to employees</h1></th></tr>
    <tr><td><input type="text" name="itm" placeholder="Employee code" required style="border-radius:0.4em; width: 30%" value="<?php echo $data['item_name'];?>"></td></tr>

    <tr><td>
      <input type="text" name="qty" placeholder="Employee code" required style="border-radius:0.4em; width: 30%" value="<?php echo $data['qnty'];?>">

    </td></tr>
    <tr><td><input type="submit" name="reg" value="register" style="border-radius:0.4em;background-color:lightblue;"></td></tr>
  </table>
    </form>
    <?php
    if(isset($_POST['reg']))
    {
    $itm=$_POST['itm'];
    $qty=$_POST['qty'];
    $mn=date('M');

    $yr=date('Y');

    $con=new pdo('mysql:dbname=hr;host=localhost','root','');


    $sele2="select * from items where item_name='$itm'";
    $qry2=$con->query($sele2);
    $qry2->setFetchMode(PDO::FETCH_ASSOC);
    $row2=$qry2->fetch();
    $itm_id=$row2['item_id'];
    $itm_nber=$row2['item_number'];

    if($itm_nber>0)
    {
    $conn=mysqli_connect('localhost','root','','hr');
    $existing=mysqli_query($conn,"select * from given_items where worker_id='$id' and item_id='$itm_id'");
    
    
    $numRows=mysqli_num_rows($existing);

    if($numRows==1)
    {

    $dele="delete from ap_item where ap_id='$did'";
    $resu4=$con->query($dele);
    if($dele)
    {
    echo"<script> alert('an employee was given the same item')</script>";
    echo"<script> location.href='giveitem.php'</script>";
    } 
    }
    elseif($numRows!=1)
    {

    $new_nber=$itm_nber-$qty;

    $reduce="update items set item_number='$new_nber' where item_id='$itm_id'";
    $resu=$con->query($reduce);
     
     if($resu)
     {
     $give="insert into given_items(worker_id,item_id,quantity,month,year) values('$id','$itm_id','$qty','$mn','$yr')";
     $resu2=$con->query($give);
    
     if($resu2)
     {
     $del="delete from ap_item where ap_id='$did'";
     $resu3=$con->query($del);
     

     if($resu3)
     {
      echo"<script> alert('well given')</script>";
      echo"<script> location.href='giveitem.php'</script>";
     }
     }
     }
    }
    }
    else
    {
      echo"<script> alert('items were exhausted pls')</script>";
      echo"<script> location.href='giveitem.php'</script>";
    }
    }
    ?>
  
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
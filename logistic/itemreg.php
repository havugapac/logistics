<?php
session_start();
error_reporting(0);
  
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
    <div id="bd">
    <form action="#" method="post">
    <table align="center">
        <tr><th colspan="2"><h1>Pls register new item</h1></th></tr>
        <tr><td><input type="text" name="item" placeholder="Item name" required style="border-radius:0.4em; width: 30%"></td></tr>
        <tr><td><input type="text" name="nber" placeholder="Items number" required style="border-radius:0.4em; width: 30%"></td></tr>
        <tr><td><input type="submit" name="reg" value="register" style="border-radius:0.4em;background-color:lightblue;"></td></tr>
    </table>
    </form>
    <?php
    if(isset($_POST['reg']))
    {
    $item=$_POST['item'];
    $nber=$_POST['nber'];

    $con=new pdo('mysql:dbname=hr;host=localhost','root','');

    $insert="insert into items(item_name,item_number) value('$item','$nber')";
    $qry=$con->query($insert);

    if($qry)
    {
        echo "<script> alert('well registered')</script>";
        echo "<script> location.href='itemreg.php'</script>";
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
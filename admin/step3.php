<?php
session_start(); 
//error_reporting(0); 
if(strlen($_SESSION['code'])=="")
    {   
    header("Location:index.php"); 
    }
    else
    {//include auth.php file on all secure pages
      //$worker=$_GET['user'];
      include('sessions.php');
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
 
$long=$_POST['long']; 
$leav=$_POST['leav'];
$sql="INSERT INTO igihe_leave(i_id,longeur,l_id) VALUES 
(null,:long,:leav)";
$query = $dbh->prepare($sql);
$query->bindParam(':long',$long,PDO::PARAM_STR);
$query->bindParam(':leav',$leav,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
?>
<script> alert('successfull');</script>
 <?php       
}
else 
{?>

<script> alert('unsuccessfull');</script>
     <?php
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="salomon">

    <title></title>

    <script>
      <!--
        var ScrollMsg= "HUMAN RESOURCE MANAGMENT SYSTEM - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="employee/assets/must.png" rel="shortcut icon">
    <link href="employee/assets/css/justified-nav.css" rel="stylesheet">


    <link href="employee/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="employee/assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="employee/assets/css/dataTables.min.css">

  </head>
  <body style="background-color:#B4B1B0;">

    <div class="container" style="background-color:#ffff;">
     <?php
                include 'assets/includes/top.php';?>
  <br><br>

           <form id=""  action="" method="POST" enctype="multipart/form-data">

    <div class="frmDronpDown">
    <?php
require_once ("DBController.php");
$dbh = new DBController();
$query = "SELECT * FROM leave_type";
$leaves = $dbh->runQuery($query);
?>
        <div class="row">
            <label>Leave type:</label><br/> 
            <select class="form-control" name="leav" id="lev_list" class="demoInputBox"onChange="gettime();" required >
                <option value="">----hitamo-----</option>
<?php
foreach ($leaves as $leavet) {
    ?>
<option value="<?php echo $leavet["l_id"]; ?>"><?php echo $leavet["lev_name"]; ?></option>
<?php
}
?>
</select>
        </div>
        <div class="row">
            <label>Time:</label><br/> 
            <select class="form-control" name="long" id="time-list" class="demoInputBox"onChange="getparish();" required>
                <option value="">Select District</option>
            </select>
        </div>
        
        <div class="row">
            <input type="submit" class="btn btn-success" name="submit" value="BYEMEZE">
        </div>
    </div>
</body>
 </div>
</form>
    

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="employee/assets/js/jquery.min.js"></script>
    <script src="employee/assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="employee/assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="employee/assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    

    <script src="jquery-2.1.1.min.js"type="text/javascript"></script>
<script>
function gettime() {
        var str='';
        var val=document.getElementById('lev_list');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1); 
        
    $.ajax({          
            type: "GET", 
            url: "get_districts.php",
            data:'lev_id='+str,
            success: function(data){
                $("#time-list").html(data);
            }
    });
}

</script>

  </body>
</html>
<?php } ?>
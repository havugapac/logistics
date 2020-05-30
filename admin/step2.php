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
{
?>
<br /><div style="box-shadow:0 0px 0px 0 rgba(0,0,0,0.2),0 0px 0px 0 rgba(0,0,0,0.19);size:15px; text-align:center; color:#DE0B9B;background:#E8CA8A;border-bottom:1px solid #ccc;">Well done Registered successful<a class="btn btn-success" href="workerdetails.php?user=<?=$worker;?>"><h3 class="fa fa-share">more</h3></a></div>
 <?php       
}
else 
{?>
     <br/><p style="box-shadow:0 0px 1px 0 rgba(0,0,0,0.3),0 0px 0px 0 rgba(0,0,0,0.29);size:25px; text-align:center; color:white;background:red;border-bottom:3px solid #ccc;">Sorry!, fail to register try again!!!</p>
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
 
        <div class="form-group">
                  <label class="col-sm-4 control-label">Department</label>
                  <div class="col-sm-8">
                   <input type="text" name="function"  class="form-control"  maxlength="16"   placeholder="Department" required/>
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
                    <option value="admin">admin</option>
                    <option value="employee">employee</option>
                    
                    <option value="logistic">logistic</option>
                    <option value="driver">driver</option>
                    
                  </select>
                  </div>
                </div>
                <input style="display:none;" type="text" name="user" value="<?=$user_id?>">
                <div class="row">
            <input type="submit" class="btn btn-success" name="submit" value="CONFIRM">
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
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>
<?php } ?>
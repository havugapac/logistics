<?php
session_start();  
if(strlen($_SESSION['code'])=="")
    {   
    header("Location:index.php"); 
    }
    else
    {

  //include("auth.php"); //include auth.php file on all secure pages
  //include("add_employee.php");
      include_once 'sessions.php';
       $conn = mysql_connect('localhost', 'root', '');
  if (!$conn)
  {
    die("Database Connection Failed" . mysql_error());
  }

  $select_db = mysql_select_db('hr');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysql_error());
  }
  

  if(isset($_POST['submit'])!="")
  {
   @$fname=$_POST['fname'];  
@$lname = $_POST['lname'];
@$gender=$_POST['gender'];  
@$dob=$_POST['dob'];  
@$m_status = $_POST['m_status'];
@$province=$_POST['province']; 
@$district=$_POST['district'];  
@$sector = $_POST['sector'];
@$cell=$_POST['cell']; 
@$recruitment=$_POST['recruitment'];  
@$education = $_POST['education'];
@$nid1=$_POST['nid'];  
@$salary=$_POST['salary']; 
@$account= $_POST['account'];
@$bank=$_POST['bank']; 
@$poste=$_POST['poste']; 
@$phone=$_POST['phone'];
@$email=$_POST['email'];
@$code1=$_POST['username'];
@$driving=$_POST['driving'];
$password=$_POST['pass'];
$useid=$_POST['editor'];
$status='normal';
$name='user.png'; 


  include("../connection.php");
              $name='user.png';
        $_Sql="INSERT INTO worker(worker_id,f_name,l_name,gender,dob,m_status,province,district,sector,cell,recret_date,edu_level,nid,account,bank,phone,email,code,password,photo,status,user_id,timess,driving) values (null,'$fname','$lname','$gender','$dob','$m_status','$province','$district','$sector','$cell','$recruitment','$education','$nid1','$account','$bank','$phone','$email','$code1','$password','$name','$status','$useid',null)";
      $result=(mysqli_query($dbh,$_Sql));//(mysqli_query($conn,$_Sql));
      if($result)
      { 
        echo "<meta http-equiv='refresh' content='0;url=step2.php'>";

    ?>
   <script>
        alert(' successfully!!!!');
        </script>
    <?php
        }
      else
      {
        echo "<meta http-equiv='refresh' content='0;url=home_employee.php'>";
        ?>
        <script>
        alert('This not successfully!!!!')
        </script>
            
     <?php
    
        }
  }
?>
   <?php
function username_generate($chars) 
{
  $data = '1234567890123456789012345678901234567890';
  return substr(str_shuffle($data), 0, $chars);
}
  $code1=username_generate(4)."\n";
 
    
  function password_generate($chars) 
{
  $data = '12!345?6789@0ABC!DEFG%HIJK?LMNOP!QRSTUV?WXYZa@bce!fg@hij?klmn?opqr@%%stuv!!wxyz';
  return substr(str_shuffle($data), 0, $chars);
}
  $password=password_generate(8)."\n";
    
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

    <title> LOGISTIC ACTIVITIES</title>

    <script>
      <!--
        var ScrollMsg= "LOGISTIC ACTIVITIES"
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

    <div class="container" >
    <?php
                include 'assets/includes/top.php';?>
      <div class="masthead">
        <h3>
          <b><a href="index.php">LOGISTIC ACTIVITIES MANAGEMENT SYSTEM</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b><?=$fname?>&nbsp;<?=$lname?></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active">
              <a href="">Employee</a>
            </li>
            <li>
              <a href="blocked_users.php">Blockes Employees</a>
            </li>
            <li>
              <a href="fired_users.php">Fired Employees</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                
                <p align="center"><big><b>List of Employees</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-striped" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                        <th><p align="center">No</p></th>
                        <th><p align="center">Code</p></th>
                          <th><p align="">First Name</p></th>
                          <th><p align="center">Last Name</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">Function</p></th>
                          <th><p align="center">Telephone</p></th>
                          <th><p align="center">Email</p></th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $conn = mysql_connect('localhost', 'root', '');
                          if (!$conn)
                          {
                            die("Database Connection Failed" . mysql_error());
                          }

                          $select_db = mysql_select_db('hr');
                          if (!$select_db)
                          {
                            die("Database Selection Failed" . mysql_error());
                          }
                          $cnt=1;
                          $query=mysql_query("SELECT * FROM worker,functions,provinces,districts,sector  WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.status='normal'   ORDER BY functions.f_id DESC")or die(mysql_error());
                          while($row=mysql_fetch_array($query))
                          {
                            $code     =$row['code'];
                            $lname  =$row['l_name'];
                            $fname  =$row['f_name'];  
                             $gender  =$row['gender'];                          
                            $funct   =$row['functions'];
                            $phone   =$row['phone'];
                            $Email   =$row['email'];
                        ?>

                        <tr>
                        <td align=""><a href="workerdetails.php?user=<?php echo $row["worker_id"]; ?>" title="Update"><?php echo $cnt ?>  </a></td>
                        <td align="center"><a href="workerdetails.php?user=<?php echo $row["worker_id"]; ?>" title="Update"><?php echo $row['code'] ?>,  </a></td>
                          <td align="center"><a href="workerdetails.php?user=<?php echo $row["worker_id"]; ?>" title="Update"><?php echo $row['f_name'] ?></a></td>
                          <td><a href="workerdetails.php?user=<?php echo $row["worker_id"]; ?>" title="Update">  <?php echo $row['l_name'] ?></a></td>
                          <td align="center"><a href="workerdetails.php?user=<?php echo $row["worker_id"]; ?>" title="Update"><?php echo $row['gender'] ?></a></td>
                          <td align="center"><a href="workerdetails.php?user=<?php echo $row["worker_id"]; ?>" title="Update"><?php echo $row['functions'] ?></a></td>
                          <td align="center"><a href="workerdetails.php?user=<?php echo $row["worker_id"]; ?>" title="Update"><?php echo $row['phone'] ?></a></td>
                          <td align="center"><a href="workerdetails.php?user=<?php echo $row["worker_id"]; ?>" title="Update"><?php echo $row['email'] ?></a></td>
                          
                            
                         
                        </tr>

                        <?php $cnt=$cnt+1;} ?>
                      </tbody>
                      
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Employee</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Firstname</label>
                  <div class="col-sm-8">
                   <input type="text" class="form-control" name="fname"  required  placeholder="Izina rye" />
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-sm-4 control-label">Lastname </label>
                  <div class="col-sm-8">
                    <input type="text" name="lname"  class="form-control" required placeholder="Irindi zina" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Gender</label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control" placeholder="Gender" required>
                      <option value="">Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Birth of Date</label>
                  <div class="col-sm-8">
                    <input id="birthdate" class="form-control" name="dob" type="date" class="datepicker" autocomplete="off" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Martial status:</label>
                  <div class="col-sm-8">
               <select name="m_status" class="form-control" >
     <option  value="" >---Select your Martial status----</option>
     <option value="Single" >Single</option>
     <option  value="Maried">Maried</option>
     </select>
                  </div>
                </div>
                 
                 
                   <?php
require_once ("DBController.php");
$dbh = new DBController();
$query = "SELECT * FROM provinces";
$countryResult = $dbh->runQuery($query);
?>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Province:</label>
                  <div class="col-sm-8">
                    <select name="province" 
                id="province-list" class="form-control" onChange="getdist();" required >                
                <option value="">------Select province-------</option>
<?php
foreach ($countryResult as $province) {
    ?>
<option value="<?php echo $province["ID"]; ?>"><?php echo $province["Provincename"]; ?></option>
<?php
}
?>
</select>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">District</label>
                  <div class="col-sm-8">
                    <select name="district"
                id="dist-list" class="form-control" onChange="getsector();" required>
                <option value="">----Select District----</option>
                
            </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Sector</label>
                  <div class="col-sm-8">
                    <select name="sector"
                id="sector-list" class="form-control" onchange="getkanisa();" required >
                <option value="">----Hitamo umurenge-----</option>
               
            </select>
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="col-sm-4 control-label">Cells:</label>
                  <div class="col-sm-8">
                   <input type="text" name="cell"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Andika akagari"  />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Educationl level:</label>
                  <div class="col-sm-8">
                    <select name="education" class="form-control">
     <option  value="" >---Select education level----</option>
     <option value="Prof" >Prof</option>
     <option  value="PhD">PhD</option>
     <option value="Masters" >Masters</option>
     <option  value="A0">A0</option>
     <option value="A1" >A1</option>
     <option  value="A2">A2</option>
     <option value="S5" >S5</option>
     <option  value="S4">S4</option>
     <option value="S3" >S3</option>
     <option  value="S2">S2</option>
     <option value="S1" >S1</option>
      <option  value="8"> 8</option>
     <option  value="Primary">Primary</option>
     <option  value="Under Primary">Under Primary</option>
     <option  value="Didn't study">Didn't study</option>
     <option  value="Don't know">Don't know</option>

     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Recruitment Date</label>
                  <div class="col-sm-8">
                    <input id="birthdate" class="form-control" name="recruitment" type="date" class="datepicker" autocomplete="off" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">National Identity</label>
                  <div class="col-sm-8">
                   <input type="text" name="nid"  class="form-control" minlength="16" maxlength="16"   placeholder="National Date" />
                  </div>
                </div>
                 
                <div class="form-group">
                  <label class="col-sm-4 control-label">Account number</label>
                  <div class="col-sm-8">
                  <input type="text" name="account" class="form-control"  placeholder="write Account Number" />
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">Bank</label>
                  <div class="col-sm-8">
                   <input type="text" name="bank" class="form-control" placeholder="bank" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-4 control-label">Telephone</label>
                  <div class="col-sm-8">
                  <input type="text" name="phone" class="form-control" minlength="10" maxlength="10" required pattern="^[0-9]+"placeholder="write Telephone Number"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">E-mail</label>
                  <div class="col-sm-8">
                   <input type="text" name="email" class="form-control"  placeholder="Andikamo E-mail"/>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-4 control-label">E-mail</label>
                  <div class="col-sm-8">
                   <input type="text" name="email" class="form-control"  placeholder="Andikamo E-mail"/>
                  </div>
                </div>
                   <div class="form-group">
                  <label class="col-sm-4 control-label">Driving</label>
                  <div class="col-sm-8">
                   <input type="text" name="driving" class="form-control"  placeholder="Andikamo no"/>
                  </div>
                </div>
                <input  style="display:none;"type="text" name="username" value="WK<?=$code1?>" class="form-control" required placeholder="Type the username"/> 
   <input style="display:none;" type="text" name="pass" value="<?=$password?>" class="form-control"  placeholder="Type password" required/> 
   <input style="display:none;" type="text" name="editor" value="<?=$user_id?>" class="form-control"required/> 
   <input style="display:none;" type="file" class="form-control" name="file" class="input_text" />

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

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
function getdist() {
        var str='';
        var val=document.getElementById('province-list');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str += val[i].value + ','; 
            }
        }         
        var str=str.slice(0,str.length -1); 
        
    $.ajax({          
            type: "GET", 
            url: "get_districts.php",
            data:'province_id='+str,
            success: function(data){
                $("#dist-list").html(data);
            }
    });
}
function getsector() {
        var str1='';
        var val=document.getElementById('dist-list');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str1 += val[i].value + ','; 
            }
        }         
        var str1=str1.slice(0,str1.length -1); 
        
    $.ajax({          
            type: "GET",
            url: "get_districts.php",
            data:'dist_id='+str1,
            success: function(data){
                $("#sector-list").html(data);
            }
    });
}
function getkanisa() {
        var str2='';
        var val=document.getElementById('sector-list');
        for (i=0;i< val.length;i++) { 
            if(val[i].selected){
                str2 += val[i].value + ','; 
            }
        }         
        var str2=str2.slice(0,str2.length -1); 
        
    $.ajax({          
            type: "GET",
            url: "get_districts.php",
            data:'cell_id='+str2,
            success: function(data){
                $("#ikanisa-list").html(data);
            }
    });
}
</script>
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
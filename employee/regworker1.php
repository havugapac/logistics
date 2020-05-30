  <?php
session_start();  
  include_once 'sessions.php';
if(strlen($_SESSION['code'])=="")
    {   
    header("Location:index.php"); 
    }
    else
    {
       
?>
<!DOCTYPE html>

<html lang="en">
  <?php include('date1.php'); ?>
  <link rel="stylesheet" href="../bootstrap/css/style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- bootstrap theme-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="../bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../bootstrap/windowfiles/dhtmlwindow.css" type="text/css" />

 

 
   <style>

.frmDronpDown {
    border: 1px solid #7ddaff;
    background-color: #C8EEFD;
    margin: 2px 0px;
    padding: 40px;
    border-radius: 4px;
}

.demoInputBox {
    padding: 10px;
    border: #bdbdbd 1px solid;
    border-radius: 4px;
    background-color: #FFF;
    width: 50%;
}

.row {
    padding-bottom: 15px;
}
</style>
   <?php
function username_generate($chars) 
{
  $data = '1234567890123456789012345678901234567890';
  return substr(str_shuffle($data), 0, $chars);
}
  $code=username_generate(4)."\n";
 
    
  function password_generate($chars) 
{
  $data = '12!345?6789@0ABC!DEFG%HIJK?LMNOP!QRSTUV?WXYZa@bce!fg@hij?klmn?opqr@%%stuv!!wxyz';
  return substr(str_shuffle($data), 0, $chars);
}
  $password=password_generate(8)."\n";
    
?> <?php

     if(isset($_POST['save']))
     {
           
        //$cid = $_POST['cid'];
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
@$nid=$_POST['nid'];  
@$salary=$_POST['salary']; 
@$account= $_POST['account'];
@$bank=$_POST['bank']; 
@$poste=$_POST['poste']; 
@$phone=$_POST['phone'];
@$email=$_POST['email'];
@$code=$_POST['username'];
$useid=$_POST['editor'];
$status='normal';        
     
    include("../connection.php");
              $name='user.png';
        $_Sql="INSERT INTO worker(worker_id,f_name,l_name,gender,dob,m_status,province,district,sector,cell,recret_date,edu_level,nid,account,bank,phone,email,code,password,photo,status,user_id,timess) values (null,'$fname','$lname','$gender','$dob','$m_status','$province','$district','$sector','$cell','$recruitment','$education','$nid','$account','$bank','$phone','$email','$code','$password','$name','$status','$user_id',null)";
           
      
            
      $result=(mysqli_query($dbh,$_Sql));//(mysqli_query($conn,$_Sql));
      if($result)
      { 
        echo "<meta http-equiv='refresh' content='0;url=regworker1.php'>";

    ?>
   <script>
        alert(' successfully!!!!');
        </script>
    <?php
        }
      else
      {
        echo "<meta http-equiv='refresh' content='0;url=regworker1.php'>";
        ?>
        <script>
        alert('This not successfully!!!!')
        </script>
            
     <?php
    
        } }
     
     ?>
      <div class="col md-8">

<form id="" method="post" name="addemp">
                                                   
                                                    <div class="col-lg-6"style="color:black;">                                                        
    
                <div  class="col-lg-6">First Name:<?=$user_id?><input type="text" class="form-control" name="fname"  required  placeholder="Izina rye" /> </div>
   <div class="col-lg-6">Last Name:<input type="text" name="lname"  class="form-control" required placeholder="Irindi zina" /> </div>
   <div class="col-lg-6">Gender:
   <select name="gender" class="" required >
     <option  value="" >----Select Sex-----</option>
     <option value="Male" >Male</option>
     <option  value="Female">Female</option>
     </select>
   </div>
    <div class="col-lg-6">Date of Birth: 
<input type="text" name="dob" class="form-control" id='arrival' onclick="ds_sh(this);"  style="cursor:"size='13'placeholder="Itariki y'Amavuko" autocomplete="on"></div>
   <div class="col-lg-6">Martial Status:
    <select name="m_status" class="" >
     <option  value="" >---Select your Martial status----</option>
     <option value="Single" >Single</option>
     <option  value="Maried">Maried</option>
     </select> </div>
   <?php
require_once ("DBController.php");
$dbh = new DBController();
$query = "SELECT * FROM provinces";
$countryResult = $dbh->runQuery($query);
?>
      <div  class="col-lg-6">Province:
         <select name="province" 
                id="province-list" class="" onChange="getdist();" required >                
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
       <div  class="col-lg-6">District:
    <select name="district"
                id="dist-list" class=""onChange="getsector();" required>
                <option value="">----Select District----</option>
                <option value="1">Nyarugenge</option>
            </select></div>
   <div  class="col-lg-6">Umurenge:
    <select name="sector"
                id="sector-list" class="" onchange="getkanisa();" required >
                <option value="">----Hitamo umurenge-----</option>
                 <option value="1">Muhima</option>
            </select>
   </div>
   <div  class="col-lg-6">Cell:<input type="text" name="cell"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Andika akagari"  /> </div>   
  
   
   </div>

     <div class="col-lg-6"style="color:black;"> 
     <div class="col-lg-6">Education Level:
    <select name="education" class="">
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

     </select> </div>
     
     <div class="col-lg-6">Recruitment Date:<input id="birthdate" name="dob" type="date" class="datepicker" autocomplete="off" > </div>                  
     
  <div class="col-lg-6">National Date:<input type="text" name="nid"  class="form-control" minlength="16" maxlength="16"   placeholder="National Date" /> </div>    
     <div  class="col-lg-6">Account Number:<input type="text" name="account" class="form-control"  placeholder="write Account Number" /> </div>
     <div  class="col-lg-6">Bank:<input type="text" name="bank" class="form-control" placeholder="bank" /> </div>
    <div class="col-lg-6">Net Salary:<input type="text" name="salary" class="form-control" placeholder="Net Salary"/> </div> 
 

   <div class="col-lg-6">Telephone Number:<input type="text" name="phone" class="form-control" minlength="10" maxlength="10" required pattern="^[0-9]+"placeholder="write Telephone Number"/> </div>
     <div  class="col-lg-6">E-mail:<input type="text" name="email" class="form-control"  placeholder="Andikamo E-mail"/> </div>
   <input  style="display:none;"type="text" name="username" value="WK<?=$code?>" class="form-control" required placeholder="Type the username"/> 
   <input style="display:none;" type="text" name="pass" value="<?=$password?>" class="form-control"  placeholder="Type password" required/> 
   <input style="display:none;" type="text" name="editor" value="<?=$user_id?>" class="form-control"required/> 
   <input style="display:none;" type="file" class="form-control" name="file" class="input_text" />
 <div class="col-lg-8"><input type="submit" id="submit" class="submit" value="Register worker" name="save" /></div><div class="col-lg-4"></div>
  

                                                </div>
                                           
                                            </form>
                                             </div>
          </div>
        </div>
        <p style="box-shadow:0 0px 0px 0 rgba(0,0,0,0.2),0 0px 0px 0 rgba(0,0,0,0.19);size:15px; text-align:center; color:white;background:#82B8F2;border-bottom:1px solid #ccc;">WORKER DETAILS IDENTIFICATION</p>
<script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
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
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php } ?>
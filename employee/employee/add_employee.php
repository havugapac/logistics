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
include_once '../sessions.php';
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
$name='user.png';

    $sql = mysql_query("INSERT INTO worker(worker_id,f_name,l_name,gender,dob,m_status,province,district,sector,cell,recret_date,edu_level,nid,account,bank,net_salary,phone,email,code,password,photo,status,user_id,timess) values (null,'$fname','$lname','$gender','$dob','$m_status','$province','$district','$sector','$cell','$recruitment','$education','$nid','$account','$bank','$salary','$phone','$email','$code','$password','$name','$status','$user_id',null");

    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }
  }
?>
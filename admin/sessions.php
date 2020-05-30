<?php
//error_reporting(0);

   include_once 'config.php';

        
 $name=$_SESSION['code']; 
 $worker=$_SESSION['worker_id'];
$pass = $_SESSION['password']; 

 $sql="SELECT * FROM worker,functions  
WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC)
 AND worker.worker_id=functions.worker_id  AND 
 worker.worker_id='$worker' AND worker.password='$pass'AND worker.code='$name' 
  ORDER BY functions.f_id DESC";
        $query = $dbh->prepare($sql);

$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
  $usercode=$result->code;
  $fname=$result->f_name;
  $lname=$result->l_name;  
  $user_id=$result->worker_id; 
  $function=$result->functions;
  $password=$result->password;
  $photo=$result->photo;


} 
}
?>



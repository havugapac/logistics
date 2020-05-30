<?php
/*session_start();
error_reporting(0);
if(strlen($_SESSION['username'])=="")
    {   
    header("Location: ../index.php"); 
    }
    else{ */
    //include('copy.php'); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = '../img/'; // upload directory
 
if(!empty($_POST['title']) || $_FILES['image'])
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name']; 
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION)); 
// can upload same image using rand function
$final_image = rand(1000,1000000).$img; 
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image);  
if(move_uploaded_file($tmp,$path)) 
{
	echo "<meta http-equiv='refresh' content='0;url=regchristian.php'>";
	?>
	<script>
alert('Christian has registered successful!!!!')
	</script>
	<?php
//echo "<img src='$path' width='200' heigth='300' />";
//echo "</br>";
//echo"<h3>This picture uploaded successful!!!!</h3>";
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];                    
            $gender= $_POST['gender'];
            $fath = $_POST['fath']; 
            $moth = $_POST['moth'];
            $dob = $_POST['dob']; 
            $prov = $_POST['prov'];
            $dist = $_POST['dist']; 
            $sect = $_POST['sect']; 
            $cell = $_POST['cell'];  
            $diocese =$_POST['dioc']; 
            $archidn =$_POST['archidn'];            
            $ddist= $_POST['ddist'];  
            $parish = $_POST['parish'];  
            $ikanisa= $_POST['ikanisa']; 
            $shingiro = $_POST['shingiro'];  
            $phone = $_POST['phone'];
            $email = $_POST['email']; 
            $mstatus = $_POST['mstatus']; 
            $status = 'normal'; 
 //include database configuration file
include_once '../includes/config.php';
 //insert form data in the database
$insert = $con->query("INSERT INTO  christian(chr_id,fname,lname,gender,father,mother,dob,province,district,sector,cell,diocese,archideacons,ddistrict,parish,ikanisa,itorero_shingiro,phone,email,photo,m_status,status,timess) 
                     VALUES(null,'$fname','$lname','$gender','$fath','$moth','$dob','$prov','$dist','$sect','$cell','$diocese','$archidn','$ddist','$parish','$ikanisa','$shingiro','$phone','$email','$path','$mstatus','$status','')");
}
} 
else 
{
echo 'invalid';
}
}
//}
?>
<?php
 error_reporting(0);
 session_start();
include 'sessions.php';
if(strlen($_SESSION['code'])=="")
    {   
    header("Location:index.php"); 
    }
    else{
//$code=$_SESSION['code'];
$id=$_SESSION['worker_id'];
 $user1=$_GET['user'];
 $sql=("SELECT * from worker where worker_id='$user1'");
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)  
{ 
$fname1=$result->f_name;
$lname1=$result->l_name;
$phot=$result->photo;
}} 
?>      
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$fname1?>&nbsp;<?=$lname1?></title>
    <meta name="description" content="Chuch Information Management System">
    <meta name="author" content="Winnatech Ltd">
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
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
    width: 70%;
}

.row {
    padding-bottom: 15px;
}
</style>
      </head>
        <body class="  ">
            <div class="bg-dark dk" id="wrap">
                <?php
include 'assets/includes/top.php'; ?>
<div class="main-bar">
            <h3>
              <i class="fa fa-pencil"></i>&nbsp;
           Editing Information on <?=$fname1?>&nbsp;<?=$lname1?>
          </h3>
                            </div>
                            <!-- /.main-bar -->

                </div>
                <!-- /#top -->
                <!-- left -->
                <?php
//include 'assets/includes/left.php';

?>

<!-- end of left -->
<div class="col-md-2"></div>                


<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 ">                    

<div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                        
                            
                
         <div class="box dark">
        <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
            <h5>MODIFICATION </h5>
            <!-- .toolbar -->
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                      <i class="fa fa-times"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
<body>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh sorry!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>

                                        <?php
                   
                   
                    
                function saveimage($name,$file_location){
                                    include('../connection.php');
                                    foreach ($_POST["id"] AS $id){
                                                        /*echo 'ID is ' .$id.'<br />';
                                                        echo 'Field1 is ' .$_POST["field1"][$id].'<br />';
                                                        echo 'Field2 is ' .$_POST["field2"][$id].'<br />';*/
                                                       $fname= $_POST["fname"];
                                                       $lname = $_POST["lname"];   
                                                       $dob= $_POST["dob"];
                                                       $status = $_POST["m_status"];
                                                       $recretment= $_POST["recretment"];
                                                       $education = $_POST["education"];
                                                       $nid= $_POST["nid"];
                                                       $account = $_POST["account"];
                                                       $bank = $_POST["bank"];  
                                                       $phone= $_POST["phone"];
                                                       $email = $_POST["email"];                                     

                                                        if($file_location){
       $update='UPDATE worker SET f_name="'.$fname.'",l_name="'.$lname.'",dob="'.$dob.'",m_status="'.$status.'",recret_date="'.$recretment.'",edu_level="'.$education.'",nid="'.$nid.'",account="'.$account.'",bank="'.$bank.'",email ="'. $email.' ", phone = "'.$phone.' ", photo = "'.$file_location.' " WHERE worker_id = "'.$id.'"';}
                                                        else{
         $update='UPDATE worker SET f_name="'.$fname.'",l_name="'.$lname.'",dob="'.$dob.'",m_status="'.$status.'",recret_date="'.$recretment.'",edu_level="'.$education.'",
nid="'.$nid.'",account="'.$account.'",bank="'.$bank.'",email ="'. $email.' ", phone = "'.$phone.' " WHERE worker_id = "'.$id.'"';
                                                        }
                                                        $res=mysqli_query($dbh,$update) or die ('Wapi');
                                                        if($res){
                                                          echo "<script>alert('Thank you Modification done successfully!!!');
window.location='editworker.php?user=".$id."'</script>";
                                                            }
                                                        else
                                                        {
                                                          ?>
                                                         <script>alert("Sorry Modification failed! Try again!!!!!");</script>
        <?php
        echo "<meta http-equiv='refresh' content='0;url=editworker.php?user=".$id."'>";


                                                        }
                                                    }
                                }
                                 include('../connection.php');
                    $sql="SELECT * from worker where worker_id='$user1' LIMIT 0,1";
                                $res=mysqli_query($dbh,$sql);
                                if(!$res)
                                {
                                    die("Query Failed!");
                                }
                                if( mysqli_num_rows($res) > 0){
                                     while($row=mysqli_fetch_assoc($res)){
                                       $kbs = $row['photo'];
                     echo'<form method="post" action="" enctype="multipart/form-data">
                <div class="col-md-6 pull-left">
                    <img class="img-circle center-block" src="../img/'.$kbs.'" alt="No picture" height="140" width="140"><br />
                    <div class="form-group">
                  <label style="font-size:10px" class="col-sm-4 control-label"> <span>Change Picture </span></label>
                  <div class="col-sm-8">
                    <input style="background-color:none;" class="form-control" type="file" name="file" value="'.$row["photo"].'" />
                  </div>
          </div>
                    <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>First Name: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="fname" value="'.$row["f_name"].'" placeholder="'.$row["f_name"].'" required />
                  </div>
            </div>  
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Other Name: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="lname" value="'.$row["l_name"].'" placeholder="'.$row["l_name"].'" required />
                  </div>
            </div> 
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Date of Birth: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="dob" value="'.$row["dob"].'" placeholder="'.$row["dob"].'" required />
                  </div>
            </div>  
                </div>
                <div class="col-md-6 pull-right">';
                    echo'
                        <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Telephone </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="phone" value="'.$row["phone"].'" placeholder="'.$row["phone"].'" required />
                  </div>
            </div>
                        <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>E-mail </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="email" value="'.$row["email"].'" placeholder="'.$row["email"].'" required />
                  </div>
                  </div>
                 
             <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Recruitment Date: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="recretment" value="'.$row["recret_date"].'" placeholder="'.$row["recret_date"].'" required />
                  </div>
            </div> 
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Martial Status: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="m_status" value="'.$row["m_status"].'" placeholder="'.$row["m_status"].'" required />
                  </div>
            </div> 
             <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Education Level: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="education" value="'.$row["edu_level"].'" placeholder="'.$row["edu_level"].'" required />
                  </div>
            </div> 
          
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Identity number: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="nid" value="'.$row["nid"].'" placeholder="'.$row["nid"].'" required />
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Account Number: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="account" value="'.$row["account"].'" placeholder="'.$row["account"].'" required />
                  </div>
            </div>
            <div class="form-group">
                  <label class="col-sm-4 control-label font"> <span>Bank: </span></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="bank" value="'.$row["bank"].'" placeholder="'.$row["bank"].'" required />
                  </div>
            </div>
              <input type="hidden" name="id[]" value="'.$row["worker_id"].'">

            </div>
                </div><br />
                <p class="lead">
                            <input type="submit" class="btn btn-success" name="save" value="Save Changes" /></p>
                       <a class="btn btn-info" href="blockuser.php?user='.$row["worker_id"].'">Block</a>
                             <a class="btn btn-danger" href="fire.php?user='.$row["worker_id"].'">Fire</a>
                    </form>';
                                }
                        }
                        if(isset($_POST["save"])){
                          if(isset($_FILES['file'])){
                              $targetFolder = "../img/";
                              $file_location = "";
                              $name = $_FILES['file']['name'];
                              $targetFolder = $targetFolder.basename($_FILES['file']['name']);
                              $file_location = $file_location.basename($_FILES['file']['name']);
                              $image_file_type = pathinfo($targetFolder,PATHINFO_EXTENSION);
                              $sitiuation = move_uploaded_file($_FILES['file']['tmp_name'],$targetFolder);
                              /*if(!$sitiuation)
                              {
                                echo "<h1 style='color:#000;'>Wapi bya Failinz  </h1>".$_FILES['file']['error'];
                              }else{*/
                                saveimage($name,$file_location);
                              /*}*/
                          }
                    }
                ?>

</div>
                     
                    </div>


    
    </div>
    
    </div>
    </div>

                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

                    

                    <!-- /#right -->
            </div>
            <!-- /#wrap -->
            <?php include'assets/includes/footer.php'; ?>               

            <script src="assets/js/style-switcher.js"></script>
            <?php 
        }
        ?>
        <?php
        include('modals.php');?>
        
        </body>

</html>
<?php
session_start();  
if(strlen($_SESSION['code'])=="")
    {   
    header("Location:index.php"); 
    }
    else
    {
     include('sessions.php');
      ?>
          
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>worker registration</title>
    <meta name="description" content="Chuch Information Management System">
    <meta name="author" content="Winnatech Ltd">
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
       <link rel="stylesheet" href="fonts1/material-icon/css/material-design-iconic-font.min.css">
       <link rel="stylesheet" href="style11.css">

    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>
      </head>
        <body class="  ">
        <div class="container">
            <div class="bg-dark dk" id="wrap">
                <?php
include 'assets/includes/top.php'; ?>
<div class="main-bar">
            
                            </div>
                            <!-- /.main-bar -->
                                       </div>
   


<div id="content" style="background-color:white;">
                                       
                            

<div class="col-lg-6 col-md-6 col-sm-8 col-xs-8 ">  
<?=$user_id?>
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
                                    include('../connect.php');
                                    foreach ($_POST["id"] AS $id){
                                                        /*echo 'ID is ' .$id.'<br />';
                                                        echo 'Field1 is ' .$_POST["field1"][$id].'<br />';
                                                        echo 'Field2 is ' .$_POST["field2"][$id].'<br />';*/
                                                        $field1= $_POST["email"];
                                                       $field2 = $_POST["phone"];                                   

                                                        if($file_location){
                                                          $update='UPDATE worker
                                                          SET email ="'. $field1.' ", phone = "'.$field2.' ", photo = "'.$file_location.' "
                                                          WHERE worker_id = "'.$id.'"';}
                                                        else{
                                                          $update='UPDATE worker
                                                          SET email ="'. $field1.' ", phone = "'.$field2.' "   WHERE worker_id = "'.$id.'"';
                                                        }
                                                        $res=mysqli_query($conn,$update) or die ('Wapi');
                                                        if($res){
                                                          echo "<script>alert('Your successfull update your profile!!!');
window.location='edit.php?user=".$id."'</script>";
                                                            }
                                                        else
                                                        {
                                                          ?>
                                                         <script>alert("Sorry this Failed try again!!!!!");</script>
        <?php
        echo "<meta http-equiv='refresh' content='0;url=edit.php?user=".$id."'>";


                                                        }
                                                    }
                                }
                                 include('../connect.php');
                    $sql="SELECT * FROM worker WHERE worker_id='$user_id' LIMIT 0,1";
                                $res=mysqli_query($conn,$sql);
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
              <input type="hidden" name="id[]" value="'.$row["worker_id"].'">

            </div>
            <input type="submit" class="btn btn-success" name="save" value="Save Changes"
                </div><br />
                <p class="lead">
                             />
                        </p>
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


 </div></div>

<div id="err"></div>
    
    </p>
    
  <script src="assets/js/style-switcher.js"></script>
        <script src="assets/lib/jquery/jquery.js"></script>
 <!--Bootstrap -->
            <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
            <!-- MetisMenu -->
            <script src="assets/lib/metismenu/metisMenu.js"></script>
            <!-- onoffcanvas -->
            <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
            <!-- Screenfull -->
            <script src="assets/lib/screenfull/screenfull.js"></script>


            <!-- Metis core scripts -->
            <script src="assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="assets/js/app.js"></script>  
      <script src="../js/DataTables/datatables.min.js"></script>
           
           <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>              
           
                <script>
                    $(function() {
                      Metis.dashboard();
                    });
                </script>
                

            <script src="assets/js/style-switcher.js"></script>
            <?php 
        }
        ?>
      
        </body>

</html>

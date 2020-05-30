<?php
session_start();  
  include_once 'sessions.php';
if(strlen($_SESSION['code'])=="")
    {   
    header("Location:index.php"); 
    }
    else
    {?>
          
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

     <?php include('date.php'); ?> 
    
      </head>
        <body class="  ">
            <div class="bg-dark dk" id="wrap">
                <?php
//include 'includes/header.php'; ?>
<div class="main-bar">
            <h3>
              <i class="fa fa-pencil"></i>&nbsp;
            Kwandika umukozi
          </h3>
                            </div>
                            <!-- /.main-bar -->
                                       </div>
                <!-- /#top -->
                <!-- left -->
                <?php
//include 'assets/includes/left.php';
?>
<?php /*echo $username; echo $id; echo $diocese;  echo $archideacons; echo $ddistrict; echo $parish; echo $ikanisa; */?>
<!-- end of left -->                
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh sorry!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>


<div id="content">
                                       
                            

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">                    

               


 <div class="box dark">
        <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
                       <!-- .toolbar --><h5 style="color:black;">WORKERS' REGISTRATION</h5>
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
    <div class="container" >
      <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Employees Info</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr  style="background-color:#7fb3d5;"><th>No</th>
                                            <th>User code</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Function</th>
                                            <th>Telephone</th>
                                            <th>Present</th>
                                             <th>Absent</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
<?php $sql = "SELECT worker.worker_id,worker.code,worker.password,worker.f_name,worker.l_name,worker.nid,worker.phone,functions.functions,worker.status FROM worker,functions,provinces,districts,sector  WHERE functions.f_id in (SELECT MAX(functions.f_id) from functions GROUP BY functions.worker_id DESC) AND worker.worker_id=functions.worker_id AND  worker.province=provinces.ID AND worker.district=districts.ID AND worker.sector=sector.ID AND worker.status='normal'   ORDER BY functions.f_id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                                        <tr>
                                             <td style="background-color:#f7dc6f;"><?php echo htmlentities($cnt);?></td>
 <td><?php echo htmlentities($result->code);?></td> 
 <td><?php echo htmlentities($result->f_name);?></td>
 <td><?php echo htmlentities($result->l_name);?></td>
 <td><?php echo htmlentities($result->functions);?></td> 
  <td><?php echo htmlentities($result->phone);?></td>
  <td>Present:<input type="radio" name="present" value="present"></td>
  <td> <label for="present4">
                        <input type="radio" id="present4" name="attendance_status[4]" value="Present"> Present
                    </label>
                    <label for="absent4">
                        <input type="radio" id="absent4" name="attendance_status[4]" value="Absent"> Absent
                    </label></td>
                                             
                                            <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>"><i class="material-icons">mode_edit</i></a>
         
<a href="workerdetails.php?user=<?php echo htmlentities($result->worker_id);?>" > <i class="class="fa fa-book"" title="Inactive">done</i>


                                             </td>
                                        </tr>
                                         <?php $cnt++;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
        
            <?php 
            // include('regworker1.php');
            ?>
        </div>

    </div>
</div>
    <!-- JS -->
         
         <?php 
//include('arch.php');
         ?></div>

<div id="err"></div>
    
    </p>
    
<script src="vendor1/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>                 
            <?php //include'assets/includes/footer.php'; ?>

                <script>
                    $(function() {
                      Metis.dashboard();
                    });
                </script>
                

            <script src="assets/js/style-switcher.js"></script>
            <?php 
        }
        ?>
        <?php
        //include('modals.php');?>
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

        </body>

</html>

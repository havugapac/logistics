<?php
session_start();
if(isset($_POST['send'])){
        $code=$_POST['code'];
        $pass=$_POST['pass'];
include_once 'config.php';

$sql="SELECT worker.worker_id,worker.code,functions.type,worker.password FROM 
functions,worker WHERE worker.code='$code' AND worker.password='$pass' AND 
worker.worker_id=functions.worker_id AND worker.status='normal'";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
             $_SESSION['worker_id']=$result->worker_id;
                $_SESSION['code']=$result->code;               
                $_SESSION['type']=$result->type;
                $_SESSION['password']=$result->password;
                
                        if($result->type=="admin"){

                                header("location:admin/index.php");
                                    
                                }
                                

                                else if($result->type=="employee"){

                                    header("location:employee/index.php");                                
                                }
                                else if($result->type=="logistic"){

                                    header("location:logistic/index.php");
                                    
                                }
                                else if($result->type=="driver"){

                                    header("location:employee/index.php");
                                }
                                


                                else if($result->type=="cese"){

                                    echo "User does't exist!!!!.";
                                
                                }
                                
                 }
}
 else{
        ?>
    <script>
    alert('Code or Password is incorrect!!!!');
    </script>
    <?php
        }
    }
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>LG |LOGISTIC ACTIVITIES</title>
<meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="public/assets/img/metis-tile.png" />
    <link rel="stylesheet" href="bootstrap/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="bootstrap/css/main.css">
    <link rel="stylesheet" href="bootstrap/lib/metismenu/metisMenu.css">
    <link rel="stylesheet" href="bootstrap/lib/onoffcanvas/onoffcanvas.css">
    <link rel="stylesheet" href="bootstrap/lib/animate.css/animate.css">

    </head>
    <body class="login"> 

      <div class="form-signin" style="background-color:#BFC9CA;">
    <div class="">
        <img src="img/HR.JPG" style="width:300px;height:120px;" alt="HUMAN RESOURCE">
    </div>
    <hr>
    <div class="tab-content">
        <div id="login" class="tab-pane active">

            <form method="POST">
                <p class="text-muted text-center">
                    Enter your usercode and password
                </p>
                <input type="text" name="code" placeholder="usercode" class="form-control top" required>
                <input type="password" name="pass" placeholder="Password" class="form-control bottom" required>
                <div class="checkbox">
          <label>
            <input type="checkbox"> Remember Me
          </label>
        </div>
                <button class="btn btn-lg btn-primary btn-block" name="send" type="submit">Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.php">
                <p class="text-muted text-center">Enter your valid e-mail</p>
                <input type="email" placeholder="mail@domain.com" class="form-control">
                <br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html">
                <input type="text" placeholder="username" class="form-control top">
                <input type="email" placeholder="mail@domain.com" class="form-control middle">
                <input type="password" placeholder="password" class="form-control middle">
                <input type="password" placeholder="re-password" class="form-control bottom">
                <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            
        </ul>
    </div>
  </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        
         <script src="bootstrap/lib/jquery/jquery.js"></script>

    <!--Bootstrap -->
    <script src="bootstrap/lib/bootstrap/js/bootstrap.js"></script>


    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.list-inline li > a').click(function() {
                    var activeForm = $(this).attr('href') + ' > form';
                    //console.log(activeForm);
                    $(activeForm).addClass('animated fadeIn');
                    //set timer to 1 seconds, after that, unload the animate animation
                    setTimeout(function() {
                        $(activeForm).removeClass('animated fadeIn');
                    }, 1000);
                });
            });
        })(jQuery);
    </script>
        
    </body>
</html>
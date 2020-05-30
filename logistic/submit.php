<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style>
		#bd{position:absolute;
            top:15%;
            left:30%;
            width:40%;
            height:45%;
            border-radius:0.5em;
            box-shadow: 0em 0em 0.3em 0.3em black;
            background-color:white;
		     }
		#close{position:absolute;
               top:-3%;
               right:-2%;
               width:4%;
               height:7%;
               border-radius:18em;
               box-shadow:0em 0em 0.2em 0.2em black;
		    }
	</style>
</head>
<body style="background-image:url('bg.jpg');">
<div id="bd">
	<form action="#" method="post">
	<table align="center">
		<tr><th colspan="2"><h1>Items submission by employees</h1></th></tr>
		<tr><td>Enter the employee code:</td><td><input type="text" name="code" placeholder="Employee code" required style="border-radius:0.4em;" value="<?php
        if(isset($_POST['searc']))
        {
       $code=$_POST['code']; echo $code;}?>"><input type="submit" name="searc" value="View items"></td></tr>
		<tr><td>Select item:</td><td>
      <select name="item">
        <?php
        if(isset($_POST['searc']))
        {
       $code=$_POST['code'];
       

       $con=new pdo('mysql:dbname=hr;host=localhost','root','');
       $sele1="select * from workers,given_items,items where workers.worker_id=given_items.worker_id and given_items.item_id=items.item_id and workers.name='$code'";     
        
        $re=$con->query($sele1);
        $re->setFetchMode(PDO::FETCH_ASSOC);
        while($data=$re->fetch())
        {
          echo "<option>".$data['item_name']."</option>";
        }
      }

        ?>
      </select>
    </td></tr>
    <tr><td>Reason to submit:</td><td>
      <select name="reason">
        <option>--select reason--</option>
        <option>done to use</option>
        <option>out of order</option>
      </select>
    </td></tr>
		<tr><td></td><td><input type="submit" name="reg" value="Confirm" style="border-radius:0.4em;background-color:lightblue;"></td></tr>
	</table>
    </form>
    <?php
    if(isset($_POST['reg']))
    {
    $item=$_POST['item'];
    $code=$_POST['code'];
    $reason=$_POST['reason'];
    
    if($reason!="--select reason--")
    {
    $con=new pdo('mysql:dbname=hr;hos=localhost','root','');

    $sele10="select * from workers where name='$code'";
    $qry10=$con->query($sele10);
    $qry10->setFetchMode(PDO::FETCH_ASSOC);
    $row10=$qry10->fetch();
    $emp_id=$row10['worker_id'];

    $sele20="select * from items where item_name='$item'";
    $qry20=$con->query($sele20);
    $qry20->setFetchMode(PDO::FETCH_ASSOC);
    $row20=$qry20->fetch();
    $itm_id=$row20['item_id'];
    $itm_nber=$row20['item_number'];

    if($reason=="done to use")
    {
    $delt="delete from given_items where worker_id='$emp_id' and item_id='$itm_id'";
    $delet=$con->query($delt);
   
    $new_nber=$itm_nber+1;

    if($delet)
     {
    $extend="update items set item_number='$new_nber' where item_id='$itm_id'";
    $resu=$con->query($extend);

    if($resu)
     {
      echo"<script> alert('well submited')</script>";
      echo"<script> location.href='submit.php'</script>";
     }
     }
    }

    if($reason=="out of order")
    {
    $delt2="delete from given_items where worker_id='$emp_id' and item_id='$itm_id'";
    $resu2=$con->query($delt2); 

    if($resu2)
    {
    $nber=0;
   $insert="insert into outoforder(item_id,item_number) values('$itm_id','$nber')";
   $resu3=$con->query($insert);

   if($resu3)
   {
    echo"<script> alert('well submited')</script>";
    echo"<script> location.href='submit.php'</script>";
   }
    }
    }
    }
    else
    {
      echo"<script> alert('pls select correct reason')</script>";
      echo"<script> location.href='submit.php'</script>";
    }
    }
    ?>
	<div id="close">
		<a href=""><img src="close.png" style="width:100%;height:100%;border-radius:18em;"></a>
	</div>
</div>
</body>
</html>
<?php
  /*$host="localhost";
  $dbuser="root";
  $dbpassword="";//nd210694
  $dbname="imihigo";
  $conn=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
  if(mysqli_connect_errno())
  {
    die("Connection Failed!".mysqli_connect_error());
  }*/
  include('../connection.php');
	if(isset($_GET['user'])){  
		$ID = $_GET['user'];
		$block='blocked';
	$sql="UPDATE worker SET status='blocked' WHERE worker_id=$ID";
 
		$res= mysqli_query($dbh,$sql) or die ("Failed".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=employees.php'>";
		?>
		<script>
		alert('This user has blocked successfully!!!!')
		</script>
	<?php } 
?>
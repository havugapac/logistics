<?php
require_once("DBController.php");
$dbh = new DBController();
if(!empty($_GET['province_id'])) { 
        $prov_id = $_GET["province_id"];           
	$query ="SELECT * FROM districts WHERE prov_id IN ($prov_id)";
	$results = $dbh->runQuery($query);
?>
	<option value="" style="color:red;">----Select-----</option>
<?php
	foreach($results as $dist) {
?>
	<option value="<?php echo $dist["ID"]; ?>"><?php echo $dist["District_Name"]; ?></option>
<?php
	}
}
if(!empty($_GET['dist_id'])) {
        $dist = $_GET["dist_id"];           
	$query ="SELECT * FROM sector WHERE dist_id IN ($dist)";
	$results = $dbh->runQuery($query);
?>
	<option value=""style="color:red;">----Select-----</option>
<?php
	foreach($results as $sector) {
?>
	<option value="<?php echo $sector["ID"]; ?>"><?php echo $sector["sector_name"]; ?></option>
<?php
	}
}
if(!empty($_GET['par_id'])) {
    $par = $_GET["par_id"];           
	$query ="SELECT * FROM ikanisa WHERE par_id IN ($par)";
	$results = $dbh->runQuery($query);
?>
	<option value=""style="color:red;">----Select-----</option>
<?php
	foreach($results as $kanisa) {
?>
	<option value="<?php echo $kanisa["ik_id"]; ?>"><?php echo $kanisa["ik_name"]; ?></option>
<?php
	}
}
if(!empty($_GET['lev_id'])) {
    $par = $_GET["lev_id"];           
	$query ="SELECT * FROM igihe_leave WHERE l_id IN ($par)";
	$results = $dbh->runQuery($query);
?>
	<option value=""style="color:red;">----Select-----</option>
<?php
	foreach($results as $igihe) {
?>
	<option value="<?php echo $igihe["i_id"]; ?>"><?php echo $igihe["longeur"]; ?></option>
<?php
	}
}
?>
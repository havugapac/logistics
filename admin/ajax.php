<?php
$dbh=mysqli_connect("localhost","root","");
mysqli_select_db($dbh,"church");
@ $provinces=$_GET["provinces"];
@$districts=$_GET["districts"];
@$sectors=$_GET["sectors"];
@$cells=$_GET["cells"];
@$villages=$_GET["villages"];
@$bapt=$_GET["bapt"];
@$comf=$_GET["comf"];
@$mariage=$_GET["mariage"];
@$chr='1';
@$dates=$_POST['dates'];
@$worker='1';
@$umwishingizi1=$_POST['umwishingizi1'];
@$umwishingizi2=$_POST['umwishingizi2'];
@$umwishingizi3=$_POST['umwishingizi3'];
$status='normal';
if($provinces!="")
{
        $select=mysqli_query($dbh,"SELECT * from districts where prov_id=$provinces");
        echo"<select class='form-control' id='ID' onChange='change_districts()'>";
		echo"<option>Choose District</option>";
        while($row=mysqli_fetch_array($select))
        {
        echo"<option value='$row[ID]'>";echo $row["District_Name"]; echo "</option>";
         }
         echo"</select>";
}

 
if($districts!="")
{
        $sel=mysqli_query($dbh,"SELECT * from sector where dist_id=$districts");
        echo"<select class='form-control' id='districts' onChange='change_sectors()'>";
		echo"<option>Choose Sector</option>"; 
        while($row=mysqli_fetch_array($sel))
        {
        echo"<option value='$row[ID]'>";echo $row["sector_name"];"</option>";
         }
         echo"</select>";
}

if($sectors!="")
{
        $do=mysqli_query($link,"select * from cells where sectID=$sectors");
        echo"<select id='sectors' onChange='change_cells()'>";
		echo"<option>select</option>"; 
        while($row=mysqli_fetch_array($do))
        {
        echo"<option value='$row[ID]'>";echo $row["cell_Name"];"</option>";
         }
         echo"</select>";
}
if($cells!="")
{
        $sel=mysqli_query($link,"select * from villag where cectID=$sectors");
        echo"<select id='cells' onChange='change_villages()'>";
		echo"<option>select</option>"; 
        while($row=mysqli_fetch_array($sel))
        {
        echo"<option value='$row[ID]'>";echo $row["Sector_Name"];"</option>";
         }
         echo"</select>";
}

if($villages!="")
{
        $sel=mysqli_query($link,"select * from villages where cellID=$cells");
        echo"<select >";
		echo"<option>select</option>"; 
        while($row=mysqli_fetch_array($sel))
        {
        echo"<option value='$row[ID]'>";echo $row["vill_Name"];"</option>";
         }
         echo"</select>";
}

if($bapt==1)
{
if(isset($_POST['save']))
{

$sql="INSERT INTO baptism(bapt_id,chr_id,date_bapt,work_id,umwishingizi1,umwishingizi2,umwishingizi3,status,timess) VALUES 
(null,:chr,:dates,:worker,:umwishingizi1,:umwishingizi2,:umwishingizi3,:status,null)";
$query = $dbh->prepare($sql);
$query->bindParam(':chr',$chr,PDO::PARAM_STR);
$query->bindParam(':dates',$dates,PDO::PARAM_STR);
$query->bindParam(':worker',$worker,PDO::PARAM_STR);
$query->bindParam(':umwishingizi1',$umwishingizi1,PDO::PARAM_STR);
$query->bindParam(':umwishingizi2',$umwishingizi2,PDO::PARAM_STR);
$query->bindParam(':umwishingizi3',$umwishingizi3,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{?>
        <script>
alert('Christian has registered successful!!!!');
        </script>
        <?php
}
else 
{
echo'adding practice fails. Please try again';
}
}
?>
         <div class="box dark">
        
<table class="table" style="background:white;">
   <tr>
     <td><label> <span>Itariki yabatirijweho*</span></label></td>
     <td><b>:</b></td>
     <td><input type="text" class="form-control" name="dates"  required pattern="^[A-Za-z]+" placeholder="Itariki yabatirijweho" /> </td>
     </tr>
     
     <tr>
     <td><label><span>Uwamubatije*</span></label></td>
     <td><b>:</b></td>
     <td><input type="text" name="worker"  class="form-control" placeholder="Uwamubatije" /> </td>
     </tr>
    
     <tr>
     <td><label><span>Umwishingizi1</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="umwishingizi1"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Umwishingizi" /> </td>
     </tr>
     <tr>
     <td><label><span>Umwishingizi2</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="umwishingizi2"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Undi mwishingizi" /> </td>
     </tr> 
     <tr>
     <td><label><span>Umwishingizi3</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="umwishingizi3"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Undi mwishingizi" /> </td>
     </tr> 
     <tr><td> <input style="margin-left: 50px;" type="submit" class="btn btn-success" id="submit" value="Komeza" name="save" />
        <a href="regchristian.php" class="btn btn-danger" >vamo</a></td></tr>
 </table>
 </div>
<?php
}

?>
<?php
if($comf==1)
{
if(isset($_POST['save1']))
{

$sql="INSERT INTO confirmation(conf_id,chr_id,date_conf,work_id,umwishingizi1,umwishingizi2,umwishingizi3,status,timess) VALUES 
(null,'$chr','$dates','$worker','$umwishingizi1','$umwishingizi2','$umwishingizi3','$status',null)";
$res=mysql_query($conn,$sql);
if($res)
{?>
        <script>
alert('Christian has registered successful!!!!');
        </script>
        <?php
}
else 
{
echo'adding practice fails. Please try again';
}
}
?>
         <div class="box dark">
        
<table class="table" style="background:white;">
   <tr>
     <td><label> <span>Itariki yakomerejweho*</span></label></td>
     <td><b>:</b></td>
     <td><input type="text" class="form-control" name="dates"  required pattern="^[A-Za-z]+" placeholder="Itariki yakomerejweho" /> </td>
     </tr>
     
     <tr>
     <td><label><span>Uwamukomeje*</span></label></td>
     <td><b>:</b></td>
     <td><input type="text" name="worker"  class="form-control" placeholder="Uwamukomeje" /> </td>
     </tr>
    
     <tr>
     <td><label><span>Umwishingizi1</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="umwishingizi1"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Umwishingizi" /> </td>
     </tr>
     <tr>
     <td><label><span>Umwishingizi2</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="umwishingizi2"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Undi mwishingizi" /> </td>
     </tr> 
     <tr>
     <td><label><span>Umwishingizi3</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="umwishingizi3"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Undi mwishingizi" /> </td>
     </tr> 
     <tr><td>
     <!--<input style="margin-left: 50px;" type="submit" class="btn btn-success" id="submit" value="Komeza" name="save1" />-->
     <a class="btn btn-success" href="#tabBody1"> Komeza </a>
        <a href="regchristian.php" class="btn btn-danger" >vamo</a></td></tr>
 </table>
 </div>
<?php
}
?>
<?php
if($mariage=='1')
{
if(isset($_POST['save']))
{

$sql="INSERT INTO baptism(bapt_id,chr_id,date_bapt,work_id,umwishingizi1,umwishingizi2,umwishingizi3,status,timess) VALUES 
(null,:chr,:dates,:worker,:umwishingizi1,:umwishingizi2,:umwishingizi3,:status,null)";
$query = $dbh->prepare($sql);
$query->bindParam(':chr',$chr,PDO::PARAM_STR);
$query->bindParam(':dates',$dates,PDO::PARAM_STR);
$query->bindParam(':worker',$worker,PDO::PARAM_STR);
$query->bindParam(':umwishingizi1',$umwishingizi1,PDO::PARAM_STR);
$query->bindParam(':umwishingizi2',$umwishingizi2,PDO::PARAM_STR);
$query->bindParam(':umwishingizi3',$umwishingizi3,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{?>
        <script>
alert('Christian has registered successful!!!!');
        </script>
        <?php
}
else 
{
echo'adding practice fails. Please try again';
}
}
?>
         <div class="box dark">
        
<table class="table" style="background:white;">
   <tr>
     <td><label> <span>Ashyingiranwe na*</span></label></td>
     <td><b>:</b></td>
     <td><input type="text" class="form-control" name="partner"  required pattern="^[A-Za-z]+" placeholder="Uwo bashyingiranywe" /> </td>
     </tr>
     
     <tr>
     <td><label><span>Itariki yashyingiriweho*</span></label></td>
     <td><b>:</b></td>
     <td><input type="text" name="dates"  class="form-control" placeholder="Itariki yo gushyingirwa" /> </td>
     </tr>
    
     <tr>
     <td><label><span>Umuhamya</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="hamya"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Umuhamya" /> </td>
     </tr>
     <tr>
     <td><label><span>Undi muhamya</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="hamya2"  class="form-control" required pattern="^[A-Za-z]+" placeholder="Undi muhamya" /> </td>
     </tr> 
     <tr>
     <td><label><span>Uwabashyingiye</span></label></td>
     <td><b>:</b></td>
      <td><input type="text" name="worker"  class="form-control" required pattern="^[A-Za-z]+" placeholder="uwabasezeranyije" /> </td>
     </tr> 
     <tr><td> <input style="margin-left: 50px;" type="submit" class="btn btn-success" id="submit" value="Komeza" name="save" />
        <a href="regchristian.php" class="btn btn-danger" >vamo</a></td></tr>
 </table>
 </div>
<?php
}

?>
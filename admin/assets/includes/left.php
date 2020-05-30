
<?php 
include('sessions.php');
 ?>
 <script>
   function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
 </script>
<!-- user information -->
                    <div id="left">
                        <div class="media user-media bg-dark dker">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="edit.php">
                                    <img class="media-object img-thumbnail user-img" alt="User Picture" id="userIMG" style="width:80px;height:80px;" src="../img/<?=$photo;?>">
                                    
                                </a>
                        
                                <div class="media-body">
                                    <h5 class="media-heading">
                                      <?php
                                     $names=$fname." ".$lname;
                                     echo ucwords($names);
                                      ?>
                                    </h5>
                                    <ul class="list-unstyled user-info">
                                        <li><a href="edit.php" style="color:#2b7de1;font-weight:bold;">code:<?= ucfirst($username);?></a></li><br>
                                        <li style="background:;color:white;text-align:center;border:5px solid #ed292a;width:70%;cursor:pointer;"><a href="edit.php">MORE </a></li>
      
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>



                        <!-- #menu -->
                        <ul id="menu" class="bg-blue dker">
                                  <li class="nav-header">Menu</li>
                                  <li class="nav-divider"></li>
                                  <li class="">
                                    <a href="index.php">
                                      <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span>
                                    </a>
                                  </li>

     <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-user"></i>
                                      <span class="link-title">
                                    Abakristo
                            </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="view-christian.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Kureba Abakristo Bose</a>
                                      </li>
                                     
                                       
                      
                                      
                                    </ul>
                                  </li>
                                  <li class="">
                                    <a href="#">
                                      <i class="fa fa-pencil"></i>
                                      <span class="link-title">
                                    Abakozi
                            </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                        <a href="list_workers.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Abakozi ba diyosezi</a>
                                      </li>
                                       <li>
                                        <a href="reg_worker.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Ongeramo umukozi</a>
                                      </li>
                                      <li>
                                        <a href="blockedusers.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Abakozi bahagaritswe</a>
                                          <li>
                                        <a href="draft.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Draft</a>
                                      </li>
                                      </li>
                                    </ul>
                                  </li>  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-plus"></i>
                                      <span class="link-title">Ongeramo</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="add_kanisa.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Ongeramo ikanisa </a>
                                      </li>
                                      <li>
                                        <a href="add_parish.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Ongeramo paruwasi</a>
                                      </li>
                                      <li>
                                        <a href="add_district.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Ongeramo distriki</a>
                                      </li>
                                      <li>
                                        <a href="new_archideacon.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Ongeramo ubucidikoni </a>
                                      </li>
                                      
                                    </ul>
                                  </li>


                  
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-tasks"></i>
                                      <span class="link-title">Ingingo z'ibikorwa</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="evangelisation.php?dep_id=1">
                                          <i class="fa fa-angle-right"></i>&nbsp; Ivugabutumwa </a>
                                      </li>
                                      <li>
                                        <a href="development.php?dep_id=2">
                                          <i class="fa fa-angle-right"></i>&nbsp;Iterambere</a>
                                      </li>
                                      <li>
                                        <a href="financial.php?dep_id=3">
                                          <i class="fa fa-angle-right"></i>&nbsp;Ubukungu </a>
                                      </li>
                                      <li>
                                        <a href="administration.php?dep_id=4">
                                          <i class="fa fa-angle-right"></i>&nbsp; Imirimo y'ubuyobozi </a>
                                      </li>
 
                                    </ul>
                                  </li>


                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-pencil"></i>
                                      <span class="link-title">
                                   Amatsinda
                            </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <?php
                                      $sql = "SELECT * from groups";
                                      $query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<li>
<a href="amatsinda_report.php?kr=<?php echo htmlentities($result->gr_id);?>" class="dropdown-toggle" id="dst"><i class="fa fa-angle-right"></i> <?php echo htmlentities($result->gr_name);?></a><?php }} ?>
</li>     
                                      
                                     
                                    </ul>
                                  </li>
                                  

                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-pencil"></i>
                                      <span class="link-title">
                                    Iteganyabikorwa
                            </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="add_action_plan.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Kureba</a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-angle-right"></i>&nbsp; Ibindi... </a>
                                      </li>
                                      
                                    </ul>
                                  </li>
                                  
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-book"></i>
                                      <span class="link-title">
                                    Raporo
                            </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                     <!-- <li>
                                        <a href="ibiteganyijwe.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Ibyakozwe biteganyijwe </a>
                                      </li>-->
                                      <li>
                                        <a href="ibidateganyijwe.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Ibyakozwe bidateganyijwe</a>
                                      </li>
                                      <li>
                                        <a href="amaturo_report.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Raporo Kumaturo </a>
                                      </li>
                                      <li>
                                        <a href="weekly_report.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Raporo y'Icyumweru </a>
                                      </li>
                                      
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-angle-right"></i>&nbsp; Izindi... </a>
                                      </li>
                                      
                                    </ul>
                                  </li>

                                     
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-book"></i>
                                      <span class="link-title">
                                    Imitungo
                            </span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                     <!-- <li>
                                        <a href="ibiteganyijwe.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Ibyakozwe biteganyijwe </a>
                                      </li>-->
                                      <li>
                                        <a href="imitungo_itimukanwa.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Imitungo itimukanwa</a>
                                      </li>
                                      <li>
                                        <a href="imitungo_yimukanwa.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Imitungo yimukanwa </a>
                                      </li>

                                       <li>
                                        <a href="ibyinjiye.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Ibyinjiye  </a>
                                      </li>

                                      <li>
                                        <a href="ibyasohotse.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Ibyasohotse </a>
                                      </li>
                                     <!-- <li>
                                        <a href="balance.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Balance </a>
                                      </li>-->
                                      <li>
                                        <a href="imyenda.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Imyenda </a>
                                      </li>
                                     
                        
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-angle-right"></i>&nbsp; Iyindi... </a>
                                      </li>
                                      
                                    </ul> 
                                  </li>
           
            <li class="">

              
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">Ubucidikoni</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">

                                                            <?php 
                 
$sql=("SELECT * FROM archideacon");
$query = $dbh->prepare($sql);
$query->execute(); $dist_cids="";
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0){
foreach($results as $result){ 
    ?>
 <li>
<a href="ubucidikoni.php?idfy=<?= htmlentities($result->arch_id);?> && nm=<?= htmlentities("$result->arch_name");?>">
    <i class="fa fa-angle-right"></i>&nbsp;<?php echo htmlentities("$result->arch_name"); ?> </a>
    <?php  
    }?>
                                      </li>
                                         
    <?php
  }
 
?>
                                     
                                    </ul>
                                  </li>


                                    <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-cog"></i>
                                      <span class="link-title">Settings</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="edit.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Change picture </a>
                                      </li>
                                      <li>
                                        <a href="change-password.php">
                                          <i class="fa fa-angle-right"></i>&nbsp;Change password</a>
                                      </li>                                                                           
                                    </ul>
                                  </li>
                                  
                                </ul>
                        <!-- /#menu -->
                    </div>




                    <!-- /#left -->
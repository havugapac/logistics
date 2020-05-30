        
        <link href="../circle/css/font-awesome.min.css" rel="stylesheet" /><div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title">LOGISTIC | Admin</span>
                        </div>
                      
                           
                        </ul>



             
<?php
$isread=0;
$sql = "SELECT ap_id from ap_item where is_read=:isread";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount1=$query->rowCount();?>


                              




 <ul id="dropdown" class="dropdown-content notifications-dropdown">
                            <li class="notificatoins-dropdown-container">
                                <ul>
                                    <li class="notification-drop-title">Item</li>
<?php 
$isread=0;
$sql = "SELECT * from worker,ap_item where ap_item.user_id=worker.worker_id AND ap_item.is_read=:isread";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  


                                    <li>
                                        <a href="giveitem.php?apid=<?php echo htmlentities($result->ap_id);?>">
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                            <div class="notification-text"><p><b><?php echo htmlentities($result->f_name." ".$result->l_name);?><br />(<?php echo htmlentities($result->user_id);?>)</b>applied for item</p><span>at <?php echo htmlentities($result->ptimess);?></b></span></div>
                                        </div>
                                        </a>
                                    </li>
                                   <?php }} ?>
                                   
                                  
                        </ul>
                    </ul>






                         <ul class="right col s9 m3 nav-right-menu">
                        
                         
<?php 
$isread=0;
$sql = "SELECT req_id from request where status=:isread ";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadcount=$query->rowCount();?>
<li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown" class="dropdown-button dropdown-right show-on-large"><i class="fa fa-briefcase"></i>
    <span class="badge"><?php echo htmlentities($unreadcount1);?></span></a></li>
<li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="fa fa-envelope"></i>

    <span class="badge"><?php echo htmlentities($unreadcount);?></span></a></li>

                            <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle"><i class="material-icons">search</i></a></li>
                        </ul>




                        
                        <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                            <li class="notificatoins-dropdown-container">
                                <ul>
                                    <li class="notification-drop-title">Request</li>
<?php 
$isread=0;
$sql = "SELECT * FROM worker,request WHERE request.worker_id=worker.worker_id AND request.status=:isread ORDER BY req_id DESC ";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
             ?>  


                                    <li>
                                        <a href="airtimes.php?leveid=<?php echo htmlentities($result->req_id);?>">
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                            <div class="notification-text"><p><b><?php echo htmlentities($result->f_name." ".$result->l_name);?><br />(<?php echo htmlentities($result->code);?>)</b>request Airtime</p><span>at <?php echo htmlentities($result->date1);?></b></span></div>
                                        </div>
                                        </a>
                                    </li>
                                   <?php }} ?>
                                   
                                  
                        </ul>
                    </div>
                </nav>
            </header>
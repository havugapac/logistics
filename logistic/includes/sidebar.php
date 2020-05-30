<aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="../img/<?=$photo?>" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                       
                                <p><?= $function?>.<?= $fname?>&nbsp;<?= $lname?></p>

                         
                        </div>
                    </div>
            
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding"><a class="collapsible-header waves-effect waves-grey" href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="fa fa-users"></i>Staff<i class="nav-drop-icon material-icons"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li ><a id="socil" class="fa fa-briefcase" href="employees.php"> Employees</a></li>
                            
                            </ul>
                        </div>
                    </li>
                     

                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="fa fa-dropbox"></i>Items<i class="nav-drop-icon material-icons"></i></a>
                        <div class="collapsible-body">
                            <ul>
                            <li><a class="fa fa-info-circle" href="itemreg.php"> Register New Item</a></li>
                            <li><a class="fa fa-question-circle" href="lateitem.php"> Allocate Item</a></li>
                             <li><a class="fa fa-question-circle" href="apply-item.php"> Apply Item</a></li>
                           <li><a class="fa fa-question-circle" href="submit2.php"> Submit Item</a></li>
                            <li><a class="fa fa-question-circle" href="myitem.php"> My Item</a></li>
                                
                                
                               
                         
                            </ul>
                        </div>
                    </li>

                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="fa fa-suitcase"></i>Unconfirmed received<i class="nav-drop-icon material-icons"></i></a>
                        <div class="collapsible-body">
                            <ul>
                            <li><a class="fa fa-info-circle" href="not_received.php">mine</a></li>
                            <li><a class="fa fa-info-circle" href="all_not_confirmed.php">all</a></li>
                                                     
                            </ul>
                        </div>
                    </li>

                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="fa fa-suitcase"></i>Cars<i class="nav-drop-icon material-icons"></i></a>
                        <div class="collapsible-body">
                            <ul>
                            <li><a class="fa fa-info-circle" href="addcar.php">add new car</a></li>
                            <li><a class="fa fa-info-circle" href="apply-car.php">Apply car</a></li>
                            <li><a class="fa fa-question-circle" href="carrequests.php">Give car</a></li>
                            <li><a class="fa fa-question-circle" href="confirm.php">Currently travelling</a>
                            <li><a class="fa fa-question-circle" href="carsList.php">All cars</a>
                            </li>
                            
                                
                               
                         
                            </ul>
                        </div>
                    </li>
                            
                      <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="fa fa-phone
"></i>Airtime<i class="nav-drop-icon material-icons"></i></a>
                        <div class="collapsible-body">
                            <ul>
                            <li><a class="fa fa-info-circle" href="message.php"> Request Airtime</a></li>
                            <li><a class="fa fa-question-circle" href="airtimes.php"> Give Airtime</a></li>
                             <li><a class="fa fa-question-circle" href="myair.php"> My Airtimes</a></li>
                             
                                
                                
                               
                         
                            </ul>
                        </div>
                    </li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="fa fa-suitcase"></i>Report<i class="nav-drop-icon material-icons"></i></a>
                        <div class="collapsible-body">
                            <ul>
                            <li><a class="fa fa-info-circle" href="payroll.php"> Item taken</a></li>
                            <li><a class="fa fa-info-circle" href="stored.php"> Stored Items</a></li>
                            <li><a class="fa fa-info-circle" href="out.php">outoforder Items</a></li>
                                </ul>
                        </div>
                    </li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="fa fa-suitcase"></i>Profile<i class="nav-drop-icon material-icons"></i></a>
                        <div class="collapsible-body">
                            <ul>
                        <li class="no-padding">
                                <a class="fa fa-sign-out" href="workerdetails1.php"> My profile</a>
                            </li>
                            <li class="no-padding">
                                <a class="fa fa-edit" href="edit.php"> Edit</a>
                            </li>
                         
                                </ul>
                        </div>
                    </li>
                            <li class="no-padding">
                                <a class="fa fa-edit" href="logout.php"> Sign Out</a>
                            </li> 
                 

                 
              
                </ul>
                   <div class="footer">
                    <p class="copyright"><a href="#">LG</a>© 2019</p>
                
                </div>
                </div>
            </aside>
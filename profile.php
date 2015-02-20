<!DOCTYPE html>
<html lang="en">

    <?php
        $title = "Profile";
        include 'include/head.php';
        include 'connectdatabase.php';
    ?>
  <body>
    <div class="container">
        <?php 
            session_start();
            $loggedIn = $_SESSION['loggedIn'];

            if(isset($_GET['id'])){
                $doctor_id= mysqli_real_escape_string($con, $_GET['id']);
            }else{
                header("location: appointment.php");
            }
            $account_type = $_SESSION['account_type'];
            if($loggedIn == false)
                header("location: index.php");
            else if($account_type != 'Patient')
                header("location: index.php");
            
            //patient
            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" );
            $p_row =  mysqli_fetch_array($result);
            $patient = $p_row['patient_id'];
            $patient_n = $p_row['patient_name'];

            //clinic
            $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
          
            //appointment
            $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND appointment_status = 'inqueue' ORDER BY appointment_id");

            //doctor
            $result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'" );
            $row =  mysqli_fetch_array($result);
            $doctor = $row['doctor_name'];
            $email = $row['email'];
            $specialization = $row['specialization'];
        ?>
        <?php
            include 'include/pt-nav-start.php';
        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Appointments <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointment.php">Today</a></li>
                                <li><a href="#">Tomorrow</a></li>
                                <li><a href="#">This Week</a></li>
                                <li><a href="#">This Month</a></li>
                            </ul>
                        </li>
                        <li><a href="notifications.php">Notifications <span class="badge">22</span></a></li>
                        <li><a href="history.php">History</a></li>
                        <form class="navbar-form navbar-right" method="post" role="search">
                            <div class="input-group search-bar">
                                <div id="divResult"></div>
                                <input type="text" class="form-control" name="search" placeholder="search doctor" id="inputSearch">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </ul>
                    <div class="btn-group navbar-right signedin">
                        <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <?php echo $patient_n ?>
                            <span class="caret"></span>
                        </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-power-off"></i>logout</a></li>
                            </ul>
                    </div>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid" id="doctor-info">
            <div class="row">
                <div class="col-md-4 d-pic">
                    <img src="img/profile/<?php echo $doctor_id ?>.jpg">
                </div>
                <div class="col-md-5">
                    <div class="d-info">
                        <ul class="specs">
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                            <li>LUt enim ad minim veniam nostrud exercitation ullamco laboris nisi</li>
                            <br>
                            <li>Hospital Affiliations: Benguet Laboratory Incorporated</li>
                            <li>Specialties: Plastic Surgery, Cosmetic Surgery</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 text-right">
                    <div class="d-info">
                        <ul>
                            <li><?php echo strtoupper($row['doctor_name']); ?></li>
                            <li><?php echo $row['specialization']; ?></li>
                            <li><?php echo $row['email']; ?></li>
                            <li>Status: <?php echo strtoupper($row['doctor_status']);?></li>
                        </ul>
                    <form action="subscribe.php" method="post">
                        <input type="hidden" name="doctor" value="<?php echo $row['doctor_id']?>">
                        <input type="hidden" name="patient" value="<?php echo $p_row['patient_id']?>">
                        <input type="submit" name="subs" value="Subscribe">
                    </form>
                    </div>
                </div>            
            </div>

        </div>
        <div class="container-fluid" id="clinics">
            <div class="row">

                <?php 
                          $count = 0;
                    while($c_row = mysqli_fetch_array($c_result)){
              
                        $count++;
                        echo '<div class="col-xs-12 col-md-3">';
                        echo '<div class="clinic-box">';
                        echo '<h4> Clinic '.$count.'</h4>';
                        echo '<p>'. $c_row['clinic_name']. '</p>' ;
                        echo '<p>'. $c_row['clinic_location']. '</p>' ;
                        echo '<p>'. $c_row['clinic_contact'] .'</p>';
                        echo ' <button type="button" class="btn btn-block btn-inverse" data-toggle="modal" data-target=".bs-example-modal-sm">
                            <span class="fui-new"> </span>Create Appointment</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>

            </div>
        </div>
        <!-- Modal -->
            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create</h4>
                  </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form class="form-input"  method="post" action="addappointment.php">
                                <label for="inputDate">Set Date</label>
                                <div class="input-group date" id="datetimepicker1">
                                    <span class="input-group-addon">
                                        <span class="fui-calendar-solid"></span>
                                    </span>
                                    <input type="text" class="form-control" name="date" />
                                </div>
                  
                        </div>
                    </div>
                    <?php
                    echo '<div class="modal-footer">';
                        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                        echo "<button type=\"submit\" class=\"btn btn-primary\">Appoint Me</button>";
                    echo '</div>';
                    ?>
                    </form>
                </div>
              </div>
            </div>

        <?php
            include 'include/scripts.php';
            include 'include/datepicker.php';
        ?>
    </div>
  </body>
</html>
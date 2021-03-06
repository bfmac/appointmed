<!DOCTYPE html>
<html lang="en">
 <style>

#divResult
        {
            position:absolute;
            width:210px;
            display:none;
            margin-top:40px;
            border:solid 1px #dedede;
            border-top:0px;
            overflow:hidden;
            border-bottom-right-radius: 6px;
            border-bottom-left-radius: 6px;
            -moz-border-bottom-right-radius: 6px;
            -moz-border-bottom-left-radius: 6px;
            box-shadow: 0px 0px 5px #999;
            border-width: 3px 1px 1px;
            border-style: solid;
            border-color: #333 #DEDEDE #DEDEDE;
            background-color: white;
        }
        .display_box
        {
            padding:4px; border-top:solid 1px #dedede; 
            font-size:12px;
        
        }
        .display_box:hover
        {
            background:#3bb998;
            color:#FFFFFF;
            cursor:pointer;
        }
        a
        {
            text-decoration: none;
 
            background: #3bb998;
            color:#FFFFFF;
            cursor: pointer;
        }
    </style>
    <?php
        $title = "Appointments";
        include 'include/head.php';
        include 'connectdatabase.php';
    ?>

  <body>
    <div class="container">
        <?php 
            session_start();
            $loggedIn = $_SESSION['loggedIn'];
            $account_type = $_SESSION['account_type'];
            if($loggedIn == false)
                header("location: index.php");
            else if($account_type != 'Patient')
                header("location: index.php");
            
            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" );
            $row =  mysqli_fetch_array($result);
            $patient = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient'" );
            $d_row =  mysqli_fetch_array($p_result);
            $doctor = $d_row['doctor_id'];
            $date = $d_row['date'];
            $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor'" );
            $doc =  mysqli_fetch_array($d_result);

        ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">appoint.med</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Appointments <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointment.php">Today</a></li>
                                <li><a href="#">Tomorrow</a></li>
                                <li><a href="#">This Week</a></li>
                                <li><a href="#">This Month</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="notifications.php">Notifications <span class="badge">22</span></a></li>
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
                            <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
                            </ul>
                    </div>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid" id="notification">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center text-turquoise appmnt-h">Your Notifications</h1>
                </div>
                <div class="col-md-12">
                    <h2 class="text-left notif-h">Today</h2>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-notif panel-danger">
                        <div class="panel-heading">Lambert Famorca
                            <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                        </div>
                        <div class="panel-body">
                            Sorry.. hindi ka gaGRADUATE !!! boom panut XD
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-notif panel-success">
                        <div class="panel-heading">Denmark Macam
                            <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                        </div>
                        <div class="panel-body">
                            ABE FOR LIFE !!!!!
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h2 class="text-left notif-h">Yesterday</h2>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-notif panel-info">
                        <div class="panel-heading">Bernabe Macion
                            <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                        </div>
                        <div class="panel-body">
                            According to my doctorific skills... hmmm BUNTIS KA!, i recommend ABORTION! de joke lang :P
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include 'include/scripts.php';
        ?>
        <script type="text/javascript" src="js/search.js"></script>
    </div> <!-- /container -->
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "appoint.med | Home";
        include 'include/head.php';
  
    ?>
    <?

        $loggedIn = $_SESSION['loggedIn'];
        $account_type = $_SESSION['account_type'];
        if($loggedIn == true )
            header("location: appointment.php");
    ?>

  <body class="ecf0f1-bg">
    <div class="container">
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
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clinics &amp; Hospitals <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.html">Benguet Laboratories</a></li>
                                <li><a href="bgh.html">Baguio General Hospital</a></li>
                                <li><a href="#">SLU Hospital</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Doctors</a></li>
                        <li><a href="signup.php">Signup</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid" id="index-frw">
            <div class="row">
                <div class="col-xs-12 col-md-7">
                <p class="login-text"><span>appoint.med</span> ... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat.</p>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="usr-login">
                     <form method="post" action="login.php">
                        <div class="input-group">
                            <input type="text" class="form-control login-field" name="username" placeholder="Username" required>
                            <i class="fa fa-user field-icon"></i>
                        </div>

                        <div class="input-group">
                            <input type="password" class="form-control login-field" name="password" placeholder="Password" required>
                            <i class="fa fa-lock field-icon"></i>
                        </div>

                        <input class="btn btn-default login-btn" type="submit" value="Login" name="login"/>
                    </form>
                        <a class="login-link" href="signup.php">Don't have an account?</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="clinics">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center clinic-h">Benguet Laboratories</i></span></h1>
                </div>
                <div class="col-xs-12 col-md-8">
                    <div class="g-map">
                        <iframe width="600" height="450" frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?q=Benguet%20Laboratories%20-%20SM%20City%20Baguio%2C&key=AIzaSyCbweT-jLxTUhNFbJE8FJdFuiL8x2hiNww"></iframe>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="map-location">
                        <p>
                            <i class="fa fa-location-arrow fa-2x"></i>
                            044 &amp; 045, Lower Ground Level SM City, Luneta Hill, Baguio City, Benguet, Philippines
                        </p>
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>
                            <a href="bgh.html">
                                Baguio General Hospital Driveway, Baguio City,Benguet, Philippines
                            </a>
                        </p>
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>
                            <a href="#">
                                Saint Louis University, Gen. Luna Road, Baguio City, Benguet, Philippines
                            </a>
                        </p>
                    </div>
                    <p class="text-right more-btn">
                        <a href="#" class="btn btn-default">show more</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="about">
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/startup.png" alt="">
                        <p>ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/lab.png" alt="">
                        <p>ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/responsive.png" alt="">
                        <p>ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/website.png" alt="">
                        <p>ipsum dolor sit amet, consectetur adipisicing elit</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="doctors">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h2 class="text-center doctor-h">Doctors</h2>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="doctor-list">
                        <ul class="nav">
                            <li class="specialization">
                                <label><i class="fa fa-arrow-right"></i> DERMATOLOGY</label>
                                <ul class="nav d-list">
                                    <li>GUIDENG, JOYCE</li>
                                    <li>HIDALGO, AURORA</li>
                                    <li>KISHI-GENERAO, FAITH</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-arrow-right"></i> ENT</label>
                                <ul class="nav d-list">
                                    <li>EMING, JULIO</li>
                                    <li>TIPAYNO, MARY JANE</li>
                                    <li>BAGA, LESTER</li>
                                    <li>DOMINGUEZ, DENNIS</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-arrow-right"></i> FAMILY MEDICINE</label>
                                <ul class="nav d-list">
                                    <li>ARREOLA, ARTURO B.</li>
                                    <li>CLEMENTE, MELANIE P.</li>
                                    <li>DELA PENA, FLORENCE Q.</li>
                                    <li>GALVAN JO ANN A.</li>
                                    <li>MAPALO, SHIELA MARIE</li>
                                    <li>DANGANAN, HAYDEE</li>
                                    <li>ENIACA, BERNADETTE</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include 'include/footer.php';
            include 'include/scrolltop.php';
            include 'include/scripts.php';
        ?>

        <script type="text/javascript" src="js/listslide.js"></script>
        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>
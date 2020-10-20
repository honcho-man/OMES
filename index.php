<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OMES Smart Home</title>
    <link rel="icon" type="image/ico" href="images/thunder.png">
    <meta name="description" content="Home Automation Oladmuni Home App">    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/animate2.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/smallscreen.css">
    <link rel="stylesheet" href="css/widescreen.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

</head>

<body>
    <!--small screen header-->
    <div class="landing-header hide-from-wide show-on-small  float-panel container-fluid">
        <div class="row">
            <div class="col-4 brand">
                <button onclick="openNav()">&#9776;</button>
            </div>
            <div class="col-4 nav-brand">
                <a href="index.php">
                    <img src="images/omes-logo.jpg">
                </a>
            </div>
            <div class="col-4 shop text-right">
                <a target="_blank" href="http://jiji.ng/sellerpage-335279" title="online shop" role="button">
                    <img src="images/shopping-cart-32.png" alt="">
                </a>
            </div>
            <!--Side Navigator (only for small screens)-->
            <div id="SideNavContn" class="container-fluid force-nav-in pie side-nav-contn">
                <div class="row">
                    <div onclick="closeNav()" class="col-12 dark"></div>

                    <div id="SideNav" class="sidenav container-fluid text-left">
                        <ul>
                            <li><a href="index.php">Get started</a></li>
                            <li><a href="index.php">About</a></li>
                            <li><a href="index.php">Why OMES?</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Sign up</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Wide screen header-->
    <div class="landing-header hide-from-small show-on-wide  float-panel container-fluid">
        <div class="row">
            <div class="col-2 col-lg-2 nav-brand ">
                <a href="index.php">
                    <img class="pt-md-3" src="images/omes-logo.jpg">
                </a>
            </div>

            <div class="col-10 pt-lg-3 nav-bar text-right">
                <ul>
                    <li><a href="index.php">Get started</a></li>
                    <li><a href="index.php">About</a></li>
                    <li><a href="index.php">Why OMES?</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                </ul>
                <a target="_blank" href="http://jiji.ng/sellerpage-335279" title="online shop" role="button">
                    <img src="images/shopping-cart-32.png" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="landing-body p-0">
        <div class="landing-image">
            <div class="entrance-text-contn p-md-5">
                <div class="entrance-text slide-in-left text-left">
                    <h3>Be in control of your home.</h3>
                    <p>One view of your home. Control, organize and manage compatible devices from your phone.</p>
                    <div class="text-center entrance-link container-fluid pt-2 appear">
                        <a href="signup.php">Get started</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="landing-main-body  p-md-5">
            <div class="container-fluid use-contn text-center pt-2">
                <p>With the OMES home automation system, you can easily and securely control your home from your phone anywhere in the world. OMES smart automation system was built by our experts for a faster smart home management which works offline and
                    online, which simply means you don't have to change out that old switch for a smart one.</p>
            </div>
        </div>
    </div>
    <div class="landing-footer container-fluid text-center">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="col footer-image">
                    <a href="index.php">
                        <img src="images/omes-logo.jpg" alt="OMES logo">
                    </a>
                </div>

                <p>&copy; OMES Electrical Services | All Rights Reserved.</p>
                <ul class="footer-list">
                    <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-4 footer-nav col-lg-4">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Gallery</a></li>
                    <li><a href="">Quality Statement</a></li>
                    <li><a href="tel:+234-807-800-4566">☎ +234-807-800-4566</a></li>
                    <li><a href="tel:+234-810-206-9323">☎ +234-810-206-9323</a></li>
                    <li><a href="mailto:info@oladmuni.com">✉ info@oladmuni.com</a></li>
                    <li><a href="mailto:olanrewaju@oladmuni.com">✉ olanrewaju@oladmuni.com</a></li>
                    <li><a href="mailto:olalekan@oladmuni.com">✉ olalekan@oladmuni.com</a></li>
                </ul>
                <p><span class="green">Address:</span> 9 Oladipupo Close, Tipper garage, Akute, Ogun State, Nigeria. Mon-Fri <span class="green">08:00</span> AM - <span class="green">05:00</span> PM, Sat-Sun.</p>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <img src="images/office map.jpg" alt="Office Map">
            </div>
        </div>
    </div>
    <script src="scripts/js/loader.js"></script>
    <script src="scripts/js/header.js"></script>
    <script src="scripts/js/float-panel.js"></script>
</body>

</html>
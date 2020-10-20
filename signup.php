<?php
// Initialize the session
session_start();
 
// Include config file
require_once "scripts/php/config.php";

 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    $firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (firstname, lastname, username, password, email, phone) VALUES ('$firstname','$lastname', ?, ?,'$email','$phone')";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

      
    
        // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OMES Smart Home: login</title>
    <link rel="icon" type="image/ico" href="images/thunder.png">
    <meta name="description" content="Home Automation Oladmuni Home App">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<body onload="openBody()">
    <div class="background-body"></div>
    <div id="Loader" class="loader container-fluid text-center p-0">
        <div class="container-fluid loader-contn p-0">
            <div class="container-fluid loader-contn-2 p-0">
                <div class="loader-text container-fluid">
                </div>
                <div class="container-fluid roller-div">
                    <h1><i class="fa fa-home green zoomInOut"></i></h1>
                    <div class="roller roll"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="MainBody" class="main-body container-fluid force-hide">
        <div class="col-sm-6 col-md-6 col-lg-4 form-contn scaleout">
            <div class="container-fluid userform">
                <div class="container-fluid text-center avatar-par">
                    <div class="row avatar-contn">
                        <div class="col-4 bg-white avatar-child"></div>
                        <div class="col-4 avatar">
                            <i class="fa fa-user text-white"></i>
                        </div>
                        <div class="col-4 bg-white avatar-child"></div>
                    </div>
                </div>
                <form class="bg-white user-form-contn"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="container-fluid">
                        <h4>Create Account</h4>
                    </div>
                    <div class="container-fluid pl-0 pr-0">
                        <div class="row">
                            <div class="col-6 pt-0">
                                <input type="text" name="firstname" id="firstname" placeholder="Firstname" required>
                            </div>
                            <div class="col-6 pt-0">
                                <input type="text" name="lastname" id="lastname" placeholder="Lastname" required>
                            </div>
                            <div class="col-12  <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <input type="text" name="username" id="username" placeholder="Username" required>
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>
                            <div class="col-12  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <input type="password" name="password" id="password" placeholder="Password" required>
                            </div>
                            <div class="col-12  <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
                                <span class="help-block"><?php echo $confirm_password_err; ?></span>  </div>                          
                            </div>
                            <div class="col-12">
                                <input type="email" name="email" id="email" placeholder="Email Address" required>
                            </div>
                            <div class="col-12 pb-0">
                                <input type="text" name="phone" id="phone" placeholder="Phone number" required>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid sub-create text-left pt-0 pb-0">
                        <p>By clicking the "Create Account Button" below, you agree to OMES's <a href="">terms of acceptable use.</a></p>
                    </div>
                    <div class="container-fluid pt-0">
                        <input type="submit" value="Create Account">
                    </div>
                    <div class="container-fluid sub-create pt-0 pb-0">
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="scripts/js/loader.js"></script>
</body>

</html>
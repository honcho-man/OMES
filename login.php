<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.php");
    exit;
}
 
// Include config file
require_once "scripts/php/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <meta name="description" content="Home Automation Oladmuni Home App">    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="col-sm-6 col-md-6 col-lg-4 scaleout form-contn">
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
                <form class="bg-white login-form user-form-contn" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="container-fluid">
                        <h4>Login</h4>
                    </div>
                    <div class="container-fluid pt-0 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <input type="text" name="username" id="username" placeholder="Username" required>
                        <span class="login-icon">
                            <i class="fa fa-user-circle"></i>
                        </span>
                        <span class="help-block"><?php echo $username_err; ?></span>

                    </div>
                    <div class="container-fluid pb-0  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <span class="login-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="container-fluid sub-login">
                        <p>
                            <span class="float-left"><a href="signup.php">Create an account</a></span>
                            <span class="float-right"><a href="forgotpassword.php">Forgot password?</a></span>
                        </p>
                    </div>
                    <div class="container-fluid">
                        <input type="submit" value="Sign In">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="scripts/js/loader.js"></script>
    
</body>

</html>
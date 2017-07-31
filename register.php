<?php

    ob_start();
    session_start();
    if( isset($_SESSION['login'])!="" ){
        header("Location: login.php");
    }
    include_once 'dbconnect.php';
    $error = false;

    if ( isset($_POST['signup']) ) {
        
        // clean user inputs to prevent sql injections
        $name = trim($_POST['name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $username = trim($_POST['username']);
        $username = strip_tags($username);
        $username = htmlspecialchars($username);
        
        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        
        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);

        $phonenumber = trim($_POST['phonenumber']);
        $phonenumber = strip_tags($phonenumber);
        $phonenumber = htmlspecialchars($phonenumber);
        
        // basic name validation
        if (empty($name)) {
            $error = true;
            $nameError = "Please enter your full name.";
        } else if (strlen($name) < 3) {
            $error = true;
            $nameError = "Name must have at least 3 characters.";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $error = true;
            $nameError = "Name must contain alphabets and space.";
        }
        if (empty($username)) {
            $error = true;
            $usernameError = "Please enter your username.";
        } else if (strlen($name) < 3) {
            $error = true;
            $usernameError = "Username must have atleat 3 characters.";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $error = true;
            $usernameError = "Username must contain alphabets and space.";
        }
        
        //basic email validation
        if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $emailError = "Please enter valid email address.";
        } else {
            // check email exist or not
            $query = "SELECT email FROM login WHERE email='$email'";
            $result = mysqli_query($conn,$query);
            $count = mysqli_num_rows($result);
            if($count!=0){
                $error = true;
            }
        }
        if (empty($phonenumber)){
            $error = true;
            $phonenumberError = "Please enter phonenumber.";
        } else if(strlen($phonenumber) < 6) {
            $error = true;
            $phonenumberError = "Phonenumber must have atleast 6 characters.";
        }
        // password validation
        if (empty($pass)){
            $error = true;
            $passError = "Please enter password.";
        } else if(strlen($pass) < 6) {
            $error = true;
            $passError = "Password must have atleast 6 characters.";
        }
        
        // password encrypt using SHA256();
        $password = hash('sha256', $pass);
        
        // if there's no error, continue to signup
        if( !$error ) {
            
            $query = "INSERT INTO login(username, phonenumber, email, password, fullname) VALUES('$username','$phonenumber','$email','$pass','$name')";
            $res = mysqli_query($conn,$query);
                
            if ($res) {
                $errTyp = "success";
                $errMSG = "Successfully registered, you may login now";
                unset($username);
                unset($phonenumber);
                unset($email);
                unset($pass);
                unset($name);
            } else {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later...";   
            }   
                
        }
        
        
    }
?>

<!DOCTYPE html>
<html>
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up-BlogTree</title>

        <!-- CSS --><link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.Register.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.jpg">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="home.php"><img src="blogtree.png" /></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html" class="home">Home</a></li>
            <li><a href="about.html" class="about">About</a></li>
            <li><a href="contact.php" class="contact">Contact</a></li>
            <li><a  href="login.php" class="signin">Sign In</a></li>
            <li><a href="register.php" class="register">Register</a></li>          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Welcome</strong></h1>
                            <div class="description">
                                <p>
                                    “Successful blogging is not about one time hits. It’s about building a loyal following over time.”
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Sign up to our site</h3>
                                    <p>Enter your information to get started:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
    <div class="form-bottom">
                                


        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">


        <?php
            if ( isset($errMSG) ) {
                
                ?>
                <div class="form-group">
                <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
                </div>
                <?php
            }
            ?>
                                    <div class="form-group">
                                        <label for="phonenumber">Phone Number</label>
                                        <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="8" placeholder="Phone Number..." onkeyup="validatephone(this);"/>
                                    </div>
                                    <span class="text-danger"><?php echo $phonenumberError; ?></span>
                                    
            <div class="form-group">
                <label for="fullname"><span class="req">* </span> Full name: </label> 
                    <input class="form-control" type="text" name="name" id = "txt" placeholder="Full Name..." onkeyup = "Validate(this)" required />  
                        
            </div>
            <span class="text-danger"><?php echo $nameError; ?></span>
            <div class="form-group">
                <label for="form-username"><span class="req">* </span> Email Address: </label> 
                    <input class="form-control" required type="text" name="email" placeholder="ex:jeddy@faranse.com" id = "email" onkeyup="email_validate(this.value); />   
                         </div>
                         <div class="status" id="status"></div>
<span class="text-danger"><?php echo $emailError; ?></span>
            <div class="form-group">
                <label for="username"><span class="req">* </span> User name:  <small>This will be your login user name</small> </label> 
                    <input class="form-control" type="text" name="username" id = "txt" placeholder="minimum 6 letters" required />  
                        <div id="errLast"></div>
            </div>
<span class="text-danger"><?php echo $usernameError; ?></span>
            <div class="form-group">
                <label for="password"><span class="req">* </span> Password: </label>
                    <input required name="pass" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" placeholder="Enter a Password..." /> </p>
<span class="text-danger"><?php echo $passError; ?></span>
                <label for="password"><span class="req">* </span> Password Confirm: </label>
                    <input required name="confirmpass" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Re-enter the Password..."  id="pass2" onkeyup="checkPass(); return false;"/>
                    <span id="confirmMessage" class="confirmMessage"></span>
            </div>
           

            <div class="form-group">
         <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="#" onclick="terms()" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
            </div>
                                    <button name="signup" type="submit" class="btn">Sign in!</button>
                                    <h5>You will receive an form-username to complete the registration and validation process. </h5>
                      <h5>Be sure to check your spam folders. </h5>
       </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts1.js"></script>
        <script src="assets/js/signup.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; BlogTree 2017</p>
                </div>
            </div>
        </div>
    </footer> 

<div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 759px; width: 259px; z-index: -999999; position: fixed;"><img src="assets/img/backgrounds/2.jpg" style="  filter: blur(10px); -moz-filter: blur(10px); -webkit-filter: blur(10px); -o-filter: blur(10px);position: absolute; margin: 0px; padding: 0px; border: none; width: 1138.5px; height: 759px; max-height: none; max-width: none; z-index: -999999; left: -439.75px; top: 0px;"></div>
</body>
</html>
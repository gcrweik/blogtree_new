<?php
include_once 'dbconnect.php';
  $row="";

  $query = "SELECT * from posts ORDER by id_post DESC limit 0,5";
  $result = mysqli_query($conn,$query);
  $result = mysqli_query($conn,$query) or die("Query to get blah failed with error:".mysqli_error());

  while($row = mysqli_fetch_array($result)) { 
    echo "<div id='display'>";
    echo "<h3 class='post_title'>".$row['post_title']."</h3>";
    echo "<h1 class='post_category' >".$row['post_category']."</h1>";
    echo "<p class='post_name'>".$row['post_name']."</p>";
    echo "<p class='timestamp'>".$row['timestamp']."</p>";
    echo "<p class='post_content'>".$row['post_content']."</p>";
    echo "</div>";
  }
  mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home - BlogTree</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="assets/css/clean-blog.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.account.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/myaccount.css">
        <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" 
integrity="sha384-Wrgq82RsEean5tP3NK3zWAemiNEXofJsTwTyHmNb/iL3dP/sZJ4+7sOld1uqYJtE" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
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
          <ul type="none" class="nav navbar-nav">
            <li><a href="index.html" class="home">Home</a></li>
            <li><a href="about.html" class="about">About</a></li>
            <li><a href="contact.php" class="contact">Contact</a></li>
            <li><a  href="login.php" class="signin">Sign In</a></li>
            <li><a href="register.php" class="register">Register</a></li>
            <li><a href="account.php" class="account">My Account</a></li></ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<br>
<br>
<br>

<section>

<div class="container" style="margin-top: 30px;">
<div class="profile-head">
<div class="col-md- col-sm-4 col-xs-12">
<img src="http://www.newlifefamilychiropractic.net/wp-content/uploads/2014/07/300x300.gif" class="img-responsive" />
<h6>Jenifer Smith</h6>
</div><!--col-md-4 col-sm-4 col-xs-12 close-->


<div class="col-md-5 col-sm-5 col-xs-12">
<ul>
<li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call">(+021) 956 789123</a></li>
<li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail">jenifer123@gmail.com</a></li>
<li>
<div class="hve-pro">
<p>Hello I’m Jenifer Smith, a leading expert in interactive and creative design specializing in the mobile medium. 
My graduation from Massey University with a Bachelor of Design majoring in visual communication.</p>
</div></li>
</ul>


</div><!--col-md-8 col-sm-8 col-xs-12 close-->




</div><!--profile-head close-->
</div><!--container close-->


<div id="sticky" class="container">
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-menu" role="tablist">
      <li class="active">
          <a href="#profile" role="tab" data-toggle="tab">
              <i class="fa fa-male"></i> Profile
          </a>
      </li>
      <li><a href="#change" role="tab" data-toggle="tab">
          <i class="fa fa-key"></i> Edit Profile
          </a>
      </li>
    </ul><!--nav-tabs close-->
    
    <!-- Tab panes -->
    <div class="tab-content">
    <div class="tab-pane fade active in" id="profile">
    <div class="container">

<br clear="all" />
<div class="row">
<div class="col-md-12">
<h4 class="pro-title"><u>My Posts</u></h4>
<div id='display'>
  <h1 class='post_title'></h1>
  <h3 class='post_Category'></h3>
  <h3 class='post_name'></h3>
  <h3 class='timestamp'></h3>
  <p class='post_content'></p>
</div>
</div><!--col-md-12 close-->






</div><!--container close-->
</div><!--tab-pane close-->
      
      
<div class="tab-pane fade" id="change">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">
<h2 class="register">Edit Your Profile</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">

<form class="form-horizontal main_form text-left" action=" " method="post"  id="contact_form">
<fieldset>


<div class="form-group col-md-12">
  <label class="col-md-10 control-label">First Name</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group col-md-12">
  <label class="col-md-10 control-label" >Last Name</label> 
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group col-md-12">
  <label class="col-md-10 control-label">E-Mail</label>  
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Phone #</label>  
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text">
    </div>
  </div>
</div>


<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Current Password</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="first_name" placeholder="Choose Password" class="form-control"  type="password">
    </div>
  </div>
</div>


<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Choose Password</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="first_name" placeholder="Choose Password" class="form-control"  type="password">
    </div>
  </div>
</div>



<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Confiram Password</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="first_name" placeholder="Confiram Password" class="form-control"  type="password">
    </div>
  </div>
</div>


<!-- radio checks -->
 <div class="form-group col-md-12">
                        <label class="col-md-10 control-label">Gender</label>
                        <div class="col-md-6">
                            <div class="radio col-md-2">
                                <label>
                                    <input type="radio" name="hosting" value="yes" /> Male
                                </label>
                            </div>
                            <div class="radio col-md-2">
                                <label>
                                    <input type="radio" name="hosting" value="no" /> Female
                                </label>
                            </div>
                        </div>
                    </div>

<!-- upload profile picture -->
<div class="col-md-12 text-left">
<div class="uplod-picture">
<span class="btn btn-default uplod-file">
    Upload Photo <input type="file" />
</span>
<span class="btn btn-default uplod-file">
    Upload Resume <input type="file" />
</span>
<span class="btn btn-default uplod-file">
    Upload Video <input type="file" />
</span>
</div><!--uplod-picture close-->
</div><!--col-md-12 close-->
<!-- Button -->
<div class="form-group col-md-10">
  <div class="col-md-6">
    <button type="submit" class="btn btn-warning submit-button" >Save</button>
    <button type="submit" class="btn btn-warning submit-button" >Cancel</button>

  </div>
</div>
</fieldset>
</form>
</div><!--row close-->
</div><!--container close -->          
</div><!--tab-pane close-->
</div><!--tab-content close-->
</div><!--container close-->

</section><!--section close-->

       



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
 <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts2.js"></script>
    <!-- Contact Form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>
    <!-- Theme JavaScript -->
    <script src="assets/js/clean-blog.min.js"></script>
   
<div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 759px; width: 259px; z-index: -999999; position: fixed;"><img src="assets/img/backgrounds/5.jpg" style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1138.5px; height: 759px; max-height: none; max-width: none; z-index: -999999; left: -439.75px; top: 0px;"></div>
    </body>
    </html>

<?php
require_once('config.php');
if(isset($_POST['create'])){

   
    $username  =$_POST['username'];
    $password  =$_POST['password'];
   

    $sql = "SELECT username, password FROM loginform ";
    $stmtshow = $db->prepare($sql);
    $result = $stmtshow->execute([ $username, $password]);
    if($result){
        header('location:dashboard2.php');
    
    }else{
        echo 'There were errors while registering';
    }

}
?>




<html>
<title>Login Form</title>
<head>
    <link rel="stylesheet" type/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type/css" href="css/global.css">
<script src="js/bootstrap.min.js"></script>
</head>
<body> 
<section class="container-fluid bg">
   <section class="row justify-content-center">
<section class="col-12 col-sm-6 col-md-3">
    <form class="form-container" method="POST" action="" >
        <div class="form-group">
          <label for="email">Username</label>
          <input type="string" class="form-control" name="username" placeholder="Enter username" required>
          
        </div>
        
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          
        </div>
        
          
        <input type="submit" name="create" class="btn btn-primary btn-block"  value="Login" >
        <small id="numHelp" class="form-text text-muted">Not registered? <a href="registration.php">Register</a> </small>
		
      
      </form>
    </section>
</section>
</section>

    </body>
</html>
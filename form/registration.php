<?php
require_once('config.php');
?>

<html>
<title>Registration Form</title>
<head>
    <link rel="stylesheet" type/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type/css" href="css/global.css">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
    
<div>
<?php
if(isset($_POST['create'])){

    $email     =$_POST['email'];
    $username  =$_POST['username'];
    $password  =$_POST['password'];
    $number    =$_POST['number'];

    $sql = "INSERT INTO loginform (email, username, password, number) VALUES(?,?,?,?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$email, $username, $password, $number]);
    if($result){
        echo 'Successfully registered';
    
    }else{
        echo 'There were errors while registering';
    }

}
?>

</div>


    <section class="container-fluid bg">
   <section class="row justify-content-center">
<section class="col-12 col-sm-6 col-md-3">
    <form class="form-container" method="POST" >
    
    
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="Enter email" required>
          
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="string" class="form-control" name="username" placeholder="Enter username" required>
            <small id="usernameHelp" class="form-text text-muted">Its case sensitive!</small>
          </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <small id="passwordHelp" class="form-text text-muted">Never keep your password same as your email.</small>
        </div>
        <div class="form-group">
            <label for="number">Contact Number</label>
            <input type="number" class="form-control" name="number" placeholder="Enter Contact Number"required>
            <small id="numHelp" class="form-text text-muted">Enter your Mobile Number</small>
          </div>
          
        <input type="submit" name="create" class="btn btn-primary btn-block" value="Register">
        <small id="numHelp" class="form-text text-muted">Already registered? <a href="login.php">Login</a> </small>
      
      </form>
    </section>
</section>
</section>
</body>
</html>
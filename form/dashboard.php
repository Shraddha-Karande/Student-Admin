<?php 
    session_start();
    require_once('config.php');
    if(isset($_POST['create'])){
    
        $name     =$_POST['name'];
        $email  =$_POST['email'];
        $class  =$_POST['class'];
        
    
        $sql = "INSERT INTO student (name, email, class) VALUES(?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$name, $email, $class]);
        if($result){
            echo 'Successfully registered';
        
        }else{
            echo 'There were errors while registering';
        }
    
    }
   
    
 
?>
 


<html>
<title>Dashboard</title>
<head>
    <link rel="stylesheet" type/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type/css" href="css/global.css">
<script src="js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<section class="container-fluid bg">
<section class="row justify-content-center">
<section class="col-12 col-sm-6 col-md-3">
  

  <br>
  <a href="#" data-toggle="modal" class="btn btn-primary btn-block" data-target="#myModal">
      Open Form and Table
         </a> 
  <div class="modal fade" id="myModal">
  <div class="modal-dialog model-sm">
    <div class="modal-header" method="POST" action="" >
     
    
      <h5><i>Submit Student Details:</i></h5>
      <hr>
        <div class="modal-body">
          <label for="name">Student Name</label>
          <input type="string" class="form-control" name="name" placeholder="Enter Student Name" required>
          
        </div>
        
        <div class="modal-body">
          <label for="email">Email Id</label>
          <input type="email" class="form-control" name="email" placeholder="Enter Email id" required>
          
        </div>
        
        <div class="modal-body">
          <label for="string">Class</label>
          <input type="string" class="form-control" name="class" placeholder="Enter Class" required>
          
        </div>
          <div class="modal-footer">
        <input type="submit" name="create" class="btn btn-primary btn-block"  value="Submit" >
        </div>
          
      </form>
      
      </div>
  

      

<div class="table" id="table">
<?php

$query = "SELECT * FROM student";

$data = $db->query($query);

echo '
<table class="table table-light" align="right" border="1" >
<thead>
<tr>
    
      <th>Name</th>
      <th>Email</th>
      <th>Class</th>
    </tr>
    </thead>
    </table>

';


foreach($data as $row){
    echo '<table class="table" align="right" border="1">
    <thead>
    <tbody>
    <tr>
    <td scope="row">' .$row["name"]. '</td>
    <td scope="row">' .$row["email"]. '</td>
    <td scope="row">' .$row["Class"]. '<br></td>
    </tr>
    </tbody>
    </thead>
    </table>';
}

echo '</table>';



?>
</div>
    </section>
    
</section>
</section>





</body>




</html>
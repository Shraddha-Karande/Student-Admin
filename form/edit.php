<?php 
 require_once('config.php');
 
    session_start();
    $id = $_GET['id'];
    $sql = 'SELECT * FROM student WHERE id=:id';
    $stmtinsert = $db->prepare($sql);
    $stmtinsert->execute([':id' => $id]);
    $row=$stmtinsert->fetch(PDO::FETCH_OBJ);

   
    if(isset($_POST['update'])){
         $id   =$_POST['id'];
        $name     =$_POST['name'];
        $email  =$_POST['email'];
        $class  =$_POST['class'];
        
    
        $sql = "UPDATE student SET id=?, name=?, email=?, class=?";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$id, $name, $email, $class]);
        if($result){
            echo 'Successfully Updated';
        
        }else{
            echo 'There were errors while registering';
        }
    
    }
   
    
 
?>

<html>
<title>Edit Details</title>
<head>
    <link rel="stylesheet" type/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type/css" href="css/global.css">
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log Out</a>
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
        <a class="nav-link" href="index.php">View Students</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<section class="container-fluid bg">
<div class="container">
<div class="card ">
<div class="card-header">
<h2>Edit Student Record</h2>
</div>
<div class="card-body">
<form method="post">
<div class="form-group">
<label for="name">ID</label>
 <input value="<?= $row->id; ?>" type="string" class="form-control" name="id" placeholder="Enter Student Name" required>
</div>
<label for="name">Name</label>
 <input value="<?= $row->name; ?>" type="string" class="form-control" name="name" placeholder="Enter Student Name" required>
</div>
<div class="form-group">
<label for="email"> Email</label>
 <input type="email" value="<?= $row->email; ?>" class="form-control" name="email" placeholder="Enter Student Email" required>
</div>
<div class="form-group">
<label for="class">Class</label>
<input value="<?= $row->Class; ?>" type="string" class="form-control" name="class" placeholder="Enter Student Class" required>
</div>

<div>
<button type="submit" name="update" class="btn btn-info">Update</button>

</div>
</div>
</div>
</section>



</body>
</html>
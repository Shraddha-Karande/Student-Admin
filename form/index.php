<html>
<title>Student Details</title>
<head>
    <link rel="stylesheet" type/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type/css" href="css/global.css">
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="dashboard2.php">Home</a>
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
<?php

$db_user = "root";
$db_pass = "";
$db_name = "login";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM student";

$data = $db->query($query);

echo '
<div class="container">
   <div class="card mt-5">
    <div class="card mt-5">
    <h2>All Students</h2>
    </div>
    <div class="card-body">
    <table class="table table-bordered table-dark">
    <tr>
    <th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Class</th>
<th>Action</th>
    </tr>

';

foreach($data as $row){
    echo '<table class="table table-dark " align="right" border="1">
    <thead>
    <tbody>
    <tr>
    <td scope="row">' .$row["id"]. '</td>
    <td scope="row">' .$row["name"]. '</td>
    <td scope="row">' .$row["email"]. '</td>
    <td scope="row">' .$row["Class"]. '<br></td>
    <td>
    <a href="edit.php?id=' .$row["id"]. '" class="btn btn-info">Edit</a>
    <a href="delete.php?id=' .$row["id"]. '" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    </tbody>
    </thead>
    </table>';
}

echo '</table>';


?>
</section>
</body>
</html>
<html>
<title>Student Table</title>
<head>
    <link rel="stylesheet" type/css" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type/css" href="css/global.css">
<script src="js/bootstrap.min.js"></script>
</head>
</html>

<?php

$db_user = "root";
$db_pass = "";
$db_name = "login";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT * FROM student";

$data = $db->query($query);

echo '
<table class="table table-dark" align="right" border="1" >
<thead>
<tr>
    
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Class</th>
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


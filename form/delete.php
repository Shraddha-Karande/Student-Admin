<?php 
 require_once('config.php');
 
    session_start();
    $id = $_GET['id'];
    $sql = 'DELETE FROM student WHERE id=:id';
    $stmtinsert = $db->prepare($sql);
     if($stmtinsert->execute([':id' => $id])) {
         header("Location: index.php");
     }

 
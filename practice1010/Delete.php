<?php
include 'db.php';

if (!isset($_SESSION['id'])) {
    header('Location:Login.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $sql = $conn -> prepare('
    delete from blogs where userid = ?
    ');
    $sql -> bind_param('i',$_GET['userid']);
    if ($sql -> execute()) {
        header('Location:BlogDashboard.php');
    }
    }
?>
<?php
include('functions.php');
secure();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    require('connect.php');

    $query = "DELETE FROM schools WHERE id = $id";
    mysqli_query($connect, $query);
}

header('Location: index.php');
exit;
?>

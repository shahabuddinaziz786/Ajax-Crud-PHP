<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE statement
    $sql = "DELETE FROM `users` WHERE `id` = {$id}";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo true;
    }else{
        echo false; 
    }

    
    
}
?>

<?php
include '../connection.php';
if(isset($_GET['id'])){
    $sql = "DELETE FROM `roles` WHERE id = {$_GET['id']}";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo true;
    }else{
        echo false;
    }
}else{
    echo false;
}


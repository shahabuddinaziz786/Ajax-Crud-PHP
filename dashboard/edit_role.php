<?php
include'../connection.php';
if(isset($_GET['id'])){
    $sql = "SELECT * FROM `roles` WHERE `id` = '{$_GET['id']}'";
    $query = mysqli_query($conn,$sql);
    if($query){
        $data = mysqli_fetch_assoc($query);
        echo $data['rolename'];
    }else{
        echo false;
    }
}
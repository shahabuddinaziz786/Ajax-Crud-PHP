<?php

include '../connection.php';
if($_POST['id'] != ''){
    $role = $_POST['role'];
    $sql = "UPDATE `roles` SET `rolename` = '".$role."' WHERE `id` = ".$_POST['id'];
    $query = mysqli_query($conn,$sql);

    if($query){
        $_SESSION['msg'] = "Data Updated";
    }else{
        $_SESSION['msg'] = mysqli_error($conn);
    }
    header('location:role.php');
}else{
    $role = $_POST['role'];
    $sql = "INSERT INTO `roles` (`rolename`) values ('{$role}')";
    $query = mysqli_query($conn,$sql);

    if($query){
        $_SESSION['msg'] = "Data inserted";
        header('location:role.php');
    }else{
        $_SESSION['msg'] = mysqli_error($conn);
        header('location:role.php');
    }
}

?>
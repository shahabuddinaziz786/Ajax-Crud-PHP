<?php
include '../connection.php';
// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $id = $_POST['id']; 
//     $name = $_POST['name']; 
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $sql = "UPDATE `users` SET `name` = '{$name}', `email` = '{$email}', `phonenumber` = '{$phone}' WHERE `id` = {$id}";
//     $query = mysqli_query($conn, $sql);
//     if($query){
//         echo true;
//     } else {
//         echo mysqli_error($conn);
//     }
// }else{
//     echo false;
// }


if($_POST['id']){
    if($_POST['password']){
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $sql = "UPDATE `users` SET name = '{$_POST['name']}',email = '{$_POST['email']}',phonenumber = '{$_POST['number']}',password = '{$_POST['password']}' Where id = '{$_POST['id']}'";
        
        $query = mysqli_query($conn,$sql);
        if($query){
            $_SESSION['msg'] = "Data updated successfully";
            header('location:index.php');
        }else{
            $_SESSION['msg'] = "Failed to update data";
            header('location:index.php');
        }
    }else{
        $sql = "UPDATE `users` SET name = '{$_POST['name']}',email = '{$_POST['email']}',phone = '{$_POST['phone']}' Where id = '{$_POST['id']}'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $_SESSION['msg'] = "Data updated successfully";
            header('location:index.php');
        }else{
            $_SESSION['msg'] = "Failed to update data";
            echo mysqli_error($conn);
        }
    }
}else{
    echo mysqli_error($conn);
}
?>
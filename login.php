<?php
include 'connection.php';
session_start();
if(isset($_POST['submit'])){
    $sql = "SELECT * from `users` where `email` = '{$_POST['email']}'";
    $query = mysqli_query($conn,$sql);
    $valid_email = mysqli_num_rows($query);
    if($valid_email > 0){
        $password = $_POST['password'];
        $data = mysqli_fetch_assoc($query);
        if(password_verify($password,$data['password'])){
            $_SESSION['name'] = $data;
            header('location:dashboard');
        }else{
            echo "Invalid password";
        }
    }else{
        echo "Invalid email";
    }
}else{
    echo "Fill the valid details";
}

?>
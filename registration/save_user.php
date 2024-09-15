<?php
include '../connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['name'])){
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $sql = "INSERT INTO `users` (`name`,`email`,`phone`,`password`) values('{$_POST["name"]}','{$_POST["email"]}','{$_POST["phone"]}','{$password}')";
      
        $query = mysqli_query($conn,$sql);
        if($query){         
            echo true;
            exit;
        }else{    
            echo false . mysqli_error($conn);
            exit;
        }
    }else{
        echo 2;
       exit;
    }
}else{
    echo 2;
   exit;
}


?>
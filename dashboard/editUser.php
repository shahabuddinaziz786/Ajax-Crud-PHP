<?php
// if(isset($_GET['id'])){
//     $sql = "SELECT * FROM `users` WHERE `id` = {$_GET['id']}";
//     $query = mysqli_query($conn, $sql);
//     if($query){
//         $row = mysqli_fetch_assoc($query);
//         echo  json_encode($row);
//     }else{
//         echo "No such user";
//     }
    
// }else{
//     echo "No such user";
// }
include '../connection.php';
include '../header.php';

// $id = {$_GET['id']};
$sql = "SELECT * FROM `users` WHERE id = {$_GET['id']}";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($query);
?>

<div class="login-form-body">
    <div class="card col-md-3">
        <div class="card-body">
        <form action="updateUser.php" id="loginForm" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= $data['name'] ?>">
            </div>
            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" name="phone" id="number" class="form-control" value="<?= $data['phone'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $data['email'] ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-success form-control mb-2" name="submit" type="submit">Submit</button>
                <button class="btn btn-danger form-control" name="submit">Reset</button>
            </div>
    </form>
        </div>
    </div>
</div>
<?php include '../footer.php' ?>








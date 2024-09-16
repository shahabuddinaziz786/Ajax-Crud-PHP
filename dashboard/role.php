<?php include '../header.php';
session_start();
if(!issest($_SESSION['name'])){
    header('location:../index.php');
}
?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="add-role.php" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id"/>
                        <input type="text" name="role" id="" placeholder="Enter role name" class="form-control">
                    </div>
                    <button type="submit" name="submit" id="submitBtn" class="btn btn-primary mt-3">Submit</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="role.php">Role</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link" href="index.php">Users</a>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <li>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </li>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <?php
        if(isset($_SESSION['msg']))
        {
            ?>
             <div class="alert alert-info">
                <?=$_SESSION['msg']?>
            </div>
            <?php
            unset($_SESSION['msg']);
        }
    
    ?>
   
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title" style="float:left;">User Role</h3>
                    <button type="button" class="btn btn-warning" onclick=modalOpen() style="float:right">
                        Add Role
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SR#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include '../connection.php';
                                $sql = "SELECT * FROM `roles`";
                                $query = mysqli_query($conn,$sql);
                                if($conn && mysqli_num_rows($query) > 0){
                                    $sr = 1;
                                    while($result = mysqli_fetch_assoc($query)){
                                        ?>
                                            <tr>
                                                <td><?= $sr ?></td>
                                                <td><?= $result['name'] ?></td>
                                                <td>
                                                    <button class="btn btn-success" onclick="EditRole('<?= $result['id'] ?>', '<?= $result['name'] ?>')">Edit</button>
                                                    <button class="btn btn-danger" onclick="deleteRecord('<?= $result['id'] ?>')">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                        $sr++;
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include '../footer.php'; ?>

<script>

    function EditRole(id, name){
        $.ajax({
            url : 'edit_role.php',
            type : 'GET',
            data : {
                id : id
            },
            success : function(response){
                $('input[name="role"]').val(response);
                $('input[name="id"]').val(id);
                $('#submitBtn').text('Update');
                $('#staticBackdrop').modal('show');
            }
        });
    }
    function modalOpen()
        {
            $('input[name="id"]').val('');
            $('input[name="role"]').val('');
            $('#submitBtn').text('Submit');
            $('#staticBackdrop').modal('show');
        }
    
    function deleteRecord(id){
        $.ajax({
            url : 'delete_role.php',
            type : 'GET',
            data : {id : id},
            success : function(response){
                alert("record delete");
                window.open('role.php','_self');
            }
                
        });
    }
</script>

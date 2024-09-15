<?php
session_start();
if(!isset($_SESSION['name'])){
  header('location:../index.php');
}
?>
<?php include '../header.php'; ?>
<?php include '../connection.php' ?>
<!-- navbar starts here -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
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
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <li>
        <a href="logout" class="btn btn-danger">logout</a>
      </li>
    </div>
  </div>
</nav>

<!-- Modal Section start here -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group mb-3">
            <input type="text" hidden name="id" id="id">
            <input type="text" name="name" id="name" class="form-control" />
          </div>
          <div class="form-group mb-3">
            <input type="text" name="name" id="email" class="form-control" />
          </div>
          <div class="form-group mb-3">
            <input type="text" name="name" id="phone" class="form-control" />
          </div>
          <button class="btn btn-success" type="submit" id="updateBtn">Update</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Section end here -->

<!-- User Record here -->

<div class="container mt-3">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>SR#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM `users`";
        $query = mysqli_query($conn, $sql);
        if ($query) {
          $sr = 1;
          while ($row = mysqli_fetch_assoc($query)) {
            ?>
      <tr>
        <td>
          <?= $sr ?>
        </td>
        <td>
          <?= $row['name'] ?>
        </td>
        <td>
          <?= $row['email'] ?>
        </td>
        <td>
          <?= $row['phone'] ?>
        </td>
        <td>
          <!-- <button class="btn btn-success" onclick="editUser('<?= $row['id'] ?>')">Edit</button> -->
           <a href="editUser.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
          <button class="btn btn-danger" onclick="deleteUser('<?= $row['id'] ?>')">Delete</button>
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
<?php include '../footer.php'; ?>
<script>
  // function editUser(id) {
  //   $.ajax({
  //     url: "editUser.php",
  //     type: "GET",
  //     data: { id: id },
  //     success: function (response) {
  //       response = JSON.parse(response);
  //       console.log(response);

  //       $("#id").val(response.id);
  //       $("#name").val(response.name);
  //       $("#email").val(response.email);
  //       $("#phone").val(response.phonenumber);
  //       $("#id").val(response.id);
  //       $("#exampleModal").modal("show");
  //     }
  //   });
  // }

  function deleteUser(id) {
    $.ajax({
      url: 'deleteUser.php',
      type: 'GET',
      data: { id: id },
      success: function (response) {
        console.log(response);
        if (response === true) {
          alert("User deleted successfully");
          window.location.reload();
        } else {
          alert("Failed to delete user");
        }
      }
    });
  }

  $('#updateBtn').on("click", function (event) {
    event.preventDefault();
    let id = $("#id").val();
    let name = $("#name").val();
    let email = $("#email").val();
    let phone = $("#phone").val();

    $.ajax({
      url: 'updateUser.php',
      type: 'POST',
      data: { id: id, name: name, email: email, phone: phone },
      success: function (response) {
        console.log(response);
        if (response) {
          alert("User updated successfully");
          $("#exampleModal").modal("hide"); // Close the modal
          window.location('./',"_self");
        } else {
          alert("Failed to update user");
        }
      }
    })
  })

</script>
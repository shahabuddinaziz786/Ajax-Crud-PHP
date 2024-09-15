<?php include('header.php');?>
<div class="login-form-body">

    <div class="card col-md-3">
        <div class="card-body">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-success form-control mb-2" name="submit" type="submit">Submit</button>
                    <button class="btn btn-danger form-control">Reset</button>
                </div>
                <p>Not Registered <a href="registration">registerd now</a></p>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php');?>


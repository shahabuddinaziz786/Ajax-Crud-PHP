<?php include('../header.php');?>
<div class="login-form-body">
    <div class="card col-md-3">
        <div class="card-body">
        <form action="" id="loginForm">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="text" name="phone" id="number" class="form-control">
            </div>
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
                <button class="btn btn-danger form-control" name="submit">Reset</button>
            </div>
    </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $('#loginForm').on('submit',function(e){
        e.preventDefault();
        var name = $('input[name="name"]').val();
        var phone = $('input[name="phone"]').val();
        var password = $('input[name="password"]').val();
        var email = $('input[name="email"]').val();

        if(name == null || name == ''){
            $('input[name="name"]').addClass('is-invalid');
            return false;
        }else{
            $('input[name="name"]').removeClass('is-invalid').addClass('is-valid');
        }
        if(phone == null || phone == ''){
            $('input[name="phone"]').toggleClass('is-invalid');
            return false;
        }
        if(password == null || password == ''){
            $('input[name="password"]').toggleClass('is-invalid');
            return false;
        }
        if(email == null || email == ''){
            $('input[name="email"]').toggleClass('is-invalid');
            return false;
        }
        
        $.ajax({
            type : 'POST',
            url : 'save_user.php',
            data : {name:name,email:email,phone:phone,password:password},
            success:function(data){
                // console.log(data);
                // if(data == true){
                if(data){
                    alert("Data Inserted");
                    // window.open('../','_self');
                    window.open('../');
                }else{
                    alert("Failed");
                }
            }
        });
    });
</script>
<?php include('../footer.php');?>
<?php 
include('../config/scripts.php');
checkisadmin();
include('../includes/header.php')?>

    <div class="row">

            <div class="col-3 ">
            <?php include('../includes/sidebar.php')?>
            </div>
            <div class="col-9 d-flex justify-content-center align-items-center">
                 <form class="row g-3 LoginForm  ">
                   <h1 class=" fw-bold  font-monospace ">Create new Password</h1>
                    <div class="col-8 ">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control inputColor" id="inputEmail4" placeholder="Email@gmail.com">
                    </div>
                    <div class="col-8 ">
                        <label for="inputPassword4" class="form-label">Last Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="*********" >
                    </div>
                    <div class="col-8 ">
                        <label for="inputPassword4" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="*********" >
                    </div>
                   
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                  </form>
            </div>
            
    </div>
<?php include('../includes/footer.php')?>
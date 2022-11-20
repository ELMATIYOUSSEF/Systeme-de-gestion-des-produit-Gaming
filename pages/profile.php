<?php 
include('../config/scripts.php');
$title="Profile";
checkisadmin();
include('../includes/header.php')?>

    <div class="row">

            <div class="col-3 ">
            <?php include('../includes/sidebar.php')?>
            </div>
            <div class="col-9 d-flex justify-content-center align-items-center">
            
                 <form class="row container d-flex justify-content-center align-items-center  " action="../config/scripts.php" method="post">

                 <?php if (isset($_SESSION['Error'])): ?>
                   
                   <div class="alert alert-danger alert-dismissible fade show w-50">
                   <strong>Erorr!</strong>
                   <?php 
                           echo $_SESSION['Error']; 
                           unset($_SESSION['Error']);
                       ?>
                       <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                   </div>
                   <?php endif ?>
                      
                   <?php if (isset($_SESSION['correct'])): ?>       
                   <div class="alert alert-success alert-dismissible fade show w-50">
                   <strong>excellent</strong>
                       <?php 
                           echo $_SESSION['correct']; 
                           unset($_SESSION['correct']);
                       ?>
                       <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                   </div>
                   <?php endif ?>
                    <div class="col-8 ">
                    <h1 class=" fw-bold  font-monospace ">Create new Password</h1>
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="UEmail" class="form-control inputColor" id="inputEmail4" placeholder="Email@gmail.com">
                    </div>
                    <div class="col-8 ">
                        <label for="inputPassword4" class="form-label">Last Password</label>
                        <input type="password" name="UPassword" class="form-control" id="inputPassword4" placeholder="*********" >
                    </div>
                    <div class="col-8 ">
                        <label for="inputPassword4" class="form-label">New Password</label>
                        <input type="password" name="UNewPassword" class="form-control" id="inputPassword4" placeholder="*********" >
                    </div>
                   
                    <div class="col-8">
                        <button type="submit" name="updatePass" class="btn btn-primary">Edit</button>
                    </div>
                  </form>
            </div>
            
    </div>
<?php include('../includes/footer.php')?>
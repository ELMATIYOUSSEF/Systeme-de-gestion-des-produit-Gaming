<?php
include('../config/scripts.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script defer src="https://parsleyjs.org/dist/parsley.min.js"></script>

   
    <title>Login</title>
</head>

<body>

<?php
$login="../index.php";
$signup = "../pages/signup.php";
$img="../Assets/img/Red_Dragon_Logo-removebg-preview.png";
 include('../includes/navbar.php')?>

<div class="row container d-flex  justify-content-between align-items-center pt-5 ">
            
            <div class="col-6">
                 <form class="row g-3 LoginForm " action="../config/scripts.php" method ="post" data-parsley-validate>
                 <?php if (isset($_SESSION['Error'])): ?>
				<div class="alert alert-danger alert-dismissible fade show">
				<strong>Erorr!</strong>
					<?php 
						echo $_SESSION['Error']; 
						unset($_SESSION['Error']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php endif ?>
                   <h1 class=" fw-bold  font-monospace ">Create new Account</h1>
                   <div class="col-6 ">
                        <label for="inputname"   class="form-label"> Name</label>
                        <input type="text" name="Name" class="form-control inputColor" id="inputname" placeholder="Name ..." data-parsley-trigger="keyup" data-parsley-minlength="3" data-parsley-maxlength="10" data-parsley-minlength-message="You need to enter between 3 ou 10  character " data-parsley-validation-threshold="10" required>
                    </div>
                   <div class="col-6">
                        <label for="inputusername" class="form-label">User Name</label>
                        <input type="text" name="UserName" class="form-control inputColor" id="inputusername" placeholder="User name ..." data-parsley-trigger="keyup" data-parsley-minlength="3" data-parsley-maxlength="10" data-parsley-minlength-message="You need to enter between 3 ou 10  character " data-parsley-validation-threshold="10" required>
                    </div>
                    <div class="col-12 ">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="SigninEmail" class="form-control inputColor" id="inputEmail4" placeholder="Email@gmail.com" data-parsley-type="email" required>
                    </div>
                    <div class="col-12 ">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="SigninPassWord" class="form-control" id="inputPassword4" placeholder="*********" data-parsley-trigger="keyup" data-parsley-minlength="3" data-parsley-maxlength="10" data-parsley-minlength-message="You need to enter between 3 ou 10  character" data-parsley-validation-threshold="10" required >
                    </div>
                   
                    <div class="col-12">
                        <button type="submit" name=" SignUp" class="btn btn-primary">Sign Up</button>
                    </div>
                    </form>
            </div>      

            <div class="col-6 px-5 ">
            <div class="circle2"></div>
            <img src="../Assets/img/women.png" id="women" alt="">
            </div>
            
</div>

<?php include('../includes/footer.php')?>
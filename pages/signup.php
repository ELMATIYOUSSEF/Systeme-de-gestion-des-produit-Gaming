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
                 <form class="row g-3 LoginForm ">
                   <h1 class=" fw-bold  font-monospace ">Create new Account</h1>
                   <div class="col-6 ">
                        <label for="inputname"   class="form-label"> Name</label>
                        <input type="text" name="Name" class="form-control inputColor" id="inputname" placeholder="Name ...">
                    </div>
                   <div class="col-6">
                        <label for="inputusername" class="form-label">User Name</label>
                        <input type="text" name="UserName" class="form-control inputColor" id="inputusername" placeholder="User name ...">
                    </div>
                    <div class="col-12 ">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" name="SigninEmail" class="form-control inputColor" id="inputEmail4" placeholder="Email@gmail.com">
                    </div>
                    <div class="col-12 ">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="SigninPassWord" class="form-control" id="inputPassword4" placeholder="*********" >
                    </div>
                   
                    <div class="col-12">
                        <button type="submit" name=" SignIn" class="btn btn-primary">Sign Up</button>
                    </div>
                    </form>
            </div>      

            <div class="col-6 px-5 ">
            <div class="circle2"></div>
            <img src="../Assets/img/women.png" id="women" alt="">
            </div>
            
</div>

<?php include('../includes/footer.php')?>
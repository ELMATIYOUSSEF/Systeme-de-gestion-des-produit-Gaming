<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="Assets/css/style.css">
   
    <title>Login</title>
</head>

<body>
<?php include('includes/navbar.php')?>

<div class="row container d-flex  justify-content-between align-items-center pt-5 ">

            <div class="col-6 px-5 ">
            <img src="Assets/img/men.png" id="imgmen" alt="">
            </div>
            <div class="col-6">
                 <form class="row g-3 LoginForm ">
                   <h1 class=" fw-bold  font-monospace ">Login</h1>
                    <div class="col-12 ">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control inputColor" id="inputEmail4" placeholder="Email@gmail.com">
                    </div>
                    <div class="col-12 ">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="*********" >
                    </div>
                   
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                    <p><a href="#" class="text-decoration-none"> Forgot password?</a></p>
                    <p>Not a member yet? Choose a <br> <strong> Gaming-YOUCODE </strong> plan and get started now!</p>
                  </form>
            </div>      
</div>

<?php include('includes/footer.php')?>
<?php include('../includes/navbar.php')?>

<div class="row container d-flex  justify-content-between align-items-center pt-5 px-5 ">

            <div class="col-6 px-5 ">
            <img src="../Assets/img/men.png" id="imgmen" alt="">
            </div>
            <div class="col-6">
                 <form class="row g-3 LoginForm ">
                   <h1 class="Login_Title fw-bold fs-1 font-monospace ">Login</h1>
                 <div class="col-10 ">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email@gmail.com">
                    </div>
                    <div class="col-10 ">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="*********" >
                    </div>
                   
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                    <p><a href="#" class=""> Forgot password?</a></p>
                  </form>
            </div>
            
</div>

<?php include('../includes/footer.php')?>
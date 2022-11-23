
<nav class="navheader">
    <div class="row row-cols-1 row-cols-md-3 g-4" >
        <div class="col d-flex justify-content-center align-items-center ">
               <img src=<?php echo $img ?> class="logo" alt="">
        </div>
        <div class="col d-flex justify-content-center align-items-center">
      <ul class="d-flex flex-row navbar-nav text-uppercase fs-4 fw-bold font-monospace text-white">
        <li class="nav-item liHeader d-ms-none d-md-none d-lg-none d-xl-block py-2 px-4">
          <a class="nav-link active " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item liHeader d-ms-none d-md-none d-lg-none d-xl-block  py-2 px-4">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item liHeader d-ms-none d-md-none d-lg-none d-xl-block py-2 px-4">
          <a class="nav-link " href="#" >Mission</a>
        </li>
      </ul>
      </div>
      <div class="col d-flex justify-content-center align-items-center">
      <a href=<?php echo $login?> class="text-decoration-none btn btnHeader text-uppercase fs-4 fw-bold font-monospace text-white" >Login </a>
        <a href=<?php echo $signup?> class="btnSignUp py-2 px-4 btn btnHeader text-uppercase fs-4 fw-bold font-monospace " type="button">Sign Up</a>
      </div>
    </div>
</nav>

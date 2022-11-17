
<nav class="navheader">
    <div class="d-flex flex-row justify-content-evenly align-items-center " >
        <div class="logo ">
               <img src=<?php echo $img ?> class=" w-25" alt="">
        </div>
        
      <ul class="d-flex flex-row navbar-nav text-uppercase fs-4 fw-bold font-monospace text-white">
        <li class="nav-item liHeader py-2 px-4">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item liHeader py-2 px-4">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item liHeader py-2 px-4">
          <a class="nav-link " href="#" >Mission</a>
        </li>
      </ul>
      <div>
      <a href=<?php echo $login?> class="text-decoration-none btn btnHeader text-uppercase fs-4 fw-bold font-monospace text-white" >Login </a>
        <a href=<?php echo $signup?> class="btnSignUp py-2 px-4 btn btnHeader text-uppercase fs-4 fw-bold font-monospace " type="button">Sign Up</a>
      </div>
    </div>
</nav>

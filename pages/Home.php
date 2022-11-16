<?php 
$title= "home";
include('../includes/header.php')?>

    <div class="row">

            <div class="col-3 ">
            <?php include('../includes/sidebar.php')?>
            </div>
            <div class="col-9 d-flex flex-column justify-content-center align-items-center text-center g-5 ">
                <div class="container">
                    <h1>Welcome</h1>
                    <h2>Admin</h2>
                    <h4>voulez-vous ajouter</h4>
                    <div class="">
                        <button type="button" class="btn btn-primary p-2">Admin</button>
                        <button type="button" class="btn btn-primary p-2">Category</button>
                        <button type="button" class="btn btn-primary p-2">Games</button>
                    </div>
                </div>
            </div>
            
    </div>
<?php include('../includes/footer.php')?>
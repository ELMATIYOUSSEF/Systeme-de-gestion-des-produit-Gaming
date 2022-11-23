
<?php
include('../config/scripts.php');
checkisadmin(); 
$title= "home";
include('../includes/header.php') ;
 $sql="select count('Id') as Cadmin from admin";
$countadmin =Statistic($sql) ;
$sql1="SELECT AVG( FORMAT( CAST( product.Price AS DECIMAL(9,6)), 'g18')) as Moyenne FROM product;";
$moyenTotalPrixProduct =Statistic($sql1) ;
$sql2="select count('Id') as Cproduct from product";
$countproduct =Statistic($sql2) ;

?>
    <div class="row">
            <div class="col-3 ">
            <?php include('../includes/sidebar.php')?>
            </div>
            <div class="col-9">
                 
            <div class="container"> 
            <h3 class ="pt-5">Pages <span>/</span> Home</h3> 
                <!-- start sesstion -->
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
                   
                <?php if (isset($_SESSION['correct'])): ?>       
				<div class="alert alert-success alert-dismissible fade show">
                <strong>excellent</strong>
					<?php 
						echo $_SESSION['correct']; 
						unset($_SESSION['correct']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			    <?php endif ?>
                <!-- end session -->
                <div class="w-100 d-flex gap-5 justify-content-center align-items-center text-center pt-5">
                    <h1>Welcome</h1>
                    <h1><?php echo $_SESSION['name']; ?></h1>
                </div>

                <div class="row row-cols-1 row-cols-md-4 g-4 gap-3 text-center">
                    <div class="col">
                            <div class="card ">
                            <h5 class="card-header text-center">Admin</h5>
                            <div class="card-body d-flex   bg-primary p-2 text-white bg-opacity-100 justify-content-around align-items-center  ">
                                <h1 class="card-title"><?= $countadmin['Cadmin'] ?></h1>
                                <lord-icon
                                    src="https://cdn.lordicon.com/bhfjfgqz.json"
                                    trigger="hover"
                                    colors="primary:#fff"
                                    style="width:80px;height:80px">
                                </lord-icon>
                            </div>
                            </div>
                    </div>
                    <div class="col ">
                        <div class="card ">
                            <h5 class="card-header text-center">Produit</h5>
                            <div class="card-body bg-warning p-2 text-white bg-opacity-100 d-flex bg-success p-2 text-white bg-opacity-75 justify-content-around align-items-center  ">
                                <h1 class="card-title"><?=  $countproduct['Cproduct'] ?></h1>
                                <lord-icon
                                    src="https://cdn.lordicon.com/tyvtvbcy.json"
                                    trigger="hover"
                                    colors="primary:#fff"
                                    style="width:80px;height:80px">
                                </lord-icon>
                            </div>
                        </div>
                    
                    </div>

                    <div class="col">
                    <div class="card ">
                        <h5 class="card-header text-center">Total </h5>
                        <div class="card-body bg-success p-2 text-white bg-opacity-100 d-flex  justify-content-around align-items-center  ">
                            <h1 class="card-title"><?= $moyenTotalPrixProduct['Moyenne'] ?></h1>
                            <lord-icon
                                src="https://cdn.lordicon.com/qtldxoay.json"
                                trigger="hover"
                                colors="primary:#fff"
                                style="width:80px;height:80px">
                            </lord-icon>
                        </div>
                    </div>
                    </div>
                    
                 </div> 
                   
                    <h4 class="pt-5">voulez-vous ajouter</h4>
                    <div class="text-center d-grid pt-3">
                        <div class="card">
                                <div class="card-header">
                                Warning 1 !!
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"> Click in Button Categorie if you want to add category </h5>
                                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                                </div>
                        </div>
                        <button type="button" name="addcategorie" class="btn btn-primary mt-3 p-2 pt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Categorie</button>
                        <div class="card">
                                <div class="card-header">
                                Warning 1 !!
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Click in Button Produit  if you want to add Product</h5>
                                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                                </div>
                        </div>
                        <button type="button" name="addgames" class="btn btn-primary p-2 mt-3 pt-3" data-bs-toggle="modal" data-bs-target="#addGame">Produit </button>
                    </div>
                </div>
            </div>    
    </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Categorie</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/scripts.php" method="post">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="nameCategorie" class="form-control" id="recipient-name">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="saveCategorie" class="btn btn-primary">Save</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- for add games -->
<div class="modal fade" id="addGame" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Games</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/scripts.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="Categorie" class="col-form-label">Categorie :</label>
                <select class="form-select"name="Categorie" id="Categorie" aria-label="Default select example">
                <?php 
                $table = 'categorie';
                    $data = getdata($table) ;
                    foreach ($data as $cat) {
                        echo "<option name=".$cat['Id']." >$cat[Label]</option>";
                    }
                ?>   
                </select>
            </div>
            <div class="mb-3">
                <label for="id_admin" class="col-form-label">Id Admin :</label>
                <input type="text" value=<?php echo $_SESSION['idadmin'] ?> class="form-control" id="id_admin" disabled>
            </div>
            <div class="mb-3">
                <label for="title" class="col-form-label">Title :</label>
                <input type="text" name="title"  class="form-control" id="title">
            </div>
            <div class="md-3">
                <label for="Description">Description :</label>
                <textarea class="form-control" name="description"  id="floatingTextarea"></textarea>
                
            </div>
            <div class="mb-3">
                <label for="price" class="col-form-label">Price :</label>
                <input type="text" name="price"  class="form-control" id="price">
            </div>
            <div class="mb-3">
                <label for="qnt" class="col-form-label">Quantity :</label>
                <input type="text" name="Qnt"  class="form-control" id="qnt">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Ajoute un Image :</label>
                <input class="form-control" name="my_image" type="file" id="formFile">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addProduit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <footer class="fixed-bottom ">
        <div class="text-center footer--center "><h3> 	&copy; 2022 YouCode - All Rights Reserved</h3></div>
</footer>
</div>

<?php include('../includes/footer.php')?>
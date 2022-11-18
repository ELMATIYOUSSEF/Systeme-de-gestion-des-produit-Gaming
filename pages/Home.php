
<?php
include('../config/scripts.php');
checkisadmin(); 
$title= "home";
include('../includes/header.php')?>
    <div class="row">
            <div class="col-3 ">
            <?php include('../includes/sidebar.php')?>
            </div>
            <div class="col-9 d-flex flex-column justify-content-center align-items-center text-center g-5 ">
                <div class="container">
                <?php if (isset($_SESSION['addcateg'])): ?>
                   <?php if( $_SESSION['addcateg']== "this categorie is already exist"): ?>
				<div class="alert alert-danger alert-dismissible fade show">
                <strong>Erorr!</strong>
                   <?php endif ?>
                   <?php if( $_SESSION['addcateg']== "has beeen added successfully"): ?>
				<div class="alert alert-success alert-dismissible fade show">
                <strong>excellent</strong>
                   <?php endif ?>
					<?php 
						echo $_SESSION['addcateg']; 
						unset($_SESSION['addcateg']);
					?>
					<button type="button" class="btn-close" data-bs-dismiss="alert"></span>
				</div>
			<?php endif ?>
                    <h1>Welcome</h1>
                    <h2><?php echo $_SESSION['name']; ?></h2>
                    <h4>voulez-vous ajouter</h4>
                    <div class="">
                        <button type="button" name="addcategorie" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Categorie</button>
                        <button type="button" name="addgames" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#addGame">Games</button>
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
        <form action="../config/scripts.php" method="post">
            <div class="mb-3">
                <label for="Categorie" class="col-form-label">Categorie :</label>
                <select class="form-select"name="Categorie" id="Categorie" aria-label="Default select example">
                <?php 
                    $data = getCategories() ;
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
                <label for="qnt" class="col-form-label">Quntite :</label>
                <input type="text" name="Qnt"  class="form-control" id="qnt">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Ajoute un Image :</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addProduit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php')?>
<div class="modal fade" id="addGame" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <?php echo $TitleModel ?> Games</h5>
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
                        echo "<option value=".$cat['Id']." >$cat[Label]</option>";
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
                <input type="text" name="title" value =<?php echo $title ?> class="form-control" id="title">
            </div>
            <div class="md-3">
                <label for="Description">Description :</label>
                <textarea class="form-control" name="description"  id="description"></textarea>
                
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
                <input class="form-control" name="my_image" type="file" id="formFile" require>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addProduit" <?php echo $savehidden ?> class="btn btn-primary">Save</button>
                <button type="submit" name="UpProduit" <?php echo $updatehidden ?> class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
      include('../config/scripts.php');
      $title="Admin";
      checkisadmin();
      include('../includes/header.php');
      
?>

    <div class="row">

      <div class="col-3 ">
        <?php include('../includes/sidebar.php')?>
      </div>
      <div class="col-9 container d-flex justify-content-center align-items-center">
            <div class="col py-3">
                <table class="table pt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantite</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $table='product';
                      $data = getdata($table);
                      foreach ($data as $prduct) {
                        if(strlen( $prduct['Description'])<15){
                          $des = $prduct['Description'];
                        }
                        else  $des = substr($prduct['Description'],0,15).'...';

                          echo '<tr>
                          <th scope="row">'.$prduct['Id'].'</th>
                          <td>  <img src="../Assets/img/uploads/'.$prduct['Image'].'"  id="sizeImage"  alt=""></td>
                          <td>'.$prduct['Titel'].'</td>
                          <td title ="'.$prduct['Description'].'" >'. $des.'</td>
                          <td>'.$prduct['Price'].' DH</td>
                          <td>'.$prduct['Quntite'].'</td>
                          <td>
                          <a href="Product.php?id='.$prduct['Id'].'" type="button" class="btn btn-success " id="Edit_Product">Edit</a>
                          <a href="Product.php?id='.$prduct['Id'].'" type="button" onclick="Edit_Product('.$prduct['Id'].')" data-bs-toggle="modal" id="delete_Product" data-bs-target="#exampleModal" class="btn btn-danger ">delete</a></td>
                        </tr>';
                      }
                    ?>     
                     
                      
                    </tbody>
                  </table>
                  <div aria-label="..." class="container d-flex justify-content-center align-items-end">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item disabled">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="page-item disabled"><a class="page-link" href="#">3</a></li>
                      <li class="page-item disabled">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                   </div>
                  
            </div>
      </div>
  
    </div>

    <!-- delete -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sur !!!!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/scripts.php" method="post">
          <input type="text" name="idForDelete" class="inputH" >
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="deletP"  class="btn btn-danger">delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('../includes/footer.php');
?>
<script>
 function Edit_Product(id){
  console.log(id);
   document.querySelector(".inputH").value = id;
}

</script>

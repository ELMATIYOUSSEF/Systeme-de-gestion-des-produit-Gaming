<?php 
      include('../config/scripts.php');
      $title="Product";
      checkisadmin();
      include('../includes/header.php'); 
      $TitleModel = 'Update' ;
     $savehidden='hidden';
     $updatehidden ='';
include('../includes/model.php');
?>

    <div class="row">

      <div class="col-3 ">
        <?php include('../includes/sidebar.php')?>
      </div>
      <div class="col-9 container d-flex justify-content-center align-items-center">
            <div class="col py-3">
            <input type="hidden" name="idForUpdate" class="idForUpdate" >
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
                         <button type="submit" name="Edit_Btn" onclick="remplairmodel('.$prduct['Id'].')"> <a href="Product.php?id='.$prduct['Id'].'" type="button" class="btn btn-success " data-bs-toggle="modal" id="delete_Product" data-bs-target="#addGame" class="btn btn-danger ">Edit</a> </button>
                          <a href="Product.php?id='.$prduct['Id'].'" type="button" onclick="deletProduct('.$prduct['Id'].')" data-bs-toggle="modal" id="delete_Product" data-bs-target="#exampleModal" class="btn btn-danger ">delete</a></td>
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
          <input type="hidden" name="idForDelete" class="inputH" >
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="deletP"  class="btn btn-danger">delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include('../includes/footer.php');
?>
<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
<script>
 function deletProduct(id){
  console.log(id);
   document.querySelector(".inputH").value = id;
  };
  function remplairmodel(id){
    console.log(id);
    document.querySelector(".idForUpdate").value = id;
    $.ajax({

      type : "POST",
      url : "../config/scripts.php",
      data :{openTask : id},
      success: function (obj)
      {
        console.log(obj);
        document.querySelector("#Categorie").value = obj[3];
        document.querySelector("#id_admin").value =  obj[8];
        document.querySelector("#title").value = obj[4];
        document.querySelector("#description").value = obj[5] ;
        document.querySelector("#price").value = obj[6];
        document.querySelector("#qnt").value = obj[7];
      }

    });
  }

</script>
 
<?php
include('../config/scripts.php');
checkisadmin();
$title = 'Gaming'; 
include('../includes/header.php')
?>

    <div class="row">

            <div class="col-3 ">
            <?php include('../includes/sidebar.php')?>
            </div>
            <div class="col-9 d-flex justify-content-center align-items-center">
            <div class="col py-3">
                <table class="table pt-5">
                    <thead>
                      <tr>
                      <th scope="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $table='admin';
                      $data = getdata($table);
                      foreach ($data as $prduct) {
                          echo '<tr>
                          <th scope="row"></th>
                          <th scope="row">'.$prduct['Id'].'</th>
                          <td>'.$prduct['Name'].'</td>
                          <td>'.$prduct['UserName'].'</td>
                          <td>'.$prduct['Email'].' DH</td>
                          <td><a href="Product.php?id='.$prduct['Id'].'" type="button" class="btn btn-success ">Edit</a>
                          <a href="Product.php?id='.$prduct['Id'].'" type="button" class="btn btn-danger ">delete</a></td>
                        </tr>';
                      }
                    ?>     
                     
                      
                    </tbody>
                  </table>
            </div>
            
    </div>
<?php include('../includes/footer.php')?>
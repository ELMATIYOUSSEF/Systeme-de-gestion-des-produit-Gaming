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
            <button type="button" class="hiddenButton"data-bs-toggle="modal"  data-bs-target="#exampleModal" class="btn btn-danger " hidden></button>
                <table class="table pt-5">
                    <thead>
                      <tr>
                      <th scope="col"></th>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $table='admin';
                      $data = getdata($table);
                      foreach ($data as $admin) {
                        if($admin['status'] == 1){
                            $staus = "Online";
                            $clr ="success";
                        }
                        else{
                            $staus = "Offline";
                            $clr="danger";
                        }
                        
                          echo '<tr>
                          
                          <th scope="row"></th>
                          <td> '.$admin['Id'].' </td>
                          <td>'.$admin['Name'].'</td>
                          <td>'.$admin['UserName'].'</td>
                          <td>'.$admin['Email'].'</td>
                          <td>
                          <a href="Admins.php?id='.$admin['Id'].'"><lord-icon src="https://cdn.lordicon.com/kfzfxczd.json" trigger="hover" colors="primary:#c71f16" style="width:32px;height:32px"> </lord-icon></a> 
                          </td>
                          <td><button class="btn btn-'.$clr.' " type="button" >'.$staus.' </button></td>
                        </tr>';
                      }
                    ?>     
                     
                      
                    </tbody>
                  </table>
            </div>
            
    </div>

<!-- delete admin  -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sur !!!!</h5>
        <button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../config/scripts.php" method="post">
          <input type="hidden" name="idForDelete" class="inputH" >
        <button type="button" onclick="closemodel()"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="deletadmin"  class="btn btn-danger">delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
 include('../includes/footer.php');
?>
<script>
    let id = <?=$_GET['id']?>;
    <?php if(isset($_GET['id'])): ?>
   console.log(id);
   document.querySelector(".hiddenButton").click();
   document.querySelector(".inputH").value = id;
<?php endif; ?>
function closemodel(){
    document.querySelector("#close").click();
    location.href = "http://localhost/Systeme-de-gestion-des-produit-Gaming/pages/Admins.php";
}
</script>
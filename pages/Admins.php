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
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $table='admin';
                      $data = getdata($table);
                      foreach ($data as $admin) {
                        if($admin['status'] == 1){
                            $staus = "connecte";
                            $clr ="success";
                        }
                        else{
                            $staus = "deconnecte";
                            $clr="danger";
                        }
                        
                          echo '<tr>
                          <th scope="row"></th>
                          <th scope="row">'.$admin['Id'].'</th>
                          <td>'.$admin['Name'].'</td>
                          <td>'.$admin['UserName'].'</td>
                          <td>'.$admin['Email'].' DH</td>
                          <td><a href="Product.php?id='.$admin['Id'].'" type="button" class="btn btn-success ">Edit</a>
                          <a href="Product.php?id='.$admin['Id'].'" type="button" class="btn btn-danger ">delete</a></td>
                          <td><button class="btn btn-'.$clr.' " type="button" >'.$staus.' </button></td>
                        </tr>';
                      }
                    ?>     
                     
                      
                    </tbody>
                  </table>
            </div>
            
    </div>
<?php include('../includes/footer.php');
function check(){
if($_SESSION['idadmin']){
    $id = $_SESSION['idadmin'] ;
return $id ;
}
}

?>
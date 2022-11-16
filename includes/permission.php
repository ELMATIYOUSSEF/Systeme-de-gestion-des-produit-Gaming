<?php 
// i well make it as a function 
if(!mysqli_num_rows(mysqli_query($connection,$sql))){
        $_SESSION['name']=$name;
        header("Location:welcome.php");
    }

?>
<!-- fach ndkhal ka admin makhasch tla3 liya login ou sing up -->
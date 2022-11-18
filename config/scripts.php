<?php

//********* function for check is user of application is admin or not  ************/
function checkisadmin()
{
    if($_SESSION['name']== ''){
        header("Location:../index.php");
    }
}

//INCLUDE DATABASE FILE
include ('connection.php');

//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//ROUTING
if(isset($_POST['SignIn'])) SignIn();
if(isset($_POST['SignUp'])) SignUp();
if(isset($_POST['saveCategorie'])) saveCategorie();
if(isset($_POST['addProduit'])) saveGames();
 
//page login
//********* function SignIn  ************/

function SignIn(){
    global $connection;

    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql = "SELECT * FROM admin WHERE Email='$email'";
    $result = mysqli_query($connection,$sql);

    $numAccount = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['PassWord'])) 
    {
        if($row['Email'] == $email)
            {
                $_SESSION['idadmin'] = $row['Id'];
                $_SESSION['name']=$row['Name'];
                header('location: .././pages/home.php');
            }
        else
            {
            $_SESSION['Vide'] = 'email is wrong';
                header('location: ../index.php');
            }
    } 
    
    else
        {
        $_SESSION['Vide'] = 'password is wrong';
        header('location: ../index.php');
        }  

}
//page signUp

//********* function SignUp ************/
function SignUp(){
    global $connection;
    $name =htmlspecialchars(trim($_POST['Name']));
    $username =htmlspecialchars(trim($_POST['UserName']));
    $email =filter_var($_POST['SigninEmail'],FILTER_VALIDATE_EMAIL);
    $password =htmlspecialchars(trim(password_hash($_POST['SigninPassWord'], PASSWORD_BCRYPT)));

    if(!empty($name) && !empty($username) && !empty($password) && !empty($email) && !is_numeric($username))
    {
    $sql = "SELECT * FROM admin WHERE Email='$email'";
    $result = mysqli_query($connection,$sql);
    $numEmail = mysqli_num_rows($result);

    if($numEmail == 0){
        $sql = "INSERT INTO admin (Name,UserName,Email,PassWord) VALUES ('$name','$username','$email','$password')";
        $result = mysqli_query($connection,$sql);

        $_SESSION['accountCreated'] = 'your account has beeen created successfully';
        header('location: ../index.php');
    }else{
        $_SESSION['emailExist'] = 'this email is already exist';
        header('location: .././pages/signup.php');
    }
}else{
    // hado khashom itqado baqi masalithom
    $_SESSION['wrongData']='check your informations';
    header('location: .././pages/signup.php');
}
}
//page Home 
//********* function save categories  ************/
function saveCategorie(){
    global $connection;
    $name =htmlspecialchars(trim($_POST['nameCategorie']));
    if(!empty($name))
    {
            $sql = "SELECT * FROM categorie WHERE Label='$name'";
        $result = mysqli_query($connection,$sql);
        $numCat = mysqli_num_rows($result);
        if($numCat == 0){
            $sql = "INSERT INTO categorie (Label) VALUES ('$name')";
            $result = mysqli_query($connection,$sql);
            $_SESSION['addcateg'] = 'has beeen added successfully';
            header('location: .././pages/home.php');
        }else{
            $_SESSION['addcateg'] = 'this categorie is already exist';
            header('location: .././pages/home.php');
        }        
    }
    else{
        $_SESSION['addcateg']='check your informations';
        header('location: .././pages/home.php');
    }
}
//************* function for get all categorie from table categorie **********/
function getCategories(){
    global $connection;
         $sql = "SELECT * FROM categorie";
        $result = mysqli_query($connection,$sql);
        $dataCat = array();
        while($row = mysqli_fetch_assoc($result))
             $dataCat[] = $row;
        return $dataCat;
}
//************ function for get all product from table product ************/
function getGames(){
    global $connection;
    $sql = "SELECT * FROM product";
   $result = mysqli_query($connection,$sql);
   $dataProduit = array();
   while($row = mysqli_fetch_assoc($result))
        $dataProduit[] = $row;
   return $dataProduit;
}

//************ function for add Product **************/
function saveGames(){
    global $connection;
    $categorie =htmlspecialchars(trim($_POST['Categorie']));
    $title =htmlspecialchars(trim($_POST['title']));
    $description =htmlspecialchars(trim($_POST['description']));
    $price =is_numeric($_POST['price']);
    $Qnt =htmlspecialchars(trim($_POST['Qnt']));
    if(!empty($categorie)&&!empty($title)&&!empty($description)&&!empty($price)&&!empty($Qnt))
    {
        $idadmin= $_SESSION['idadmin'];
            $datacat=getCategories();
            foreach ($datacat as $cat) {
                if($cat['Label']===$categorie){
                    $catSend = $cat['Id'];
                }
            }
            $sql = "INSERT INTO product (Id_cate,Titel,Description,Price,Quntite,Id_admin) VALUES ('$catSend','$title' , '$description' ,'$price','$Qnt','$idadmin')";
            $result = mysqli_query($connection,$sql);
            $_SESSION['addcateg'] = 'has beeen added successfully';
            header('location: .././pages/home.php');  
    }
    else{
        $_SESSION['addcateg']='check your informations';
        header('location: .././pages/home.php');
    }
}

?>
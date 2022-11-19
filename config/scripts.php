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

        $_SESSION['correct'] = 'your account has beeen created successfully';
        header('location: ../index.php');
    }else{
        $_SESSION['Error'] = 'this email is already exist';
        header('location: .././pages/signup.php');
    }
}else{
  
    $_SESSION['Error']='check your informations';
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
            $_SESSION['correct'] = 'has beeen added successfully';
            header('location: .././pages/home.php');
        }else{
            $_SESSION['Error'] = 'this categorie is already exist';
            header('location: .././pages/home.php');
        }        
    }
    else{
        $_SESSION['Error']='check your informations';
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


//************* function for upload Image this function return name of image  ****************/
function uploadimage()
{
	 if (isset($_FILES['my_image']['name']))
   {
        global $connection;

		// echo "<pre>";
		// print_r($_FILES['my_image']);
		// echo "</pre>";
		$img_name = $_FILES['my_image']['name'];
		$img_size = $_FILES['my_image']['size'];
		$tmp_name = $_FILES['my_image']['tmp_name'];
		$error = $_FILES['my_image']['error'];

		    if ($error === 0)
			{
				if ($img_size > 125000) 
				{
                    $_SESSION['Error'] = "Sorry, your file is too large.";
                     header('location: .././pages/home.php');
				}
				else
				{
					$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// return extension of image
					$img_ex_lc = strtolower($img_ex);

					$allowed_exs = array("jpg", "jpeg", "png"); 

						if (in_array($img_ex_lc, $allowed_exs)) 
						{
							$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
							$img_upload_path = '../Assets/img/uploads/'.$new_img_name;
							move_uploaded_file($tmp_name, $img_upload_path);
						}
                        else {
                            $_SESSION['Error'] = "You can't upload files of this type";
                            header('location: .././pages/home.php'); 
                        }
				}
				}
		    else
            {
                $_SESSION['Error'] = 'unknown error occurred!';
                header('location: .././pages/home.php'); 
				
			}
	}
    return $new_img_name;
}
		


//************ function for add Product **************/
function saveGames(){
    global $connection;
    $categorie =htmlspecialchars(trim($_POST['Categorie']));
    $title =htmlspecialchars(trim($_POST['title']));
    $description =htmlspecialchars(trim($_POST['description']));
    $price =is_numeric($_POST['price']);
    $Qnt =htmlspecialchars(trim($_POST['Qnt']));
    $imagename = uploadimage() ;
    if(!empty($categorie)&&!empty($title)&&!empty($description)&&!empty($imagename)&&!empty($price)&&!empty($Qnt))
    {
            $idadmin= $_SESSION['idadmin'];
            $datacat=getCategories();
            foreach ($datacat as $cat) {
                if($cat['Label']===$categorie){
                    $catSend = $cat['Id'];
                }
            }
            $sql = "INSERT INTO product (Image,Id_cate,Titel,Description,Price,Quntite,Id_admin) VALUES ('$imagename','$catSend','$title' , '$description' ,'$price','$Qnt','$idadmin')";
            $result = mysqli_query($connection,$sql);
            $_SESSION['correct'] = 'has beeen added successfully';
            header('location: .././pages/home.php');  
    }
    else{
        $_SESSION['Error']='check your informations';
        header('location: .././pages/home.php');
    }
}

?>
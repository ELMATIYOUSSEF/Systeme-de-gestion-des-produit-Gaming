<?php

//INCLUDE DATABASE FILE
// include '../includes/database.php';

//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//ROUTING
if(isset($_POST['SignIn'])) SignIn();
if(isset($_POST['SignUp'])) SignUp();

function SignIn(){
    global $conn;

    $email=$_POST['email'];
    $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $sql = "SELECT * FROM admins WHERE email='$email'";
    $result = mysqli_query($conn,$sql);

    $numAccount = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    $password_v=password_verify($row['password'],$password);

    if ($password_v== '1'){
    if($row['email'] == $email){
        $_SESSION['noAccount'] = 'email is wrong';
        header('location: .././pages/login.php');
    }else{
        // $_SESSION['id'] = $row['id'];
        // $_SESSION['name'] = $row['name'];
        // $_SESSION['email'] = $row['email'];
        // $_SESSION['password'] = $row['password'];

        header('location:.././pages/dashboard.php');

    }
}
else{
    $_SESSION['noAccount'] = 'password is wrong';
    header('location: .././pages/login.php');
}  

}

function SignUp(){
    GLOBAL $connection;
    $name =htmlspecialchars(trim($_POST['Name']));
    $username =htmlspecialchars(trim($_POST['UserName']));
    $email =filter_var($_POST['SigninEmail'],FILTER_VALIDATE_EMAIL);
    $password =htmlspecialchars(trim(password_hash($_POST['SigninPassWord'], PASSWORD_BCRYPT)));

    if(!empty($name) && !empty($username) && !empty($password) && !empty($email) && !is_numeric($username))
    {
    $sql = "SELECT * FROM admins WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    $numEmail = mysqli_num_rows($result);

    if($numEmail == 0){
        $sql = "INSERT INTO admins (name,email,password`) VALUES ('$username','$email','$password')";
        $result = mysqli_query($conn,$sql);

        $_SESSION['accountCreated'] = 'your account has beeen created successfully';
        header('location: .././pages/login.php');
    }else{
        $_SESSION['emailExist'] = 'this email is already exist';
        header('location: .././pages/signup.php');
    }
}else{
    $_SESSION['wrongData']='check your informations';
    header('location: .././pages/signup.php');
}
}
?>
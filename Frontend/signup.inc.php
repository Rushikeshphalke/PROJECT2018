<?php
    if(true){
        include_once 'db.inc.php';
        $user_name = mysqli_real_escape_string($conn, $_POST['name']);
        $user_email = mysqli_real_escape_string($conn, $_POST['email']);
        $user_age = mysqli_real_escape_string($conn, $_POST['age']);
	$user_sex = mysqli_real_escape_string($conn, $_POST['sex']);
	$user_pass = mysqli_real_escape_string($conn, $_POST['pass']);
        session_start();
        //HASHING THE PASSWORD
        $hashedPwd = password_hash($user_pass, PASSWORD_DEFAULT);
        //inserting into data_base
        
        $sql = "INSERT INTO users (user_name ,user_email,user_age,user_sex ,user_pass) 
        VALUES('$user_name','$user_email','$user_age','$user_sex','$hashedPwd');";
        mysqli_query($conn, $sql);
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_email'] = $user_email;
        $_SESSION['user_age'] = $_age;
        $_SESSION['user_sex'] = $user_sex;
	$_SESSION['user_pass'] = $user_pass;
        //after login where shud it redirect(symptoms page)
        header("Location: ../../signin.html");
        exit(); 
    }
    else{
        header("Location: ../../signup.html");
        exit();
    }
?>

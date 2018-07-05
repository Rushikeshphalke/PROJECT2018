<?php
    if(isset($_POST['submit'])){
        include_once 'db.inc.php';
        $user_name = mysqli_real_escape_string($conn, $_POST['email']);
        $user_pass = mysqli_real_escape_string($conn, $_POST['pass']);
        /*
            Modify here according to table fields
        */
        $sql = "SELECT * FROM users WHERE  user_email = '$user_name'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1 || $resultCheck>1){
            header("Location: ../../signin.html?login=error");
            exit();
        }
        else{
            if($row = mysqli_fetch_assoc($result)){
               
                $hashedPwdCheck = password_verify($user_pass,$row['user_pass']);
                if($hashedPwdCheck == false){
                    header("Location: ../../signup.php?login=error");
                    exit();
                }
                elseif($hashedPwdCheck == true){
                    //login the user here
                    session_start();
                    /*
                        Modify here according to table fields
                    */
                    $_SESSION['user_name'] = $row['user_name'];
                    /*
                        Modify for after login here
                    */
                    header("Location: ../../main.php");
                    exit();
                }
            }
        }
    }
    else{
        header("Location: ../../signin.html?login=error");
        exit();
    }
?>
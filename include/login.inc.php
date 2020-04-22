<?php

if(isset($_POST['login-submit'])){
    require 'dbhandler.inc.php';

    $uidUser = $_POST['username'];
    $password = $_POST['pwd'];

    if(empty($uidUser) || empty($password)){
        header("Location: ../index.php?error=empty");
        exit();

    }else{
        $sql = "SELECT * FROM users WHERE uidUsernames=? OR userEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=error");
            exit();

        }else{
            mysqli_stmt_bind_param($stmt, "ss", $uidUser, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $passwordcheck = password_verify($password, $row['userpwd']);
                if($passwordcheck == false){
                    header("Location: ../index.php?error=wrongpassword");
                    exit();

                }else if($passwordcheck == true){
                    session_start();
                    $_SESSION['userID'] = $row['idUsers'];
                    $_SESSION['userUID'] = $row['uidUsernames'];
                    header("Location: ../todo.php?login=success&uid=".$uidUser);
                    exit();
                }
            }else{
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}else if(isset($_POST['new-user'])){
    header("Location: ../newuser.php");
    exit();
}else{
    header("Location: ../index.php");
    exit();
}
?>
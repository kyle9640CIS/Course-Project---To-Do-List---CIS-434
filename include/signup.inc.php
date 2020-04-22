<?php

    if(isset($_POST['signup'])){

        require 'dbhandler.inc.php';

        $username = $_POST['uid'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];
        $passwordcheck = $_POST['pwdConfirm'];

        if(empty($username) || empty($email) || empty($password) || empty($passwordcheck)){
            header("Location: ../newuser.php?error=emptyfields&uid=".$username."&mail=".$email);
            exit();

        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)){
            header("Location: ../newuser.php?error=invalidentry");
            exit();

        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../newuser.php?error=invalidemail&uid=".$username);
            exit(); 

        }else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../newuser.php?error=invalidusername&mail=".$email);
            exit();

        }else if($password !== $passwordcheck){
            header("Location: ../newuser.php?error=passwordcheckfailed&uid=".$username."&mail=".$email);
            exit();

        }else{
            $sql = "SELECT uidUsernames FROM users WHERE uidUsernames=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../newuser.php?error=error");
            exit();

            }else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $result = mysqli_stmt_num_rows($stmt);
            if($result > 0){
                header("Location: ../newuser.php?error=usernameunavailable&mail=".$email);
            exit();

            }else{
                $sql = "INSERT INTO users (uidUsernames, userEmail, userpwd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../newuser.php?error=error");
                    exit();
                }else{
                    $hashpwd = password_hash($password, PASSWORD_DEFAULT);
                    session_start();
                    $_SESSION['userID'] = $row['idUsers'];

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../todo.php?&uid=".$username);
                    exit();
                }
            }

        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    }else{
        header("Location: ../signup.php");
        exit();
    }


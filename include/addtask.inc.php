<?php
require 'dbhandler.inc.php';

session_start();
$user = $_SESSION['userID'];
$task = $_POST['taskName'];
$classname = $_POST['className'];
$priority = $_POST['priority'];
$taskdate = $_POST['taskDate'];

if(isset($_POST['addtask'])){
    $sql = "INSERT INTO tasks (taskName, className, priority, taskDate, idUser) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../todo.php?error=error&uid=".$user);
        exit();

    }else{
        mysqli_stmt_bind_param($stmt, "ssisi", $task, $classname, $priority, $taskdate, $user);
        mysqli_stmt_execute($stmt);
        header("Location: ../todo.php?&uid=".$user);
        exit();
    }
}

if(isset($_POST['removetask'])){
    $sql = "DELETE FROM tasks WHERE taskName='$task';";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../todo.php?error=error&uid=".$user);
        exit();

    }else{
        mysqli_stmt_bind_param($stmt, "s", $task);
        mysqli_stmt_execute($stmt);
        header("Location: ../todo.php?&uid=".$user);
        exit();
    }
}
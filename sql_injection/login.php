<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <?php

        // // Code lỗi
        // if (isset($_POST["login"])) {
        //     $email = $_POST["email"];
        //     $password = $_POST["password"];
        //     require_once "../database.php";
        //     $sql = "SELECT * FROM users WHERE username = '$email' AND password = '$password'";
        //     $result = mysqli_query($conn, $sql);
        //     $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //     if (mysqli_num_rows($result) > 0) {
        //         // if (password_verify($password, $user["password"])) {
        //         session_start();
        //         $_SESSION["user"] = "yes";
        //         header("Location: index.php");
        //         die();
        //         // } else {
        //         //     echo "<div class='alert alert-danger'>Password does not match</div>";
        //         // }
        //     } else {
        //         echo "<div class='alert alert-danger'>Email or password does not match</div>";
        //     }
        // }

        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "../database.php";
        
            // Sử dụng prepared statement để ngăn chặn SQL Injection
            $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
            $stmt = mysqli_prepare($conn, $sql);
            
            // Bind các giá trị và thực thi truy vấn
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);
            mysqli_stmt_execute($stmt);
            
            // Lấy kết quả
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
            if (mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION["user"] = "yes";
                header("Location: index.php");
                die();
            } else {
                echo "<div class='alert alert-danger'>Email or password does not match</div>";
            }
        }
        
        ?>
        <h1>Login To SQLi</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div>
            <p style="float: right;"><a href="../index.php">Back Homepage</a></p>
        </div>
    </div>
</body>

</html>
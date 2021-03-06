<?php 
require_once '../admin/dbcon.php';
session_start();
if(isset($_SESSION['user_login'])){
    header('location: index.php');
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $name_check = mysqli_query($con,"SELECT * FROM `users` WHERE `username` = '$username';");
    $pass_check = mysqli_query($con,"SELECT * FROM `users` WHERE `password` = '$password';");

    if(mysqli_num_rows($name_check)){
        $row = mysqli_fetch_all($name_check);
        if(mysqli_num_rows($pass_check)){
            $_SESSION['user_login'] = $username;
            header('location: index.php');
        }else{
            $pass_error = "Please enter a valid password";
        }
    }else{
        $name_error = "Please enter a valid username";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Student Management System</h1><hr>
        <div class="row mt-5">
            <div class="col-sm-4 col-sm-offset-4">
            <h2 class="text-center mt-2">Admin Login Form</h2>

            <p style="color:red;"><?php if(isset($pass_error)){ echo $pass_error; }?></p>

                <form action="login.php" method="post">
                    <div>
                        <input type="text" class="form-control" name="username" placeholder="Username"
                        value="<?php if(isset($username)){ echo $username; }?>" required>
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-info mt-2 float-right" name="login" value="Login">
                        <a href="index.php">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
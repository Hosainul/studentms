<?php

require_once '../admin/dbcon.php';

if(isset($_POST['registration'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    $photo = explode(".",$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.'.'.$photo;

    $email_check = mysqli_query($con, "SELECT * FROM `users` WHERE `email` = '$email';");
    $username_check = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username';");

    if($password == $c_password){
        if(mysqli_num_rows($email_check) == 0){
            if(mysqli_num_rows($username_check) == 0){
                $result = mysqli_query($con, "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`,`status`) VALUES ('$name','$email','$username','$password ','$photo_name','inactive')");
                if($result){
                    $success = "Registration Successfull";
                    move_uploaded_file($_FILES['photo']['tmp_name'],'../images/'.$photo_name);
                }else{
                    $error = "Registration Failed";
                }
                
            }else{
                $error_username = "This username has already taken!";
            }
        }else{
            $error_email = "This email has already taken!";
        }
    }else{
        $error_pass = "Password Missmatch!";
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
    <h1 class="text-center mt-5 mb-5">User Registration</h1><hr>

    <?php if(isset($success)){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> <?= $success ?> 
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group row">
                    <label class="control-label" for="name">Name</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="name" id="name" placeholder="Enter Your Name"
                        value="<?php if(isset($name)){ echo $name;}?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label" for="email">Email</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Enter Your Email"
                        value="<?php if(isset($email)){ echo $email;}?>" required>
                    </div>
                    <label style="color: red" for=""><?php if(isset($error_email)) echo $error_email; ?></label>
                </div>
                <div class="form-group row">
                    <label class="control-label" for="username">Username</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="username" id="username" placeholder="Enter Your Username"
                        value="<?php if(isset($username)){ echo $username;}?>" required>
                    </div>
                    <label style="color: red" for=""><?php if(isset($error_username)) echo $error_username; ?></label>
                </div>
                <div class="form-group row">
                    <label class="control-label" for="password">Password</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label" for="c_password">Confirm Password</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="password" name="c_password" id="c_password" placeholder="Confirm Password" required>
                    </div>
                    <label style="color: red" for=""><?php if(isset($error_pass)) echo $error_pass; ?></label>
                </div>
                <div class="form-group row">
                    <label class="control-label" for="photo">Photo</label>
                    <div class="col-sm-4">
                        <input type="file" name="photo" id="photo">
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-1 mb-5">
                    <input type="submit" class="btn btn-primary" name="registration" value="Registration">
                </div>
            </form>
        </div>
    </div>
    <p>Already have account? <a href="login.php">Login</a></p>

    <footer>
        <p>Hosainul Arefin Shetu: Web Developer-@<?= date('Y') ?>@</p>
    </footer>
    </div>
</body>
</html>
<?php
require_once '../admin/dbcon.php';
require_once 'sidebar.php'; ?>

<h1 class="text-primary"> <i class="fa fa-user"></i> User Profile <small>My Profile</small></h1>
<ol class="breadcrumb">
<li><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user"></i> User Profile</li>
</ol>

<?php
$session_user = $_SESSION['user_login'];
$user_data = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$session_user'");
while($row = mysqli_fetch_assoc($user_data)){ ?>

<div class="row">
    <div class="col-sm-6">
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <td>User Id</td>
                <td><?= $row['id']; ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= $row['name']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $row['email']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?= $row['status']; ?></td>
            </tr>
            <tr>
                <td>Signup Date</td>
                <td><?= $row['datetime']; ?></td>
            </tr>
        </table>
        <a href="" class="btn btn-info btn-sm float-right">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href=""><img style="width: 190px; height: 220px;" src="../images/<?= $row['photo'] ?>" alt=""></a>
        
<?php
if(isset($_POST['upload'])){
    $photo = explode(".",$_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $session_user.'.'.$photo;

   $upload = mysqli_query($con, "UPDATE `users` SET `photo`='$photo_name' WHERE `username` = '$session_user'");
   if($upload){
        move_uploaded_file($_FILES['photo']['tmp_name'],'../images/'.$photo_name);
   }
}
?>

        <form action="" method="POST" enctype="multipart/form-data" class="mt-5">
            <label for="photo">Profile Photo</label>
            <input type="file" id="photo" required>
            <input type="submit" class="btn btn-info btn-sm" name="upload" value="Upload">
        </form>
    </div>
    
</div>

<?php } ?>





<?php require_once 'footer.php'; ?>
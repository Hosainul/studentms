<?php
require_once '../admin/dbcon.php';
require_once 'sidebar.php';?>

<h1 class="text-primary"> <i class="fa fa-user-plus"></i> Add Student <small>Add New Student</small></h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> Add Student</li>
</ol>

<?php
if(isset($_POST['add_student'])){

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];

    $photo = explode('.',$_FILES['photo']['name']);
    $photo_ext = end($photo);
    $photo = $name.'.'.$photo_ext;

    $result = mysqli_query($con, "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `contact`, `photo`) VALUES ('$name','$roll','$class','$city','$contact','$photo')");

    if($result){
        move_uploaded_file($_FILES['photo'] ['tmp_name'],'../images/'.$photo);
        $success = "Student Added Successfully";
    }else{
        $error = "Something Wrong! Please check and try again!";
    }

}
?>

<?php if(isset($success)){ ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> <?= $success ?> 
        </div>
<?php } ?>
<?php if(isset($error)){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> <?= $error ?> 
        </div>
<?php } ?>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" name="roll" id="roll" class="form-control" placeholder="Roll" required>
        </div>
        <div class="form-group">
            <label for="class">Class</label>
            <select name="class" id="class" class="form-control" required>
                <option value="">Select</option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
                <option value="5th">5th</option>
                <option value="6th">6th</option>
                <option value="7th">7th</option>
            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" placeholder="City" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact" required>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" required>
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add Student" name="add_student">
        </div>
        </form>
    </div>
</div>


<?php require_once 'footer.php'; ?>
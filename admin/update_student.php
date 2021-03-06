<?php
require_once '../admin/dbcon.php';
require_once 'sidebar.php';
?>

<h1 class="text-primary"> <i class="fa fa-pencil"></i> Update Student</h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard </a></li>
<li><a href="all_student.php"><i class="fa fa-users"></i> All Students</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> Add Student</li>
</ol>

<?php 
$id = $_GET['id'];

$data = mysqli_query($con, "SELECT * FROM `student_info` WHERE `id` = '$id' ");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update_student'])){

    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $class = $_POST['class'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];

    $result = mysqli_query($con, "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`contact`='$contact' WHERE `id` = '$id'");

    if($result){
        header('location: all_student.php');
    }

}

?>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" name="roll" id="roll" class="form-control" value="<?= $row['roll']; ?>" required>
        </div>
        <div class="form-group">
            <label for="class">Class</label>
            <select name="class" id="class" class="form-control" required>
                <option value="">Select</option>
                <option <?= $row['class']=='1st' ? 'selected=""':'';?> value="1st" >1st</option>
                <option <?= $row['class']=='2nd' ? 'selected=""':'';?> value="2nd">2nd</option>
                <option <?= $row['class']=='3rd' ? 'selected=""':'';?> value="3rd">3rd</option>
                <option <?= $row['class']=='4th' ? 'selected=""':'';?> value="4th">4th</option>
                <option <?= $row['class']=='5th' ? 'selected=""':'';?> value="5th">5th</option>
                <option <?= $row['class']=='6th' ? 'selected=""':'';?> value="6th">6th</option>
                <option <?= $row['class']=='7th' ? 'selected=""':'';?> value="7th">7th</option>
            </select>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" value="<?= $row['city']; ?>" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control" value="<?= $row['contact']; ?>" required>
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Add Student" name="update_student">
        </div>
        </form>
    </div>
</div>


<?php require_once 'footer.php'; ?>
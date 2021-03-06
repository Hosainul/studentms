<?php
require_once '../admin/dbcon.php';
require_once 'sidebar.php'; ?>


<h1 class="text-primary"> <i class="fa fa-user-plus"></i> All Student <small>All Student</small></h1>
<ol class="breadcrumb">
<li><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> All Student</li>
</ol>


<h1>New Students</h1>
<div class="table-responsive">
<table id="data" class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>Roll</th>
            <th>Class</th>
            <th>City</th>
            <th>Contact</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $result = mysqli_query($con, "SELECT * FROM `student_info`");
        while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= ucwords($row['name']) ?></td>
                <td><?= $row['roll'] ?></td>
                <td><?= $row['class'] ?></td>
                <td><?= ucwords($row['city']) ?></td>
                <td><?= $row['contact'] ?></td>
                <td><img style="width: 140px; height:100px" src="../images/<?= $row['photo'] ?>" alt=""></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="update_student.php?id=<?= $row['id'] ?>"><i class="fa fa-pencil"> Edit</i></a>
                    <a class="btn btn-danger btn-sm" href="delete_student.php?id=<?= $row['id'] ?>"><i class="fa fa-trash"> Delete</i></a>
                </td>
            </tr>
        <?php } ?>
        
    </tbody>
</table>
</div>

<?php require_once 'footer.php'; ?>
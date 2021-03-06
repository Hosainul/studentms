<?php
require_once '../admin/dbcon.php';
require_once 'sidebar.php'; ?>


<h1 class="text-primary"> <i class="fa fa-user-plus"></i> All Users <small>All Users</small></h1>
<ol class="breadcrumb">
<li><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-user-plus"></i> All Student</li>
</ol>


<h1>All Users</h1>
<div class="table-responsive">
<table id="data" class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Photo</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $result = mysqli_query($con, "SELECT * FROM `users`");
        while($row = mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><img style="width: 140px; height:130px" src="../images/<?= $row['photo'] ?>" alt=""></td>
                <td><?= $row['status'] ?></td>
            </tr>
        <?php } ?>
        
    </tbody>
</table>
</div>

<?php require_once 'footer.php'; ?>
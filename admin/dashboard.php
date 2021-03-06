<?php require_once '../admin/dbcon.php'; ?>

<h1 class="text-primary"> <i class="fa fa-dashboard"></i> Dashboard <small>Statistics Overview</small></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-dashboard"></i> Dashboard</li>
</ol>

<?php
$count_student = mysqli_query($con, "SELECT * FROM `student_info`");
$total_student = mysqli_num_rows($count_student);
?>

<div class="row">
    <div class="col-sm-4">
        <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="com-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="com-xs-9">
                        <div class="float-right" style="font-size: 45px;"><?= $total_student; ?></div>
                        
                        <div class="float-right" >All Students</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <a href="all_student.php">
                <div class="card-footer">
                    <span class="float-left">All Students</span>
                    <span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                </div>
                </a>
        </div>
    </div>

<?php
$count_user = mysqli_query($con, "SELECT * FROM `users`");
$total_user = mysqli_num_rows($count_user);
?>

    <div class="col-sm-4">
        <div class="card">
                <div class="card-header bg-primary text-white">
                    <div class="com-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="com-xs-9">
                        <div class="float-right" style="font-size: 45px;"><?= $total_user; ?></div>
                        
                        <div class="float-right" >All Users</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <a href="all_user.php">
                <div class="card-footer">
                    <span class="float-left">All Users</span>
                    <span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                </div>
                </a>
        </div>
    </div>
</div>

<hr>

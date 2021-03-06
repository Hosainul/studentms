<?php
session_start();
if(!isset($_SESSION['user_login'])){
    header('location: login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <title>Student Management System</title>

    <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">SMS</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="logout.php"> <i class="fa fa-user"></i> Welcome
        <?php $_SESSION['user_login']?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.php"> <i class="fa fa-user-plus"></i> Add User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_profile.php"> <i class="fa fa-user"></i> Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"> <i class="fa fa-power-off"></i> Logout</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
        <div class="list-group">
        <a href="index.php" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"></i> Dashboard</a>
        <a href="add_student.php" class="list-group-item list-group-item-action"><i class="fa fa-user-plus"></i> Add Student</a>
        <a href="all_student.php" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> All Student</a>
        <a href="all_user.php" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users</a>
        </div>
        </div>  
        <div class="col-sm-9">
            <div class="content">
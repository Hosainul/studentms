<?php
require_once '../admin/dbcon.php';

$id = $_GET['id'];

$query = mysqli_query($con, "DELETE FROM `student_info` WHERE `id` = '$id'");

header('location: all_student.php');

?>
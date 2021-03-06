<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container">
    <a class="btn btn-primary float-right mt-3" href="admin/login.php">Login</a>
        <h1 class="text-center mt-3">Welcome to Student Management System</h1>
        
    <div class="row mt-5">
        <div class="col-sm-4 col-sm-offset-4">
        <table method="post" action="" class="table table-bordered">
        <form action="" method="POST">
        <tr>
                <td colspan="2" class="text-center"><label for="">Student Information</label></td>
            </tr>
            <tr>
                <td><label for="choose">Choose Class</label></td>
                <td>
                    <select class="form-control" id="choose" name="choose">
                        <option value="">Select</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">2nd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                        <option value="7th">7th</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="roll">Roll</label></td>
                <td><input class="form-control" type="text" name="roll" placeholder="Roll"></td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">
                    <input class="btn btn-default" type="submit" name="show_info" value="Show Info" id="">
                </td>
            </tr>
        </form>

        </table>
        </div>
    </div>
    
<?php 
require_once './admin/dbcon.php';
    if(isset($_POST['show_info'])){
        
        $choose = $_POST['choose'];
        $roll = $_POST['roll'];

        $result = mysqli_query($con, "SELECT * FROM `student_info` WHERE `class` = '$choose' AND `roll` = '$roll'");
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
        ?>
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <table class="table table-hover table-bordered table-striped">
                <tr>
                    <td rowspan="4">
                    <img src="images/<?= $row['photo']; ?>" class="img-thumbnail" style="width: 200px; height: 170px;" alt="">
                    </td>
                    <td>Name</td>
                    <td><?= $row['name']; ?></td>
                </tr>
                <tr>
                    <td>Roll</td>
                    <td><?= $row['roll']; ?></td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td><?= $row['class']; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?= $row['city']; ?></td>
                </tr>
            </table>
        </div>
    </div>
        <?php
        }else{
            echo "Data Not Found";
        }
        ?>

<?php } ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
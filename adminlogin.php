<?php
$con = mysqli_connect('localhost', 'root', '', 'ahmadbakkar db');

if(isset($_POST['login']))
{
    $a_name = mysqli_real_escape_string($con, $_POST['name']);
    $a_password = mysqli_real_escape_string($con, $_POST['password']);

    if($a_name != "" && $a_password != "")
    {
        $sql = "SELECT id FROM admininfo WHERE AdminName = '$a_name' and AdminPass = '$a_password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $count = mysqli_num_rows($result);
        if($count == 1){
            header("location: CRUD-DB.php");
        }
        else
        {
            echo "<script>alert('Invalid Name or Password!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>AdminLoginPage</title>
</head>
<body>
    <div class="container">
    <div class="row justify-content-center">
        <form action="adminlogin.php" method="post">
            <div class="form-group">
                <label>Admin Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'ahmadbakkar db');

$id = 0;
$p_id = '';
$p_image = '';
$p_name = '';
$p_description = '';
$p_price = '';
$update = FALSE;

if (isset($_POST['save']))
{
    $p_id = $_POST['id'];
    $p_image = $_POST['image'];
    $p_name = $_POST['name'];
    $p_description = $_POST['desc'];
    $p_price =  $_POST['price'];

    $con->query("INSERT INTO allproducts(id, ImageScr, Name, Description, Price) VALUES('$p_id', '$p_image', '$p_name', '$p_description', '$p_price')");

    $_SESSION['message'] = "Product Has Been Saved!";
    $_SESSION['msg_type'] = "success";

    header("location: CRUD-DB.php");
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $con->query("DELETE FROM allproducts WHERE id=$id");

    $_SESSION['message'] = "Product Has Been Deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: CRUD-DB.php");
}

if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $update = TRUE;

    $result = $con->query("SELECT * FROM allproducts WHERE id=$id");
    $row = $result->fetch_array();

    $p_id = $row['id'];
    $p_image = $row['ImageScr'];
    $p_name = $row['Name'];
    $p_description = $row['Description'];
    $p_price = $row['Price'];
}

if(isset($_POST['update']))
{
    $id = $_POST['hidden_id'];

    $p_id = $_POST['id'];
    $p_image = $_POST['image'];
    $p_name = $_POST['name'];
    $p_description = $_POST['desc'];
    $p_price =  $_POST['price'];

    $con->query("UPDATE allproducts SET id='$p_id', ImageScr='$p_image', Name='$p_name', Description='$p_description', Price='$p_price' WHERE id=$id");

    $_SESSION['message'] = "Product Has Been Updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: CRUD-DB.php');
}
?>

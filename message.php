<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    if (!empty($firstname) || !empty($lastname) || !empty($phone) || !empty($email) || !empty($comment))
    {
        $con = mysqli_connect('localhost', 'root', '', 'ahmadbakkar db');

        $SELECT = "SELECT * FROM 'contactmessage'";
        $INSERT = "INSERT Into contactmessage(firstname, lastname, phone, email, comment) VALUES ('$firstname', '$lastname', '$phone', '$email', '$comment')";

        $stmt = $con->prepare($INSERT);
        $stmt->execute();

        $alert = "<script>alert('Message Sent Successfully!');</script>";
        echo $alert;

        $stmt->close();
        $con->close();
    }
?>

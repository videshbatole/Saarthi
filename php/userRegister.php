<?php
include "connection.php";
error_reporting(0);

$sql = "INSERT INTO `user`( `firstName`, `lastName`, `mobileNo`, `emailId`, `gender`, `pincode`, `address`, `country`, `city`, `state`, `password`, `dob`) VALUES ('" . $_POST['firstName'] . "','" . $_POST['lastName'] . "','" . $_POST['mobile'] . "','" . $_POST['email'] . "','" . $_POST['gender'] . "','" . $_POST['pincode'] . "','" . $_POST['address'] . "','" . $_POST['country'] . "','" . $_POST['city'] . "','" . $_POST['state'] . "','" . $_POST['password'] . "','" . $_POST['dateOfBirth'] . "')";



function  runQuery($sql ,$conn){
    if ($conn->query($sql) === TRUE) {
        echo "Registered";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

runQuery($sql, $conn);

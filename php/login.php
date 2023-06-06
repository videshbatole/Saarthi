<?php
error_reporting(0);
session_start();
include "connection.php";


// Individual  user
if (isset($_POST['userEmail']) && isset($_POST['userPassword'])) {

    $sql = "SELECT * FROM `user` WHERE email='" . $_POST['userEmail'] . "' and password ='" . $_POST['userPassword'] . "'";

    $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) === 1) {
       echo"user";
            $row = mysqli_fetch_assoc($result);
        $_SESSION['user_name'] = $row['user_name'];
  }else{
    echo"invalid";
  }

}

//ngo user

if (isset($_POST['ngoEmail']) && isset($_POST['ngoPassword'])) {

    $sql = "SELECT * FROM `ngo` WHERE ngo_email ='" . $_POST['ngoEmail'] . "' and password ='" . $_POST['ngoPassword'] . "' ";

    
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['ngo_id'];
    echo "ngo";
    } else {
        echo "invalid";
    }

}

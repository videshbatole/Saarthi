<?php
include "connection.php";
// session_start();

// if($_SESSION['USER_ID'] != null){
//     echo $_SESSION['USER_ID'];

// }

// if ($_SESSION['NGO_ID'] != null) {
//     echo $_SESSION['NGO_ID'];
// }
// $sql = "SELECT * FROM `ngo` WHERE ngo_email ='saarthi@gmail.om' and password ='saarthi@123' ";

// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) === 1) {
//     $row = mysqli_fetch_assoc($result);
//     $_SESSION['id'] = $row['ngo_email'];
//     echo "ngo";
//     echo $_SESSION['id'];
// } else {
//     echo "invalid";
// }


if ($_REQUEST['operation'] === "accept") {

    $id =   $_REQUEST['id'];
    $query = mysqli_query($conn, "UPDATE `requests` SET `status`='Accepted' WHERE request_id ='$id'");
    if ($query) {
        echo "Success";
    } else {
        echo "Faild";
    }
}

if ($_REQUEST['operation'] === "reject") {

    $id =   $_REQUEST['id'];
    $query = mysqli_query($conn, "UPDATE `requests` SET `status`='Rejected' WHERE request_id ='$id'");
    if ($query) {
        echo "Success";
    } else {
        echo "Faild";
    }
}

<?php
error_reporting(0);
include "connection.php";
$id = $_REQUEST['id'];
// echo $_REQUEST['operation'];

if(isset($_REQUEST['operation']) && $_REQUEST['operation'] === "delete" ){

    $query = mysqli_query($conn, "DELETE FROM `campain` WHERE campain_id ='$id'");

    if ($query) {
        $data['status'] = "success";
        $data['massage'] = "Campain Stoped";
    } else {
        $data['status'] = "faild";
        $data['massage'] = "Someting went Wrong";
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);

}

if (isset($_REQUEST['operation']) && $_REQUEST['operation'] === "stop") {

    $query = mysqli_query($conn,"UPDATE `campain` SET `campain_status`='stoped' WHERE campain_id='$id'");

    if ($query) {
        $data['status'] = "success";
        $data['massage'] ="Campain Stoped";
    } else {
        $data['status'] = "faild";
        $data['massage'] = "Someting went Wrong";
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);

    
}

if (isset($_REQUEST['operation']) && $_REQUEST['operation'] === "start") {
    $query = mysqli_query($conn, "UPDATE `campain` SET `campain_status`='active' WHERE campain_id='$id'");


    if ($query) {
        $data['status'] = "success";
        $data['massage'] = "Campain Started";
    } else {
        $data['status'] = "faild";
        $data['massage'] = "Someting went Wrong";
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}




?>
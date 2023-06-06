<?php
error_reporting(0);
session_start();
include "allFunction.php";
include "connection.php";
$id;
if($_SESSION['NGO_ID'] != null){
    $id = $_SESSION['NGO_ID'];
}

$account_id = 123456;
$sql;

//To edit  ngo  Basic details  
if (isset($_POST['form'])) {

    if ($_FILES['profileImage']['name'] !=  NULL) {

        $result =  uploadImage("profileImage", "../img/profile/");

        if ($result === "InvalidFormate") {
            // echo "InvalidFormate";
            $data = ['status' => 'error', 'massage' => "Invalid Image Format "];
        } else if ($result === "error") {
            $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
            // echo "error";
        } else {
            $sql = "UPDATE `ngo` SET `ngo_name`='" . $_POST['ngo_name'] . "',`ngo_registration_no`='" . strtoupper($_POST['ngo_registration_no']) . "',`ngo_pan_no`='" . strtoupper($_POST['ngo_pan_no']) . "',`establish_date`='" . $_POST['establish_date'] . "',`ngo_contact_no`='" . $_POST['ngo_contact_no'] . "',`ngo_email`='" . $_POST['ngo_email'] . "',`working_sector`='" . $_POST['working_sector'] . "',`profile_image`='$result' WHERE ngo_id = '$id'";
        }
    } else {
        $sql = "UPDATE `ngo` SET `ngo_name`='" . $_POST['ngo_name'] . "',`ngo_registration_no`='" . strtoupper($_POST['ngo_registration_no']) . "',`ngo_pan_no`='" . strtoupper($_POST['ngo_pan_no']) . "',`establish_date`='" . $_POST['establish_date'] . "',`ngo_contact_no`='" . $_POST['ngo_contact_no'] . "',`ngo_email`='" . $_POST['ngo_email'] . "',`working_sector`='" . $_POST['working_sector'] . "' WHERE ngo_id = '$id'";
    }

    $status = runQuerys($conn, $sql);
    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Updated Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}


if (isset($_POST['setlor_details'])) {

    $sql = "UPDATE `ngo` SET `setlor_first_name`='" . $_POST['setlor_first_name'] . "',`setlor_last_name`='" . $_POST['setlor_last_name'] . "',`setlor_gender`='" . $_POST['setlor_gender'] . "',`setlor_mobile_no`='" . $_POST['setlor_mobile_no'] . "',`setlor_email`='" . $_POST['setlor_email'] . "' WHERE ngo_id = '$id' ";

    $status = runQuerys($conn, $sql);
    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Updated Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Faild To Upate"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (isset($_POST['change_password'])) {

    $data = fetchData("ngo", $conn, $id, "ngo_id",);
    $password = $data['password'];

    if ($data['password'] === $_POST['old_password']) {

        $sql = "UPDATE `ngo` SET `password`='" . $_POST['new_password'] . "' WHERE ngo_id = '$id'";
        $status = runQuerys($conn, $sql);

        if ($status === true) {
            $data = ['status' => 'success', 'massage' => "Password Changed Successfully "];
        } else {
            $data = ['status' => 'error', 'massage' => "Something Went wrong"];
        }
    } else {

        $data = ['status' => 'error', 'massage' => "Wrong Old Password"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if ($_GET['operation'] === "delete") {

    $sql = "DELETE FROM `events` WHERE event_id ='" . $_GET['id'] . "'";
    $status = runQuerys($conn, $sql);

    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Deleted Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if ($_GET['operation'] === "stop") {

    $sql = " UPDATE `events` SET `event_status`='stoped' WHERE event_id ='" . $_GET['id'] . "'";

    $status = runQuerys($conn, $sql);


    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Stoped Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if ($_GET['operation'] === "start") {

    $sql = " UPDATE `events` SET `event_status`='active' WHERE event_id ='" . $_GET['id'] . "'";

    $status = runQuerys($conn, $sql);


    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Started Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}


if (isset($_POST['register_event'])) {

    if ($_FILES['profileImage']['name'] !=  NULL) {

        $result =  uploadImage("profileImage", "../img/events/");

        if ($result === "InvalidFormate") {
            // echo "InvalidFormate";
            $data = ['status' => 'error', 'massage' => "Invalid Image Format "];
        } else if ($result === "error") {
            $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
            // echo "error";
        } else {
            $event_id = rand(11111, 99999);

            $sql = "INSERT INTO `events`(`event_id`, `event_title`, `event_start_date`, `event_end_date`, `event_time`, `event_image`, `event_description`, `event_status`, `ngo_id`) VALUES ('$event_id' ,'" . $_POST['event_title'] . "' ,'" . $_POST['starting_date'] . "' ,'" . $_POST['ending_date'] . "','" . $_POST['event_time'] . "','$result','" . $_POST['description'] . "','active','$id')";
        }
    }

    $status = runQuerys($conn, $sql);
    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Updated Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}


if (isset($_POST['campain_title'])) {

    if ($_FILES['profileImage']['name'] !=  NULL) {

        $result =  uploadImage("profileImage", "../img/campain/");

        if ($result === "InvalidFormate") {
            // echo "InvalidFormate";
            $data = ['status' => 'error', 'massage' => "Invalid Image Format "];
        } else if ($result === "error") {
            $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
            // echo "error";
        } else {
            $campain_id = rand(11111, 99999);

            $sql = "INSERT INTO `campain`(`campain_id`, `campain_title`, `campain_description`, `campain_amount`, `camapin_start_date`, `campain_end_date`, `campain_beneficiary_name`, `ngo_id`, `account_id`, `campain_image`) VALUES ('$campain_id','" . $_POST['campain_title'] . "' ,'" . $_POST['campain_description'] . "' ,'" . $_POST['campain_amount'] . "' ,'" . $_POST['camapin_start_date'] . "' ,'" . $_POST['campain_end_date'] . "' ,'" . $_POST['campain_beneficiary_name'] . "','$id' ,'$account_id','$result')";
        }
    }

    $status = runQuerys($conn, $sql);
    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Updated Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}


if (isset($_POST['email']) && isset($_POST['mobile'])) {

    $data = ['mobile' => 'NA', 'email' => 'NA'];

    $email = $_POST['email'];
    $mobile =  $_POST['mobile'];

    $mobileQuery = "SELECT COUNT(mobileNo) AS no_count FROM `user` WHERE mobileNo ='$mobile'";
    $emailQuery   = "SELECT COUNT(email) AS email_count FROM `user` WHERE email ='$email'";


    if ($mobileResult = mysqli_query($conn, $mobileQuery)) {
        $mobileCount = mysqli_fetch_assoc($mobileResult);
        if ($mobileCount['no_count'] > 0) {

            $data['mobile'] = "used";
        } else {
            $data['mobile'] = "unused";
        }
    }


    if ($emailResult = mysqli_query($conn, $emailQuery)) {

        $emailCount = mysqli_fetch_assoc($emailResult);
        if ($emailCount['email_count'] > 0) {

            $data['email'] = "used";
        } else {

            $data['email'] = "unused";
        }
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}


if (isset($_POST['ngoemail']) && isset($_POST['ngomobile'])) {



    $data = ['mobile' => 'NA', 'email' => 'NA'];

    $email = $_POST['ngoemail'];
    $mobile =  $_POST['ngomobile'];

    $mobileQuery = "SELECT COUNT(ngo_contact_no) AS no_count FROM `ngo` WHERE ngo_contact_no ='$mobile'";
    $emailQuery   = "SELECT COUNT(ngo_email) AS email_count FROM `ngo` WHERE ngo_email ='$email'";


    if ($mobileResult = mysqli_query($conn, $mobileQuery)) {
        $mobileCount = mysqli_fetch_assoc($mobileResult);
        if ($mobileCount['no_count'] > 0) {

            $data['mobile'] = "used";
        } else {
            $data['mobile'] = "unused";
        }
    }

    if ($emailResult = mysqli_query($conn, $emailQuery)) {

        $emailCount = mysqli_fetch_assoc($emailResult);
        if ($emailCount['email_count'] > 0) {

            $data['email'] = "used";
        } else {

            $data['email'] = "unused";
        }
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}


if (isset($_POST['setloremail']) && isset($_POST['setlorngomobile'])) {



    $data = ['mobile' => 'NA', 'email' => 'NA'];

    $email = $_POST['setloremail'];
    $mobile =  $_POST['setlorngomobile'];

    $mobileQuery = "SELECT COUNT(setlor_mobile_no) AS no_count FROM `ngo` WHERE setlor_mobile_no ='$mobile'";
    $emailQuery   = "SELECT COUNT(setlor_email) AS email_count FROM `ngo` WHERE setlor_email ='$email'";


    if ($mobileResult = mysqli_query($conn, $mobileQuery)) {
        $mobileCount = mysqli_fetch_assoc($mobileResult);
        if ($mobileCount['no_count'] > 0) {

            $data['mobile'] = "used";
        } else {
            $data['mobile'] = "unused";
        }
    }

    if ($emailResult = mysqli_query($conn, $emailQuery)) {

        $emailCount = mysqli_fetch_assoc($emailResult);
        if ($emailCount['email_count'] > 0) {

            $data['email'] = "used";
        } else {

            $data['email'] = "unused";
        }
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (isset($_POST['ngo_login'])) {
    $data;
    $email = $_POST['ngoEmail'];
    $password = $_POST['ngoPassword'];

    $sql = "SELECT count(*)  as user , ngo_id FROM `ngo` WHERE ngo_email='$email' AND password ='$password'";

    $run = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($run);

    if ($result['user'] > 0) {
        session_start();
        $_SESSION['NGO_ID'] = $result['ngo_id'];
        $data['user'] = "VALID";
    } else {
        $data['user'] = "INVALID";
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (isset($_POST['user_login'])) {
    $data;
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];

    $sql = "SELECT COUNT(*) as user , userId FROM `user` WHERE email ='$email' AND  password ='$password'";
    $run = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($run);



    if ($result['user'] > 0) {
        session_start();
        $_SESSION['USER_ID'] = $result['userId'];
        $data['user'] = "VALID";
    } else {
        $data['user'] = "INVALID";
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (isset($_POST['loadRequest'])) {
    $id = $_POST['userId'];
    $sql = "SELECT  ngo.profile_image, requests.request_id , requests.beneficiary_first_name , requests.beneficiary_last_name ,requests.beneficiary_email , requests.beneficiary_mobile ,requests.Issue,requests.status  ,requests.beneficiary_image ,requests.date ,ngo.ngo_name , ngo.ngo_contact_no,ngo.ngo_email ,ngo.ngo_country ,ngo.ngo_state ,ngo.ngo_city,requests.beneficiary_country,requests.beneficiary_city,requests.beneficiary_state  from user , requests,ngo where user.userId=requests.userId AND ngo.ngo_id=requests.ngo_id AND requests.userId='$id'";

    $run = mysqli_query($conn, $sql);
    $re;

    $i = 0;
    while ($row = mysqli_fetch_array($run)) {
        $re[$i]['request_id'] = $row['request_id'];
        $re[$i]['profile_image'] = $row['profile_image'];
        $re[$i]['beneficiary_first_name'] = $row['beneficiary_first_name'];
        $re[$i]['beneficiary_last_name'] = $row['beneficiary_last_name'];
        $re[$i]['beneficiary_email'] = $row['beneficiary_email'];
        $re[$i]['beneficiary_mobile'] = $row['beneficiary_mobile'];
        $re[$i]['Issue'] = $row['Issue'];
        $re[$i]['status'] = $row['status'];
        $re[$i]['beneficiary_image'] = $row['beneficiary_image'];
        $re[$i]['date'] = $row['date'];
        $re[$i]['ngo_contact_no'] = $row['ngo_contact_no'];
        $re[$i]['ngo_email'] = $row['ngo_email'];
        $re[$i]['ngo_country'] = $row['ngo_country'];
        $re[$i]['ngo_state'] = $row['ngo_state'];
        $re[$i]['ngo_city'] = $row['ngo_city'];
        $re[$i]['beneficiary_country'] = $row['beneficiary_country'];
        $re[$i]['beneficiary_city'] = $row['beneficiary_city'];
        $re[$i]['beneficiary_state'] = $row['beneficiary_state'];
        $re[$i]['ngo_name'] = $row['ngo_name'];
        $i++;
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($re);
}

if (isset($_POST['deleteRequest'])) {
    $data;
    $id = $_POST['id'];
    $sql = "DELETE FROM `requests` WHERE request_id='$id'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        $data['status'] = "success";
    } else {
        $data['status'] = "faild";
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (isset($_POST['getNGO'])) {
    $sector = $_POST['sector'];
    $sql = "SELECT  COUNT(ngo_id) as count , ngo_id , ngo_name FROM `ngo` WHERE working_sector ='$sector'";
    $run = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($run);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (isset($_POST['createRequest'])) {
    $data;
    if ($_FILES['userImage']['name'] !=  NULL) {
        $result =  uploadImage("userImage", "../img/requests/");
        if ($result === "InvalidFormate") {
            // echo "InvalidFormate";
            $data = ['status' => 'error', 'massage' => "Invalid Image Format "];
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
        } else if ($result === "error") {
            $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
            // echo "error";
        } else {

            $user_id = $_SESSION['USER_ID'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $mobile_No = $_POST['mobile_no'];
            $country = $_POST['country'];
            $state = $_POST['state'];
            $city = $_POST['city'];
            $sector = $_POST['sector'];
            $ngo_id = $_POST['ngo'];
            $issue = $_POST['issue'];
            $date = date("Y/m/d");
            // $image =$_FILES['userImage'];
            $sql = "INSERT INTO `requests`(`beneficiary_first_name`, `beneficiary_last_name`, `beneficiary_email`, `beneficiary_mobile`, `Issue`, `status`, `beneficiary_image`, `ngo_id`, `userId`, `date`, `beneficiary_country`, `beneficiary_city`, `beneficiary_state`) VALUES ('$first_name','$last_name','$email','$mobile_No','$issue','Created','$result','$ngo_id','$user_id','$date','$country','$city','$state')";

            $run = mysqli_query($conn, $sql);
            if ($run) {
                $data = ['status' => 'success', 'massage' => "Request Created"];
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($data);
            } else {
                $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode($data);
            }
        }
    }
}

if (isset($_POST['edit_user_profile'])) {
    $sql;
    $id = $_SESSION['USER_ID'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_email = $_POST['user_email'];
    $user_mobile = $_POST['user_mobile'];
    $user_dob = $_POST['user_dob'];
    $gender = $_POST['gender'];
    $user_address = $_POST['user_address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    if ($_FILES['imageUpload']['name'] != null) {

        $result =  uploadImage("imageUpload", "../img/profile/");
        if ($result === "InvalidFormate") {
            // echo "InvalidFormate";
            $data = ['status' => 'error', 'massage' => "Invalid Image Format "];
        } else if ($result === "error") {
            $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
            // echo "error";
        } else {
            $sql = "UPDATE `user` SET `firstName`='$first_name',`lastName`='$last_name',`mobileNo`='$user_mobile',`email`='$user_email',`gender`='$gender',`address`='$user_address',`country`='$country',`city`='$city',`state`='$state',`dob`='$user_dob',`profile_image`='$result' WHERE userId ='$id '";
        }
    } else {
        $sql = "UPDATE `user` SET `firstName`='$first_name',`lastName`='$last_name',`mobileNo`='$user_mobile',`email`='$user_email',`gender`='$gender',`address`='$user_address',`country`='$country',`city`='$city',`state`='$state',`dob`='$user_dob' WHERE userId ='$id '";
    }

    $status = runQuerys($conn, $sql);
    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Updated Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (isset($_POST['loadRequest2'])) {
    $id = $_POST['userId'];
    $sql = "SELECT  *  from user , requests,ngo where user.userId=requests.userId AND ngo.ngo_id=requests.ngo_id AND requests.ngo_id='$id' AND status ='Created' ";

    $run = mysqli_query($conn, $sql);
    $re;

    $i = 0;
    while ($row = mysqli_fetch_array($run)) {
        $re[$i]['request_id'] = $row['request_id'];
        $re[$i]['profile_image'] = $row['profile_image'];
        $re[$i]['beneficiary_first_name'] = $row['beneficiary_first_name'];
        $re[$i]['beneficiary_last_name'] = $row['beneficiary_last_name'];
        $re[$i]['beneficiary_email'] = $row['beneficiary_email'];
        $re[$i]['beneficiary_mobile'] = $row['beneficiary_mobile'];
        $re[$i]['Issue'] = $row['Issue'];
        $re[$i]['status'] = $row['status'];
        $re[$i]['beneficiary_image'] = $row['beneficiary_image'];
        $re[$i]['date'] = $row['date'];
        $re[$i]['ngo_contact_no'] = $row['mobileNo'];
        $re[$i]['email'] = $row['email'];
        $re[$i]['ngo_country'] = $row['country'];
        $re[$i]['ngo_state'] = $row['state'];
        $re[$i]['ngo_city'] = $row['city'];
        $re[$i]['beneficiary_country'] = $row['beneficiary_country'];
        $re[$i]['beneficiary_city'] = $row['beneficiary_city'];
        $re[$i]['beneficiary_state'] = $row['beneficiary_state'];
        $re[$i]['firstName'] = $row['firstName'];
        $i++;
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($re);
}

if (isset($_REQUEST['Account_no'])) {
    echo "Working";
}

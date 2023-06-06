<?php
include "connection.php";
include "allFunction.php";
if (isset($_REQUEST['individualRegister'])) {
    $data;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobileNo = $_POST['mobile'];
    $dob = date('d-m-y', strtotime($_POST['dateOfBirth']));
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `user`( `firstName`, `lastName`, `mobileNo`, `email`, `gender`, `pincode`, `address`, `country`, `city`, `state`, `password`, `dob`, `profile_image`) VALUES ('$firstName','$lastName','$mobileNo','$email','$gender','$pincode','$address','$country','$city','$state','$password','$dob','detault.png')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $data = ['status' => 'success', 'massage' => "Successfuly Registered !!"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}



if (isset($_REQUEST['nog_register'])) {


    $data;
    $ngoName = $_POST['ngoName'];
    $registrationNo = strtoupper($_POST['ngoRegistrationNo']);
    $pan = strtoupper($_POST['ngoPanNo']);
    $establish_date = date('d-m-y', strtotime($_POST['establishDate']));
    $ngo_contact_no = $_POST['ngoContactNo'];
    $ngo_email = $_POST['ngoEmail'];
    $setlor_first_name = $_POST['setlorFirstName'];
    $setlor_last_name = $_POST['setlorLastName'];
    $setlor_gender = $_POST['setlorGender'];
    $setlor_mobile_no = $_POST['setlorMobile'];
    $setlor_email = $_POST['setlorEmail'];
    $ngo_address = $_POST['ngoAddress'];
    $ngo_country = $_POST['ngoCountry'];
    $ngo_state = $_POST['ngoState'];
    $ngo_city = $_POST['ngoCity'];
    $ngo_pincode = $_POST['ngoPincode'];
    $working_sector = $_POST['workingSector'];
    $password = $_POST['ngoPassword'];

    $sql = "INSERT INTO `ngo`( `ngo_name`, `ngo_registration_no`, `ngo_pan_no`, `establish_date`, `ngo_contact_no`, `ngo_email`, `setlor_first_name`, `setlor_last_name`, `setlor_gender`, `setlor_mobile_no`, `setlor_email`, `ngo_address`, `ngo_country`, `ngo_state`, `ngo_city`, `ngo_pincode`, `working_sector`, `password`, `profile_image`) VALUES ('$ngoName','$registrationNo','$pan',' $establish_date','$ngo_contact_no','$ngo_email','$setlor_first_name','$setlor_last_name','$setlor_gender','$setlor_mobile_no','$setlor_email','$ngo_address','$ngo_country','$ngo_state','$ngo_city','$ngo_pincode' ,'$working_sector','$password','detault.png')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $data = ['status' => 'success', 'massage' => "Successfuly Registered !!"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

if (isset($_POST['user_login'])) {

    echo "user Login";
}

if (isset($_POST['register_event'])) {
    session_start();
    $data;
    $id = $_SESSION['USER_ID'];
    $eventId = $_POST['event_id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO `event_registration`(`registration_name`, `registration_email`, `registration_mobile`, `event_id`, `userId`) VALUES ('$name','$email','$mobile','$eventId',' $id')";

    $status = runQuerys($conn, $sql);
    if ($status === true) {
        $data = ['status' => 'success', 'massage' => "Updated Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}


if (isset($_POST['donation'])) {
    session_start();
    $data;
    $id = $_SESSION['USER_ID'];
    $ngo_id =  $_POST['ngo_id'];
    $name =  $_POST['first_name'] . " " . $_POST['last_name'];
    $email =  $_POST['email'];
    $mobile_no =  $_POST['mobile_no'];
    $desc =  $_POST['desc'];
    $donate =  $_POST['donate'];
    $date = date("Y-m-d");
    $donation_id = rand(pow(10, 5 - 1), pow(10, 5) - 1);

    $query = mysqli_query($conn, "INSERT INTO `donation`(`donation_id`, `donor_name`, `donor_email`, `donor_mobile`, `date`, `ngo_id`, `donation_discription`, `status`, `donated`, `userId`) VALUES ('$donation_id',' $name','$email','$mobile_no','$date','$ngo_id','$desc','Send','$donate','$id')");

    if ($query) {
        $data = ['status' => 'success', 'massage' => "Updated Successfully"];
    } else {
        $data = ['status' => 'error', 'massage' => "Something Went Wrong"];
    }
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}

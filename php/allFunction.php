<?php
error_reporting(0);

//fetch data from database
function  fetchData($tableName, $conn, $id, $idName)
{
  $query = "SELECT * FROM `$tableName` WHERE $idName = '$id'";
  $record =  mysqli_query($conn, $query);

  if ($record) {
    $row = mysqli_fetch_assoc($record);
    return $row;
  } else {
    return "Something  Went Wrong";
  }
}


//fetch All from database
function  fetchAllData($tableName, $conn, $id, $idName)
{

  $query = "SELECT * FROM `$tableName` WHERE $idName = '$id'";
  $record =  mysqli_query($conn, $query);

  if ($record) {
    $data =  mysqli_fetch_all($record, MYSQLI_ASSOC);
    return $data;
  } else {
    return "Something  Went Wrong";
  }
}




// Upload image function
function uploadImage($input, $path)
{
  $extension = pathinfo($_FILES["$input"]["name"], PATHINFO_EXTENSION);

  if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
    $imgname = $_FILES["$input"]['name'];
    $extension = pathinfo($imgname, PATHINFO_EXTENSION);
    $randomno = uniqid();
    $rename = 'Profile' . date('Ymd') . $randomno;
    $newname = $rename . '.' . $extension;
    $filename = $_FILES["$input"]['tmp_name'];
    if (move_uploaded_file($filename, $path . $newname)) {
      return $newname;
    } else {

      return "error";
    }
  } else {

    return "InvalidFormate";
  }
}

//run querys 
function runQuerys($conn, $sql)
{

  $result  = mysqli_query($conn, $sql);
  if (!$result) {
    return false;
  } else {
    return true;
  }
}

//function for pages name
function pageName()
{
  $fileName = basename($_SERVER['REQUEST_URI']);

  if ($fileName === "editProfile.php") {
    return "Edit Profile";
  } else if ($fileName === "bankDetails.php") {
    return "Bank Details";
  } else if ($fileName === "events.php") {
    return "Events";
  } else if ($fileName === "report.php") {
    return "Reports";
  } else if ($fileName === "campain.php") {
    return "Campain";
  } else if ($fileName === "ngoDashboard.php") {
    return "Dashboard";
  }
}

//function for pages name
function navigationLinks()
{
  $fileName = basename($_SERVER['REQUEST_URI']);
  return $fileName;
}

//function to validate if user have logedin or not
function validUser($conn)
{
  session_start();
  $id = $_SESSION['id'];

  if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $sql = "SELECT * FROM `ngo` WHERE ngo_id ='$id'";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
    }
  }
}

function UserVerify($conn)
{
  session_start();
  if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])){
     $id = $_SESSION['USER_ID'];
  return $id;
  }else{
    header("Location: login.html");
    die();
  }


  // // if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
  // //   $sql = "SELECT * FROM `ngo` WHERE ngo_id ='$id'";

  // //   $result = mysqli_query($conn, $sql);
  // //   if (mysqli_num_rows($result) === 1) {
  // //     $row = mysqli_fetch_assoc($result);
  // //   }
  // }
}

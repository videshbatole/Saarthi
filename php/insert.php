<?php
include "connection.php";
error_reporting(0);
$foodSector = "No" ;
$rescueSector = "No";
$heathSector = "No";
$educationSector = "No";

$ngoId = strtoupper(uniqid());
 $checkBox = $_POST['workingSector'] ;

for ($i = 0 ; $i< sizeof($checkBox);$i++){

    if ($checkBox[$i] == "food") {
        $foodSector = "Yes";
    } 
    if ($checkBox[$i] == "rescue") {
        $rescueSector = "Yes";
    } 

    if ($checkBox[$i]  == "health") {

        $heathSector = "Yes";
    } 

    if ($checkBox[$i]  == "education") {

        $educationSector = "Yes";
    } 
}

$sql = "INSERT INTO `ngo`( `ngoName`, `ngoRegistrationNo`, `ngoPanNo`, `establishDate`, `ngoContactNo`, `ngoEmail`, `setlorFirstName`, `setlorLastName`, `setlorGender`, `setlorMobileNo`, `setlorEmail`, `ngoAddress`, `ngoCountry`, `ngoState`, `ngoCity`, `ngoPincode`, `hungerness`, `rescue`, `health`, `education`,`password`) VALUES (  '" . $_POST['ngoName'] . "' ,'" . $_POST['ngoRegistrationNo'] . "' , '" . $_POST['ngoPanNo'] . "','" . $_POST['establishDate'] . "','" . $_POST['ngoContactNo'] . "','" . $_POST['ngoEmail'] . "','" . $_POST['setlorFirstName'] . "','" . $_POST['setlorLastName'] . "','" . $_POST['setlorGender'] . "','" . $_POST['setlorMobile'] . "','" . $_POST['setlorEmail'] . "','" . $_POST['ngoAddress'] . "','" . $_POST['ngoCountry'] . "','" . $_POST['ngoState'] . "','" . $_POST['ngoCity'] . "','" . $_POST['ngoPincode'] . "' , '$foodSector' , '$rescueSector','$heathSector','$educationSector','" . $_POST['ngoPassword'] . "')";



function  runQuery($sql ,$conn){
    if ($conn->query($sql) === TRUE) {
        echo "Registered";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}

runQuery($sql, $conn);
?>
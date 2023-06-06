<?php
session_start();
include "connection.php";
include "allFunction.php";
$id;
if ($_SESSION['NGO_ID'] != null) {
    $id = $_SESSION['NGO_ID'];
}

$sql = "SELECT * FROM `donation` WHERE  ngo_id ='$id' ";
$record = mysqli_query($conn, $sql);
$donation =  mysqli_fetch_all($record, MYSQLI_ASSOC);

foreach ($donation as   $value) {
?>
    <tr>
        <td><?php echo $value['donation_id'] ?></td>
        <td><?php echo $value['donor_name'] ?></td>
        <td><?php echo $value['donor_email'] ?></td>
        <td><?php echo $value['donor_mobile'] ?></td>
        <td><?php echo $value['date'] ?></td>
        <td><?php echo $value['donated'] ?></td>
        <td><?php echo $value['donation_discription'] ?></td>


    </tr>

<?php } ?>
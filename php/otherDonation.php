<?php
session_start();
include "connection.php";
include "allFunction.php";
$id;
if ($_SESSION['NGO_ID'] != null) {
    $id = $_SESSION['NGO_ID'];
}

$sql = "SELECT * FROM `transaction`,`user` WHERE transaction.userId =user.userId And ngo_id = '$id'";
$record = mysqli_query($conn, $sql);
$donation =  mysqli_fetch_all($record, MYSQLI_ASSOC);

foreach ($donation as   $value) {
?>
    <tr>
        <td><?php echo $value['transaction_id'] ?></td>
        <td><?php echo $value['Amount'] ?></td>
        <td><?php echo $value['date'] ?></td>
        <td><?php echo $value['firstName'] . "  &nbsp; &nbsp; &nbsp;" . $value['lastName'] ?></td>
        <td><?php echo $value['email'] ?></td>
        <td><?php echo $value['mobileNo'] ?></td>
        <td><?php echo $value['campain_id'] ?></td>


    </tr>

<?php } ?>
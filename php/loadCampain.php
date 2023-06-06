<?php
session_start();
header("Content-Type: text/html");
include "connection.php";
include "allFunction.php";
$id;
if ($_SESSION['NGO_ID'] != null) {
    $id = $_SESSION['NGO_ID'];
}

// $events = fetchAllData("campain", $conn, $id, "ngo_id");

$query = mysqli_query($conn, "SELECT * FROM `campain` WHERE ngo_id ='$id'");
// $para = mysqli_fetch_array($query);
while ($value = mysqli_fetch_array($query)) {
?>
    <div id="<?php echo "section" . $value['campain_id']; ?>" class="print-section">
        <div class="margin-bottom">

            <div class="event-detail-container">
                <!-- <div class="image-container"> -->
                <img src="img/campain/<?php echo $value['campain_image']; ?>" alt="event-Image" class="event-image">
                <!-- </div> -->

                <div class="detail-container">
                    <div class="margin">
                        <h3 class="event-id">id : <?php echo $value['campain_id']; ?></h3>
                        <h2 class="event-title"><?php echo $value['campain_title']; ?></h2>
                        <p class="event-description"><?php echo $value['campain_description']; ?></p>
                        <div class="event-timing">


                            <div>
                                <h3>Starting Date <br><span class="gray"><?php echo $value['camapin_start_date']; ?></span></h3>
                            </div>

                            <div>
                                <h3>Ending Date <br> <span class="gray"><?php echo $value['campain_end_date']; ?></span></h3>
                            </div>


                            <div>
                                <h3>staus<br> <span class="gray"><?php echo $value['campain_status']; ?></span></h3>
                            </div>


                            <div>
                                <h3>Amount<br> <span class="gray"><?php echo $value['campain_amount']; ?></span></h3>
                            </div>
                            <div>
                                <i class="fa-solid fa-eye event-detail-show show-details" onClick="checkClikedEvent()" id="<?php echo  $value['campain_id']; ?> "></i>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="event-details hide" id="<?php echo "div_" . $value['campain_id']; ?>">
            <div class="event-action-buttons">

                <?php if ($value['campain_status'] === "active") { ?>
                    <button onclick="curdOperation5('stop')" id="<?php echo $value['campain_id']; ?>"><i class="fa-regular fa-square clikeble"></i> Stop</button>
                <?php } else { ?>
                    <button onclick="curdOperation5('start')" id="<?php echo $value['campain_id']; ?>"><i class="fa-regular fa-square clikeble"></i> Start</button>
                <?php } ?>
                <button onclick="curdOperation5('delete')" id="<?php echo $value['campain_id']; ?>"><i class="fa-regular fa-trash clikeble"></i> Delete</button>

                <button onclick="printContent('<?php echo 'section' . $value['campain_id']; ?>')"><i class="fa-regular fa-print clikeble"></i> Print</button>
            </div>
            <table class="table table-rounded table-striped border gy-7 gs-7">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>Transaction ID </th>
                        <th>Date</th>
                        <th>Doner Mobile</th>
                        <th>Donor Name</th>
                        <th>Doner Email</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query2 = mysqli_query($conn, "SELECT * FROM `transaction` , `user` WHERE transaction.userId=user.userId AND  campain_id ='" . $value['campain_id'] . "'");
                    // $para = mysqli_fetch_array($query);
                    while ($record = mysqli_fetch_array($query2)) {
                    ?>
                        <tr>
                            <td><?php echo  $record['transaction_id']; ?></td>
                            <td><?php echo  $record['date']; ?></td>
                            <td><?php echo  $record['mobileNo']; ?></td>
                            <td><?php echo  $record['firstName'] . " " . $record['lastName']; ?></td>
                            <td><?php echo  $record['email']; ?></td>

                            <td><?php echo  $record['Amount']; ?></td>
                        </tr>
                    <?php } ?>
                <tfoot>
                    <tr>
                        <th id="total" colspan="5" style="text-align: right;">Total : </th>
                        <td ><?php
                                                        $total = mysqli_query($conn, "SELECT SUM(Amount)AS total FROM `transaction` WHERE campain_id='" . $value['campain_id'] . "'");
                                                        $sum = mysqli_fetch_assoc($total);
                                                        echo $sum['total'];
                                                        ?></td>
                        <td> </td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
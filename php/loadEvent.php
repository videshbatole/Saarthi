<?php
session_start();
header("Content-Type: text/html");
include "connection.php";
include "allFunction.php";
$id;
if ($_SESSION['NGO_ID'] != null) {
    $id = $_SESSION['NGO_ID'];
}
$events = fetchAllData("events", $conn, $id, "ngo_id");
foreach ($events as   $value) {
?>
    <div id="<?php echo "section" . $value['event_id']; ?>" class="print-section">
        <div class="margin-bottom">

            <div class="event-detail-container">
                <img src="img/events/<?php echo $value['event_image']; ?>" alt="event-Image" class="event-image">
                <div class="detail-container">
                    <div class="margin">
                        <h3 class="event-id">id : <?php echo $value['event_id']; ?></h3>
                        <h2 class="event-title"><?php echo $value['event_title']; ?></h2>
                        <p class="event-description"><?php echo $value['event_description']; ?></p>
                        <div class="event-timing">


                            <div>
                                <h3>Starting Date <br><span class="gray"><?php echo $value['event_start_date']; ?></span></h3>
                            </div>

                            <div>
                                <h3>Ending Date <br> <span class="gray"><?php echo $value['event_end_date']; ?></span></h3>
                            </div>

                            <div>
                                <h3>Time<br> <span class="gray"><?php echo $value['event_time']; ?></span></h3>
                            </div>

                            <div>
                                <h3>staus<br> <span class="gray"><?php echo $value['event_status']; ?></span></h3>
                            </div>
                            <div>
                                <i class="fa-solid fa-eye event-detail-show show-details" onClick="checkClikedEvent()" id="<?php echo  $value['event_id']; ?> "></i>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="event-details hide" id="<?php echo "div_" . $value['event_id']; ?>">
            <div class="event-action-buttons">

              
                <?php if ($value['event_status'] === "active") { ?>
                    <button onclick="curdOperation('stop')" id="<?php echo $value['event_id']; ?>"><i class="fa-regular fa-square clikeble"></i> Stop</button>
                <?php } else { ?>
                    <button onclick="curdOperation('start')" id="<?php echo $value['event_id']; ?>"><i class="fa-regular fa-square clikeble"></i> Start</button>
                <?php } ?>
                <button onclick="curdOperation('delete')" id="<?php echo $value['event_id']; ?>"><i class="fa-regular fa-trash clikeble"></i> Delete</button>

                <button onclick="printContent('<?php echo 'section' . $value['event_id']; ?>')"><i class="fa-regular fa-print clikeble"></i> Print</button>
            </div>
            <table class="table table-rounded table-striped border gy-7 gs-7">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $eventid = $value['event_id'];
                    $entries = fetchAllData("event_registration", $conn, $eventid, "event_id");
                    foreach ($entries as   $value) {
                    ?>
                        <tr>
                            <td><?php echo  $value['registratin_id']; ?></td>
                            <td><?php echo  $value['registration_name']; ?></td>
                            <td><?php echo  $value['registration_email']; ?></td>
                            <td><?php echo  $value['registration_mobile']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
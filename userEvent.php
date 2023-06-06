<?php
include "php/connection.php";
include "php/allFunction.php";
$id = UserVerify($conn);

$query = "SELECT * FROM `user` WHERE userId ='$id'";
$run = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($run);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userDashboard.css">
    <title>Saarthi | Dashboard</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <link href="css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/userCampain.css">
    <link rel="stylesheet" href="css/alertify.min.css" />

</head>

<body>
    <main>
        <div class="container">

            <section class="navigation-links">
                <nav>
                    <div class="profile-image-container">
                        <div class="profile-image">
                            <img src="img/profile/<?php echo $data['profile_image'] ?>" alt="profile-image">
                        </div>
                    </div>

                    <div class="name-container">
                        <div>
                            <h1 class="heading user-name"><?php echo $data['firstName'] . " " . $data['lastName'] ?></h1>
                            <p class="small-text"><?php echo $data['email']; ?></p>
                        </div>
                    </div>

                    <div class="nav-links">
                        <div class="nav-link-center">
                            <ul class="nav-link-ul">
                                <li>
                                    <a href="userDashboard.php"><i class="fa-regular fa-house fa-icon"></i> Dashboard </a>
                                </li>



                                <li class="nav-link-active">
                                    <a href="userEvent.php"><i class="fa-regular fa-calendar  fa-icon"></i> Events</a>
                                </li>

                                <li>
                                    <a href="userCampain.php"><i class="fa-regular fa-circle-dollar-to-slot fa-icon "></i>
                                        Campaign</a>
                                </li>


                                <li>
                                    <a href="donation.php"><i class="fa-regular fa-sack fa-icon"></i> Donate</a>
                                </li>

                                <li>
                                    <a href="userTransaction.php"><i class="fa-regular fa-clipboard-list fa-icon"></i>
                                        Transactions</a>
                                </li>


                                <li>
                                    <a href="editUserProfile.php"><i class="fa-regular fa-user fa-icon"></i> Profile </a>
                                </li>



                                <li class="logout">
                                    <a href="logout.php"><i class="fa-regular fa-right-from-bracket fa-icon"></i> Log
                                        Out </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </section>

            <section class="main-containt-container">

                <div class="search-container">
                    <div class="search-campain">
                        <i class="fa-regular fa-magnifying-glass search-icon"></i>
                        <input type="text" placeholder="search campaign" class="campain-search-button" data-search>
                    </div>
                </div>


                <section class="content-container">
                    <section class="content-container">

                        <div id="container-box">

                            <?php
                            $date = date("Y-m-d");
                            $sql = "SELECT * FROM `events`,`ngo` WHERE events.ngo_id=ngo.ngo_id and event_status ='active' AND event_end_date >= '$date'";
                            $run = mysqli_query($conn, $sql);
                            // $rows = mysqli_num_rows($run);
                            // $data = mysqli_fetch_array($run);

                            while ($rows = mysqli_fetch_array($run)) {


                            ?>

                                <a href="eventRegistration.php?eventID=<?php echo $rows['event_id']; ?>" class="event-card-1">
                                    <div class="campain">
                                        <span class="event-date-container"><i class="fa-regular fa-calendar fa-icon"></i><?php echo $rows['event_end_date']; ?></span>
                                        <div class="campain-image">
                                            <img src="img/events/<?php echo $rows['event_image']; ?>" alt="">

                                            <h1 class="heading campain-title"><?php echo $rows['event_title']; ?></h1>
                                            <p class="campain-description"><?php echo $rows['event_description']; ?></p>

                                            <div class="event-information-section">



                                                <div class="container-event-ngo-circle">

                                                    <div class="event-ngo-circle">
                                                        <img src="img/profile/<?php echo $rows['profile_image']; ?>" alt="">
                                                    </div>

                                                    <div class="event-ngo-circle-name">
                                                        <h1><?php echo $rows['ngo_name']; ?></h1>
                                                        <h6><?php echo $rows['ngo_email']; ?></h6>
                                                    </div>

                                                </div>



                                            </div>


                                        </div>
                                    </div>
                                </a>

                            <?php } ?>

                        </div>

                    </section>





        </div>

        </section>

        </section>

        </div>

    </main>
    <script src="js/alertify.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>
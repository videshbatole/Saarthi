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
                            <img src="img/profile/<?php echo $data['profile_image']; ?>" alt="profile-image">
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

                    <?php
                    $sql = "SELECT * FROM `events`,`ngo` WHERE events.ngo_id=ngo.ngo_id and event_id='" . $_GET['eventID'] . "'";
                    $run = mysqli_query($conn, $sql);
                    // $rows = mysqli_num_rows($run);
                    $data = mysqli_fetch_assoc($run);  ?>
                    <div class="event-registration-form">

                        <div class="main-event-container-image">
                            <img src="img/events/<?php echo $data['event_image']; ?>" alt="" class="overly">
                        </div>
                        <div class="register-event-heading">

                            <div class="n-c-image">
                                <img src="img/profile/<?php echo $data['profile_image']; ?>" alt="">

                            </div>
                            <div class="re-c-info">
                                <h1><?php echo $data['ngo_name']; ?></h1>
                                <h4 class="reg-sub-heading"><?php echo $data['ngo_email']; ?></h4>

                            </div>

                        </div>

                        <div class="registration-form-section">

                            <div class="registration-info">

                                <h1>Description</h1>
                                <p class="event-description">
                                    <?php echo $data['event_description']; ?>
                                </p>
                                <h1>Timing</h1>
                                <p class="event-description">&nbsp; <i class="fa-regular fa-calendar"></i> <?php echo $data['event_start_date']; ?>
                                    <br>
                                    &nbsp; <i class="fa-regular fa-clock"></i> <?php echo $data['event_time']; ?>
                                    <br>
                                    <!-- &nbsp; <i class="fa-regular fa-users"></i> 100 Entry -->

                                </p>

                                <!-- <h1>Eligibility</h1>
                                <p class="event-description">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam eaque suscipit
                                    repellat perferendis tempore illum cupiditate facilis ut sapiente veniam debitis
                                    voluptatem delectus iure, quibusdam cumque deleniti dolorum ducimus dignissimos?
                                </p>

                                <h1>Address</h1>
                                <p class="event-description">
                                    <span>address</span><br>
                                    <span>City</span> <br>
                                    <span>State</span> <br>
                                    <span>Country</span><br>
                                </p> -->



                            </div>

                            <div class="registration-form">
                                <form action="" id="register_event">
                                    <h1 style="text-align: center;">Register</h1>

                                    <input type="hidden" name="register_event">
                                    <input type="hidden" name="register_event">
                                    <input type="hidden" name="event_id" value="<?php echo $_GET['eventID']; ?>">

                                    <div class="register-input-container">

                                        <label for="email" class="input-lable">Name :</label>
                                        <input type="text" id="mail" name="name" class="input-email">

                                        <label for="email" class="input-lable">Email :</label>
                                        <input type="email" id="mail" name="email" class="input-email">

                                        <label for="email" class="input-lable">Mobile No</label>
                                        <input type="tel" id="mail" name="mobile" class="input-email">


                                        <button class="save-button" style="margin-bottom: 1rem; width:330px; ">Register</button>
                                </form>
                            </div>
                        </div>

                    </div>


        </div>





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
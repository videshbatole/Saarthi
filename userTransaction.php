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

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/userCampain.css">
    <link rel="stylesheet" href="css/userTransaction.css">
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
                            <p class="small-text"><?php echo $data['email'] ?></p>
                        </div>
                    </div>

                    <div class="nav-links">
                        <div class="nav-link-center">
                            <ul class="nav-link-ul">
                                <li>
                                    <a href="userDashboard.php"><i class="fa-regular fa-house fa-icon"></i> Dashboard </a>
                                </li>



                                <li>
                                    <a href="userEvent.php"><i class="fa-regular fa-calendar  fa-icon"></i> Events</a>
                                </li>

                                <li>
                                    <a href="userCampain.php"><i class="fa-regular fa-circle-dollar-to-slot fa-icon "></i>
                                        Campaign</a>
                                </li>


                                <li>
                                    <a href="donation.php"><i class="fa-regular fa-sack fa-icon"></i> Donate</a>
                                </li>

                                <li class="nav-link-active">
                                    <a href="userTransaction.php"><i class="fa-regular fa-clipboard-list fa-icon"></i>
                                        Transactions</a>
                                </li>


                                <li>
                                    <a href="editUserProfile.php"><i class="fa-regular fa-user fa-icon"></i> Profile </a>
                                </li>



                                <li class="logout">
                                    <a href="php/logout.php"><i class="fa-regular fa-right-from-bracket fa-icon"></i> Log
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


                <button class="export-btn" style="background-color:#009ba5; border:none; color:white ;  border-radius:5px; display:block; margin-left:1rem; padding:1rem;
                width:200px;
            " onclick="printAllContent('transaction-table')"> <i class="fa-thin fa-file-arrow-down"></i> Export</button>
                <div class="second-container">

                    <section class="transaction-table" id="transaction-table">

                        <table>

                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> NGO Name</th>
                                    <th>Date</th>
                                    <th> Status</th>
                                    <th> Donated</th>
                                    <th>Description</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $run = mysqli_query($conn, "SELECT * FROM `donation`,`ngo` WHERE  donation.ngo_id=ngo.ngo_id AND userId='$id'");
                                // $rows = mysqli_num_rows($run);
                                // $data = mysqli_fetch_array($run);

                                while ($rows = mysqli_fetch_array($run)) {


                                ?>
                                    <tr>
                                        <th> <?php echo $rows['donation_id']; ?> </th>
                                        <td> <?php echo $rows['ngo_name']; ?></td>
                                        <td> <?php echo $rows['date']; ?></td>
                                        <td> <?php echo $rows['status']; ?> </td>
                                        <td> <?php echo $rows['donated']; ?> </td>
                                        <td> <?php echo $rows['donation_discription']; ?> </td>
                                        <td> <?php echo $rows['ngo_address']; ?> </td>
                                        <td> <?php echo $rows['ngo_city']; ?> </td>
                                        <td> <?php echo $rows['ngo_state']; ?> </td>
                                        <td> <?php echo $rows['ngo_country']; ?> </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </section>
                </div>
        </div>

        </section>

        </section>

        </div>

    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/print.js"></script>
</body>

</html>
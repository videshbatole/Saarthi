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
                                <li class="nav-link-active">
                                    <a href="campaign.html"><i class="fa-regular fa-house fa-icon"></i> Dashboard </a>
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

                                <li>
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


                <section class="content-container">



                    <div class="container-box">

                        <div class="user-dash-card">
                            <div class="user-dash-card-container">
                                <div class="icon-container">
                                    <i class="fa-solid fa-thumbs-up"></i>

                                </div>
                                <div>
                                    <div class="detail-container">
                                        <h1 class=" dash-number-text">Campaign supported</h1>
                                        <h1 class=" dash-number">

                                            <?php $sql = "SELECT COUNT(DISTINCT campain_id) as campain_count   ,SUM(Amount) as campain_amount FROM `transaction` WHERE userId='$id'";
                                            $run = mysqli_query($conn, $sql);
                                            $result = mysqli_fetch_assoc($run);
                                            echo $result['campain_count'];
                                            ?>
                                        </h1>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="user-dash-card" style="margin-left: 6rem; margin-right:rem;">
                            <div class="user-dash-card-container">
                                <div class="icon-container red-bacground">
                                    <i class="fa-solid fa-sack  red-icon"></i>

                                </div>
                                <div class="detail-container">
                                    <div>
                                        <h1 class=" dash-number-text">Campain Donation </h1>
                                        <h1 class=" dash-number red-icon"><?php echo $result['campain_amount']; ?></h1>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="user-dash-card">
                            <div class="user-dash-card-container">
                                <div class="icon-container mat-light">
                                    <i class="fa-solid fa-user-large   mat"></i>

                                </div>
                                <div>
                                    <div class="detail-container">
                                        <h1 class=" dash-number-text">Events Participated</h1>
                                        <h1 class=" dash-number mat"><?php

                                                                        $sql = "SELECT COUNT(DISTINCT event_id) As events  FROM `event_registration` WHERE userId='$id'";
                                                                        $run = mysqli_query($conn, $sql);
                                                                        $result = mysqli_fetch_assoc($run);

                                                                        echo $result['events'];



                                                                        ?></h1>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </div>


                    <div class="request-container">
                        <div class="headind-container">
                            <h1 class="request-title">Request's</h1>
                            <a href="#google"><i class="fa-regular fa-circle-plus fa-request"></a></i>
                        </div>




                        <div id="request_div_container">


                        </div>

                    </div>



        </div>

        </section>

        </section>

        </div>
        <!-- modal start here -->
        <div id="google" class="modaloverlay">
            <div class="modal modal-scroll">
                <a href="#close" class="close">&times;</a>
                <div>
                    <h1>Create Request</h1>
                    <p class="beni-info">Fill Beneficiary Details</p>
                    <form action="" id="request-form" enctype="multipart/form-data">
                        <div class="create-request-form-container">


                            <div class="input-row-5">
                                <div>
                                    <label for="name" class="input-lable">First Name:</label>
                                    <input type="text" id="first_name" name="first_name" class="input-text" required>
                                </div>
                                <div>
                                    <label for="name" class="input-label">Last Name:</label>
                                    <input type="text" id="last_name" name="last_name" class="input-text" required>
                                </div>
                            </div>

                            <div class="beni-request-email">
                                <label for="name" class="input-label">Email</label>
                                <input type="email" id="email" name="email" class="input-text" required>
                            </div>

                            <div class="beni-request-email">
                                <label for="name" class="input-label">Mobile No</label>
                                <input type="tel" id="mobile_no" name="mobile_no" class="input-text" pattern="^\d{10}$" required>
                            </div>

                            <div class="beni-request-email">
                                <label for="name" class="input-label">Country</label>
                                <select name="country" class="input-select create-input-select" id="country" required>
                                    <option selected disabled>Select</option>

                                </select>
                            </div>

                            <div class="beni-request-email">
                                <label for="name" class="input-label">State</label>
                                <select name="state" id="state" class="input-select create-input-select" required>
                                    <option selected disabled>Select</option>

                                </select>
                            </div>
                            <div class="beni-request-email">
                                <label for="name" class="input-label">City</label>
                                <select name="city" id="city" class="input-select create-input-select" required>
                                    <option selected disabled>Select</option>

                                </select>
                            </div>

                            <div class="beni-request-email">
                                <label for="name" class="input-label">Beneficiary Image</label>
                                <label class="filelabel">
                                    <i class="fa fa-paperclip">
                                    </i>
                                    <span class="title">
                                        Add File
                                    </span>
                                    <input class="FileUpload1" id="FileInput" name="userImage" type="file" required />
                                </label>
                            </div>

                            <div class="beni-request-email">
                                <label for="name" class="input-label">NGO Sector</label>
                                <select name="sector" id="sector" class="input-select create-input-select" required>
                                    <option selected disabled>Select</option>
                                    <option value="hungerness">Hungerness</option>
                                    <option value="healthcare">Health Care</option>
                                    <option value="rescue">Rescue</option>
                                    <option value="education">Education</option>
                                </select>
                            </div>

                            <div class="beni-request-email">
                                <label for="name" class="input-label">NGO</label>
                                <select name="ngo" id="ngo_list" class="input-select create-input-select" required>
                                    <option selected disabled>Select</option>

                                </select>
                            </div>


                            <div class="beni-request-email">
                                <label for="name" class="input-label">Issue</label>
                                <textarea name="issue" id="" cols="30" rows="10" class="input-textarea" name="issue" required></textarea>
                            </div>

                            <div class="beni-request-email-btn">
                                <button type="submit" class="btn-primary-request">Submit</button>
                                </select>
                            </div>
                            <input type="hidden" name="createRequest" value="createRequest">


                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal start here -->
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/loadRequest.js"></script>
    <script src="js/getAddress.js"></script>

    <script>
        loadRequest(<?php echo $id; ?>);
    </script>
</body>

</html>
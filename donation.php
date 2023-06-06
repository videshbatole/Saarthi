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
    <link rel="stylesheet" href="css/donation.css">
</head>

<body>
    <main>
        <div class="container">

            <section class="navigation-links">
                <nav>
                    <div class="profile-image-container">
                        <div class="profile-image">
                            <img src="img/profile/<?php echo $data['profile_image'] ?>" alt=" profile-image">
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



                                <li>
                                    <a href="userEvent.php"><i class="fa-regular fa-calendar  fa-icon"></i> Events</a>
                                </li>

                                <li>
                                    <a href="userCampain.php"><i class="fa-regular fa-circle-dollar-to-slot fa-icon "></i>
                                        Campaign</a>
                                </li>


                                <li class="nav-link-active">
                                    <a href="Donation.php"><i class="fa-regular fa-sack fa-icon"></i> Donate</a>
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
                        <input type="text" placeholder="search campaign" class="campain-search-button">
                    </div>
                </div>


                <section class="content-container">

                    <div id="container-box">

                        <?php
                        $sql = "SELECT * FROM `ngo`";
                        $run = mysqli_query($conn, $sql);
                        // $rows = mysqli_num_rows($run);
                        // $data = mysqli_fetch_array($run);

                        while ($rows = mysqli_fetch_array($run)) {


                        ?>

                            <div class="campain">
                                <div class="campain-image">
                                    <img src="img/profile/<?php echo $rows['profile_image'] ?>" alt="">
                                </div>
                                <h1 class="heading campain-title"><?php echo $rows['ngo_name'] ?></h1>
                                <!-- <p class="campain-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat praesentium, delectus veniam, ratione quos in porro sint dolore magnam pariatur blanditiis </p> -->

                                <div class="accepts">
                                    <i class="fa-regular fa-burger-soda"></i>
                                    <i class="fa-regular fa-sack-dollar"></i>
                                    <i class="fa-regular fa-box-open-full"></i>
                                </div>
                                <div class="donation-buttons">



                                    <li class="know-more">
                                        <a onclick="donate('<?php echo $rows['ngo_id']; ?>','<?php echo $rows['ngo_name'] ?>');" href="#google" class="donate-btn" style="color:aliceblue; padding:0.5rem 2rem; margin-left:0px;"> donate</a>
                                    </li>

                                </div>
                            </div>

                        <?php } ?>
                        <!-- <span class="span"></span> -->

                    </div>

                </section>

            </section>

        </div>
    </main>
    <div id="google" class="modaloverlay">
        <div class="modal modal-scroll">
            <a href="#close" class="close">&times;</a>
            <div>
                <h1>Donation Form</h1>
                <p class="beni-info">Fill Beneficiary Details</p>
                <form action="" id="donation_form">
                    <div class="create-request-form-container">

                        <input type="hidden" name="donation" value="donation">
                        <input type="hidden" class="input-text" id="ngo_id" value="" name="ngo_id">

                        <!-- <input type="hidden" name="ngo_id" value="" id="donate_ngo_id"> -->


                        <div class="input-row-5">
                            <div>

                                <label for="name" class="input-lable">NGO ID &nbsp; &nbsp; &nbsp;:</label>
                                <input type="text" class="input-text" id="ngo_id2" value="" style="background-color: #009aa585; color:white;" name="ngo_id" disabled>
                            </div>
                            <div>
                                <label for="name" class="input-label">NGO Name:</label>
                                <input type="text" id="ngo_name" name="ngo_name" class="input-text" style="background-color: #009aa585; color:white;" disabled>
                            </div>
                        </div>



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
                            <label for="name" class="input-label">Donate</label>
                            <input type="text" id="donate" name="donate" class="input-text" required>
                        </div>
                        <div class="beni-request-email">
                            <label for="name" class="input-label">Mobile No</label>
                            <input type="tel" id="mobile_no" name="mobile_no" class="input-text" pattern="^\d{10}$" required>
                        </div>

                        <div class="beni-request-email">
                            <label for="name" class="input-label">description</label>
                            <textarea id="" cols="30" rows="10" class="input-textarea" name="desc" required></textarea>
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


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/getAddress.js"></script>

    <Script>
        function donate(id, ngoName) {

            document.getElementById("ngo_id").value = id;
            document.getElementById("ngo_id2").value = id;

            document.getElementById("ngo_name").value = ngoName;


        }

        $("#donation_form").submit(function(e) {
            e.preventDefault();

            // var data = document.getElementById('donation_form').serialize();
            // var data = $('#donation_form').serialize();
            $.ajax({
                type: "post",
                url: "php/register.php",
                data: $("#donation_form").serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.status === "success") {
                        window.location.replace("donation.php#close");
                        Swal.fire({
                            title: "Sucess",
                            text: "Please Send Requsted items",
                            icon: "success",
                        });
                    }
                    if (response.status === "error") {
                        alertify.error(response.massage);
                    }
                },
            });

        });

        // setTimeout(function() {
        //     //your code to be executed after 1 second

        // }, 3000);
    </Script>

</body>

</html>
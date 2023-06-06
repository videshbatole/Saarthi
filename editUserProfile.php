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
    <link rel="stylesheet" href="css/all.css">
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

                                <li class="nav-link-active">
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

                    <div class="profile-detail-container">

                        <div class="image-with-name">

                            <div class="container">
                                <form action="" method="post" enctype="multipart/form-data" id="edit_user">
                                    <input type="hidden" name="edit_user_profile" value="edit_user_profile">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload" />
                                            <label for="imageUpload"><i class="fa-solid fa-pencil edit-pen"></i></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url('img/profile/<?php echo $data['profile_image']; ?>');">
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="profile-name-and-email">
                                <h1 class="heading-2">ID : <?php echo $data['userId']; ?></h1>
                                <h7 class="heading-2">Name : <?php echo $data['firstName'] . " " . $data['lastName'] ?></h7> <br>
                                <h7 class="heading-2">Email : <?php echo $data['email']; ?></h7><br>

                            </div>
                        </div>

                        <div class="edit-user-profile-input">
                            <div class="input-row">
                                <div>
                                    <label for="name" class="input-lable">First Name:</label>
                                    <input type="text" id="first_name" name="first_name" class="input-text" value="<?php echo $data['firstName']; ?>">
                                </div>

                                <div>
                                    <label for="name" class="input-label">Last Name:</label>
                                    <input type="text" id="last_name" name="last_name" class="input-text" value="<?php echo $data['lastName']; ?>">
                                </div>

                            </div>
                            <div class="email-container">
                                <label for="email" class="input-lable">Email Id :</label>
                                <input type="email" id="user_email" name="user_email" class="input-email" value="<?php echo $data['email']; ?>">
                            </div>

                            <div class="email-container">
                                <label for="email" class="input-lable">Mobile No:</label>
                                <input type="tel" id="user_mobile" name="user_mobile" class="input-email" value="<?php echo $data['mobileNo']; ?>" pattern="^\d{10}$">
                            </div>



                            <div class="email-container">
                                <label for="email" class="input-lable">Date Of Birth:</label>
                                <input type="text" id="user_dob" name="user_dob" class="input-email" value="<?php echo $data['dob']; ?>" onfocus="(this.type='date')">
                            </div>

                            <div class="email-container margin-2">
                                <label for="email" class="input-lable">Gender:</label> <br>
                                <div class="gender-input-container">
                                    <?php if ($data['gender'] === "Male") { ?>
                                        <input type="radio" name="gender" id="Male" value="Male" checked>
                                    <?php } else { ?>
                                        <input type="radio" name="gender" id="Male" value="Male">
                                    <?php } ?>
                                    <label for="Male" class="gende-label"><i class="fa-light fa-mars "></i> &nbsp;
                                        Male</label>
                                    <?php if ($data['gender'] === "Female") { ?>
                                        <input type="radio" name="gender" id="Female" value="Female" checked>
                                    <?php } else { ?>
                                        <input type="radio" name="gender" id="Female" value="Female">
                                    <?php } ?>
                                    <label for="Female" class="gende-label"> <i class="fa-light fa-venus "></i>
                                        &nbsp; Female</label>
                                    <?php if ($data['gender'] === "transgender") {  ?>
                                        <input type="radio" name="gender" id="transgender" value="transgender" checked>
                                    <?php } else { ?>
                                        <input type="radio" name="gender" id="transgender" value="transgender">
                                    <?php } ?>
                                    <label for="transgender" class="gende-label"><i class="fa-light fa-transgender "></i>
                                        &nbsp;Transgender</label>
                                </div>
                            </div>

                            <div class="email-container">
                                <label for="email" class="input-lable">Address:</label>
                                <input type="text" id="user_address" name="user_address" class="input-email" value="<?php echo $data['address']; ?>">
                            </div>

                            <div class="email-container">
                                <label for="email" class="input-lable">Country:</label>
                                <select name="country" id="country" class="input-select">
                                    <option slelected value="<?php echo $data['country']; ?>"><?php echo $data['country']; ?></option>
                                </select>
                            </div>

                            <div class="email-container">
                                <label for="email" class="input-lable">State:</label>
                                <select name="state" id="state" class="input-select">
                                    <option slelected value="<?php echo $data['state']; ?>"><?php echo $data['state']; ?></option>
                                </select>
                            </div>

                            <div class="email-container">
                                <label for="email" class="input-lable">City:</label>
                                <select name="city" id="city" class="input-select">
                                    <option slelected value="<?php echo $data['city']; ?>"><?php echo $data['city']; ?></option>
                                </select>
                            </div>

                            <div class="email-container button-container">

                                <button class="save-button" type="submit">Save</button>
                                </form>
                            </div>
                            <form action="" id="Change_password_user">
                                <div class="email-container">
                                    <label for="email" class="input-lable">Old Password</label>
                                    <input type="password" id="old_password" name="user_address" class="input-email" value="">
                                </div>

                                <div class="email-container">
                                    <label for="email" class="input-lable">New Password:</label>
                                    <input type="password" id="user_address" name="user_address" class="input-email" value="">
                                </div>

                                <div class="email-container">
                                    <label for="email" class="input-lable">Confirm Password:</label>
                                    <input type="password" id="user_address" name="user_address" class="input-email" value="">
                                </div>

                                <button class="save-button" style="margin-left:12rem ;">Change Password</button>
                            </form>
                        </div>


                    </div>









        </div>

        </section>

        </section>

        </div>
        <script>
            element = document.getElementById('Change_password_user');
            old_password = document.getElementById('old_password').value;

            element.addEventListener("submit", function(e) {
                e.preventDefault();

                let password = "<?php echo $data['password']; ?>";

                if (old_password === password) {
                    alertify.success("Paaword changed Successfully");
                } else {
                    alertify.error("Invalid old password");
                }


            });
       
        </script>
    </main>
    <script src="js/alertify.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>


</body>

</html>
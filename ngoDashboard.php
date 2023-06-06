<?php
include "php/allFunction.php";
include "php/connection.php";
session_start();
$id;
if ($_SESSION['NGO_ID'] != null) {
    $id = $_SESSION['NGO_ID'];
} else {
    header("location:login.html");
}

$data = fetchData("ngo", $conn, $id, "ngo_id",);
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />
    <title>Saarthi | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="img/favicon.ico" />
    <!--google fonts -->


    <!--css files -->
    <link href="css/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="css/all.css" rel="stylesheet" type="text/css" />


    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/alertify.min.css" />
    <link rel="stylesheet" href="css/userDashboard.css">
    <link rel="stylesheet" href="css/userCampain.css">
    <!-- <link rel="stylesheet" href="css/ngoDashboard.css" /> -->

</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">

    <div class="d-flex flex-column flex-root" id="main">
        <!--Main container Starts Here-->
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside aside-extended bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">

                <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">

                    <!--Logo-->
                    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto pt-10" id="kt_aside_logo">
                        <a href="index.html">
                            <img alt="Logo" src="   img/logo.png" class="h-55px" />
                        </a>
                    </div>

                    <div class="aside-nav d-flex flex-column flex-lg-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
                        <div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5" data-kt-menu="true">
                            <div class="menu-item py-2">

                                <!-- Navigation link start here  -->

                                <a class="menu-link   menu-center active" href="ngoDashboard.php" title="Dashboard" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">

                                    <span class="menu-icon me-0">
                                        <span class="svg-icon svg-icon-1">
                                            <i class="fa-solid fa-house nav-icons"></i>
                                        </span>
                                    </span>
                                </a>

                                <!-- events -->
                                <?php if ($fileName === "events.php") {
                                ?>
                                    <a class="menu-link   menu-center active" href="events.php" title="Event's" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <?php } else { ?>
                                        <a class="menu-link   menu-center " href="events.php" title="Event's" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <?php } ?>
                                        <span class="menu-icon me-0">
                                            <span class="menu-icon me-0">
                                                <span class="svg-icon svg-icon-1">
                                                    <i class="fa-regular fa-clipboard-list nav-icons "></i>
                                                </span>
                                            </span>
                                        </span>
                                        </a>

                                        <!-- campains -->
                                        <?php if ($fileName === "campain.php") {
                                        ?>
                                            <a class="menu-link   menu-center  active" href="campain.php" title="campain" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                            <?php } else { ?>
                                                <a class="menu-link   menu-center  " href="campain.php" title="campain" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                <?php } ?>
                                                <span class="menu-icon me-0">
                                                    <span class="menu-icon me-0">
                                                        <span class="svg-icon svg-icon-1">
                                                            <i class="fa-solid fa-circle-dollar-to-slot nav-icons"></i>
                                                        </span>
                                                    </span>
                                                </span>
                                                </a>

                                                <!-- reports 
                                                        <?php if ($fileName === "report.php") {
                                                        ?>
                                                            <a class="menu-link  menu-center active" href="report.php" title="reports" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                            <?php } else { ?>
                                                                <a class="menu-link  menu-center" href="report.php" title="reports" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                                <?php } ?>
                                                                <span class="menu-icon me-0">
                                                                    <span class="menu-icon me-0">
                                                                        <span class="svg-icon svg-icon-1">
                                                                            <i class="fa-regular fa-file-chart-column nav-icons"></i>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                                </a>
-->
                                                <!-- Bank Details -->
                                                <?php if ($fileName === "ngodonation.php") {
                                                ?>
                                                    <a class="menu-link  menu-center active" href="ngodonation.php" title="Donation's" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                    <?php } else { ?>
                                                        <a class="menu-link  menu-center" href="ngodonation.php" title="Donation's" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                        <?php } ?>
                                                        <span class="menu-icon me-0">
                                                            <span class="menu-icon me-0">
                                                                <span class="svg-icon svg-icon-1">
                                                                    <i class="fa-regular fa-file-invoice-dollar nav-icons"></i>
                                                                </span>
                                                            </span>
                                                        </span>
                                                        </a>

                                                        <!-- Profile -->
                                                        <?php if ($fileName === "editProfile.php") {
                                                        ?>
                                                            <a class="menu-link  menu-center active" href="editProfile.php" title="Profile" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                            <?php } else { ?>
                                                                <a class="menu-link  menu-center " href="editProfile.php" title="Profile" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">

                                                                <?php } ?>
                                                                <span class="menu-icon me-0">
                                                                    <span class="menu-icon me-0">
                                                                        <span class="svg-icon svg-icon-1">
                                                                            <i class="fa-regular fa-address-card nav-icons"></i>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!----------------------------Header---------------------------->
                <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">


                        <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

                            <h1 class="text-dark fw-bolder my-1 fs-2">Welcome to Saarthi
                                <small class="text-muted fs-6 fw-normal ms-1"></small>
                            </h1>
                            <ul class="breadcrumb fw-bold fs-base my-1">
                                <li class="breadcrumb-item text-muted">
                                    <a href="index.html" class="text-muted">Home</a>
                                </li>
                                <li class="breadcrumb-item text-dark"><?php echo pageName(); ?></li>
                            </ul>

                        </div>

                        <div class="d-flex d-lg-none align-items-center ms-n2 me-2">

                            <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                                <span class="svg-icon svg-icon-2x">
                                    <i class="fa-solid fa-grid-horizontal nav-icons"></i>
                                </span>
                            </div>
                            <a href="index.html" class="d-flex align-items-center">
                                <img alt="Logo" src="img/logo.png" width="60px" />
                            </a>

                        </div>

                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                    <img src="img/profile/<?php echo $data['profile_image']; ?>" alt="metronic" />
                                </div>

                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">

                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="img/profile/<?php echo $data['profile_image']; ?>" />
                                            </div>

                                            <div class="d-flex flex-column">
                                                <div class="fw-bolder d-flex align-items-center fs-5">
                                                    <?php echo $data['ngo_name']; ?>
                                                </div>
                                                <a href="#" class="fw-bold text-muted text-hover-primary fs-7"><?php echo $data['ngo_email']; ?></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="separator my-2"></div>

                                    <div class="menu-item px-5">
                                        <a href="editProfile.html" class="menu-link px-5">Profile</a>
                                    </div>

                                    <div class="menu-item px-5">
                                        <a href="ngoDashboard.html" class="menu-link px-5">
                                            <span class="menu-text">Dashboard</span>
                                            <span class="menu-badge">
                                        </a>
                                    </div>


                                    <div class="menu-item px-5">
                                        <a href="ngoDonation.php" class="menu-link px-5">Reports</a>
                                    </div>

                                    <div class="separator my-2"></div>
                                    <div class="menu-item px-5">
                                        <a href="php/logout.php" class="menu-link px-5">Sign Out</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- containt starts here  -->



                <main class="dashboard-detail-container">
                    <div class="request-container" style="margin-left: auto; margin-right:auto">
                        <div class="headind-container">
                            <h1 class="request-title">Request's</h1>
                            <a href="#google"><i class="fa-regular fa-circle-plus fa-request"></a></i>
                        </div>

                        <div id="request_div_container">


                        </div>

                    </div>
                </main>



            </div>










        </div>
        <script src="js/alertify.min.js"></script>
        <script src="js/plugins.bundle.js"></script>
        <script src="js/scripts.bundle.js"></script>
        <script src="js/allFunctions.js"></script>
        <script src="js/loadRequest2.js"></script>
        <script src="js/dashboard.js"></script>
        <script>
            // $(document).ready(function() {

            //     loadCampain();

            // });

            loadRequest(<?php echo $id; ?>);

            function acceptRequest(id) {

                $.ajax({
                    type: "POST",
                    url: "php/test.php",
                    data: $.param({
                        operation: "accept",
                        id: id
                    }),
                    success: function(res) {
                        if (res === "Success") {
                            alertify.success("Accepted");
                            loadRequest(<?php echo $id; ?>);

                        }

                        if (res === "Faild") {
                            alertify.success("Somethind went Wrong");
                            loadRequest(<?php echo $id; ?>);

                        }


                    }
                });



            }

            function cancleRequest(id) {
                alert(id);
                $.ajax({
                    type: "POST",
                    url: "php/test.php",
                    data: $.param({
                        operation: "reject",
                        id: id
                    }),
                    success: function(res) {
                        if (res === "Success") {
                            alertify.success("Rejected");
                            loadRequest(<?php echo $id; ?>);

                        }

                        if (res === "Faild") {
                            alertify.success("Somethind went Wrong");
                            loadRequest(<?php echo $id; ?>);

                        }


                    }
                });

            }
        </script>



</body>

</html>
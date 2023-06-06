<?php
include "php/header.php";
?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container" id="kt_content_container">
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">

                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="img/profile/<?php echo $data['profile_image']; ?>" alt="image" />

                        </div>
                    </div>

                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">

                                <div class="d-flex align-items-center mb-2">
                                    <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1"><?php echo $data['ngo_name']; ?></a>
                                </div>

                                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">

                                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        ID: <?php echo $data['ngo_id']; ?>
                                    </a>

                                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <?php echo $data['ngo_state'];
                                        echo " , ";
                                        echo  $data['ngo_city']; ?>
                                    </a>

                                    <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <?php echo $data['ngo_email']; ?>
                                    </a>

                                </div>
                            </div>
                        </div>


                        <div class="d-flex flex-wrap flex-stack">
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <div class="d-flex flex-wrap">


                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="<?php
                                                                                                                        $query = mysqli_query($conn, "SELECT SUM(Amount) as total  FROM `transaction` WHERE ngo_id='$id'");
                                                                                                                        $total = mysqli_fetch_assoc($query);
                                                                                                                        echo $total['total'];

                                                                                                                        ?>" data-kt-countup-prefix="₹">
                                                0</div>
                                        </div>
                                        <div class="fw-bold fs-6 text-gray-400">Earnings</div>
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="
                                            <?php
                                            $query1 = mysqli_query($conn, "SELECT COUNT(campain_id) as campain FROM `campain` WHERE ngo_id ='$id'");
                                            $total1 = mysqli_fetch_assoc($query1);
                                            echo $total1['campain'];

                                            ?>
                                            " data-kt-countup-prefix="<i class='fa-regular fa-users ' style='font-size:20px;'></i> &nbsp;  &nbsp;">0</div>
                                        </div>
                                        <div class="fw-bold fs-6 text-gray-400"> Campains</div>
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="
                                               <?php
                                                $query3 = mysqli_query($conn, "SELECT COUNT(event_id) as event FROM `events` WHERE  ngo_id ='$id'");
                                                $total3 = mysqli_fetch_assoc($query3);
                                                echo $total3['event'];

                                                ?>
                                            
                                            
                                            " data-kt-countup-prefix="<i class='fa-regular fa-calendar ' style='font-size:20px;'></i> &nbsp;  &nbsp;"> 0
                                            </div>
                                        </div>
                                        <div class="fw-bold fs-6 text-gray-400">Events</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="d-flex overflow-auto h-55px">
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">

                        <li class="nav-item" id="ngo">
                            <a class="nav-link text-active-primary me-6 active">
                                NGO
                            </a>
                        </li>

                        <li class="nav-item" id="setlor">
                            <a class="nav-link text-active-primary me-6">
                                Setlor
                            </a>
                        </li>

                        <li class="nav-item" id="address">
                            <a class="nav-link text-active-primary me-6">
                                Address
                            </a>
                        </li>

                        <li class="nav-item" id="password">
                            <a class="nav-link text-active-primary me-6">
                                Password
                            </a>
                        </li>

                        <li class="nav-item" id="bank_Account">
                            <a class="nav-link text-active-primary me-6">
                                Bank Account
                            </a>
                        </li>



                    </ul>
                </div>
            </div>
        </div>

        <div class="card mb-5 mb-xl-10" id="ngo_details">

            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">NGO Details</h3>
                </div>
                <a class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#edit_basic_detail" class="action-button">Edit Profile </a>
            </div>

            <div class="card-body p-9">

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Name</label>
                    <div class="col-lg-8">
                        <span class=" fs-6 text-dark fw-bolder"><?php echo $data['ngo_name']; ?></span>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Registration No </label>
                    <div class="col-lg-8 fv-row">
                        <span class="fw-bold fs-6 fw-bolder"><?php echo $data['ngo_registration_no']; ?></span>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Contact No
                    </label>
                    <div class="col-lg-8 d-flex align-items-center">
                        <span class=" fs-6 me-2 fw-bolder"><?php echo $data['ngo_contact_no']; ?></span>
                    </div>
                </div>


                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Email</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bolder fs-6 text-dark text-hover-primary"><?php echo $data['ngo_email']; ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Pan No
                    </label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark"><?php echo $data['ngo_pan_no']; ?></span>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Establish Date</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark"><?php echo $data['establish_date']; ?></span>
                    </div>
                </div>

                <div class="row mb-10">
                    <label class="col-lg-4 fw-bold text-muted">Working Sector</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6"><?php echo $data['working_sector']; ?></span>
                    </div>
                </div>

            </div>
        </div>

        <div class="card mb-5 mb-xl-10" id="setlor_details">

            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Setlor Details</h3>
                </div>
                <a class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#edit_setlor_detail" class="action-button">Edit Profile </a>
            </div>

            <div class="card-body p-9">

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">First Name</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark"><?php echo $data['setlor_first_name']; ?></span>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Last Name</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-dark"><?php echo $data['setlor_last_name']; ?></span>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Contact No
                    </label>
                    <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bolder fs-6 me-2"><?php echo $data['setlor_mobile_no']; ?></span>
                    </div>
                </div>


                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Email</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $data['setlor_email']; ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Gender</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $data['setlor_gender']; ?></a>
                    </div>
                </div>



            </div>
        </div>

        <div class="card mb-5 mb-xl-10" id="address_details">

            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Address Details</h3>
                </div>
                <a class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#edit_address_detail" class="action-button">Edit Profile </a>
            </div>

            <div class="card-body p-9">

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Address</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $data['ngo_address']; ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Country</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $data['ngo_country']; ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">State</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $data['ngo_state']; ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">City</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $data['ngo_city']; ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Pincode</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $data['ngo_pincode']; ?></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="card mb-5 mb-xl-10" id="change_password">

            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Change Password</h3>
                </div>
                <a class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#edit_change_password" class="action-button">Edit Profile </a>
            </div>

            <div class="card-body p-9">

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Password</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary">XXXXXXXXXXX</a>
                    </div>
                </div>



            </div>
        </div>

        <div class="card mb-5 mb-xl-10" id="Add_Account_container">

            <?php

            $query = mysqli_query($conn, "SELECT * FROM `bank_details` WHERE ngo_id ='$id'");
            $result = mysqli_fetch_assoc($query);


            ?>

            <div class="card-header cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">BANK Account</h3>
                </div>
                <a class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#Add_Account" class="action-button">Edit Profile </a>
            </div>

            <div class="card-body p-9">

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Account ID </label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $result['bank_id'] ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Account No </label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $result['bank_account_no']; ?></a>
                    </div>
                </div>


                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">IFSC CODE</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $result['bank_ifsc_code']; ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Bank Name</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $result['bank_name']; ?></a>
                    </div>
                </div>

                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">Account Hoder Name</label>
                    <div class="col-lg-8">
                        <a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?php echo $result['bank_account_holder']; ?></a>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
</div>

<!-- modal starts here -->

<div class="modal fade" tabindex="-1" id="edit_basic_detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Details</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <!-- modal starts here -->
            <div class="modal-body">
                <form id="edit_basic_form" method="POST" enctype="multipart/form-data">
                    <div class="from-container">

                        <div>
                            <label for="event-name">Name</label>
                            <div>
                                <input type="text" name="ngo_name" id="event-name" class="form-input" value="<?php echo $data['ngo_name']; ?>">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Registration No</label>
                            <div>
                                <input type="text" name="ngo_registration_no" class="form-input" value="<?php echo $data['ngo_registration_no']; ?>">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Cotact No</label>
                            <div>
                                <input type="text" name="ngo_contact_no" class="form-input" value="<?php echo $data['ngo_contact_no']; ?>">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Email</label>
                            <div>
                                <input type="text" name="ngo_email" class="form-input" value="<?php echo $data['ngo_email']; ?>" id="ngo_email">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Pan No</label>
                            <div>
                                <input type="text" name="ngo_pan_no" class="form-input" value="<?php echo $data['ngo_pan_no']; ?>">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Establish Date</label>
                            <div>
                                <input type="text" name="establish_date" class="form-input kt_datepicker_1" value="<?php echo $data['establish_date']; ?>">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Working Sector</label>
                            <div>
                                <select name="working_sector" id="" class="form-input">
                                    <option value="<?php echo $data['working_sector']; ?> " selected><?php echo $data['working_sector']; ?></option>
                                    <option value="Health Care">Health Care</option>
                                    <option value="rescue">rescue</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="m-t">
                        <label for="event-name">Logo</label>
                        <div>
                            <input type="file" name="profileImage" class="form-input" id="profileImage" value="<?php echo $data['profile_image']; ?>">
                        </div>
                    </div>

                    <input type="hidden" name="form" value="ngo_details">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">


                    <div class="modal-footer">
                        <button type="reset" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

</div>

<div class="modal fade" tabindex="-1" id="edit_setlor_detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Details</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <!-- modal starts here -->
            <div class="modal-body">
                <form action="" id="edit_setlor_form">
                    <div class="from-container">

                        <div>
                            <label for="event-name">First Name</label>
                            <div>
                                <input type="text" name="setlor_first_name" id="setlor_first_name" class="form-input" value="<?php echo $data['setlor_first_name']; ?>">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Last Name</label>
                            <div>
                                <input type="text" name="setlor_last_name" class="form-input" value="<?php echo $data['setlor_last_name']; ?>" id="setlor_first_name">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Cotact No</label>
                            <div>
                                <input type="text" name="setlor_mobile_no" class="form-input" value="<?php echo $data['setlor_mobile_no']; ?>" id="setlor_mobile_no">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Gender</label>
                            <div class="gender-container">

                                <?php if ($data['setlor_gender'] === "Male") { ?>
                                    <div>
                                        <input type="radio" name="setlor_gender" id="Male" value="Male" checked="checked"><label for="Male"> &nbsp; Male</label>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <input type="radio" name="setlor_gender" id="Male" value="Male"><label for="Male"> &nbsp; Male</label>
                                    </div>
                                <?php } ?>

                                <?php if ($data['setlor_gender'] === "Female") { ?>
                                    <div>
                                        <input type="radio" name="setlor_gender" id="Female" value="Female" checked="checked"><label for="Female"> &nbsp; Female</label>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <input type="radio" name="setlor_gender" id="Female" value="Female"><label for="Female"> &nbsp; Female</label>
                                    </div>
                                <?php } ?>

                                <?php if ($data['setlor_gender'] === "transgender") { ?>
                                    <div>
                                        <input type="radio" name="setlor_gender" id="transgender" value="transgender" checked="checked"><label for="transgender"> &nbsp;Transgender</label>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <input type="radio" name="setlor_gender" id="transgender" value="transgender"><label for="transgender"> &nbsp;Transgender</label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Email</label>
                            <div>
                                <input type="text" name="setlor_email" class="form-input" value="<?php echo $data['setlor_email']; ?>" id="setlor_email">
                            </div>
                        </div>
                        <input type="hidden" name="setlor_details" value="selected">
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

</div>

<div class="modal fade" tabindex="-1" id="edit_address_detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Address</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <!-- modal starts here -->
            <div class="modal-body">
                <form action="" id="edit_address_form">
                    <div class="from-container">

                        <div>
                            <label for="event-name">Address</label>
                            <div>
                                <input type="text" name="" id="event-name" class="form-input" value="<?php echo $data['setlor_first_name']; ?>">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Country</label>
                            <div>
                                <select name="" id="edit_country" class="form-input">
                                    <option value="">India</option>
                                    <option value="">America</option>
                                </select>
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">State</label>
                            <div>
                                <select name="" id="" class="form-input">
                                    <option value="">Maharashtra</option>
                                    <option value="">Uttar Pradesh</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="m-t">
                        <label for="event-name">City</label>
                        <div>
                            <select name="" id="" class="form-input">
                                <option value="">mumbai</option>
                                <option value="">pune</option>
                            </select>
                        </div>
                    </div>

                    <div class="m-t">
                        <label for="event-name">Pincode</label>
                        <div>
                            <input type="number" name="" class="form-input" value="">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn">Save changes</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

</div>

<div class="modal fade" tabindex="-1" id="edit_change_password">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <!-- modal starts here -->
            <div class="modal-body">
                <form action="" id="change_password_form">
                    <div class="from-container">

                        <div>
                            <label for="event-name">Old Password</label>
                            <div>
                                <input type="password" name="old_password" id="old_password" class="form-input">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">New Password</label>
                            <div>
                                <input type="password" name="new_password" class="form-input" id="new_password">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Confirm Password</label>
                            <div>
                                <input type="password" name="confirm_password" class="form-input" id="confirm_password">
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="change_password" value="change_password">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn">Save changes</button>
                    </div>

            </div>
            </form>
        </div>
    </div>

</div>


<div class="modal fade" tabindex="-1" id="Add_Account">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Account Details</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <!-- modal starts here -->
            <div class="modal-body">
                <form action="" id="add_account_form">
                    <div class="from-container">

                        <div>
                            <label for="event-name">Account No</label>
                            <div>
                                <input type="text" name="Account_no" class="form-input">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">IFSC Code</label>
                            <div>
                                <input type="text" name="ifsc_code" class="form-input" id="new_password">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Bank Name</label>
                            <div>
                                <input type="text" name="bank_name" class="form-input" id="confirm_password">
                            </div>
                        </div>

                        <div class="m-t">
                            <label for="event-name">Acount Holder</label>
                            <div>
                                <input type="text" name="acount_holder" class="form-input" id="confirm_password">
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="change_password" value="change_password">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="primary-btn">Save changes</button>
                    </div>

            </div>
            </form>
        </div>
    </div>

</div>
<script src="js/jquery.js"></script>
<script src="js/allFunctions.js"></script>
<script src="js/plugins.bundle.js"></script>
<script src="js/scripts.bundle.js"></script>
<script src="js/editProfile.js"></script>
<script src="js/alertify.min.js"></script>

<script>
    <?php
    function createAccount()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.razorpay.com/v1/beta/accounts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
           "name":"Gaurav Kumar",
           "email":"videshckkjnkjdscsd@example.com",
           "tnc_accepted":true,
           "account_details":{
              "business_name":"Acme Corporation",
              "business_type":"individual"
           },
           "bank_account":{
              "ifsc_code":"HDFC0CAGSBK",
              "beneficiary_name":"Gaurav Kumar",
              "account_type":"current",
              "account_number":304030434
           }
        }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Basic cnpwX3Rlc3Rfb3Z1NnFoWVdDMEJqZVI6ZHdab0tNenh3VGpVQ2lmV0c5RE9NaTZn'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
    ?>




</script>

</body>

?>

</html>
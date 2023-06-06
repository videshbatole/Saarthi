<?php
include "php/header.php";
?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="event-container">
        <div class="heding-and-button-container">
            <div class="headline">
                <h1 class="event-headline">
                    <i class="fa-regular fa-calendar event-icon"></i> Donation
                </h1>
            </div>
        </div>
        <!-- create button ends here  -->

        <div class="event-type">
            <h3 id="active" class="active-event">Cash</h3>
            <h3 id="upcomming">Others</h3>
            <div class="hr"></div>
        </div>



        <div class="search-button" id="search1">
            <button style="background-color:#009ba5; border:none; color:white ; padding:0.5rem 2rem;
            margin-right:2rem; border-radius:5px;
            " onclick="printAllContent('Form_Transaction1')"> <i class="fa-thin fa-print" style="color: white; font-weight: 600; "></i> &nbsp; Print</button>
            <input type="text" name="" class="event-search" id="event-search1">
            <i class="fa-regular fa-magnifying-glass"></i>
        </div>

        <div class="search-button" id="search2">
            <button style="background-color:#009ba5; border:none; color:white ; padding:0.5rem 2rem;
            margin-right:2rem; border-radius:5px;
            " onclick="printAllContent('Form_Transaction2')"> <i class="fa-thin fa-print" style="color: white; font-weight: 600; "></i> &nbsp; Print</button>
            <input type="text" name="" id="event-search2" class="event-search">
            <i class="fa-regular fa-magnifying-glass"></i>

        </div>


        <div class="table-container" id="list-of-active-events">
            <section id="Form_Transaction1">
                <table class="table table-rounded table-row-bordered border gy-7 gs-7 event-table">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th>Transaction Id</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Donor Name </th>
                            <th>Donor Email</th>
                            <th>Donor Mobile No</th>
                            <th>Campaign Id</th>

                        </tr>
                    </thead>
                    <tbody id="activeTable1">

                    </tbody>
                </table>
            </section>
        </div>


        <div class="table-container" id="list-of-upcomming-events">
            <section id="Form_Transaction2">

                <table class="table table-rounded table-row-bordered border gy-7 gs-7" class="event-table">
                    <thead>
                        <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                            <th>Donation Id</th>
                            <th>Donor Name</th>
                            <th>Donor Email</th>
                            <th>Donor Mobile</th>
                            <th>Date</th>
                            <th>Donated</th>
                            <th>Discription</th>

                        </tr>
                    </thead>
                    <tbody id="activeTable2">

                    </tbody>
                </table>
            </section>
        </div>


        <!-- create modal -->
        <div class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Campain</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>





                    <!--end::Wrapper-->
                </div>

            </div>

            <script src="js/jquery.js"></script>
            <script src="js/allFunctions.js"></script>
            <script src="js/plugins.bundle.js"></script>
            <script src="js/scripts.bundle.js"></script>
            <script src="js/editProfile.js"></script>
            <script src="js/alertify.min.js"></script>
            <script src="js/print.js"></script>
            <script>
                $(document).ready(function() {
                    loadDonation();


                });
            </script>

            </body>

            </html>
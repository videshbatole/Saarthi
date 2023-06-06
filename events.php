<?php
include "php/header.php";
?>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="event-container">
        <div class="heding-and-button-container">
            <div class="headline">
                <h1 class="event-headline">
                    <i class="fa-regular fa-calendar event-icon"></i> Events
                </h1>
            </div>
            <div class="create-button">
                <button class="primary-btn" type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_1"><i class="fa-regular fa-circle-plus"></i></i>
                    Create</button>
            </div>

        </div>

        <!-- create button ends here  -->
        <div class="event-containers" id="event_container">


        </div>


        <!-- create modal -->
        <div class="modal fade" tabindex="-1" id="kt_modal_1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Event</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <!-- modal starts here -->
                    <div class="modal-body">
                        <form action="" id="event_form" enctype="multipart/form-data">
                            <div class="from-container">
                                <label for="event-name">Event Title</label>
                                <div>
                                    <input type="text" name="event_title" id="event-title" class="form-input">
                                </div>

                                <label for="event-name">Starting Date</label>
                                <div>
                                    <input type="text" name="starting_date" id="kt_datepicker_1" class="form-input kt_datepicker_1">
                                </div>

                                <label for="event-name">Ending Date</label>
                                <div>
                                    <input type="text" name="ending_date" id="kt_datepicker_1" class="form-input kt_datepicker_1">
                                </div>

                                <label for="event-name">Time</label>
                                <div>
                                    <input type="text" name="event_time" class="form-input kt_datepicker_8" id="kt_datepicker_8" placeholder="Time">
                                </div>

                                <label for="event-name">Image</label>
                                <div>
                                    <input type="file" name="profileImage" id="profileImage" class="form-input">
                                </div>

                                <label for="event-name">Discription</label>
                                <div>
                                    <textarea name="description" class="form-input">

                                </textarea>
                                </div>

                                <input type="hidden" name="register_event" value="registe_event">

                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="loadEvents()">Close</button>
                        <button type="submit" class="primary-btn">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<script src="js/alertify.min.js"></script>
<script src="js/plugins.bundle.js"></script>
<script src="js/scripts.bundle.js"></script>
<script src="js/allFunctions.js"></script>
<script>
    loadEvents();
</script>


</body>

</html>
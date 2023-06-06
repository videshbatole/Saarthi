<?php
include "php/header.php";
?>

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="event-container">
        <div class="heding-and-button-container">
            <div class="headline">
                <h1 class="event-headline">
                    <i class="fa-regular fa-calendar event-icon"></i> Campain's
                </h1>
            </div>
            <div class="create-button">
                <button class="primary-btn" type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_1"><i class="fa-regular fa-circle-plus"></i></i>
                    Create</button>
            </div>

        </div>

        <!-- create button ends here  -->
        <div class="event-containers" id="campain_container">


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

                    <!-- modal starts here -->
                    <div class="modal-body">
                        <form action="" id="campainform" enctype="multipart/form-data">
                            <div class="from-container">
                                <label for="event-name">Campain Title</label>
                                <div>
                                    <input type="text" name="campain_title" id="event-title" class="form-input">
                                </div>

                                <label for="event-name">Beneficiary Name </label>
                                <div>
                                    <input type="text" name="campain_beneficiary_name" id="event-title" class="form-input">
                                </div>
                                <label for="event-name">Amount</label>
                                <div>
                                    <input type="number" name="campain_amount" id="event-title" class="form-input">
                                </div>

                                <label for="event-name">Starting Date</label>
                                <div>
                                    <input type="text" name="camapin_start_date" id="kt_datepicker_1" class="form-input kt_datepicker_1">
                                </div>

                                <label for="event-name">Ending Date</label>
                                <div>
                                    <input type="text" name="campain_end_date" id="kt_datepicker_1" class="form-input kt_datepicker_1">
                                </div>



                                <label for="event-name">Image</label>
                                <div>
                                    <input type="file" name="profileImage" id="profileImage" class="form-input">
                                </div>

                                <label for="event-name">Discription</label>
                                <div>
                                    <textarea name="campain_description" class="form-input">

                                </textarea>
                                </div>

                            </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="loadCampain()">Close</button>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/alertify.min.js"></script>
<script src="js/plugins.bundle.js"></script>
<script src="js/scripts.bundle.js"></script>
<script src="js/allFunctions.js"></script>
<script>
    $(document).ready(function() {

        loadCampain();

    });

    function curdOperation5(operation) {
        id = event.srcElement.id;

        if (operation === "delete") {

            Swal.fire({
                title: 'Are you sure want To Delete Campain?',
                text: "You won't  able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#009aa5",
                confirmButtonBorder: "none",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes",
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        type: "GET",
                        url: "php/campainOperation.php?operation=" + operation + "&id=" + id + "",
                        success: function(res) {

                            if (res.status === "success") {
                                Swal.fire(
                                    'Deleted!',
                                    'Your Campain has been deleted.',
                                    'success'
                                )
                                loadCampain();
                            }

                            if (res.status === "error") {
                                alertify.error(res.massage);
                            }
                        },
                    });


                }
            })



        } else {
            $.ajax({
                type: "GET",
                url: "php/campainOperation.php?operation=" + operation + "&id=" + id + "",
                success: function(res) {

                    if (res.status === "success") {
                        alertify.success(res.massage);
                        loadCampain();
                    }

                    if (res.status === "error") {
                        alertify.error(res.massage);
                    }
                },
            });
        }



    }
</script>



</body>

</html>


<!-- Swal.fire({
width: "400px",
text: "You want to cancle Request",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#009aa5",
confirmButtonBorder: "none",
cancelButtonColor: "#d33",
confirmButtonText: "Yes",
}).then((result) => {
if (result.isConfirmed) {
$.ajax({
type: "POST",
url: "php/server.php",
data: $.param({ deleteRequest: "yes", id: id }),
success: function (response) {
if (response.status === "success") {
Swal.fire("deleted!", "", "success");
}

if (response.status === "faild") {
Swal.fire("Something Went Wrong!", "", "error");
}

} -->


});


}

});
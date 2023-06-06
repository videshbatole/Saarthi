// DOM elements

const closeModalButton = document.querySelector(".close-modal");
const modalOverlay = document.querySelector("#modal-overlay");

$("#open-modal").click(function () {
  $("#modal-overlay").show();
  // openModal();
});

$("#close-modal").click(function () {
  // closeModal();
  $("#modal-overlay").hide();
});

// Attach event listeners

// openModalButtons.forEach((button) =>
//   button.addEventListener("click", openModal)
// );
// modalOverlay.addEventListener("click", closeModal);
// document.addEventListener("keydown", closeModal);
// const openModalButtons = document.getElementById("open-modal").click(function () {
//     alert();
// });

// Utility functions to open/close the modal
function openModal() {
  modalOverlay.classList.remove("hidden");
}

function closeModal() {
  modalOverlay.classList.add("hidden");
}
// to search in a div

$("[data-search]").on("keyup", function () {
  var searchVal = $(this).val();
  var filterItems = $("[data-filter-item]");

  if (searchVal != "") {
    filterItems.addClass("hidden");
    $(
      '[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]'
    ).removeClass("hidden");
  } else {
    filterItems.removeClass("hidden");
  }
});

// To show and hide request all details

function viewRequestMore(id) {

  $("#" + id + "").toggleClass("show-request");

}



function cancleRequest(id) {
  
  Swal.fire({
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
         
        }


      });
    

    }

    });
  
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#imagePreview").css(
        "background-image",
        "url(" + e.target.result + ")"
      );
      $("#imagePreview").hide();
      $("#imagePreview").fadeIn(650);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function () {
  readURL(this);
});


$("#FileInput").on("change", function (e) {
  var labelVal = $(".title").text();
  var oldfileName = $(this).val();
  fileName = e.target.value.split("\\").pop();

  if (oldfileName == fileName) {
    return false;
  }
  var extension = fileName.split(".").pop();

  if ($.inArray(extension, ["jpg", "jpeg", "png"]) >= 0) {
    $(".filelabel i").removeClass().addClass("fa fa-file-image-o");
    $(".filelabel i, .filelabel .title").css({ color: "#208440" });
    $(".filelabel").css({ border: " 2px solid #208440" });
  } else if (extension == "pdf") {
    $(".filelabel i").removeClass().addClass("fa fa-file-pdf-o");
    $(".filelabel i, .filelabel .title").css({ color: "red" });
    $(".filelabel").css({ border: " 2px solid red" });
  } else if (extension == "doc" || extension == "docx") {
    $(".filelabel i").removeClass().addClass("fa fa-file-word-o");
    $(".filelabel i, .filelabel .title").css({ color: "#2388df" });
    $(".filelabel").css({ border: " 2px solid #2388df" });
  } else {
    $(".filelabel i").removeClass().addClass("fa fa-file-o");
    $(".filelabel i, .filelabel .title").css({ color: "black" });
    $(".filelabel").css({ border: " 2px solid black" });
  }

  if (fileName) {
    if (fileName.length > 10) {
      $(".filelabel .title").text(fileName.slice(0, 4) + "..." + extension);
    } else {
      $(".filelabel .title").text(fileName);
    }
  } else {
    $(".filelabel .title").text(labelVal);
  }
});
$("#FileInput").on("change", function (e) {
  var labelVal = $(".title").text();
  var oldfileName = $(this).val();
  fileName = e.target.value.split("\\").pop();

  if (oldfileName == fileName) {
    return false;
  }
  var extension = fileName.split(".").pop();

  if ($.inArray(extension, ["jpg", "jpeg", "png"]) >= 0) {
    $(".filelabel i").removeClass().addClass("fa fa-file-image-o");
    $(".filelabel i, .filelabel .title").css({ color: "#208440" });
    $(".filelabel").css({ border: " 2px solid #208440" });
  } else if (extension == "pdf") {
    $(".filelabel i").removeClass().addClass("fa fa-file-pdf-o");
    $(".filelabel i, .filelabel .title").css({ color: "red" });
    $(".filelabel").css({ border: " 2px solid red" });
  } else if (extension == "doc" || extension == "docx") {
    $(".filelabel i").removeClass().addClass("fa fa-file-word-o");
    $(".filelabel i, .filelabel .title").css({ color: "#2388df" });
    $(".filelabel").css({ border: " 2px solid #2388df" });
  } else {
    $(".filelabel i").removeClass().addClass("fa fa-file-o");
    $(".filelabel i, .filelabel .title").css({ color: "black" });
    $(".filelabel").css({ border: " 2px solid black" });
  }

  if (fileName) {
    if (fileName.length > 10) {
      $(".filelabel .title").text(fileName.slice(0, 4) + "..." + extension);
    } else {
      $(".filelabel .title").text(fileName);
    }
  } else {
    $(".filelabel .title").text(labelVal);
  }
});

$("#request-form").submit(function (e) {
  e.preventDefault();
var form = $("#request-form")[0]; // You need to use standard javascript object here
var formData = new FormData(form);
  $.ajax({
    type: "POST",
    url: "php/server.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(response);
      
      if (response.status === "success") {
        window.location.replace("donation.php#close");
        Swal.fire({
          title: "Sucess",
          text: "Please Send Requsted items",
          icon: "success",
        });
       $("#request-form")[0].reset();
     }
     if (response.status === "error") {
       window.location.replace("donation.php#close");
       Swal.fire({
         title: "Faild",
         text: "Something Went wrong",
         icon: "error",
       });
     $("#request-form")[0].reset();
     }
      
    },
  });

  
});
  

$("#edit_user").submit(function (e) {
  e.preventDefault();
  var form = $("#edit_user")[0]; // You need to use standard javascript object here
  var formData = new FormData(form);
  $.ajax({
    type: "POST",
    url: "php/server.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(response);
      if (response.status === "success") {
        alertify.success("Successfully Updated");
      }
      if (response.status === "error") {
        alertify.error(response.massage);
      }
      
    }
  });
});

$("#register_event").submit(function (e) {
  e.preventDefault();
    var form = $("#register_event").serialize(); // You need to use standard javascript object here
  
  $.ajax({
    type: "POST",
    url: "php/register.php",
    data: form,
    success: function (response) {
      console.log(response);
       if (response.status === "success") {
         alertify.success("Registerd  Successfully");
        $("#register_event")[0].reset();
       }
       if (response.status === "error") {
         alertify.error(response.massage);
        $("#register_event")[0].reset();
       }
    },
  });
});
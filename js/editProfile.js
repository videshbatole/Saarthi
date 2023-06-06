$(document).ready(function () {
  $("#setlor").click(function () {
    $("#setlor a").addClass("active");
    $("#ngo a").removeClass("active");
    $("#address a").removeClass("active");
    $("#password a").removeClass("active");

    $("#setlor_details").show("fast");
    $("#ngo_details").hide();
    $("#address_details").hide();
    $("#change_password").hide();
    $("#Add_Account_container").hide();
  });
  // bank_Account
  $("#ngo").click(function () {
    $("#ngo a").addClass("active");
    $("#setlor a").removeClass("active");
    $("#address a").removeClass("active");
    $("#password a").removeClass("active");
    $("#bank_Account a").removeClass("active");

    $("#ngo_details").show("fast");
    $("#setlor_details").hide();
    $("#address_details").hide();
    $("#change_password").hide();
    $("#Add_Account_container").hide();
  });

  $("#address").click(function () {
    $("#address a").addClass("active");
    $("#setlor a").removeClass("active");
    $("#ngo a").removeClass("active");
    $("#password a").removeClass("active");
    $("#bank_Account a").removeClass("active");

    $("#address_details").show("fast");
    $("#setlor_details").hide();
    $("#ngo_details").hide();
    $("#change_password").hide();
    $("#Add_Account_container").hide();
  });

  $("#password").click(function () {
    $("#password a").addClass("active");
    $("#setlor a").removeClass("active");
    $("#ngo a").removeClass("active");
    $("#address a").removeClass("active");
    $("#bank_Account a").removeClass("active");

    $("#change_password").show("fast");
    $("#setlor_details").hide();
    $("#ngo_details").hide();
    $("#address_details").hide();
    $("#Add_Account_container").hide();
  });

  $("#bank_Account").click(function () {
    $("#bank_Account a").addClass("active");
    $("#setlor a").removeClass("active");
    $("#ngo a").removeClass("active");
    $("#address a").removeClass("active");
    $("#password a").removeClass("active");

    $("#Add_Account_container").show("fast");
    $("#setlor_details").hide();
    $("#ngo_details").hide();
    $("#address_details").hide();
    $("#change_password").hide();
  });

  //basic detail form submission
  $("#edit_basic_form").submit(function (e) {
    e.preventDefault();

    var email = emailValidation($("#ngo_email").val());

    if (email === true) {
      // insertData("php/editDetail.php", "#edit_basic_form");
      recordData("php/server.php", "#edit_basic_form");
    }
  });

  // setlor form submision
  $("#edit_setlor_form").submit(function (e) {
    e.preventDefault();

    recordData("php/server.php", "#edit_setlor_form");
    //  if (email === true) {
    //    insertData("php/editDetail.php", "#edit_basic_form");
    //  }
  });

  //Address detail Submission
  $("#edit_address_form").submit(function (e) {
    e.preventDefault();

    alert("cliked on address");
    //  recordData("php/editDetail.php", "#edit_setlor_form");
  });

  //change password
  $("#change_password_form").submit(function (e) {
    e.preventDefault();
    let password = passwordValidation(
      $("#new_password").val(),
      $("#confirm_password").val()
    );
    if (password === true) {
      recordData("php/server.php", "#change_password_form");
    }
  });
});


    $("#add_account_form").submit(function (e) {
      
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "php/server.php",
        data: $("#add_account_form").serialize(),
        success: function (res) {
          console.log(res);
        },
      });
    });
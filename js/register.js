let auth_token;
const letters = /^[A-Za-z]+$/;
const mobilePattern = /^[0]?[789]\d{9}$/;
const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const pincodePattern = /^(\d{4}|^\d{6})$/;
const passwordPattern =
  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
const panPattern = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
let sectorCheckBox = 0;
$(document).ready(function () {
  $(function () {
    $(".datepicker").datepicker({
      maxDate: new Date(),
      dateFormat: "dd-mm-yy",
    });
  });

  //---------------------------------------address--------------------------------
  $.ajax({
    type: "get",
    url: "https://www.universal-tutorial.com/api/getaccesstoken",
    success: function (data) {
      auth_token = data.auth_token;

      getCountry($("#country"));
      getCountry($("#ngoCountry"));
    },
    error: function (error) {
      getState(id, country);
    },
    headers: {
      Accept: "application/json",
      "api-token":
        "KeSqtUgo781tnMSKOHWDhwcAjsr4onNIpK7boxpF1lQBKiMhxiWVJICLY3zrvhF4zI0",
      "user-email": "kenine8235@yasiok.com",
    },
  });

  // get Country function
  function getCountry(id) {
    $.ajax({
      type: "get",
      url: "http://localhost/Saarthi.live/js/countrys.json",
      success: function (res) {
        res.forEach((element) => {
          id.append(
            '<option value="' +
              element.country_name +
              '" >' +
              element.country_name +
              " </option>"
          );
        });
      },
      error: function (error) {
        console.log(error);
      },
      headers: {
        Authorization: "Bearer " + auth_token,
        Accept: "application/json",
      },
    });
  }

  //get state function
  function getState(id, country) {
    id.empty();
    $.ajax({
      type: "get",
      url: "https://www.universal-tutorial.com/api/states/" + country,
      success: function (res) {
        // console.log(data);
        id.append("<option  selected disabled> State</option>");
        res.forEach((element) => {
          id.append(
            '<option value="' +
              element.state_name +
              '" >' +
              element.state_name +
              " </option>"
          );
        });

        // getCity(auth_token);
      },
      error: function (error) {
        console.log(error);
      },
      headers: {
        Authorization: "Bearer " + auth_token,
        Accept: "application/json",
      },
    });
  }

  function getCity(id, state) {
    id.empty();
    $.ajax({
      type: "get",
      url: " https://www.universal-tutorial.com/api/cities/" + state,
      success: function (res) {
        id.append("<option  selected disabled> City</option>");
        res.forEach((element) => {
          id.append(
            '<option value="' +
              element.city_name +
              '" >' +
              element.city_name +
              " </option>"
          );
        });
      },
      error: function (error) {
        console.log(error);
      },
      headers: {
        Authorization: "Bearer " + auth_token,
        Accept: "application/json",
      },
    });
  }
  $("#country").change(function () {
    getState($("#state"), $("#country").val());
  });

  $("#ngoCountry").change(function () {
    getState($("#ngoState"), $("#ngoCountry").val());
  });

  $("#country").change(function () {
    getState($("#state"), $("#country").val());
  });
  $("#ngoState").change(function () {
    getCity($("#ngoCity"), $("#ngoState").val());
  });

  $("#state").change(function () {
    getCity($("#city"), $("#state").val());
  });
  //---------------------------- --------------User Registration ------------------------------------------

  //first  button click validation
  $("#first-next").click(function () {
    let firstName = nameValidation($("#firstName").val(), "First ");
    let lastName = nameValidation($("#lastName").val(), "Last ");
    let dateOfBirth = dateValidate($("#dateOfBirth").val(), "Birth ");
    let gender = genderValidation("gender", "User");
    let mobileNo = mobileValidation($("#mobile").val());
    let email = emailValidation($("#email").val());

    if (
      firstName === true &&
      lastName === true &&
      dateOfBirth === true &&
      gender === true &&
      mobileNo === true &&
      email === true
    ) {
      $("#step1").css("display", "none");
      $("#step2").css("display", "block");
    }
  });
  // first prev clicked
  $("#prev-1").click(function () {
    $("#step2").css("display", "none");
    $("#step1").css("display", "block");
  });

  // first prev clicked
  $("#prev-2").click(function () {
    $("#step3").css("display", "none");
    $("#step2").css("display", "block");
  });
  //second click
  $("#next-2").click(function () {
    let address = addressValidation($("#address").val());
    let country = addressSelect("#country", "country");
    let state = addressSelect("#state", "state");
    let city = addressSelect("#city", "city");
    let pincode = picodeValidation($("#pincode").val());
    if (
      address === true &&
      country === true &&
      state === true &&
      city === true &&
      pincode === true
    ) {
      $("#step2").css("display", "none");
      $("#step3").css("display", "block");
    }
  });

  //third click

  $("#individual").submit(function (evt) {
    evt.preventDefault();
    let passwor = passwordValidation(
      $("#password").val(),
      $("#confirmPassword").val()
    );
    if (passwor === true) {
         ajaxOperation(
           "POST",
           "http://localhost/Saarthi.live/php/userRegister.php",
           "individual","#step1","#step3"
         );
    }
  });

  $("#nfirst-next").click(function () {
    let ngoName = nameValidation($("#ngoName").val(), "NGO ");
    let registrationNo = isEmpty(
      $("#ngoRegistrationNo").val(),
      "Registration No"
    );
    let pan = panValidation($("#panNo").val());
    let establishmentDate = dateValidate(
      $("#establishDate").val(),
      " Establishment "
    );
    let mobileNo = mobileValidation($("#ngoMobileNo").val());
    let email = emailValidation($("#ngoEmail").val());

    if (
      ngoName === true &&
      registrationNo === true &&
      pan === true &&
      establishmentDate === true &&
      mobileNo === true &&
      email === true
    ) {
      $("#nstep1").css("display", "none");
      $("#nstep2").css("display", "block");
    }
  });

  $("#nprev-2").click(function () {
    $("#nstep3").css("display", "none");
    $("#nstep2").css("display", "block");
  });

  $("#nnext-2").click(function () {
    let setlorFirstName = nameValidation(
      $("#setlorFirstName").val(),
      "Setlor "
    );
    let setlorLastName = nameValidation($("#setlorLastName").val(), "Setlor ");
    let setlorGender = genderValidation("setlorGender", "Setlor");
    let setlorMobileNo = mobileValidation($("#setlorMobileNo").val());
    let setlorEmail = emailValidation($("#setlorEmail").val());

    if (
      setlorFirstName === true &&
      setlorLastName === true &&
      setlorGender === true &&
      setlorMobileNo === true &&
      setlorEmail === true
    ) {
      $("#nstep2").css("display", "none");
      $("#nstep3").css("display", "block");
    }
  });

  //ngo address validation
  $("#nnext-3").click(function () {
    let address = addressValidation($("#ngoAddress").val());
    let country = addressSelect("#ngoCountry", "Country");
    let state = addressSelect("#ngoState", "State");
    let city = addressSelect("#ngoCity", "city");
    let pincode = picodeValidation($("#ngoPincode").val());

    if (
      address === true &&
      country === true &&
      state === true &&
      city === true &&
      pincode === true
    ) {
      step("#nstep4", "#nstep3");
    }
  });

  checkBoxValidation(4, ".workingSector");

  $("#nnext-4").click(function () {
    if (sectorCheckBox == 0) {
      alertify.error("Pls select sector");
    } else {
      step("#nstep5", "#nstep4");
    }
  });

  $("#nprev-4").click(function () {
    step("#nstep4", "#nstep5");
  });

  $("#nprev-1").click(function () {
    step("#nstep1", "#nstep2");
  });

  $("#nprev-3").click(function () {
    step("#nstep3", "#nstep4");
  });

  $("#food").click(function () {
    $("#foodLable").toggleClass("sector-selected");
  });

  $("#rescue").click(function () {
    $("#rescueLable").toggleClass("sector-selected");
  });

  $("#health").click(function () {
    $("#healthLable").toggleClass("sector-selected");
  });

  $("#eduction").click(function () {
    $("#educationLable").toggleClass("sector-selected");
  });

  $("#ngo").submit(function (evt) {
    evt.preventDefault();
    let password = passwordValidation(
      $("#ngoPassword").val(),
      $("#ngoConfirmPassword").val()
    );
    if (password === true) {
      ajaxOperation(
        "POST",
        "http://localhost/Saarthi.live/php/insert.php",
        "ngo","#nstep1", "#nstep5"
      );

      //  var formData = {
      //    name: $("#name").val(),
      //    email: $("#email").val(),
      //    superheroAlias: $("#superheroAlias").val(),
      //  };
    }
  });
});
//All  Validation Functions are start here

//Name Validation Starts here
function nameValidation(data, msg) {
  if (data === "") {
    alertify.error(msg + "Name Is Required !");
    return false;
  } else if (!data.match(letters)) {
    alertify.error("Pls Enter Valid " + msg + " Name !");
    return false;
  } else {
    return true;
  }
}

//date of birth validation starts here
function dateValidate(date, msg) {
  if (date === "") {
    alertify.error("Date Of " + msg + "  Is Required !");
    return false;
  } else {
    return true;
  }
}

//gender validations
function genderValidation(name, msg) {
  if ($("input[name=" + name + "]:checked").length > 0) {
    return true;
  } else {
    alertify.error("Pls Select " + msg + " Gender");
    return false;
  }
}

//mobile No validation
function mobileValidation(mobileNo) {
  if (mobileNo === "") {
    alertify.error("Mobile No Is Required !");
    return false;
  } else if (!mobileNo.match(mobilePattern)) {
    alertify.error("Pls Enter Valid Mobile No !");
    return false;
  } else {
    return true;
  }
}

//email id validation
function emailValidation(email) {
  if (email === "") {
    alertify.error("Email Is Required !");
    return false;
  } else if (!email.match(emailPattern)) {
    alertify.error("Pls Enter Valid Email Id !");
    return false;
  } else {
    return true;
  }
}

//Address Validation
function addressValidation(address) {
  if (address === "") {
    alertify.error("Address  is Required!!!");
    return false;
  } else {
    return true;
  }
}

///country state city validation
function addressSelect(name, msg) {
  if ($("" + name + " option:selected").val() === "") {
    alertify.error("Pls Select " + msg + " !");
    return false;
  } else {
    return true;
  }
}

//pincode validation
function picodeValidation(id) {
  if (id === "") {
    alertify.error("Pls Enter pincode !");
    return false;
  } else if (!id.match(pincodePattern)) {
    alertify.error("Pls Enter Valid Pincode!");
    return false;
  } else {
    return true;
  }
}

//Password validation
function passwordValidation(password, cpassword) {
  if (password === "") {
    alertify.error("Password Is Required !!!");
    return false;
  } else if (!password.match(passwordPattern)) {
    alertify.error("Password Should Meet Requirement !!!");
    return false;
  } else {
    if (password === cpassword) {
      return true;
    } else {
      alertify.error("Password and Confirm Password Should Be Same");
      return false;
    }
  }
}

// is empty Value Validation
function isEmpty(data, msg) {
  if (data === "") {
    alertify.error(msg + " Is Required !");
    return false;
  } else {
    return true;
  }
}
//Pan No Validation
function panValidation(pan) {
  if (pan === "") {
    alertify.error("PAN No Is Required");
    return false;
  } else if (!pan.toLocaleUpperCase().match(panPattern)) {
    alertify.error("Pls Enter Valid PAN No");
    return false;
  } else {
    return true;
  }
}
function step(display, hide) {
  $("" + hide + "").css("display", "none");
  $("" + display + "").css("display", "block");
}
//checkBox validation
function checkBoxValidation(count, className) {
  $("" + className + "[type='checkbox']").click(function () {
    if ($(this).is(":checked")) {
      if (sectorCheckBox <= count) {
        sectorCheckBox++;
      }
    } else if ($(this).is(":not(:checked)")) {
      if (sectorCheckBox >= 0) {
        sectorCheckBox--;
      }
    }
  });
}

function ajaxOperation(type, url, formId ,display ,hide) {
  // let url = "http://localhost/Saarthi.live/php/insert.php";
  // let type = "GET";
  var data = $("#" + formId + "").serialize();

  $.ajax({
    type: "" + type + "",
    url: "" + url + "",
    data: data,
    success: function (result) {
      if (result === "Registered") {
        alertify.success("Successfully Registered");
       document.getElementById(""+formId+"").reset();
        step(display, hide);
      } else {
        alertify.error(result);
      }
    },
  });
}

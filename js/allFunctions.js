//email id validation
function emailValidation(email) {
  //regex pattern for email validation
  const emailPattern1 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (email === "") {
    alertify.error("Email Is Required !");
    return false;
  } else if (!email.match(emailPattern1)) {
    alertify.error("Pls Enter Valid Email Id !");
    return false;
  } else {
    return true;
  }
}

//ajax funtion to  isert data into  database
function recordData(url, formId) {
  var form = $("" + formId + "")[0];
  var formData = new FormData(form);

  $.ajax({
    type: "POST",
    url: "" + url + "",
    data: formData,
    contentType: false,
    processData: false,
    success: function (res) {
      console.log(res);
      if (res.status === "success") {
        alertify.success(res.massage);
      }

      if (res.status === "error") {
        alertify.error(res.massage);
      }
    },
  });
}

//Password validation
function passwordValidation(password, cpassword) {
  const passwordPattern =
    /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
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

//check id  of  clicked  event
function checkClikedEvent() {
  clickedButton = event.srcElement.id;
  $("#div_" + clickedButton).toggle("blink");
}

function curdOperation(operation) {
  id = event.srcElement.id;

  $.ajax({
    type: "GET",
    url: "php/server.php?operation=" + operation + "&id=" + id + "",
    success: function (res) {
      if (res.status === "success") {
        alertify.success(res.massage);
        loadEvents();
      }

      if (res.status === "error") {
        alertify.error(res.massage);
      }
    },
  });
}

function printContent(el) {
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}

function loadEvents() {
  container = document.getElementById("event_container");

  $.ajax({
    type: "GET",
    url: "php/loadEvent.php",
    success: function (res) {
      container.innerHTML = res;
    },
  });
}

function loadDonation() {
  container = document.getElementById("activeTable2");

  $.ajax({
    type: "GET",
    url: "php/loadDonation.php",
    success: function (res) {
      container.innerHTML = res;
      loadDonation2();
    },
  });
}

function loadDonation2() {
  container = document.getElementById("activeTable1");

  $.ajax({
    type: "GET",
    url: "php/otherDonation.php",
    success: function (res) {
      container.innerHTML = res;
    },
  });
}

function loadCampain() {
  container = document.getElementById("campain_container");

  $.ajax({
    type: "GET",
    url: "php/loadCampain.php",
    success: function (res) {
      container.innerHTML = res;
    },
  });
}

$("#event_form").submit(function (e) {
  e.preventDefault();
  recordData("php/server.php", "#event_form");
});

$("#campainform").submit(function (e) {
  e.preventDefault();

  recordData("php/server.php", "#campainform");
});

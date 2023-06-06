
const individual = document.getElementById("user1");
const ngo = document.getElementById("user2");

const form1 = document.getElementById("individual_register");
const form2 = document.getElementById("ngo_regiser");

individual.addEventListener("click", function () {
  individual.classList.add("selected");
  ngo.classList.remove("selected");
  form1.style.display = "block";
  form2.style.display = "none";
});

ngo.addEventListener("click", function () {
  ngo.classList.add("selected");
  individual.classList.remove("selected");
  form1.style.display = "none";
  form2.style.display = "block";
});

//indimidual login
$(document).ready(function () {
  $("#individual").submit(function (evt) {
    evt.preventDefault();
    let userEmail = emailValidation2($("#userEmail").val());
    let userPassword = isEmpty($("#userPassword").val(), "Pasword");

    if (userEmail === true && userPassword === true) {
      ajaxOperation(
        "post",
        "http://localhost/saarthi.live/php/login.php",
        "individual"
      );
    }
  });

    $("#ngo").submit(function (evt) {
      evt.preventDefault();
      let userEmail = emailValidation($("#ngoEmail").val());
      let userPassword = isEmpty($("#ngoPassword").val(), "Pasword");

      if (userEmail === true && userPassword === true) {
        ajaxOperation(
          "post",
          "http://localhost/saarthi.live/php/login.php",
          "ngo"
        );
      }
    });
  
});

function isEmpty(data, msg) {
  if (data === "") {
    alertify.error(msg + " Is Required !");
    return false;
  } else {
    return true;
  }
}
//email id validation
function emailValidation2(email) {
  const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
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

function ajaxOperation(type, url, formId) {
 
  var data = $("#" + formId + "").serialize();

  $.ajax({
    type: "" + type + "",
    url: "" + url + "",
    data: data,
    success: function (result) {
      // alertify.success(data);
      document.getElementById("" + formId + "").reset();

      if (result === "user") {
        window.location.replace("user.php");
      } else if (result === "ngo") {
         window.location.replace("ngo.php");
        
      } else if (result === "invalid") {
        alertify.error("Invalid Username and Password");
      }
    },
  });
}


const individual = document.getElementById("login_user1");
const ngo = document.getElementById("login_user2");

const form1 = document.getElementById("login_individual");
const form2 = document.getElementById("ngo_login");

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

$("#login_individual").submit(function (e) {
    e.preventDefault();

    let email = emailValidation($("#userEmail").val());
    let password = isEmpty($("#userPassword").val(), "Password");

    if (email === true && password === true) {
        $.ajax({
            type: "POST",
            url: "php/server.php",
            data: $("#login_individual").serialize(),
            success: function (response) {
                  if (response.user === "INVALID") {
                    alertify.error("Invalid email and password");
                  }
                  if (response.user === "VALID") {
                    window.location.replace("userDashboard.php");
                  }
            }
              
        });
    }

    
   
});

$("#ngo_login").submit(function (e) {
     e.preventDefault();
  
    let email = emailValidation($("#ngoEmail").val());
    let password = isEmpty($("#ngoPassword").val(), "Password");

    if (email === true && password === true) {
     
        $.ajax({
            type: "POST",
            url: "php/server.php",
            data: $("#ngo_login").serialize(),
            success: function (response) {
                if (response.user === "INVALID") {
                    alertify.error("Invalid email and password");
                }
                    if (response.user === "VALID") {
                      window.location.replace("ngoDashboard.php");
                    }
            }

        });
    }
    
});

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

// is empty Value Validation
function isEmpty(data, msg) {
  if (data === "") {
    alertify.error(msg + " Is Required !");
    return false;
  } else {
    return true;
  }
}
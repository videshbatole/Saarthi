let auth_token;

$(document).ready(function () {
  $.ajax({
    type: "get",
    url: "https://www.universal-tutorial.com/api/getaccesstoken",
    success: function (data) {
      auth_token = data.auth_token;

      getCountry($("#country"));
      // getCountry($("#ngoCountry"));
    },
    error: function (error) {
      // getState(id, country);
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

  $("#state").change(function () {
    getCity($("#city"), $("#state").val());
  });

  $("#sector").change(function (e) {
    let sector = $("#sector").val();
    $.ajax({
      type: "POST",
      url: "php/server.php",
      data: $.param({ getNGO: "yess", sector: sector }),
      success: function (res) {
        let id = $("#ngo_list");
        id.empty();
        if (res.count > 0) {
          id.empty();
          id.append("<option  selected disabled> NGO</option>");
          for (let i = 1; i <= res.count; i++) {
            id.append(
              "<option  value=" + res.ngo_id + ">" + res.ngo_name + " </option>"
            );
          }
        } else {
          id.append("<option  selected disabled>No NGO Found!!</option>");
        }
        // console.log(res.length);
        // let id = $("#ngo_list");
        // id.empty();
        // id.append("<option  selected disabled> NGO</option>");
        // // res.forEach((element) => {
        // //   id.append(
        // //     '<option value="' +
        // //       element.ngo_id +
        // //       '" >' +
        // //       element.ngo_name +
        // //       " </option>"
        // //   );
        // });
      },
    });
  });
});

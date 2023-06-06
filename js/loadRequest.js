function loadRequest(id) {
  $.ajax({
    type: "POST",
    url: "php/server.php",
    data: jQuery.param({ loadRequest: "yes", userId: id }),
    success: function (response) {
      var table = document.getElementById("request_div_container");
      for (let index = 0; index < response.length; index++) {

                   var row = `
              <div id="request-container" data-filter-item data-filter-name="${response[index].request_id}">
                            <div class="requests">

                                <div class="user-img">
                                    <img src="img/profile/${response[index].profile_image}" alt="">

                                </div>

                                <div class="user-details">
                                    <h1 class="user-name-heading">Request Id</h1>
                                    <h1 class="request-user-name">${response[index].request_id}</h1>
                                </div>

                                <div class="user-details">
                                    <h1 class="user-name-heading">NGO Name</h1>
                                    <h1 class="request-user-name">${response[index].ngo_name}</h1>
                                </div>

                                <div class="user-details">
                                    <h1 class="user-name-heading">beneficiary </h1>
                                    <h1 class="request-user-name">${response[index].beneficiary_first_name}  ${response[index].beneficiary_last_name}</h1>
                                </div>

                                <div class="user-details">
                                    <h1 class="user-name-heading">Status</h1>
                                    <h1 class="request-user-name">${response[index].status}</h1>
                                </div>


                                <div class="user-details">
                                    <h1 class="user-name-heading">Date</h1>
                                    <h1 class="request-user-name">${response[index].date}</h1>
                                </div>


                                <div class="request-action-btn">

                                    <button class="action-btn btn-view" id="view-request" onclick="viewRequestMore('req_${response[index].request_id}')"><i class="fa-regular fa-eye"></i></button>
                                    <button class="action-btn btn-accept" onclick="acceptRequest('req_${response[index].request_id}')"><i class="fa-duotone fa-check"></i></button>
                                    <button class="action-btn btn-cancle" onclick="cancleRequest('${response[index].request_id}')"><i class="fa-regular fa-xmark"></i></i></button>

                                </div>
                            </div>
                            <div class="hide-request ">
                                <div class="request-full-details  " id="req_${response[index].request_id}">
                                    <div class="request-profile-section1 ">
                                        <div>
                                            <div class="user-image-and-name-container  ">
                                                <img src="img/requests/${response[index].beneficiary_image}" alt="">
                                            </div>
                                            <div>
                                                <h1 class="request-name-heading">${response[index].beneficiary_first_name}    ${response[index].beneficiary_last_name}</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reques-full-detail-section2 ">
                                        <h5 class="user-detail-hr">Beneficiary Details</h5>
                                        <div class="request-user-full-details">
                                            <div>
                                                <h1>Email</h1>
                                                <h5>${response[index].beneficiary_email}</h5>
                                            </div>

                                            <div>
                                                <h1>Mobile No</h1>
                                                <h5>${response[index].beneficiary_mobile}</h5>
                                            </div>

                                            <div>
                                                <h1>Country</h1>
                                                <h5>${response[index].beneficiary_country}</h5>
                                            </div>

                                            <div>
                                                <h1>State</h1>
                                                <h5>${response[index].beneficiary_state}</h5>
                                            </div>

                                            <div>
                                                <h1>City</h1>
                                                <h5>${response[index].beneficiary_city}</h5>
                                            </div>

                                        </div>
                                        <hr class="user-hr">

                                        <h5 class="user-detail-hr">NGO Details</h5>
                                        <div class="request-user-full-details">
                                            <div>
                                                <h1>Email</h1>
                                                <h5>${response[index].ngo_email}</h5>
                                            </div>

                                            <div>
                                                <h1>Mobile No</h1>
                                                <h5>${response[index].ngo_contact_no}</h5>
                                            </div>

                                            <div>
                                                <h1>Country</h1>
                                                <h5>${response[index].ngo_country}</h5>
                                            </div>

                                            <div>
                                                <h1>State</h1>
                                                <h5>${response[index].ngo_state}</h5>
                                            </div>

                                            <div>
                                                <h1>City</h1>
                                                <h5>${response[index].ngo_city}</h5>
                                            </div>

                                        </div>
                                        <hr class="user-hr">

                                        <h5 class="user-detail-hr">Request Details</h5>
                                        <div class="request-user-full-details-last">
                                            <p>${response[index].Issue}</p>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
            `;
                   table.innerHTML += row;
      }
    },
  });
}

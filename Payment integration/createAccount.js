
function createAccount() {
    var settings = {
        url: "https://api.razorpay.com/v1/beta/accounts",
        method: "POST",
        timeout: 0,
        headers: {
            "Content-Type": "application/json",
            Authorization:
                "Basic cnpwX3Rlc3Rfb3Z1NnFoWVdDMEJqZVI6ZHdab0tNenh3VGpVQ2lmV0c5RE9NaTZn",
        },
        data: JSON.stringify({
            name: "Gaurav Kumar",
            email: "gaurav.kumar@example.com",
            tnc_accepted: true,
            account_details: {
                business_name: "Acme Corporation",
                business_type: "individual",
            },
            bank_account: {
                ifsc_code: "HDFC0CAGSBK",
                beneficiary_name: "Gaurav Kumar",
                account_type: "current",
                account_number: 304030434,
            },
        }),
    };
}
$.ajax(settings).done(function (response) {
  console.log(response);
});

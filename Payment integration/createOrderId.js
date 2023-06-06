
function createOrderId() {
    
    var settings = {
      url: "https://api.razorpay.com/v1/orders",
      method: "POST",
      timeout: 0,
      headers: {
        "content-type": "application/json",
        Authorization:
          "Basic cnpwX3Rlc3RfendVMEtleFkwMkJ4M1I6RDlWbElFOVBjWDJVcmtvWUtndjNRQ3Ew",
      },
      data: JSON.stringify({
        amount: 1000,
        currency: "INR",
        transfers: [
          {
            account: "acc_KGYmPSnx6WPJTW",
            amount: 1000,
            currency: "INR",
            notes: {
              branch: "HDFC0CAGSBK",
              name: "Acme Corporation",
            },
            linked_account_notes: ["branch"],
            on_hold: 1,
            on_hold_until: 1671222870,
          },
        ],
      }),
    };

    $.ajax(settings).done(function (response) {
      console.log(response);
    });
}

createOrderId();
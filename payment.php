<?php
include "php/connection.php";
include "php/allFunction.php";
$id = UserVerify($conn);

$query = "SELECT * FROM `campain` , ngo WHERE campain.ngo_id=ngo.ngo_id AND campain_id  ='" . $_GET['id'] . "'";
$run = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($run);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userDashboard.css">
    <title>Saarthi | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="css/all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/userCampain.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body>
    <main>
        <div class="container-payment">



            <div class="payment-container">

                <div class="payment-illustration">
                    <img src="img/payment.png" alt="" class="payment-image">

                </div>

                <div class="payment-input-container">

                    <h1>You are help can make <br> someone smile</h1>

                    <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['USER_ID']; ?>">

                    <div class="payment-amount-container">
                        <label for="email" class="input-lable">Camapign ID:</label>
                        <input type="text" id="campain_id" name="campain_id" class="input-email" value="<?php echo $data['campain_id']; ?>" disabled>
                    </div>
                    <input type="hidden" name="ngo_id" id="ngo_id" value="<?php echo $data['ngo_id']; ?>">
                    <div class="payment-amount-container">
                        <label for="email" class="input-lable">NGO Name:</label>
                        <input type="text" id="beneficiary_name" name="beneficiary_name" class="input-email" value="<?php echo $data['ngo_name']; ?>" disabled>
                    </div>
                    <div class="payment-amount-container">
                        <label for="email" class="input-lable">Beneficiary Name:</label>
                        <input type="text" id="beneficiary_name" name="beneficiary_name" class="input-email" value="<?php echo $data['campain_beneficiary_name']; ?>" disabled>
                    </div>

                    <div class="payment-amount-container">
                        <label for="email" class="input-lable">Amount:</label>
                        <input type="text" id="amount" name="user_email" class="input-email">
                    </div>


                    <!-- <div class="payment-amount-container">
                        <label for="bio">Description:</label>
                        <textarea id="bio" name="user_bio" class="input-textarea"></textarea>
                    </div> -->

                    <div class="payment-amount-container payment-btn-container">
                        <button type="button" class="donate-btn" id="rzp-button1">Donate</button>
                        <button class="donate-cancel-btn">Cancle</button>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/dashboard.js"></script>

    <script>
        let orderId;

        $("#rzp-button1").click(function() {

            amount = $("#amount").val();
            getOrderId(amount);
        })

        function getOrderId(amount) {

            <?php
            $run = mysqli_query($conn, "SELECT * FROM `bank_details` WHERE ngo_id='" . $data['ngo_id'] . "'");

            $result = mysqli_fetch_assoc($run);


            ?>
            $.ajax({
                type: "post",
                url: "php/createorder.php",
                data: jQuery.param({
                    amount: amount,
                    account: "acc_KGYmPSnx6WPJTW",
                    ifsc: "HDFC0CAGSBK"
                }),
                success: function(res) {
                    console.log(res);
                    const myArr = JSON.parse(res);
                    console.log(myArr);
                    orderId = myArr.id;
                    console.log(orderId);
                    campain_id = $("#campain_id").val();
                    amount = $("#amount").val();
                    user_id = $("#userid").val();
                    ngo_id = $("#ngo_id").val();
                    activePayment(orderId, amount, campain_id, user_id, ngo_id);
                }
            });
        }





        function activePayment(orderId, amount, campain_id, user_id, ngo_id) {
            <?php
            $query = "SELECT * FROM `user`  WHERE userId='$id'";
            $run = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($run);

            ?>



            var options = {
                "key": "rzp_test_zwU0KexY02Bx3R", // Enter the Key ID generated from the Dashboard
                "amount": (amount * 100), // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "INR",
                "name": "Acme Corp",
                "description": "Test Transaction",
                "image": "https://example.com/your_logo",
                "order_id": orderId, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "callback_url": "php/success.php?user_id=" + user_id + "&campain_id=" + campain_id + "&amount=" + amount + "&ngo_id=" + ngo_id + "",
                "prefill": {
                    "name": "<?php echo $data['firstName'] . " " . $data['lastName'] ?>",
                    "email": "<?php echo $data['email']; ?>",
                    "contact": "<?php echo $data['mobileNo']; ?>"
                },
                "notes": {
                    "address": "Razorpay Corporate Office"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open(event);
            event.preventDefault();

        }
    </script>
</body>

</html>
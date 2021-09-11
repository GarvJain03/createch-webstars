<script>
const loginForm = document.getElementById('loginForm');
const rzpBtn = document.getElementById('rzp-button');
const companyName = document.getElementById('company_name').value;
const productDesc = document.getElementById('product_desc').value;
const amount = document.getElementById('amount').value;
//razorpay payment 
rzpBtn.onclick = function (e) {
    rzpBtn.setAttribute("disable", true);
    var checkBoxStatus = $('#termsCheckbox').prop('checked');
    if (checkBoxStatus == true) {
        jQuery.ajax({
            type: 'post',
            url: 'assets/includes/process_payment',
            data: 'payment_id=&amount=' + amount + '&status=incomplete&user_id=<?php echo $_SESSION["user_id"]; ?>&category='+companyName,
            success: function (result) {
                if (result.trim() == 'incomplete_success') {
                    var options = {
                        "key": "rzp_test_ITyKYENzz5LHR2",
                        "amount": amount,
                        "currency": "INR",
                        "name": companyName,
                        "description": productDesc,
                        "image": "https://jstseguru.in/createch-webstars/assets/images/logo.png",
                        "handler": function (response) {
                            console.log(response);
                            jQuery.ajax({
                                type: 'post',
                                url: 'assets/includes/process_payment',
                                data: 'payment_id=' + response.razorpay_payment_id + '&amount=' + amount + '&status=complete&user_id=<?php echo $_SESSION["user_id"]; ?>&category='+companyName,
                                success: function (result) {
                                    if (result.trim() == 'complete_success') {
                                        alert('Your payment was successful, please visit your dashboard to view your ticket!');
                                        window.location.href = '../dashboard/payment-history';
                                    } else if (result.trim() == 'complete_failed') {
                                        alert('Payment has been done but there was an error while recording it. Please contact the support team!');
                                    } else {
                                       alert('An error occurred, please try again!');
                                    }
                                }
                            });
                        }
                    };
                    var razorpayModal = new Razorpay(options);
                    razorpayModal.open();
                    e.preventDefault();
                } else {
                    alert(result);
                }
            }
        });
    } else {
        alert('Please accept the terms and conditions to proceed with the payment!')
    }
}


//check user session
jQuery.ajax({
    url: 'assets/includes/check_session',
    success: function(result) {
        if(result == 'not_logged_in') {
            //modal configuration
            $('#loginModal').modal({
                backdrop: 'static',
                keyboard: false
            });
        } else {
            $('#loginModal').modal('hide');
        }
    }
});


//loginform
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();
    jQuery.ajax({
        url: 'assets/includes/user_login',
        data: 'email='+email+'&password='+password,
        type: 'post',
        success: function(result) {
            if(result == 'logged_in') {
                location.reload();
            } else if(result == 'invalid_cred') {
                alert('Please enter valid credentials!');
            } else if(result == 'error') {
                alert('An error occurred while logging the user in, please try again!');
            } else {
                alert('An error occurred, please try again!');
            }
        }
    });
});
</script>
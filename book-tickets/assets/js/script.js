document.getElementById('rzp-button').onclick = function (e) {
    var checkBoxStatus = $('#termsCheckbox').prop('checked');
    if (checkBoxStatus == true) {
        jQuery.ajax({
            type: 'post',
            url: 'assets/includes/process_payment.php',
            data: 'payment_id=&amount=' + 590000 + '&status=incomplete&user_id=2',
            success: function (result) {
                if (result.trim() == 'incomplete_success') {
                    var options = {
                        "key": "rzp_test_ITyKYENzz5LHR2",
                        "amount": "590000",
                        "currency": "INR",
                        "name": "SpaceTours",
                        "description": "Book your tickets for around the earth",
                        "image": "https://www.codester.com/static/uploads/items/000/015/15566/preview-xl.jpg",
                        "handler": function (response) {
                            console.log(response);
                            jQuery.ajax({
                                type: 'post',
                                url: 'assets/includes/process_payment.php',
                                data: 'payment_id=' + response.razorpay_payment_id + '&amount=' + 590000 + '&status=complete&user_id=2',
                                success: function (result) {
                                    if (result.trim() == 'complete_success') {
                                        alert('Your payment was successful, please visit your dashboard to view your ticket!');
                                        //add mail here
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
                    alert('An error occurred, please try again!');
                }
            }
        });
    } else {
        alert('Please accept the terms and conditions to proceed with the payment!')
    }
}
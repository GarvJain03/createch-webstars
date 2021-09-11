  function toggleForm(status) {
  var container = document.querySelector('.container');
  container.classList.toggle('active');
  
  if(status == 'signup') {
      $('#title').html('User Signup');
  } else {
      $('#title').html('User Login');
  } 
}

$('#otp').hide();
function send_otp() {
  var phone = $('#phone').val();
  if(phone !== '' && phone.length == 10) {
    jQuery.ajax({
      url: 'send_otp',
      type: 'post',
      data: 'phone='+phone,
      success: function(result) {
        $('#otp').show();
      }
    });
  } else {
      alert('Please enter a 10 digit mobile number!')
  }
}
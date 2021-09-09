window.fbAsyncInit = function() {
    FB.init({
      appId      : '183287280573890',
      cookie     : true,
      xfbml      : true,
      version    : 'v11.0'
    });
      
    FB.AppEvents.logPageView();   
      
    };
    
    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
       
       
function fbLogin() {
    FB.login(function(response) {
      if(response.authResponse) {
            fbLoginSuccess();
        } 
    }, {scope: 'public_profile,email'});
}
       
       
function fbLoginSuccess() {
FB.getLoginStatus(function(response) {
    if(response.status == 'connected') {
        FB.api('/me', {fields:'id,name,email'}, function(response) {
            var fbEmail = response.email;
            jQuery.ajax({
                type: 'post',
                url: 'facebook_oauth',
                data: 'email='+fbEmail,
                success: function(result) {
                    if(result == 'authenticated') {
                        window.location.href = './';
                    } else if(result == 'not_authenticated') {
                        alert('This account does not exist on our platform, please signup to login to the dashboard!')
                    } else if(result == 'error') {
                        alert('An error occurred while checking for your email, please try again!');
                    } else {
                        alert('An error occurred, please try again!');
                    }
                }
            })
        });
    }
});
}

function googleLogout() {
    var auth = auth2.getAuthInstance();
    auth.signOut();
}
    
function googleLogin(userInfo) {
    var userProfile = userInfo.getBasicProfile();
    var user_email = userProfile.getEmail();
    
    jQuery.ajax({
        type: 'post',
        url: 'google_oauth',
        data: 'user_email='+user_email,
        success: function(result) {
            if(result == 'authenticated') {
                window.location.href = './';
            } else if(result == 'not_authenticated') {
                alert('This account does not exist on our platform, please signup to login to the dashboard!')
            } else if(result == 'error') {
                alert('An error occurred while checking for your email, please try again!');
            } else {
                alert('An error occurred, please try again!');
            }
        }
    });
}
    
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
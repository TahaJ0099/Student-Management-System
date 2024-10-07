$(document).ready(function() {
  $('#password').on('input', function() {
    var password = $(this).val();
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d\s:])([^\s]){8,16}$/;
    
    if (passwordPattern.test(password)) {
      $('#password-validation-message').html('');
    } else {
      $('#password-validation-message').html('Password must contain at least one digit, one lowercase letter, one uppercase letter, one special character, and be between 8 and 16 characters long.');
    }
  });
});
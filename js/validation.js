    // Function to validate email format
    function validateEmail(email) {
      var emailRegex = /\S+@\S+\.\S+/;
      return emailRegex.test(email);
    }

    // Function to validate password length
    function validatePassword(password) {
      return password.length >= 8;
    }

    // Function to validate confirm password
    function validateConfirmPassword(password, confirmPassword) {
      return password === confirmPassword;
    }

    // Function to display validation messages
    function displayMessage(elementId, message, isValid) {
      var messageElement = document.getElementById(elementId);
      messageElement.textContent = message;
      messageElement.style.color = isValid ? 'green' : 'red';
    }

    // Event listener for email input
    document.getElementById('email').addEventListener('input', function() {
      var email = this.value;
      var isValid = validateEmail(email);
      displayMessage('emailMessage', isValid ? '' : 'Please enter a valid email address', isValid);
    });

    //Event listener for password input
    document.getElementById('password').addEventListener('input', function() {
      var password = this.value;
      var isValid = validatePassword(password);
      displayMessage('passwordMessage', isValid ? '' : 'Password must be at least 8 characters long', isValid);
    });

    //Event listener for confirm password input
    document.getElementById('confirmpassword').addEventListener('input', function() {
      var password = document.getElementById('password').value;
      var confirmPassword = this.value;
      var isValid = validateConfirmPassword(password, confirmPassword);
      displayMessage('confirmPasswordMessage', isValid ? '' : 'Passwords do not match', isValid);
    });



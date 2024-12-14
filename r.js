function togglePassword() {
  var passwordField = document.getElementById('Password');
  var checkbox = document.getElementById('showPassword');
  if (checkbox.checked) {
      passwordField.type = 'text';  // Change to text to show the password
  } else {
      passwordField.type = 'password';  // Change back to password
  }
}
function checkAge() {
  var dob = document.getElementById('dob').value; // Get the date of birth value
  var ageError = document.getElementById('ageError');
  var dobDate = new Date(dob); // Convert DOB to Date object
  var today = new Date(); // Get today's date

  // Calculate age by subtracting birth year from current year
  var age = today.getFullYear() - dobDate.getFullYear();
  var month = today.getMonth() - dobDate.getMonth();

  // Adjust for age if the birthday hasn't occurred yet this year
  if (month < 0 || (month === 0 && today.getDate() < dobDate.getDate())) {
      age--;
  }

  // Check if age is less than 18
  if (age < 18) {
      ageError.style.display = 'inline'; // Show age error
      return false; // Prevent form submission
  } else {
      ageError.style.display = 'none'; // Hide age error
      return true; // Allow form submission
  }
}

// Add event listener to validate age on form submission
document.querySelector("form").addEventListener("submit", function(event) {
  if (!checkAge()) {
      event.preventDefault(); // Prevent form submission if age is invalid
  }
});
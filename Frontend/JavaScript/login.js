function checkLoginStatus() {
    fetch('http://localhost/Registry-of-nursing-homes/registry/Backend/rest/controller/AuthController.php')
      .then(response => response.json())
      .then(data => {
        if (!data.loggedIn) {
          // User is not logged in, redirect to login page or display an error message
          window.location.href = 'http://localhost/Registry-of-nursing-homes/form_login.php'; // Redirect to login page
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }

  // Call the function to check login status when the page loads
  window.onload = checkLoginStatus;
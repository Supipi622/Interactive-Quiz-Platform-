<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../css/style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <?php echo form_open('Signup/createAcount'); ?>
         
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control my-5 p-4" name="user_Name" id="user_Name" placeholder="User name">
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" class="form-control my-5 p-4" name="user_EmailAddress" id="user_EmailAddress" placeholder="Email Address">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  class="form-control my-5 p-4" name="user_Password" id="user_Password" placeholder="Password">
            </div>
            <input type="submit" class="btn" value="Sign up" id="signup"/>

            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
    
        </form>


        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
        <div class="content">
            <h3>One of us ?</h3>
            <p>
            Do you already have an account? Sign In please!!
            </p>

            <a href="<?php echo site_url('/Login') ?>">
            <button class="btn transparent" id="sign-in-btn">
              Login
            </button>

          </div>
          <img src="../images/log.svg" class="image" alt="" />

        </div>
        <div class="panel right-panel">
          <!-- <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div> -->
          <img src="../images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../css/app.js"></script>

    <script>
  
  var SignupView = Backbone.View.extend({
    el: '#signup-form', // The element that this view should be bound to

    events: {
        'submit': 'submit' // Bind the submit event to the 'submit' function
    },

	submit: function(event) {
		  	event.preventDefault();
		  
			// Get the form data
			var data = {
				username: this.$el.find('input[name=user_Name]').val(),
				email: this.$el.find('input[name=user_EmailAddress]').val(),
				password: this.$el.find('input[name=user_Password]').val()
        	};

		$.ajax({
			method: "POST",
			url: "Signup/createAcount",	
			dataType: 'JSON',
			data: data,

			success: function(data) {
				//Redirect to the login page if the sign Up page successfully submitted.
                window.location.href = '/Login';	
			},
			error: function(xhr, status, error) {
                //Display an error message 
                alert(error);
			}
		});
		clearfields();
	  }});
	

  function clearfields()
	{
		$('#user_Name').val('');
		$('#user_EmailAddress').val('');
		$('#user_Password').val('');
	}

	// Create a new instance of the SignupView
	var signupView = new SignupView();

  </script>
  
  </body>
</html>

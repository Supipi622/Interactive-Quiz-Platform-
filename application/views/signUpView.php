<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to SignUp page</title>
    
	<link rel="stylesheet" href="../css/signUp.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<section class = "Form my-4 mx-5">
	<div class="container">
		<div class= "row row-no-gutters">
			<div class = "col-lg-5">
				<img src = "../images/signup.jpg" class= "img-fluid" alt="" style="width:470px; height:500px;">
			</div>
			<!-- Display validation errors, if any -->
			<?php echo validation_errors(); ?>

			<div class = "col-lg-7 px-5 pt-5">
				<h1 class= "font-weight-bold py-3">Signup</h1>
				<?php echo form_open('Signup/createAcount'); ?>
				
					<div class="form-row">
						<div class = "col-lg-10">
							<label for="Username"> Username </label>
							<input type="text" class="form-control my-5 p-4" name="user_Name" id="user_Name" placeholder="User name"><br>
						</div>
					</div>

					<div class="form-row">
						<div class = "col-lg-10">
							<label for="Email"> Email Address</label>
							<input type="email" class="form-control my-5 p-4" name="user_EmailAddress" id="user_EmailAddress" placeholder="Email Address"><br>
						</div>
					</div>
				
					<div class="form-row">
						<div class = "col-lg-10">
							<label for="Password"> Password </label>
							<input type="password"  class="form-control my-5 p-4" name="user_Password" id="user_Password" placeholder="Password"><br>
						</div>
					</div>
				
					<div class="form-row">
						<div class = "col-lg-10">
							<input type="submit" class="btn1 mt-3 mb-5" value="Sign Up" id="signup"/><br><br>
						</div>
					</div>

					<div class="form-row">
						<div class = "col-lg-10">
							<p>Already have an acount? <a href="<?php echo site_url('/Login') ?>">Login here</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
		
	</div>
</section>
   
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

</div>

</body>
</html>
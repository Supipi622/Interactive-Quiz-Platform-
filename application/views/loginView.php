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

        <div class="alert alert-danger" role="alert">
        <?php echo validation_errors(); ?>
        <!-- Display login error, if any -->
        <?php if (isset($error_message)) { echo $error_message; } ?>
      </div>

        <?php echo form_open('Login/loginValidation');?>

            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" class="form-control" name="user_EmailAddress" id="user_EmailAddress" placeholder="Email Address">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" name="user_Password" id="user_Password" placeholder="Password"/>
            </div>
            <input type="submit" value="Login" class="btn solid" id="loginPage"/>
            <p class="social-text">Or Sign in with social platforms</p>
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
            <h3>New here ?</h3>
            <p>
            Don't you have an account? Create one!& join with us!
            </p>

            <a href="<?php echo site_url('/Signup') ?>">
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>

          </div>
          <img src="../images/register.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="../css/app.js"></script>

    
  <script>

var LoginView = Backbone.View.extend({
  el: '#login-form', // The element that this view should be bound to

  events: {
      'submit': 'submit' // Bind the submit event to the 'submit' function
  },

  submit: function(event) {
    event.preventDefault();
        
    var data = {
          email: this.$el.find('input[name=user_EmailAddress]').val(),
          password: this.$el.find('input[name=user_Password]').val()
    };

  $.ajax({
    method: "POST",
    url: "Login/loginValidation",	
    dataType: 'JSON',
    data: data,

    success: function(response) {
        window.location.href ="HomeController/loadData";},
          error: function(xhr, status, error) {
              // The form submission failed, display the error message
              window.location.href = '/Login';
              alert(error);
          }
      });

      clearfields();
      }
    });

function clearfields()
{
  $('#user_EmailAddress').val('');
  $('#user_Password').val('');
}
// Create a new instance of the LoginView
var loginView = new LoginView();


</script>

  </body>
</html>

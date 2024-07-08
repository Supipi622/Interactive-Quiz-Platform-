<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Admin</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

	<script>
		tinymce.init({
			selector: 'textarea#editor',
			skin: 'bootstrap',
			plugins: 'lists, link, image, media',
			toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
			menubar: false,
		});
	</script>

<style>
	.container {

		/* margin-left:160px;
		border-width: 2px;
		
		background-color: red;
		border-color: pink;
		height:500px; */
	/* width: 50%;
	
	border-radius:40px;
	border-width: 2px;
	border-color: black; */

	     width:80% ;
	     margin-top:50px;
	     border-radius:40px;
	    height:90%;
	
	 


}

.title{
    margin-left: 300px;
    color:black;
    font-weight: bold;
}

.form-group{
		padding:20px;
		width: 70%;
	   }

	   #addQuestions{
    background-color:  #000080;
    border-color: #b84dff;
    color: white;
    font-size:13px;}

</style>
</head>
<body style='background-image: linear-gradient(#43cea2,#185a9d);'>
<!-- <body> -->

<div class="container">

    <div class="title">
	<h1>Post Your Questions !</h1><br>
	</div>

	<?php echo form_open('PostQuestions/createQuestions'); ?>
   
		<div class="form-group">
			<label for="QuestionTitle"> Question Title </label>
			<input type="text" class="form-control" name="question_Title" id="question_Title" placeholder="Question Title" style="color: black; weight :20px;"/>
		</div>
			
		<div class="row justify-content-md-center">
			<div class="col-md-12 col-lg-8">
				<label>Question Description</label>
				<div class="form-group">
					<textarea id="editor" class="form-control" name="question_Description" id="question_Description" style="color: black;height:20px;"></textarea>
				</div>
				<input type="submit" class="btn btn-primary" value="Add Questions" id="addQuestions"/>
			</div>
		</div>

	</form>

   
  <script>
  
  var PostQuestionsView = Backbone.View.extend({
    el: '#postQuestions-form', // The element that this view should be bound to

    events: {
        'submit': 'submit' // Bind the submit event to the 'submit' function
    },

	submit: function(event) {
		event.preventDefault();
	
			// Get the form data
			var data = {
				// user_Id: this.$el.find('input[name=user_Id]').val(),
				question_Title: this.$el.find('input[name=question_Title]').val(),
				question_Description: this.$el.find('input[name=question_Description]').val()
        	};

		$.ajax({
			method: "POST",
			url: "PostQuestions/createQuestions",	
			dataType: 'JSON',
			data: data,
			
			success: function(data) {
					//Redirect to the login page if the sign Up page successfully submitted.
					window.location.href = '/answerPage';	
				},
				error: function(xhr, status, error) {
					//Display an error message 
					alert(error);
				}
		});

		clearfields();
	  }
  });

  function clearfields()
	{
		$('#question_Title').val('');
		$('#question_Description').val('');
	}

	// Create a new instance of the postQuestionsView
	var postQuestionsView = new PostQuestionsView();

  </script>

</div>

<footer class="footer" style="background-color:#e3f2fd; width:100%">
<div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2023. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</footer>

</body>
</html>
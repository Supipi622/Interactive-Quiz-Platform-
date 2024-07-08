<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Admin</title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/header.css">
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

	   

	   #addAnswers{
    background-color:  #000080;
    border-color: #b84dff;
    color: white;
    font-size:13px;
}

	   
</style>

</head>


<body style='background-image: linear-gradient(#43cea2,#185a9d);'>


<div class="container">
<div class="title">
	<h1>Post your Answers Here!</h1><br>
	</div>	
	
	<?php echo form_open('PostAnswers/createAnswers'); ?>
	
			<div class="form-group">
				<label for="QuestionID"> Question ID </label>
				<input type="text" class="form-control" name="question_Id" id="question_Id" placeholder="Question Id"/>
			</div>

			<div class="row justify-content-md-center">
			<div class="col-md-12 col-lg-8">
				
				<label>Answer Description</label>
				<div class="form-group">
					<textarea id="editor" class="form-control" name="answer_Description" id="answer_Description"></textarea>
				</div>
			</div>
		</div>
		<input type="submit" class="btn btn-primary" value="Add Answers" id="addAnswers" />
	<form>
<div>
   
  <script>

	$(document).ready(function() {
	  event.preventDefault();
	$.ajax({
		method: "POST",
        url: "<?php echo base_url(); ?>index.php/PostAnswers/getAnswers/. <?=$data["answer_Id"]?>.",	
		dataType: 'JSON',
		data: {answer_Id: answer_Id, question_Id: question_Id, answer_Description: answer_Description, up_Vote: up_Vote, down_Vote: down_Vote},
		
		success: function(data) {
			console.log(answer_Id, question_Id, answer_Description,up_Vote, down_Vote);
			$("#data").load(location.href + " #data");
			$("input#question_Title").val("");  
            $("input#question_Description").val("");  
		}
	});
	
  });


  var PostAnswersView = Backbone.View.extend({
    el: '#postAnswers-form', // The element that this view should be bound to

    events: {
        'submit': 'submit' // Bind the submit event to the 'submit' function
    },

	submit: function(event) {
		event.preventDefault();
	
			// Get the form data
			var data = {
				question_Id: question_Id,
				answer_Description: this.$el.find('input[name=answer_Description]').val()
        	};

		$.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>index.php/PostAnswers/createAnswers/. <?=$data["question_Id"]?>.",	
			dataType: 'JSON',
			data: data,
			
			success: function(data) {
					//Redirect to the login page if the sign Up page successfully submitted.
					window.location.href = '/ViewAnswer';	
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
		$('#user_Id').val('');
		$('#question_Title').val('');
		$('#question_Description').val('');
	}

	// Create a new instance of the postAnswersView
	var postAnswersView = new PostAnswersView();

  </script>

</div>


</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Edit Questions</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<style>
	.container {
    margin-right:100px;
	height:90%;
}
/* .card-wrap {
    background-color:white;
    border-style: groove;
    border-width: 1px;
    padding-top:50px;
	padding-right: 50px;
	padding-left: 50px;
	padding-bottom: 300px
} */
</style>
<body style='background-image: linear-gradient(#43cea2,#185a9d);'>

<div class="container">
<div class="card-wrap">
	<h1>Edit your Questions</h1><br>

	<form>

	<?php
         foreach ($questions as $value) { ?>
		
  	<div class="form-group">
    	<label for="QuestionTitle"> Question Title </label>
			<input type="text" class="form-control" name="question_Title" id="question_Title" placeholder="Question Title"value='<?php echo $value->question_Title; ?>'/>
	</div>
    <br>
	
	<div class="form-group">
		<label for='QuestionDescrption'> Question Description </label>
		   <input type="text" class="form-control" name="question_Description" id="question_Description" placeholder="Question Description"value='<?php echo $value->question_Description; ?>'/>
	</div>

	<input type="submit" class="btn btn-primary" value="Edit Questions" id="editQuestions"/>
	<a href="<?php echo site_url('/QuestionsPage/loadData') ?>">
	<?php 	
}
	 ?>  

    	
	</form>
</div>

    <script>
  
  $(document).ready(function() {
	$("#editQuestions").click(function(event) {
		  event.preventDefault();
	    var question_Title = $("input#question_Title").val(); 
		var question_Description = $("input#question_Description").val(); 

	$.ajax({
		method: "POST",
		url: "<?php echo base_url(); ?>index.php/QuestionsPage/editQuestion/<?=$value->question_Id?>",
		dataType: 'JSON',
		data: {question_Title: question_Title, question_Description: question_Description},
		
		success: function(data) {
			window.location.href = '/QuestionsPage/loadData';
			console.log( user_Id, question_Title, question_Description);
			
		}
	});

	clearfields();
	  });
  });

  function clearfields()
	{
		$('#question_Id').val('');
		$('#user_Id').val('');
		$('#question_Title').val('');
		$('#question_Description').val('');
	}

	$(document).ready(function() {
	  event.preventDefault();
	$.ajax({
		method: "POST",
    url: "<?php echo base_url(); ?>index.php/QuestionsPage/getQuestion/<?=$value->question_Id?>",	
		dataType: 'JSON',
		data: {question_Id: question_Id, question_Title: question_Title, question_Description: question_Description},
		
		success: function(data) {
			console.log(questionId, question_Title, question_Description);
			$("#data").load(location.href + " #data");
			$("input#question_Title").val("");  
            $("input#question_Description").val("");  
		}
	});
	
  });

  </script>
  </div>
</body>
</html>
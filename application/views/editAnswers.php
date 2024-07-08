<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Edit Answers</title>
    
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
	padding-bottom: 370px
} */
</style>
<body style='background-image: linear-gradient(#43cea2,#185a9d);'>

<div class="container">
<div class="card-wrap">
	<h1>Edit your Answers</h1><br>

	<p>gi gi gi</p>

	
		<form>

		<?php
			foreach ($names as $value) { ?>
			
		<div class="form-group">
			<label for="AnswerDescription"> Answer Description </label>
			<input type="text" class="form-control" name="answer_Description" id="answer_Description" placeholder="Answer Description"value='<?php echo $value->answer_Description; ?>'/>
		</div>
		<br>

		<input type="submit" class="btn btn-primary" value="Edit Answer" id="editAnswer"/>
		<a href="<?php echo site_url('/QuestionsPage/loadData') ?>">
		<?php 	
	}
		?>  

			
		</form>
	</div>
<div>
    <script>
  
  $(document).ready(function() {
	$("#editAnswer").click(function(event) {
		  event.preventDefault();
		var answer_Description = $("input#answer_Description").val(); 

	$.ajax({
		method: "POST",
		url: "<?php echo base_url(); ?>index.php/PostAnswers/updateAnswer/<?=$value->answer_Id?>",
		dataType: 'JSON',
		data: {answer_Description: answer_Description},
		
		success: function(data) {
			window.location.href = '/Questionspage/loadData';
			console.log( answer_Description);
			
		}
	});

	clearfields();
	  });
  });

  function clearfields()
	{
		$('#answer_Description').val('');
	}

	$(document).ready(function() {
	  event.preventDefault();
	$.ajax({
		method: "POST",
    	url: "<?php echo base_url(); ?>index.php/PostAnswers/getAnswers/<?=$value->answer_Id?>",	
		dataType: 'JSON',
		data: {answer_Id: answer_Id, answer_Description: answer_Description},
		
		success: function(data) {
			console.log(answer_Id, answer_Description);
			$("#data").load(location.href + " #data");
            $("input#answer_Description").val("");  
		}
	});
	
  });

  </script>
<div>
</body>
</html>
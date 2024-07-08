<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Admin</title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/answersView.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.btn{
    font-size:13px;
    float: right;
    margin-right: 5px;
}

.container {
  margin-left: 160px;
  padding: 1px 16px;
  height: 100px;
  width: 80%; 
}
.card {
    padding: 10px 20px 40px 20px;
    background-color:white;
    border-style: groove;
    border-width: 1px;
    margin:10px;
    border-radius:40px;

}

.btn-position{
    margin-right:10px;
    float:right;
    /* position: absolute; */
}

.vote{
  float:left;
  position: absolute;
}
#downvote{
    margin-left:20px
}

.title{
    margin-left: 300px;
    color:black;
    font-weight: bold;
}
</style>
</head>

<body style='background-image: linear-gradient(#43cea2,#185a9d);'> 
<div class="container">
<div class="title">
    <h1>Answers view</h1><br>
    </div>

    <div id="data">
       
        <?php

	    foreach ($names as $value) { ?>

                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title"><?=$value->question_Title?></h3><br>
                        <p class="card-text"><?=$value->answer_Description?><p><br>

                        <!-- <a href="<?php echo base_url();?>index.php/PostAnswers/getAnswers/<?=$value->answer_Id?>">
                        <button type="button" class="btn btn-success btn-sm" id="edit">Edit </button>

                        <a href="<?php echo base_url();?>index.php/ViewAnswers/deleteRecords/<?=$value->answer_Id?>">
                        <button type="button" class="btn btn-danger btn-sm" id="delete">Delete </button>  -->

                        <div class="btn-position">
                            <a href="<?php echo base_url();?>index.php/PostAnswers/getAnswers/<?=$value->question_Id?>">
                            <img src="<?php echo base_url();?>/images/edit.png" width ="30" height="30" id="edit"></button></a>
                           
                            <a href="<?php echo base_url();?>index.php/ViewAnswers/deleteRecords/<?=$value->question_Id?>">
                            <img src="<?php echo base_url();?>/images/delete.jpg" width ="30" height="30" id="delete"></button></a>
                            </div>


                        <!-- <div class="voteValue">
                            <?php echo $value->up_Vote ?>
                            <?php echo $value->down_Vote ?>
                        </div>
                             -->
                            <div class ="vote">
                            <a href="<?php echo base_url();?>index.php/ViewAnswers/upvote/<?=$value->answer_Id?>"  id="btnupvote" >
                                <img src="<?php echo base_url();?>/images/upVote.png" width ="30" height="30" id="upvote"></button></a><b><?php echo $value->up_Vote ?></b>
                            <a href="<?php echo base_url();?>index.php/ViewAnswers/downvote/<?=$value->answer_Id?>" id="btndownvote" >
                                <img src="<?php echo base_url();?>/images/downVote.png" width ="30" height="30" id="downvote"></button></a><b><?php echo $value->down_Vote ?></b>
                            </div>

                    </div>
                </div>
       
        <?php }
		
		?>  
    </div>

</div>
   
  <script>

   $(document).ready(function() {
	  event.preventDefault();
	$.ajax({
		method: "POST",
        url: "<?php echo base_url(); ?>index.php/ViewAnswers/displayAnswers/. <?=$data["question_Id"]?>.",	
		dataType: 'JSON',
		data: {question_Id: question_Id, question_Title: question_Title, question_Description: question_Description},
		
		success: function(data) {
			console.log(question_Id, question_Title, question_Description);
			$("#data").load(location.href + " #data");
			$("input#question_Title").val("");  
            $("input#question_Description").val("");  
		}
	});
	
  });

  $(document).ready(function() {
	  $("#delete").click(function(event) {
		  event.preventDefault();
	$.ajax({
		method: "GET",
        type: 'DELETE',
		url: "<?php echo base_url(); ?>index.php/ViewAnswers/deleteRecords/. <?=$data["answer_Id"]?>.",	
		dataType: 'JSON',
		data: {answer_Id: answer_Id},

		success: function(data) {
            window.location.href = '/ViewAnswers/displayAnswers';
            var message = "<?php echo $message; ?>";
            alert("successfully deleted the record");
		}
	});
	  });
  });

  </script>

</div>
</body>
</html>
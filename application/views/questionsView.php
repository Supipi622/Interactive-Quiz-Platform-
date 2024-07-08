<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/homePage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
.container {
    /* margin-right:100px; */
    margin-left:160px;

}

.title{
    margin-left: 300px;
    color:black;
    font-weight: bold;
}
.card-wrap {
    background-color:white;
    /* border-color:black; */
    
    border-width: 1px;
    margin:10px;
    border-radius:40px;
    /* margin-left:80px; */
}
.btnleft{
    float:left;  
}

.btn-position{
    margin-right:10px;
    float:right;
}
#btnpost{
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
    <h1 >Top Questions</h1>
    <div class = "btnView">
        <a href="<?php echo site_url('/PostQuestions') ?>">
        <button type="button" class="btn btn-primary" id="addQuestions">Ask your Questions </button></a><br><br>
</div>    
</div>

    <div id="data">
    <div class="row">
		<?php
	    foreach ($names as $value) { ?>
       
                <div class="card-wrap">
                    <div class="card-body">
		                <a href="<?php echo base_url();?>index.php/ViewAnswers/displayAnswers/<?=$value->question_Id?>">
                            <h3 class="card-title" ><?=$value->question_Title?></h3><br>
                            <p class="card-text"><?=$value->question_Description?></p></a><br>

                            <div class="btnleft">
									<a href="<?php echo base_url();?>index.php/PostAnswers">
									<button type="button" id ="btnpost" class="btn btn-primary ">Post Answer</button><br><br></a>
							</div>
                           <div class="btn-position">
                            <a href="<?php echo base_url();?>index.php/QuestionsPage/getQuestion/<?=$value->question_Id?>">
                            <img src="<?php echo base_url();?>/images/edit.png" width ="30" height="30" id="edit"></button></a>
                            <!-- <button type="button" class="btn btn-success btn-sm" id="edit">Edit</button> -->

                            <a href="<?php echo base_url();?>index.php/QuestionsPage/deleteRecords/<?=$value->question_Id?>">
                            <img src="<?php echo base_url();?>/images/delete.jpg" width ="30" height="30" id="delete"></button></a>
                            <!-- <button type="button" class="btn btn-danger btn-sm" id="delete">Delete </button> -->
                            </div>
                        </a>
                      
                    </div>
                </div>   
        
		<?php }
		?>
       </div>
    </div>
<br>
    <!-- <div class = "btnView">
        <a href="<?php echo site_url('/PostQuestions') ?>">
        <button type="button" class="btn btn-primary" id="addQuestions">Post your Questions </button></a><br><br><br><br> -->
<!-- <br>
    </div> -->
</div>
   
<script>
    $(document).ready(function() {
        
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/QuestionsPage/loadData",	
            dataType: 'JSON',
            data: {question_Id: question_Id, question_Title: question_Title, question_Description: question_Description},
            
            success: function(data) {
                console.log(question_Id, question_Title, question_Description);
                $("#data").load(location.href + " #data");
                $("input#question_Id").val(""); 
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
        url: "<?php echo base_url(); ?>index.php/QuestionsPage/deleteRecords/. <?=$data["question_Id"]?>.",		
		dataType: 'JSON',
		data: {question_Id: question_Id},

		success: function(data) {
			console.log(question_Id);
			$("#data").load(location.href + " #data");
			$("#message").html("You have successfully deleted number " + question_Id + " Thank you");
			$("#message").show().fadeOut(3000);
			$("input#question_Id").val("");  
		}
	});
	  });
  });


  var suggestions = [];
    <?php foreach($results as $result): ?>
        suggestions.push("<?php echo $result->question_Title; ?>");
    <?php endforeach; ?>
    var input = document.getElementById("keywords");
    var suggest = document.getElementById("suggestions");
    input.addEventListener("input", function() {
        var val = this.value;
        var opts = suggestions.filter(function(s) {
            return s.toLowerCase().indexOf(val.toLowerCase()) === 0;
        });
        if (val === "" || opts.length === 0) {
            suggest.style.display = "none";
            return;
        }
        suggest.style.display = "block";
        suggest.innerHTML = "";
        opts.forEach(function(opt) {
            var div = document.createElement("div");
            div.innerHTML = opt;
            div.classList.add("suggestion");
            div.addEventListener("click", function() {
                input.value = opt;
                suggest.style.display = "none";
            });
            suggest.appendChild(div);
        });
    });
    input.addEventListener("focus", function() {
        var val = this.value;
        var opts = suggestions.filter(function(s) {
            return s.toLowerCase().indexOf(val.toLowerCase()) === 0;
        });
        if (opts.length > 0) {
            suggest.style.display = "block";
        }
    });
    input.addEventListener("blur", function() {
        suggest.style.display = "none";
    });

    
  $(document).ready(function() {
	  $("#logOut").click(function(event) {
		  event.preventDefault();
      $.ajax({
        method: "GET",
        url: "<?php echo base_url(); ?>index.php/Login/logout/",	
        dataType: 'JSON',
        data: {user_EmailAddress: user_EmailAddress, user_Password: user_Password},

        success: function(data) {
            window.location.href = '/QuestionsPage/loadData';
                alert("User successfully loggedout from the system");
        }
      });
	  });
  });


</script>

</div>

<footer class="footer" style="background-color:#e3f2fd;">
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
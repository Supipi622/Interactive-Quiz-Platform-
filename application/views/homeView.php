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

	<style>
		.container{
			 /* background-image: linear-gradient(#43cea2,#185a9d);  */
 			width: 84%;
  			border-radius: 10px;
  			padding: 70px;
			margin-top:50px;
  			margin-left: 8%;
			height:400px;
			border-color: white;
            position: absolute;
            background: rgb(0, 0, 0); /* Fallback color */
            background: rgba(0, 0, 0, 0.5);
		}
		h1{
			text-align:center;
			color:
		}
		h3{
			text-align:center;
		}
		h2{
			text-align:center;
		}
        .title{
            text-align:left;
            font-size:80px;
            color:white;
        }
        .subtitle{
            text-align:right;
            font-size:70px;
            color:white; 
        }
		

	</style>


</head>
<body style= "background:url(../images/home.jpg )"; >

<div class="container" >
<marquee direction="right"
behavior="alternate" 
        style="border:BLACK 2px SOLID">
    <div class='title'>
        Got a Question
    </div>
    <div class='subtitle'>
        Get your Answer
    </div>
	</marquee>

	
	
</div>
<script>
   $(document).ready(function() {
	  
		event.preventDefault();
	$.ajax({
		method: "GET",
		url: "<?php echo base_url(); ?>index.php/Home/index",	
		dataType: '',
		data: {},
		
	});
	
  });
  </script>
  
</body>

</html>
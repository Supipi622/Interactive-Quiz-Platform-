<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Help page</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <style>
	.container {
		width:80% ;
	     margin-top:50px;
	     border-radius:40px;
	    height:100%;
       

		
	
}

.title{
    margin-left: 300px;
    color:black;
    font-weight: bold;
}

.body{
    color:white;
}

</style>
</head>
    <body style='background-image: linear-gradient(#43cea2,#185a9d);'>

<div class="container">
<div class="title">
    <h1>Search Results</h1>
</div>

    <div class = body>
    <?php 
        if(!empty($results)){
            foreach($results as $result){
                echo "<p>".$result->question_Title."</p>";
                echo "<p>".$result->question_Description."</p>";
            }
        }
    ?>
</div>
</div>

</body>
</html>

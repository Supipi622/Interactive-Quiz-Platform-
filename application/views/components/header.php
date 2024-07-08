<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
      img {
         border-radius: 50%;
      }
    </style>

</head>
<nav class="navbar navbar-light" style="background-color:black;width:100%">
  <div class="container-fluid">
    
    <ul class="nav navbar-nav">
    <a href="#" class="navbar-left"><img src="../images/logo.jpg" width ="75" height="70"> </a>
    <li class="active"><a href="<?php echo site_url('/Home') ?>">Home</a></li>
    <li class="active"><a href="<?php echo site_url('/QuestionsPage/loadData') ?>">Questions</a></li>
    <!-- <li class="active"><a href="<?php echo site_url('/ViewAnswers/displayAnswers/6') ?>">Answer</a></li> -->
    <li><a href="<?php echo site_url('/Help') ?>">Contact Us</a></li>
    
      <li><a href="<?php echo site_url('/Signup'); ?>">Signup</a></li>
      <li><a href="<?php echo site_url('/login') ?>">Log In</a></li>
      
    
    </ul>
   
  </div>
</nav>

<body>
</body>
</html>
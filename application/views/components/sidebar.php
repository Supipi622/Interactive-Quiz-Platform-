<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
  body {
    margin: 0;
    font-family: "Lato", sans-serif;
  }
  
  .sidebar{
    position: fixed;
    left: 0;
    bottom: 0;
    height: 90%;
    background-color: #4d94ff;
    text-align: center;
    max-width: 180px;
    margin-top: 0px;

  }
  .sidebar a {
    display: block;
    color: white;
    padding: 16px;
     padding-top:20px; 
    text-decoration: none;
  }
   
  .sidebar a.active {
    background-color: white;
    color: white;
  }
  
  .sidebar a:hover:not(.active) {
    background-color: #80aaff;
    color: white;
  }
  .btn{
    background-color:#b3b3ff; 
    border-radius: 25px;
    margin: 0 0 0 0;
    align-items: center;
    color:black;
  }
  .logout{
   /* color:black; */
    position: absolute;
    bottom: 0px;
    margin-left:20px;
  }
.content{
  padding-top:20px;
}
.questions{
  padding-top:300px;
}
</style>

</head>

<body>
    <div class="sidebar">
      <div class= "content">
        <a href="<?php echo site_url('/home') ?>">Home</a>
        <a href="<?php echo site_url('/QuestionsPage/loadData') ?>">Questions</a>
        <a href="<?php echo site_url('/ViewAnswers/displayAnswers/6') ?>">Answers</a>
        <a href="<?php echo site_url('/Signup'); ?>">Signup</a>
        <a href="<?php echo site_url('/Login') ?>">Login</a>
        <a class="nav-link" href="<?php echo site_url('/Help') ?>">Contact Us</a>

        <!-- <div class= "questions">
          <a href="<?php echo site_url('/PostQuestions') ?>">
          <button type="button" class="btn" id="addQuestions">Post Questions </button></a><br>
        </div> -->


        <div class = "logout">
          <a class="nav-link" href="<?php echo site_url('/Login/logout') ?>">Log out</a>
      </div>

    </div>
  </div>
</body>
</html>

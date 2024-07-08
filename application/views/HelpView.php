<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Help page</title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/helpView.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
   
<style>
.container{
    margin-top: 10px;
}
.btn1{
    border:none;
    outline: none;
    height: 35px;
    width: 100%;
    background-color: black;
    color: white;
    border-radius: 4px;
    font-weight: blod;
}
.btn1:hover{
    background-color: white;
    border: 1px solid;
    color: black;
}
.alert {
    float:right;
    padding: 0rem 1.25rem 0rem 1.25rem;
    margin-bottom: 1rem;
    border: 0px solid transparent;
    border-radius: .25rem;
        
}
</style>
</head>
<body style='background-image: linear-gradient(#43cea2,#185a9d);'>
    
<div class="container">
	<h1>How can we help?</h1><br>

    <!-- <div class="alert alert-success" id="alert-box" role="alert"></div>

		<form class="form-inline">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success" type="submit">Search</button> 
		</form>
        <br> -->
    
</div>

<section class = "Form my-4 mx-5">
	<div class="container">
		<div class= "row justify-content-center ">
			<div class = "col-lg-5">
				<div class= "card card-body card-contact bg-theme">
                    <h1>Contact Us</h1>
                    <div class = "media mb-4 align-items-center">
                        <div class= "icon-part mr-3">
                            <i class= "fas fa-map-marker-alt"></i>
                        </div>
                        <div class = "media-body">
                            <h5 class = "mt-0"> Colombo, Sri Lanka</h5>
                        </div>
                    </div>
                    <div class = "media mb-4 align-items-center">
                        <div class= "icon-part mr-3">
                            <i class= "fas fa-phone"></i>
                        </div>
                        <div class = "media-body">
                            <h5 class = "mt-0"> 0112098765</h5>
                        </div>
                    </div>
                    <div class = "media mb-4 align-items-center">
                        <div class= "icon-part mr-3">
                            <i class= "fas fa-envelope"></i>
                        </div>
                        <div class = "media-body">
                            <h5 class = "mt-0">supipi.20191146@iit.ac.lk</h5>
                        </div>
                    </div><br><br><br>

                </div>
			</div>

			<div class = "col-lg-6 px-5 pt-5">
					<div class="form-row">
						<div class = "col-lg-10">
							<label for="Name"> Name </label>
							<input type="text" class="form-control my-5 p-4" name="Name" id="Name" placeholder="Name">
						</div>
					</div>
                    <div class="form-row">
						<div class = "col-lg-10">
							<label for="Mobile"> Phone Number </label>
							<input type="text"  class="form-control my-5 p-4" name="Mobile" id="Mobile" placeholder="Phone Number">
						</div>
					</div>

					<div class="form-row">
						<div class = "col-lg-10">
							<label for="Email"> Email Address</label>
							<input type="email" class="form-control my-5 p-4" name="user_EmailAddress" id="user_EmailAddress" placeholder="Email Address"><br>
						</div>
					</div>

                    <div class="form-row">
						<div class = "col-lg-10">
                            <textarea id="probelm" class="form-control my-5 p-4" name="probelm" rows="5" cols="50"></textarea><br>
						</div>
					</div>

                    <div class="form-row">
                        <div class = "col-lg-10">
                        <input type="submit" class="btn1" value="Submit" id="contactUsSubmit"/><br>
                        </div>
                    </div>
				
				</form>
			</div>
		</div>
		
    
	</div>
</section>

<script>
  
  $(document).ready(function() {
        
        event.preventDefault();
        $.ajax({
            method: "POST",
            url: "<?php echo base_url(); ?>index.php/HelpController/index",	
            dataType: 'JSON',
            
            success: function() {
                console.log("successfully loaded the help page");
            }
        });
        
    });

    $(document).ready(function(){
    $("#contactUsSubmit").click(function(){
        $("#alert-box").html("<div class='alert-box'>Successfully submited the record!</div>");
        setTimeout(function(){
        window.location.href ="<?php echo base_url(); ?>index.php/HelpController";
        }, 2000);
  });
});

</script>



</body>
</html>
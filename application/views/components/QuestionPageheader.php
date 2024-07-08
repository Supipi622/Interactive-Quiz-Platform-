<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

  <link rel="stylesheet" href="<?php echo base_url(); ?>/css/header.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    body { padding-top: 70px; }
  
  </style>
  
</head>

<nav class="navbar navbar-light navbar-fixed-top" style="background-color:black ;height:70px">
  <div class="container-fluid">
    <div class="navbar-header">
        <a href="#" class="navbar-left"><img src="../../images/logo.jpg" style="width:75px; height:70px;border-radius: 50%"></a>
      </div>
      

       
      <form class="navbar-form navbar-right" role="search" method="post" action="<?php echo base_url('index.php/QuestionsPage/search'); ?>">
        <div class="form-group">
          <input type="text" class="form-control" id="keywords" name="keywords">
          <div id="suggestions" style="display: none;width:50%;color:red "></div>

        
          <button type="submit" class="btn btn-default">Search</button>
        </div>

      </form>

    </div>
</nav>

<body>

<script>
  var HeaderView = Backbone.View.extend({
    el: '#header-form', // The element that this view should be bound to

    events: {
        'submit': 'submit' // Bind the submit event to the 'submit' function
    },

    submit: function(event) {
		  event.preventDefault();
          
      var data = {
        searchVal: this.$el.find('input[name=searchVal]').val()
      };

    $.ajax({
      method: "POST",
      url: "QuestionsPage/search/. <?=$data["searchVal"]?>.",	
      dataType: 'JSON',
      data: data,

      success: function(response) {
                echo response;
                window.location.href = '/QuestionsPage/loadData';
                

            },
            error: function(xhr, status, error) {
                // The form submission failed, display the error message
                alert(error);
            }
        });
        }
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
  
 
  // Create a new instance of the LoginView
  var headerView = new HeaderView();

  </script>
</body>


</html>
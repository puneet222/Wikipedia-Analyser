<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css"> -->
<link rel="stylesheet" type="text/css" href="css/home.css">

<html>
<head>
<title>Wikipedia Analyser</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>

</head>
<body>
<div class="container" id="preview">

 
    
    <?php

      $link = $_GET['link'] ;

	?>

<script type="text/javascript">
$(document).ready(function() {
    var link = "<?php echo $link ; ?>";
    var extract_data = "" ;
    // alert(link) ;

// /w/api.php?action=query&format=json&prop=extracts&titles=Programming_paradigm&utf8=1&ascii=1&exintro=1&explaintext=1

$.ajax({
        type: "GET",
        url : "https://en.wikipedia.org//w/api.php?action=query&format=json&prop=extracts&titles=" + link + "&utf8=1&ascii=1&exintro=1&explaintext=1&callback=?",
        contentType: "application/json; charset=utf-8",
        async: true,
        dataType : "json" ,
        success: function(data , textStatus, jqXHR){
          console.log(data);
          
          var len = data.length;

          var pageid = Object.keys(data["query"].pages) ;

          extract_data = data["query"].pages[pageid].extract ;
          // console.log("data is : " + extract_data);
         
          var cont = "<br><br><h2>"+ link +"</h2>  \
			<br>"


			$("#head").append(cont);
			var show = "<button class='btn btn-block'  id='show'>Click to see the brief introduction</button>"

			var hide = "<br><button class='btn btn-block'  id='hide'>Click to Hide</button>"
			$("#show-btn").append(show);

			var para = "<br><p id='brief'>" + extract_data + "</p>" ;
			var flag = 0 ;

			$("#show").click(function() {



    			var el = $("<div />").css("display", "none").html(para) ;
    			$("#inner-para").append(el);
    			el.show(1000);


    			var el2 = $("<div />").css("display", "none").html(hide) ;
    			$("#inner-para").append(el2);
    			el2.slideDown(1000);
 
    			$("#show").hide(1000) ;

				})

					$('#hide').live('click', function(){ 

 					$("#hide").hide(500) ;
					$("#brief").hide(500 , function(){
						$("#inner-para").empty();
					});
					$("#show").show(500);
					
 					})


					var wiki = "<br><a href='https://en.wikipedia.org/wiki/"+ link + "' target='_blank'><button class='btn btn-block' id='wiki_btn'>Link to Wikipedia Page</button></a>" ;

					var analyze = "<br><a href='analyze.php'><button class='btn btn-circle-lg button'>Analyze</button>" ;


					$("#wiki-anly").append(wiki) ;
					$("#wiki-anly").append(analyze) ;
		    
          

        }
        
       
      })


}) ;


</script>


<div class="" id="main">

		<div id="head">
		</div>

		<div id="show-btn">
		</div>

		<div id="inner-para">
		</div>

		<div id="wiki-anly">
		</div>

</div>

</div>

<body>

</html>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css"> -->
<link rel="stylesheet" type="text/css" href="css/home.css">

<html>
<head>
<title>Wikipedia Analyser</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
<!-- <script src="javaS/first.js"></script> -->
</head>
<body>
<div class="container">
<div id="top">
  
  </div>
  <div id="form">
  <form action="ajax.php" id="pass" method="post">
  <input type="hidden" name="type" id="type">
  <input type="hidden" name="name" id="name">
  <input type="hidden" name="link" id="link">
  </form>

  </div>
  <?php 
  $getvar = $_GET['s'] ;
  ?>
 
   <script type="text/javascript">

   var new_link = "<?php echo $getvar; ?>";
    // console.log("search elemet is : " + link) ;

    var arr = new_link.split("_") ;
    var siz = arr.length ;
   
    for(var i = 0 ; i < siz ; i++)
    {
    	arr[i] = encodeURIComponent(arr[i]) ;
    }


    
    var link = arr.join("_") ;

    console.log("new link is : " + link) ;
   			

	var v = "" ;


   	 $.ajax({
        type: "GET",
        url : "https://en.wikipedia.org//w/api.php?action=opensearch&format=json&search="+link+"&limit=100&namespace=6%7C10%7C-2%7C-1%7C4%7C8%7C14%7C108%7C101%7C100%7C118%7C446&utf8=1&callback=?",
        contentType: "application/json; charset=utf-8",
        async: true,
        dataType : "json" ,
        success: function(data , textStatus, jqXHR){
          console.log(data);

          var len = data[1].length ;
          console.log("length = " + len) ;
          var type = [] ;
          var name = [] ;
          var link = [] ;

          for(var i = 0 ; i < len ; i++)
          {
          	var arr = data[1][i].split(":");
          	// console.log(arr) ;
          	type.push(arr[0]) ;
          	name.push(arr[1]) ;
          	link.push(data[3][i]);
          	var q = arr[0] ;

          	}


          	var pass_type = type.join(",") ;
          	var pass_name = name.join(",") ;
          	var pass_link = link.join(",") ;

          	console.log(pass_type + " " + pass_link) ;

          	$("#type").val(pass_type);
          	$("#name").val(pass_name);
          	$("#link").val(pass_link);

          	$("#form").append("<button id='click'>alayze</button>");


          	$(document).click(function(){
          		$("#pass").submit();
          	})


         }


       
      })

   </script>


</div>
<body>

</html>
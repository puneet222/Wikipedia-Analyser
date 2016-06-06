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

  
  <div id="form2">
  <form action="ajax2.php" id="pass2" method="post">
  <input type="hidden" name="views" id="views">
  <input type="hidden" name="year" id="year">
  <input type="hidden" name="mon" id="mon">
  <input type="hidden" name="dt" id="dt">	
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


          	$("#click").click(function(){
          		alert("click") ;
          		$("#pass").submit();
          	})


         }


       
      }) // ajax 1

   	 $.ajax({
        type: "GET",
        url : "https://wikimedia.org/api/rest_v1/metrics/pageviews/per-article/en.wikipedia/all-access/all-agents/C%2B%2B11/daily/2008100600/2016060500",
        contentType: "application/json; charset=utf-8",
        async: true,
        dataType : "json" ,
        success: function(data , textStatus, jqXHR){
          console.log(data);
		  var len = (data["items"]).length ;
		  var views = [] ;
		  var date = [] ;
          for(var i = 0 ; i < len ; i++)
          {
          	views.push(data["items"][i]["views"]) ;
          	date.push(data["items"][i]["timestamp"]) ;
          }

          var year = [] ;
          var mon = [] ;
          var dt = [] ;
          console.log(date[2]);
          for(var i = 0 ; i < len ; i++)
          {
          	var snum = (date[i]).toString()
          	var arr = snum.split("") ;
          	
          	var y = arr[0]+arr[1]+arr[2]+arr[3] ;
          	var m = arr[4]+arr[5];
          	var d = arr[6]+arr[7];


          	year.push(y);
          	mon.push(m);
          	dt.push(d);

          }

          var pass_views = views.join(",") ;
          var pass_year = year.join(",");
          var pass_mon = mon.join(",");
          var pass_dt = dt.join(",");


          $("#views").val(pass_views);
          $("#year").val(pass_year);
          $("#mon").val(pass_mon);
          $("#dt").val(pass_dt);


          $("#form2").append("<button id='views_btn'>Views</button>") ;

          $("#views_btn").click(function(){
          	alert("dcndkjvnknve") ;

          	$("#pass2").submit() ;
          })




          
      } // success function
  })// ajax

   </script>


</div>
<body>

</html>
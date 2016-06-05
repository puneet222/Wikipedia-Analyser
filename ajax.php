<?php

// $type = $_POST["type"] ;
// $name = $_POST["name"] ;
// $link = $_POST["link"] ;
// echo $type ;
// echo $name ;
// echo $link ;

// $dtype = explode(",", $type) ;
// $dname = explode(",", $name) ;
// $dlink = explode(",", $link) ;

// include("dbcon.php") ;

// $len  = count($dtype) ;

// $delete = "DELETE from table1" ;
// $drop = "DROP TABLE sum" ;
// mysqli_select_db($conn, "wiki");

// mysqli_query($conn , $drop) ;
// $status = mysqli_query($conn , $delete) ;

// if(!$status)
// {
// 	die('Could not '.mysqli_error());
// }
// else
// {
// 	echo "query may be executed" ;
// }

// for ($i=0; $i < $len ; $i++) { 
	
// 	$query = "insert into table1 values('$dtype[$i]' , '$dname[$i]' , '$dlink[$i]') ;" ;

// mysqli_select_db($conn, "wiki");


// $status = mysqli_query($conn , $query) ;

// if(!$status)
// {
// 	die('Could not '.mysqli_error());
// }
// else
// {
// 	echo "query may be executed" ;
// }
	
//} // for loop


 // // executing r script 
// exec('"D:\SOFTWARE\R-3.2.3\bin\Rscript.exe" "Rscript.R" 2>&1', $output);

//   // return image tag

//   $nocache = rand();
//   print_r($output) ;

//   echo "<img src='myplot.png?$nocache' /> "; 

?>

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


<script type="text/javascript">

	 $.ajax({
        type: "GET",
        url : "https://wikimedia.org/api/rest_v1/metrics/pageviews/per-article/en.wikipedia/all-access/all-agents/C%2B%2B11/daily/2008100600/2016060500",
        contentType: "application/json; charset=utf-8",
        async: true,
        dataType : "json" ,
        success: function(data , textStatus, jqXHR){
          console.log(data);
var len = (data["items"]).length ;
console.log(len)
          console.log(data["items"][240]["views"])

      } // success function
  })// ajax
</script>


  </div>
  </body>
  </html>



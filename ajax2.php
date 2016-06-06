<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css"> -->
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.6.3/css/font-awesome.css">



<html>
<head>
<title>Wikipedia Analyser</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
<script src="javaS/first.js"></script>
</head>
<body>

<div id="nav">
<ul>
  <li id="wikianly"><a href="#"><h3>Wikipedia Analyser</h3></a></li>
  <li id="help"><a href="help.php"><h4>Help</h4></a></li>
  <li id="contact"><a href="contact.php"><h4>Contact</h4></a></li>
  <li id="about"><a href="about.php"><h4>About</h4></a></li>
</ul>
</div>
<br>
<br>
<br>
<div class="container">



<?php

$views = $_POST["views"] ;
$year = $_POST["year"] ;
$mon = $_POST["mon"] ;
$dt = $_POST["dt"] ;

// echo $views ;
// echo $year ;
echo $mon ;
// echo $dt ;

$dviews = explode(",", $views) ;
$dyear = explode("," , $year) ;
$dmon = explode("," , $mon) ;
$dt = explode(",", $dt) ;

echo $dmon[10] ;
echo "07" ;

// //database thing

// include("dbcon.php") ;

// $len  = count($dviews) ;

// $delete = "DELETE from user_views" ;

// mysqli_select_db($conn, "wiki");


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
	
// 	$query = "insert into user_views values('$dviews[$i]' , '$dyear[$i]' , '$dmon[$i]' , '$dt[$i]') ;" ;

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
	
// } // for loop



//  // executing r script 
// exec('"D:\SOFTWARE\R-3.2.3\bin\Rscript.exe" "view_analyses.R" 2>&1', $output);

//   // return image tag

//   $nocache = rand();
//   print_r($output) ;

//   echo "<img src='myplot.png?$nocache' /> "; 

?>

</div>
</body>
</html>
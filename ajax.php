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
<br>
<h2 style="color:#212121">Basic Analysis of the Searched Article</h2>




<?php

$type = $_POST["type"] ;
$name = $_POST["name"] ;
$link = $_POST["link"] ;


// echo $type ;
// echo $name ;
// echo $link ;



$dtype = explode(",", $type) ;
$dname = explode(",", $name) ;
$dlink = explode(",", $link) ;


// // database thing

include("dbcon.php") ;

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
	
// } // for loop


	$filequery = "Select count(*) as filecount from table1 where type='File'" ;
	mysqli_select_db($conn , "wiki");

	$result = mysqli_query($conn , $filequery);

	while($row = mysqli_fetch_assoc($result)){
		echo $row["filecount"] ;
	}

	

//  // executing r script 
// exec('"D:\SOFTWARE\R-3.2.3\bin\Rscript.exe" "Rscript.R" 2>&1', $output);

//   // return image tag

//   $nocache = rand();
//   print_r($output) ;

//   echo "<img src='myplot.png?$nocache' /> "; 

?>

<script type="text/javascript">
	$(document).ready(function(){
		var s = $("#f").text()
	alert(s) ;
	})
</script>>

<div class="rows">

<div class="col-md-6">
<h1>Image comes here</h1>
<?php
$nocache = rand();
echo "<img src='myplot.png?$nocache' /> "; 
?>
</div>

<div class="col-md-6">
<br><br><br><br><br>
<div class="rows">  <!--- First row -->

<div class=col-md-3>
<button>file</button>
</div>
<div class=col-md-3>
<button>file2</button>
</div>
<div class=col-md-3>
<button>file3</button>
</div>
<div class=col-md-3>
<button>file4</button>
</div>

</div>

<div class="rows">   <!--- Second row -->
<br><br><br><br><br><br><br>
<div class="col-md-6">
<button id="f">file5</button>
</div>
<div class="col-md-6">
<button>file6</button>
</div>

</div>

<div class="rows">  <!--- third row -->
<br><br><br><br><br><br><br>
<div class=col-md-3>
<button>file7</button>
</div>
<div class=col-md-3>
<button>file8</button>
</div>
<div class=col-md-3>
<button>file9</button>
</div>
<div class=col-md-3>
<button>file10</button>
</div>

</div>

</div>

</div>

</body>
</html>

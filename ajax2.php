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

include("dbcon.php") ;

$len  = count($dviews) ;

$delete = "DELETE from user_views" ;

mysqli_select_db($conn, "wiki");


$status = mysqli_query($conn , $delete) ;

if(!$status)
{
	die('Could not '.mysqli_error());
}
else
{
	echo "query may be executed" ;
}

for ($i=0; $i < $len ; $i++) { 
	
	$query = "insert into user_views values('$dviews[$i]' , '$dyear[$i]' , '$dmon[$i]' , '$dt[$i]') ;" ;

mysqli_select_db($conn, "wiki");


$status = mysqli_query($conn , $query) ;

if(!$status)
{
	die('Could not '.mysqli_error());
}
else
{
	echo "query may be executed" ;
}
	
} // for loop



 // executing r script 
exec('"D:\SOFTWARE\R-3.2.3\bin\Rscript.exe" "view_analyses.R" 2>&1', $output);

  // return image tag

  $nocache = rand();
  print_r($output) ;

  echo "<img src='myplot.png?$nocache' /> "; 

?>
<?php

$type = $_POST["type"] ;
$name = $_POST["name"] ;
$link = $_POST["link"] ;


echo $type ;
echo $name ;
echo $link ;



$dtype = explode(",", $type) ;
$dname = explode(",", $name) ;
$dlink = explode(",", $link) ;

include("dbcon.php") ;

$len  = count($dtype) ;

$delete = "DELETE from table1" ;
$drop = "DROP TABLE sum" ;
mysqli_select_db($conn, "wiki");

mysqli_query($conn , $drop) ;
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
	
	$query = "insert into table1 values('$dtype[$i]' , '$dname[$i]' , '$dlink[$i]') ;" ;

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
exec('"D:\SOFTWARE\R-3.2.3\bin\Rscript.exe" "Rscript.R" 2>&1', $output);

  // return image tag

  $nocache = rand();
  print_r($output) ;

  echo "<img src='myplot.png?$nocache' /> "; 

?>




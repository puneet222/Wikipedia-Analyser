<?php

$name = $_GET['name'] ;
$type = $_GET['type'] ;
$link = $_GET['link'] ;
$i = $_GET['i'] ;

// echo $var ;

?>

<?php 

print($var);
$i = $i + 1 ;

include("dbcon.php") ;

$query = "insert into table1 values('$type' , '$name' , '$link') ;" ;
echo $query ;
// mysql_select_db("wiki") ;
// $sqlstatus = mysql_query($query,$conn);

mysqli_select_db($conn, "wiki");

/* return name of current default database */
$status = mysqli_query($conn , $query) ;

if(!$status)
{
	die('Could not '.mysqli_error());
}
else
{
	echo "query may be executed" ;
}


 header("location:analyze.php?i=$i");



?>
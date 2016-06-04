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

  <?php 
  $type = array();
  $name = array();
  $link = array() ;
  ?>
 
   <script type="text/javascript">
   			

	var v = "" ;


   	 $.ajax({
        type: "GET",
        url : "https://en.wikipedia.org//w/api.php?action=opensearch&format=json&search=c%2B%2B&limit=100&namespace=6%7C10%7C-2%7C-1%7C4%7C8%7C14%7C108%7C101%7C100%7C118%7C446&utf8=1&callback=?",
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

          	
          	// window.location.href = "ajax.php?name=" + q;
          
          }

          <?php

          $i = $_GET['i'] ; ?>
          
          var i = "<?php echo $i?>" ;
          console.log(i) ;

          var ty = type[i] ;
          var na = name[i] ;
          var li = link[i] ;
          // console.log(pu) ;
          // console.log(len) ;

          if(i < len)
          window.location.href = "ajax.php?type=" + ty + "&name="+na+ "&link=" + li+ "&i=" + i ;

          

          

          v = type[10] ;


          	// $.ajax({
          	// 	type: "POST" ,
          	// 	url : "ajax.php",
          	// 	data : "variable="+v ,
          	// 	success: function(data){
          	// 		alert(data) ;
          	// 	}
          	// })

          	//window.location.href = "ajax.php?name=" + v;




         }


       
      })

   </script>

 





   <script type="text/javascript">
var jvalue = 'this is javascript value';
// console.log("value of v is" + v) ;
<?php $abc = "<script>document.write(jvalue)</script>"?>   
</script>
<?php echo  $abc;

$leng = count($type) ;
echo $leng ;

// echo $ar[0];
	// echo "value iis : ".$value ;
?>








      
      <?php



      ?>

</div>
<body>

</html>
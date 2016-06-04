$(document).ready(function(){
  function doClear(target){
    alert("function is called");
    $(target).val="";
  }
  
  $("#bar").keypress(function(e){
    if(e.which == '13'){
      var x = $("#bar").val() ;
  //alert(x);
      var search = x ;
      
      $.ajax({
        type: "GET",
        url : "https://en.wikipedia.org/w/api.php?action=opensearch&format=json&search="+ search+"&limit=10&namespace=0&callback=?",
        contentType: "application/json; charset=utf-8",
        async: true,
        dataType : "json" ,
        success: function(data , textStatus, jqXHR){
          console.log(data);
          
          var len = data[1].length;
          //alert(len);
          for(var i=0 ; i<len ; i++)
            {
           ht = "<a href='" + data[3][i] + "' target='_blank'><div class='well'><h4><b>"+data[1][i]+"</b></h4><h5>"+ data[2][i] + "</h5></div></a>";
          
          $(".container").append(ht);
            }
          
           $(".well").hover(function(){
        $(this).css("background-color", "#A7FFEB");
       } , function(){
             $(this).css("background-color", "white");
           });
        }
        
       
      })

    }
  }) ;
});
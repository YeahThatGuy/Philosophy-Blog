$("#newUsers").submit( function() {
	return false;	
});

$("#sub").click( function() {
 $.post( $("#newUsers").attr("action"), 
         $("#newUsers :input").serializeArray(), 
         function(info){ $("#result").php(info); 
   });
});

$("#newPosts").submit( function() {
  return false;	
});

$("#sub").click( function() {
 $.post( $("#newPosts").attr("action"), 
         $("#newPosts :input").serializeArray(), 
         function(info){ $("#result").php(info); 
   });
});
 

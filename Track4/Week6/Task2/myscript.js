$(document).ready(function(){	

   $("#myform").submit(function(){

   	  var search = $("#books").val();
   	  if(search == "")
   	  {
   	  	alert("Please enter something in the field");
   	  }
   	  else{		
   	  var url = "";
   	  var img = "";
      var title = "";
      var author = "";
	  var hr_="";

   	  $.get("https://www.googleapis.com/books/v1/volumes?q=" + search,function(response){

          for(i=0;i<response.items.length;i++)
          {
           title=$('<h5 class="center-align white-text" style="padding-top:30px;">' + response.items[i].volumeInfo.title + '</h5>');  
           author=$('<h6 class="center-align white-text"> By:' + response.items[i].volumeInfo.authors + '</h6>');
           img = $('<img class="aligning card z-depth-5" id="dynamic"><br><a href=' + response.items[i].volumeInfo.infoLink + '><button id="imagebutton" class="btn #00c89c aligning">Read More</button></a>'); 	
           url= response.items[i].volumeInfo.imageLinks.thumbnail;
		   hr_=$('<div style="background-color:#323232; padding:1.5px;"></div>');
           img.attr('src', url);
           title.appendTo('#result');
           author.appendTo('#result');
           img.appendTo('#result');
		   if(i+1!=response.items.length) hr_.appendTo('#result');
          }
   	  });
      
      }
      return false;
   });

});
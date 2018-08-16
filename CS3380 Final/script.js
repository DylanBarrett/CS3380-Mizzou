
$(document).ready(function(){
    
    $("#tips").click(function(){
        updatePage('tips');
    });
    
    $("#home").click(function(){
        updatePage('home');
    });
    
    $("#tab").draggable();
 
});


function updatePage(id){
          $.get("updatePage.php", {"pageId": id}, function(data){
              data = JSON.parse(data);
              
              $("#contentBox").html(data.content);
              $("#tipLinks").html(data.tips);}
                )};






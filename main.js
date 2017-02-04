$(document).ready(function() {
	
	var currentPage = window.location + "";
	//currentPage = currentPage.substring(0, currentPage.length - 1);
	
	$(".chosen-select").chosen({disable_search_threshold: 10});
	
	$("#create_author").submit(function(e){
		e.preventDefault();
		$.post('serverscript.php?mod=addAuthor',{
			author: $('#create_author input[name="author"]').val()
		}, function(respond){			
			location.reload();
		});
	});
	
    $("#form").submit(function(e){
        e.preventDefault();
        
        $.post('serverscript.php?mod=add', {
			author: $('#form select[name="author"]').val(),
    		title: $('#form input[name="title"]').val(),
			id: $('#form input[name="id"]').val()
    	}, function(respond){
    					
			if(respond.lastPage){
				window.location = "/?page=" + respond.lastPage;
				$('input[name="author"]').val('');
				$('input[name="title"]').val('');
				
				
			}else{
				
				location.reload();
				
			}

    	});
    })
});

function removeBook(id){
   $.post('serverscript.php?mod=removeBook',{
            id: id
    	}, function(respond){
    	    
    	    window.location = "/?page=" + respond.lastPage;
    	    
    	});
}

function updateBook(id){
		
  	 $('#form input[name="add"]').val("Редактировать");
	 $.post('serverscript.php?mod=updateBook',{
            id: id
    	}, function(respond){
			$('#form input[name="title"]').val(respond.title);
		 	$('#form input[name="id"]').val(respond.id);
		 	$('#form select[name="author"] option').removeAttr("selected");
		 	
		 
		 $.each(respond.author, function( index, value ) {
			 
  			$('#form select[name="author"] option[value=' + value + ']').attr("selected", "selected");
		 });
		 
		 $(".chosen-select").trigger("chosen:updated");
		 
    	});	
	
}







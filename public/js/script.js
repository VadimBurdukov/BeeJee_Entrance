$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		var errorBlock = $('.error-block');
		var errorText = $('.error-text');
		var url = $(this).attr('action');
		event.preventDefault();
		$.ajax({	
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				try{
					json = jQuery.parseJSON(result)
					if (json.url) {
						window.location.href = json.url;
					} else {
						errorBlock.css("opacity", "1");
						errorText.text(json.message);
					}
				} 	
				catch{
					console.log(result);
				}
					
				
			},
		});
	});
	
});
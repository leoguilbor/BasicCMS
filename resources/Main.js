
function ajaxPost(urlx, datax,callback){
	$.ajax({ type: 'POST', 
		url: urlx, 
		data: datax, 
		dataType: 'html', 
		success: function(resp){
			console.log(resp);
			jsonResp = JSON.parse(resp);
			if(jsonResp.error==0){
				callback(jsonResp);
			}else{
				$('.error').html(jsonResp.error).insertAfter(".header");
				setTimeout(function(){$('.error').html("");}, 5000);
			}
		}
	});	
	
};




//------------------------------------------
    //Ajax JS
//------------------------------------------
jQuery(document).ready(function() {

});

function afterDoneAjax(){
}


// Step 2
function initDemoAjax(){ 
	jQuery(".vssavestep2").click(function(){
		var err = 0;
		
		//---------------
		if(err==0){ //alert('ajax-----');
			loadingStart();
			var eFormSubmit = jQuery("#id_form_save2");
			jQuery(eFormSubmit).submit(function(e)
			{ 
				var formObj = jQuery(this);
				
				var formData = new FormData(this);
					formData.append("action", "initVssavestep2");
				
				jQuery.ajax({
					url: JASAjaxURL,
					type: 'POST',
					data:  formData,
					dataType: 'json',
					contentType: false,
					processData:false,
					success: function(data, textStatus, jqXHR){ // console.log(data); 
						jQuery("#sec-cont-all-step").html(data.html);
						nextStep();
						afterDoneAjax();
						loadingStop();
						gotoEleId("#row-id-apply-visa");
					},
					error: function(jqXHR, textStatus, errorThrown){
					
					}          
				});
				e.preventDefault(); //Prevent Default action. 
				//e.unbind();
			});
			jQuery(eFormSubmit).submit();
		}
		return false;
	});
}
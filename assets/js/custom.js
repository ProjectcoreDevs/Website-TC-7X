$(document).ready(function() {
	
	$('.sendRegister').on('click',function(){
		$('.loadingShow').modal('show');
		setTimeout(function(){
			regUsername = $('.regUsername').val();
			regEmail = $('.regEmail').val();
			regPassword = $('.regPassword').val();
			regRepassword = $('.regRepassword').val();
			alert(regUsername+' - '+regEmail+' - '+regPassword+' - '+regRepassword);
			$.get('ajax/sendRegister.php?regUsername='+regUsername+'&regEmail='+regEmail+'&regPassword='+regPassword+'&regRepassword='+regRepassword, function(response){
				$('.loadingShow').modal('hide');
				if(response == 1){
					location.reload();
				}
				else{
					$('.regErrorShow').modal('show');
					$('.regErrorInfo').html(response);
				}
			});
		}, 2000);
		
		return false;
	});
	
});

$(window).scroll(function() {
    if($(this).scrollTop() > 10)
    {
        $('.navbar-trans').addClass('afterscroll');
    } else
    {
        $('.navbar-trans').removeClass('afterscroll');
    }  

});


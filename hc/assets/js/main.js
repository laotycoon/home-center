var $btnlogin = $('.btn');
$(function(){
    alert(2);
	$btnlogin.on('click',function(event) {
	    event.preventDefault();
        var bol=false;
        var m;
	    $.ajax({
			type:'post',
			url:'https://localhost:8443/sso/control/login',
			data:$('.login-form').serialize(),
			dataType:'json',
			async:false,
			error:function(msg){
			    m=msg;
			},
			success:function(msg){
			    bol=true;
                m=msg;
			}
		});
		if(bol)
        {
            alert(11);
            alert(m._LOGIN_PASSED_);
        }else{
            alert(22);
            alert(m._LOGIN_PASSED_);
        }
	});
});
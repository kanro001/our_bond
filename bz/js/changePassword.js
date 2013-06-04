window.onload = function(){
	
	var passwordObj = document.getElementById("newpassword");
	var re_passwordObj = document.getElementById("re_password");

	passwordObj.onblur = checkPassword;
	re_passwordObj.onblur = checkPasswordConfirm;
 
	function checkPassword(){
		var passwordValue = passwordObj.value;
		var passwordRegex = /^\w{8,}$/;
		var msg ="&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
		if (!passwordValue)
			msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can't leave this empty!</font>";
		else
			if (!passwordRegex.test(passwordValue)) {
				msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Short passwords are easy to guess. Try one with at least 8 characters.</font>";
			}
		var span = document.getElementById("passwordSpan");
		span.innerHTML = msg;
		return msg == "&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
	}
 
 
	function checkPasswordConfirm(){
		var re_passwordValue = re_passwordObj.value;
		var passwordValue = passwordObj.value;
		var msg ="&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
		if (!re_passwordValue)
			msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can't leave this empty!</font>";
		else if (re_passwordValue != passwordValue)
			msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;These passwords don't match. Try again?</font>";
		var span = document.getElementById("re_passwordSpan");
		span.innerHTML = msg;
		return msg == "&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
	}
 
	var form = document.getElementById("changepassword_form");
	form.onsubmit = function(){

		if(passwordObj.value!==""&&re_passwordObj.value!=="")
			return true;
		return false;
	};

  	function trim(s){
  		return s.replace(/^\s+|\s+$/g,"");
  	}
 };
window.onload = function(){
	
	var firstnameObj = document.getElementById("firstname");
	var lastnameObj = document.getElementById("lastname");
	var emailObj = document.getElementById("email");
	var re_emailObj= document.getElementById("re_email");
	var passwordObj = document.getElementById("password");
	var re_passwordObj = document.getElementById("re_password");
	var sexObj = document.getElementById("sex");
	var monthObj = document.getElementById("month");
	var yearObj = document.getElementById("year");
	var dayObj = document.getElementById("day");
	
	firstnameObj.onblur = checkName;
	lastnameObj.onblur = checkLastname;
	emailObj.onblur = checkEmail;
	re_emailObj.onblur = checkEmailConfirm;
	passwordObj.onblur = checkPassword;
	re_passwordObj.onblur = checkPasswordConfirm;
	sexObj.onblur = checkSex;
	yearObj.onblur = checkBirthday;
  
  
 

	function checkName(){
		var nameValue = trim(firstnameObj.value);
		var nameRegex = /^[a-zA-Z_][a-zA-Z']{0,9}$/;
		var msg ="&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
		if(!nameValue)
			msg ="<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can't leave this empty!</font>";
		else if(!nameRegex.test(nameValue))
			msg ="<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please only use letters.</font>";
		var span = document.getElementById("firstnameSpan");
		span.innerHTML = msg;
		return msg == "&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
	}
	
	function checkLastname(){
		var nameValue = trim(lastnameObj.value);
		var nameRegex = /^[a-zA-Z_'][a-zA-Z']{0,9}$/;
		var msg ="&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
		if(!nameValue)
			msg ="<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can't leave this empty!</font>";
		else if(!nameRegex.test(nameValue))
			msg ="<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please only use letters.</font>";
		var span = document.getElementById("lastnameSpan");
		span.innerHTML = msg;
		return msg == "&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
	}
 
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
 
	function checkEmail(){
		var emailObjValue = emailObj.value;
		var emailRegex = /^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]+$/;
		var msg ="&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
		if(!emailObjValue)
			msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can't leave this empty!</font>";
		else if(!emailRegex.test(emailObjValue))
			msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please use only letters (a-z), numbers, and periods.</font>";
		var span = document.getElementById("emailSpan");
		span.innerHTML = msg;
		return msg == "&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
	}
	
	function checkEmailConfirm(){
		var re_emailValue = re_emailObj.value;
		var emailValue = emailObj.value;
		var msg ="&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
		if (!re_emailValue)
			msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can't leave this empty!</font>";
		else if (re_emailValue != emailValue)
			msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;These passwords don't match. Try again?</font>";
		var span = document.getElementById("re_emailSpan");
		span.innerHTML = msg;
		return msg == "&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
	}
 
	function checkSex(){
		var sexValue = sexObj.value;
		var msg ="&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
		if(sexValue=="Show")
			msg = "<font color='red'>&nbsp;You can't leave this empty!</font>";
		var span = document.getElementById("sexSpan");
		span.innerHTML = msg;
		return msg == "&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
	}
	
	function checkBirthday(){
		var monthValue = monthObj.value;
		var dayValue = dayObj.value;
		var yearValue = yearObj.value;
		var msg ="&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
		if(!monthValue && !dayValue && !yearValue)
			msg = "<font color='red'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You can't leave this empty!</font>";
		var span = document.getElementById("birthdaySpan");
		span.innerHTML = msg;
		return msg == "&nbsp;&nbsp;&nbsp;<img src='img/ok.gif' style='width:24px'>";
	}
 
	var form = document.getElementById("register_form");
	form.onsubmit = function(){
		/*alert("sasas");
		var firstname = checkFirstname();
		alert(firstname+"111");
		var lastname = checkLastname();
		alert("lastname");
		var email = checkEmail();
		var re_email = checkEmailConfirm();
		var password = checkPassword();
		var re_password = checkPasswordConfirm();
		var birthday = checkBirthday();
		var sex = checkSex();
		var truth = firstname && lastname && email && re_email && password && re_password && birthday && sex;
		alert(truth);
		return truth;*/
		if(firstnameObj.value!==""&&lastnameObj.value!==""&&passwordObj.value!==""&&re_passwordObj.value!==""&&
				sexObj.value!=="Show"&&emailObj.value!==""&&re_emailObj.value!==""&&yearObj.value!=="show"&&
				monthObj.value!=="show"&&dayObj.value!=="show")
			return true;
		return false;
	};

  	function trim(s){
  		return s.replace(/^\s+|\s+$/g,"");
  	}
 };


function year_birthday(){
	var Sel = document.getElementById("year"), iMin = 1970, iMax = 2012;
	var len = iMax - iMin + 1; Sel.options.length = len;
	for (var i = 1; i < len; i++) {
		Sel.options[i].text = Sel.options[i].value = iMin + i;
	}
	Sel.selectedIndex = 18;
	Sel.onmouseover = function(){
		return false;
	};
}
 
function month_birthday(){
	var Sel = document.getElementById("month"), iMin = 0, iMax = 12;
	var len = iMax - iMin + 1; Sel.options.length = len;
	for (var i = 1; i < len; i++) 
	{ 
		Sel.options[i].text = Sel.options[i].value = iMin + i; 
		}
	Sel.selectedIndex =	11;
}

function day_birthday(){
	 var year = document.getElementById("year").value;
	 var month = document.getElementById("month").value;
	 if(!year && !month){
		var Sel = document.getElementById("day"), iMin = 0, iMax = 31;
		var len = iMax - iMin + 1; Sel.options.length = len;
		for (var i = 1; i < len; i++) 
		{ 
			Sel.options[i].text = Sel.options[i].value = iMin + i; 
		}
	 }
	 else if(isLeapYear(year)&& month==2){
		var Sel = document.getElementById("day"), iMin = 0, iMax = 29;
		var len = iMax - iMin + 1; Sel.options.length = len;
		for (var i = 1; i < len; i++) 
		{ 
			Sel.options[i].text = Sel.options[i].value = iMin + i; 
		}
	 }
	 else if(month==2){
		var Sel = document.getElementById("day"), iMin = 0, iMax = 28;
		var len = iMax - iMin + 1; Sel.options.length = len;
		for (var i = 1; i < len; i++) 
		{ 
			Sel.options[i].text = Sel.options[i].value = iMin + i; 
		}
	 }
	 else if(month==4||month==6||month==9||month==11){
		var Sel = document.getElementById("day"), iMin = 0, iMax = 30;
		var len = iMax - iMin + 1; Sel.options.length = len;
		for (var i = 1; i < len; i++) 
		{ 
			Sel.options[i].text = Sel.options[i].value = iMin + i; 
		}
	 }
	 else{
		var Sel = document.getElementById("day"), iMin = 0, iMax = 31;
		var len = iMax - iMin + 1; Sel.options.length = len;
		for (var i = 1; i < len; i++) 
		{ 
			Sel.options[i].text = Sel.options[i].value = iMin + i; 
		}
	 }

	Sel.selectedIndex = 8;
	Sel.onmouseover = function(){
		return false;
	};
}

function isLeapYear(y){
	var d = new Date(y + "/2/29");
	if(d.getDate() == 29) {
		return true;
	}else{
	    return false;
	}
}

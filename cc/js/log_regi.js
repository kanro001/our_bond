var source;

function log_regi(e){
	source = e.target;
	if(source.name == "login")
		window.location.href = "../bz/log_form.php";
	if(source.name == "register")
		window.location.href = "../bz/register_form.php";
}


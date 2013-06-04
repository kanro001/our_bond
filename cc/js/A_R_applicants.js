var a = new XMLHttpRequest();
var source;

function initialize(file,url){
	a.open("POST",file,true);
	a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	a.onreadystatechange = newmanagepage;
	a.send(url);
}

function A_R_applicants(e){
	source = e.target;
	if(source.name == "K")
		url = "uid="+source.id+"&type=a";
	else
		url = "uid="+source.id+"&type=r";
	initialize("A_R_applicants.php",url);
}

function newmanagepage(){
	var back = a.responseText;
	if(back == "atrue" || back == "rtrue")
		window.location.href = "applicantlist.php";
	if(back == "novalue")
		alert("data send error");
}
var a = new XMLHttpRequest();
var source;

function quitbond(){
	var choice = window.confirm("You sure want to quit this bond?");
	if(choice == true){
		a.open("POST","quitbond.php",true);
		a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		a.onreadystatechange = quit;
		a.send();
	}
}

function quit(){
	var back = a.responseText;
	if(a.readyState == 4 && a.status == 200){
		if(back == "novalue")
			alert("send data error");
		else if(back == "query error")
			alert("delete data error");
		else if(back == "founder")
			alert("You must give the founder to others before you quit the bond");
		else
			window.location.href = "group.php";
	}
}
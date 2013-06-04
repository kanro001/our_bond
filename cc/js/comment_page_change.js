var a = new XMLHttpRequest();
var source;

function comment_page_change(e){
	source = e.target;
	url = "page="+source.innerHTML;
	a.open("POST","comment_page_change.php",true);
	a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	a.onreadystatechange = backpage;
	a.send(url);
}

function backpage(){
	if(a.readyState == 4 && a.status == 200){
		var back = a.responseText;
		if(back == "novalue")
			alert("data sent error");
		else{
			div = document.getElementById("one_page_c");
			div1 = document.getElementById("c_t_p");
			div.removeChild(div1);
			div.innerHTML = back;
		}
	}
}
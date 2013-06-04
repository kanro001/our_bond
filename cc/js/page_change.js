var a = new XMLHttpRequest();
var source;

function page_change(e){
	source = e.target;
	var page = source.innerHTML;
	a.open("POST","page_change.php",true);
	a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	url = "page="+page;
	a.onreadystatechange = backhtml;
	a.send(url);
}

function backhtml(){
	if(a.readyState == 4 && a.status == 200){
		var back = a.responseText;
		body = source.parentNode.parentNode;
		table = document.getElementById("page_change");
		div = document.getElementById("div_page");
		page = document.getElementById("div_num");
		div.removeChild(table);
		div.removeChild(page);
		div.innerHTML = back;
	}
}
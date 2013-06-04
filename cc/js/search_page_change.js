var a = new XMLHttpRequest();
var source;

function search_page_change(e){
	source = e.target;
	var page = source.innerHTML;
	a.open("POST","search_page_change.php",true);
	a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	url = "page="+page+"&content="+source.id;
	a.onreadystatechange = backhtml;
	a.send(url);
}

function backhtml(){
	if(a.readyState == 4 && a.status == 200){
		var back = a.responseText;
		body = source.parentNode.parentNode;
		table = document.getElementById("page_change");
		div = document.getElementById("div_page");
		div.removeChild(table);
		div.innerHTML = back;
	}
}
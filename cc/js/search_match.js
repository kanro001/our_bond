var a = new XMLHttpRequest();
var source;

function search_match(e){
	source = e.target.previousSibling.previousSibling;
	var content = source.value;
	a.open("POST","search_match.php",true);
	a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	url = "content="+content;
	a.onreadystatechange = backmatch;
	a.send(url);
}

function backmatch(){
	if(a.readyState == 4 && a.status == 200){
		var back = a.responseText;
		body = source.parentNode.parentNode;
		reg = /nokeywords/;
		if(back.search(reg) > 0)
			alert("You cannot search for empty keywords");
		else{
			table = document.getElementById("page_change");
			div = document.getElementById("div_page");
			tool = document.getElementById("toolbar");
			page = document.getElementById("div_num");//remove the links of the page numbers
			div.removeChild(page);
			div.removeChild(table);
			div.innerHTML = back;
		}
	}
}
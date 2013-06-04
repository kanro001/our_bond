function hide_bond($id){
	var obj = document.getElementById(id);
	var clicked = 1;
	if(clicked == 1){
		obj.style.display ="none";
		clicked = 0;
	}
	else{
		obj.style.display = "block";
		clicked = 1;
	}
}

window.onscroll=function(){
	var div = document.getElementById("member_recommendations");
	var div2 = document.getElementById("header");
	var div3 = document.getElementById("member_menu");
	div.style.top = document.body.scrollTop;
	div2.style.top = document.body.scrollTop;
	div3.style.top = document.body.scrollTop;
	
};

function move(){
	//window.onscroll();
	var div = document.getElementById("member_recommendations");
	var div2 = document.getElementById("header");
	var div3 = document.getElementById("member_menu");
	
	div.style.top = document.body.scrollTop;
	div2.style.top = document.body.scrollTop;
	div3.style.top = document.body.scrollTop;
	settimeout(move(),50);
}
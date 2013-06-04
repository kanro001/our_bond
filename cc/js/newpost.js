var newwindow;
var a = new XMLHttpRequest();

function newpost(){
	newwindow = window.open("newpost.html","newpost","width=400,height=500");
	left = (window.screen.width - 400)/2;
	newwindow.moveBy(left,(window.screen.height - 500)/2);
}

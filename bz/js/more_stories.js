var xmlhttp4 = null;

function getXHR4(){
    
    if (window.XMLHttpRequest)
    {
    	//all modern browsers
    	xmlhttp4=new XMLHttpRequest();
    }
    else
    {
    	xmlhttp4=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
	xmlhttp4.onreadystatechange=function()
	{
		
		if (xmlhttp4.readyState==4 && xmlhttp4.status==200)
	    {
			document.getElementById("member_items_content").innerHTML = xmlhttp4.responseText;
	    }
	};
}

function more(){
	getXHR4();
    xmlhttp4.open("GET","more_stories.php",false);
    xmlhttp4.send();
    xmlhttp4=null;
}

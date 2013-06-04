var xmlhttp2 = null;

function getXHR2(){
    
    if (window.XMLHttpRequest)
    {
    	//all modern browsers
    	xmlhttp2=new XMLHttpRequest();
    }
    else
    {
    	xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
	xmlhttp2.onreadystatechange=function()
	{
		if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
	    {
			//document.getElementById(comments_id).innerHTML=xmlhttp.responseText;
				window.location.replace("../cc/group.php");

	    }
		
	};
}


function toGroup(group_id){
	getXHR2();
	xmlhttp2.open("POST", "group_para.php", false);
	xmlhttp2.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp2.send("gid="+group_id);
	xmlhttp2=null;
}



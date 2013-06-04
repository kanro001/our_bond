var xmlhttp = null;

function getXHR(comments_id){
    
    if (window.XMLHttpRequest)
    {
    	//all modern browsers
    	xmlhttp=new XMLHttpRequest();
    }
    else
    {
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
			document.getElementById(comments_id).innerHTML=xmlhttp.responseText;
	    }
		
	};
}

function showComments(post_id){
    xmlhttp.open("GET","getComments.php?post="+post_id,false);
    xmlhttp.send();
    xmlhttp = null;
}
function sendComment(user_id, input_id, post_id, comments_id){
    //press enter to send message
    if(event.keyCode==13){

        getXHR(comments_id);
        var txtObj = document.getElementById(input_id);
        var str = txtObj.value;
        if(str.replace(/\s+/g,'')==""){
            alert("your comment is empty!");
        }else{
        	str=str.replace("&","\&");
            xmlhttp.open("Post","sendComment.php?uid="+user_id+"&post="+post_id+"&txt="+str,false);
            xmlhttp.send("uid="+user_id+"&post_id="+post_id+"&");
            txtObj.value="";
            xmlhttp=null;
            getXHR(comments_id);
            showComments(post_id);
        }
    }
}



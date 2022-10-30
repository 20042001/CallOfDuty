// JavaScript Document
function nuevoAjax(){
	var xmlhttp=false;
 	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e){
 		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (E){
 			xmlhttp = false;
 		}
  	}
	if(!xmlhttp && typeof XMLHttpRequest!='undefined'){
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function Validame(U,S,N,A){
	var Codigo = document.getElementById('Codigo').value;
	
	var Ajax = nuevoAjax();
	var Page = "Ajax/Ajax.php";
	var Send = "Validame="+Codigo;
	var iMsg = document.getElementById('Mensaje');
	
	Ajax.open("POST", Page, true);
	iMsg.innerHTML='Validando el codigo...';
	
	Ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    Ajax.setRequestHeader("Content-length", Send.length);
    Ajax.setRequestHeader("Connection", "close");
	Ajax.onreadystatechange=function(){
		if(Ajax.readyState==4){
			iMsg.innerHTML=Ajax.responseText;
		}
	}
	Ajax.send(Send);
}
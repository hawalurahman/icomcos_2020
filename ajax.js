// JavaScript Document
function getXMLHttpRequest(){
	if(window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
	}else if(window.XMLHttpRequest){
		return new XMLHttpRequest();	
	}else alert("Status : Can not create XMLHttpRequest Object");
}
var xmlhttp=getXMLHttpRequest();


function Request(str,str1,posisi)
{ 
	
	var url = str+"?id="+str1+"&page_id="+Math.random()*99999;
	var obj=document.getElementById(posisi);
       	obj.innerHTML="<center><br><br><img src='./ajax-loader.gif' /></center>";
       	
	if ((xmlhttp.readyState==4)||(xmlhttp.readyState===0)) {
		xmlhttp.open('GET',url,true);
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				obj.innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.send(null);
	}
}


function sendRequest(str,strd,kd,strdoc,posisi)
{   
	var xmlhttp=getXMLHttpRequest();
	switch (str)
	{   
		case 'saveuser.php' :
				var url = str+"?idu="+strd+"&act="+kd+"&namadepan="+strdoc.namadepan.value+"&namatengah="+strdoc.namatengah.value+"&namaakhir="+strdoc.namaakhir.value+"&title="+strdoc.title.value+"&instansi="+strdoc.instansi.value+"&participant="+strdoc.participant.value+"&departemen="+strdoc.departemen.value+"&kota="+strdoc.kota.value+"&country="+strdoc.country.value+"&email="+strdoc.email.value+"&hp="+strdoc.hp.value+"&password1="+strdoc.password1.value+"&stat=0&kode="+strdoc.kode.value+"&page_id="+Math.random()*99999;
				break;				
		case 'savelupa.php' :
				url = str+"?idu="+strd+"&act="+kd+"&email="+strdoc.email.value+"&kode="+strdoc.kode.value+"&page_id="+Math.random()*99999;
				break;				
		case 'savepass.php' :
				url = str+"?idu="+strd+"&act="+kd+"&email="+strdoc.email.value+"&pass1="+strdoc.password1.value+"&pass2="+strdoc.password2.value+"&page_id="+Math.random()*99999;
				break;				

//		default : alert("Maaf dalam taraf Perbaikan !! ");
	}
	var obj=document.getElementById(posisi);
       	obj.innerHTML="<center><br><br><img src='./ajax-loader.gif' /></center>";
	if(xmlhttp.readyState==4 || xmlhttp.readyState==0){
		xmlhttp.open('GET',url,true);
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				obj.innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.send(null);
	}
}

function cariRequest(str,strdoc,posisi)
{ 
	switch (str)
	{ 
		case 'cekcari.php' : 
				var url = str+"?katakunci="+strdoc.cari.value+"&page_id="+Math.random()*99999;
				break;				
		default : alert("Maaf dalam taraf Perbaikan !! ");
	}
	var obj=document.getElementById(posisi);
       	obj.innerHTML="<center><br><br><img src='ajax-loader.gif' /></center>";
	if(xmlhttp.readyState==4 || xmlhttp.readyState==0){
		xmlhttp.open('GET',url,true);
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4 && xmlhttp.status==200){
				obj.innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.send(null);
	}
}

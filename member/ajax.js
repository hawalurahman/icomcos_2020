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
	
	var url = str+"?id="+str1+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
	var obj=document.getElementById(posisi);	
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

function AEditRequest(str,str1,vardit,posisi)
{ 
	
	var url = str+"?id="+str1+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
	var obj=document.getElementById(posisi);	
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


function EditRequest(str,str1,vardit,posisi)
{ 
	var xmlhttp=getXMLHttpRequest();
	switch (vardit)
	{   
		case 'namadepan' :
			var url = str+"?id="+str1.namadepan.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'namatengah' :
			var url = str+"?id="+str1.namatengah.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'namaakhir' :
			var url = str+"?id="+str1.namaakhir.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'nmtitle' :
			var url = str+"?id="+str1.nmtitle.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'nmaffi' :
			var url = str+"?id="+str1.nmaffi.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'nmdepart' :
			var url = str+"?id="+str1.nmdepart.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'nmcity' :
			var url = str+"?id="+str1.nmcity.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'title' :
			var url = str+"?id="+str1.judul.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'keyword' :
			var url = str+"?id="+str1.keyword.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'kategori' :
			var url = str+"?id="+str1.pkat.value+"&varedit="+vardit+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
		case 'savestpaper.php' :
			var url = vardit+"?varst="+str1.value+"&id="+str+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
			
		case 'savepesan.php' :
			var url = vardit+"?idpp="+str1.idp.value+"&namast="+str1.nmst.value+"&id="+str1.idu.value+"&ketst="+str1.keter.value+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;
        
        case 'savebalas.php' :
			var url = vardit+"?idpp="+str1.idp.value+"&subyekp="+str1.subyek.value+"&idup="+str1.idu.value+"&idtp="+str1.idt.value+"&pesanp="+str1.pesan.value+"&lokasi="+posisi+"&page_id="+Math.random()*99999;
			break;



		default : alert("Maaf dalam taraf Perbaikan !! ");
				break;
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


function sendRequest(str,strd,kd,strdoc,posisi)
{  
	var xmlhttp=getXMLHttpRequest();
	switch (str)
	{   
		case 'saveuser.php' :
				var url = str+"?idu="+strd+"&act="+kd+"&nm="+strdoc.nama_lengkap.value+"&ins="+strdoc.instansi.value+"&email="+strdoc.email.value+"&hp="+strdoc.hp.value+"&pass="+strdoc.password.value+"&page_id="+Math.random()*99999;
				break;				
		case 'savestatus.php' :
				var url = str+"?idu="+strd+"&act="+kd+"&stat="+strdoc.statuspeserta.value+"&jdl="+strdoc.judul.value+"&idkat="+strdoc.pkategori.value+"&auth1="+strdoc.author1.value+"&had1="+strdoc.hadir1.value+"&auth2="+strdoc.author2.value+"&had2="+strdoc.hadir2.value+"&auth3="+strdoc.author3.value+"&had3="+strdoc.hadir3.value+"&auth4="+strdoc.author4.value+"&had4="+strdoc.hadir4.value+"&keyw="+strdoc.keyword.value+"&page_id="+Math.random()*99999;
				break;				
		case 'ketbayar.php' :
				var url = str+"?id="+strd+"&iddiv="+posisi+"&page_id="+Math.random()*99999;
				break;				
		case 'kwitansi.php' :
				var url = str+"?idu="+strd+"&act="+kd+"&jumlah="+strdoc.jumlah.value+"&rupiah="+strdoc.rupiah.value+"&keterangan="+strdoc.keterangan.value+"&id="+strdoc.id.value+"&nm="+strdoc.nm.value+"&page_id="+Math.random()*99999;
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

function resendRequest(str,strd,kd,strdoc,posisi)
{  
	var xmlhttp=getXMLHttpRequest();
	switch (str)
	{   
		case 'saveuser.php' :
				var url = str+"?idu="+strd+"&act="+kd+"&nm="+strdoc.nama_lengkap.value+"&ins="+strdoc.instansi.value+"&email="+strdoc.email.value+"&hp="+strdoc.hp.value+"&pass="+strdoc.password.value+"&page_id="+Math.random()*99999;
				break;				
		case 'savestatus.php' :
				var url = str+"?idu="+strd+"&act="+kd+"&stat="+strdoc.statuspeserta.value+"&jdl="+strdoc.judul.value+"&idkat="+strdoc.pkategori.value+"&auth1="+strdoc.author1.value+"&had1="+strdoc.hadir1.value+"&auth2="+strdoc.author2.value+"&had2="+strdoc.hadir2.value+"&auth3="+strdoc.author3.value+"&had3="+strdoc.hadir3.value+"&auth4="+strdoc.author4.value+"&had4="+strdoc.hadir4.value+"&auth5="+strdoc.author5.value+"&had5="+strdoc.hadir5.value+"&auth6="+strdoc.author6.value+"&had6="+strdoc.hadir6.value+"&auth7="+strdoc.author7.value+"&had7="+strdoc.hadir7.value+"&auth8="+strdoc.author8.value+"&had8="+strdoc.hadir8.value+"&auth9="+strdoc.author9.value+"&had9="+strdoc.hadir9.value+"&auth10="+strdoc.author10.value+"&had10="+strdoc.hadir10.value+"&auth11="+strdoc.author11.value+"&had11="+strdoc.hadir11.value+"&auth12="+strdoc.author12.value+"&had12="+strdoc.hadir12.value+"&keyw="+strdoc.keyword.value+"&page_id="+Math.random()*99999;
				break;				
		case 'ketbayar.php' :
				var url = str+"?id="+strd+"&iddiv="+posisi+"&page_id="+Math.random()*99999;
				break;				
		case 'kwitansi.php' :
				var url = str+"?idu="+strd+"&act="+kd+"&jumlah="+strdoc.jumlah.value+"&rupiah="+strdoc.rupiah.value+"&keterangan="+strdoc.keterangan.value+"&id="+strdoc.id.value+"&nm="+strdoc.nm.value+"&page_id="+Math.random()*99999;
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


function seton(){
	document.getElementById("isimklh").style.display = "block";
}

function setoff(){
	document.getElementById("isimklh").style.display = "none";
}

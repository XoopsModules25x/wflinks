// Source unknown!!

mes_pr = "Preview";
mes_cpr = "Close Preview";
previewSize = 650;
displayPreview=1;
var ns6=document.getElementById&&!document.all;
var ie4=document.all;
var agt=navigator.userAgent.toLowerCase();
var is_major = parseInt(navigator.appVersion);
var is_minor = parseFloat(navigator.appVersion);
var is_nav  = ((agt.indexOf('mozilla')!=-1) && (agt.indexOf('spoofer')==-1)
            && (agt.indexOf('compatible') == -1) && (agt.indexOf('opera')==-1)
            && (agt.indexOf('webtv')==-1) && (agt.indexOf('hotjava')==-1));
var is_nav2 = (is_nav && (is_major == 2));
var is_nav3 = (is_nav && (is_major == 3));
var is_nav4 = (is_nav && (is_major == 4));
function Maximize(id, sURL){
	var preview;
	preview=new String(document.getElementById("idMax" + id).innerHTML);
	var i=preview.indexOf("Max<");
	if(i > 0){	
		document.getElementById("idFrame" + id).height = 600;
		document.getElementById("idMax" + id).innerHTML = ' &nbsp; <a href="javascript:Maximize(' + id + ', \'' + sURL + '\')">Min</a>';
		document.getElementById("idFrame" + id).src = sURL;
	}else{
		document.getElementById("idFrame" + id).height = previewSize;
		document.getElementById("idMax" + id).innerHTML = ' &nbsp; <a href="javascript:Maximize(' + id + ', \'' + sURL + '\')">Max</a>';
		document.getElementById("idFrame" + id).src = sURL;
	}
}
function OnPreview(n, sUrl) {
  var prevID = n;  
  var preview;
  if(!ns6){
		preview=document.getElementById("id" + prevID).innerText;
  }else{
		preview=document.getElementById("id" + prevID).childNodes[0].nodeValue;		
  }
//  var temp = new String(sUrl);
  if(preview == "Quick View"){
	document.getElementById("id" + prevID).innerHTML = "Close Quick View";
	document.getElementById("id" + prevID).style.cssText = "";
	if(!ns6)		
		document.getElementById("idSpan" + prevID).style.visibility = "visible";

	document.getElementById("idMax" + prevID).style.visibility = "visible";
	document.getElementById("idShow" + prevID).style.display = "block";
	document.getElementById("idFrame" + prevID).src = sUrl;
  }
  else{
	document.getElementById("id" + prevID).innerHTML = "Quick View";
	document.getElementById("id" + prevID).style.cssText = "";
	if(!ns6)	
		document.getElementById("idSpan" + prevID).style.visibility = "hidden";
	document.getElementById("idMax" + prevID).style.visibility = "hidden";

	document.getElementById("idShow" + prevID).style.display = "none";
	document.getElementById("idFrame" + prevID).src = "";
  }
  // BUGBUG - for Netscape 6.0 & 6.01 - force screen redraw; do not remove.
  //window.resizeBy( -1, -1 );
  //window.resizeBy( 1, 1 );
}
function ppreview(url, id) {
var ti = url.replace(/'/g, '\\\'');
ti = ti.replace(/<b>/g, '');
ti = ti.replace(/<\/b>/g, '');
  if(is_nav4 == false)
 	document.write(" &nbsp; <A class=\"sl\" href=\""+url+"\" id=id"+id+" onClick=\"OnPreview("+id+",'"+ti+"');return false\">Quick View</A>");
  }
function potherfunctions(url, id, title) {
var ti = title.replace(/'/g, '\\\'');
ti = ti.replace(/<b>/g, '');
ti = ti.replace(/<\/b>/g, '');	
  if(is_nav4 == false)
  {	document.write("<span class=sl id=\"idMax"+id+"\" STYLE=\"visibility:hidden\"> &nbsp; <a href=\""+url+"\" onClick=\"javascript:Maximize("+id+",'"+url+"');return false\">Max</a></span> &nbsp; ");
	if(!ns6)
		document.write("<span class=sl id=\"idSpan"+id+"\" STYLE=\"visibility:hidden\"><a href=\""+url+"\" onClick=\"javascript:window.external.AddFavorite('"+url+"','"+ti+"');return false\">Bookmark</a></span>");  
	document.write("<div class=sl id=\"idShow"+id+"\" STYLE=\"display:none\"><iframe ID=\"idFrame"+id+"\" HEIGHT=\"300\" SRC WIDTH=\"100%\"></iframe></div>");
  }
  }

function facebPopUp(URL) { day = new Date();id = day.getTime();eval("page"+id+" = window.open(URL, '"+id+"', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=640,height=480,left = 20,top = 22');"); return false;}
function ss(w){window.status=w;return true;}
function cs(){window.status='';}
function cl(el,ct,ps){if(document.images){(new Image()).src = "url?ct="+escape(ct)+"&ps="+escape(ps)+"&url="+escape(el.href);}return true;}function clb(u,a,t,p,n){if(document.images){(new Image()).src = "urlredir?a="+escape(a)+"&t="+escape(t)+"&p="+escape(p)+"&n="+escape(n)+"&u="+escape(u.href)+"&q="+escape('avatars');}return true;}
function sf(){document.f.q.focus();} function qs(el,addChar) {if (window.RegExp && window.encodeURIComponent) {var qe=encodeURIComponent(document.f.q.value); if (el.href.indexOf("q=")!=-1) { el.href=el.href.replace(new RegExp("q=[^&$]*"),"q="+qe);} else {el.href+=addChar+"&q="+qe;}}return 1;}


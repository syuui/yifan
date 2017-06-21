/**
 * 
 */

function removeLayer() {
	$("#popup_win").remove();
}

function mLayerShow(url) {
	var xmlhttp, xmlDoc, cnt, ndiv, txt;

	// Prepare XMLHttpRequest ojbect for Ajax
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera,
		// Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	// Send HTTP Request
	xmlhttp.open("GET", url, true);
	xmlhttp.send();

	// Actions when HTTP Responses arrivaled
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			ndiv = document.createElement("div");
			ndiv.innerHTML = xmlhttp.responseText;
			$("#contain").append(ndiv);
		}
	}
}
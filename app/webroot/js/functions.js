/**
 * 
 */

function removeLayer() {
	$("#popup_win").remove();
}

function mLayerAction(url) {

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
			$("#saveItem").click(function() {
				$("#currentAction").val('E');
				var formParam = $("#saveItem").closest('form').serialize();
				$.ajax({
					type : 'post',
					url : url,
					data : formParam,
					cache : false,
					success : function(data) {
						location.reload();
					}
				});
			});
			$("#deleteItem").click(function() {
				$("#currentAction").val('D');
				/*
				 * var formParam = $("#VariableAdminLanhamEditpicForm")
				 * .serialize();// 序列化表格内容为字符串
				 */
				var formParam = $("#deleteItem").closest('form').serialize();
				$.ajax({
					type : 'post',
					url : url,
					data : formParam,
					cache : false,
					success : function(data) {
						location.reload();
					}
				});
			});
		}
	}
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

function switchOnOff(ndiv) {
	var ele = $(event.target);
	var val = ele.html();

	if (val == '+') {
		$("#" + ndiv).css('display', 'block');
		ele.html("-");
	} else {
		$("#" + ndiv).css('display', 'none');
		ele.html("+");
	}
	location.href = "#" + ndiv;
}
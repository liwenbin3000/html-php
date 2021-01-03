function ajaxRequest(t) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else if (window.ActiveXObject) {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		if (xmlhttp != null) {
			xmlhttp.onreadystatechange = state_Change;
			String = t.attributes.name.value + "=" + t.value;
			if (t.attributes.name.value == 'password-confirm') {
				form = document.forms[0];
				String += "&password=" + form.password.value;
			}
			xmlhttp.open("POST", 'signup-xml.php', true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(String);
		} else {
			alert("您的浏览器不支持 XMLHTTP.");
		}
	}

function state_Change() {
	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		res = xmlhttp.responseXML;
		content = res.getElementsByTagName("content")[0].innerHTML;
		name = res.getElementsByTagName("name")[0].innerHTML;
		document.getElementById(name).innerHTML = content;
	}
}

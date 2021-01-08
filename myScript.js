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

function ajaxRequest1(t) {
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
        xmlhttp.open("POST", 'changepassword-xml.php', true);
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

var validateName = function () {
    name_info = document.getElementById('username_1');
    if (name_info.innerHTML == "用户名有效") { //验证是否为空
        return true;
    } else {
        return false;
    }
}

var validatePassword = function () {
    password_info = document.getElementById('password_1');
    if (password_info.innerHTML == "密码有效") {
        return true;
    } else {
        return false;
    }
}

var validateConPassword = function () {
    password_confirm_info = document.getElementById('password_confirm_1');
    if (password_confirm_info.innerHTML == "密码有效") {
        return true;
    } else {
        return false;
    }
}

var validateAll = function (e) {
    if (validateName() && validatePassword() && validateConPassword()) {
        alert("提交成功！")
    } else {
        alert("提交失败，请正确填写。");
        e.preventDefault();
        return false;
    }
}

var validateAll1 = function (e) {
    if (validatePassword() && validateConPassword()) {
        alert("提交成功！")
    } else {
        alert("提交失败，请正确填写。");
        e.preventDefault();
        return false;
    }
}
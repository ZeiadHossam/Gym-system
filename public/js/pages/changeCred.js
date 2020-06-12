function sumbittingchangeCredform() {
    if (userName_Validate() && Oldpassword_Validate() && Newpassword_Validate()) {
        return true;
    } else {
        return false;
    }
}
function userName_Validate() {
    var userName = document.getElementById('userName').value;
    var message = document.getElementById('UserName_message');
    if (userName == "") {
        message.innerHTML = "*Username is required";
        return false;
    } else if (userName.length < 5) {
        message.innerHTML = "*Username must contain at least 5 characters or numbers";
        return false;
    } else if (userName == 'system') {
        message.innerHTML = "*Username is not valid";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function Oldpassword_Validate() {
    var password = document.getElementById('oldPassword').value;
    var message = document.getElementById('oldPassword_message');
    if (password == "") {
        message.innerHTML = "*Password is required";
        return false;
    } else if (password.length < 5) {
        message.innerHTML = "*Password must contain at least 5 characters or numbers";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
function Newpassword_Validate() {
    var password = document.getElementById('newPassword').value;
    var message = document.getElementById('newPassword_message');
    if (password == "") {
        message.innerHTML = "*Password is required";
        return false;
    } else if (password.length < 5) {
        message.innerHTML = "*Password must contain at least 5 characters or numbers";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
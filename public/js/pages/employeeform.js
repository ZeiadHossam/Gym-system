
function deletingEmployee(personId,branchId,empId) {
    $('#modal-delete').modal('show');
    $('#delete-btn').on('click',function () {
        window.location.href='../controller/employee_controller.php?personDeleteId='+personId+"&empBranchId="+branchId+"&empDeleteId="+empId;
    });

}

function sumbittingempform() {
if (validate_firstname()&&validate_lastname()&&validate_mobilePhone()&&validate_homePhone()&&validate_email()&&validate_email_input()&&validate_userName()&&validate_password()&&validate_date()&&validate_gender())
{
    return true;
}
else
{
    return false;
}
}
function validate_firstname() {
    var firstName = document.getElementById('fname').value;
    var message = document.getElementById('firstName_message');
    var letters = /^[a-zA-Z]+$/;
    if (firstName == "") {
        message.innerHTML = "*First Name is required";
        return false;
    } else if (!letters.test(firstName)) {
        message.innerHTML = "*First Name cannot have special characters or numbers";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_lastname() {
    var lastName = document.getElementById('lname').value;
    var message = document.getElementById('lastName_message');
    var letters = /^[a-zA-Z]+$/;
    if (lastName == "") {
        message.innerHTML = "*Last Name is required";
        return false;
    } else if (!letters.test(lastName)) {
        message.innerHTML = "*Last Name cannot have special characters or numbers";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_mobilePhone() {
    var mobilePhone = document.getElementById('mobilePhone').value;
    var message = document.getElementById('mobilePhone_message');
    if (isNaN(mobilePhone)) {
        message.innerHTML = "Mobile Phone only accepts numbers";
        return false;
    } else if (mobilePhone == "") {
        message.innerHTML = "*Mobile Phone is required";
        return false;
    } else if (mobilePhone.length != 11) {
        message.innerHTML = "*Mobile Phone must contain 11 numbers";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }

}

function validate_homePhone() {
    var homePhone = document.getElementById('homePhone').value;
    var message = document.getElementById('homePhone_message');
    if (isNaN(homePhone)) {
        message.innerHTML = "Home Phone only accepts numbers";
        return false;
    } else if (homePhone == "") {
        message.innerHTML = "";
        return true;
    } else if (homePhone.length != 8) {
        message.innerHTML = "*Home Phone must contain 8 numbers";
        return false;
    }
    message.innerHTML = "";
    return true;

}

function onlyNumberKey(evt) {

    // Only ASCII charactar in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

function validate_email() {
    var email = document.getElementById('email').value;
    var message = document.getElementById('email_message');
    validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!validEmail.test(email) && message.innerText == "") {
        message.innerHTML = "*Please enter a valid email";
        return false;
    }
    return true;
}

function validate_email_input() {
    var email = document.getElementById('Email1').value;
    var message = document.getElementById('emailmessage');
    if (email == "") {
        message.innerHTML = "*Email is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

    function validate_userName() {
    var userName = document.getElementById('username').value;
    var message = document.getElementById('userName_message');
    if (userName == "") {
        message.innerHTML = "*Username is required";
        return false;
    } else if (userName.length < 5) {
        message.innerHTML = "*Username must contain at least 5 characters or numbers";
        return false;
    }
    else if (userName== 'system') {
        message.innerHTML = "*Username is not valid";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_password() {
    var password = document.getElementById('password').value;
    var message = document.getElementById('password_message');
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

function validate_date() {
    var date = document.getElementById('birthDate').value;
    var message = document.getElementById('birthDate_message');
    if (date=="") {
        message.innerHTML = "*BirthDay is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function maximumDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear() - 15;
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("birthDate").setAttribute("max", today);
}
function validate_gender()
{
    var radios = document.getElementsByName('gender');
    var check=false;
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            return true;
        }
    }

    document.getElementById('gender_message').innerHTML = '*Gender is required';
    return false;
}
function showImage(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#'+id)
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

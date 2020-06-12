function deletingMember(branchId, memberId) {
    $('#modal-delete').modal('show');
    $('#delete-btn').on('click', function () {
        window.location.href = "/GYM/member/deleteMember/" + branchId + "/" + memberId;
    });

}
function processFile(imageInput) {
    if (imageInput.files[0]) {
        var file = imageInput.files[0];
        var pattern = /image-*/;
        var message = document.getElementById('photo_message');
        if (!file.type.match(pattern)) {
            message.innerHTML = "Image Type is invalid";
            return false;
        }
        message.innerHTML = "";

        return true;

    }
}
function submitingmember() {
    if (validate_firstname() && validate_lastname() && validate_mobilePhone() && validate_homePhone() && validate_email() && validate_email_input() &&  validate_date() && validate_Branch() && validate_Gender()&& validate_MarriedStatus() && validate_workphone() && validate_faxnumber() && validate_emergencynumber() && validate_companyname()) {
        return true;
    } else {
        return false;
    }
}
function sumbittingEditMember() {
    if (validate_firstname() && validate_lastname() && validate_mobilePhone() && validate_homePhone() && validate_email() && validate_email_input() &&  validate_date()  && validate_workphone() && validate_faxnumber() && validate_emergencynumber() && validate_companyname()) {
        return true;
    } else {
        return false;
    }
}
function validate_workphone() {
    var workPhone = document.getElementById('workPhone').value;
    var message = document.getElementById('workPhone_message');
    if (isNaN(workPhone) && workPhone != "") {
        message.innerHTML = "Work Phone only accepts numbers";
        return false;

    } else if (workPhone.length != 8 && workPhone !== "") {
        message.innerHTML = "*Work Phone must contain 8 numbers";
        return false;
    }
    message.innerHTML = "";
    return true;
}

function validate_faxnumber() {
    var faxnumber = document.getElementById('faxnumber').value;
    var message = document.getElementById('faxnumber_message');
    if (isNaN(faxnumber)) {
        message.innerHTML = "fax number only accepts numbers";
        return false;
    } else if (faxnumber == "") {
        message.innerHTML = "";
        return true;

    } else if (faxnumber.length != 8) {
        message.innerHTML = "*fax number must contain 8 numbers";
        return false;
    }
    message.innerHTML = "";
    return true;
}

function validate_emergencynumber() {
    var emergency = document.getElementById('emergencynumber').value;
    var message = document.getElementById('emergencynumber_message');
    if (isNaN(emergency)) {
        message.innerHTML = "emergency number only accepts numbers";
        return false;
    } else if (emergency == "") {
        message.innerHTML = "";
        return true;

    } else if (emergency.length != 11) {
        message.innerHTML = "emergency number must contain 11 numbers";
        return false;
    }
    message.innerHTML = "";
    return true;
}

function validate_companyname() {
    var companyname = document.getElementById('companyname').value;
    var message = document.getElementById('companyname_message');
    var letters = /^[a-zA-Z]+$/;

    if (companyname == "") {
        message.innerHTML = "";
        return true;
    } else if (!letters.test(companyname)) {
        message.innerHTML = "must contain letters only";
        return false;
    }

    message.innerHTML = "";
    return true;
}
function validate_MarriedStatus() {
    var marriedStatus = document.getElementById('marriedStatus');
    var message = document.getElementById('marriedStatus_message');
    if (marriedStatus.selectedIndex == 0) {
        message.innerHTML = "*Please Select Married Status";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
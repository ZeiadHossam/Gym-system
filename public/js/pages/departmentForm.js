
function validate_depName() {
    var departmenName = document.getElementById('depName').value;
    var message = document.getElementById('depName_message');
    if (departmenName=="") {
        message.innerHTML = "*Department name is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
function validate_depData() {
    if(validate_depName()&&isCheckboxesChecked())
    {
        return true;
    }
    return false;
}
function isCheckboxesChecked() {
    var isChecked = document.querySelectorAll('input:checked').length === 0 ? false : true;
    if (!isChecked)
    {
        var message = document.getElementById('depboxes_message');
        message.innerHTML="Please choose privilege for this department";
    }
    return isChecked;
}
function editingDepartment(id)
{
    window.location.href='departments.php?depEditId='+id;
}

function cancellingDepartment() {
    window.location.href='departments.php';
}

function deletingDepartment(id) {
    window.location.href='../controller/usertype_controller.php?depDeleteId='+id;

}

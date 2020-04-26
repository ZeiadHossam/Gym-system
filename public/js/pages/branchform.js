function validate_branchCity() {
    var branchCity = document.getElementById('branchCity').value;
    var message = document.getElementById('branchCity_message');
    if (branchCity=="") {
        message.innerHTML = "*Branch city is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
function validate_branchAddress() {
    var branchAddress = document.getElementById('branchAddress').value;
    var message = document.getElementById('branchAddress_message');
    if (branchAddress=="") {
        message.innerHTML = "*Branch address is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
function validate_branchData() {
if (validate_branchCity()&&validate_branchAddress())
{
    return true;
}
return false;
}
function editingBranch(id)
{
    window.location.href='branch.php?branchEditId='+id;
}

function cancellingBranch() {
    window.location.href='branch.php';
}

function deletingBranch(id) {
    $('#modal-delete').modal('show');
    $('#delete-btn').on('click',function () {
        window.location.href='../controller/branch_controller.php?branchDeleteId='+id;
    });

}

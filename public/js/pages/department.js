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

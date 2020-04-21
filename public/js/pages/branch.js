function editingBranch(id)
{
    window.location.href='branch.php?branchEditId='+id;
}

function cancellingBranch() {
    window.location.href='branch.php';
}

function deletingBranch(id) {
    window.location.href='../controller/branch_controller.php?branchDeleteId='+id;

}

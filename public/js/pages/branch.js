function editing(id)
{
    window.location.href='branch.php?branchEditId='+id;
}

function cancelling() {
    window.location.href='branch.php';
}

function deleting(id) {
    window.location.href='../controller/branch_controller.php?branchDeleteId='+id;

}

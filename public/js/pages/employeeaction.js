function editingPayment(id)
{
    window.location.href='paymentmethod.php?employeeEditId='+id;
}

function view() {
    window.location.href='viewemployee.php?employeeview='+id;
}

function deletingEmployee(personId,branchId,empId) {
    window.location.href='../controller/employee_controller.php?personDeleteId='+personId+"&empBranchId="+branchId+"&empDeleteId="+empId;

}

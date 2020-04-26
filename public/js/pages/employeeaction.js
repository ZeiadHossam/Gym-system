function editingPayment(id)
{
    window.location.href='paymentmethod.php?employeeEditId='+id;
}

function view() {
    window.location.href='viewemployee.php?employeeview='+id;
}

function deletingEmployee(id) {
    window.location.href='../controller/employee_controller.php?employeeDeleteId='+id;

}

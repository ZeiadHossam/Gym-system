function editingPayment(id)
{
    window.location.href='paymentmethod.php?paymentEditId='+id;
}

function cancellingPayment() {
    window.location.href='paymentmethod.php';
}

function deletingPayment(id) {
    window.location.href='../controller/payment_controller.php?paymentDeleteId='+id;

}

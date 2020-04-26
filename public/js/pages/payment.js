function editingPayment(id)
{
    window.location.href='paymentmethod.php?paymentEditId='+id;
}

function cancellingPayment() {
    window.location.href='paymentmethod.php';
}

function deletingPayment(id) {
    $('#modal-delete').modal('show');
    $('#delete-btn').on('click',function () {
        window.location.href='../controller/payment_controller.php?paymentDeleteId='+id;
    });

}
function validate_paymentMethod() {
    var paymentMethod = document.getElementById('paymentMethod').value;
    var message = document.getElementById('paymentMethod_message');
    if (paymentMethod=="") {
        message.innerHTML = "*Payment Method is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
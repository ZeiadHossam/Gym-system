function editingPayment(id)
{
    window.location.href='/GYM/paymentMethod/viewEditingPaymentMethod/'+id;
}

function cancellingPayment() {
    window.location.href='/GYM/paymentMethod/viewPaymentMethod';
}

function deletingPayment(id) {
    $('#modal-delete').modal('show');
    $('#delete-btn').on('click',function () {
        window.location.href='/GYM/paymentMethod/deletePaymentMethod/'+id;
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
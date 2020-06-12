function getContractTypes() {
    var contractTypes = document.getElementById('contracttypes');
    contractTypes.disabled = false;
    var packagetype = document.getElementById('packagetype');
    var packagetypeid = packagetype.options[packagetype.selectedIndex].value;
    $.ajax({
        type: "POST",
        url: "/GYM/contract/getContractTypes",
        data: {
            packageId: packagetypeid,
        },
        datatype: "json",
        success: function (result) {
            $("#contracttypes").html(result);
        },

    });
}

function setEndDate() {
    var startdate = document.getElementById('startdate');
    var enddate = document.getElementById('enddate');
    var contracttypes = document.getElementById('contracttypes');
    if (contracttypes.selectedIndex != 0) {
        var CT = contracttypes.options[contracttypes.selectedIndex].innerText;

        var splitter = CT.split(" ");
        var packageType = splitter[1];
        if (packageType != "Sessions") {
            var sDate = new Date(startdate.value);
            enddate.disabled = true;
            var numberOfDaysToAdd = parseInt(splitter[0]);
            if (packageType == "Days") {
                sDate.setDate(sDate.getDate() + numberOfDaysToAdd);

            } else {
                sDate.setDate(sDate.getDate() + numberOfDaysToAdd * 30);

            }
            var yy = sDate.getFullYear();
            var mm = sDate.getMonth() + 1;
            var dd = sDate.getDate();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var finalEndDate = yy + "-" + mm + "-" + dd;
            enddate.value = finalEndDate;

        } else {
            enddate.disabled = false;

        }
    }


}

function deletingContract(branchid, memberid, contractid) {
    $('#modal-delete').modal('show');
    $('#delete-btn').on('click', function () {
        window.location.href = '/GYM/contract/deleteContract/' + branchid + '/' + memberid + "/" + contractid;
    });

}

function freezingContract() {
    $('#modal-freeze').modal('show');

}

function extendfreezing() {
    $('#modal-freeze').modal('show');

}

function stopFreeze(branchid, memberid, contractid) {
    window.location.href = '/GYM/contract/stopFreeze/' + branchid + '/' + memberid + "/" + contractid;

}

function submittingaddContract() {
    if (validate_PackageType() && validate_ContractType() && validate_FreezeDays() && validate_Member() && validate_startdate() && validate_enddate() && validate_ContractsFees() && validate_AmountPaid() && validate_DueDate() && validate_paymentMethodContract() && validate_sales()) {
        return true;
    } else {
        return false;
    }
}

function enabling_Contract_Types() {
    var packagetype = document.getElementById('packagetype');
    var contractTypes = document.getElementById('contracttypes');

    if (packagetype.selectedIndex != 0) {
        contractTypes.disabled = false;

    }

}

function calcTotalAmount() {
    var fees = document.getElementById('fees').value;
    var discount = document.getElementById('discount').value;
    var totalAmount = document.getElementById('totalAmount');
    if (fees != "") {

        if (discount == 0) {
            totalAmount.value = fees;

        } else {
            var disAmount = fees * (discount / 100);
            totalAmount.value = fees - disAmount;
        }
    }
}

function calcAmountDue() {
    var amountPaid = document.getElementById('amountPaid').value;
    var totalAmount = document.getElementById('totalAmount').value;
    var amountDue = document.getElementById('amountDue');
    if (amountPaid != "") {

        amountDue.value = totalAmount - amountPaid;
    }
}

function validate_PackageType() {
    var packagetype = document.getElementById('packagetype');
    var message = document.getElementById('packagetype_message');
    if (packagetype.selectedIndex == 0) {
        message.innerHTML = "*Please Select Package Type";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_ContractType() {
    var contracttypes = document.getElementById('contracttypes');
    var message = document.getElementById('contracttypes_message');
    if (contracttypes.selectedIndex == 0) {
        message.innerHTML = "*Please Select Contract Type";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_Member() {
    var member = document.getElementById('member');
    var message = document.getElementById('member_message');
    if (member.selectedIndex == 0) {
        message.innerHTML = "*Please Select Member";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_paymentMethodContract() {
    var paymentMethod = document.getElementById('paymentMethod');
    var message = document.getElementById('paymentMethod_message');
    if (paymentMethod.selectedIndex == 0) {
        message.innerHTML = "*Please Select Payment Method";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_sales() {
    var sales = document.getElementById('sales');
    var message = document.getElementById('sales_message');
    if (sales.selectedIndex == 0) {
        message.innerHTML = "*Please Select Sales";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_FreezeDays() {
    var freezeDays = document.getElementById('freezeDays').value;
    var message = document.getElementById('freezeDays_message');
    if (freezeDays == "") {
        message.innerHTML = "*Freeze Days is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_ContractsFees() {
    var fees = document.getElementById('fees').value;
    var message = document.getElementById('fees_message');
    if (fees == "") {
        message.innerHTML = "*Contract Fees is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_AmountPaid() {
    var amountPaid = document.getElementById('amountPaid').value;
    var totalAmount = document.getElementById('totalAmount').value;
    var amountPaidnum = parseInt(amountPaid);
    var totalAmountnum = parseInt(totalAmount);
    var message = document.getElementById('amountPaid_message');
    if (amountPaid == "") {
        message.innerHTML = "*Amount Paid is required";
        return false;
    } else if (amountPaidnum > totalAmountnum) {
        message.innerHTML = "*Amount Paid must be less than total amount";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_startdate() {
    var startdate = document.getElementById('startdate').value;
    var enddate = document.getElementById('enddate').value;
    var message = document.getElementById('startdate_message');
    if (startdate == "") {
        message.innerHTML = "*Membership start date is required";
        return false;
    } else if (enddate != "" && startdate > enddate) {
        message.innerHTML = "*Membership start date must start before membership ends";
        return false;
    } else {
        message.innerHTML = "";
        document.getElementById("enddate").setAttribute("min", startdate);
        return true;
    }
}

function validate_DueDate() {
    var amountDueDate = document.getElementById('amountDueDate').value;
    var message = document.getElementById('amountDueDate_message');
    var amountDue = document.getElementById('amountDue').value;
    if (amountDueDate == "" && amountDue != 0) {
        message.innerHTML = "*Amount Due Date is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}

function validate_enddate() {
    var startdate = document.getElementById('startdate').value;
    var enddate = document.getElementById('enddate').value;
    var message = document.getElementById('enddate_message');
    if (enddate == "") {
        message.innerHTML = "*Membership end date is required";
        return false;
    } else if (startdate != "" && startdate > enddate) {
        message.innerHTML = "*Membership end date must start after membership starts";
        return false;
    } else {
        message.innerHTML = "";
        document.getElementById("startdate").setAttribute("max", enddate);
        return true;
    }
}
function submit_Freeze()
{
    if (validate_freeze_from()&&remainingFreeze())
    {
        return true;
    }
    else
    {
        return false;
    }
}
function validate_freeze_from() {
    var freezeFromDate = document.getElementById('freezeFromDate').value;
    var freezeToDate = document.getElementById('freezeToDate');
    var contractStart = document.getElementById('startdate').value;
    var contractEnd = document.getElementById('enddate').value;
    var message = document.getElementById('FreezeStart_message');
    freezeToDate.setAttribute("min",freezeFromDate);

    if (freezeFromDate != "" && freezeFromDate < contractStart) {
        message.innerHTML = "*freeze must start  after contract start  ";
        return false;

    } else if (freezeFromDate != "" && freezeFromDate > contractEnd) {
        message.innerHTML = "*freeze must start  before contract End Date  ";
        return false;

    } else {
        message.innerHTML = "";

        return true;
    }
}

function remainingFreeze()
{
    var freezeFromDate = document.getElementById('freezeFromDate').value;
    var freezeToDate = document.getElementById('freezeToDate').value;
    var freezedays = document.getElementById('freezeDays').value;
    var message = document.getElementById('Freezeto_message');
    var FreezeFrom=new Date(freezeFromDate);
    var FreezeTo=new Date(freezeToDate);
    const diffTime = Math.abs(FreezeTo - FreezeFrom);
    const diffDays = Math.round(diffTime / (1000 * 60 * 60 * 24));
    if (diffDays>freezedays)
    {
        message.innerHTML="*Remaining Freeze Days Are Only "+freezedays;
        return false;
    }
    else {
        message.innerHTML="";
        return true;
    }

}

function ChangeUsernameorPassword()
{
    $('#modal-cred').modal('show');




}
function validate_expireFromContractReport() {
    var startdate = document.getElementById('expiresFrom').value;
    var enddate = document.getElementById('expiresTo').value;
    var message = document.getElementById('expiresFrom_message');
    if (enddate != "" && startdate > enddate) {
        message.innerHTML = "*Membership expires to must start after membership expires from";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
function validate_expireToContractReport() {
    var startdate = document.getElementById('expiresFrom').value;
    var enddate = document.getElementById('expiresTo').value;
    var message = document.getElementById('expiresTo_message');
     if (startdate != "" && startdate > enddate) {
        message.innerHTML = "*Membership expires to must start after membership expires from";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
function validate_ContractReport() {
if (validate_expireFromContractReport()&&validate_expireToContractReport())
{
    return true;
}
else {return false;}
}






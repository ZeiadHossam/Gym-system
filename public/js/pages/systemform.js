function submitRegister()
{
    if (sumbittingempform()&&validate_gymName()&&validate_branchCity()&&validate_branchAddress())
    {
        return true;
    }
    else
    {
        return false;
    }
}
function validate_gymName() {
    var gymName = document.getElementById('gymName').value;
    var message = document.getElementById('gymName_message');
    if (gymName=="") {
        message.innerHTML = "*Gym Name is required";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
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
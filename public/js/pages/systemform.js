function submitRegister()
{
    if (sumbittingempform()&&validate_gymName()&&validate_branchAddress())
    {
        alert("alo22");

        return true;
    }
    else
    {
        alert("alo");
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


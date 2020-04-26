
$(".js-example-basic-multiple").select2({
    tags: true
});

$('#packagePeriod').on('select2:close', function () {
   validate_packagePeriod()
});

function editingPackage(id)
{
    window.location.href='package.php?packageEditId='+id;
}

function cancellingPackage() {
    window.location.href='package.php';
}

function deletingPackage(id) {
    $('#modal-delete').modal('show');
    $('#delete-btn').on('click',function () {
        window.location.href='../controller/package_controller.php?packageDeleteId='+id;
    });

}
function validate_allPackage() {
    if (validate_packageName()&&validate_packageType()&&validate_packagePeriod()) {
        return true;
    } else
    {
        return false;
    }
}
function validate_packageName() {
    var packageName = document.getElementById('packageName').value;
    var message = document.getElementById('packageName_message');
    if (packageName=="") {
        message.innerHTML = "*Please fill Package Name";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
function validate_packagePeriod() {
    var packagePeriod = $('#packagePeriod').val();
    var message = document.getElementById('packagePeriod_message');

     if (packagePeriod==""||packagePeriod==null) {

         message.innerHTML = "Please fill Contract Type";
         return false;
     } else {
         message.innerHTML = "";
         return true;
     }
}
function validate_packageType() {
    var packageType = document.getElementById('packageType');
    var message = document.getElementById('packageType_message');
    if (packageType.selectedIndex == 0) {
        message.innerHTML = "*Please Select Package Type";
        return false;
    } else {
        message.innerHTML = "";
        return true;
    }
}
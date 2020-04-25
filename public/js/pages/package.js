$(".js-example-basic-multiple").select2({
    tags: true
});
function editingPackage(id)
{
    window.location.href='package.php?packageEditId='+id;
}

function cancellingPackage() {
    window.location.href='package.php';
}

function deletingPackage(id) {
    window.location.href='../controller/package_controller.php?packageDeleteId='+id;

}

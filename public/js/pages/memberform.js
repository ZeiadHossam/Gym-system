function deletingMember(branchId,memberId) {
    $('#modal-delete').modal('show');
    $('#delete-btn').on('click',function () {
        window.location.href="../controller/member_controller.php?memberBranchId="+branchId+"&memberDeleteId="+memberId;
    });

}
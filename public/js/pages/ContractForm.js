function getContractTypes(){
    var contractTypes = document.getElementById('contracttypes');
    contractTypes.disabled=false;
    var packagetype=document.getElementById('packagetype');
    var packagetypeid=packagetype.options[packagetype.selectedIndex].value;
    $.ajax({
        type: "POST",
        url: "/GYM/contract/getContractTypes",
        data: {
            packageId:packagetypeid,
        },
        datatype : "json",
        success: function(result) {
            $("#contracttypes").html(result);
        },

    });
}
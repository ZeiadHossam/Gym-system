<?php
$member = $gym->getBranchs()[$data['branchId']]->getMembers()[$data["memberId"]];
$contract = $member->getContracts()[$data["contractId"]];




?>
<div class="container-fluid ">

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row view_emp">
                <div class="col-md-1">
                    <a href="javascript:history.go(-1)" class="btn btn-md btn-default"><span
                                class="fa fa-angle-left"></span></a>

                </div>
                <div class="col-md-4 offset-3">

                    <legend class="viewHeader"> Contract Freeze Days</legend>
                </div>
            </div>
            <table id="custTable" class="addmembertable table table-bordered table-striped">
                <thead>
                <tr>

                    <th>Freeze From</th>
                    <th>Freeze To</th>
                    <th>Freeze Days </th>

                </tr>
                </thead>
                <tbody>

                <?php         foreach ($contract->getFreezeDates() as $freezeDate){
                $diff = abs(strtotime($freezeDate->getFreezeFrom()) - strtotime($freezeDate->getFreezeTo() ));
                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                ?>

                <tr>
                    <td><?php  echo $freezeDate->getFreezeFrom()  ; ?> </td>
                    <td><?php  echo $freezeDate->getFreezeTo()  ; ?> </td>
                    <td><?php  echo        $days; ?> </td>
<?php }?>
                </tr>

                </tbody>
            </table>

        </div>
    </div>
</div>

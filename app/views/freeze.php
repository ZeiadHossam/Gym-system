<div class="modal fade " id="modal-freeze">
    <div class="modal-dialog">
        <div class="modal-content bg-info">
            <div class="modal-header">
                <h4 class="modal-title">Freeze Contract</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
            </div>
            <?php if(isset($freezeId)){?>
            <form action="/GYM/contract/extendFreeze/<?php echo $data['branchId']."/".$data['memberId']."/".$data['contractId']."/".$freezeId;?>" enctype="multipart/form-data" method="post">
                <?php } else { ?>
            <form action="/GYM/contract/freezeContract/<?php echo $data['branchId']."/".$data['memberId']."/".$data['contractId'];?>" enctype="multipart/form-data" method="post">
                <?php  } ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="freezeFrom"><?php if(isset($freezeId)){?>Freeze was suppossed to end on <?php }else { ?>Freeze From<?php } ?></label>
                        <input type="date"  class="form-control" name="freezeFromDate" id="freezeFromDate" <?php if(isset($freezeId)){ ?> disabled value="<?php echo $contract->getFreezeDates()[$freezeId]->getFreezeTo();?>"<?php } ?>
                               >
                    </div>
                    <div class="form-group">
                        <label for="freezeTo">Freeze To</label>
                        <input type="date" class="form-control" name="freezeToDate" id="freezeToDate"
                        >
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="freeze-Btn" class="btn btn-outline-light">Freeze</button>
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
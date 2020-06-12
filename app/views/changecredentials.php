<div class="modal fade " id="modal-cred">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Change username and password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
            </div>
            <form action="/GYM/profile/changeUsernameAndPassword" enctype="multipart/form-data" onsubmit="return sumbittingchangeCredform()"  method="post">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="UserName">Username : </label>
                            <input type="text" id="userName" onfocusout="userName_Validate()"  class="form-control" name="userName"  value="<?php echo $userAndPass['userName']; ?>" >
                            <span class="message" id="UserName_message"></span>

                        </div>
                        <div class="form-group">
                            <label for="OldPassword">Old Password : </label>
                            <input type="password" id="oldPassword" onfocusout="Oldpassword_Validate()" class="form-control" name="oldPassword"   >
                            <span class="message" id="oldPassword_message"></span>

                        </div>
                        <div class="form-group">
                            <label for="Password">New Password : </label>
                            <input type="password" id="newPassword" onfocusout="Newpassword_Validate()" class="form-control" name="newPassword"   >
                            <span class="message" id="newPassword_message"></span>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit"  class="btn btn-outline-light">Change</button>
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                    </div>
                </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
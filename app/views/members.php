<?php include("addmember.php") ?>
<?php include("delete.php") ?>
    <section class="content">
    <div class="container-fluid">
    <br>
    <legend>Members</legend>

    <div class="row memberimage">
    </div>
    <div class="row">
        <button type="button" class="btn btn-info Addmemberbutton" data-backdrop="static" data-keyboard="false"
                data-toggle="modal" data-target="#modal-members">
            Add Member
        </button>
    </div>
    <br>
    <div class="row">
    <table id="custTable" class="addmembertable table table-bordered table-striped">
    <thead>
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Mobile Phone</th>
        <th>Email Address</th>
        <th>Branch Name</th>
        <th>Added By</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
<?php foreach ($gym->getBranchs() as $branch) {
    foreach ($branch->getMembers() as $member) {
        ?>
        <tr>
            <td><?php echo $member->getId(); ?></td>
            <td><?php echo $member->getFirstName(); ?></td>
            <td><?php echo $member->getLastName(); ?></td>
            <td><?php echo $member->getMobilePhone(); ?></td>
            <td><?php echo $member->getEmail(); ?></td>
            <td><?php echo $branch->getCity(); ?></td>
            <td><?php echo $member->getAddedBy(); ?></td>
            <td>
                <div class="btn-group tablebuttons">
                    <a href="/GYM/member/viewMember/<?php echo $branch->getId();  ?>/<?php echo  $member->getId(); ?>" class="btn btn-secondary btn-sm">View</a>
                    <a href="/GYM/member/viewEditMember/<?php echo $branch->getId(); ?>/<?php echo  $member->getId(); ?>" class="btn btn-info btn-sm">edit</a>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deletingMember(<?php echo $branch->getId().",".$member->getId();?>)">
                        Delete
                    </button>
                </div>
            </td>
        </tr>
    <?php } } ?>
    </tbody>
    </table>

    </div>
    </div>
    </section>

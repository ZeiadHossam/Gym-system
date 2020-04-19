<?php include("../shared/main.php") ?>

<div class="row">
    <table id="custTable" class="addmembertable table table-bordered table-striped">
        <thead>
        <tr>
            <th>package</th>

            <th>Startdate</th>
            <th>Enddate</th>
            <th>Issuedate</th>
            <th>MemberId</th>
			<th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>PersonalTrainer</td>
            <td>12/2/2020</td>
            <td>12/3/2020</td>
            <td>3/3/2020</td>
            <td>18354</td>
			<td>Active</td>

            <td>
                <div class="btn-group tablebuttons">
                    <a href="viewcontract.php" type="button" class="btn btn-info">View</a>
                </div>
            </td>
        </tr>


        </tbody>
    </table>

</div>
<a href="javascript:history.go(-1)" class="btn btn-block btn-sm btn-default">Close</a>

<?php include("../shared/footer.php") ?>


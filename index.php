<!-- Content Header (Page header) -->
<?php include("shared/main.php") ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>150</h3>

                        <p>Recently Added Contracts</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-checkmark-round"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>53</h3>

                        <p>Recently Expired Contracts</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-close-round"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Notifications</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-bell"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                               href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                               aria-selected="true">Recently Added Contracts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                               href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                               aria-selected="false">Recently Expired Contracts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                               href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                               aria-selected="false">Notifications</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                             aria-labelledby="custom-tabs-three-home-tab">
                            <table id="custTable" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Package Type</th>
                                    <th>Due</th>
                                    <th>Last Signed in</th>
                                    <th>Telephone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ahmed</td>
                                    <td>Membership</td>
                                    <td>20/3/2020</td>
                                    <td>16/3/2020</td>
                                    <td>01111111111</td>
                                    <td>
											<a href="viewcontract.php" class="btn btn-block btn-secondary btn-sm ">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mohamed</td>
                                    <td>Trainer</td>
                                    <td>30/3/2020</td>
                                    <td>17/3/2020</td>
                                    <td>01222222222</td>
                                    <td>
											<a href="viewcontract.php" class="btn btn-block btn-secondary btn-sm ">View</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                             aria-labelledby="custom-tabs-three-profile-tab">
                            <table id="custTable" class="table table-bordered table-striped ">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Package Type</th>
                                    <th>Due</th>
                                    <th>Last Signed in</th>
                                    <th>Telephone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>3</td>
                                    <td>Zizo</td>
                                    <td>Membership</td>
                                    <td>20/3/2020</td>
                                    <td>16/3/2020</td>
                                    <td>01111111111</td>
                                    <td>
											<a href="viewcontract.php" class="btn btn-block btn-secondary btn-sm ">View</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Zoz</td>
                                    <td>SPA</td>
                                    <td>22/3/2020</td>
                                    <td>18/3/2020</td>
                                    <td>01111112222</td>
                                    <td>
											<a href="viewcontract.php" class="btn btn-block btn-secondary btn-sm ">View</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                             aria-labelledby="custom-tabs-three-messages-tab">
                            <table id="custTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Purpose</th>
                                    <th>Telephone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>5</td>
                                    <td>Ziad</td>
                                    <td>Member</td>
                                    <td>BirthDay</td>
                                    <td>01111111111</td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-secondary btn-sm">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Tarek</td>
                                    <td>Member</td>
                                    <td>Contract Exipry</td>
                                    <td>02222222222</td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-secondary btn-sm">View</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- Main row -->
    </div>

    <!-- /.row (main row) -->
    <!-- /.container-fluid -->
</section>
<?php include("shared/footer.php") ?>
<!-- Content Header (Page header) -->
<?php $recentlyAddedContracts=$data['recentlyAddedContracts']; ?>
<?php $recentlyExpiredContracts=$data['recentlyExpiredContracts']; ?>
<?php $notifications=$data['notifications']; ?>
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
                        <h3><?php echo count($recentlyAddedContracts) ?></h3>

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
                        <h3><?php echo count($recentlyExpiredContracts) ?></h3>

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
                        <h3><?php echo count($notifications) ?></h3>

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
                                    <th>Contract Type</th>
                                    <th>Due</th>
                                    <th>Telephone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($recentlyAddedContracts as $recentlyContract) {?>
                                <tr>
                                    <td><?php echo $recentlyContract['contractId'] ?></td>
                                    <td><?php echo $recentlyContract['memberName'] ?></td>
                                    <td><?php echo $recentlyContract['packageType'] ?></td>
                                    <td><?php echo $recentlyContract['packagePeriod'] ?></td>
                                    <td><?php echo $recentlyContract['due'] ?></td>
                                    <td><?php echo $recentlyContract['telephone'] ?></td>
                                    <td>
											<a href="/GYM/contract/viewContract/<?php echo $recentlyContract['branchId']."/".$recentlyContract['memberId']."/".$recentlyContract['contractId']?>" class="btn btn-block btn-secondary btn-sm ">View</a>
                                    </td>
                                </tr>
                                <?php } ?>
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
                                    <th>Contract Type</th>
                                    <th>Due</th>
                                    <th>Telephone</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($recentlyExpiredContracts as $recentlyexContract) {?>
                                    <tr>
                                        <td><?php echo $recentlyexContract['contractId'] ?></td>
                                        <td><?php echo $recentlyexContract['memberName'] ?></td>
                                        <td><?php echo $recentlyexContract['packageType'] ?></td>
                                        <td><?php echo $recentlyexContract['packagePeriod'] ?></td>
                                        <td><?php echo $recentlyexContract['due'] ?></td>
                                        <td><?php echo $recentlyexContract['telephone'] ?></td>
                                        <td>
                                            <a href="/GYM/contract/viewContract/<?php echo $recentlyexContract['branchId']."/".$recentlyexContract['memberId']."/".$recentlyexContract['contractId']?>" class="btn btn-block btn-secondary btn-sm ">View</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                             aria-labelledby="custom-tabs-three-messages-tab">
                            <table id="custTable" class="table table-bordered table-striped">
                                <thead>
                                <tr class="notif">
                                    <th>Title</th>
                                    <th>Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($notifications as $notification){?>
                                    <tr class="notif">
                                        <td><?php echo $notification->getTitle(); ?></td>
                                        <td><?php echo  $notification->getMessege(); ?></td>
                                    </tr>
                                <?php } ?>
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

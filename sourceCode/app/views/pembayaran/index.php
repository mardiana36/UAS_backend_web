<div class="content-body">


    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Payment History</h4>
                        <div class="table-responsive">
                            <table class="table table-hover  zero-configuration">
                                <thead>
                                    <tr class="gradient-1" style="text-wrap: nowrap">
                                        <th>Number</th>
                                        <th>Reservation Code</th>
                                        <th>Payment Method</th>
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($data)) :
                                        $no = 0;
                                    ?>
                                        <?php foreach ($data as $pb) : ?>
                                            <tr>
                                                <td><?= ++$no ?></td>
                                                <td><?= $pb['reservation_code']?></td>
                                                <td><?= $pb['metodePembayaran']=='CC'? 'Credit Card' : ($pb['metodePembayaran']=='BT'? 'Bank Transfer' : ($pb['metodePembayaran']=='CS'? 'Cash' : '')); ?></td>
                                                <td><?= $pb['tglPembayaran'] ?></td>
                                                <td><?= $pb['status']=='PA'? 'Payed' : ($pb['status']=='PE'? 'Pending' : ($pb['status']=='FA'? 'Failed' : '')); ?></td>
                                                <td>
                                                    <span>
                                                        <a href="index.php?action=uPembayaran&id=<?=$pb['id'] ?>" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </a>
                                                        <a href="index.php?action=dPembayaran&id=<?=$pb['id'] ?>" data-toggle="tooltip" class="sweet-confirm" data-placement="top" title="Delete">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Number</th>
                                        <th>Reservation Code</th>
                                        <th>Payment Method</th>
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
        Content body end
    ***********************************-->
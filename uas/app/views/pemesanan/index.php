<div class="content-body">


    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Reservation Data</h4>
                        <div class="table-responsive">
                            <table class="table table-hover  zero-configuration">
                                <thead>
                                    <tr class="gradient-1" style="text-wrap: nowrap">
                                        <th>Number</th>
                                        <th>Guest Name</th>
                                        <th>Reservation Kode</th>
                                        <th>Room Number</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($data)) :
                                        $no = 0;
                                    ?>
                                        <?php foreach ($data as $pm) : ?>
                                            <tr>
                                                <td><?= ++$no ?></td>
                                                <td> <?=$pm['guest_name'] ?> </td>
                                                <td> <?=$pm['kodeReservasi'] ?> </td>
                                                <td> <?=$pm['room_number'] ?> </td>
                                                <td> <?=$pm['tglCheckin'] ?> </td>
                                                <td> <?=$pm['tglCheckout'] ?> </td>
                                                <td> <?= $pm['status'] == 'con'? 'Confirmed': ( $pm['status'] == 'can'? 'Cancelled': ($pm['status'] == 'pen'? 'Pending': ''));  ?> </td>
                                                <td> <?=$pm['harga'] ?> </td>
                                                <td>
                                                    <span>
                                                        <a href="index.php?action=uPemesanan&id=<?= $pm['id'] ?>" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </a>
                                                        <a href="index.php?action=dPemesanan&id=<?= $pm['id'] ?>" data-toggle="tooltip" class="sweet-confirm" data-placement="top" title="Delete">
                                                            <i class="fa fa-close color-danger"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Number</th>
                                        <th>Guest Name</th>
                                        <th>Reservation Kode</th>
                                        <th>Room Number</th>
                                        <th>Check-out</th>
                                        <th>Check-in</th>
                                        <th>Status</th>
                                        <th>Price</th>
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
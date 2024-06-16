<div class="content-body">


    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Room Data</h4>
                        <div class="table-responsive">
                            <table class="table table-hover  zero-configuration">
                                <thead>
                                    <tr class="gradient-1" style="text-wrap: nowrap">
                                        <th>Number</th>
                                        <th>Image</th>
                                        <th>Room Number</th>
                                        <th>Room Tipe</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($data)) :
                                        $no = 0;
                                    ?>
                                        <?php foreach ($data as $ik) : ?>
                                            <tr>
                                                <td><?= ++$no?></td>
                                                <td><img src="app/views/assets/images/foto/<?=$ik['foto'] ?>" width="100" alt=""></td>
                                                <td><?= $ik['nomor'] ?></td>
                                                <td><?= $ik['tipe'] == '1' ? "Single" : ($ik['tipe'] == '2' ? "Double" : ($ik['tipe'] == '3' ? "Suite" : "")); ?></td>
                                                <td><?= $ik['status'] == 'AV' ? "Available" : ($ik['status'] == 'OC' ? "Occupied" : ($ik['status'] == 'MA' ? "Maintenance" : ""));?></td>
                                                <td><?= $ik['harga'] ?></td>
                                                <td>
                                                    <span>
                                                        <a href="index.php?action=uInfokamar&id=<?=$ik['id']?>" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-pencil color-muted m-r-5"></i>
                                                        </a>
                                                        <a href="index.php?action=dInfokamar&id=<?=$ik['id']?>" data-toggle="tooltip" class="sweet-confirm" data-placement="top" title="Delete">
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
                                        <th>Image</th>
                                        <th>Payment Method</th>
                                        <th>Payment Date</th>
                                        <th>Price</th>
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
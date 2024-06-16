<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Payment</h4>
                        <div class="form-validation">
                            <form class="" action="index.php?action=uPembayaran&id=<?= $id ?>" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="reservationCode">Reservation Code<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="pemesanan_id" name="pemesanan_id" required>
                                            <option value="" hidden>Choose...</option>
                                            <?php foreach ($pemesanan as $pm) : ?>
                                                <option value="<?= $pm['id'] ?>" <?= $data['pemesanan_id'] == $pm['id'] ? 'selected' : ""; ?>><?= $pm['kodeReservasi'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="metodePembayaran">Payment Method<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="metodePembayaran" name="metodePembayaran" required>
                                            <option value="" hidden>Choose...</option>
                                            <option value="CC" <?= $data['metodePembayaran'] == 'CC'? 'selected':''; ?> >Credit Card</option>
                                            <option value="BT" <?= $data['metodePembayaran'] == 'BT'? 'selected':''; ?> >Bank Transfer</option>
                                            <option value="CS" <?= $data['metodePembayaran'] == 'CS'? 'selected':''; ?> >Cash</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="tglPembayaran">Payment Date<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="tglPembayaran" value="<?=$data['tglPembayaran'] ?>" name="tglPembayaran" placeholder="Input Payment Date..." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="" hidden>Choose...</option>
                                            <option value="PA" <?= $data['status']=='PA'? 'selected': ''?>>Paid</option>
                                            <option value="PE" <?= $data['status']=='PE'? 'selected': ''?>>Pending</option>
                                            <option value="FA" <?= $data['status']=='FA'? 'selected': ''?>>Failed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
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
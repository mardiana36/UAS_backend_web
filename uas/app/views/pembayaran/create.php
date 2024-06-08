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
                              <h4 class="card-title">Add Payment</h4>
                                <div class="form-validation">
                                    <form class="" action="index.php?action=cPembayaran" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="reservationCode">Reservation Code<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="pemesanan_id" name="pemesanan_id" required>
                                                    <option value="" hidden>Choose...</option>
                                                    <option value="">Reservation Code</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="metodePembayaran">Payment Method<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="metodePembayaran" name="metodePembayaran" required>
                                                    <option value="" hidden>Choose...</option>
                                                    <option value="CC">Credit Card</option>
                                                    <option value="BT">Bank Transfer</option>
                                                    <option value="CS">Cash</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="tglPembayaran">Payment Date<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="tglPembayaran" name="tglPembayaran" placeholder="Input Payment Date..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="status" name="status" required>
                                                    <option value="" hidden>Choose...</option>
                                                    <option value="PA">Paid</option>
                                                    <option value="PE">Pending</option>
                                                    <option value="FA">Failed</option>
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
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <form action="index.php?action=uPemesanan&id=" method="post" id="step-form-horizontal" class="step-form-horizontal">
                    <div>
                        <h4 class="card-title">Edit Reservation</h4>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control custom-select" name="tamu_id" required>
                                            <option selected="selected" value="" hidden>Select Guest Name...</option>
                                            <option value="1">Joko</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" name="kodeReservasi" class="form-control" minlength="9" maxlength="9" placeholder="Input Reservation Kode..." required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <select class="form-control custom-select" name="kamar_id" required>
                                            <option selected="selected" value="" hidden>Select Guest Room...</option>
                                            <option value="1">L102</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h4>Date and Price</h4>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="checkin" placeholder="Check-in Date..." id="mdate" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="checkout" placeholder="Check-out Date..." id="mdate2" data-dtp="dtp_k3gZ6" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control custom-select" name="status" required>
                                            <option selected="selected" value="" hidden>Select Status...</option>
                                            <option value="con">Confirmed</option>
                                            <option value="can">Cancelled</option>
                                            <option value="pen">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" type="number" pattern="[0-9]{200000,20000000}" name="harga" placeholder="Total Price..." required>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h4>Confirmation</h4>
                        <section>
                            <div class="row h-100">
                                <div class="col-12 h-100 d-flex flex-column justify-content-center align-items-center">
                                    <h2>All reservation data has been entered!</h2>
                                    <p>Click the Submit button to add Reservation data!</p>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->
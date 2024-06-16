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
                        <h4 class="card-title">Update Room</h4>
                        <div class="form-validation">
                            <form class="" action="index.php?action=uInfokamar&id=<?= $id ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nomor">Room Number<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nomor" value="<?= $data['nomor'] ?>" name="nomor" placeholder="Input Room Number..." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="RoomTipe">Room Tipe<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="tipe" name="tipe" required>
                                            <option value="" hidden>Choose...</option>
                                            <option value="1" <?= $data['tipe'] == '1' ? "selected" : ""; ?>>Single</option>
                                            <option value="2" <?= $data['tipe'] == '2' ? "selected" : ""; ?>>Double</option>
                                            <option value="3" <?= $data['tipe'] == '3' ? "selected" : ""; ?>>Suite</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="harga">Price<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control" value="<?= $data['harga'] ?>" id="harga" name="harga" placeholder="Input Room Price..." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="status">Status<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="" hidden>Choose...</option>
                                            <option value="AV" <?=$data['status']=='AV'? "selected":""; ?>>Available</option>
                                            <option value="OC" <?=$data['status']=='OC'? "selected":""; ?>>Occupied</option>
                                            <option value="MA" <?=$data['status']=='MA'? "selected":""; ?>>Maintenance</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="foto">Image<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <img src="app/views/assets/images/foto/<?= $data['foto'] ?>" width="80" alt="">
                                        <input type="file" class="form-control" accept=".jpg, .png, .jepg" id="foto" name="foto" placeholder="Input image...">
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
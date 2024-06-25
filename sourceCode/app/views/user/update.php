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
                              <h4 class="card-title">Update User</h4>
                                <div class="form-validation">
                                    <form class="" action="index.php?action=uUser&id=<?= $id ?>" method="post" >
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Username<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="<?=$data['username']?>" id="username" name="username" placeholder="Input Username..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="password">Password<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" value="<?=$data['password']?>" id="password" name="password" placeholder="Input Password..." required>
                                                <i class="icon-lock" id="icon-Password1" style="right: 20px;"></i>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Email<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" value="<?=$data['email']?>" id="email" name="email" placeholder="Input Email..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="role">Role<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="role" name="role" required>
                                                    <option value="" hidden>Choose...</option>
                                                    <option value="admin" <?= $data["role"]=="admin"? "selected": '';?> >Admin</option>
                                                    <option value="staff"  <?= $data["role"]=="staff"? "selected": '';?> >Staff</option>
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
        <script src="app/views/assets/js/login.js"></script>
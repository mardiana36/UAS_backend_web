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
                                    <form class="" action="index.php?action=uUser&id=" method="post" >
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="username">Username<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Input Username..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="password">Password<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Input Password..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="email">Email<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Input Email..." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="role">Role<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="role" name="role" required>
                                                    <option value="" hidden>Choose...</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="staff">Staff</option>
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
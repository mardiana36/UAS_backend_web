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
                           <h4 class="card-title">Edit Guest</h4>
                           <div class="form-validation">
                               <form class="" action="index.php?action=uTamu" method="post">
                                   <div class="form-group row">
                                       <label class="col-lg-4 col-form-label" for="name">Name<span class="text-danger">*</span>
                                       </label>
                                       <div class="col-lg-6">
                                           <input type="text" class="form-control" id="name" name="nama" placeholder="Input The Guest Name..." required>
                                       </div>
                                   </div>
                                   <div class="form-group row">
                                       <label class="col-lg-4 col-form-label" for="email">Email<span class="text-danger">*</span>
                                       </label>
                                       <div class="col-lg-6">
                                           <input type="email" autocomplete="email" class="form-control" id="email" name="email" placeholder="Input The Guest Email..." required>
                                       </div>
                                   </div>
                                   <div class="form-group row">
                                       <label class="col-lg-4 col-form-label" for="telepon">Phone Number<span class="text-danger">*</span>
                                       </label>
                                       <div class="col-lg-6">
                                           <input type="tel" pattern="[0-9]{10,13}" class="form-control" id="telepon" name="telepon" placeholder="Input The Guest Email..." required>
                                       </div>
                                   </div>
                                   <div class="form-group row">
                                       <label class="col-lg-4 col-form-label" for="alamat">Address <span class="text-danger">*</span>
                                       </label>
                                       <div class="col-lg-6">
                                           <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Input the guest address..." style="height: 138px;"></textarea>
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
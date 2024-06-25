 <div class="content-body">


     <!-- row -->

     <div class="container-fluid">
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">User Data</h4>
                         <div class="table-responsive">
                             <table class="table table-hover  zero-configuration">
                                 <thead>
                                     <tr class="gradient-1" style="text-wrap: nowrap">
                                         <th>Number</th>
                                         <th>Username</th>
                                         <th>Password</th>
                                         <th>Email</th>
                                         <th>Role</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        if (isset($data)) :
                                            $no = 0;
                                        ?>
                                         <?php foreach ($data as $u) : ?>
                                             <tr>
                                                 <td><?= ++$no ?></td>
                                                 <td><?= $u['username'] ?></td>
                                                 <td><?= $u['password'] ?></td>
                                                 <td><?= $u['email'] ?></td>
                                                 <td><?= $u['role'] ?></td>
                                                 <td>
                                                     <span>
                                                         <a href="index.php?action=uUser&id=<?= $u['id'] ?>" data-toggle="tooltip" data-placement="top" title="Edit">
                                                             <i class="fa fa-pencil color-muted m-r-5 "></i>
                                                         </a>

                                                         <a href="index.php?action=dUser&id=<?= $u['id'] ?>"  class="sweet-confirm"  data-toggle="tooltip" data-placement="top" title="Delete">
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
                                         <th>Username</th>
                                         <th>Password</th>
                                         <th>Email</th>
                                         <th>Role</th>
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
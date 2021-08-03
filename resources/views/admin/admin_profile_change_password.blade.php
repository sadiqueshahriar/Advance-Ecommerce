 @extends('admin.admin_master')
 @section('admin')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <div class="container-full">

         <!-- Main content -->
         <section class="content">
             <div class="box">
                 <div class="box-header with-border">
                     <h4 class="box-title">Admin Password Change</h4>

                 </div>
                 <!-- /.box-header -->
                 <div class="box-body">
                     <div class="row">
                         <div class="col">
                             <form action="{{ route('update.change.password') }}" method="post">
                                 @csrf
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">

                                             <div class="controls">
                                                 <h5>Current password <span class="text-danger">*</span></h5>
                                                 <input type="password" name="oldpassword" id="current_password"
                                                     class="form-control" required=""
                                                     data-validation-required-message="This field is required">

                                             </div>

                                         </div>
                                     </div>
                                     <div class="col-md-6">

                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h5>New Password<span class="text-danger">*</span></h5>
                                             <div class="controls">
                                                 <input type="password" name="password" id="password" class="form-control"
                                                     required="" data-validation-required-message="This field is required"
                                                     aria-invalid="false">
                                                 <div class="help-block"></div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col-md-6">

                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h5>Confirm Password<span class="text-danger">*</span></h5>
                                             <div class="controls">
                                                 <input type="password" name="password_confirmation"
                                                     id="password_confirmation" class="form-control" required=""
                                                     data-validation-required-message="This field is required"
                                                     aria-invalid="false">
                                                 <div class="help-block"></div>
                                             </div>
                                         </div>

                                     </div>
                                     <div class="col-md-6">

                                     </div>
                                     <div class="col-md-6">
                                         <div class="text-xs-right">
                                             <input type="submit" class="btn btn-rounded btn-primary ml-3" value="Update">
                                         </div>
                                     </div>





                                 </div>
                             </form>

                         </div>
                         <!-- /.col -->
                     </div>
                     <!-- /.row -->
                 </div>
                 <!-- /.box-body -->
             </div>

         </section>
         <!-- /.content -->
     </div>

 @endsection

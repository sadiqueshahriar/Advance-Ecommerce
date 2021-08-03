 @extends('admin.admin_master')
 @section('admin')
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <div class="container-full">

         <!-- Main content -->
         <section class="content">
             <div class="box">
                 <div class="box-header with-border">
                     <h4 class="box-title">Admin Profile Edit</h4>

                 </div>
                 <!-- /.box-header -->
                 <div class="box-body">
                     <div class="row">
                         <div class="col">
                             <form action="{{ route('admin.profile.update') }}" method="post"
                                 enctype="multipart/form-data">
                                 @csrf
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">

                                             <div class="controls">
                                                 <h5>User Name <span class="text-danger">*</span></h5>
                                                 <input type="text" name="name" value="{{ $adminEdit->name }}"
                                                     class="form-control" required=""
                                                     data-validation-required-message="This field is required">
                                                 <div class="help-block"></div>
                                             </div>

                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h5>Email<span class="text-danger">*</span></h5>
                                             <div class="controls">
                                                 <input type="email" name="email" value="{{ $adminEdit->email }}"
                                                     class="form-control" required=""
                                                     data-validation-required-message="This field is required"
                                                     aria-invalid="false">
                                                 <div class="help-block"></div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <h5>Profile Image <span class="text-danger">*</span></h5>
                                             <div class="controls">
                                                 <input type="file" name="profile_photo_path" class="form-control"
                                                     required="" id="image">

                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <img id="showimage" class="rounded"
                                             src="{{ !empty($adminData->profile_photo_path) ? url('upload/admin_image/' . $adminData->profile_photo_path) : url('upload/no_image.jpg') }}"
                                             height="75px;" width="75px;">
                                     </div>



                                     <div class="text-xs-right">
                                         <input type="submit" class="btn btn-rounded btn-primary ml-3" value="Update">
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
     <script type="text/javascript">
         $(document).ready(function() {
             $('#image').change.(function(e) {
                 var reader = new FileReader();
                 reader.onload = function(e) {
                     $('#showimage').attr('src', e.target.result);
                 }
                 reader.readAsDataURL(e.target.files['0']);
             });

         });
     </script>
 @endsection

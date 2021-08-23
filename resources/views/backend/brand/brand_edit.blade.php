 @extends('admin.admin_master')
 @section('admin')
     <!-- Content Wrapper. Contains page content -->

     <div class="container-full">
         <!-- Content Header (Page header) -->
         <section class="content">
             <div class="row">

                 <!-- /.content -->
                 <div class="col-12">
                     <div class="box">
                         <div class="box-header with-border">
                             <h3 class="box-title">Edit Brand</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <form action="{{ route('brand.update', $brand->id) }}" method="post"
                                 enctype="multipart/form-data">
                                 @csrf
                                 <input type="hidden" name="id" value="{{ $brand->id }}">
                                 <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">


                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Brand Name English <span class="text-danger">*</span></h5>
                                         <input type="text" name="brand_name_en" class="form-control"
                                             value="{{ $brand->brand_name_en }}">
                                         @error('brand_name_en')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Brand Name Hindi <span class="text-danger">*</span></h5>
                                         <input type="text" name="brand_name_hin" class="form-control"
                                             value="{{ $brand->brand_name_hin }}">
                                         @error('brand_name_hin')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Brand Image<span class="text-danger">*</span></h5>
                                         <input type="file" name="brand_image" class="form-control" value="{{ $brand->brand_image }}>
                                                         @error('brand_image')
                                                                             <span class="
                                                 text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>




                                 <div class="text-xs-right">
                                     <input type="submit" class="btn btn-rounded btn-primary" value="Update">
                                 </div>

                             </form>

                         </div>
                         <!-- /.box-body -->
                     </div>
                 </div>
             </div>
         </section>
     </div>


 @endsection

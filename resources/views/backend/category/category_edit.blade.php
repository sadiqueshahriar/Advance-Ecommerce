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
                             <h3 class="box-title">Category Edit </h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <form action="{{ route('category.update', $categories->id) }}" method="post">
                                 @csrf
                                 <input type="hidden" name="id" value="{{ $categories->id }}">

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Category Name En<span class="text-danger">*</span></h5>
                                         <input type="text" name="category_name_en" class="form-control"
                                             value="{{ $categories->category_name_en }}">

                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Category Name Hin<span class="text-danger">*</span></h5>
                                         <input type="text" name="category_name_hin" class="form-control"
                                             value="{{ $categories->category_name_hin }}">

                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Category Icon<span class="text-danger">*</span></h5>
                                         <input type="text" name="category_icon" class="form-control"
                                             value="{{ $categories->category_icon }}">

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

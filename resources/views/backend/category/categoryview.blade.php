 @extends('admin.admin_master')
 @section('admin')
     <!-- Content Wrapper. Contains page content -->

     <div class="container-full">
         <!-- Content Header (Page header) -->
         <section class="content">
             <div class="row">
                 <div class="col-8">

                     <div class="box">
                         <div class="box-header with-border">
                             <h3 class="box-title">category List</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <div class="table-responsive">
                                 <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>Category Icon</th>
                                             <th>Category En</th>
                                             <th>Category Hin</th>
                                             <th>Action</th>

                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($categories as $item)
                                             <tr>
                                                 <td><span><i class="{{ $item->category_icon }}"></i></span></td>
                                                 <td>{{ $item->category_name_en }}</td>
                                                 <td>{{ $item->category_name_hin }}</td>


                                                 <td>
                                                     <a href="{{ route('category.edit', $item->id) }}"
                                                         class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                     <a href="{{ route('category.delete', $item->id) }}"
                                                         class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                                                 </td>


                                             </tr>
                                         @endforeach

                                 </table>
                             </div>
                         </div>
                         <!-- /.box-body -->
                     </div>
                     <!-- /.box -->


                     <!-- /.box -->
                 </div>
                 <!-- /.content -->
                 <div class="col-4">
                     <div class="box">
                         <div class="box-header with-border">
                             <h3 class="box-title">Add Category</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <form action="{{ route('category.store') }}" method="post">
                                 @csrf
                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Category Name En <span class="text-danger">*</span></h5>
                                         <input type="text" name="category_name_en" class="form-control">
                                         @error('category_name_en')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Category Name Hin <span class="text-danger">*</span></h5>
                                         <input type="text" name="category_name_hin" class="form-control">
                                         @error('category_name_hin')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Category Icon<span class="text-danger">*</span></h5>
                                         <input type="text" name="category_icon" class="form-control">
                                         @error('category_icon')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>




                                 <div class="text-xs-right">
                                     <input type="submit" class="btn btn-rounded btn-primary ml-3" value="Add New">
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

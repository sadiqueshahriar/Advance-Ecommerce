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
                             <h3 class="box-title">Subcategory List</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <div class="table-responsive">
                                 <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>Category Name</th>
                                             <th>SubCategory En</th>
                                             <th>Subcategory Hin</th>
                                             <th>Action</th>

                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($subcategories as $item)
                                             <tr>
                                                 <td>{{ $item['Category']['category_name_en'] }}</td>
                                                 <td>{{ $item->subcategory_name_en }}</td>
                                                 <td>{{ $item->subcategory_name_hin }}</td>


                                                 <td width="30%">
                                                     <a href="{{ route('subcategory.edit', $item->id) }}"
                                                         class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                     <a href="{{ route('subcategory.delete', $item->id) }}"
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
                             <h3 class="box-title">Add SubCategory</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <form action="{{ route('subcategory.store') }}" method="post">
                                 @csrf
                                 <div class="form-group">
                                     <h5>Select Category<span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <select name="category_id" class="form-control">
                                             <option value="" selected="" disabled="">Category Select</option>
                                             @foreach ($categories as $category)
                                                 <option value="{{ $category->id }}">{{ $category->category_name_en }}
                                                 </option>
                                             @endforeach

                                         </select>

                                         @error('category_id')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>SubCategory Name En <span class="text-danger">*</span></h5>
                                         <input type="text" name="subcategory_name_en" class="form-control">
                                         @error('subcategory_name_en')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>SubCategory Name Hin <span class="text-danger">*</span></h5>
                                         <input type="text" name="subcategory_name_hin" class="form-control">
                                         @error('subcategory_name_hin')
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

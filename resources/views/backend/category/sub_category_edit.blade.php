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
                             <h3 class="box-title">SubCategory Edit </h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <form action="{{ route('subcategory.update', $subcategories->id) }}" method="post">
                                 @csrf
                                 <input type="hidden" name="id" value="{{ $subcategories->id }}">
                                 <div class="form-group">
                                     <h5>Select Category<span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <select name="category_id" class="form-control">
                                             <option value="" selected="" disabled="">Category Select</option>
                                             @foreach ($categories as $category)
                                                 <option value="{{ $category->id }}"
                                                     {{ $category->id == $subcategories->category_id ? 'selected' : '' }}>
                                                     {{ $category->category_name_en }}
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
                                         <h5>SubCategory Name En<span class="text-danger">*</span></h5>
                                         <input type="text" name="subcategory_name_en" class="form-control"
                                             value="{{ $subcategories->subcategory_name_en }}">

                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>SubCategory Name Hin<span class="text-danger">*</span></h5>
                                         <input type="text" name="subcategory_name_hin" class="form-control"
                                             value="{{ $subcategories->subcategory_name_hin }}">

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

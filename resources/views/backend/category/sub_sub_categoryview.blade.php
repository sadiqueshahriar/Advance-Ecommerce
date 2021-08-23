 @extends('admin.admin_master')
 @section('admin')
     {{-- jquery cdn --}}
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- Content Wrapper. Contains page content -->

     <div class="container-full">
         <!-- Content Header (Page header) -->
         <section class="content">
             <div class="row">
                 <div class="col-8">

                     <div class="box">
                         <div class="box-header with-border">
                             <h3 class="box-title">Sub->Subcategory List</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <div class="table-responsive">
                                 <table id="example1" class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>Category</th>
                                             <th>SubCategory Name</th>
                                             <th>Sub-SubCategory En</th>
                                             <th style="width: 25%;">Action</th>

                                         </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($subsubcategories as $item)
                                             <tr>
                                                 <td>{{ $item['Category']['category_name_en'] }}</td>
                                                 <td>{{ $item['subcategory']['subcategory_name_en'] }}</td>
                                                 <td>{{ $item->subsubcategory_name_en }}</td>

                                                 <td>
                                                     <a href="{{ route('subsubcategory.edit', $item->id) }}"
                                                         class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                     <a href="{{ route('subsubcategory.delete', $item->id) }}"
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
                             <h3 class="box-title">Add Sub->SubCategory</h3>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                             <form action="{{ route('subsubcategory.store') }}" method="post">
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
                                     <h5>Select SubCategory<span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <select name="subcategory_id" class="form-control">
                                             <option value="" selected="" disabled="">SubCategory Select</option>


                                         </select>

                                         @error('subcategory_id')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Sub-SubCategory Name En <span class="text-danger">*</span></h5>
                                         <input type="text" name="subsubcategory_name_en" class="form-control">
                                         @error('subsubcategory_name_en')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="controls">
                                         <h5>Sub-SubCategory Name Hin <span class="text-danger">*</span></h5>
                                         <input type="text" name="subsubcategory_name_hin" class="form-control">
                                         @error('subsubcategory_name_hin')
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


     <script type="text/javascript">
         $(document).ready(function() {
             $('select[name="category_id"]').on('change', function() {
                 var category_id = $(this).val();
                 if (category_id) {
                     $.ajax({
                         url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                         type: "GET",
                         dataType: "json",
                         success: function(data) {
                             var d = $('select[name="subcategory_id"]').empty();
                             $.each(data, function(key, value) {
                                 $('select[name="subcategory_id"]').append(
                                     '<option value="' + value.id + '">' + value
                                     .subcategory_name_en + '</option>');
                             });
                         },
                     });
                 } else {
                     alert('danger');
                 }
             });
         });
     </script>


 @endsection

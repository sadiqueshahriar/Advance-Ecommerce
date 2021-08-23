<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
     public function CategoryView(){
        $categories=Category::latest()->get();
        return view('backend.category.categoryview',compact('categories'));
    }


    public function CategoryStore(Request $request){

        $request->validate([
            'category_name_en'=>'required',
            'category_name_hin'=>'required',
            'category_icon'=>'required',
        ]);


        Category::insert([
            'category_name_en'=>$request->category_name_en,
            'category_name_hin'=>$request->category_name_hin,
            'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_hin'=>str_replace(' ','-',$request->category_name_hin),
            'category_icon'=>$request->category_icon,
        ]);
        $nofification=array(
            'message'=>'Category Inserted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($nofification);//end method
    }

       public function CategoryEdit($id){
        $categories=Category::findOrFail($id);
        return view('backend.category.category_edit',compact('categories'));
        
    }//end method

     public function CategoryUpdate(Request $request){

            $brand_id=$request->id;
            Category::findOrFail($brand_id)->update([
            'category_name_en'=>$request->category_name_en,
            'category_name_hin'=>$request->category_name_hin,
            'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_hin'=>str_replace(' ','-',$request->category_name_hin),
            'category_icon'=>$request->category_icon,
            
        ]);
          $nofification=array(
            'message'=>'Category Updated Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.category')->with($nofification);//end method
        

    }//end method

     public function CategoryDelete($id){
       
        Category::findOrFail($id)->delete();
         $nofification=array(
            'message'=>'Category Deleted Successfully',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($nofification);//end method
         


    }

}

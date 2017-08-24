<?php

namespace App\Http\Controllers;

use DB;
use App\edoc_maincategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function IndexCategory(){
        $categories  =  DB::table('edoc_maincategories')->get()->toArray();
        return view('category.categoryHome',['category'=> $categories]);
    }

    public function ShowCategory(){
        $category  =  DB::table('edoc_maincategories')->get()->toArray();
        return view('category.categoryHome',compact('category'));
    }

    public function ShowListCategory(){
        $category  =  DB::table('edoc_maincategories')->get()->toArray();
        return view('category.categoryShow',compact('category'));
    }

    public function EditCategory($id){
        //$category  =  DB::table('edoc_maincategories')->get()->toArray();
        $category = edoc_maincategories::find($id);
        return view('category.categoryEdit',compact('category'));
    }

    public function StoreCategory(request $request){

       $cate_name = $request->input('name_cate');
       $cate_color = $request->input('color_cate');
       $cate_detail = $request->input('detail_cate');

       $cate = new edoc_maincategory;
       $cate->name =$cate_name;
       $cate->color =$cate_color;
       $cate->detail =$cate_detail;
       $cate->countFile = 0;
       $cate->save();

       return $this->IndexCategory();
       return 'yes';
    
        //return $request->all();
    }

    public function DeleteCategory(request $request){
        $filecategory = $request->input('selection-cate');
        $countofFile = DB::table('edoc_maincategories')->where('id', $filecategory)->value('countFile');
        if(($countofFile) < 1){ //Check ว่ามีไฟล์ที่จัดในหมวดนี้หรือไม่
            DB::table('edoc_maincategories')->where('id', $filecategory)->delete();
            return 'yes';
        }
        else{
        return 'the category is have file';
        }

        
    }

}

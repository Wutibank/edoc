<?php

namespace App\Http\Controllers;

use DB;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function IndexCategory(){
        $categories  =  DB::table('Categories')->get()->toArray();
        return view('category.catedel',['category'=> $categories]);
    }

    public function ShowCategory(){
        return view('category.cate_home');
    }

    public function StoreCategory(request $request){

       $cate_name = $request->input('name_cate');
       $cate_color = $request->input('color_cate');
       $cate_detail = $request->input('detail_cate');

       $cate = new Category;
       $cate->name =$cate_name;
       $cate->color =$cate_color;
       $cate->detail =$cate_detail;
       $cate->save();

        
       return 'yes';
    
        //return $request->all();
    }

    public function DeleteCategory(request $request){
        $filecategory = $request->input('selection-cate');
        $countofFile = DB::table('Categories')->where('id', $filecategory)->value('countFile');
        if(($countofFile) < 1){ //Check ว่ามีไฟล์ที่จัดในหมวดนี้หรือไม่
            DB::table('Categories')->where('id', $filecategory)->delete();
            return 'yes';
        }
        else{
        return 'the category is have file';
        }

        
    }

}

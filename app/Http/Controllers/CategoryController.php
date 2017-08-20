<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

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
}

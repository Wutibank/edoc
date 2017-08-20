<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    //
    public function index(){
        return view('upload.upload');
    }

    public function store(request $request){
        //return 'this is store funtion';
        if ($request->hasFile('image')){
       $request->file('image');
      // return $request->image->store('public');
      // return $request->image->extention(); นามสกุลของไฟล์
return $request->image->storeAs('public','bank.jpg'); //save with name file

    //return Storage::putFile('public/new',$request->file('image'));
    }else{
        return view('upload.upload');
    }
    }

    public function show(){
        //return Storage::allFiles('public');
        /*if (Storage::makeDirectory('public/make')){
            return 'Delete';
        }*/
       /* $url =  Storage::url('bank.jpg');
        return "<img src='".$url."'/>"; แสดงงไฟล์*/
        
        if (Storage::move('public/bank.jpg','new/bank.jpg')){
            return 'File Move';
        }

    }
}
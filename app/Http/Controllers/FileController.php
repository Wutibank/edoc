<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function showUploadForm(){
        return view('upload.file');
    }

    public function storeFile(request $request){
        if ($request->hasFile('file')){
            $filename =  $request->file->getClientOriginalName();//store file with original name
            $filesize =  $request->file->getClientSize();
            $filecategory = $request->input('selection-cate');
            $request->file->storeAs('public/upload', $filename);//store file in folder upload
            $file = new File;
            $file->name =$filename;
            $file->size =$filesize;
            $file->category =$filecategory;
            $file->save();

            
            return 'yes';
        }
        return $request->all();
    }
}

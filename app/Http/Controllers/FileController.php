<?php

namespace App\Http\Controllers;

use DB;
use App\File;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //

    
    public function index(){
        //$category = DB::table('categories')->pluck('id','name');
       // $Category = categories::all()->pluck('name', 'id');
        
       //return $categories->fetch_array();
       // $categories = category::pluck('name','id')->toArray();
       // return view('upload.file');
       $categories  =  DB::table('Categories')->get()->toArray();
       $fileshow = DB::table('files')->get()->toArray();
    return view('upload.file',['category'=> $categories,'filetoshow'=> $fileshow,'delisFinish'=> 0]);
    }

    public function showUploadForm(){
        return view('upload.file');
    }

    public function storeFile(request $request){
        if ($request->hasFile('file')){
            $filename =  $request->file->getClientOriginalName();//store file with original name
            $filesize =  $request->file->getClientSize();
            $fileextension = $request->file->Extension();
            $filenamefile =  md5($filename. time()).'.'.$fileextension;
            $filecategory = $request->input('selection-cate');
            
            $path = 'public/upload';
            $request->file->storeAs($path, $filenamefile);//store file in folder upload
            $filepath = 'upload/'.$filenamefile;

            $file = new File;
            $file->name =$filename;
            $file->size =$filesize;
            $file->category =$filecategory;
            $file->nameoffile =$filenamefile;
            $file->path =$filepath;            

            $file->save();

            return $this->index();
        }
        //return $request->all();
        return 'you are not select file';
    }
    public function delFile($file_id){
        
        
        
        $categories  =  DB::table('Categories')->get()->toArray();
        $fileshow = DB::table('files')->get()->toArray();
        $fileshowid = DB::table('files')->pluck('path','id');
        $filepath = $fileshowid[$file_id];
        
        if(Storage::delete('public/'.$filepath)){
            $delFinish = DB::table('files')->where('id', $file_id)->delete(); //ลบชื่อไฟล์ในดาต้าเบส
            return view('upload.file',['category'=> $categories,'filetoshow'=> $fileshow,'delisFinish'=> 1]);
            //return 'file is delete';
        }
        return 'file is not found';

       
        //return $this->index();
    }
}

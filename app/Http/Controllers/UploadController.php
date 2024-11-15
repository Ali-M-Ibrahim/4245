<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(){
        return view('upload');
    }
    public function method1(Request $request){
        if($request->hasFile('myfile')){
            //Step 1: getting image name
            $originalname = $request->file('myfile')->getClientOriginalName();
            //Step 2: rename the image and add timestamp to it to avoid overwriting
            $filename= time() . '-' . $originalname;
            //Step 3: upload the image to public folder
            $request->file('myfile')->move('images',$filename);

            $data = new Image();
            $data->name=$originalname;
            $data->path="images/".$filename;
            $data->save();
            return "image uploaded successfully";
        }else{
            return "missing file or encoding type";
        }
    }

    public function displayImage($id){
        $data= Image::find($id);
        return view('displayimage')->with('data',$data);
    }


    public function method2(Request $request){
        if($request->hasFile('myfile')){
            //Step 1: getting image name
            $originalname = $request->file('myfile')->getClientOriginalName();
            //Step 2: rename the image and add timestamp to it to avoid overwriting
            $filename= time() . '-' . $originalname;
            //Step 3: upload the image to storage folder
            $request->file('myfile')->storeAs('images2',$filename,'public');
            $data = new Image();
            $data->name=$originalname;
            $data->path="storage/images2/".$filename;
            $data->save();
            return "image uploaded successfully";
        }else{
            return "missing file or encoding type";
        }
    }


    public function method3(Request $request){
        $request->validate([
            'myfile'=>'required|mimes:png'
        ]);
        if($request->hasFile('myfile')){
            $imgname = $request->file('myfile')->store('images3','public');
            $data = new Image();
            $data->name=$request->file('myfile')->getClientOriginalName();
            $data->path="storage/".$imgname;
            $data->save();
            return "image uploaded successfully";
        }else{
            return "missing file or encoding type";
        }
    }
}

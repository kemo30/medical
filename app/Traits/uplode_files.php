<?php 
namespace App\Traits;
 
use Illuminate\Support\Facades\Storage;
trait uplode_files{


    function SaveImg($photo,$path){
        $file_name =$photo->getClientOriginalName();
        $file_path_name=time() .$file_name;
        $photo->move($path,$file_path_name);
        return  $file_path_name ;
    }

    function DeleteImg($photo,$path){
        Storage::disk($path)->delete($photo);
    }
}

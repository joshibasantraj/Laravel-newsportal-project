<?php



function uploadImage($image,$dir_name){
    $path=public_path()."/uploads/".$dir_name;

    if(!File::exists($path)){
        File::makeDirectory($path,0777,true,true);
    }

    $file_name=ucfirst($dir_name)."-".date('YmdHis').rand(0,99).".".$image->getClientOriginalExtension();
    $success=$image->move($path,$file_name);
    if($success){
        return $file_name;
    }else{
        return false;
    }

}

?>
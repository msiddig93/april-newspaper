<?php

use App\Models\Setting;

function setting($key = 'app_name')
{
    return Setting::where([
        'name' => $key
    ])->first()->value ?? null;
}


function upload($file, $path){
    $file->store($path);
    return 'uploads/'. $path .'/' . $file->hashName();
}


function message($type = 'error', $message = null){
    if($type == 'success'){
        $msg = $message ?? 'تمت العملية بنجاح';
        toastr()->success($msg);
    }else{
        $msg = $message ?? 'حدث خطأ ما الرجاء المحاولة لاحقاً';
        toastr()->error($msg);
    }
}

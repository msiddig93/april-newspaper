<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

function upload_base64_image($image_64, $save_path = '')
{
    try {
        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);

        // find substring fro replace here eg: data:image/png;base64,

        $image = str_replace($replace, '', $image_64);

        $image = str_replace(' ', '+', $image);

        $imageName = Str::random(10) . '_' . time() . '.' . $extension;

        $path = $save_path . $imageName;
        Storage::put($path, base64_decode($image));


        // return the uploads path
        return 'uploads/' . $path;
    } catch (\Exception $e) {
        return;
    }
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

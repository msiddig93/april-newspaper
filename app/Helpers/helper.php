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

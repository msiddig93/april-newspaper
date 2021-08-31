<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::all();
        return view('dashboard.settings.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();

            $data = $request->except('_token', 'app_logo');
            foreach($data as $key => $value){
                Setting::updateOrCreate([
                    'name' => $key
                ],[
                    'name' => $key,
                    'value' => $value,
                ]);
            }
            // if new logo has been passed with the data . then update the logo .
            if($request->file('app_logo')){
                $logo = Setting::where('name', 'app_logo')->get();
                // delete the old logo if existed .
                if($logo->count() > 0 ){
                    Storage::delete(str_replace('uploads/', '', $logo->first()->value));
                }
                // $file = $request->file('app_logo');
                // $file->store('app_logo/');
                // $filename =  'uploads/app_logo/' . '/' . $file->hashName();

                Setting::updateOrCreate([
                    'name' => 'app_logo'
                ], [
                    'name' => 'app_logo',
                    'value' => upload($request->file('app_logo'), 'app_logo'),
                ]);
            }

            DB::commit();
            toastr()->success('تم تحديث إعدادات الموقع');
            return redirect()->route('settings.index');

        }catch(\Exception $e){
            DB::rollback();
            return $e;
            Log::error($e->getMessage());
            return redirect()->back()->with([
                'error' => 'somethings goes wrong'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

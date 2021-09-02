<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Articale;
use App\Models\ArticaleMedia;
use App\Models\Department;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Articale::orderBy('id','desc')->get();
        return view('dashboard.articales.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'writers' => Writer::all(),
            'departments' => Department::all()
        ];

        return view('dashboard.articales.create', compact('data'));
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
            $articale = Articale::create($request->except('_token', 'image'));

            foreach($request->image as $image){
                ArticaleMedia::create([
                    'articale_id' => $articale->id,
                    'path' => upload_base64_image($image['src'],'articales/'.$articale->id.'/')
                ]);
            }

            DB::commit();
            message('success','تم حفظ بيانات المقال بنجاح');
            return redirect()->route('articale.index');
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            Log::error($e->getMessage());
            message('error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Articale  $articale
     * @return \Illuminate\Http\Response
     */
    public function show(Articale $articale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Articale  $articale
     * @return \Illuminate\Http\Response
     */
    public function edit(Articale $articale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Articale  $articale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articale $articale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Articale  $articale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articale $articale)
    {
        //
    }
}

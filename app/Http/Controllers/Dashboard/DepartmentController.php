<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $department = $request->id ? Department::find($request->id) : null;
        $data = Department::orderBy('id','desc')->get();
        return view('dashboard.departments.index',compact('data', 'department'));
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

            Department::create($request->except('_tokent'));

            DB::commit();
            message('success','تم حفظ بيانات القسم بنجاح');
            return redirect()->route('departments.index');
        }catch(\Exception $e){
            DB::rollback();
            Log::error($e->getMessage());
            message('error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Department $department)
    {
        try {
            DB::beginTransaction();

            $department->update($request->except('_tokent'));

            DB::commit();
            message('success', 'تم تحديث بيانات القسم بنجاح');
            return redirect()->route('departments.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            message('error');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        message('success');
        return redirect()->route('departments.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        try {
            DB::beginTransaction();

            $department->update($request->except('_tokent'));

            DB::commit();
            message('success', 'تم تحديث بيانات القسم بنجاح');
            return redirect()->route('departments.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            message('error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}

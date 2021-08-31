@extends('layouts.master')
@section('title')
    الاعدادات العامة
@stop
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    الاعدادات العامة
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('settings.store') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue"></h6><br>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>إسم الموقع <span class="text-danger">*</span></label>
                                <input type="text"
                                    value="{{ $data->where('name','app_name')->first()->value ?? '' }}"
                                    name="app_name" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>البريد الالكتروني<span class="text-danger">*</span></label>
                                <input type="text"
                                    value="{{ $data->where('name','app_email')->first()->value ?? '' }}"
                                    name="app_email" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>حساب الفيسبوك<span class="text-danger">*</span></label>
                                <input type="text"
                                    value="{{ $data->where('name','facebook')->first()->value ?? '' }}"
                                    name="facebook" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>الانستجرام<span class="text-danger">*</span></label>
                                <input type="text"
                                    value="{{ $data->where('name','instagram')->first()->value ?? '' }}"
                                    name="instagram" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>تويتر<span class="text-danger">*</span></label>
                                <input type="text"
                                    value="{{ $data->where('name','twitter')->first()->value ?? '' }}"
                                    name="twitter" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group w-100 h-100"
                                style="background: url({{ asset(setting('app_logo')) }});background-size: contain;background-repeat: no-repeat;">
                                <label class="p-2" style="background: rgba(255, 255, 255, 1)">الشعار</label>
                                <input type="file" name="app_logo">
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="form-group">
                                <label>عن الموقع<span class="text-danger">*</span></label>
                                <textarea type="text"
                                    name="app_about" class="form-control"
                                >{{ setting('app_about') }}</textarea>
                            </div>
                        </div>

                    </div>


                    <div class="col-12 text-center">
                        <button class="btn btn-success btn-sm nextBtn btn-lg"
                            type="submit">تحديث البيانات</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection

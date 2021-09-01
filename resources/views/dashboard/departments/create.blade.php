@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    إضافة كاتب
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    إضافة كاتب
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <form method="post" action="{{ route('writers.store') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <h3 class="shadow border-bottom pb-4 text-center">
                        {{ trans('Students_trans.personal_information') }}</h3><br>
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label>إسم الكاتب<span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>تاريخ الميلاد<span class="text-danger">*</span></label>
                                <input class="form-control @error('birthdate') is-invalid @enderror" type="text" id="datepicker-action" name="birthdate"
                                    value="{{ old('birthdate') }}" required data-date-format="yyyy-mm-dd">
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>رقم الهاتف<span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ old('phone') }}" required
                                    class="form-control  @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>البريد الالكتروني<span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <hr>

                            <div class="form-group">
                                <label> حساب الفيسبوك</label>
                                <input type="text" name="facebook" value="{{ old('facebook') }}"
                                    class="form-control @error('facebook') is-invalid @enderror">
                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> حساب التويتر</label>
                                <input type="text" name="twitter" value="{{ old('twitter') }}"
                                    class="form-control @error('twitter') is-invalid @enderror">
                                @error('twitter')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> نبذة عن الكاتب</label>
                                <textarea name="about" rows="5" class="form-control @error('about') is-invalid @enderror">{{ old('about') }}</textarea>
                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="card @error('photo') alert alert-danger p-0 @enderror">
                                <button type="button" class="card-header btn text-center">حدد صورة الكاتب</button>
                                <div class="card-body p-0 position-relative">
                                    <img src="{{ asset('assets/images/bg/login.jpg') }}" style="cursor: pointer"
                                        id="user-photo" class="img-thumbnail w-100 btn rounded bg-white shadow form-control p-0 @error('photo') is-invalid @enderror"
                                        onclick="clickImg('#photo')" />
                                    <input type="file"
                                        style="opacity: 0;height: 1px;"
                                        class="position-absolute hide form-control @error('photo') is-invalid @enderror" onchange="readUrl(this,'#user-photo')"
                                        name="photo" accept="image/*" id="photo">
                                    @error('photo')
                                        <span class="invalid-feedback m-4" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <hr>
                        <button class="btn btn-success btn-sm nextBtn btn-lg" type="submit">حفظ البيانات</button>
                        <button class="btn btn-warning btn-sm nextBtn btn-lg" type="submit">إلغاء</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection

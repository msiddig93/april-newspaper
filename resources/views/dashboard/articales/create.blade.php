@extends('layouts.master')
@section('css')
   <link rel="stylesheet" href="{{ asset('assets/ckEditor/') }}">
<style>
    .image-container{
        height: auto;
        overflow-x: hidden;
        scroll-behavior: smooth;
    }

    .w-25{
        width: 22% !important
    }
    .image-box{
        margin: 5px;
        display: inline-block;
        transition: all 0.5s ease-in-out
    }

    .image-container .active {
        border: 2px solid #14ca14 !important;
        box-shadow: -1px 2px 10px -5px #14ca14 !important;
    }

    .image-container .card .card-body .icon{
        display: block;
        text-align: center;
        padding: 5px;
        font-size: 31px;
        color: #fff;
        cursor: pointer;
    }

    .image-container .active .card-body .icon{
        color: #14ca14;
    }

    .dorp-image-select{
        display: none;
        height: 125px !important;
        border: 1px dashed;
        margin: 26px 0px;
    }

    .check-lable{
        cursor: pointer;
        padding: 5px 11px;
        line-height: 30px;
        font-size: 18px;
    }
</style>
@section('title')
    إضافة مقال
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    إضافة مقال
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

                <form method="post" action="{{ route('articale.store') }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @csrf
                    <h3 class="shadow border-bottom pb-4 text-center">
                        {{ 'المعلومات الاساسية' }}</h3><br>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>عنوان المقال<span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ old('title') }}" required
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>كاتب المقال<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2 @error('writer_id') is-invalid @enderror" name="writer_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($data['writers'] as $writer)
                                        <option {{ old('writer_id') && old('writer_id') == $writer->id ? 'selected' : '' }}
                                            value="{{ $writer->id }}"
                                        >{{ $writer->name }}</option>
                                    @endforeach
                                </select>
                                @error('writer_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>قسم المقال<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2 @error('department_id') is-invalid @enderror" name="department_id">
                                    <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                    @foreach($data['departments'] as $department)
                                        <option {{ old('department_id') && old('department_id') == $department->id ? 'selected' : '' }}
                                            value="{{ $department->id }}"
                                        >{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                            <div class="form-group">
                                <label> محتوي المقال</label>
                                <textarea
                                    name="content"
                                    rows="5"
                                    id="editor"
                                    class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr>
                        </div>

                        <div class="col-12 card">
                            <h4
                                class="card-title text-left"
                            >صور المقال
                            <button
                                class="btn btn-dark pull-left"
                                type="button"
                                onclick="selectImages(this)"
                            >
                            إضافة صور
                            </button>
                            <input
                                placeholder="إختر الصور من هنا"
                                class="dorp-image-select"
                                type="file"
                                style="display: none"
                                multiple
                                onchange="loadImages(this)"
                                accept="image/*"
                            >
                            </h4>
                            <div class="image-container row">

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
<script src="{{ asset('assets/ckEditor/js/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace("editor");

    function loadImages(input){
        if (input.files) {
            console.log(input.files);
                // file = input.files[0];
                reader = new FileReader();
                for (let i = 0; i < input.files.length; i++) {
                    file = input.files[i];
                    reader = new FileReader();
                    if (file.type.toString() == 'image/png' || file.type.toString() == 'image/jgp' || file.type.toString() == 'image/jpeg') {
                        reader.readAsDataURL(file);
                        reader.onload = function (e) {
                            addImage(e.target.result);
                        }
                    } else {
                        $(input).val(null);
                        // $('#type-error').slideToggle();
                    }
                }
                $(input).val(null);
        }
    }

    index = 1;
    function addImage(path){

        var is_main = Number(index) == 1 ? 1 : 0
        var active = Number(index) == 1 ? 'active' : ''

        var box = `
        <div class="col-lg-2 col-md-4 col-sm-6 col-12">
        <div class="card border-0 ${active} image-box shadow">
            <div class="card-body border-0">
                <button
                    type="button"
                    onclick="removeImage(this)"
                    class="btn btn-outline-danger btn-sm position-absolute left"
                >
                    <i class="fas fa-trash-alt"></i>
                </button>
                <img
                    src="${path}"
                    class="img-thumbnail w-100 user-photo"
                    style="cursor: pointer;height: 80px;"
                    id="preview_${index}"
                    onclick="makeMainImage(this)"
                >
                <i
                    class="far fa-check-circle icon"
                    onclick="makeMainImage(this)"
                ></i>
            </div>
            <input
                type="hidden"
                value="${path}"
                name="image[${index}][src]">
            <input
                type="hidden"
                class='main'
                value="${is_main}"
                name="image[${index}][main]">
        </div>
        </div>
        `

        $('.image-container').append(box)
        index++
    }

    function selectImages(btn){
        $(btn).siblings('input').click()
    }

    function makeMainImage(btn){
        $(btn).parent().parent().siblings('.active').children('.main').val(0)
        $(btn).parent().parent().siblings().removeClass('active')
        $(btn).parent().parent().addClass('active')

        var input = $(btn).parent().siblings('.main').val(1);
        $('#main_image').val(1)
    }

    function removeImage(btn){
        if(confirm('حذف الصورة بشكل نهائي ؟')){
            $(btn).parent().parent().parent().remove()
        }
    }

</script>
@endsection

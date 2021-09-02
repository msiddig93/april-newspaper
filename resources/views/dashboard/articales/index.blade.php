@extends('layouts.master')
@section('title')
    إدارة المقالات
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        إدارة المقالات
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{route('articale.create')}}" class="btn btn-success pull-left mb-30" role="button"
                        aria-pressed="true">إضاقة مقال</a>
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                            <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الصورة </th>
                                <th>العنوان </th>
                                <th>االمحتوي</th>
                                <th>تاريخ الاضافة</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $writer)
                                <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$writer->title}}</td>
                                <td>{{$writer->title}}</td>
                                <td>{!! mb_substr($writer->content,0,100).'...' !!}</td>
                                <td>{{$writer->created_at->format('M d-Y')}}</td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            العمليات
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{route('writers.edit',$writer->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات المقال</a>
                                            <a class="dropdown-item" href="{{route('writers.edit',$writer->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات المقال</a>
                                            <a class="dropdown-item" data-target="#Delete_Student{{ $writer->id }}" data-toggle="modal" href="##Delete_Student{{ $writer->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف بيانات المقال</a>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            {{-- @include('pages.Students.Delete') --}}
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection

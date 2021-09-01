@extends('layouts.master')
@section('title')
    إدارة الكُتاب
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        إدارة الكُتاب
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('writers.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('main_trans.add_student')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Students_trans.name')}}</th>
                                            <th>{{trans('Students_trans.email')}}</th>
                                            <th>{{trans('Students_trans.gender')}}</th>
                                            <th>{{trans('Students_trans.Grade')}}</th>
                                            <th>{{trans('Students_trans.classrooms')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $writer)
                                            <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$writer->name}}</td>
                                            <td>{{$writer->email}}</td>
                                            <td>{{$writer->phone}}</td>
                                            <td>{{$writer->birthdate}}</td>
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        العمليات
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item" href="{{route('writers.edit',$writer->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  عرض بيانات الكاتب</a>
                                                        <a class="dropdown-item" href="{{route('writers.edit',$writer->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  تعديل بيانات الكاتب</a>
                                                        <a class="dropdown-item" data-target="#Delete_Student{{ $writer->id }}" data-toggle="modal" href="##Delete_Student{{ $writer->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  حذف بيانات الكاتب</a>
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
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection

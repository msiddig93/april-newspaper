@extends('layouts.master')
@section('title')
    إدارة أقسام الموقع
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        إدارة أقسام الموقع
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-7 col-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>إسم القسم</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $writer)
                                <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{$writer->name}}</td>
                                <td>
                                    <div class="dropdown show">
                                        <a class="btn btn-success" href="{{route('departments.index')}}?id={{ $writer->id }}"><i class="far fa-edit"></i></a>
                                        <a class="btn btn-danger" onclick="if(!confirm('are sure !?')){ return false}" href="{{route('departments.edit',$writer->id)}}"><i class="fas fa-trash"></i></a>
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
        <div class="col-12 col-lg-5 mb-30">
            @if ($department)
            <div class="card card-statistics">
                <div class="card-header text-center alert alert-info">تحديث بيانات القسم</div>
                <div class="card-body">
                    <form
                        action="{{ route('departments.update',$department->id) }}"
                        method="PATCH"
                    >
                        @csrf
                        <div class="form-group">
                            <label for="name">إسم القسم</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ $department->name }}"
                                class="form-control"
                                required
                            >
                        </div>
                        <hr>
                        <div class="form-group text-center">
                            <button class="btn btn-dark" type="submit">تحديث بيانات القسم</button>
                            <button class="btn btn-warning" type="reset">إعادة تعين</button>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <div class="card card-statistics">
                <div class="card-header text-center">إضافة قسم جديد</div>
                <div class="card-body">
                    <form
                        action="{{ route('departments.store') }}"
                        method="POST"
                    >
                        @csrf
                        <div class="form-group">
                            <label for="name">إسم القسم</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                required
                            >
                        </div>
                        <hr>
                        <div class="form-group text-center">
                            <button class="btn btn-dark" type="submit">حفظ بيانات القسم</button>
                            <button class="btn btn-warning" type="reset">إعادة تعين</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection

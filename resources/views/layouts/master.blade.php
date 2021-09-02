<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')

    <style>
        .form-control {
            border-radius: 3px;
            font-size: 13px;
            height: auto;
            line-height: 1.33333;
            padding: 10px 5px;
            background: #f3f9ff;
            color: #323232;
            border: 1px solid #eee;
            box-shadow: 0px 2px 6px -5px #000;
            border-radius: 4px !important;
        }
    </style>
</head>

<body class="">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')
        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
                                    class="default-color">{{ trans('main_trans.Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">@yield('PageTitle')</li>
                        </ol>
                    </div>
                </div>

                @yield('content')

                <!--=================================
 wrapper -->

                <!--=================================
 footer -->

                @include('layouts.footer')
            </div><!-- main content wrapper end-->
        </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>

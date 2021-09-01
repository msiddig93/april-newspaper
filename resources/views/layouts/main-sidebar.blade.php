<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('home') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">لوحة
                                    التحكم</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ setting('app_name') }}</li>


                    <!-- Writer -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Writer-menu">
                            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                                    class="right-nav-text">إدارة الكُتاب</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Writer-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('writers.index') }}">الكُتاب</a> </li>
                            <li class=""> <a href="{{ route('writers.create') }}">إضافة كاتب</a> </li>
                        </ul>
                    </li>

                    <!-- Department-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Department-icon">
                            <div class="pull-left"><i class="fas fa-book-open"></i><span
                                    class="right-nav-text">أقسام الموقع</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Department-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('departments.index') }}">الاقسام</a> </li>
                        </ul>
                    </li>


                    <!-- news-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#news-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span
                                    class="right-nav-text">إدارة الاخبار</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="news-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">الأخبار</a> </li>
                            <li> <a href="themify-icons.html">إضافة خبر</a> </li>
                            <li> <a href="weather-icon.html">الأرشيف</a> </li>
                        </ul>
                    </li>


                    <!-- Settings-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                            <div class="pull-left"><i class="fas fa-cogs"></i><span
                                    class="right-nav-text">الإعدادات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('settings.index') }}">الاعدادات العامة</a> </li>
                        </ul>
                    </li>


                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span
                                    class="right-nav-text">إدارة المستخدمين</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================

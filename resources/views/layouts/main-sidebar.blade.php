<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        {{-- javascript:void(0); --}}
                        <a href=" {{ route('home') }}" >
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text" >الصفحه الرئيسيه</span>
                            </div>

                        </a>
                        {{-- <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('home') }}">Dashboard 01</a> </li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul> --}}
                    </li>
                    <!-- menu title -->
                    @can('إدارة الأطباء')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">المدير</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fa fa-user-md"></i><span
                                class="right-nav-text">إدارة الأطباء</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                        </a>
                        @can('قائمة الأطباء')
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('doctor.index') }}">قائمة الأطباء</a></li>
                        </ul>
                        @endcan
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        @can('إدارة الأقسام')
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="fa fa-database"></i><span
                                class="right-nav-text">إدارة الاقسام</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            @endcan
                        @can('قائمة الأقسام')
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('section.index') }}">قائمة الاقسام</a> </li>
                        </ul>
                        @endcan
                    </li>
                    <!-- menu item todo-->
                    <!-- menu item Form-->
                    <li>
                        @can('إدارة العنابر')
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="fa fa-bed"></i><span class="right-nav-text">إدارة العنابر</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        @endcan
                        @can('قائمة العنابر')
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('ward.index') }}">قائمة العنابر</a> </li>
                        </ul>
                        @endcan
                     @endcan
                    </li>
                    <!-- menu item table -->

                    <!-- menu item Charts-->
                    <li>
                        @can('إدارة المستخدمين')
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="fa fa-group"></i><span
                                class="right-nav-text">إدارة المستخدمين</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                        @endcan
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            @can('قائمة المستخدمين')
                            <li> <a href="{{ route('users.index') }}">قائمة المستخدمين</a> </li>
                            @endcan
                            @can('صلاحيات المستخدمين')
                            <li> <a href="{{ route('roles.index') }}">صلاحيات المستخدمين</a> </li>
                            @endcan
                        </ul>

                    </li>
                    <!-- menu title -->
                    @can('الإستقبال')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الإستقبال</li>
                    <!-- menu item Widgets-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="fa fa-television"></i><span class="right-nav-text">الإستقبال</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        @can('بيانات المريض الأوليه')
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('reception.index') }}">بيانات المريض الأوليه</a> </li>
                        </ul>
                        @endcan
                    @endcan

                    </li>
                    @can('إدارة المرضى')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الطبيب</li>
                    <!-- menu item Custom pages-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                            <div class="pull-left"><i class="fa fa-plus-square"></i><span class="right-nav-text">إدارة المرضى</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                            @can('قائمة المرضى')
                            <li> <a href="{{ route('patient.index') }}">قائمة المرضى</a> </li>
                            @endcan
                            @can('بيانات المريض النهائيه')
                            <li> <a href="{{ route('final_data.create') }}">بيانات المريض النهائية</a> </li>
                            @endcan
                        </ul>
                    @endcan

                    </li>
                    <!-- menu font icon-->
                    <li>
                        @can('العمليات و التنويم')
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="fa fa-heartbeat"></i><span class="right-nav-text">العمليات و التنويم</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        @endcan

                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            @can('قائمة العمليات')
                            <li> <a href="{{ route('operation.index') }}">قائمة العمليات</a> </li>
                            @endcan
                            {{-- @can('إرشيف العمليات') --}}
                            <li> <a href="{{ route('OperationAttachment.index') }}">إرشيف العمليات</a> </li>
                            {{-- @endcan --}}
                            @can('قائمة التنويم')
                            <li> <a href="{{ route('intensive_care.index') }}">قائمة التنويم</a> </li>
                            @endcan
                        </ul>
                    </li>
                    @can('الفحوصات')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">المعمل</li>
                    <!-- menu item Authentication-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="fa fa-stethoscope"></i><span
                                    class="right-nav-text">الفحوصات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        @can('قائمة الفحوصات')
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('examination.index') }}">قائمة الفحوصات</a> </li>
                        </ul>
                        @endcan
                    </li>
                    @endcan
                    @can('المتابعه')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">المتابعه</li>
                    <!-- menu item Custom pages-->
                    <!-- menu item Widgets-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#tablee">
                            <div class="pull-left"><i class="fa fa-thermometer-full"></i><span class="right-nav-text">المتابعه</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        @can('قائمة المتابعه')
                        <ul id="tablee" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('patient_follow_up.index') }}">قائمة المتابعه</a> </li>
                        </ul>
                        @endcan
                    </li>
                    @endcan
                    <!-- menu item maps-->
                @can('إدارة السجل الطبي و التقارير')
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">الإحصاء</li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="fa fa-files-o"></i><span class="right-nav-text">إدارة السجل الطبي و التقارير</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                @endcan
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            @can('السجلات الطبيه')
                            <li> <a href="{{ route('medical_record.index') }}">السجلات الطبيه</a> </li>
                            @endcan
                            <li>
                                @can('التقارير')
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">التقارير<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                @endcan
                                <ul id="error" class="collapse">
                                    @can('أورنيك 3')

                                    <li> <a href="{{ route('report.index') }}">أورنيك '3'</a> </li>
                                    @endcan
                                    @can('الجراحه و التدخلات الطبيه')

                                    <li> <a href="{{ route('operation_report.index') }}">الجراحه و التدخلات الطبيه</a> </li>
                                    @endcan
                                    @can('الأمراض الساريه و الغير ساريه')

                                    <li> <a href="{{ route('diseases_report.index') }}">الأمراض الساريه و الغير ساريه</a> </li>
                                    @endcan
                                    @can('المواليد و الوفيات')

                                    <li> <a href="{{ route('birthDeathReport.index') }}">المواليد و الوفيات</a> </li>
                                    @endcan
                                </ul>
                            </li>
                            <li>
                                @can('إدارة المواليد و الوفيات')
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#errore"> إدارة المواليد و الوفيات<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                @endcan
                                <ul id="errore" class="collapse">
                                    @can('وثيقة إخبار ولادة')

                                    <li> <a href="{{ route('birth.index') }}">وثيقة إخبار ولادة</a> </li>
                                    @endcan
                                    @can('وثيقة إخبار وفاة')

                                    <li> <a href="{{ route('death.index') }}">وثيقة اخبار وفاة</a> </li>
                                    @endcan
                                </ul>
                            </li>
                            <li>
                                @can('إرشيف المواليد و الوفيات')
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#archive"> أرشيف المواليد و الوفيات<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                @endcan
                                <ul id="archive" class="collapse">
                                    @can('إرشيف المواليد')

                                    <li> <a href="{{ route('birthArchive.index') }}">أرشيف المواليد</a> </li>
                                    @endcan
                                    @can('إرشيف الوفيات')

                                    <li> <a href="{{ route('birthArchive.create') }}">أرشيف الوفيات</a> </li>
                                    @endcan
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================

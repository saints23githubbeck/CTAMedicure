<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs  medibg" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <a href="{{route('dashboard.show')}}" class="nav_logo fw-bolder text-white "> <span
                            class="nav_logo-name ">MEDICARE</span> </a>
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dashboard.show')}}">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    @can('isAdmin_Patient','App\Models\Role')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('appointments')}}">
                                <i class="fas fa-calendar-day"></i> <span
                                        class="nav_name text-white ">Appointments</span>
                            </a>
                        </li>
                    @endcan

                    @can('isAdmin','App\Models\Role')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('roles.show')}}">
                                <i class="fas fa-user-friends"></i> <span class="nav_name text-white ">Roles</span>
                            </a>
                        </li>
                    @endcan
                    @can('isAdmin_Patient','App\Models\Role')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('pres')}}">
                                <i class="fas fa-prescription-bottle"></i> <span class="nav_name text-white ">Prescription</span>
                            </a>
                        </li>
                    @endcan



                    @can('isAdmin','App\Models\User')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('admin.location')}}">
                                <i class="fas fa-user-friends "></i> <span class="nav_name text-white ">location</span>
                            </a>
                        </li>
                    @endcan
                    {{--@can('isAdmin','App\Models\User')--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('constant.setting')}}">--}}
                                {{--<i class="fas fa-user-friends "></i> <span class="nav_name text-white ">Constant settings</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endcan--}}

                    {{--@can('isAdmin','App\Models\User')--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('admin.location')}}">--}}
                                {{--<i class="fas fa-user-friends "></i> <span class="nav_name text-white ">location</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endcan--}}

                    {{--@can('isAdmin','App\Models\User')--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('')}}">--}}
                                {{--<i class="fas fa-user-friends "></i> <span class="nav_name text-white ">Constant settings</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endcan--}}




                    {{--@can('isAdmin','App\Models\User')--}}
                    {{--<li class="nav-item ">--}}
                    {{--<a class="nav-link" href="{{route('admin.location')}}">--}}
                    {{--<i class="fas fa-user-friends "></i> <span class="nav_name text-white ">location</span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--@endcan--}}



                    {{--<li class="nav-item ">--}}
                    {{--<a class="nav-link" href="{{route('location')}}">--}}
                    {{--<i class="fas fa-user-friends "></i> <span class="nav_name text-white ">location</span>--}}
                    {{--</a>--}}
                    {{--</li>--}}

                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('users')}}">
                            <i class="fas fa-user-friends "></i> <span class="nav_name text-white ">Users</span>
                        </a>
                    </li>

                    @can('isAdmin','App\Models\User')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('constant.setting')}}">
                                <i class="fas fa-tasks"></i><span
                                        class="nav_name text-white ">Consultation Settings</span>
                            </a>
                        </li>
                    @endcan
                    @can('isAdmin_Pharmacy','App\Models\Role')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('prescription.show')}}">
                                <i class="fas fa-tasks"></i><span
                                        class="nav_name text-white ">Prescription Request </span>
                            </a>
                        </li>
                    @endcan


                    @can('update','App\Models\Consultancy')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('appointment.list')}}">

                                <i class="fas fa-tasks"></i><span
                                        class="nav_name text-white ">Appointment Request </span>
                            </a>
                        </li>
                    @endcan
                    @can('isAdmin_Pharmacy_Delivary','App\Models\Role')
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('delivery.show')}}">
                                <i class="fas fa-tasks"></i><span class="nav_name text-white ">Delivary List</span>
                            </a>
                        </li>
                    @endcan

                    {{--@can('isAdmin_Pharmacy_Delivary','App\Models\Role')--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('completed_delivery')}}">--}}
                                {{--<i class="fas fa-tasks"></i><span class="nav_name text-white ">Completed Delivery</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endcan--}}

                    {{--@can('isAdmin','App\Models\User')--}}

                        {{--<i class="fas fa-tasks"></i><span class="nav_name text-white">Appointment Request</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item ">--}}
                        {{--<a class="nav-link" href="{{route('delivery.show')}}">--}}
                        {{--<i class="fas fa-tasks"></i><span class="nav_name text-white ">Delivery List</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('completed_delivery')}}">--}}
                                {{--<i class="fas fa-tasks"></i><span class="nav_name text-white ">Completed Delivery</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}

                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('detail_modal')}}">--}}
                                {{--<i class="fas fa-tasks"></i><span class="nav_name text-white ">Details modal</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endcan--}}
                    {{--@can('isAdmin','App\Models\User')--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('order_status')}}">--}}
                                {{--<i class="fas fa-truck"></i><span class="nav_name text-white ">Order Status</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endcan--}}

                    {{--@can('isAdmin','App\Models\User')--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('order_coupon')}}">--}}
                                {{--<i class="fas fa-gift"></i><span--}}
                                        {{--class="nav_name text-white ">Order Coupon Details</span>--}}
                            {{--</a>--}}

                        {{--</li>--}}

                    {{--@endcan--}}

                    {{--@can('isAdmin_Pharmacy_Delivary','App\Models\Role')--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('orderlist')}}">--}}
                                {{--<i class="fas fa-tasks"></i><span class="nav_name text-white ">Orderlist</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--@endcan--}}
                    {{--@can('isAdmin','App\Models\User')--}}
                        {{--<li class="nav-item ">--}}
                            {{--<a class="nav-link" href="{{route('billing_info')}}">--}}
                                {{--<i class="fas fa-tasks"></i><span class="nav_name text-white ">Billing Info</span>--}}
                            {{--</a>--}}
                        {{--</li>--}}


                    {{--@endcan--}}


                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('doctors')}}">
                            <i class="fad fa-user-md-chat"></i><span class="nav_name text-white ">Doctors</span>
                        </a>
                    </li>


                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('pharmacys')}}">
                            <i class="fas fa-capsules"></i><span class="nav_name text-white ">Pharmacies</span>
                        </a>
                    </li>


                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('deliverys')}}">
                                <i class="fas fa-user-friends "></i> <span class="nav_name text-white ">deliveries</span>
                            </a>
                        </li>


                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Main content -->

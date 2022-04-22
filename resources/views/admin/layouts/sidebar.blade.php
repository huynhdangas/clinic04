<div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="{{ url('dashboard') }}">
                            <div class="logo-img">
                                <!-- LOGO -->
                               <!-- <img src="{{asset('template/src/img/logo.png')}}"  style="width:150%;">  -->
                            </div>
                            <span class="text">DS Clinic</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Navigation</div>
                                <div class="nav-item active">
                                    <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <!-- <div class="nav-item">
                                    <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                                </div> -->
                                @if(auth()->check()&&auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Nhan vien</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('doctor.create') }}" class="menu-item">Create</a>
                                        <a href="{{ route('doctor.index') }}" class="menu-item">View</a>
                                    </div>
                                </div>
                                @endif

                                

                                @if(auth()->check()&&auth()->user()->role->name === 'doctor')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-calendar"></i><span>Appointment</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('appointment.create') }}" class="menu-item">Create</a>
                                        <a href="{{ route('appointment.index') }}" class="menu-item">Check</a>
                                    </div>
                                </div>
                                @endif

                

                                @if(auth()->check()&&auth()->user()->role->name === 'doctor')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Patients</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('patients.today') }}" class="menu-item">Patients today</a>
                                        <a href="{{ route('prescribed.patients') }}" class="menu-item">All Patient</a>
                                    </div>
                                </div>
                                @endif

                                @if(auth()->check()&&auth()->user()->role->name === 'admin')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-server"></i><span>Department</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('department.create') }}" class="menu-item">Create</a>
                                        <a href="{{ route('department.index') }}" class="menu-item">View</a>
                                    </div>
                                </div>
                                @endif


                                @if(auth()->check()&&auth()->user()->role->name === 'nurse')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-inbox"></i><span>Patient Appointment</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('patient') }}" class="menu-item">Today Appointment</a>
                                        <a href="{{ route('all.appointment') }}" class="menu-item">All Time</a>
                                    </div>
                                </div>
                                @endif

                                @if(auth()->check()&&auth()->user()->role->name === 'nurse')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-umbrella"></i><span>Medicine</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('medicine.create') }}" class="menu-item">Create</a>
                                        <a href="{{ route('medicine.index') }}" class="menu-item">View</a>
                                    </div>
                                </div>
                                @endif

                                @if(auth()->check()&&auth()->user()->role->name === 'testdoctor')
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-clipboard"></i><span>Test</span> <span class="badge badge-danger"></span></a>
                                    <div class="submenu-content">
                                        <a href="{{ route('test.patient') }}" class="menu-item">All Test</a>
                                    </div>
                                </div>
                                @endif

                                <div class="nav-item active">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                
                            </nav>
                        </div>
                    </div>
                </div>
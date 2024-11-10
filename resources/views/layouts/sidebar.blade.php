<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{ url('admin/dashboard') }}" class="brand-link"> <!--begin::Brand Image--> <img src="{{ asset("img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Admin</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                @if(Auth::user()->user_type == 1)
                <li class="nav-item"> <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif"> <i class="nav-icon bi bi-speedometer"></i>
                    <p>Dashboard</p> 
                </a> </li>
                <li class="nav-item"> <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') active @endif"> <i class="nav-icon bi bi-palette"></i>
                        <p>Admin</p>
                    </a> </li>

                <li class="nav-item"> <a href="{{ url('admin/class/list') }}" class="nav-link @if(Request::segment(2) == 'class') active @endif"> <i class="nav-icon bi bi-palette"></i>
                        <p>Class</p>
                 </a> </li>

                 <li class="nav-item"> <a href="{{ url('admin/subject/list') }}" class="nav-link @if(Request::segment(2) == 'subject') active @endif"> <i class="nav-icon bi bi-palette"></i>
                    <p>Subject</p>
             </a> </li>

             <li class="nav-item"> <a href="{{ url('admin/assign_subject/list') }}" class="nav-link @if(Request::segment(2) == 'assign_subject') active @endif"> <i class="nav-icon bi bi-palette"></i>
                <p>Assign Subject</p>
         </a> </li>

                @elseif(Auth::user()->user_type == 2)
                <li class="nav-item"> <a href="{{ url('teacher/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif"> <i class="nav-icon bi bi-speedometer"></i>
                    <p>Dashboard</p>
                </a> </li>
               
                @elseif(Auth::user()->user_type == 3)
                <li class="nav-item"> <a href="{{ url('student/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif"> <i class="nav-icon bi bi-speedometer"></i>
                    <p>Dashboard</p>
                </a> </li>

                @elseif(Auth::user()->user_type == 4)
                <li class="nav-item"> <a href="{{ url('parent/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif"> <i class="nav-icon bi bi-speedometer"></i>
                    <p>Dashboard</p>
                </a> </li>

                @endif

            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> 
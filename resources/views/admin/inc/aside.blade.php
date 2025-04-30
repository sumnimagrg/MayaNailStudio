<div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
        <nav class="aside">
            <a href="/admin" class="aside-item"><i class="fa fa-home"></i> Dashboard</a>
            {{-- <a href="{{route('appointment.index')}}" class="aside-item"><i class="fa fa-calendar"></i> Appointments</a> --}}
            <a href="{{route('appointment.index')}}" class="aside-item"><i class="fa fa-calendar"></i> Appointments</a>
            <a href="{{route('services.create')}}" class="aside-item"><i class="fa fa-briefcase"></i> Services</a>
            <a href="{{route('serviceCategory.create')}}" class="aside-item"><i class="fa fa-users"></i> Service Category</a>
            <a href="{{route('employee.create')}}" class="aside-item"><i class="fa fa-users"></i> Employees</a>
            <a href="{{ route('portofolioImages.index') }}"class="aside-item"><i class="fa fa-briefcase"></i> Portfolio Images</a>
            
        </nav>
    </aside>
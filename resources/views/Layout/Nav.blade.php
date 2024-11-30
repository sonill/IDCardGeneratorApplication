<!-- Top Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ABC School</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                   <!-- Authenticated Links -->
                   @if (Auth::check())
                   <!-- Logout Link -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('GenerateID')}}">
                        <i class="fas fa-cogs"></i> Manage System Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('printID')}}">
                        <i class="fas fa-print"></i> Print ID Cards
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ViewID')}}">
                        <i class="fas fa-id-card"></i> View ID Cards
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('GenerateID')}}">
                        <i class="fas fa-id-card-alt"></i> Generate ID Cards
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ManageStudents')}}">
                        <i class="fas fa-user-graduate"></i> Manage Students
                    </a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white ms-2" href="{{route('logout')}}">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <!-- Login Link -->
                    <li class="nav-item">
                        <a class="nav-link btn btn-success text-white ms-2" href="{{route('login')}}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

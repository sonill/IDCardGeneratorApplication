<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center py-3">Menu</h4>
    <a href="{{ route('home') }}">
        <i class="fas fa-user"></i> {{ Auth::user()->name }}
    </a>
    <a href="{{ route('GenerateID') }}">
        <i class="fas fa-id-card"></i> Generate ID
    </a>
   
    <a href="{{ route('manageSetting') }}">
        <i class="fas fa-cog"></i> Manage Settings
    </a>

    <!-- Add Login and Logout -->
    @if (Auth::check())
        <!-- Logout Option -->
        <a href="{{ route('logout') }}" >
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @else
        <!-- Login Option -->
        <a href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i> Login
        </a>
    @endif
</div>

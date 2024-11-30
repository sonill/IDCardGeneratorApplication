@extends('app')
@section('sectionTitle', 'Dashboard')
@section('bodySection')

<div class="content-wrapper">
    <!-- Sidebar -->
    @include('Layout.slidebar')

    <!-- Main Content -->
    <div class="main-content">
        <div class="container py-4">
            <h1 class="text-center mb-4">Welcome to Your Dashboard</h1>

            <!-- Cards for Key Metrics -->
            <div class="row mb-4">
                <!-- Total Students -->
                <div class="col-md-3">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">Total Students</h5>
                            <p class="card-text fs-3">
                                {{-- <i class="fas fa-user-graduate me-2"></i> {{ $totalStudents }} --}}
                                <i class="fas fa-user-graduate me-2"></i> 
                            </p>
                        </div>
                        <a href="" class="card-footer text-center text-white">
                        {{-- <a href="{{ route('students.index') }}" class="card-footer text-center text-white"> --}}
                            View Students <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Active IDs -->
                <div class="col-md-3">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">Active IDs</h5>
                            <p class="card-text fs-3">
                                {{-- <i class="fas fa-id-card me-2"></i> {{ $activeIDs }} --}}
                                <i class="fas fa-id-card me-2"></i>
                            </p>
                        </div>
                        <a href="" class="card-footer text-center text-white">
                        {{-- <a href="{{ route('students.index') }}" class="card-footer text-center text-white"> --}}
                            Manage IDs <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Pending Tasks -->
                <div class="col-md-3">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">Pending Tasks</h5>
                            <p class="card-text fs-3">
                                <i class="fas fa-tasks me-2"></i> 
                                {{-- <i class="fas fa-tasks me-2"></i> {{ $pendingTasks }} --}}
                            </p>
                        </div>
                        <a href="" class="card-footer text-center text-white">
                        {{-- <a href="{{ route('tasks.index') }}" class="card-footer text-center text-white"> --}}
                            View Tasks <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Notifications -->
                <div class="col-md-3">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">Notifications</h5>
                            <p class="card-text fs-3">
                                <i class="fas fa-bell me-2"></i>
                                {{-- <i class="fas fa-bell me-2"></i> {{ $notifications }} --}}
                            </p>
                        </div>
                        {{-- <a href="{{ route('notifications.index') }}" class="card-footer text-center text-white"> --}}
                        <a href="" class="card-footer text-center text-white">
                            View Notifications <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-dark text-white">
                            <h5>Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li>
                                    {{-- <a href="{{ route('students.create') }}" class="text-primary"> --}}
                                    <a href="" class="text-primary">
                                        <i class="fas fa-user-plus me-2"></i> Add New Student
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="text-primary">
                                    {{-- <a href="{{ route('students.index') }}" class="text-primary"> --}}
                                        <i class="fas fa-users me-2"></i> View All Students
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-primary">
                                    {{-- <a href="{{ route('generate.id') }}" class="text-primary"> --}}
                                        <i class="fas fa-id-card me-2"></i> Generate New ID
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-primary">
                                    {{-- <a href="{{ route('tasks.index') }}" class="text-primary"> --}}
                                        <i class="fas fa-tasks me-2"></i> Manage Tasks
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities Section -->
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-dark text-white">
                            <h5>Recent Activities</h5>
                        </div>
                        <div class="card-body">
                            {{-- @if($recentActivities->isEmpty())
                                <p>No recent activities to display.</p>
                            @else
                                <ul class="list-group">
                                    @foreach($recentActivities as $activity)
                                        <li class="list-group-item">
                                            <i class="fas fa-clock text-secondary me-2"></i> 
                                            {{ $activity->message }}
                                            <span class="text-muted float-end">{{ $activity->created_at->diffForHumans() }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

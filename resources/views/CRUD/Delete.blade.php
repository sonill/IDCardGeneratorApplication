@extends('app')
@section('sectionTitle', 'Delete Student')
@section('bodySection')
<div class="content-wrapper">
    <!-- Sidebar -->
    @include('Layout.slidebar')

    <!-- Main Content -->
    <div class="main-content">
        <div class="container py-4">
            <h2 class="text-center mb-4">Delete Student</h2>

            <!-- Confirmation Message -->
            <div class="card">
                <div class="card-body">
                    <p class="text-center">
                        <i class="fas fa-exclamation-triangle text-warning"></i> 
                        Are you sure you want to delete this student?
                    </p>

                    <!-- Student Information -->
                    <div class="mb-4 text-center">
                        <strong>Name:</strong> {{ $student->name }}<br>
                        <strong>Email:</strong> {{ $student->email }}<br>
                        <strong>Phone:</strong> {{ $student->phone }}<br>
                        <strong>Address:</strong> {{ $student->address }}
                    </div>

                    <!-- Delete Confirmation Form -->
                    <div class="text-center">
                        <form action="{{ route('delete', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                            @csrf
                           
                            <button type="submit" class="btn btn-danger btn-lg">
                                <i class="fas fa-trash-alt"></i> Delete Student
                            </button>
                            {{-- <a href="{{ route('students.index') }}" class="btn btn-secondary btn-lg"> --}}
                            <a href="#" class="btn btn-secondary btn-lg">
                                <i class="fas fa-arrow-left"></i> Cancel
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
